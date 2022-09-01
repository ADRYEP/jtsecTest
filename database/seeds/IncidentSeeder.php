<?php

use Illuminate\Database\Seeder;

class IncidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('incidents')->insert([
            'name' => 'Incident 1',
            'activity_id' => 4
        ]);
        DB::table('incidents')->insert([
            'name' => 'Incident 2',
            'activity_id' => 4
        ]);
        DB::table('incidents')->insert([
            'name' => 'Incident 3',
            'activity_id' => 2
        ]);
    }
}
