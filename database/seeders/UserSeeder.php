<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public const EMAIL = 'root@gmail.com';
    public const NAME = 'Root';

    public function run(): void
    {
        User::factory(1)->create([
            'email' => self::EMAIL,
            'name' => self::NAME,
            'password' => bcrypt('Abc123')
        ]);
    }
}
