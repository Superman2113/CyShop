<?php

namespace App\Admin\Controllers;

use App\Models\ShippingInfoModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\RedirectResponse;

class ShippingInfoController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '物流';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ShippingInfoModel());

        $grid->column('id', __('Id'));
        $grid->column('ship_name', __('Ship name'));
        $grid->column('ship_contact', __('Ship contact'));
        $grid->column('ship_phone', __('Ship phone'));
        $grid->column('price', __('Ship price'))->display(function (){
            return $this->price /= 100;
        });
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    protected function detail($id)
    {
        return redirect()->route('shipping-info', ['id'=>$id]);
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ShippingInfoModel());

        $form->text('ship_name', __('Ship name'));
        $form->text('ship_contact', __('Ship contact'));
        $form->text('ship_phone', __('Ship phone'));
        $form->currency('price', __('Ship price'));
        $form->saving(function (Form $form){
           $form->price *= 100;
        });

        return $form;
    }
}
