<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@efi.com',
                'password' => Hash::make('password'),
                'profile_photo_path' => '/adminlite/dist/img/avatar5.png',
                'current_team_id' => 1,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Editor',
                'email' => 'editor@efi.com',
                'password' => Hash::make('password'),
                'profile_photo_path' => '/adminlite/dist/img/avatar4.png',
                'current_team_id' => 1,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Content Writer',
                'email' => 'contentwriter@efi.com',
                'password' => Hash::make('password'),
                'profile_photo_path' => '/adminlite/dist/img/avatar.png',
                'current_team_id' => 2,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
