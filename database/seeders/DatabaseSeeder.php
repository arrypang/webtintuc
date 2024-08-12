<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\table;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            'userName' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'fullName' => 'Administrator',
            'roles' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'userName' => 'admin',
            'email' => 'doantrungnhan24@gmail.com',
            'password' => Hash::make('nhan2004'),
            'fullName' => 'Administrator',
            'roles' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
