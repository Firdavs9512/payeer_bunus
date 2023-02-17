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


    private function payeer(){
        // require_once('cpayeer.php');
        $accountNumber = 'P1026451819';
        $apiId = '1833554167';
        $apiKey = 'T6U4nXTJHOvxO558';
        $payeer = new CPayeer($accountNumber, $apiId, $apiKey);
        if ($payeer->isAuth())
        {
            $arTransfer = $payeer->transfer(array(
                'curIn' => 'USD',
                'sum' => 1.1,
                'curOut' => 'USD',
                //'sumOut' => 1,
                'to' => 'P1029930071',
                //'to' => 'client@mail.com',
                'comment' => 'test',
                //'protect' => 'Y',
                //'protectPeriod' => '3',
                //'protectCode' => '12345',
            ));
            if (isset($arTransfer['errors']))
            {
                return $arTransfer;
            }
            else
            {
                return $arTransfer;
            }
        }
        else
        {
            // $payeer->getErrors();
        }

    }


    public function withdraw(Request $request)
    {
        // Userni balansini kontrol qilish
        if (auth()->user()->balanse < 1.00){
            return response()->json(['error'=>'На вашем счету достаточно средств. Минимум на вывод 1 рубль']);
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
        $ress = $this->payeer();
        return response()->json(['message'=> $ress]);


        // Payment utkazilgani haqida bazaga malumot qushish
        $payeer = Payment::create([
            'payeer_adress' => auth()->user()->payeer,
            'summ' => auth()->user()->balanse,
            'number' => 1, // bu yerga payeerdan pul utkazalgandan kiyin keladigan id yoziladi
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
