<?php

namespace App\Http\Controllers\weixin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Message extends Controller
{
    //
    public function index(Request $request)
    {
        dump($request);
    }

    public function verify_token()
    {

    }
}
