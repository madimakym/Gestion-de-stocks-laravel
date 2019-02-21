<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        $this->call(SaladesTableSeeder::class);
        $this->call(EntreesTableSeeder::class);
    }
}
