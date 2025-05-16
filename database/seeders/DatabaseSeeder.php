<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Seeder;

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


        User::create([
            'name' => 'Alberto',
            'username' => 'alberto',
            'email' => 'alberto@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'Alexander',
            'username' => 'alexander',
            'email' => 'alexander@gmail.com',
            'password' => bcrypt('password')
        ]);



        $teaMenu = [
            [
                'name' => 'Lemon Iced Tea',
                'price' => 15000,
                'description' => 'Teh dingin segar dengan perasan lemon asli, cocok untuk melepas dahaga.',
                'user_id' => 1
            ],
            [
                'name' => 'Peach Tea',
                'price' => 17000,
                'description' => 'Teh hitam dingin dengan aroma dan rasa buah persik yang manis dan menyegarkan.',
                'user_id' => 1
            ],
            [
                'name' => 'Lychee Tea',
                'price' => 18000,
                'description' => 'Minuman teh dingin yang dipadukan dengan rasa manis dan khas buah leci.',
                'user_id' => 1
            ]
        ];
        foreach ($teaMenu as $menu) {
            Menu::create($menu);
        }
    }
}
