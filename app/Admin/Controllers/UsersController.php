<?php

namespace App\Admin\Controllers;

use App\Codes\UserInfoCode;
use App\Codes\UserStatusCode;
use App\Models\UserInfoModel;
use App\Models\UsersModel;
use App\Repositories\UserRepository;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class UsersController extends AdminController
{

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '用户';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UsersModel());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('name', __('user.name'))->sortable();
        $grid->column('profile.avatar', __('profile.avatar'));
        $grid->column('profile.nickname', __('profile.nickname'));
        $grid->column('profile.truename', __('profile.truename'));
        $grid->column('profile.sex', __('profile.sex'))->replace(UserInfoCode::SEX_MAP);
        $grid->column('profile.point', __('profile.point'));
        $grid->column('profile.mobile', __('profile.mobile'));
        $grid->column('profile.email', __('profile.email'));
        $grid->column('status', __('user.status'))->replace(UserStatusCode::USER_STATUS_MAP);
        $grid->column('created_at', __('Created at'))->sortable();
        $grid->column('updated_at', __('Updated at'))->sortable();

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
        $show = new Show(UsersModel::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('user.name'));
        $show->field('status', __('user.status'));
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
        $form = new Form(new UsersModel());

        $form->text('name', __('Name'));
        $form->password('password', __('Password'));
        $form->switch('status', __('Status'))->default(1);
        $form->text('remember_token', __('Remember token'));

        return $form;
    }
}
