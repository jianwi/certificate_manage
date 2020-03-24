<?php

namespace App\Admin\Controllers;

use App\Models\Activity;
use App\Models\Award;
use Encore\Admin\Auth\Permission;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AwardsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '活动奖励';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Award());

        Permission::check('activities_manage');

        $grid->column('id', __('Id'));
        $grid->column('name', __('名称'));
        $grid->column('content', __('Content'))->limit(30);
        $grid->column('activity.name', __('Activity id'));
        $grid->column('created_at', __('Created at'))->date('Y-m-d H:i:s');
        $grid->column('updated_at', __('Updated at'))->date('Y-m-d H:i:s');

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
        $show = new Show(Award::findOrFail($id));

        $show->panel()
            ->tools(function ($tools) {
                $tools->disableList();
            });
        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('content', __('Content'));
        $show->field('activity_id', __('Activity id'))->as(function ($activity){
            return Activity::find($activity)->name;
        });
        $show->field('created_at', __('Created at'))->date('Y-m-d H:i:s');
        $show->field('updated_at', __('Updated at'))->date('Y-m-d H:i:s');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {

        $form = new Form(new Award());

        $form->tools(function (Form\Tools $tools){
            $tools->disableList();
        });
        $form->text('name', __('Name'));
        $form->textarea('content', __('Content'));

        $form->disableViewCheck();
        $form->disableEditingCheck();
        $form->disableCreatingCheck();

        return $form;
    }
}
