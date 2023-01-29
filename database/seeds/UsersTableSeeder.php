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
        App\User::create(['firstname' => 'Admin', 'surname' => 'goswapp', 'email' => 'admin@admin.com','type' => 'admin', 'password' => '123456','boscoins' => '10000','address' => 'calle admin','mobile' => '111111111','assessment' =>'10','task_id' => 1]);
    }
}
