<?php

namespace Database\Seeders;

use Database\Factories\ColorHexProvider;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(ShortcutsSeeder::class);
    }
}
