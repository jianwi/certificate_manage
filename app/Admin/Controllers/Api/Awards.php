<?php


namespace App\Admin\Controllers\Api;


use App\Models\Award;
use Illuminate\Http\Request;

class awards
{
    public function awards(Request $request)
    {
        $q = $request->get('q');
        return Award::where('activity_id',$q)->get(['id',\DB::raw('name as text')]);
    }
}
