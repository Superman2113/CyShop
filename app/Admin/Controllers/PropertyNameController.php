<?php

namespace App\Admin\Controllers;

use App\Codes\BoolCode;
use App\Models\CategoriesModel;
use App\Models\PropertyNameModel;
use DemeterChain\B;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PropertyNameController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '属性名';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PropertyNameModel());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Property Name'));
        $grid->column('category.cate_name', __('Category Name'));
        $grid->column('is_allow_alias', __('Is allow alias'))->switch(BoolCode::BOOL_TRUE_FALSE_SWITCH);
        $grid->column('is_color', __('Is color'))->switch(BoolCode::BOOL_TRUE_FALSE_SWITCH);
        $grid->column('is_enum', __('Is enum'))->switch(BoolCode::BOOL_TRUE_FALSE_SWITCH);
        $grid->column('is_input', __('Is input'))->switch(BoolCode::BOOL_TRUE_FALSE_SWITCH);
        $grid->column('is_key', __('Is key'))->switch(BoolCode::BOOL_TRUE_FALSE_SWITCH);
        $grid->column('is_sale', __('Is sale'))->switch(BoolCode::BOOL_TRUE_FALSE_SWITCH);
        $grid->column('is_search', __('Is search'))->switch(BoolCode::BOOL_TRUE_FALSE_SWITCH);
        $grid->column('is_must', __('Is must'))->switch(BoolCode::BOOL_TRUE_FALSE_SWITCH);
        $grid->column('is_multi', __('Is multi'))->switch(BoolCode::BOOL_TRUE_FALSE_SWITCH);
        $grid->column('status', __('Status'))->switch(BoolCode::BOOL_ON_OFF_SWITCH);
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(PropertyNameModel::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Property Name'));
        $show->field('category', __('Category Name'))->as(function (){
            return $this->category->cate_name;
        });
        $show->field('is_allow_alias', __('Is allow alias'));
        $show->field('is_color', __('Is color'));
        $show->field('is_enum', __('Is enum'));
        $show->field('is_input', __('Is input'));
        $show->field('is_key', __('Is key'));
        $show->field('is_sale', __('Is sale'));
        $show->field('is_search', __('Is search'));
        $show->field('is_must', __('Is must'));
        $show->field('is_multi', __('Is multi'));
        $show->field('status', __('Status'));
        $show->field('sort', __('Sort'));
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
        $form = new Form(new PropertyNameModel());

        $form->text('title', __('Property Name'));
        $form->select('cate_id', __('Category Name'))->options(CategoriesModel::selectOptions());
        $form->switch('is_allow_alias', __('Is allow alias'));
        $form->switch('is_color', __('Is color'));
        $form->switch('is_enum', __('Is enum'));
        $form->switch('is_input', __('Is input'));
        $form->switch('is_key', __('Is key'));
        $form->switch('is_sale', __('Is sale'));
        $form->switch('is_search', __('Is search'));
        $form->switch('is_must', __('Is must'));
        $form->switch('is_multi', __('Is multi'));
        $form->switch('status', __('Status'))->default(BoolCode::IS_TRUE);
        $form->number('sort', __('Sort'))->default(99);

        return $form;
    }
}
