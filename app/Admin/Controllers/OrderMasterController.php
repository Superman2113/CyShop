<?php

namespace App\Admin\Controllers;

use App\Codes\OrderStatusCode;
use App\Codes\PaymentCode;
use App\Models\GoodsModel;
use App\Models\OrderMasterModel;
use App\Models\UserAddressModel;
use App\Models\UsersModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\RedirectResponse;

class OrderMasterController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '订单';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new OrderMasterModel());

        $grid->column('id', __('Id'));
        $grid->column('user.nickname', __('username'));
        $grid->column('order_no', __('Order no'));
        $grid->column('shipping_user', __('Shipping user'));

        $grid->column('payment_method', __('Payment method'))->display(function (){
            return PaymentCode::PAYMENT_MAP[$this->payment_method];
        });
        $grid->column('order_money', __('Order money'))->display(function (){
            return $this->order_money / 100;
        });
        $grid->column('district_money', __('District money'))->display(function (){
            return $this->district_money / 100;
        });
        $grid->column('shipping_money', __('Shipping money'))->display(function (){
            return $this->shipping_money / 100;
        });
        $grid->column('pay_money', __('Pay money'))->display(function (){
            return $this->pay_money / 100;
        });
        $grid->column('shipping_comp_name', __('Shipping comp name'));
        $grid->column('shipping_no', __('Shipping no'));
        $grid->column('order_time', __('Order time'));
        $grid->column('shipping_time', __('Shipping time'));
        $grid->column('pay_time', __('Pay time'));
        $grid->column('receive_time', __('Receive time'));
        $grid->column('order_status', __('Order status'))->select(OrderStatusCode::ORDER_STATUS_MAP);
        $grid->column('order_point', __('Order point'));
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
        return redirect()->route('order', ['id'=>$id]);
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new OrderMasterModel());

        $form->select('user_id', __('username'))->options(UsersModel::pluck('name', 'id'));
        $form->text('order_no', __('Order no'));
        $form->text('shipping_user', __('Shipping user'));
        $form->hasMany('detail', __('Order detail'), function (Form\NestedForm $form){
            $form->select('goods_id', __('Goods Name'))->options(GoodsModel::pluck('goods_name', 'id'));
            $form->number('buy_num', __('Buy num'));
            $form->currency('single_price', __('Single price'));
            $form->currency('average_cost', __('Average const'));
            $form->currency('fee_money', __('Fee money'));
        });
        $form->select('address_id', __('Order address'))->options(UserAddressModel::pluck('address', 'id'));
        $form->select('payment_method', __('Payment method'))->options(PaymentCode::PAYMENT_MAP);
        $form->currency('order_money', __('Order money'));
        $form->currency('district_money', __('District money'));
        $form->currency('shipping_money', __('Shipping money'));
        $form->currency('pay_money', __('Pay money'));
        $form->text('shipping_comp_name', __('Shipping comp name'));
        $form->text('shipping_no', __('Shipping no'));
        $form->datetime('order_time', __('Order time'))->default(date('Y-m-d H:i:s'));
        $form->datetime('shipping_time', __('Shipping time'))->default(date('Y-m-d H:i:s'));
        $form->datetime('pay_time', __('Pay time'))->default(date('Y-m-d H:i:s'));
        $form->datetime('receive_time', __('Receive time'))->default(date('Y-m-d H:i:s'));
        $form->select('order_status', __('Order status'))->options(OrderStatusCode::ORDER_STATUS_MAP);
        $form->number('order_point', __('Order point'))->default(1);

        return $form;
    }
}
