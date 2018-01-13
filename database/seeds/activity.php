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
            'user_id' => 1,
             ],
             [
            'activity' => str_random(10),
            'result' => str_random(10),
            'follow_up' => str_random(10),
            'user_id' => 1,
             ],
             [
            'activity' => str_random(10),
            'result' => str_random(10),
            'follow_up' => str_random(10),
            'user_id' => 2,
             ],
             [
            'activity' => str_random(10),
            'result' => str_random(10),
            'follow_up' => str_random(10),
            'user_id' => 2,
             ],
             [
            'activity' => str_random(10),
            'result' => str_random(10),
            'follow_up' => str_random(10),
            'user_id' => 3,
             ],
             [
            'activity' => str_random(10),
            'result' => str_random(10),
            'follow_up' => str_random(10),
            'user_id' => 3,
             ],
             [
            'activity' => str_random(10),
            'result' => str_random(10),
            'follow_up' => str_random(10),
            'user_id' => 4,
             ],
             [
            'activity' => str_random(10),
            'result' => str_random(10),
            'follow_up' => str_random(10),
            'user_id' => 4,
             ],
             [
            'activity' => str_random(10),
            'result' => str_random(10),
            'follow_up' => str_random(10),
            'user_id' => 5,
             ],
             [
            'activity' => str_random(10),
            'result' => str_random(10),
            'follow_up' => str_random(10),
            'user_id' => 5,
             ],
        ));
    }
}
