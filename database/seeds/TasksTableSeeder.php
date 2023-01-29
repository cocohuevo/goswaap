<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Task::create(['num_boscoins' => 10, 'description' => 'Formatear pc', 'date_request' => '2023-01-17','date_completian' => '2023-01-17', 'type' => 'informática']);   
    }
}
