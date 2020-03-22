<?php


namespace App\Admin\Controllers\Api;


use App\Models\Template;

class Templates
{
    public function templates(\Illuminate\Http\Request $request)
    {
        $q = $request->get('q');

        return Template::where('name', 'like', "%$q%")->paginate(null, ['id', 'name as text']);
    }
}
