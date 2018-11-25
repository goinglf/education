<?php

use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //2018-11-25
        $faker = \Faker\Factory::create('zh-CN');
        $data = [];
        for ($i=0;$i<100;$i++) {
            $data[] = [
                'username'  =>  $faker->userName,
                'password'  =>  bcrypt('123456'),
                'gender'    =>  rand(1,3),
                'mobile'    =>  $faker->phoneNumber,
                'email'     =>  $faker->email,
                'avatar'    =>  '/statics/avatar.jpg',
                'created_at' =>  date('Y-m-d H:i:s'),
                'type'      =>  rand(1,2),
                'status'    =>  rand(1,2)
            ];
        }
        DB::table('member')->insert($data);
    }
}
