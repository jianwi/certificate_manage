<?php

namespace App\Models;

use App\Models\BaseModel as Model;

class Certificate extends Model
{
    protected $hidden = ['isDelete'];

    protected $fillable = ['name', 'text1', 'text2', 'text3', 'text4', 'text5', 'text6', 'text7', 'text8', 'award_id', 'activity_id'];
    //
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function award()
    {
        return $this->belongsTo(Award::class);
    }
}
