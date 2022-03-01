<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Products',
                'description' => 'Category of Products',
                'name_burmese' => 'ထုတ်ကုန်',
                'description_burmese' => 'ထုတ်ကုန်',
                'parent_id' => null,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Blogs',
                'description' => 'Category of Blogs',
                'name_burmese' => 'ဘလော့',
                'description_burmese' => 'ဘလော့',
                'parent_id' => null,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Life Products',
                'description' => 'Sub Category of Products',
                'name_burmese' => 'အသက်အာမခံ',
                'description_burmese' => 'အသက်အာမခံ',
                'parent_id' => 1,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'General Insurance Products',
                'description' => 'Sub Category of Products',
                'name_burmese' => 'အထွေထွေ',
                'description_burmese' => 'အထွေထွေ',
                'parent_id' => 1,
                'is_active' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
