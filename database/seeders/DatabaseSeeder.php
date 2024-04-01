<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\Role::factory()->create([
            'name' => 'admin',
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'user',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Alex',
            "image" => "admin.jpg",
            "password" => bcrypt("adminWSR"),
            "login" => "admin",
            "email" =>  "admin@slv.ru",
            "role_id" => 1
        ]);


    }
}
