<?php

use Illuminate\Database\Seeder;

class goal extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('goals')->insert(array(
          	[
	            'goal' => str_random(10),
	            'option' => str_random(10),
	            'reality' => str_random(10),
    	    ],
    	    [
	            'goal' => str_random(10),
	            'option' => str_random(10),
	            'reality' => str_random(10),
    	    ],
    	    [
	            'goal' => str_random(10),
	            'option' => str_random(10),
	            'reality' => str_random(10),
    	    ],
    	    [
	            'goal' => str_random(10),
	            'option' => str_random(10),
	            'reality' => str_random(10),
    	    ],
    	    [
	            'goal' => str_random(10),
	            'option' => str_random(10),
	            'reality' => str_random(10),
    	    ],
    	    [
	            'goal' => str_random(10),
	            'option' => str_random(10),
	            'reality' => str_random(10),
    	    ],
    	    [
	            'goal' => str_random(10),
	            'option' => str_random(10),
	            'reality' => str_random(10),
    	    ],
    	    [
	            'goal' => str_random(10),
	            'option' => str_random(10),
	            'reality' => str_random(10),
    	    ],
    	    [
	            'goal' => str_random(10),
	            'option' => str_random(10),
	            'reality' => str_random(10),
    	    ],
    	    [
	            'goal' => str_random(10),
	            'option' => str_random(10),
	            'reality' => str_random(10),
    	    ],
    ));
   	}
}
