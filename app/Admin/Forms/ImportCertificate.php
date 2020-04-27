<?php

namespace App\Admin\Forms;

use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;

class ImportCertificate extends Form
{
    /**
     * The form title.
     *
     * @var string
     */
    public $title = '导入证书';

    /**
     * Handle the form request.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request)
    {
        //dump($request->all());
        $file = $request->file();
        fgetcsv()

    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->select('activity_id', __('活动'))->options(function () {
            return \DB::table('activities')->pluck('name', 'id');
        })
            ->load('award_id', '/admin/api/awards')
            ->required();
        $this->file('证书文件');
    }

    /**
     * The data of the form.
     *
     * @return array $data
     */
    public function data()
    {
        return [
            'name'       => 'John Doe',
            'email'      => 'John.Doe@gmail.com',
            'created_at' => now(),
        ];
    }
}
