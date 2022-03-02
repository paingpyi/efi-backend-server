<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class TeamSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        * Get all routes to give the full permission to Administrators
        */
        $routes = [];

        foreach (Route::getRoutes() as $value) {
            if(Str::contains($value->getName(), '#'))
            {
                $routes[] = $value->getName();
            }
        }
        // End of Getting all routes.

        DB::table('teams')->insert([
            [
                'user_id' => 1,
                'name' => 'Administrators',
                'personal_team' => false,
                'permissions' => json_encode($routes),
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 1,
                'name' => 'Editors',
                'personal_team' => false,
                'permissions' => json_encode(['admin#dashboard']),
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'user_id' => 1,
                'name' => 'Content Writers',
                'personal_team' => false,
                'permissions' => null,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
