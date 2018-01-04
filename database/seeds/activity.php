<?php

use Illuminate\Database\Seeder;

class activity extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activities')->insert(array(
            [
            'activity' => str_random(10),
            'result' => str_random(10),
            'follow_up' => str_random(10),
             ],
             [
            'activity' => str_random(10),
            'result' => str_random(10),
            'follow_up' => str_random(10),
             ],
             [
            'activity' => str_random(10),
            'result' => str_random(10),
            'follow_up' => str_random(10),
             ],
             [
            'activity' => str_random(10),
            'result' => str_random(10),
            'follow_up' => str_random(10),
             ],
             [
            'activity' => str_random(10),
            'result' => str_random(10),
            'follow_up' => str_random(10),
             ],
             [
            'activity' => str_random(10),
            'result' => str_random(10),
            'follow_up' => str_random(10),
             ],
             [
            'activity' => str_random(10),
            'result' => str_random(10),
            'follow_up' => str_random(10),
             ],
             [
            'activity' => str_random(10),
            'result' => str_random(10),
            'follow_up' => str_random(10),
             ],
             [
            'activity' => str_random(10),
            'result' => str_random(10),
            'follow_up' => str_random(10),
             ],
             [
            'activity' => str_random(10),
            'result' => str_random(10),
            'follow_up' => str_random(10),
             ],
        ));
    }
}
