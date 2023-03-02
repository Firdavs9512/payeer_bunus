<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;
use App\Http\Controllers\cpayeer;
use App\Models\Setting;
use App\Helper\Telegram;

class PaymentController extends Controller
{
    public function balance()
    {
        $payments = Payment::where('user_id',auth()->user()->id)->get();
        return view('balanse')->with('payments',$payments);
    }


    private function payeer($send_a, $send_s){
        // require_once('cpayeer.php');
        $accountNumber = env("PAYEER_ADDR") ?? Setting::where('name','Payeer_address')->first()->value;
        $apiId = env("PAYEER_ID") ?? Setting::where('name','Payeer_id')->first()->value_int;
        $apiKey = env("PAYEER_SECRET") ?? Setting::where('name','Payeer_sicret')->first()->value;
        $payeer = new CPayeer($accountNumber, $apiId, $apiKey);
        if ($payeer->isAuth())
        {
            $arTransfer = $payeer->transfer(array(
                'curIn' => 'RUB',
                'sum' => $send_s,
                'curOut' => 'RUB',
                //'sumOut' => 1,
                'to' => $send_a,
                //'to' => 'client@mail.com',
                'comment' => 'https://earn-money.uz',
                //'protect' => 'Y',
                //'protectPeriod' => '3',
                //'protectCode' => '12345',
            ));
            if (isset($arTransfer['errors']))
            {
                return ["history"=>"","error"=>$arTransfer["errors"]];
            }
            else
            {
                return ["history"=>$arTransfer["historyId"],"error"=>""];
            }
        }
        else
        {
            return ["history"=>"","error"=>$payeer->getErrors()];
            // $payeer->getErrors();
        }

    }


    public function withdraw(Request $request)
    {
        // Userni balansini kontrol qilish
        if (auth()->user()->balanse < 1.00){
            return response()->json(['error'=>'На вашем счету достаточно средств. Минимум на вывод 1 рубль']);
        }

        // Payment holatini tekshirish admin tomonidan
        if (0 == Setting::where('name','Payment_action')->first()->value_int){
            return response()->json(['error'=>'Платежная система в настоящее время закрыта. Пожалуйста, повторите попытку позже']);
        }

        // Agar refer bulsa unga 30% miqdorini utkazamiz
        $refer = User::find(auth()->user()->refer);
        if (isset($refer))
        {
            $s = auth()->user()->balanse;
            $refer->balanse = $refer->balanse + number_format($s * 30 /100, 2);
            $refer->money += number_format($s * 30 /100,2);
            $refer->save();
        }

        // User pul yechayotgani haqida adminga message yuborish
        $mess = new Telegram();
        $text = "User pul yechish haqida request yubordi.\nUsername: ".auth()->user()->name
                ."\nEmail: ".auth()->user()->email
                ."\nMoney: ".auth()->user()->balanse
                ."\nIp address: ".$_SERVER['REMOTE_ADDR']
                ."\nPayeer: ".auth()->user()->payeer
                ."\nTime: ".now();
        $mess->sendMessage($text);


        // BU yerga payeer pul utkazish function yoziladi
        // $ress = $this->payeer(auth()->user()->payeer,auth()->user()->balance);
        // if (isset($ress["error"]))
        // {
        //     $message = "Error for payement system.\nPul yechishda payeerdan error kelyapti.\nUser: "
        //                 .auth()->user()->email
        //                 ."\nTime: ".now();
        //     $tel = new Telegram();
        //     $tel->sendMessage($message);
        //     return response()->json(['error'=>$ress['error']]);
        // } Payeer auto pay don't work! 
        

            /*
                Papmentga odiy qilib save qilinadi manual pay ishga tushiriladi
            */

        // Payment utkazilgani haqida bazaga malumot qushish
        $payeer = Payment::create([
            'payeer_adress' => auth()->user()->payeer,
            'summ' => auth()->user()->balanse,
            // 'number' => $ress['history'], // bu yerga payeerdan pul utkazalgandan kiyin keladigan id yoziladi
            'name' => auth()->user()->name,
            'user_id' => auth()->user()->id,
        ]);

        // Adminga habar yuborish
        $message = "New payment action!\nUser: ".auth()->user()->name
                    ."\nEmail: ".auth()->user()->email
                    ."\nPayeer: ".auth()->user()->payeer
                    ."\nSumma: ".auth()->user()->balanse
                    ."\nTime: ".now();
        $tel = new Telegram();
        $tel->sendMessage($message);

        // Userni balansini 0 ga tushurish
        $puser = auth()->user();
        $puser->balanse = 0;
        $puser->save();

        // Settingsga paymentni qushib quyish
        $dpay = Setting::Find(4);
        $dpay['value_int'] = $dpay['value_int']+1;
        $dpay->save();


        // Pul tushganni haqida habar berish
        return response()->json(['message'=> 'Деньги успешно переведены на ваш счет!']);
    }

    // Admin new payment index page
    public function newpayment()
    {
        $payments = Payment::where('status',false)->paginate(10);
        return view('admin.newpayment')->with('payments',$payments);
    }

    // Admin panel new payment request
    public function newpaymentreq($id)
    {
        $payment = Payment::find($id);
        return view('admin.new-payment-show')->with('payment', $payment);
    }

    // Admin panel new request update function
    public function newpaymentupdate(Request $request, $id)
    {
        // dd($request);
        $payment = Payment::find($id);
        $payment->status = $request->payment_action == "tulangan" ? true : false;
        $payment->number = $request->number;
        $payment->save();
        return redirect()->route('admin.new.payment.show',$id)->with('info',"Payment action successfull changed!");
    }
}
