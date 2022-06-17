<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class AboutEfilResource extends JsonResource
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

        if(Str::lower($data['locale']) == 'en-us') {
            $response = [
                'title' => 'About EFIL',
                'cover' => [
                    'image' => config('app.url') . '/storage/photos/1/pages/family_1.jpg',
                    'text' => 'Live Life Truly'
                ],
                'blocks' => [
                    [
                        'title' => 'About EFIL',
                        'image' => config('app.url') . '/storage/photos/1/pages/family_2.jpg',
                        'description' => '<p>EFI Life is focused on creating fresh customer experiences, with easy-to-understand products, supported by digital technology. Through this customer-led approach, EFI Life aims to become a leading Myanmar insurer that changes the way people feel about insurance. Come journey with us! Let us help you live life truly. Let’s #livelifetruly. Together!</p>'
                    ],
                    [
                        'title' => 'Objective & Strategy',
                        'image' => config('app.url') . '/storage/photos/1/pages/family_1.jpg',
                        'description' => '<p>We provide comprehensive explanations of the solutions based on your needs so that you can understand their features, benefits, risks, terms and conditions, and your commitment - before you make your purchase decision.We are committed to creating a positive social impact through our products and services and to empowering the people of Myanmar to live better life. We are making insurance available to all segments of society.</p>'
                    ],
                ]
            ];
        } else if(Str::lower($data['locale']) == 'my-mm') {
            $response = [
                'title' => 'About EFIL',
                'cover' => [
                    'image' => config('app.url') . '/storage/photos/1/pages/family_1.jpg',
                    'text' => 'စစ်မှန်သောလူနေမှုဘ၀ဆီသို့'
                ],
                'blocks' => [
                    [
                        'title' => 'About EFIL',
                        'image' => config('app.url') . '/storage/photos/1/pages/family_2.jpg',
                        'description' => '<p>EFI Life သည် ဒစ်ဂျစ်တယ် နည်းပညာဖြင့် နားလည်ရန်လွယ်ကူသော ထုတ်ကုန်များနှင့်အတူ ကောင်းမွန်သော အတွေ့အကြုံများကို ဝယ်ယူအားပေးသူများထံ ပေးနိုင်ရန် အဓိကထားဆောင်ရွက်နေပါသည်။ ၎င်းကဲ့သို့သော ဝယ်ယူအားပေးသူအား ဦးစားပေးသည့်စနစ်ဖြင့် EFI Life သည် အာမခံအပေါ် ပြည်သူများ၏ ထင်မြင်ခံစားမှုပြောင်းလဲနိုင်သော အာမခံကုမ္ပဏီတစ်ခုအနေဖြင့် မြန်မာနိုင်ငံတွင်ဦးဆောင်နိုင်ရန် ရည်ရွယ်ပါသည်။ ကျွန်ုပ်တို့နှင့်အတူ လက်တွဲလိုက်ပါ။ သင့်ဘဝကို စစ်မှန်စွာနေထိုင်နိုင်ရန် ကူညီပေးပါရစေ။ ဘဝကိုစစ်မှန်စွာ အတူတကွနေထိုင်ကြပါစို့။</p>'
                    ],
                    [
                        'title' => 'Objective & Strategy',
                        'image' => config('app.url') . '/storage/photos/1/pages/family_1.jpg',
                        'description' => '<p>ကျွန်ုပ်တို့သည် ဝယ်ယူအားပေးသူများ၏ လိုအပ်ချက်များအပေါ်မူတည်၍ သင့်လျော်သော အာမခံဝန်ဆောင်မှုများကို ပေးလျက်ရှိပါသည်။ ထို့အပြင် ဝယ်ယူအားပေးသူများအနေဖြင့် မဝယ်ယူမှီ အာမခံဝန်ဆောင်မှုများ၏ သဘောသဘာဝများ၊ ရရှိနိုင်သော အကျိုးခံစားခွင့်များနှင့် စည်းမျဉ်းစည်းကမ်းများကို နားလည်စေရန်လည်း သေချာစွာရှင်းပြပေးလျက်ရှိပါသည်။ ကျွန်ုပ်တို့သည် ထုတ်ကုန်များနှင့် ဝန်ဆောင်မှုများမှတစ်ဆင့် ကောင်းမွန်သော လူမှုပတ်ဝန်းကျင်ဆိုင်ရာ အကျိုးသက်ရောက်မှုတစ်ခုဖန်တီးရန်နှင့် မြန်မာပြည်သူများ ပိုမိုကောင်းမွန်သော ဘဝတစ်ခုပိုင်ဆိုင်နိုင်ရန်အတွက် ဝန်ဆောင်မှုပေးလျက်ရှိပါသည်။ ကျွန်ုပ်တို့သည်ကဏ္ဍပေါင်းစုံအသီးသီးအတွက်အာမခံဝန်ဆောင်မှုများပေးနိုင်ရန် အစဉ်ကြိုးပန်းလျက်ရှိပါသည်။</p>'
                    ],
                ]
            ];
        }  else if(Str::lower($data['locale']) == 'zh-cn') {
            $response = [
                'title' => 'About EFIL',
                'cover' => [
                    'image' => config('app.url') . '/storage/photos/1/pages/family_1.jpg',
                    'text' => 'Live Life Truly'
                ],
                'blocks' => [
                    [
                        'title' => 'About EFIL',
                        'image' => config('app.url') . '/storage/photos/1/pages/family_2.jpg',
                        'description' => '<p>EFI Life is focused on creating fresh customer experiences, with easy-to-understand products, supported by digital technology. Through this customer-led approach, EFI Life aims to become a leading Myanmar insurer that changes the way people feel about insurance. Come journey with us! Let us help you live life truly. Let’s #livelifetruly. Together!</p>'
                    ],
                    [
                        'title' => 'Objective & Strategy',
                        'image' => config('app.url') . '/storage/photos/1/pages/family_1.jpg',
                        'description' => '<p>We provide comprehensive explanations of the solutions based on your needs so that you can understand their features, benefits, risks, terms and conditions, and your commitment - before you make your purchase decision.We are committed to creating a positive social impact through our products and services and to empowering the people of Myanmar to live better life. We are making insurance available to all segments of society.</p>'
                    ],
                ]
            ];
        } else {
            $response = [__('validation.required', ['attribute' => 'locale'])];
        }

        return $response;
    }
}
