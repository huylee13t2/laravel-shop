<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	['name'=>'huylee', 'email'=>'huylee@gmail.com', 'password'=>bcrypt('A123123Z')],
        	['name'=>'tony', 'email'=>'tony@gmail.com', 'password'=>bcrypt('A123123Z')],
        	['name'=>'lavie', 'email'=>'lavie@gmail.com', 'password'=>bcrypt('A123123Z')]
    	]);
    }
}
