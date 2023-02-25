<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Adsen;
use App\Models\Setting;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        // Image reklamani global uzgaruvchi qilib olish
        $image = Adsen::where('location','image')->first();
        $GLOBALS['IMAGE_ADS'] = $image->url;

        // Settingsdan header malumotini global qilish
        $header = Setting::where('name','Header')->first();
        $GLOBALS['HEADER'] = $header['value'];

        // Asosiy baner reklama image uchun
        $asosiy = Adsen::where('location','bonus_olishda_ishlatiladigan_baner')->first();
        $GLOBALS['ASOSIY_BANER'] = $asosiy['url'];

        // Oddiy holatda ishlatish uchun baner
        $imagebaner = Adsen::where('location','yuqori_image_baner')->first();
        $GLOBALS['yuqori_image_baner'] = $imagebaner->url;

        // Qushimcha image baner ishlatish uchun
        $imagequshimcha = Adsen::where('location','qushimcha_image_baner')->first();
        $GLOBALS['qushimcha_image_baner'] = $imagequshimcha->url;

        // Yozuvli reklama index page pasdagi uchun 
        $yozuv = Adsen::where('location','index_yozuvli_reklama')->first();
        $GLOBALS['index_yozuvli_reklama'] = $yozuv->url;
    }

}