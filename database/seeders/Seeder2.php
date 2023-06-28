<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Seeder2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Library::factory(1)->create();
        \App\Models\Shelf::factory(10)->create();
        \App\Models\Book::factory(1000)->create();
    }
}
