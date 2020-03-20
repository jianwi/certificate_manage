<?php

namespace App\Models;

use App\Models\BaseModel as Model;

class Template extends Model
{
    protected $hidden = ['isDelete'];

    //

    public function Activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
