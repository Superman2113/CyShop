<?php

namespace App\Admin\Controllers;

use App\Models\CategoriesModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CategoriesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '分类';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CategoriesModel());

        $grid->column('id', __('Id'));
        $grid->column('cate_name', __('Category Name'));
        $grid->column('parent_category', __('Parent Category'))->display(function (){
            return $this->parent->cate_name ?? '顶级分类';
        });
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->quickSearch('cate_name')->placeholder('输入分类名称搜索');
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
        $show = new Show(CategoriesModel::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('parent_category', __('Parent Category'))->as(function (){
            return $this->parent->cate_name ?? '顶级分类';
        });
        $show->field('cate_name', __('Category Name'));
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
        $form = new Form(new CategoriesModel());

        $form->number('pid', __('Pid'));
        $form->text('cate_name', __('Cate name'));
        $form->number('sort', __('Sort'))->default(99);

        return $form;
    }
}
