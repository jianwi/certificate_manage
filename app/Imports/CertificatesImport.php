<?php

namespace App\Imports;

use App\Certificate;
use App\Models\Award;
use Encore\Admin\Admin;
use Maatwebsite\Excel\Concerns\ToCollection;
use Ramsey\Collection\Collection;

class CertificatesImport implements ToCollection
{
    private $activity_id;
    private $user_id;
    private $awards_info = [];
    private $inserts = [];
    private $codes = [];

    public function __construct($activity_id,$user_id)
    {
       $this->activity_id = $activity_id;
        $this->user_id = $user_id;
    }

    /**
     * @inheritDoc
     */
    public function collection(\Illuminate\Support\Collection $collection)
    {
        // TODO: Implement collection() method.
//        删除表头
        unset($collection[0]);

        foreach ($collection as $row){
            $this->newCertificate($row);
        }

        \App\Models\Certificate::insert($this->inserts);

    }

    private function newCertificate($row)
    {
        $name = $row[0];
        $award = $row[1];
        $code  = \App\Models\Certificate::createCode();

        while (in_array($code,$this->codes)){
            $code  = \App\Models\Certificate::createCode();
        }
        $this->codes[] = $code;
        $hasThisAward = Award::where([
            'activity_id' => $this->activity_id,
            'name' => $award
        ])->first();

        if (!$hasThisAward){

            $add = Award::create([
                'activity_id' => $this->activity_id,
                'name' => $award,
                'content' => $award
            ]);
            $this->awards_detail[$award] = $add['id'];
            $award_id = $add['id'];
        }else{
            $award_id = $this->awards_detail[$award];
        }
        $this->inserts[] =[
            'code' => \App\Models\Certificate::createCode(),
            'name' => $name,
            'activity_id' => $this->activity_id,
            'creator' => $this->user_id,
            'award_id' => $award_id,
            'text1' => $name,
            'text2' => $award
        ];
    }
}
