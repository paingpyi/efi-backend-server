<?php

namespace App\Http\Controllers;

use App\Models\ContactPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Encryption\DecryptException;

class ContactPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = ContactPage::get();

        return view('admin.blocks.contact.list')->with(['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blocks.contact.add-edit')->with(['action' => 'new']);
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
            'title' => 'required',
            'address_english' => 'required',
            'title_burmese' => 'required',
            'address_burmese' => 'required',
            'title_chinese' => 'required',
            'address_chinese' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('contact#block')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->main == 'on') {
            ContactPage::where('main', '=', true)->update([
                'main' => false,
            ]);
        }

        ContactPage::create([
            'title' => json_encode([
                'en-us' => $request->title,
                'my-mm' => $request->title_burmese,
                'zh-cn' => $request->title_chinese
            ]),
            'address' => json_encode([
                'en-us' => $request->address_english,
                'my-mm' => $request->address_burmese,
                'zh-cn' => $request->address_chinese
            ]),
            'map' => isset($request->map) ? $request->map : NULL,
            'main' => ($request->main == 'on' ? true : false),
        ]);

        $key = config('efi.api_key');

        $data = [
            'type' => 'contact-page-updated',
        ];

        $response = Http::withHeaders([
            'Authorization' => "Bearer {$key}"
        ])->post('https://efigmm.com/api/revalidate', $data);

        return redirect()->route('contact#list')->with(['success_message' => 'Successfully <strong>saved!</strong>']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = ContactPage::where('id', '=', Crypt::decryptString($id))->first();

        return view('admin.blocks.contact.add-edit')->with(['action' => 'update', 'contact' => $contact]);
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
            'title' => 'required',
            'address_english' => 'required',
            'title_burmese' => 'required',
            'address_burmese' => 'required',
            'title_chinese' => 'required',
            'address_chinese' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('edit#contact')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->main == 'on') {
            ContactPage::where('main', '=', true)->update([
                'main' => false,
            ]);
        }

        ContactPage::where('id', '=', $id)->update([
            'title' => json_encode([
                'en-us' => $request->title,
                'my-mm' => $request->title_burmese,
                'zh-cn' => $request->title_chinese
            ]),
            'address' => json_encode([
                'en-us' => $request->address_english,
                'my-mm' => $request->address_burmese,
                'zh-cn' => $request->address_chinese
            ]),
            'map' => isset($request->map) ? $request->map : NULL,
            'main' => ($request->main == 'on' ? true : false),
        ]);

        $key = config('efi.api_key');

        $data = [
            'type' => 'contact-page-updated'
        ];

        $response = Http::withHeaders([
            'Authorization' => "Bearer {$key}"
        ])->post('https://efigmm.com/api/revalidate', $data);

        return redirect()->route('contact#list')->with(['success_message' => 'Successfully <strong>updated!</strong>']);
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
            $contact = ContactPage::where('id', '=', Crypt::decryptString($id))->first();
            $flag = false;
            $message = 'updated contact has not been main adress';

            if ($contact->main) {
                $flag = false;
                $message = 'updated contact has not been main adress';
            } else {
                $flag = true;
                $message = 'updated contact has been main adress';

                ContactPage::where('main', '=', true)->update([
                    'main' => false,
                ]);
            }

            ContactPage::where('id', '=', Crypt::decryptString($id))->update(['main' => $flag]);

            $key = config('efi.api_key');

            $data = [
                'type' => 'contact-page-updated',
                'locales' => ["en-US", "my-MM", "zh-CN"],
            ];

            $response = Http::withHeaders([
                'Authorization' => "Bearer {$key}"
            ])->post('https://efigmm.com/api/revalidate', $data);

            return redirect()
                ->route('contact#list')
                ->with(['success_message' => 'Successfully <strong>' . $message . '!</strong>']);
        } catch (DecryptException $e) {
            abort(404, 'Decrypt Exception occured.');
        }
    }
}
