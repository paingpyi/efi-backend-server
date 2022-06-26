<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\PromotionBlock;

class PageCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = $request->json()->all();
        $response_code = 200;
        $error_messages = [];
        $slider_block = [];
        $feature_life_block = [];
        $feature_general_block = [];

        if (!isset($data['locale'])) {
            $response_code = 400;
            $error_messages[] = __('validation.required', ['attribute' => 'locale']);

            return $error_messages;
        }

        $slider = DB::table('slider_blocks')
            ->select(
                'id',
                DB::raw('JSON_EXTRACT(title, \'$."' . Str::lower($data['locale']) . '"\') as title'),
                'image',
                'kind'
            )->get();

        if (isset($slider)) {
            foreach ($slider as $row) {
                $slider_block[] = [
                    'title' => Str::replace('"', '', $row->title),
                    'image' => config('app.url') . $row->image,
                    'kind' => $row->kind
                ];
            }
        }

        $feature = DB::table('products')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->select(
                DB::raw('JSON_EXTRACT(products.title, \'$."' . Str::lower($data['locale']) . '"\') as title'),
                'products.image as image',
                'products.slug_url',
                'categories.machine as category_machine_name'
            )->get();

        if (isset($feature)) {
            foreach ($feature as $row) {
                if ($row->category_machine_name == 'life-products') {
                    $feature_life_block[] = [
                        'title' => Str::replace('"', '', $row->title),
                        'image' => config('app.url') . $row->image,
                        'slug_url' => $row->slug_url
                    ];
                } else {
                    $feature_general_block[] = [
                        'title' => Str::replace('"', '', $row->title),
                        'image' => config('app.url') . $row->image,
                        'slug_url' => $row->slug_url
                    ];
                }
            }
        }

        $promotion = PromotionBlock::where('id', '=', 1)->where('is_active', '=', true)->first();
        $promo_content = [];

        if (isset($promotion)) {
            $promo_content = [
                'title' => json_decode($promotion->title, true)[Str::lower($data['locale'])],
                'description' => json_decode($promotion->description, true)[Str::lower($data['locale'])],
                'image' => $promotion->image
            ];
        }

        if (Str::lower($data['locale']) == 'en-us') {
            $page = [
                'slider' => $slider_block,
                'feature' => [
                    'life' => $feature_life_block,
                    'general' => $feature_general_block,
                ],
                'why-efi' => [
                    'title' => 'Why EFI',
                    'description' => '<p>Life is a journey of uncertainties. And since 2018, we have made it our mission to people find the assurance they need. As a subsidiary of Excellent Fortune Development Group, a top multi-sector conglomerate with a presence in the financial, real estate, mining, agricultural, and industrial sector, we are financially sound and strong.</p><p>We are committed to creating a positive social impact through our products and services that serve the protection, savings, and investment needs of different life stages and for all segments of society. We aim to serve our customers with professionalism and integrity, guided by strong moral values.</p>',
                    'image' => config('app.url') . '/storage/photos/1/wwwu.png',
                ],
                'claim' => [
                    'title' => 'Claim Your Insurances',
                    'description' => '<p>We’re the first customer-centric innovative insurance company minimize your effort and maximize the value while being proactive, swift and responsive for the hassle-free applications and claiming process.</p>',
                    'buttonText' => 'Claim Now',
                ],
                'promotion' => $promo_content,
            ];
        } else if (Str::lower($data['locale']) == 'my-mm') {
            $page = [
                'slider' => $slider_block,
                'feature' => [
                    'life' => $feature_life_block,
                    'general' => $feature_general_block,
                ],
                'why-efi' => [
                    'title' => 'Why EFI',
                    'description' => '<p>ဘဝခရီးလမ်းတွင် မသေချာမရေရာမှုများနှင့် ကြုံတွေနိုင်ပါသည်။ EFI သည် ၂၀၁၈ ခုနှစ်မှစတင်၍ အများပြည်သူတို့ လိုအပ်သော အာမခံချက်များကို ဖြည့်ဆည်းပေးနိုင်ရန် ဆောင်ရွက်ပေးလျက်ရှိပါသည်။ EFI သည် Excellent Fortune Development Group ၏ ကုမ္ပဏီခွဲတစ်ခုအနေဖြင့် ဘဏ္ဍာရေးလုပ်ငန်း၊ အိမ်ခြံမြေလုပ်ငန်း၊ သတ္ထုတွင်းလုပ်ငန်း၊ စိုက်ပျိုးရေးနှင့် စက်မှုလုပ်ငန်း အစရှိသော ထိပ်တန်းစီးပွားရေးလုပ်ငန်းများစွာ ပေါင်းစည်းပါဝင်သော ကော်ပိုရေးတစ်ခုဖြစ်သောကြောင့် ငွေကြေးအားဖြင့် ခိုင်မာတောင့်တင်းသော လုပ်ငန်းဖြစ်ပါသည်။</p><p>ကျွန်ုပ်တို့သည် လူတန်းစားအလွှာအမျိုးမျိုးအတွက် ကာကွယ်စောင့်ရှောက်မှုများ၊ စုဆောင်းမှုများနှင့် ရင်းနှီးမြှုပ်နှံမှု လိုအပ်ချက်များကို ဖြည့်ဆည်းပေးနိုင်သော ကျွန်ုပ်တို့၏ ဝန်ဆောင်မှုများနှင့် ထုတ်ကုန်များမှတစ်ဆင့် လူနေမှုပတ်ဝန်းကျင်တွင် ကောင်းမွန်သော အကျိုးသက်ရောက်မှုတစ်ခု ဖန်တီးရန် ဆုံးဖြတ်ထားပါသည်။</p>',
                    'image' => config('app.url') . '/storage/photos/1/wwwu.png',
                ],
                'claim' => [
                    'title' => 'အာမခံလျော်ကြေးတောင်းခံခြင်း',
                    'description' => '<p>ကျွန်ုပ်တို့သည် ပထမဆုံး ဝယ်သူယူဗဟိုပြုအာမခံကုမ္ပဏီအနေဖြင့် မြန်ဆန်သော လျော်ကြေးပေးအပ်မှုကို ဝယ်ယူသူများ နှောင့်နှေးကြန့်ကြာမှုမရှိဘဲ လွယ်ကူစွာတောင်းခံနိုင်ရန် ပြုလုပ်ဆောင်ရွက်ပေးလျက်ရှိပါသည်။</p>',
                    'buttonText' => 'Claim Now',
                ],
                'promotion' => $promo_content,
            ];
        } else if (Str::lower($data['locale']) == 'zh-cn') {
            $page = [
                'slider' => $slider_block,
                'feature' => [
                    'life' => $feature_life_block,
                    'general' => $feature_general_block,
                ],
                'why-efi' => [
                    'title' => 'Why EFI',
                    'description' => '<p>Life is a journey of uncertainties. And since 2018, we have made it our mission to people find the assurance they need. As a subsidiary of Excellent Fortune Development Group, a top multi-sector conglomerate with a presence in the financial, real estate, mining, agricultural, and industrial sector, we are financially sound and strong.</p><p>We are committed to creating a positive social impact through our products and services that serve the protection, savings, and investment needs of different life stages and for all segments of society. We aim to serve our customers with professionalism and integrity, guided by strong moral values.</p>',
                    'image' => config('app.url') . '/storage/photos/1/wwwu.png',
                ],
                'claim' => [
                    'title' => 'Claim Your Insurances',
                    'description' => '<p>We’re the first customer-centric innovative insurance company minimize your effort and maximize the value while being proactive, swift and responsive for the hassle-free applications and claiming process.</p>',
                    'buttonText' => 'Claim Now',
                ],
                'promotion' => $promo_content,
            ];
        } else {
            $error_messages[] = __('validation.required', ['attribute' => 'locale']);

            return $error_messages;
        }

        return $page;
    }
}
