<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class EFILResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = $request->json()->all();

        if (!isset($data['locale'])) {
            $response_code = 400;
            $error_messages[] = __('validation.required', ['attribute' => 'locale']);

            return $error_messages;
        }

        if (Str::lower($data['locale']) == 'en-us') {
            $response = [
                'title' => 'Careers at EFI General',
                'text' => '<p>We believe in nurturing an engaging environment that fosters synergy, helping our people grow with the company and realize their full potential. We always offer and create opportunities for long-term career positions at EFIL. For those who have leadership & entrepreneurial skills, are most welcome to our team. Enlighten your future with us and be the one to be part of us.</p>',
                'image' => config('app.url') . '/storage/photos/1/stock-images/14. Micro Health Insurance PHOTO 3.jpg',
            ];
        } else if (Str::lower($data['locale']) == 'my-mm') {
            $response = [
                'title' => 'Careers at EFI General',
                'text' => '<p>ကျွန်ုပ်တို့သည် စုပေါင်းဆောင်ရွက်မှုကို မြှင့်တင်ပေးသော၊ ကျွန်ုပ်တို့ဝန်ထမ်းများကို ကုမ္ပဏီနှင့်အတူ တိုးတက်လာစေနိုင်သော ပတ်ဝန်းကျင်တစ်ခု ဖန်တီးရန်နှင့် ဝန်ထမ်းများ၏ စွမ်းရည်အပြည့်အဝ ဖော်ဆောင်ရန် ယုံကြည်ထားပါသည်။ ဦးဆောင်နိုင်စွမ်းရှိသူများနှင့် စွန့်ဦးတီထွင်နိုင်စွမ်းရှိသူများကို ကျွန်ုပ်တို့ EFIမှ လက်ကမ်းကြိုဆိုလျက် ရှိပါသည်။ EFI တွင်လက်တွဲဆောင်ရွက်ရင်း သင့်အနာဂတ်ကို ကျွန်ုပ်တို့နှင့်အတူ တောက်ပလိုက်ပါ။</p>',
                'image' => config('app.url') . '/storage/photos/1/stock-images/14. Micro Health Insurance PHOTO 3.jpg',
            ];
        } else if (Str::lower($data['locale']) == 'zh-cn') {
            $response = [
                'title' => 'Careers at EFI General',
                'text' => '<p>Being a lean organization, every employee plays an important role. We are always either solving problems or seeking new ideas. As such, we have plenty of opportunities to innovate, create and develop ourselves in unparalleled ways. We are always creating the opportunities to learn new skills and develop themselves through the journey of our people at EFIG.</p>',
                'image' => config('app.url') . '/storage/photos/1/stock-images/14. Micro Health Insurance PHOTO 3.jpg',
            ];
        } else {
            $response = [__('validation.required', ['attribute' => 'locale'])];
        }

        return $response;
    }
}
