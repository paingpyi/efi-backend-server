<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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
                'name_chinese' => '手聞説選趣',
                'description_chinese' => '試育内来待止将闘生碗伝',
                'parent_id' => null,
                'is_active' => true,
                'machine' => Str::slug('Products'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Blogs',
                'description' => 'Category of Blogs',
                'name_burmese' => 'ဘလော့',
                'description_burmese' => 'ဘလော့',
                'name_chinese' => '手聞説選趣',
                'description_chinese' => '試育内来待止将闘生碗伝',
                'parent_id' => null,
                'is_active' => true,
                'machine' => Str::slug('Blogs'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Life Products',
                'description' => 'Sub Category of Products',
                'name_burmese' => 'အသက်အာမခံ',
                'description_burmese' => 'အသက်အာမခံ',
                'name_chinese' => '手聞説選趣',
                'description_chinese' => '試育内来待止将闘生碗伝',
                'parent_id' => 1,
                'is_active' => true,
                'machine' => Str::slug('Life Products'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'General Insurance Products',
                'description' => 'Sub Category of Products',
                'name_burmese' => 'အထွေထွေ',
                'description_burmese' => 'အထွေထွေ',
                'name_chinese' => '手聞説選趣',
                'description_chinese' => '試育内来待止将闘生碗伝',
                'parent_id' => 1,
                'is_active' => true,
                'machine' => Str::slug('General Insurance Products'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'General Insurance Products',
                'description' => 'General Insurance Products of Blogs',
                'name_burmese' => 'အထွေထွေ',
                'description_burmese' => 'အထွေထွေ',
                'name_chinese' => '手聞説選趣',
                'description_chinese' => '試育内来待止将闘生碗伝',
                'parent_id' => 2,
                'is_active' => true,
                'machine' => Str::slug('General'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Life Products',
                'description' => 'Life Products of Blogs',
                'name_burmese' => 'ဗဟုသုတ',
                'description_burmese' => 'ဗဟုသုတ',
                'name_chinese' => '手聞説選趣',
                'description_chinese' => '試育内来待止将闘生碗伝',
                'parent_id' => 2,
                'is_active' => true,
                'machine' => Str::slug('Knowledge'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'News',
                'description' => 'News',
                'name_burmese' => 'သတင်း',
                'description_burmese' => 'သတင်း',
                'name_chinese' => '手聞説選趣',
                'description_chinese' => '試育内来待止将闘生碗伝',
                'parent_id' => null,
                'is_active' => true,
                'machine' => Str::slug('News'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'CSR',
                'description' => 'Corporate Social Responsibility',
                'name_burmese' => 'ပရဟိတ',
                'description_burmese' => 'ပရဟိတ',
                'name_chinese' => '手聞説選趣',
                'description_chinese' => '試育内来待止将闘生碗伝',
                'parent_id' => null,
                'is_active' => true,
                'machine' => Str::slug('CSR'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Career',
                'description' => 'Vacancy of EFI',
                'name_burmese' => 'အလုပ်အကိုင်',
                'description_burmese' => 'အလုပ်အကိုင်',
                'name_chinese' => '手聞説選趣',
                'description_chinese' => '試育内来待止将闘生碗伝',
                'parent_id' => null,
                'is_active' => true,
                'machine' => Str::slug('CSR'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'General',
                'description' => 'General Insurance Products of Blogs',
                'name_burmese' => 'အထွေထွေ',
                'description_burmese' => 'အထွေထွေ',
                'name_chinese' => '手聞説選趣',
                'description_chinese' => '試育内来待止将闘生碗伝',
                'parent_id' => 9,
                'is_active' => true,
                'machine' => Str::slug('Career General'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Life',
                'description' => 'Life Products of Blogs',
                'name_burmese' => 'ဗဟုသုတ',
                'description_burmese' => 'ဗဟုသုတ',
                'name_chinese' => '手聞説選趣',
                'description_chinese' => '試育内来待止将闘生碗伝',
                'parent_id' => 9,
                'is_active' => true,
                'machine' => Str::slug('career life'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
