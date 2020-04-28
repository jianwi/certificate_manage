<?php

namespace App\Models;

use App\Models\BaseModel as Model;

class Award extends Model
{
    //
    protected $fillable = ['name', 'content','activity_id'];
    protected $hidden = ['isDelete'];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function Certificates()
    {
        return $this->hasMany(Certificate::class);
    }

}
