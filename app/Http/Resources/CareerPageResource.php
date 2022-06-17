<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class CareerPageResource extends JsonResource
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
                'title' => 'Career',
                'blocks_1' => [
                    'title' => 'Life at EFI',
                    'description' => '<p>Here at EFI, we are a challenger brand, propelled by people who dare to be different and are passionate about what we do. A career with EFI allows you to inspire new ideas and make decisions that will shape a better future for everyone. As a new company, more often than not, our employees do not have ‘manuals’ on how to get the job done. Instead, we are given the creative space and freedom to think and decide how the job can be done best.</p>'
                ],
                'blocks_2' => [
                    'title' => 'Be a Financial Consultant / Advisor',
                    'image' => config('app.url') . '/storage/uploads/demo/career/career-1.jpg',
                    'description' => '<p>Make a real difference in customers’ lives while building a limitless career. As a financial consultant and insurance advisor, your true purpose lies in helping our customers achieve their financial goals. From helping new couples prepare their finances as they start a family, ensuring your customers retire well, to helping to protect businesses against loss, you’ll be a true partner in helping people craft the lives they want.</p>'
                ],
                'blocks_3' =>    [
                    'title' => 'Learn More about Company',
                    'images' => [
                        config('app.url') . '/storage/uploads/demo/career/career-b-1.jpg',
                        config('app.url') . '/storage/uploads/demo/career/career-b-2.jpg',
                        config('app.url') . '/storage/uploads/demo/career/career-b-3.jpg',
                    ]
                ],
                'blocks_4' =>    [
                    'image' => config('app.url') . '/storage/uploads/demo/career/career-b-3.jpg',
                    'title' => 'We are always either solving problems or seeking new ideas',
                    'text' => 'At EFI, we aim to help and support you in maximizing your full potential. With the industry’s broadest multi-channel distribution network and unique channel transfer opportunities, you’ll have the flexibility to find the career track that maximizes your strengths, so that you can realize your career aspirations.'
                ],
                'blocks_5' =>   [
                    'title' => 'Unlock your exclusive privilege opportunities now.',
                    'link' => 'about/careers/efi-l'
                ],
            ];
        } else if (Str::lower($data['locale']) == 'my-mm') {
            $response = [
                'title' => 'Career',
                'blocks_1' => [
                    'title' => 'Life at EFI',
                    'description' => '<p>ဆောင်ရွက်ချက်များအပေါ်  ပြင်းပြသောဆန္ဒရှိသူများဖြင့် ဖွဲ့စည်းထားသော စိန်ခေါ်မှုများနှင့် ကုမ္ပဏီတစ်ခုဖြစ်ပါသည်။ EFI နှင့်အတူလက်တွဲ အလုပ်လုပ်ခြင်းဖြင့် လူတိုင်းအတွက် ဆန်းသစ်သော အတွေးအခေါ်များ တိုးပွားလာစေနိုင်ပြီး ပိုမိုကောင်းမွန်သော အနာဂတ်တစ်ခုပိုင်ဆိုင်နိုင်မည် ဖြစ်ပါသည်။ အသက်မွေးဝမ်းကြောင်းတစ်ခုနှင့်တစ်ခုသည် မတူညီနိုင်သည့်အလျောက် ကျွန်ုပ်တို့ဝန်ထမ်းများ၏ အကောင်းဆုံးသော စွမ်းရည်များကို ဖော်ဆောင်ပေးနေပါသည်။ လူတိုင်းသည် အားသာချက်အသီးသီးကို ကောင်းစွာအသုံးချ ဆောင်ရွက်နိုင်ပါက အောင်မြင်သောသူ တစ်ယောက် ဖြစ်လာရန် အလားအလာရှိသည်ဟု ယုံကြည်ပါသည်။ ကျွန်ုပ်တို့သည် ကျွန်ုပ်တို့ဆောင်ရွက်သောလုပ်ငန်းများ၊ ထုတ်ကုန်အသစ်များဖန်တီးခြင်းနှင့် ဝယ်ယူအားပေးသူတိုင်းအတွက် ဝန်ဆောင်မှုများအပေါ် ဆန္ဒပြင်းပြစွာ လုပ်ကိုင်လျက်ရှိပါသည်။ အတူတကွပူးပေါင်း ဆောင်ရွက်ခြင်းဖြင့် မြန်မာနိုင်ငံအတွက် ပိုမိုကောင်းမွန်တောက်ပသော အနာဂတ်တစ်ခု ဖန်တီးနိုင်မည်ဖြစ်ပါသည်။ EFI တွင် ရေရှည်လက်တွဲ အလုပ်လုပ်ကိုင်နိုင်ရန် အခွင့်အရေးများ ဖန်တီးပေးလျက်ရှိပါသည်။ ဦးဆောင်နိုင်စွမ်းရှိသူများနှင့် စွန့်ဦးတီထွင်နိုင်စွမ်းရှိသူများကို ကျွန်ုပ်တို့ EFIမှ လက်ကမ်းကြိုဆိုလျက် ရှိပါသည်။ EFI တွင်လက်တွဲဆောင်ရွက်ရင်း သင့်အနာဂတ်ကို ကျွန်ုပ်တို့နှင့်အတူ တောက်ပလိုက်ပါ။</p>'
                ],
                'blocks_2' =>     [
                    'title' => 'Be a Financial Consultant / Advisor',
                    'image' => config('app.url') . '/storage/uploads/demo/career/career-1.jpg',
                    'description' => '<p>ငွေကြေးဆိုင်ရာအကြံပေး နှင့် အာမခံအကြံပေးတစ်ယောက်အနေဖြင့် ကျွန်ုပ်တို့၏ ဝယ်သူများအတွက် ငွေကြေးဆိုင်ရာ ရည်မှန်းချက်များကို ဖြည့်ဆည်းနိုင်ရန် ကူညီပေးခြင်းသည် အဓိကရည်ရွယ်ချက်ဖြစ်ပါသည်။ မိသားစုတစ်ခု စတင်မည့် ဇနီးမောင်နှံအသစ်များအတွက် ငွေကြေးဆိုင်ရာကိစ္စရပ်များ ကြိုတင်ပြင်ဆင်ရာတွင် ကူညီပေးခြင်း၊ သင့်ဝယ်သူများ စိတ်အေးချမ်းစွာ အငြိမ်းစားယူနိုင်ရန် ဆောင်ရွက်ပေးခြင်းတို့မှစ၍ လုပ်ငန်းများ အရှုံးပေါ်ခြင်းမှ ကာကွယ်နိုင်ရန် ကူညီပေးခြင်းတို့ဖြင့် လူအများအတွက် သူတို့လိုချင်သော ဘဝကိုရရှိနိုင်ရန် အကူအညီပေးသော စစ်မှန်သည့် လက်တွဲဖော်ကောင်းတစ်ယောက် ဖြစ်လာနိုင်ပါသည်။</p>'
                ],
                'blocks_3' =>     [
                    'title' => 'Learn More about Company',
                    'images' => [
                        config('app.url') . '/storage/uploads/demo/career/career-b-1.jpg',
                        config('app.url') . '/storage/uploads/demo/career/career-b-2.jpg',
                        config('app.url') . '/storage/uploads/demo/career/career-b-3.jpg',
                    ]
                ],
                'blocks_4' =>     [
                    'image' => config('app.url') . '/storage/uploads/demo/career/career-b-3.jpg',
                    'title' => 'ကျွန်ုပ်တို့သည် အစဉ်သဖြင့် ပြဿနာရပ်များအဖြေရှာခြင်းနှင့် ဆန်းသစ်သောအတွေးအခေါ်များ ဖန်တီးလျက်ရှိပါသည်။',
                    'text' => 'EFI တွင် သင့်စွမ်းရည်များ တိုးပွါးလာစေရန် ထောက်ပံ့ကူညီပေးခြင်းမှာ ကျွန်ုပ်တို့၏ ရည်မှန်းချက်ပင်ဖြစ်သည်။ လုပ်ငန်း၏အကျယ်ပြန့်ဆုံး ဘက်စုံဖြန့်ချီရေး စနစ်များနှင့် တစ်မူထူးခြားသော ဖြန့်ချီမှု အခွင့်အရေးများနှင့်အတူ သင့်အားသာချက်များ တိုးပွါးစေနိုင်ရုံမက သင်၏အသက်မွေးဝမ်းကြောင်း ရည်မှန်းချက်ကိုပါ ဖြည့်ဆည်းပေးနိုင်သည့် အသက်မွေးမှု လမ်းကြောင်းကို ရှာတွေ့နိုင်မည်ဖြစ်သည်။'
                ],
                'blocks_5' =>     [
                    'title' => 'Unlock your exclusive privilege opportunities now.',
                    'link' => 'about/careers/efi-l'
                ],
            ];
        } else if (Str::lower($data['locale']) == 'zh-cn') {
            $response = [
                'title' => 'Career',
                'blocks_1' => [
                    'title' => 'Life at EFI',
                    'description' => '<p>Here at EFI, we are a challenger brand, propelled by people who dare to be different and are passionate about what we do. A career with EFI allows you to inspire new ideas and make decisions that will shape a better future for everyone. As a new company, more often than not, our employees do not have ‘manuals’ on how to get the job done. Instead, we are given the creative space and freedom to think and decide how the job can be done best.</p>'
                ],
                'blocks_2' => [
                    'title' => 'Be a Financial Consultant / Advisor',
                    'image' => config('app.url') . '/storage/uploads/demo/career/career-1.jpg',
                    'description' => '<p>Make a real difference in customers’ lives while building a limitless career. As a financial consultant and insurance advisor, your true purpose lies in helping our customers achieve their financial goals. From helping new couples prepare their finances as they start a family, ensuring your customers retire well, to helping to protect businesses against loss, you’ll be a true partner in helping people craft the lives they want.</p>'
                ],
                'blocks_3' =>    [
                    'title' => 'Learn More about Company',
                    'images' => [
                        config('app.url') . '/storage/uploads/demo/career/career-b-1.jpg',
                        config('app.url') . '/storage/uploads/demo/career/career-b-2.jpg',
                        config('app.url') . '/storage/uploads/demo/career/career-b-3.jpg',
                    ]
                ],
                'blocks_4' =>    [
                    'image' => config('app.url') . '/storage/uploads/demo/career/presentation.jpg',
                    'title' => 'We are always either solving problems or seeking new ideas',
                    'text' => 'At EFI, we aim to help and support you in maximizing your full potential. With the industry’s broadest multi-channel distribution network and unique channel transfer opportunities, you’ll have the flexibility to find the career track that maximizes your strengths, so that you can realize your career aspirations.'
                ],
                'blocks_5' =>   [
                    'title' => 'Unlock your exclusive privilege opportunities now.',
                    'button' => [
                        'text' => 'View Open Positions',
                        'link' => 'about/careers/efi-l'
                    ]
                ],
            ];
        } else {
            $response = [__('validation.required', ['attribute' => 'locale'])];
        }

        return $response;
    }
}
