<?php

use Illuminate\Database\Seeder;

class EntreesTableSeeder extends Seeder
{
    
    public function run()
    {
        factory(App\Entrees::class, 50)->create();
    }
}
