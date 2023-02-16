<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Models\Setting;
use App\Models\User;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        $schedule->call(
            function(){
                // send message for admin telagram bot

                $this->sendMessage();

                // Update work day
                $kun = Setting::Find(1);
                $n = $kun['value'];
                $m = intval($n)+1;
                $kun['value'] = $m;
                $kun->save();

                // Clear new users
                $new_users = Setting::Find(3);
                $new_users['value_int']= 0;
                $new_users->save();

                // clear bonuses
                $bon = Setting::Find(2);
                $bon['value_int'] = 0;
                $bon->save();

                // cleare payments
                $pay = Setting::Find(4);
                $pay['value_int'] =0;
                $pay->save();


            }
        )->everyMinute();
    }

    public function sendMessage()
    {
        $token = env('TELEGRAM_BOT_TOKEN');
        $admin_id = env('TELEGRAM_USER_ID');
        $users = User::all()->count();
        $new_users = Setting::Find(3);
        $bonuslar = Setting::Find(2);
        $pay = Setting::Find(4);

        $message = 
        "<strong><b>Barcha statistika</b></strong>\n".
         '<strong>Foydalanuvchilar:</strong> ' . $users . "\n".
         '<strong>Yangi foydalanuvchilar:</strong> ' . $new_users['value_int'] . "\n".
         '<strong>Bugungi bonuslar:</strong> ' . $bonuslar['value_int'] . "\n".
         '<strong>Bugungi pul yechishlar:</strong> ' . $pay['value_int'] . "\n";

        $data = [
            'text' => $message,
            'parse_mode' => 'HTML',
            'chat_id' => $admin_id,
        ];

    file_get_contents("https://api.telegram.org/bot$token/sendMessage?" . http_build_query($data) );

    }


    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
