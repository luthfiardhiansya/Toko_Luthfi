<?php
// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('Starting database seeding');

        User::factory()->create([
            'email'             => 'admin@example.com',
            'name'              => 'Administrator',
            'role'              => 'admin',
            'email_verified_at' => now(),
        ]);
        $this->command->info('Admin user created: admin@example.com');

        User::factory(10)->create(['role' => 'customer']);
        $this->command->info('10 customer users created');

        $this->call(CategorySeeder::class);

        Product::factory(50)->create();
        $this->command->info('50 products created');

        Product::factory(8)->featured()->create();
        $this->command->info('8 featured products created');

        $this->command->newLine();
        $this->command->info('Database seeding completed!');
        $this->command->info('Admin login: admin@example.com / password');
    }
}
