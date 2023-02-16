<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bonus;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;
use App\Rules\Recaptcha;


class BonusController extends Controller
{
    // Random bonus yaratadigan function
    private function radom_bonus()
    {
        $son = rand(1,1000);

        $sum = 0.01;
        if ($son <= 980){
            $sum = 0.05;
        }elseif ($son >980 && $son <= 995) {
            $sum = 0.3;
        }elseif ($son >995 && $son <=999) {
            $sum = 0.50;
        }elseif ($son == 1000) {
            $sum = 1.0;
        }

        return [$son, $sum];
    }



    // Bonus bulimini kurinishi
    public function bonus()
    {

        $oldbonus = Bonus::where('user_id', auth()->user()->id)->get()->sortByDesc('created_at')->first();

        if(isset($oldbonus)){
   

            $data = [
                'time' => time()-$oldbonus['time'] > 1800 ? 0 :  1800-(time()-$oldbonus['time']),
                'active' => time()-$oldbonus['time'] > 1800 ? false :  true,
            ];
        }else{
             $data = [
                'time'=>0,
                'active' => false,
            ];
        }

        return view('bonus')->with('data',$data)->with('bonuses',DB::table('bonuses')->orderBy('created_at', 'desc')->limit(50)->get());
    }

    // Bonus olish uchun request keladi
    public function getbonus(Request $request)
    {
        // dd($request);
        if ($request['send'] !='Получить'){
            return redirect('/bonus')->with('error','При начислении вам бонуса произошла ошибка');
        }

        $request->validate([
            'g-recaptcha-response' => ['required', new Recaptcha()],
        ]);

        $oldbonus = Bonus::where('user_id', auth()->user()->id)->get()->sortByDesc('created_at')->first();

        // dd($oldbonus);
        if (isset($oldbonus)){
            if (time()-$oldbonus['time'] > 1800){
                //
            }else{
                return redirect('/bonus')->with('error','Вы уже получали бонус');
            }
        }
        $oldip = DB::table('bonuses')->where('ip',$_SERVER['REMOTE_ADDR'])->orderBy('created_at','desc')
            ->first();

        if (isset($oldip)){
            if (time() - $oldip->time < 1800){
                return redirect('/bonus')->with('error','Бонус получен до этого ip адреса');
            }
        }


        $bonus_sum = $this->radom_bonus();
        Bonus::create([
            'bonus'=>$bonus_sum[1],
            'bonus_number' => $bonus_sum[0],
            'ip' => $_SERVER['REMOTE_ADDR'],
            'user_id' => auth()->user()->id,
            'time' => time()
        ]);

        $profile = auth()->user();
        $profile->balanse +=$bonus_sum[1];
        $profile->money +=$bonus_sum[1];
        $profile->save();

        // Add bonus to statistik
        $bon = Setting::Find(2);
        $bon['value_int'] = $bon['value_int']+1;
        $bon->save(); 

        return redirect('/bonus')->with('bonus','Your bonus is '.$bonus_sum[1].' rub!');

    }
}
