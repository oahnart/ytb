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
        //
        $data= [
          [
              'email' => 'admin@admin.com',
              'password'=> bcrypt('12345678'), // ma hoa
              'level'=>'1'
          ],
          [
              'email' => 'tranhao@gmail.com',
              'password'=> bcrypt('123456'), // ma hoa
              'level'=>'1'
          ]
        ];
        DB::table('vp_users')->insert($data);
        //php artisan db:seed --class=UserTableSeeder
    }
}
