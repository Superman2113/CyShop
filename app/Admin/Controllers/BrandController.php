<?php

namespace App\Admin\Controllers;

use App\Models\BrandModel;
use App\Models\CategoriesModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BrandController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '品牌';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new BrandModel());

        $grid->column('id', __('Id'));
        $grid->column('brand_name', __('Brand Name'));
        $grid->column('desc', __('Desc'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        // 分类名称/品牌名称搜索
        $grid->quickSearch(function ($model, $query){
            $model->whereHas('category', function ($model) use ($query){
                $model->where('cate_name', 'like', "%{$query}%");
            })->orWhere('brand_name', 'like', "%{$query}%");
        })->placeholder('输入分类/品牌搜索');

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
        $show = new Show(BrandModel::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('cate_id', __('Cate id'));
        $show->field('brand_name', __('Brand name'));
        $show->field('desc', __('Desc'));
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
        $form = new Form(new BrandModel());
        $form->text('brand_name', __('Brand Name'));
        $form->text('desc', __('Desc'));
        $form->number('sort', __('Asc Sort'))->default(99);

        return $form;
    }
}
