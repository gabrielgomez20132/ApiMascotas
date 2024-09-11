<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = new User();
        $user->name = 'Administrador';
       /*  $user->last_name = 'Admin'; */
        $user->email = 'admin@admin.com';
        $user->password = Hash::make('admin');
        /* $user->id_role = 1; */
        $user->save();
    }
}
