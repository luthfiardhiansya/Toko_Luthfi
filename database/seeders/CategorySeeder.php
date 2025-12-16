<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Elektronik',
                'slug' => 'elektronik',
                'description' => 'Perangkat elektronik seperti smartphone, laptop, dan gadget lainnya',
                'is_active' => true,
            ],
            [
                'name' => 'Fasion pria',
                'slug' => 'fasion-pria',
                'description' => 'Pakaian, sepatu',
                'is_active' => true,
            ]
        ];
    }
}
