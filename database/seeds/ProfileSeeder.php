<?php

use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profile')->insert([
        	['avatar'=>'avt1.jpg', 'full_name'=>'Le Duc Huy', 'gender'=>'1', 'user_id'=>'1', 'birthday'=>'1995-03-14'],
        	['avatar'=>'avt2.jpg', 'full_name'=>'Tony Chopper', 'gender'=>'1', 'user_id'=>'2', 'birthday'=>'1990-01-10']
    	]);
    }
}
