<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Painter'],
            ['name' => 'Electrician'],
            ['name' => 'Plumber'],
            ['name' => 'Photography'],
            ['name' => 'Carpentry'],
            ['name' => 'Computer Services']
        ];

        foreach ($categories as $row) 
        {
            Category::create($row);
        }
    }
}
