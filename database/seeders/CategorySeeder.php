<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;

use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Painter',
                'icon_path' => 'category/painter.jpg'
            ],
            [
                'name' => 'Electrician',
                'icon_path' => 'category/electrician.jpg'
            ],
            [
                'name' => 'Plumber',
                'icon_path' => 'category/plumber.jpg'
            ],
            [
                'name' => 'Photography',
                'icon_path' => 'category/photography.jpg'
            ],
            [
                'name' => 'Carpentry',
                'icon_path' => 'category/carpentry.jpg'
            ],
            [
                'name' => 'Computer Services',
                'icon_path' => 'category/computer_services.jpg'
            ],
        ];

        foreach ($categories as $row) 
        {
            Category::create($row);
        }
    }
}
