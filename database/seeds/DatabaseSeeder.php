<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(ActivitySeeder::class);
        $this->call(IncidentSeeder::class);
        $this->call(UsersActivitySeeder::class);
        $this->call(UsersProjectSeeder::class);
    }
}
