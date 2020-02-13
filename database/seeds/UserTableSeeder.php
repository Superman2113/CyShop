<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i<100; $i++) {
            $user_id = \App\Models\UsersModel::insertGetId(
                [
                    'name' => 'user' . $i,
                    'password' => bcrypt('12345678'),
                    'created_at' => date('Y-m-d H:i:s', time()),
                    'updated_at' => date('Y-m-d H:i:s', time())
                ]
            );
            \App\Models\UserInfoModel::insert([
                'user_id' => $user_id,
                'nickname' => '用户:' . $user_id,
                'avatar'   => 'imgs/u=1906469856,4113625838&fm=26&gp=0.jpg',
                'sex'      => 1,
            ]);
        }
    }
}
