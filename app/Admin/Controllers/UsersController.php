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
        $grid->column('profile.avatar', __('profile.avatar'))->image('', 80, 80);
        $grid->column('profile.nickname', __('profile.nickname'));
        $grid->column('profile.truename', __('profile.truename'))->display(function (){
            return $this->profile->truename ?? '未填写';
        });

        $grid->column('profile.sex', __('profile.sex'))->replace(UserInfoCode::SEX_MAP);
        $grid->column('profile.point', __('profile.point'));
        $grid->column('profile.mobile', __('profile.mobile'));
        $grid->column('profile.email', __('profile.email'));
        $grid->column('status', __('user.status'))->switch(UserStatusCode::USER_STATUS_MAP);
        $grid->column('created_at', __('Created at'))->sortable();
        $grid->column('updated_at', __('Updated at'))->sortable();

        $grid->actions(function ($actions) {

            // 去掉删除
            $actions->disableDelete();
            // 去掉编辑
            $actions->disableEdit();
        });

        // 账号/昵称/手机/邮箱/搜索
        $grid->quickSearch(function ($model, $query){
            $model->whereHas('profile', function ($model) use ($query){
                $model->where('nickname', 'like', "%{$query}%")
                    ->orWhere('mobile', 'like', "%{$query}")
                    ->orWhere('email', 'like', "%{$query}%");
            })->orWhere('name', 'like', "%{$query}%");
        })->placeholder('输入账号/昵称/手机/邮箱搜索');

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
        $show->field('avatar', __('profile.avatar'))->as(function (){
            return $this->profile->avatar;
        })->image();
        $show->field('nickname', __('profile.nickname'))->as(function (){
           return $this->profile->nickname;
        });
        $show->field('truename', __('profile.truename'))->as(function (){
            return $this->profile->truename;
        });
        $show->field('sex', __('profile.sex'))->as(function (){
            return UserInfoCode::SEX_MAP[$this->profile->sex];
        });
        $show->field('mobile',__('profile.mobile'))->as(function (){
            return $this->profile->mobile;
        });
        $show->field('birthday', __('profile.birthday'))->as(function (){
            return $this->profile->birthday;
        });
        $show->field('email', __('profile.email'))->as(function (){
            return $this->profile->email;
        });
        $show->field('email_verified', __('profile.email_verified'))->as(function (){
            return UserInfoCode::EMAIL_VERIFIED_MAP[$this->profile->email_verified];
        });
        $show->field('email_verified_at', __('profile.email_verified_at'))->as(function (){
            return $this->profile->email_verified_at;
        });
        $show->field('point',__('profile.point'))->as(function (){
            return $this->profile->point;
        });

        $show->field('status', __('user.status'))->as(function (){
            return UserStatusCode::USER_STATUS_MAP[$this->status];
        });
        $show->field('registered_time', __('profile.registered_time'))->as(function (){
            return $this->profile->registered_time;
        });
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        return $show;
    }


}
