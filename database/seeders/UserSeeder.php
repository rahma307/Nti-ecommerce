<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::create([
        //     'name' => 'kahled',
        //     'email' => 'khaled@email.com',
        //     'password' => 'password',
        // ]);

        $users = [
            [
                'name' => 'Rahma',
                'email' => 'Rahma@email.com',
                'password' => '1234',
            ],
            
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
