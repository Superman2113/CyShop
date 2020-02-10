<?php

namespace App\Admin\Controllers;

use App\Models\CategoriesModel;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Layout\{Column, Row, Content};
use Encore\Admin\{Tree,Form};
use Encore\Admin\Widgets\Box;
use Illuminate\Http\RedirectResponse;


/**
 * 分类管理
 * @package App\Admin\Controllers
 */
class CategoriesController extends Content
{
    use HasResourceActions;

    protected $title = '分类';

    /**
     * 首页
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content->title('分类')
            ->description('列表')
            ->row(function (Row $row){
                // 显示分类树状图
                $row->column(6, $this->treeView()->render());

                $row->column(6, function (Column $column){
                    $form = new \Encore\Admin\Widgets\Form();
                    $form->action(admin_url('categories'));
                    $form->select('pid', __('Parent Category'))->options(CategoriesModel::selectOptions());
                    $form->text('cate_name', __('Category Name'))->required();
                    $form->number('sort', __('Asc Sort'))->default(99)->help('越小越靠前');
                    $form->hidden('_token')->default(csrf_token());
                    $column->append((new Box(__('category.new'), $form))->style('success'));
                });

            });
    }


    /**
     * 树状视图
     * @return Tree
     */
    protected function treeView()
    {
        return  CategoriesModel::tree(function (Tree $tree){
            $tree->disableCreate(); // 关闭新增按钮
            $tree->branch(function ($branch) {
                return "<strong>{$branch['cate_name']}</strong>"; // 标题添加strong标签
            });
        });
    }

    /**
     * 详情页
     * @param $id
     * @return RedirectResponse
     */
    public function show($id)
    {
        return redirect()->route('categories.edit', ['id' => $id]);
    }

    /**
     * 编辑
     * @param $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content->title(__('Categories'))
            ->description(__('edit'))
            ->row($this->form()->edit($id));
    }


    /**
     * 表单
     * @return Form
     */
    public function form()
    {
        $form = new Form(new CategoriesModel());

        $form->display('id', 'ID');
        $form->select('pid', __('Parent Category'))->options(CategoriesModel::selectOptions());
        $form->text('cate_name', __('Category Name'))->required();
        $form->number('sort', __('Asc Sort'))->default(99)->help('越小越靠前');
        return $form;
    }

}
