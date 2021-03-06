<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Encore\Admin\Models\User;
use Encore\Admin\Models\Menu;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create a user.
        User::truncate();
        User::create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'name'     => trans('admin.super_administrator'),
        ]);

        // add default menus.
        Menu::truncate();
        Menu::insert([
            [
                'parent_id'     => 0,
                'order'         => 1,
                'title'         => trans('admin.home'),
                'icon'          => 'fas fa-tachometer-alt',
                'uri'           => '/',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'parent_id'     => 0,
                'order'         => 2,
                'title'         => trans('admin.admin'),
                'icon'          => 'fas fa-bars',
                'uri'           => '',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'parent_id'     => 2,
                'order'         => 3,
                'title'         => trans('admin.admin_users'),
                'icon'          => 'fas fa-users',
                'uri'           => 'admin_users',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'parent_id'     => 2,
                'order'         => 4,
                'title'         => trans('admin.admin_menus'),
                'icon'          => 'fas fa-list',
                'uri'           => 'admin_menus',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
