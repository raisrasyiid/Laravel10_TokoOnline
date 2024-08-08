<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Modules\Shop\Database\Seeders\ShopDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        if ($this->command->confirm('Are you sure you want to seed your database again? it will clear old data!')) {
            $this->command->call('migrate:refresh');
            $this->command->info('Data cleared successfully!');
        }

        User::factory()->create();
        $this->command->info('Create User successfully!');

        if ($this->command->confirm('Do you want to to seed sample products?')) {
            $this->call(ShopDatabaseSeeder::class);
        }
    }
}
