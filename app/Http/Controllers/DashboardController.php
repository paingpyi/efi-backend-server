<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\Product;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::where('is_active', '=', true)->get()->count();
        $jobs = Job::where('is_vacant', '=', true)->get()->count();
        $blog = blog::where('status', '=', 'published')->get()->count();
        $user = User::where('is_active', '=', true)->get()->count();

        return view('admin.dashboard')->with(['product_count' => $product, 'jobs_count' => $jobs, 'blog_count' => $blog, 'user_count' => $user]);
    }

    /**
     * Refresh Frontend.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function refresh(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'page' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin#dashboard')
                ->withErrors($validator)
                ->withInput();
        }

        $key = config('efi.api_key');
        $data = [];
        $flag = false;

        if ($request->page == 'home') {
            $data = [
                'type' => 'home-page-updated',
                'locales' => ["en-US", "my-MM", "zh-CN"],
            ];

            $response = Http::withHeaders([
                'Authorization' => "Bearer {$key}"
            ])->post('https://efigmm.com/api/revalidate', $data);

            Log::info('Log message', array([
                'context' => [
                    'response code' => $response->status(),
                    'response reason' => $response->body(),
                    'data' => $data
                ]
            ]));
        } else if ($request->page == 'product') {
            $products = DB::table('products')
                ->join('categories', 'categories.id', '=', 'products.category_id')
                ->select(
                    'products.id',
                    'products.is_active',
                    'products.is_home',
                    'products.slug_url',
                    'products.quote_machine_name',
                    'products.claim_machine_name',
                    'products.category_id',
                    'categories.name as category_name',
                    'categories.description as category_description',
                    'categories.machine as category_machine_name'
                )
                ->where('products.is_active', '=', true)
                ->get();

            foreach ($products as $row) {
                $data = [
                    'type' => 'product-detail-updated',
                    'locales' => ["en-US", "my-MM", "zh-CN"],
                    'data' => [
                        'category_machine_name' => $row->category_machine_name,
                        'slug' => $row->slug_url
                    ]
                ];

                $response = Http::withHeaders([
                    'Authorization' => "Bearer {$key}"
                ])->post('https://efigmm.com/api/revalidate', $data);

                Log::info('Log message', array([
                    'context' => [
                        'response code' => $response->status(),
                        'response reason' => $response->body(),
                        'data' => $data
                    ]
                ]));

                sleep(0.30);
            }
        } else if ($request->page == 'blog') {
            $blogs = DB::table('blogs')
                ->join('users', 'blogs.author_id', '=', 'users.id')
                ->join('categories', 'blogs.main_category', '=', 'categories.id')
                ->select(
                    'blogs.id',
                    'blogs.status',
                    'blogs.url_slug as slug_url',
                    'blogs.main_category',
                    'categories.machine as category_machine_name',
                    'categories.is_active as category_is_active',
                    'blogs.category_id',
                    'blogs.featured',
                    'blogs.promoted',
                    'blogs.author_id',
                    'users.name as author_name',
                    'users.email as author_email',
                )
                ->where('products.is_active', '=', true)
                ->get();

            foreach ($blogs as $row) {
                $data = [
                    'type' => 'product-detail-updated',
                    'locales' => ["en-US", "my-MM", "zh-CN"],
                    'data' => [
                        'category_machine_name' => $row->category_machine_name,
                        'slug' => $row->slug_url
                    ]
                ];

                $response = Http::withHeaders([
                    'Authorization' => "Bearer {$key}"
                ])->post('https://efigmm.com/api/revalidate', $data);

                Log::info('Log message', array([
                    'context' => [
                        'response code' => $response->status(),
                        'response reason' => $response->body(),
                        'data' => $data
                    ]
                ]));

                sleep(0.30);
            }
        } else if ($request->page == 'career') {
            $jobs = DB::table('jobs')
                ->join('categories', 'categories.id', '=', 'jobs.category')
                ->select(
                    'jobs.id',
                    'jobs.category as category_id',
                    'categories.name as category_name',
                    'categories.description as category_description',
                    'categories.machine as category_machine_name',
                    'categories.is_active as category_is_active',
                    'jobs.due_date',
                    'jobs.slug_url',
                    'jobs.linkedin_url',
                    'jobs.is_vacant',
                    'jobs.instant'
                )
                ->where('products.is_active', '=', true)
                ->get();

            foreach ($jobs as $row) {
                $data = [
                    'type' => 'product-detail-updated',
                    'locales' => ["en-US", "my-MM", "zh-CN"],
                    'data' => [
                        'category_machine_name' => $row->category_machine_name,
                        'slug' => $row->slug_url
                    ]
                ];

                $response = Http::withHeaders([
                    'Authorization' => "Bearer {$key}"
                ])->post('https://efigmm.com/api/revalidate', $data);

                Log::info('Log message', array([
                    'context' => [
                        'response code' => $response->status(),
                        'response reason' => $response->body(),
                        'data' => $data
                    ]
                ]));

                sleep(0.30);
            }
        }

        return redirect()->route('admin#dashboard')->with(['success_message' => 'Successfully <strong>refresh!</strong>']);
    }
}
