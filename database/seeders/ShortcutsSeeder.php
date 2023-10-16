<?php

namespace Database\Seeders;

use App\Models\Shortcut;
use App\Models\User;
use Illuminate\Database\Seeder;

class ShortcutsSeeder extends Seeder
{
    public function run(): void
    {
        Shortcut::factory(15)->create();
    }
}
