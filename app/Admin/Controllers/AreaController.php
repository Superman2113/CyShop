<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AreaModel;
use App\Models\CategoriesModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Show;
use Encore\Admin\Tree;
use Encore\Admin\Widgets\Box;
use Illuminate\Http\RedirectResponse;

class AreaController extends Controller
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
        return $content->title('地区')
            ->description('列表')
            ->row(function (Row $row){
                // 显示分类树状图
                $row->column(6, $this->treeView()->render());

                $row->column(6, function (Column $column){
                    $form = new \Encore\Admin\Widgets\Form();
                    $form->action(admin_url('area'));
                    $form->select('pid', __('Parent Area'))->options(AreaModel::selectOptions());
                    $form->text('name', __('Area Name'))->required();
                    $form->text('code', __('Area Code'))->required();
                    $form->number('sort', __('Asc Sort'))->default(99)->help('越小越靠前');
                    $form->hidden('_token')->default(csrf_token());
                    $column->append((new Box(__('area.new'), $form))->style('success'));
                });

            });
    }


    /**
     * 树状视图
     * @return Tree
     */
    protected function treeView()
    {
        return  AreaModel::tree(function (Tree $tree){
            $tree->disableCreate(); // 关闭新增按钮
            $tree->branch(function ($branch) {
                return "<strong>{$branch['name']}</strong>"; // 标题添加strong标签
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
        return redirect()->route('area.edit', ['id' => $id]);
    }

    /**
     * 编辑
     * @param $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content->title(__('Area'))
            ->description(__('edit'))
            ->row($this->form()->edit($id));
    }


    /**
     * 表单
     * @return Form
     */
    public function form()
    {
        $form = new Form(new AreaModel());
        $form->select('pid', __('Parent Area'))->options(AreaModel::selectOptions());
        $form->text('name', __('Area Name'))->required();
        $form->text('code', __('Area Code'))->required();
        $form->number('sort', __('Asc Sort'))->default(99)->help('越小越靠前');
        return $form;
    }
}
