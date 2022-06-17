<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class AboutEfigResource extends JsonResource
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
                'title' => 'About EFIG',
                'cover' => [
                    'image' => config('app.url') . '/storage/photos/1/pages/efig_1.jpg',
                    'text' => 'Protecting you, securing your future.'
                ],
                'blocks' => [
                    [
                        'title' => 'About EFIG',
                        'image' => config('app.url') . '/storage/photos/1/pages/family_2.jpg',
                        'description' => '<p>Life is a journey of uncertainties. And since 2018, we have made it our mission to people and businesses find the assurance they need. Our range of products provides protection to both individual consumers and commercial clients. Our solutions anticipate rather than react to changing trends, and our teams are focused on establishing long-term relationships that are mutually beneficial. Helping clients stay ahead of risk and serving, as their partners in times of need is why EFIG is here.</p>'
                    ],
                    [
                        'title' => 'Objective & Strategy',
                        'image' => config('app.url') . '/storage/photos/1/pages/efig_2.jpg',
                        'description' => '<p>We are a financially sound and strong company backed by Excellent Fortune Development Group, a top multi-sector conglomerate in Myanmar. We serve our customers with professionalism and integrity, guided by strong moral principles. We listen to your feedback will respond to your concerns in a fair and timely manner.</p>'
                    ],
                ]
            ];
        } else if(Str::lower($data['locale']) == 'my-mm') {
            $response = [
                'title' => 'About EFIG',
                'cover' => [
                    'image' => config('app.url') . '/storage/photos/1/pages/efig_1.jpg',
                    'text' => 'အကျိုးစီးပွားမဆုံးရှုံးစေဖို့ ကြိုတင်ကာကွယ်စို့'
                ],
                'blocks' => [
                    [
                        'title' => 'About EFIG',
                        'image' => config('app.url') . '/storage/photos/1/pages/family_2.jpg',
                        'description' => '<p>ဘဝခရီးလမ်းတွင် မသေချာမရေရာမှုများနှင့် ကြုံတွေနိုင်ပါသည်။ EFI သည် ၂၀၁၈ ခုနှစ်မှစတင်၍ အများပြည်သူတို့လိုအပ်သောအာမခံချက်များကိုဖြည့်ဆည်းပေးနိုင်ရန် ဆောင်ရွက်ပေးလျက်ရှိပါသည်။</p><p>ကျွန်ုပ်တို့ထုတ်ကုန်အမျိုးအစားများသည်တစ်ဦးတစ်ယောက်ချင်းဝယ်သူသူများနှင့် စီးပွားရေးလုပ်ငန်းရှင် ဝယ်သူများအတွက်ပါ ကာကွယ်စောင့်ရှောက်မှုများ ပေးလျက်ရှိပါသည်။</p><p>ကျွန်ုပ်တို့၏ ဝန်ဆောင်မှုများသည် ပြောင်းလဲနေသော ခေတ်ရေစီးကြောင်းများကို တုန့်ပြန်ရန်ထက် ကျွန်ုပ်တို့အဖွဲ့အစည်းသည် နှစ်ဦးနှစ်ဖက် အကျိုးရှိစေနိုင်သော ရေရှည်ဆက်ဆံမှုများ တည်ဆောက်ရန် အဓိကထားဆောင်ရွက်လျက်ရှိပါသည်။</p><p>EFIG၏အဓိကရပ်တည်ချက်မှာဝယ်ယူအားပေးသူများကိုအလားအလာရှိသော အန္တရာယ်များမှကြိုတင်ကာကွယ်နိုင်ရန် ကူညီပေးခြင်းအပြင် လိုအပ်သောအချိန်တွင် သင်တို့၏ ပါတနာအနေဖြင့်လည်း ကူညီဆောင်ရွက်ပေးခြင်းဖြစ်သည်။ သင့်အနာဂတ်ကို EFIG နှင့်အတူ ကာကွယ်ကြပါစို့။</p>'
                    ],
                    [
                        'title' => 'Objective & Strategy',
                        'image' => config('app.url') . '/storage/photos/1/pages/efig_2.jpg',
                        'description' => '<p>ကျွန်ုပ်တို့သည် မြန်မာနိုင်ငံတွင် ထိပ်တန်းစီးပွားရေးလုပ်ငန်းများစွာ ပေါင်းစည်း ပါဝင်သော ကော်ပိုရေးတစ်ခုဖြစ်သည့် Excellent Fortune Development Group နောက်ခံရှိသောကြောင့် ဘဏ္ဍာရေးအားဖြင့် တောင့်တင်းခိုင်မာသော ကုမ္ပဏီတစ်ခုဖြစ်သည်။ ကျွန်ုပ်တို့သည် ကျွန်ုပ်တို့၏ ဝယ်ယူအားပေးသူများကို လုပ်ငန်းပိုင်းဆိုင်ရာကျွမ်းကျင်ပိုင်နိုင်မှု၊ ဂုဏ်သိက္ခာနှင့်အညီ ခိုင်မာသော ကျင့်ဝတ်စည်းကမ်းများနှင့်အတူ ဝန်ဆောင်မှုပေးရန် ရည်ရွယ်ပါသည်။ ကျွန်ုပ်တို့သည် ဝယ်ယူသူ၏ တုန့်ပြန်ချက်များကို အစဉ်နားထောင်လျက်ရှိပြီး လျင်မြန်စွာ အလေးထားတုံပြန်လျက်ရှိပါသည်။</p>'
                    ],
                ]
            ];
        }  else if(Str::lower($data['locale']) == 'zh-cn') {
            $response = [
                'title' => 'About EFIG',
                'cover' => [
                    'image' => config('app.url') . '/storage/photos/1/pages/efig_1.jpg',
                    'text' => 'Protecting you, securing your future.'
                ],
                'blocks' => [
                    [
                        'title' => 'About EFIG',
                        'image' => config('app.url') . '/storage/photos/1/pages/family_2.jpg',
                        'description' => '<p>Life is a journey of uncertainties. And since 2018, we have made it our mission to people and businesses find the assurance they need. Our range of products provides protection to both individual consumers and commercial clients. Our solutions anticipate rather than react to changing trends, and our teams are focused on establishing long-term relationships that are mutually beneficial. Helping clients stay ahead of risk and serving, as their partners in times of need is why EFIG is here.</p>'
                    ],
                    [
                        'title' => 'Objective & Strategy',
                        'image' => config('app.url') . '/storage/photos/1/pages/efig_2.jpg',
                        'description' => '<p>We are a financially sound and strong company backed by Excellent Fortune Development Group, a top multi-sector conglomerate in Myanmar. We serve our customers with professionalism and integrity, guided by strong moral principles. We listen to your feedback will respond to your concerns in a fair and timely manner.</p>'
                    ],
                ]
            ];
        } else {
            $response = [__('validation.required', ['attribute' => 'locale'])];
        }

        return $response;
    }
}
