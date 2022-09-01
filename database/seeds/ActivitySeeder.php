<?php

use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('activities')->insert([
            'name' => 'Activity1P1',
            'project_id' => 1
        ]);
        DB::table('activities')->insert([
            'name' => 'Activity2P1',
            'project_id' => 1
        ]);
        DB::table('activities')->insert([
            'name' => 'Activity1P2',
            'project_id' => 2
        ]);
        DB::table('activities')->insert([
            'name' => 'Activity2P2',
            'project_id' => 2
        ]);
        DB::table('activities')->insert([
            'name' => 'Activity1P3',
            'project_id' => 3
        ]);
    }
}
