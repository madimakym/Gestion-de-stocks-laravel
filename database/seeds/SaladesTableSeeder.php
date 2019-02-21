<?php

use Illuminate\Database\Seeder;

class SaladesTableSeeder extends Seeder
{
    
    public function run()
    {
        factory(App\Salades::class, 50)->create();
    }
}
