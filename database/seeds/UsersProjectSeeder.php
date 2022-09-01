<?php

use Illuminate\Database\Seeder;

class UsersProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        DB::table('users_projects')->insert([
            'user_id' => 1,
            'project_id' => 1,
            'rol_id' => 1
        ]);
        DB::table('users_projects')->insert([
            'user_id' => 1,
            'project_id' => 2,
            'rol_id' => 2
        ]);
    }
}
