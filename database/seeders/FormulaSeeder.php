<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Carbon\Carbon;

class FormulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formulas')->insert([
            [
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 10],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 27],
                    ['field' => 'term', 'operator' => '=', 'value' => 5]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 190.8],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 10],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 27],
                    ['field' => 'term', 'operator' => '=', 'value' => 7]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 130.8],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 10],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 27],
                    ['field' => 'term', 'operator' => '=', 'value' => 10]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 86.4],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 28],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 32],
                    ['field' => 'term', 'operator' => '=', 'value' => 5]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 192],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 28],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 32],
                    ['field' => 'term', 'operator' => '=', 'value' => 7]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 130.8],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 28],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 32],
                    ['field' => 'term', 'operator' => '=', 'value' => 10]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 86.4],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
