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

            /****
             *
             * Student Life
             *
             */
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 1],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'annual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 19],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 16],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 41.55],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 1],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'semi-annual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 19],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 16],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 21.24],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 1],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'quarterly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 19],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 16],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 10.74],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 2],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'annual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 18],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 15],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 45.25],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 2],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'semi-annual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 18],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 15],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 23.13],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 2],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'quarterly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 18],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 15],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 11.7],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 3],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'annual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 17],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 14],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 49.55],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 3],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'semi-annual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 17],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 14],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 25.33],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 3],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'quarterly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 17],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 14],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 12.81],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 4],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'annual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 16],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 13],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 54.55],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 4],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'semi-annual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 16],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 13],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 27.89],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 4],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'quarterly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 16],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 13],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 14.10],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 5],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'annual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 15],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 12],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 60.35],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 5],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'semi-annual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 15],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 12],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 30.85],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 5],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'quarterly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 15],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 12],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 15.6],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 6],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'annual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 14],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 11],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 67.25],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 6],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'semi-annual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 14],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 11],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 34.38],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 6],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'quarterly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 14],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 11],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 17.38],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 7],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'annual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 13],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 10],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 76.8],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 7],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'semi-annual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 13],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 10],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 39.27],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 7],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'quarterly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 13],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 10],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 19.85],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 8],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'annual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 12],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 9],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 89.95],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 8],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'semi-annual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 12],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 9],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 45.99],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 8],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'quarterly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 12],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 9],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 23.25],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 9],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'annual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 11],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 8],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 106.85],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 9],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'semi-annual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 11],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 8],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 54.63],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 9],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'quarterly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 11],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 8],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 27.62],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 10],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'annual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 10],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 7],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 127.95],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 10],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'semi-annual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 10],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 7],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 65.42],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 10],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'quarterly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 10],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 7],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 33.08],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 11],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'annual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 9],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 6],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 150.85],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 11],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'semi-annual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 9],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 6],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 77.13],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 11],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'quarterly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 9],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 6],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 39],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 12],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'annual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 8],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 5],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 191.20],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 12],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'semi-annual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 8],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 5],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 97.76],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateStudentLife',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 12],
                    ['field' => 'premium_type', 'operator' => '==', 'value' => 'quarterly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'policy_term', 'operator' => '=', 'value' => 8],
                    ['field' => 'premium_term', 'operator' => '=', 'value' => 5],
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 49.43],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // End of Student Life

            /****
             *
             * Travel Insurance
             *
             */
            [
                'method' => 'calculateTravelInsurance',
                'conditions' => json_encode([
                    ['field' => 'travel_type', 'operator' => '==', 'value' => 'local'],
                    ['field' => 'duration', 'operator' => '==', 'value' => '1 day'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_rate', 'operator' => '=', 'value' => 100],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateTravelInsurance',
                'conditions' => json_encode([
                    ['field' => 'travel_type', 'operator' => '==', 'value' => 'local'],
                    ['field' => 'duration', 'operator' => '==', 'value' => '3 days'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_rate', 'operator' => '=', 'value' => 150],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateTravelInsurance',
                'conditions' => json_encode([
                    ['field' => 'travel_type', 'operator' => '==', 'value' => 'local'],
                    ['field' => 'duration', 'operator' => '==', 'value' => '1 week'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_rate', 'operator' => '=', 'value' => 200],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateTravelInsurance',
                'conditions' => json_encode([
                    ['field' => 'travel_type', 'operator' => '==', 'value' => 'local'],
                    ['field' => 'duration', 'operator' => '==', 'value' => '2 weeks'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_rate', 'operator' => '=', 'value' => 250],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateTravelInsurance',
                'conditions' => json_encode([
                    ['field' => 'travel_type', 'operator' => '==', 'value' => 'local'],
                    ['field' => 'duration', 'operator' => '==', 'value' => '1 month'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_rate', 'operator' => '=', 'value' => 300],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateTravelInsurance',
                'conditions' => json_encode([
                    ['field' => 'travel_type', 'operator' => '==', 'value' => 'local'],
                    ['field' => 'duration', 'operator' => '==', 'value' => '1.5 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_rate', 'operator' => '=', 'value' => 350],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateTravelInsurance',
                'conditions' => json_encode([
                    ['field' => 'travel_type', 'operator' => '==', 'value' => 'local'],
                    ['field' => 'duration', 'operator' => '==', 'value' => '2 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_rate', 'operator' => '=', 'value' => 400],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateTravelInsurance',
                'conditions' => json_encode([
                    ['field' => 'travel_type', 'operator' => '==', 'value' => 'local'],
                    ['field' => 'duration', 'operator' => '==', 'value' => '2.5 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_rate', 'operator' => '=', 'value' => 450],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateTravelInsurance',
                'conditions' => json_encode([
                    ['field' => 'travel_type', 'operator' => '==', 'value' => 'local'],
                    ['field' => 'duration', 'operator' => '==', 'value' => '3 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_rate', 'operator' => '=', 'value' => 500],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateTravelInsurance',
                'conditions' => json_encode([
                    ['field' => 'travel_type', 'operator' => '==', 'value' => 'foreign'],
                    ['field' => 'duration', 'operator' => '==', 'value' => '1 week'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_rate', 'operator' => '=', 'value' => 200],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateTravelInsurance',
                'conditions' => json_encode([
                    ['field' => 'travel_type', 'operator' => '==', 'value' => 'foreign'],
                    ['field' => 'duration', 'operator' => '==', 'value' => '2 weeks'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_rate', 'operator' => '=', 'value' => 250],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateTravelInsurance',
                'conditions' => json_encode([
                    ['field' => 'travel_type', 'operator' => '==', 'value' => 'foreign'],
                    ['field' => 'duration', 'operator' => '==', 'value' => '1 month'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_rate', 'operator' => '=', 'value' => 300],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateTravelInsurance',
                'conditions' => json_encode([
                    ['field' => 'travel_type', 'operator' => '==', 'value' => 'foreign'],
                    ['field' => 'duration', 'operator' => '==', 'value' => '1.5 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_rate', 'operator' => '=', 'value' => 350],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateTravelInsurance',
                'conditions' => json_encode([
                    ['field' => 'travel_type', 'operator' => '==', 'value' => 'foreign'],
                    ['field' => 'duration', 'operator' => '==', 'value' => '2 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_rate', 'operator' => '=', 'value' => 400],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateTravelInsurance',
                'conditions' => json_encode([
                    ['field' => 'travel_type', 'operator' => '==', 'value' => 'foreign'],
                    ['field' => 'duration', 'operator' => '==', 'value' => '2.5 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_rate', 'operator' => '=', 'value' => 450],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateTravelInsurance',
                'conditions' => json_encode([
                    ['field' => 'travel_type', 'operator' => '==', 'value' => 'foreign'],
                    ['field' => 'duration', 'operator' => '==', 'value' => '3 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_rate', 'operator' => '=', 'value' => 500],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateTravelInsurance',
                'conditions' => json_encode([
                    ['field' => 'travel_type', 'operator' => '==', 'value' => 'below 100 miles'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_rate', 'operator' => '=', 'value' => 100],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // End of Travel Insurance

            /****
             *
             * Snake Bite Insurance
             *
             */
            [
                'method' => 'calculateSnakeInsurance',
                'conditions' => json_encode([
                    [],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.001],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // End of Snake Bite Insurance

            /****
             *
             * Education Life Insurance
             *
             */
            [
                'method' => 'calculateEducationInsurance',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 18],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 24],
                    ['field' => 'premium_term', 'operator' => '==', 'value' => 5],
                    ['field' => 'benefit', 'operator' => '==', 'value' => 'basic'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 186],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateEducationInsurance',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 25],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 29],
                    ['field' => 'premium_term', 'operator' => '==', 'value' => 5],
                    ['field' => 'benefit', 'operator' => '==', 'value' => 'basic'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 187.2],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateEducationInsurance',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 30],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 34],
                    ['field' => 'premium_term', 'operator' => '==', 'value' => 5],
                    ['field' => 'benefit', 'operator' => '==', 'value' => 'basic'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 188.4],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateEducationInsurance',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 35],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 39],
                    ['field' => 'premium_term', 'operator' => '==', 'value' => 5],
                    ['field' => 'benefit', 'operator' => '==', 'value' => 'basic'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 189.6],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateEducationInsurance',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 40],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 43],
                    ['field' => 'premium_term', 'operator' => '==', 'value' => 5],
                    ['field' => 'benefit', 'operator' => '==', 'value' => 'basic'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 190.8],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateEducationInsurance',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 44],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 47],
                    ['field' => 'premium_term', 'operator' => '==', 'value' => 5],
                    ['field' => 'benefit', 'operator' => '==', 'value' => 'basic'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 192],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateEducationInsurance',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 48],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 49],
                    ['field' => 'premium_term', 'operator' => '==', 'value' => 5],
                    ['field' => 'benefit', 'operator' => '==', 'value' => 'basic'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 193.2],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateEducationInsurance',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 50],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 51],
                    ['field' => 'premium_term', 'operator' => '==', 'value' => 5],
                    ['field' => 'benefit', 'operator' => '==', 'value' => 'basic'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 194.4],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateEducationInsurance',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 52],
                    ['field' => 'premium_term', 'operator' => '==', 'value' => 5],
                    ['field' => 'benefit', 'operator' => '==', 'value' => 'basic'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 195.6],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateEducationInsurance',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 53],
                    ['field' => 'premium_term', 'operator' => '==', 'value' => 5],
                    ['field' => 'benefit', 'operator' => '==', 'value' => 'basic'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 196.8],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateEducationInsurance',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 54],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 55],
                    ['field' => 'premium_term', 'operator' => '==', 'value' => 5],
                    ['field' => 'benefit', 'operator' => '==', 'value' => 'basic'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 198],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateEducationInsurance',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 56],
                    ['field' => 'premium_term', 'operator' => '==', 'value' => 5],
                    ['field' => 'benefit', 'operator' => '==', 'value' => 'basic'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 199.2],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateEducationInsurance',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 18],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 19],
                    ['field' => 'premium_term', 'operator' => '==', 'value' => 5],
                    ['field' => 'benefit', 'operator' => '==', 'value' => 'double'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 192],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateEducationInsurance',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 20],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 22],
                    ['field' => 'premium_term', 'operator' => '==', 'value' => 5],
                    ['field' => 'benefit', 'operator' => '==', 'value' => 'double'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 193.2],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateEducationInsurance',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 23],
                    ['field' => 'premium_term', 'operator' => '==', 'value' => 5],
                    ['field' => 'benefit', 'operator' => '==', 'value' => 'double'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 194.4],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateEducationInsurance',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 24],
                    ['field' => 'premium_term', 'operator' => '==', 'value' => 5],
                    ['field' => 'benefit', 'operator' => '==', 'value' => 'double'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 195.6],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateEducationInsurance',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 25],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 26],
                    ['field' => 'premium_term', 'operator' => '==', 'value' => 5],
                    ['field' => 'benefit', 'operator' => '==', 'value' => 'double'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 196.8],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateEducationInsurance',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 27],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 28],
                    ['field' => 'premium_term', 'operator' => '==', 'value' => 5],
                    ['field' => 'benefit', 'operator' => '==', 'value' => 'double'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 198],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateEducationInsurance',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 18],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 24],
                    ['field' => 'premium_term', 'operator' => '==', 'value' => 7],
                    ['field' => 'benefit', 'operator' => '==', 'value' => 'basic'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 126],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateEducationInsurance',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 18],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 20],
                    ['field' => 'premium_term', 'operator' => '==', 'value' => 7],
                    ['field' => 'benefit', 'operator' => '==', 'value' => 'double'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 132],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateEducationInsurance',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 18],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 25],
                    ['field' => 'premium_term', 'operator' => '==', 'value' => 10],
                    ['field' => 'benefit', 'operator' => '==', 'value' => 'basic'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 84],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateEducationInsurance',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 18],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 20],
                    ['field' => 'premium_term', 'operator' => '==', 'value' => 10],
                    ['field' => 'benefit', 'operator' => '==', 'value' => 'double'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 90],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // End of Education Life Insurance

            /****
             *
             * Public Term Life Insurance
             *
             */
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 18],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 27],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 6],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 28],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 30],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 7],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 31],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 34],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 8],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 35],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 37],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 9],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 38],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 40],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 10],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 41],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 42],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 11],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 43],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 45],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 12],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 46],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 47],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 13],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 48],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 14],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 49],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 15],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 50],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 51],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 16],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 52],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 17],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 53],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 18],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 54],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 19],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 55],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 21],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 56],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 22],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 57],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 23],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 58],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 25],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 59],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 28],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 60],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 31],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 61],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 33],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 62],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 36],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 63],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 40],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 64],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 44],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 65],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 48],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 66],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 52],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 67],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 56],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 68],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 63],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 69],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 70],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 70],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 77],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 71],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 84],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 72],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 91],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 73],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 102],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 74],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 112],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePublicTerm',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '==', 'value' => 75],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '/', 'value' => 1000],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 123],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // End of Public Term Insurance

            /****
             *
             * Personal Accident Insurance
             *
             */
            [
                'method' => 'calculatePersonalAccident',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 16],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 65],
                    ['field' => 'is_risk_work', 'operator' => '==', 'value' => true],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.01],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculatePersonalAccident',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 16],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 65],
                    ['field' => 'is_risk_work', 'operator' => '==', 'value' => false],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.007],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // End of Personal Accident Insurance

            /****
             *
             * Group Life Insurance
             *
             */
            [
                'method' => 'calculateGroupLife',
                'conditions' => json_encode([]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.01],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // End of Group Life Insurance

            /****
             *
             * Farmer Life Insurance
             *
             */
            [
                'method' => 'calculateFarmerLife',
                'conditions' => json_encode([]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.01],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // End of Farmer Life Insurance

            /****
             *
             * Critical Illness Insurance
             *
             */
            [
                'method' => 'calculateCriticalIllness',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 6],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 30],
                    ['field' => 'type', 'operator' => '==', 'value' => 'individual'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'binnual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 4500],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCriticalIllness',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 6],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 30],
                    ['field' => 'type', 'operator' => '==', 'value' => 'individual'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'lumpsum'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 8800],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCriticalIllness',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 6],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 30],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'monthly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 800],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCriticalIllness',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 6],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 30],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'quarterly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 2200],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCriticalIllness',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 6],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 30],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'binnual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 4300],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCriticalIllness',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 6],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 30],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'lumpsum'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 8400],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCriticalIllness',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 31],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 40],
                    ['field' => 'type', 'operator' => '==', 'value' => 'individual'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'binnual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 7800],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCriticalIllness',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 31],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 40],
                    ['field' => 'type', 'operator' => '==', 'value' => 'individual'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'lumpsum'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 15400],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCriticalIllness',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 31],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 40],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'monthly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 1300],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCriticalIllness',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 31],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 40],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'quarterly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 3900],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCriticalIllness',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 31],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 40],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'binnual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 7400],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCriticalIllness',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 31],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 40],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'lumpsum'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 14600],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCriticalIllness',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 41],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 50],
                    ['field' => 'type', 'operator' => '==', 'value' => 'individual'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'binnual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 12300],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCriticalIllness',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 41],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 50],
                    ['field' => 'type', 'operator' => '==', 'value' => 'individual'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'lumpsum'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 24200],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCriticalIllness',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 41],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 50],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'monthly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 2100],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCriticalIllness',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 41],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 50],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'quarterly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 6100],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCriticalIllness',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 41],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 50],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'binnual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 11700],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCriticalIllness',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 41],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 50],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'lumpsum'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 23000],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCriticalIllness',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 51],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 60],
                    ['field' => 'type', 'operator' => '==', 'value' => 'individual'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'binnual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 19000],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCriticalIllness',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 51],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 60],
                    ['field' => 'type', 'operator' => '==', 'value' => 'individual'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'lumpsum'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 37400],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCriticalIllness',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 51],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 60],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'monthly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 3200],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCriticalIllness',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 51],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 60],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'quarterly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 9400],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCriticalIllness',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 51],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 60],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'binnual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 18100],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCriticalIllness',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 51],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 60],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'lumpsum'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 35500],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // End of Critical Illness Insurance

            /****
             *
             * Health Insurance
             *
             */
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 6],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 30],
                    ['field' => 'type', 'operator' => '==', 'value' => 'individual'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'binnual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 5600],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 6],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 30],
                    ['field' => 'type', 'operator' => '==', 'value' => 'individual'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'lumpsum'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 11000],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 6],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 30],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'monthly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 1000],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 6],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 30],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'quarterly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 2800],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 6],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 30],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'binnual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 5300],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 6],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 30],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'lumpsum'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 10500],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 31],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 40],
                    ['field' => 'type', 'operator' => '==', 'value' => 'individual'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'binnual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 7300],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 31],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 40],
                    ['field' => 'type', 'operator' => '==', 'value' => 'individual'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'lumpsum'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 14300],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 31],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 40],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'monthly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 1200],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 31],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 40],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'quarterly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 3600],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 31],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 40],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'binnual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 6900],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 31],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 40],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'lumpsum'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 13600],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 41],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 50],
                    ['field' => 'type', 'operator' => '==', 'value' => 'individual'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'binnual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 9000],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 41],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 50],
                    ['field' => 'type', 'operator' => '==', 'value' => 'individual'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'lumpsum'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 17600],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 41],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 50],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'monthly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 1500],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 41],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 50],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'quarterly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 4400],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 41],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 50],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'binnual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 8600],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 41],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 50],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'lumpsum'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 16700],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 51],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 60],
                    ['field' => 'type', 'operator' => '==', 'value' => 'individual'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'binnual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 14600],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 51],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 60],
                    ['field' => 'type', 'operator' => '==', 'value' => 'individual'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'lumpsum'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 28600],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 51],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 60],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'monthly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 2500],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 51],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 60],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'quarterly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 7100],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 51],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 60],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'binnual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 13900],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 51],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 60],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'lumpsum'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 27200],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 61],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 75],
                    ['field' => 'type', 'operator' => '==', 'value' => 'individual'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'binnual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 31400],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 61],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 75],
                    ['field' => 'type', 'operator' => '==', 'value' => 'individual'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'lumpsum'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 28750],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 61],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 75],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'monthly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 5300],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 61],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 75],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'quarterly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 15400],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 61],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 75],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'binnual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 29800],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 61],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 75],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'lumpsum'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 58500],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 6],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 75],
                    ['field' => 'coverage_1', 'operator' => '==', 'value' => true],
                    ['field' => 'type', 'operator' => '==', 'value' => 'individual'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'binnual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 8400],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 6],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 75],
                    ['field' => 'coverage_1', 'operator' => '==', 'value' => true],
                    ['field' => 'type', 'operator' => '==', 'value' => 'individual'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'lumpsum'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 16500],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 6],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 75],
                    ['field' => 'coverage_1', 'operator' => '==', 'value' => true],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'monthly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 1400],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 6],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 75],
                    ['field' => 'coverage_1', 'operator' => '==', 'value' => true],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'quarterly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 4200],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 6],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 75],
                    ['field' => 'coverage_1', 'operator' => '==', 'value' => true],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'binnual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 8000],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 6],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 75],
                    ['field' => 'coverage_1', 'operator' => '==', 'value' => true],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'lumpsum'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 15700],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 6],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 75],
                    ['field' => 'coverage_2', 'operator' => '==', 'value' => true],
                    ['field' => 'type', 'operator' => '==', 'value' => 'individual'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'binnual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 4500],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 6],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 75],
                    ['field' => 'coverage_2', 'operator' => '==', 'value' => true],
                    ['field' => 'type', 'operator' => '==', 'value' => 'individual'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'lumpsum'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 8800],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 6],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 75],
                    ['field' => 'coverage_2', 'operator' => '==', 'value' => true],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'monthly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 800],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 6],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 75],
                    ['field' => 'coverage_2', 'operator' => '==', 'value' => true],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'quarterly'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 2200],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 6],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 75],
                    ['field' => 'coverage_2', 'operator' => '==', 'value' => true],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'binnual'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 4300],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateHealth',
                'conditions' => json_encode([
                    ['field' => 'insured_age', 'operator' => '>=', 'value' => 6],
                    ['field' => 'insured_age', 'operator' => '<=', 'value' => 75],
                    ['field' => 'coverage_2', 'operator' => '==', 'value' => true],
                    ['field' => 'type', 'operator' => '==', 'value' => 'group'],
                    ['field' => 'payment', 'operator' => '==', 'value' => 'lumpsum'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'premium_amount', 'operator' => '=', 'value' => 8400],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // End of Health Insurance

            /****
             *
             * Inland Transit Insurance
             *
             */
            [
                'method' => 'calculateInlandTransit',
                'conditions' => json_encode([
                    ['field' => 'goods_type', 'operator' => '==', 'value' => 'dagerous cargo (or) flammable cargo'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.28],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateInlandTransit',
                'conditions' => json_encode([
                    ['field' => 'goods_type', 'operator' => '==', 'value' => 'fragila goods'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.8],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateInlandTransit',
                'conditions' => json_encode([
                    ['field' => 'goods_type', 'operator' => '==', 'value' => 'general cargo'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.14],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // End of Inland Transit Insurance


            /****
             *
             * Marine Cargo Insurance
             *
             */
            [
                'method' => 'calculateMarineCargo',
                'conditions' => json_encode([
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'conveyance', 'operator' => '==', 'value' => 'marine inland'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0014],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineCargo',
                'conditions' => json_encode([
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'conveyance', 'operator' => '==', 'value' => 'costal (summer) (oct - 16th to april - 30th)'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0028],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineCargo',
                'conditions' => json_encode([
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'conveyance', 'operator' => '==', 'value' => 'costal (summer) (may - 1st to oct - 15th)'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0056],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineCargo',
                'conditions' => json_encode([
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'dagerous cargo (or) flammable cargo'],
                    ['field' => 'conveyance', 'operator' => '==', 'value' => 'marine inland'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0028],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineCargo',
                'conditions' => json_encode([
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'dagerous cargo (or) flammable cargo'],
                    ['field' => 'conveyance', 'operator' => '==', 'value' => 'costal (summer) (oct - 16th to april - 30th)'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0042],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineCargo',
                'conditions' => json_encode([
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'dagerous cargo (or) flammable cargo'],
                    ['field' => 'conveyance', 'operator' => '==', 'value' => 'costal (summer) (may - 1st to oct - 15th)'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0084],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // End of Marine Cargo Insurance

            /****
             *
             * Oversea Cargo Insurance
             *
             */
            [
                'method' => 'calculateOverseaCargo',
                'conditions' => json_encode([
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0056],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateOverseaCargo',
                'conditions' => json_encode([
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'split materials'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.008],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateOverseaCargo',
                'conditions' => json_encode([
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'fertilizers (powder)'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.008],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateOverseaCargo',
                'conditions' => json_encode([
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'fertilizers (liquid)'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0056],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateOverseaCargo',
                'conditions' => json_encode([
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'perishable goods(by air(tlo))'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0056],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateOverseaCargo',
                'conditions' => json_encode([
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'chick (by air (tlo))'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0056],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // End of Oversea Cargo Insurance

            /****
             *
             * Fidelity Insurance
             *
             */
            [
                'method' => 'calculateFidelity',
                'conditions' => json_encode([
                    ['field' => 'business_type', 'operator' => '==', 'value' => 'cooperate and private company'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.02],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateFidelity',
                'conditions' => json_encode([
                    ['field' => 'business_type', 'operator' => '==', 'value' => 'government and private bank'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.01],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // End of Fidelity Insurance

            /****
             *
             * Marine Hull Insurance
             *
             */
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'river'],
                    ['field' => 'month', 'operator' => '==', 'value' => 'voyage'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.01],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0833],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'river'],
                    ['field' => 'month', 'operator' => '==', 'value' => '1 month'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.01],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.1666],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'river'],
                    ['field' => 'month', 'operator' => '==', 'value' => '2 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.01],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.25],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'river'],
                    ['field' => 'month', 'operator' => '==', 'value' => '3 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.01],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.3333],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'river'],
                    ['field' => 'month', 'operator' => '==', 'value' => '4 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.01],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.4166],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'river'],
                    ['field' => 'month', 'operator' => '==', 'value' => '5 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.01],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.5],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'river'],
                    ['field' => 'month', 'operator' => '==', 'value' => '6 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.01],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.5833],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'river'],
                    ['field' => 'month', 'operator' => '==', 'value' => '6 months to 1 year'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.01],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 1],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Wooden Hull
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'wooden'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'river'],
                    ['field' => 'month', 'operator' => '==', 'value' => 'voyage'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.014],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0833],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'wooden'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'river'],
                    ['field' => 'month', 'operator' => '==', 'value' => '1 month'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.014],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.1666],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'wooden'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'river'],
                    ['field' => 'month', 'operator' => '==', 'value' => '2 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.014],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.25],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'wooden'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'river'],
                    ['field' => 'month', 'operator' => '==', 'value' => '3 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.014],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.3333],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'wooden'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'river'],
                    ['field' => 'month', 'operator' => '==', 'value' => '4 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.014],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.4166],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'wooden'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'river'],
                    ['field' => 'month', 'operator' => '==', 'value' => '5 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.014],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.5],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'wooden'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'river'],
                    ['field' => 'month', 'operator' => '==', 'value' => '6 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.014],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.5833],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'wooden'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'river'],
                    ['field' => 'month', 'operator' => '==', 'value' => '6 months to 1 year'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.014],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 1],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            //Oil and Gas
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil and gas'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'river'],
                    ['field' => 'month', 'operator' => '==', 'value' => 'voyage'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.012],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0833],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil and gas'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'river'],
                    ['field' => 'month', 'operator' => '==', 'value' => '1 month'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.012],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.1666],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil and gas'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'river'],
                    ['field' => 'month', 'operator' => '==', 'value' => '2 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.012],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.25],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil and gas'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'river'],
                    ['field' => 'month', 'operator' => '==', 'value' => '3 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.012],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.3333],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil and gas'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'river'],
                    ['field' => 'month', 'operator' => '==', 'value' => '4 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.012],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.4166],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil and gas'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'river'],
                    ['field' => 'month', 'operator' => '==', 'value' => '5 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.012],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.5],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil and gas'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'river'],
                    ['field' => 'month', 'operator' => '==', 'value' => '6 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.012],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.5833],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil and gas'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'river'],
                    ['field' => 'month', 'operator' => '==', 'value' => '6 months to 1 year'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.012],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 1],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // Coastal - steel
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => 'voyage'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.014],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0833],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '1 month'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.014],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.1666],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '2 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.014],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.25],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '3 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.014],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.3333],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '4 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.014],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.4166],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '5 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.014],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.5],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '6 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.014],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.5833],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '6 months to 1 year'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.014],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 1],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'wooden'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => 'voyage'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.018],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0833],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'wooden'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '1 month'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.018],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.1666],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'wooden'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '2 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.018],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.25],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'wooden'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '3 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.018],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.3333],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'wooden'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '4 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.018],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.4166],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'wooden'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '5 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.018],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.5],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'wooden'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '6 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.018],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.5833],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'wooden'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general cargo'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '6 months to 1 year'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.018],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 1],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil & gas/fishing'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => 'voyage'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.016],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0833],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil & gas/fishing'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '1 month'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.016],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.1666],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil & gas/fishing'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '2 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.016],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.25],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil & gas/fishing'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '3 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.016],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.3333],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil & gas/fishing'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '4 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.016],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.4166],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil & gas/fishing'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '5 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.016],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.5],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil & gas/fishing'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '6 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.016],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.5833],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil & gas/fishing'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '6 months to 1 year'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.016],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 1],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'wooden'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil & gas/fishing'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => 'voyage'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.02],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0833],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'wooden'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil & gas/fishing'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '1 month'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.02],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.1666],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'wooden'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil & gas/fishing'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '2 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.02],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.25],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'wooden'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil & gas/fishing'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '3 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.02],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.3333],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'wooden'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil & gas/fishing'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '4 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.02],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.4166],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'wooden'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil & gas/fishing'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '5 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.02],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.5],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'wooden'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil & gas/fishing'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '6 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.02],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.5833],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'total lost'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'wooden'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil & gas/fishing'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '6 months to 1 year'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.02],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 1],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'all risks'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil & gas/fishing'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => 'voyage'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.03],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0833],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'all risks'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil & gas/fishing'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '1 month'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.03],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.1666],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'all risks'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil & gas/fishing'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '2 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.03],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.25],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'all risks'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil & gas/fishing'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '3 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.03],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.3333],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'all risks'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil & gas/fishing'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '4 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.03],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.4166],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'all risks'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil & gas/fishing'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '5 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.03],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.5],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'all risks'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil & gas/fishing'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '6 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.03],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.5833],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'all risks'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'oil & gas/fishing'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '6 months to 1 year'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.03],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 1],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'all risks'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => 'voyage'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.024],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0833],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'all risks'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '1 month'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.024],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.1666],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'all risks'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '2 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.024],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.25],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'all risks'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '3 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.024],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.3333],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'all risks'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '4 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.024],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.4166],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'all risks'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '5 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.024],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.5],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'all risks'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '6 months'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.024],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.5833],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMarineHull',
                'conditions' => json_encode([
                    ['field' => 'insurance_type', 'operator' => '==', 'value' => 'all risks'],
                    ['field' => 'hull_type', 'operator' => '==', 'value' => 'steel'],
                    ['field' => 'cargo_type', 'operator' => '==', 'value' => 'general'],
                    ['field' => 'route', 'operator' => '==', 'value' => 'coastal'],
                    ['field' => 'month', 'operator' => '==', 'value' => '6 months to 1 year'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.024],
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 1],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // End of Marine Hull Insurance

            /****
             *
             * Mortor Insurance
             *
             */
            [
                'method' => 'calculateMotor',
                'conditions' => json_encode([
                    ['field' => 'vehicle_type', 'operator' => '==', 'value' => 'private car'],
                    ['field' => 'engine_displacement', 'operator' => '<=', 'value' => 1500],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '==', 'value' => 41200],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMotor',
                'conditions' => json_encode([
                    ['field' => 'vehicle_type', 'operator' => '==', 'value' => 'private car'],
                    ['field' => 'engine_displacement', 'operator' => '>', 'value' => 1500],
                    ['field' => 'engine_displacement', 'operator' => '<=', 'value' => 2000],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '==', 'value' => 41400],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMotor',
                'conditions' => json_encode([
                    ['field' => 'vehicle_type', 'operator' => '==', 'value' => 'private car'],
                    ['field' => 'engine_displacement', 'operator' => '>', 'value' => 2000],
                    ['field' => 'engine_displacement', 'operator' => '<=', 'value' => 3000],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '==', 'value' => 41700],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMotor',
                'conditions' => json_encode([
                    ['field' => 'vehicle_type', 'operator' => '==', 'value' => 'private car'],
                    ['field' => 'engine_displacement', 'operator' => '>', 'value' => 3000],
                    ['field' => 'engine_displacement', 'operator' => '<=', 'value' => 4000],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '==', 'value' => 42000],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateMotor',
                'conditions' => json_encode([
                    ['field' => 'vehicle_type', 'operator' => '==', 'value' => 'private car'],
                    ['field' => 'engine_displacement', 'operator' => '>', 'value' => 4000],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '==', 'value' => 42300],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // End of Motor Insurance

            /****
             *
             * Cash in Transit Insurance
             *
             */
            [
                'method' => 'calculateCashInTransit',
                'conditions' => json_encode([
                    ['field' => 'mile', 'operator' => '<=', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.00027],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCashInTransit',
                'conditions' => json_encode([
                    ['field' => 'mile', 'operator' => '>', 'value' => 10],
                    ['field' => 'mile', 'operator' => '<=', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.00054],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCashInTransit',
                'conditions' => json_encode([
                    ['field' => 'mile', 'operator' => '>', 'value' => 15],
                    ['field' => 'mile', 'operator' => '<=', 'value' => 20],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.00081],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateCashInTransit',
                'conditions' => json_encode([
                    ['field' => 'mile', 'operator' => '>', 'value' => 20],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0009],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // End of Cash in Transit Insurance


            /****
             *
             * Single Premium Credit Life Insurance
             *
             */
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 18],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0066],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 18],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0084],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 18],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0104],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 18],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0125],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 18],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0147],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 18],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.017],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 18],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0194],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 18],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0219],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 18],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0244],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 18],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0269],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 18],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0296],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 18],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0322],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 18],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0349],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 19],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0068],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 19],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0088],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 19],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0108],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 19],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.013],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 19],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0153],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 19],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0177],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 19],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0201],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 19],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0226],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 19],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0252],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 19],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0279],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 19],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0306],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 19],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0333],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 19],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0361],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 20],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0071],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 20],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0091],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 20],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0113],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 20],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0135],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 20],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0159],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 20],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0183],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 20],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0209],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 20],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0235],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 20],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0261],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 20],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0289],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 20],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0316],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 20],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0345],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 20],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0373],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 21],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0074],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 21],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0095],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 21],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0117],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 21],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0141],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 21],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0165],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 21],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0191],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 21],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0217],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 21],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0244],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 21],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0271],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 21],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.03],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 21],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0328],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 21],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0357],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 21],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0386],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 22],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0077],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 22],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0099],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 22],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0122],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 22],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0147],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 22],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0172],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 22],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0199],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 22],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0226],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 22],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0254],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 22],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0282],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 22],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0311],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 22],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.034],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 22],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.037],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 22],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.040],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 23],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0081],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 23],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0104],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 23],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0128],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 23],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0154],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 23],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.018],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 23],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0207],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 23],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0236],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 23],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0264],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 23],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0294],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 23],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0324],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 23],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0354],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 23],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0385],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 23],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0416],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 24],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0085],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 24],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0109],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 24],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0134],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 24],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0161],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 24],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0188],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 24],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0217],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 24],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0246],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 24],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0276],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 24],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0306],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 24],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0337],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 24],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0369],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 24],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.04],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 24],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0432],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 25],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0089],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 25],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0114],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 25],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0141],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 25],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0168],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 25],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0197],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 25],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0227],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 25],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0257],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 25],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0288],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 25],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.032],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 25],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0352],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 25],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0384],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 25],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0416],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 25],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0449],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 26],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0093],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 26],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.012],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 26],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0147],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 26],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0177],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 26],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0207],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 26],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0238],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 26],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.027],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 26],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0301],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 26],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0334],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 26],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0367],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 26],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.04],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 26],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0433],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 26],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0466],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 27],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0098],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 27],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0126],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 27],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0155],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 27],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0186],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 27],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0218],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 27],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.025],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 27],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0283],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 27],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0316],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 27],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0349],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 27],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0383],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 27],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0417],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 27],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0451],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 27],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0485],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 28],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0104],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 28],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0134],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 28],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0165],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 28],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0197],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 28],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.023],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 28],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0263],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 28],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0297],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 28],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0332],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 28],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0366],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 28],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0401],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 28],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0436],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 28],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0471],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 28],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0506],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 29],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.011],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 29],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0141],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 29],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0174],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 29],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0207],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 29],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0242],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 29],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0277],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 29],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0312],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 29],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0347],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 29],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0382],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 29],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0419],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 29],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0444],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 29],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.049],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 29],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0526],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 30],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0116],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 30],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0149],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 30],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0183],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 30],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0218],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 30],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0254],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 30],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.029],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 30],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0326],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 30],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0362],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 30],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0399],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 30],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0436],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 30],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0473],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 30],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.051],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 30],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0546],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 31],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0122],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 31],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0157],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 31],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0193],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 31],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0229],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 31],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0266],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 31],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0303],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 31],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0341],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 31],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0378],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 31],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0416],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 31],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0454],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 31],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0491],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 31],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0529],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 31],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0567],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 32],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0128],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 32],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0165],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 32],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0202],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 32],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.024],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 32],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0278],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 32],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0317],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 32],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0355],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 32],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0394],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 32],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0433],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 32],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0472],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 32],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.051],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 32],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0549],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 32],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0587],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 33],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0134],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 33],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0173],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 33],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0211],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 33],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0251],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 33],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.029],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 33],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.033],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 33],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.037],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 33],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.041],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 33],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0449],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 33],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0489],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 33],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0528],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 33],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0568],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 33],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0607],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 34],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.014],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 34],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0181],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 34],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0221],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 34],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0262],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 34],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0303],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 34],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0344],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 34],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0384],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 34],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0425],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 34],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0466],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 34],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0507],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 34],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0547],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 34],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0587],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 34],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0627],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 35],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0147],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 35],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0189],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 35],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.023],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 35],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0272],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 35],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0315],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 35],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0357],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 35],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0399],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 35],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.044],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 35],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0482],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 35],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0524],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 35],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0565],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 35],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0606],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 35],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0647 ],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 36],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0153],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 36],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0196],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 36],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0239],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 36],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0283],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 36],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0326],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 36],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.037],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 36],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0413],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 36],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0455],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 36],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0498],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 36],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0541],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 36],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0583],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 36],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0625],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 36],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0666],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 37],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0159],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 37],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0204],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 37],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0248],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 37],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0293],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 37],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0338],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 37],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0382],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 37],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0426],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 37],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.047],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 37],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0514],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 37],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0557],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 37],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.06],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 37],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0643],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 37],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0686],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 38],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0164],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 38],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0211],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 38],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0256],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 38],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0302],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 38],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0348],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 38],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0394],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 38],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0439],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 38],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0484],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 38],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0529],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 38],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0573],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 38],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0618],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 38],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0662],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 38],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0706],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 39],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0169],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 39],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0217],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 39],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0265],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 39],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0312],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 39],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0359],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 39],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0406],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 39],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0452],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 39],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0498],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 39],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0544],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 39],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.059],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 39],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0636],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 39],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0682],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 39],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0727],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 40],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0175],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 40],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0224],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 40],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0273],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 40],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0322],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 40],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.037],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 40],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0418],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 40],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0466],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 40],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0513],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 40],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.056],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 40],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0608],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 40],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0655],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 40],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0702],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 40],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0749],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 41],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.018],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 41],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0231],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 41],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0281],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 41],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0332],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 41],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0381],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 41],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0431],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 41],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.048],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 41],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0529],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 41],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0578],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 41],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0626],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 41],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0675],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 41],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0724],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 41],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0772],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 42],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0186],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 42],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0239],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 42],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.029],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 42],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0342],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 42],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0393],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 42],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0444],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 42],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0495],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 42],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0545],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 42],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0596],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 42],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0646],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 42],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0697],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 42],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0747],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 42],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0798],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 43],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0192],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 43],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0246],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 43],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.03],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 43],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0353],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 43],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0406],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 43],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0459],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 43],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0511],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 43],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0564],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 43],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0616],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 43],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0668],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 43],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0721],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 43],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0773],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 43],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0826],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 44],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0198],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 44],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0254],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 44],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.031],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 44],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0365],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 44],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.042],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 44],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0475],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 44],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0529],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 44],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0583],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 44],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0638],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 44],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0692],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 44],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0747],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 44],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0802],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 44],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0856],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 45],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0204],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 45],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0263],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 45],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.032],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 45],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0377],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 45],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0435],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 45],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0492],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 45],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0548],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 45],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0605],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 45],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0662],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 45],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0719],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 45],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0776],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 45],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0833],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 45],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.089],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 46],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0211],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 46],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0272],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 46],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0332],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 46],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0392],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 46],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0452],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 46],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0511],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 46],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.057],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 46],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0629],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 46],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0689],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 46],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0748],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 46],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0808],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 46],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0868],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 46],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0928],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 47],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0219],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 47],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0283],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 47],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0346],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 47],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0409],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 47],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0471],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 47],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0533],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 47],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0596],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 47],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0658],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 47],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.072],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 47],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0782],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 47],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0846],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 47],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.091],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 47],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0974],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 48],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0231],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 48],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0298],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 48],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0364],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 48],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.043],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 48],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0496],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 48],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0561],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 48],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0527],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 48],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0692],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 48],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0758],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 48],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0824],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 48],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.089],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 48],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0958],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 48],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.1025],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 49],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0243],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 49],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0313],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 49],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0383],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 49],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0452],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 49],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0521],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 49],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.059],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 49],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0659],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 49],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0728],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 49],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0797],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 49],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0868],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 49],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0888],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 49],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.101],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 49],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.1081],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 50],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0255],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 50],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0329],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 50],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0402],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 50],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0475],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 50],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0549],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 50],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0621],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 50],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0694],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 50],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0767],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 50],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0841],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 50],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0916],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 50],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0991],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 50],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.1067],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 50],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 15],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.1143],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 51],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0267],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 51],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0346],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 51],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0424],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 51],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0502],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 51],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0579],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 51],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0656],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 51],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0734],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 51],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0812],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 51],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0891],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 51],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.097],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 51],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.105],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 51],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 14],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.1131],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 52],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0283],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 52],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0367],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 52],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.045],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 52],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0532],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 52],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0614],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 52],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0697],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 52],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.078],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 52],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0863],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 52],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0948],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 52],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.1033],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 52],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 13],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.1118],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 53],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0303],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 53],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0393],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 53],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0481],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 53],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0569],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 53],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0657],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 53],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0745],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 53],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0835],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 53],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0924],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 53],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.1014],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 53],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 12],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.1105],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 54],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0324],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 54],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0419],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 54],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0513],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 54],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0608],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 54],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0703],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 54],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0798],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 54],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0894],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 54],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.099],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 54],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 11],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.1087],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 55],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0344],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 55],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0446],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 55],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0548],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 55],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0651],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 55],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0754],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 55],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0856],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 55],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0959],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 55],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 10],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.1063],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 56],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0367],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 56],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0478],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 56],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0589],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 56],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0701],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 56],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0812],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 56],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0922],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 56],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 9],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.1034],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 57],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0397],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 57],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0519],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 57],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.064],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 57],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.076],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 57],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.088],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 57],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 8],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.1001],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 58],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0439],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 58],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0572],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 58],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0703],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 58],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0834],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 58],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 7],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0965],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 59],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0481],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 59],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0626],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 59],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0768],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 59],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 6],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0911],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 60],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0524],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 60],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0681],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 60],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 5],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0837],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 61],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0569],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 61],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 4],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0742],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 62],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 3],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0623],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // End of Single Premium Credit Life Insurance


            /****
             *
             * Short Term Single Premium Credit Life Insurance
             *
             */
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 18],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0039],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 18],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0069],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 19],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0041],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 19],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0071],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 20],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0042],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 20],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0073],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 21],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0043],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 21],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0075],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 22],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0044],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 22],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0078],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 23],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0046],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 23],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0081],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 24],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0047],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 24],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0084],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 25],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0049],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 25],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0087],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 26],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.005],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 26],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.009],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 27],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0052],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 27],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0093],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 28],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0054],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 28],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0098],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 29],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0057],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 29],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0103],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 30],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0059],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 30],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0107],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 31],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0062],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 31],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0112],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 32],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0064],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 32],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0117],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 33],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0067],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 33],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0122],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 34],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0069],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 34],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0127],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 35],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0072],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 35],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0132],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 36],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0075],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 36],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0137],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 37],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0077],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 37],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0141],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 38],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.008],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 38],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0146],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 39],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0082],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 39],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.015],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 40],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0084],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 40],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0154],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 41],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0086],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 41],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0158],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 42],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0088],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 42],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0163],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 43],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0091],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 43],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0168],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 44],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0094],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 44],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0172],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 45],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0096],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 45],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0177],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 46],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0099],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 46],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0182],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 47],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0101],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 47],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0188],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 48],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0106],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 48],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0197],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 49],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0111],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 49],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0206],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 50],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0116],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 50],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0216],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 51],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0121],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 51],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0225],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 52],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0125],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 52],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0236],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 53],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0134],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 53],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0252],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 54],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0143],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 54],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0269],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 55],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0151],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 55],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0285],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 56],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.016],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 56],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0301],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 57],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0168],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 57],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0322],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 58],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0186],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 58],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0355],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 59],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0204],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 59],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0389],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 60],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0222],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 60],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0423],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 61],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.024],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 61],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0457],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 62],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0258],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 62],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0496],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 63],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0288],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 63],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0553],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 64],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'decreasing sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0318],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 18],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'fixed sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.005],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 18],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'fixed sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.009],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 19],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'fixed sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0052],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 19],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'fixed sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0094],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 20],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'fixed sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0054],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 20],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'fixed sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0098],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 21],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'fixed sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0056],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 21],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'fixed sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0102],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 22],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 1],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'fixed sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0058],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'method' => 'calculateShortTermSinglePremiumCredit',
                'conditions' => json_encode([
                    ['field' => 'age', 'operator' => '==', 'value' => 22],
                    ['field' => 'policy_term', 'operator' => '==', 'value' => 2],
                    ['field' => 'policy_type', 'operator' => '==', 'value' => 'fixed sum insured'],
                ]),
                'formulas' => json_encode([
                    ['field' => 'insured_amount', 'operator' => '*', 'value' => 0.0107],
                ]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // End of Short Term Single Premium Credit
        ]);
    }
}
