<?php

namespace App\Admin\Controllers;

use App\Models\Template;
use App\Models\User;
use Encore\Admin\Auth\Permission;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Symfony\Component\HttpKernel\Exception\HttpException;

class TemplatesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '模板管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Template());

        if (!\Encore\Admin\Facades\Admin::user()->can('templates_manage')){
            $grid->model()->where('user_id', \Encore\Admin\Facades\Admin::user()->id);
        }

        $grid->column('id', __('Id'));
        $grid->column('name', __('名称'))->editable();
        $grid->column('user.name', __('User id'));
        $grid->column('created_at', __('Created at'))->date("Y-m-d H:i:s");
        $grid->column('updated_at', __('Updated at'))->date("Y-m-d H:i:s");;

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
        $show = new Show(Template::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('content', __('Content'));
        $show->field('user_id', __('User id'))->as(function ($user){
            return User::find($user)->name;
        });
        $show->field('image')->image();
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
        $form = new Form(new Template());

        $form->text('name', __('Name'));
        $form->css('content', __('Content'));

        $form->image('image','证书缩略图')->uniqueName();

        // 表单提交后,保存前事件
        $form->submitted(function (Form $form){
            $form->user_id = \Encore\Admin\Facades\Admin::user()->id;
        });

        return $form;
    }
}
