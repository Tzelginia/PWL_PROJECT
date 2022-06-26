<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            'verify' => '1'
        ]);

        User::create([
            'username' => 'Tzelginianc',
            'email' => 'tzelginianc@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'pembeli',
            'verify' => '1'
        ]);

        Category::create([
            'nama_category' => 'Kursi',
        ]);

        Category::create([
            'nama_category' => 'Meja',
        ]);
    }
}
