<?php

namespace App\Admin\Forms;

use App\Imports\CertificatesImport;
use App\Models\Certificate;
use Encore\Admin\Widgets\Form;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
        $activity = $request->post('activity_id');
        $file = $request->file('zs_file')->getPathname();
        Excel::import(new CertificatesImport($activity), $file);
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
        $this->file('zs_file','证书文件');
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
