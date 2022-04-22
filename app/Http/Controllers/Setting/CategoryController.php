<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->getCategories(0, 'is_active', '=', true);

        return view('admin.category.list')->with(['categories' => $categories]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deactivated()
    {
        $categories = $this->getCategories(0, 'is_active', '=', false);

        return view('admin.category.list')->with(['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_category = Category::where('is_active', '=', true)->get();

        return view('admin.category.add-edit')->with(['action' => 'new', 'parent_category' => $parent_category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('new#category')
                ->withErrors($validator)
                ->withInput();
        }

        $category = [
            'name' => $request->name,
            'description' => $request->description,
            'name_burmese' => $request->name_burmese,
            'description_burmese' => $request->description_burmese,
            'name_chinese' => $request->name_chinese,
            'description_chinese' => $request->description_chinese,
            'parent_id' => (!is_null($request->parent)) ? $request->parent : null,
            'is_active' => ($request->is_active == 'on') ? true : false,
            'machine' => Str::slug($request->name),
        ];

        Category::create($category);

        return redirect()->route('category#list')->with(['success_message' => 'Successfully <strong>saved!</strong>']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('id', '=', Crypt::decryptString($id))->first();
        $parent_category = Category::where('is_active', '=', true)->get();

        return view('admin.category.add-edit')->with(['category' => $category, 'action' => 'update', 'parent_category' => $parent_category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('edit#category')
                ->withErrors($validator)
                ->withInput();
        }

        $category = [
            'name' => $request->name,
            'description' => $request->description,
            'name_burmese' => $request->name_burmese,
            'description_burmese' => $request->description_burmese,
            'name_chinese' => $request->name_chinese,
            'description_chinese' => $request->description_chinese,
            'parent_id' => (!is_null($request->parent)) ? $request->parent : null,
            'is_active' => ($request->is_active == 'on') ? true : false,
        ];

        Category::where('id', '=', $id)->update($category);

        return redirect()->route('category#list')->with(['success_message' => 'Successfully <strong>updated!</strong>']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $team = Category::where('id', '=', Crypt::decryptString($id))->first();
            $flag = false;
            $message = 'deactivated';

            if ($team->is_active) {
                $flag = false;
                $message = 'deactivated';
            } else {
                $flag = true;
                $message = 'activated';
            }

            Category::where('id', '=', Crypt::decryptString($id))->update(['is_active' => $flag]);

            return redirect()
                ->route('category#list')
                ->with(['success_message' => 'Successfully <strong>' . $message . '!</strong>']);
        } catch (DecryptException $e) {
            abort(404, 'Decrypt Exception occured.');
        }
    }

    /**
     * List API of resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postList(Request $request)
    {
        $response_code = 200;
        $lang_chinese = 'zh-cn';
        $lang_burmese = 'my-mm';
        $data = $request->json()->all();

        $category_db = DB::table('categories')->select('*')->where('parent_id', '=', 2);

        $result = [];
        $category = $category_db->get();
        $total_count = $category->count();
        foreach ($category as $row) {
            if (isset($data['locale']) and Str::lower($data['locale']) == $lang_chinese) {
                $result[] = [
                    'id' => $row->id,
                    'name' => $row->name_chinese,
                    'description' => $row->description_chinese,
                    'is_active' => $row->is_active,
                    'machine_name' => $row->machine,
                    'created_at' => $row->created_at,
                    'updated_at' => $row->updated_at,
                ];
            } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_burmese) {
                $result[] = [
                    'id' => $row->id,
                    'name' => $row->name_burmese,
                    'description' => $row->description_burmese,
                    'is_active' => $row->is_active,
                    'machine_name' => $row->machine,
                    'created_at' => $row->created_at,
                    'updated_at' => $row->updated_at,
                ];
            } else {
                $result[] = [
                    'id' => $row->id,
                    'name' => $row->name,
                    'description' => $row->description,
                    'is_active' => $row->is_active,
                    'machine_name' => $row->machine,
                    'created_at' => $row->created_at,
                    'updated_at' => $row->updated_at,
                ];
            }
        }

        if($total_count>0) {
            $response = [
                'code' => 200,
                'status' => 'success',
                'locale' => $this->getLang($data),
                'count' => $total_count,
                'data' => $result,
            ];
        } else {
            $response_code = 404;
            $response = [
                'code' => $response_code,
                'status' => 'no content',
            ];
        }

        return response()->json($response, $response_code);
    }

    private function getLang($data)
    {
        $lang_english = 'en-us';
        $lang_chinese = 'zh-cn';
        $lang_burmese = 'my-mm';

        if (isset($data['locale']) and Str::lower($data['locale']) == $lang_english) {
            return ['lang' => 'en-US', 'name' => 'English'];
        } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_chinese) {
            return ['lang' => 'zh-CN', 'name' => 'Chinese'];
        } else if (isset($data['locale']) and Str::lower($data['locale']) == $lang_burmese) {
            return ['lang' => 'my-MM', 'name' => 'Burmese'];
        } else {
            return ['lang' => 'en-US/my-MM/zh-CN', 'name' => 'English/Burmese/Chinese'];
        }
    }

    private function getCategories($paginate, $search_column = null, $search_operator = null, $search_value = null)
    {
        if (is_null($search_column) and is_null($search_operator) and is_null($search_value)) {
            if ($paginate > 0) {
                return Category::paginate($paginate);
            } else {
                return Category::get();
            }
        } else {
            if ($paginate > 0) {
                return Category::where($search_column, $search_operator, $search_value)->paginate($paginate);
            } else {
                return Category::where($search_column, $search_operator, $search_value)->get();
            }
        }
    }
}
