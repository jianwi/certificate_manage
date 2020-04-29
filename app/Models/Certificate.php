<?php

namespace App\Models;

use App\Models\BaseModel as Model;
use phpDocumentor\Reflection\Types\Self_;

class Certificate extends Model
{
    protected $hidden = ['isDelete'];

    protected $fillable = ['code','creator','name', 'text1', 'text2', 'text3', 'text4', 'text5', 'text6', 'text7', 'text8', 'award_id', 'activity_id'];

    //
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function award()
    {
        return $this->belongsTo(Award::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    static function createCode()
    {
        $code = \Illuminate\Support\Str::upper(substr(md5(time()), 1, 10));
        if (self::where(['code'=>$code])->first()){
            return self::createCode();
        };
        return $code;
    }

}
