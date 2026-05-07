<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    /* public function run(): void
    {
        //
    } */
    public function run() {

    \App\Models\Category::create(['name' => 'Laptops']);
    \App\Models\Category::create(['name' => 'Monitores']);
    \App\Models\Category::create(['name' => 'Accesorios']);
    
    }
}
