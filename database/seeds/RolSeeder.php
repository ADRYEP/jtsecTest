<?php

use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        DB::table('rols')->insert([
            'name' => 'Responsable'
        ]);
        DB::table('rols')->insert([
            'name' => 'Participant'
        ]);
        DB::table('rols')->insert([
            'name' => 'All'
        ]);
    }
}
