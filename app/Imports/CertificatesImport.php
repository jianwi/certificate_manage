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
    private $awards = [];
    private $awards_info = [];
    public function __construct($id)
    {
       $this->activity_id = $id;

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

    }

    private function newCertificate($row)
    {
        $name = $row[1];
        $award = $row[2];

        if (!in_array($award,$this->awards)){
            $this->awards[] = $award;

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

        \App\Models\Certificate::create([
            'code' => \App\Models\Certificate::createCode(),
            'name' => $name,
            'activity_id' => $this->activity_id,
            'creator' => \Encore\Admin\Facades\Admin::user()->id,
            'award_id' => $award_id,
            'text1' => $name,
            'text2' => $award
        ]);
    }
}
