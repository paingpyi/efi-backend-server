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
            /****
             *
             * Short Term Endowment
             *
             */
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 10],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 27],
                    ['field' => 'term', 'operator' => '==', 'value' => 5]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 190.8],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 28],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 39],
                    ['field' => 'term', 'operator' => '==', 'value' => 5]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 192],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 40],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 44],
                    ['field' => 'term', 'operator' => '==', 'value' => 5]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 193.2],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 45],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 47],
                    ['field' => 'term', 'operator' => '==', 'value' => 5]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 194.4],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 48],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 50],
                    ['field' => 'term', 'operator' => '==', 'value' => 5]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 195.6],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 51],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 52],
                    ['field' => 'term', 'operator' => '==', 'value' => 5]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 196.8],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 53],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 54],
                    ['field' => 'term', 'operator' => '==', 'value' => 5]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 198],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 55],
                    ['field' => 'term', 'operator' => '==', 'value' => 5]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 199.2],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 56],
                    ['field' => 'term', 'operator' => '==', 'value' => 5]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 200.4],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 57],
                    ['field' => 'term', 'operator' => '==', 'value' => 5]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 201.6],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 58],
                    ['field' => 'term', 'operator' => '==', 'value' => 5]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 202.8],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 59],
                    ['field' => 'term', 'operator' => '==', 'value' => 5]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 204],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 60],
                    ['field' => 'term', 'operator' => '==', 'value' => 5]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 205.2],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 10],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 32],
                    ['field' => 'term', 'operator' => '==', 'value' => 7]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 130.8],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 33],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 40],
                    ['field' => 'term', 'operator' => '==', 'value' => 7]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 130.8],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 41],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 44],
                    ['field' => 'term', 'operator' => '==', 'value' => 7]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 133.2],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 45],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 47],
                    ['field' => 'term', 'operator' => '==', 'value' => 7]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 134.4],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 48],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 49],
                    ['field' => 'term', 'operator' => '==', 'value' => 7]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 135.6],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 50],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 51],
                    ['field' => 'term', 'operator' => '==', 'value' => 7]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 136.8],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 52],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 53],
                    ['field' => 'term', 'operator' => '==', 'value' => 7]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 138],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 54],
                    ['field' => 'term', 'operator' => '==', 'value' => 7]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 139.2],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 55],
                    ['field' => 'term', 'operator' => '==', 'value' => 7]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 140.4],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 56],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 57],
                    ['field' => 'term', 'operator' => '==', 'value' => 7]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 141.6],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 58],
                    ['field' => 'term', 'operator' => '==', 'value' => 7]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 144],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 10],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 34],
                    ['field' => 'term', 'operator' => '==', 'value' => 10]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 86.4],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 35],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 40],
                    ['field' => 'term', 'operator' => '==', 'value' => 10]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 86.4],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 41],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 44],
                    ['field' => 'term', 'operator' => '==', 'value' => 10]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 88.8],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 45],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 46],
                    ['field' => 'term', 'operator' => '==', 'value' => 10]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 90],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 47],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 48],
                    ['field' => 'term', 'operator' => '==', 'value' => 10]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 91.2],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 49],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 50],
                    ['field' => 'term', 'operator' => '==', 'value' => 10]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 92.4],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 51],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 52],
                    ['field' => 'term', 'operator' => '==', 'value' => 10]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 93.6],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 53],
                    ['field' => 'term', 'operator' => '==', 'value' => 10]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 94.8],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 54],
                    ['field' => 'term', 'operator' => '==', 'value' => 10]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 96],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermEndowment',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 55],
                    ['field' => 'term', 'operator' => '==', 'value' => 10]
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 97.20],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // End of Short Term Endowment
        ]);
    }
}
