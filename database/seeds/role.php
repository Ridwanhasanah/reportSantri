<?php

use Illuminate\Database\Seeder;

class role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        DB::table('roles')->insert(array(
        	[
        		'name' => 'master'
        	],
        	[
        		'name' => 'admin'
        	],
        	[
        		'name' => 'teacher'
        	],
        	[
        		'name' => 'student'
        	]
        )
    );
    
    }
}
