<?php

use Illuminate\Database\Seeder;

class UsersActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        DB::table('users_activities')->insert([
            'user_id' => 1,
            'activity_id' => 2,
            'rol_id' => 1
        ]);
        DB::table('users_activities')->insert([
            'user_id' => 2,
            'activity_id' => 4,
            'rol_id' => 2
        ]);
    }
}
