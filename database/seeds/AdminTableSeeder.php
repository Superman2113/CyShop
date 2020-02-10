<?php

use Illuminate\Database\Seeder;

use Encore\Admin\Auth\Database\{Administrator, Menu, Role, Permission};


class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create a user.
        Administrator::truncate();
        Administrator::create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'name'     => '超级管理员',
        ]);

        // create a role.
        Role::truncate();
        Role::create([
            'name' => '超级管理员',
            'slug' => 'administrator',
        ]);

        // add role to user.
        Administrator::first()->roles()->save(Role::first());

        //create a permission
        Permission::truncate();
        Permission::insert([
            [
                'name'        => '所有权限',
                'slug'        => '*',
                'http_method' => '',
                'http_path'   => '*',
            ],
            [
                'name'        => '仪表盘',
                'slug'        => 'dashboard',
                'http_method' => 'GET',
                'http_path'   => '/',
            ],
            [
                'name'        => '登录',
                'slug'        => 'auth.login',
                'http_method' => '',
                'http_path'   => "/auth/login\r\n/auth/logout",
            ],
            [
                'name'        => '用户设置',
                'slug'        => 'auth.setting',
                'http_method' => 'GET,PUT',
                'http_path'   => '/auth/setting',
            ],
            [
                'name'        => '权限管理',
                'slug'        => 'auth.management',
                'http_method' => '',
                'http_path'   => "/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs",
            ],
        ]);

        Role::first()->permissions()->save(Permission::first());

        // add default menus.
        Menu::truncate();
        Menu::insert([
            [
                'parent_id' => 0,
                'order'     => 1,
                'title'     => '仪表盘',
                'icon'      => 'fa-bar-chart',
                'uri'       => '/',
            ],  // 1
            [
                'parent_id' => 0,
                'order'     => 2,
                'title'     => '权限管理',
                'icon'      => 'fa-tasks',
                'uri'       => '',
            ], // 2
            [
                'parent_id' => 2,
                'order'     => 3,
                'title'     => '用户列表',
                'icon'      => 'fa-users',
                'uri'       => 'auth/users',
            ], // 3
            [
                'parent_id' => 2,
                'order'     => 4,
                'title'     => '角色列表',
                'icon'      => 'fa-user',
                'uri'       => 'auth/roles',
            ], // 4
            [
                'parent_id' => 2,
                'order'     => 5,
                'title'     => '权限列表',
                'icon'      => 'fa-ban',
                'uri'       => 'auth/permissions',
            ], // 5
            [
                'parent_id' => 2,
                'order'     => 6,
                'title'     => '菜单列表',
                'icon'      => 'fa-bars',
                'uri'       => 'auth/menu',
            ], // 6
            [
                'parent_id' => 2,
                'order'     => 7,
                'title'     => '操作日志',
                'icon'      => 'fa-history',
                'uri'       => 'auth/logs',
            ], // 7

            [
                'parent_id' => 0,
                'order'     => 8,
                'title'     => '用户管理',
                'icon'      => 'fa-tasks',
                'uri'       => '',
            ], // 8

            [
                'parent_id' => 8,
                'order'     => 9,
                'title'     => '用户列表',
                'icon'      => 'fa-users',
                'uri'       => 'users'
            ], // 9

            [
                'parent_id' => 0,
                'order'     => 10,
                'title'     => '商品管理',
                'icon'      => 'fa-tasks',
                'uri'       => '',
            ],  // 10

            [
                'parent_id' => 10,
                'order'     => 11,
                'title'     => '分类列表',
                'icon'      => 'fa-bars',
                'uri'       => 'categories',
            ],  // 11

            [
                'parent_id' => 10,
                'order'     => 11,
                'title'     => '品牌列表',
                'icon'      => 'fa-bars',
                'uri'       => 'brand'
            ]
        ]);

        // add role to menu.
        Menu::find(2)->roles()->save(Role::first());
    }
}
