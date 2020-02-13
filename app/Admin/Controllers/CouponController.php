<?php

namespace App\Admin\Controllers;

use App\Codes\BoolCode;
use App\Codes\CouponCode;
use App\Models\CouponModel;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\RedirectResponse;

class CouponController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '优惠券码';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CouponModel());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Coupon Name'));
        $grid->column('money', __('Coupon Money'))->display(function (){
            return $this->money / 100;
        });
        $grid->column('coupon_type', __('Coupon Type'))->display(function (){
            return CouponCode::COUPON_TYPE_MAP[$this->coupon_type];
        });
        $grid->column('discount', __('Coupon Discount'))->display(function (){
            return $this->discount > 0 ? 1 : '不打折';
        });
        $grid->column('min_order_money', __('Min Order Money'))->display(function (){
            return $this->min_order_money / 100;
        });
        $grid->column('coupon_num', __('Coupon Num'));
        $grid->column('send_start_date', __('Send Start Date'));
        $grid->column('send_end_date', __('Send End Date'));
        $grid->column('use_start_date', __('Use Start Date'));
        $grid->column('use_end_date', __('Use End Date'));
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
        return redirect()->route('coupon', ['id'=>$id]);
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new CouponModel());

        $form->text('name', __('Coupon Name'));
        $form->currency('money', __('Coupon Money'))->symbol('￥');
        $form->select('coupon_type', __('Coupon Type'))->options(CouponCode::COUPON_TYPE_MAP);
        $form->number('discount', __('Coupon Discount'))->default(0)->max(9);
        $form->currency('min_order_money', __('Min Order Money'))->default(100)->symbol('￥');
        $form->number('coupon_num', __('Coupon Num'))->default(1);
        $form->date('send_start_date', __('Send Start Date'))->default(date('Y-m-d'));
        $form->date('send_end_date', __('Send End Date'))->default(date('Y-m-d'));
        $form->datetime('use_start_date', __('Use Start Date'))->default(date('Y-m-d H:i:s'));
        $form->datetime('use_end_date', __('Use End Date'))->default(date('Y-m-d H:i:s'));
        $form->saving(function (Form $form){
            $form->money *= 100;
            $form->min_order_money *= 100;
            // 额外表单验证省略
        });
        return $form;
    }
}
