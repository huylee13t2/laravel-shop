<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorys')->insert([
        	['title'=>'car'],
        	['title'=>'house'],
        	['title'=>'food']
    	]);
    }
}
