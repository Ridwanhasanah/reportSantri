<?php

use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
        	[
        		'name' => 'Ridwan',
        		'email' => 'ridwan@gmail.com',
        		'password' => bcrypt('123456'),
        		'address' => 'Jakarta - Yogyakarta',
        		'hp' => '085714442662',
        		'level' => 1
        	],
        	[
        		'name' => 'Ridho',
        		'email' => 'ridho@gmail.com',
        		'password' => bcrypt('123456'),
        		'address' => 'Jakarta - Yogyakarta',
        		'hp' => '085714442662',
        		'level' => 2
        	],
            [
                'name' => 'Lukman',
                'email' => 'lukman@gmail.com',
                'password' => bcrypt('123456'),
                'address' => 'Jakarta - Yogyakarta',
                'hp' => '085714442662',
                'level' => 2
            ],
            [
                'name' => 'Daud',
                'email' => 'daud@gmail.com',
                'password' => bcrypt('123456'),
                'address' => 'Jakarta - Yogyakarta',
                'hp' => '085714442662',
                'level' => 2
            ],
            [
                'name' => 'Hanif',
                'email' => 'hanif@gmail.com',
                'password' => bcrypt('123456'),
                'address' => 'Jakarta - Yogyakarta',
                'hp' => '085714442662',
                'level' => 2
            ],
        ));
    }
}
