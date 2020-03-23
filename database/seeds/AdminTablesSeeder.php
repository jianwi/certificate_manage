<?php


use Illuminate\Database\Seeder;
use \Encore\Admin\Auth\Database\Administrator;
use \Encore\Admin\Auth\Database\Role;
use Encore\Admin\Auth\Database\Permission;
use Encore\Admin\Auth\Database\Menu;


class AdminTablesSeeder extends Seeder
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
        Administrator::insert([
            [
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'name' => 'Administrator',
            ],
            [
                'username' => 'maintainer',
                'password' => bcrypt('maintainer'),
                'name' => '运维',
            ],
            [
                'username' => 'developer',
                'password' => bcrypt('developer'),
                'name' => '开发'
            ]
        ]);

        // create a role.

        Role::truncate();
        Role::insert([
            [
                'name' => 'Administrator',
                'slug' => 'administrator',
            ],
            [
                'name' => 'maintenance',
                'slug' => '运营',
            ],
            [
                'name' => 'development',
                'slug' => '开发'
            ]]);

        // add role to user.
        Administrator::first()->roles()->save(Role::first());
        // developer 用户 授予 development 角色
        Administrator::firstWhere('username', 'developer')->roles()->save(Role::firstWhere('name', 'development'));
        // maintainer 用户 授予 maintenance 角色
        Administrator::firstWhere('username', 'maintainer')->roles()->save(Role::firstWhere('name', 'maintenance'));

//        权限
        //create a permission
        Permission::truncate();
        Permission::insert([
            [
                'name' => 'All permission',
                'slug' => '*',
                'http_method' => '',
                'http_path' => '*',
            ],
            [
                'name' => 'Dashboard',
                'slug' => 'dashboard',
                'http_method' => 'GET',
                'http_path' => '/',
            ],
            [
                'name' => 'Login',
                'slug' => 'auth.login',
                'http_method' => '',
                'http_path' => "/auth/login\r\n/auth/logout",
            ],
            [
                'name' => 'User setting',
                'slug' => 'auth.setting',
                'http_method' => 'GET,PUT',
                'http_path' => '/auth/setting',
            ],
            [
                'name' => 'Auth management',
                'slug' => 'auth.management',
                'http_method' => '',
                'http_path' => "/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs",
            ],
            [
                'name' => 'development',
                'slug' => '开发',
                'http_method' => '',
                'http_path' => "/templates\r\n/templates/*\r\n/api/*\r\n/"
            ],
            [
                'name' => 'maintenance',
                'slug' => '运维',
                'http_method' => '',
                'http_path' => "/activities\r\n/activities/*\r\n/certificates\r\n/certificates/*\r\n/awards\r\n/awards/*\r\n/api/*\r\n/"
            ]
        ]);

        Role::first()->permissions()->save(Permission::first());
        // 运营 角色 授权
        Role::firstWhere('name', 'maintenance')->permissions()->save(Permission::firstWhere('name', 'maintenance'));
        // 开发 角色 授权
        Role::firstWhere('name', 'development')->permissions()->save(Permission::firstWhere('name', 'development'));

        // add default menus.
        Menu::truncate();
        Menu::insert([
            [
                'parent_id' => 0,
                'order' => 2,
                'title' => '后台',
                'icon' => 'fa-tasks',
                'uri' => '',
            ],
            [
                'parent_id' => 0,
                'order' => 0,
                'title' => '运营',
                'icon' => 'fa-bar-chart-o',
                'url' => ''
            ],
            [
                'parent_id' => 0,
                'order' => 0,
                'title' => '开发',
                'icon' => 'fa-bug',
                'url' => ''
            ],
            [
                'parent_id' => 1,
                'order' => 3,
                'title' => '用户',
                'icon' => 'fa-users',
                'uri' => 'auth/users',
            ],
            [
                'parent_id' => 1,
                'order' => 4,
                'title' => '角色',
                'icon' => 'fa-user',
                'uri' => 'auth/roles',
            ],
            [
                'parent_id' => 1,
                'order' => 5,
                'title' => '权限',
                'icon' => 'fa-ban',
                'uri' => 'auth/permissions',
            ],
            [
                'parent_id' => 1,
                'order' => 6,
                'title' => '目录',
                'icon' => 'fa-bars',
                'uri' => 'auth/menu',
            ],
            [
                'parent_id' => 1,
                'order' => 7,
                'title' => '日志',
                'icon' => 'fa-history',
                'uri' => 'auth/logs',
            ],
            [
                'parent_id' => 2,
                'order' => 0,
                'title' => '活动管理',
                'icon' => 'fa-car',
                'url' => 'activities'
            ],
            [
                'parent_id' => 2,
                'order' => 0,
                'title' => '证书管理',
                'icon' => 'fa-inbox',
                'url' => 'certificates'
            ],
            [
                'parent_id' => 3,
                'order' => 0,
                'title' => '模板管理',
                'icon' => 'fa-code',
                'url' => 'templates'
            ]
        ]);

        // add role to menu.
        // 后台目录 的权限给 管理员
        Menu::first()->roles()->save(Role::first());
        // 运营目录 的权限 给 运营 角色
        Menu::find(2)->roles()->save(Role::firstWhere('name','maintenance'));
        // 开发目录 的权限 给 开发角色
        Menu::find(3)->roles()->save(Role::firstWhere('name','development'));
    }
}
