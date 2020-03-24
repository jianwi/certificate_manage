<?php

namespace App\Admin\Controllers;

use App\Models\Activity;
use App\Models\Template;
use App\Models\User;
use Encore\Admin\Admin;
use Encore\Admin\Auth\Permission;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use function foo\func;

class ActivitiesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '活动管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Activity());

        if (!\Encore\Admin\Facades\Admin::user()->can('activities_manage')){
            $grid->model()->where('user_id', \Encore\Admin\Facades\Admin::user()->id);
        }

        $grid->filter(function ($filter) {
            $filter->disableIdFilter();
            $filter->contains('name', '名称');
            $filter->between('created_at', '创建时间')->datetime();
        });

        $grid->column('id', __('Id'));
        $grid->column('name', '名称')->editable();

//        受用模型关联获取 user.name  下同
        $grid->column('user.name', '用户');
        $grid->column('template.name', '模板');

        $grid->column('created_at', __('创建时间'))->date('Y-m-d H:i:s');
        $grid->column('updated_at', __('更新时间'))->date('Y-m-d H:i:s');

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
        $show = new Show(Activity::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', '名称');
        $show->field('content', '活动详情');
        $show->field('user_id', '创建用户')->as(function ($user_id) {
            return User::find($user_id)->name;
        });
        $show->field('template_id', '模板')->as(function ($template_id) {
            return Template::find($template_id)->name;
        });

        $show->awards('获奖信息', function ($award) {
            $award->resource('/admin/awards');

            $award->disableExport();
            $award->disableFilter();
            $award->disableColumnSelector();
            $award->disableCreateButton();

            $award->name()->editable();
            $award->content()->limit(10);

        });

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
//        禁用表单按钮
        Form::init(function (Form $form) {
            $form->disableEditingCheck();
            $form->disableCreatingCheck();
            $form->disableViewCheck();
        });

        $form = new Form(new Activity());

        $form->text('name', '活动名称')
            ->creationRules(['required', "unique:activities"]);

        $form->textarea('content', '活动内容')->required();

        $form->display('user_id', '创建者')->with(function ($value) {
            return \Encore\Admin\Facades\Admin::user()->name;
        });

        $form->select('template_id', __('模板'))->options(function ($id) {
            $template = Template::find($id);
            if ($template) {
                return [$template->id => $template->name];
            }
        })->ajax('/admin/api/templates')
            ->required();

        $form->hasMany('awards', '奖项', function (Form\NestedForm $form) {
            $form->text('name', '奖项名称');
            $form->textarea('content', '奖项描述');
        })->rules('required');

        $form->submitted(function (Form $form) {
            $form->user_id = \Encore\Admin\Facades\Admin::user()->id;
        });

        return $form;
    }
}
