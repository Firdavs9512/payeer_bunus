<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;
use App\Http\Controllers\cpayeer;
use App\Models\Setting;

class PaymentController extends Controller
{
    public function balance()
    {
        $payments = Payment::where('user_id',auth()->user()->id)->get();
        return view('balanse')->with('payments',$payments);
    }


    private function payeer($send_a, $send_s){
        // require_once('cpayeer.php');
        $accountNumber = env("PAYEER_ADDR","P1026451819");
        $apiId = env("PAYEER_API_KEY", 1833554167);
        $apiKey = env("PAYEER_API_SECRET");
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
        if (0 == Setting::where('name','Payment_action')){
            return response()->json(['error'=>'Мы работаем над исправлением этой ошибки. Приносим извинения за неудобства']);
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

        // BU yerga payeer pul utkazish function yoziladi
        $ress = $this->payeer(auth()->user()->payeer,auth()->user()->balance);
        if (isset($ress["error"]))
        {
            return response()->json(['error'=>$ress['error']]);
        }



        // Payment utkazilgani haqida bazaga malumot qushish
        $payeer = Payment::create([
            'payeer_adress' => auth()->user()->payeer,
            'summ' => auth()->user()->balanse,
            'number' => $ress['history'], // bu yerga payeerdan pul utkazalgandan kiyin keladigan id yoziladi
            'name' => auth()->user()->name,
            'user_id' => auth()->user()->id,
        ]);

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

}
