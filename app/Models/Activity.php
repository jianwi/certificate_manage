<?php

namespace App\Models;

use App\Models\BaseModel as Model;

class Activity extends Model
{
    //
    protected $fillable = ['template_id', 'content', 'name'];

    protected $hidden = ['isDelete'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function awards()
    {
        return $this->hasMany(Award::class);
    }

}
