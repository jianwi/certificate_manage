<?php

namespace App\Admin\Controllers;

use App\Admin\Forms\ImportCertificate;
use App\Models\Activity;
use App\Models\Award;
use App\Models\Certificate;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CertificatesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '证书管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Certificate());

        if (!\Encore\Admin\Facades\Admin::user()->can('certificates_manage')){
            $grid->model()->where('creator', \Encore\Admin\Facades\Admin::user()->id);
        }

        $grid->filter(function ($filter) {
            $filter->disableIdFilter();

            $filter->contains('name', '名称');
            $filter->between('created_at', '创建时间')->datetime();

        });

        $grid->quickSearch('name', 'code');

        $grid->column('id', __('Id'));
        $grid->column('name', __('获奖者'))->limit(15);
        $grid->column('code', __('证书代码'));
//        $grid->column('creator','创建者');
        $grid->column('activity.name', __('活动名称'));
        $grid->column('award.name', __('奖品名称'));
        $grid->column('created_at', __('Created at'))->date('Y-m-d H:i:s');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Certificate::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('code', __('Code'));
        $show->field('activity_id', __('活动名称'))->as(function ($activity) {
            return Activity::find($activity)->name;
        });
        $show->creator('创建者')->as(function ($creator){
            return User::find($creator)->name;
        });
        $show->field('award_id', __('奖励名称'))->as(function ($award) {
            return Award::find($award)->name;
        });
        $show->field('award_id', __('奖励详情'))->as(function ($award) {
            return Award::find($award)->content;
        });

        $show->field('name', __('姓名'));
        $show->columns("证书预览")->certificate_preview("sd")->unescape();

//        $show->field('text1', __('Text1'));
//        $show->field('text2', __('Text2'));
//        $show->field('text3', __('Text3'));
//        $show->field('text4', __('Text4'));
//        $show->field('text5', __('Text5'));
//        $show->field('text6', __('Text6'));
//        $show->field('text7', __('Text7'));
//        $show->field('text8', __('Text8'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Certificate());

        $form->disableViewCheck();
        $form->disableEditingCheck();

        $form->text('code', __('证书代码'))
            ->rules(['required', "unique:certificates"])
            ->value(\Illuminate\Support\Str::upper(substr(md5(time()), 1, 8)));

        $form->select('activity_id', __('活动'))->options(function () {
            return \DB::table('activities')->pluck('name', 'id');
        })
            ->load('award_id', '/admin/api/awards')
            ->required();

        $form->select('award_id', __('奖项'));

        $form->text('name', __('Name'))
            ->rules(['required', "unique:certificates"]);
        $form->text('text1', __('Text1'));
        $form->text('text2', __('Text2'));
        $form->text('text3', __('Text3'));
        $form->text('text4', __('Text4'));
        $form->text('text5', __('Text5'));
        $form->text('text6', __('Text6'));
        $form->text('text7', __('Text7'));
        $form->text('text8', __('Text8'));

        return $form;
    }

    public function importCertificates(Content $content)
    {
        return $content
            ->title('导入证书')
            ->body(new ImportCertificate());
    }

}
