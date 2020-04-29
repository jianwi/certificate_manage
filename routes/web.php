<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('app');
});

Route::get('/wx',"weixin//Message@index");

Route::get('/t',function (){
   $a = \App\Models\Award::where([
       'name' => '三等奖'
   ])->first();

   dump($a->id);
});

