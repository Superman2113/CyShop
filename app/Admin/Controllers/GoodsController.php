<?php

namespace App\Admin\Controllers;

use App\Codes\BoolCode;
use App\Models\BrandModel;
use App\Models\CategoriesModel;
use App\Models\GoodsModel;
use App\Models\PropertyNameModel;
use App\Models\PropertyValueModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\RedirectResponse;
use PhpParser\Node\Expr\New_;
use function foo\func;

class GoodsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '商品';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new GoodsModel());

        $grid->column('id', __('Id'));
        $grid->column('goods_name', __('Goods name'));
        $grid->column('goods_image', __('Goods Master Image'))->display(function (){
            return $this->images()->where('is_master', BoolCode::IS_TRUE)->first()->link;
        })->image('', 80, 80); // 显示商品主图
        $grid->column('brand_name', __('Brand name'))->display(function (){
            return $this->brand->brand_name;
        }); // 品牌名称
        $grid->column('cate_name', __('Category Name'))->display(function (){
            return $this->category->cate_name;
        });
        $grid->column('price', __('Rmb Price'))->display(function (){
            return $this->price / 100;
        });
        $grid->column('original', __('Rmb Original'))->display(function (){
            return $this->original / 100;
        });
        $grid->column('tags', __('Tags'));
        $grid->column('is_sale', __('Is on sale'))->switch(BoolCode::BOOL_TRUE_FALSE_SWITCH);
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        $grid->quickSearch(function ($model, $query){
            $model->whereHas('brand', function ($model) use ($query){
                $model->where('brand_name', 'like', "%{$query}%");
            })->orWhere('goods_name', 'like', "%{$query}%")
             ->orWhereHas('category', function ($model) use ($query){
                 $model->where('cate_name', 'like', "%${query}%");
             });
        })->placeholder('输入分类,品牌,商品名称搜索');

        $grid->actions(function ($actions) {
            // 去掉显示按钮
            $actions->disableView();
        });

        return $grid;
    }

    /**
     * 详情显示
     * @param $id
     * @return RedirectResponse
     */
    protected function detail($id)
    {
        return redirect()->route('goods.edit', ['id' => $id]);
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new GoodsModel());

        $form->text('goods_name', __('Goods name'));
        $form->select('brand_id', __('Brand Name'))->options(BrandModel::pluck('brand_name', 'id'));
        $form->select('cate_id', __('Category Name'))->options(CategoriesModel::selectOptions());
        $form->hasMany('images', __('Goods Images'), function (Form\NestedForm $form){
            $form->image('link', __('Upload Image'));
            $form->number('position', __('Position'));
            $form->switch('is_master', __('Is Master Image'))->default(BoolCode::IS_FALSE);
        });

        $form->hasMany('sku', __('Goods Sku'), function (Form\NestedForm $form){
            $form->text('title', __('Sku Name'));
            $form->number('num', __('Sku Num'));
            $form->number('price', __('Price'));
            $form->text('goods_code', __('Goods Code'));
            $form->text('bar_code', __('Bar Code'));
            $form->switch('status', __('Sku Status'))->default(BoolCode::IS_TRUE);
        });

        $form->number('price', __('Rmb Price'));
        $form->number('original', __('Rmb Original'));
        $form->hasMany('property', __('Goods Properties'), function (Form\NestedForm $form){
            $form->select('prop_name_id', __('Property Name'))->options(PropertyNameModel::pluck('title', 'id'));
            $form->select('prop_value_id', __('Property Value'))->options(PropertyValueModel::pluck('title', 'id'));
        });
        $form->tags('tags', __('Tags'));
        $form->editor('content', __('Goods Content'));
        $form->editor('summary', __('Goods Summary'));
        $form->switch('is_sale', __('Is on sale'))->default(BoolCode::IS_TRUE);

        return $form;
    }
}
