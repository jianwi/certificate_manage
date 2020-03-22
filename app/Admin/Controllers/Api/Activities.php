<?php


namespace App\Admin\Controllers\Api;


use App\Models\Activity;
use Illuminate\Http\Request;

class Activities
{
    public function activities(Request $request){
        $q = $request->get('q');
    }
}
