<?php

namespace App\Admin\Controllers;

use App\Models\Certificate;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CertificatesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'App\Models\Certificate';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Certificate());

        $grid->column('id', __('Id'));
        $grid->column('code', __('Code'));
        $grid->column('activity_id', __('Activity id'));
        $grid->column('award_id', __('Award id'));
        $grid->column('name', __('Name'));
        $grid->column('text1', __('Text1'));
        $grid->column('text2', __('Text2'));
        $grid->column('text3', __('Text3'));
        $grid->column('text4', __('Text4'));
        $grid->column('text5', __('Text5'));
        $grid->column('text6', __('Text6'));
        $grid->column('text7', __('Text7'));
        $grid->column('text8', __('Text8'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('isDelete', __('IsDelete'));

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
        $show->field('activity_id', __('Activity id'));
        $show->field('award_id', __('Award id'));
        $show->field('name', __('Name'));
        $show->field('text1', __('Text1'));
        $show->field('text2', __('Text2'));
        $show->field('text3', __('Text3'));
        $show->field('text4', __('Text4'));
        $show->field('text5', __('Text5'));
        $show->field('text6', __('Text6'));
        $show->field('text7', __('Text7'));
        $show->field('text8', __('Text8'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('isDelete', __('IsDelete'));

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

        $form->text('code', __('Code'));
        $form->number('activity_id', __('Activity id'));
        $form->number('award_id', __('Award id'));
        $form->text('name', __('Name'));
        $form->text('text1', __('Text1'));
        $form->text('text2', __('Text2'));
        $form->text('text3', __('Text3'));
        $form->text('text4', __('Text4'));
        $form->text('text5', __('Text5'));
        $form->text('text6', __('Text6'));
        $form->text('text7', __('Text7'));
        $form->text('text8', __('Text8'));
        $form->switch('isDelete', __('IsDelete'));

        return $form;
    }
}
