<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class QrcodeController extends Controller
{
    // return a qr_code image
    public function qrCode($code)
    {
       $qrcode = QrCode::format('png')
            ->size(300)
            ->margin(0)
            ->errorCorrection('H')
            ->generate(route('certificates.index').'/#/'.$code);

        return response($qrcode)->header('Content-type','image/png');

    }
}
