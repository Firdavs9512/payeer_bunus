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
    }

}
