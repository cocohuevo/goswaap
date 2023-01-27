<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create(['firstname' => 'admin', 'surname' => 'admin', 'email' => 'admin@admin.com','type' => 'admin', 'password' => '12345678','boscoins'=> 1000,'address' => 'admin','mobile' =>'123456789','assessment'=>'0','task_id'=> 1]);
    }
}
