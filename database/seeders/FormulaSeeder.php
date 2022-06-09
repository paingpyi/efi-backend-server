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
             * Marine Cargo Insurance
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
        ]);
    }
}
