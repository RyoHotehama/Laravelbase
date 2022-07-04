<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SwimTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'date' => '2022-07-02',
            'distance' => '25',
            'number' => '4',
            'set' => '2',
            'time' => '01:00',
            'body' => 'よろしく',
            'practice_number' => '1',
            'user_id' => '1',
        ];
        DB::table('swim')->insert($param);

        $param = [
            'date' => '2022-07-02',
            'distance' => '50',
            'number' => '4',
            'set' => '2',
            'time' => '01:30',
            'practice_number' => '1',
            'user_id' => '1',
        ];
        DB::table('swim')->insert($param);

        $param = [
            'date' => '2022-07-02',
            'distance' => '25',
            'number' => '4',
            'set' => '2',
            'time' => '01:00',
            'body' => 'よろしくねん',
            'practice_number' => '2',
            'user_id' => '1',
        ];
        DB::table('swim')->insert($param);
    }
}
