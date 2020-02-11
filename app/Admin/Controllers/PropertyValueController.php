<?php

namespace App\Admin\Controllers;

use App\Codes\BoolCode;
use App\Models\CategoriesModel;
use App\Models\PropertyNameModel;
use App\Models\PropertyValueModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PropertyValueController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '属性值';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PropertyValueModel());

        $grid->column('id', __('Id'));
        $grid->column('prop_value', __('Property Name'))->display(function (){
            return $this->property_name->title;
        });
        $grid->column('title', __('Property Value'));
        $grid->column('category', __('Category Name'))->display(function (){
            return $this->category->cate_name;
        });
        $grid->column('status', __('Status'))->switch(BoolCode::BOOL_ON_OFF_SWITCH);
        $grid->column('sort', __('Sort'));
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
        $show = new Show(PropertyValueModel::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('prop_name_id', __('Prop name id'));
        $show->field('cate_id', __('Cate id'));
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
        $form = new Form(new PropertyValueModel());
        $form->select('prop_name_id', __('Property Name'))->options(PropertyNameModel::pluck('title','id'));
        $form->text('title', __('Property Value'));
        $form->select('cate_id', __('Category Name'))->options(CategoriesModel::selectOptions());
        $form->switch('status', __('Status'))->default(BoolCode::IS_TRUE);
        $form->number('sort', __('Sort'))->default(99);

        return $form;
    }
}
