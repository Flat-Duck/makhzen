<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);
        $this->call(PermissionsSeeder::class);

        $this->call(InvoiceSeeder::class);
        $this->call(IssueSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(OfficeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(OrderSeeder::class);
    }
}
