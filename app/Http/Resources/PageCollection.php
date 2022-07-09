<?php

namespace App\Http\Resources;

use App\Models\HomeWhyEFIBlock;
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

        $why = HomeWhyEFIBlock::where('id', '=', 1)->first();
        $why_content = [];

        if(isset($why)) {
            $why_content = [
                'title' => 'Why EFI',
                'description' => json_decode($why->text, true)[Str::lower($data['locale'])],
                'image' =>config('app.url') . $why->image
            ];
        }

        $promotion = PromotionBlock::where('is_active', '=', true)->get();
        $promo_content = [];
        $restrict = ['<p>', '</p>', '<br>', '<br/>'];

        foreach($promotion as $row) {
            $promo_content[] = [
                'title' => json_decode($row->title, true)[Str::lower($data['locale'])],
                'description' => str_replace($restrict, '', json_decode($row->description, true)[Str::lower($data['locale'])]),
                'image' => $row->image
            ];
        }

        if (Str::lower($data['locale']) == 'en-us') {
            $page = [
                'slider' => $slider_block,
                'feature' => [
                    'life' => $feature_life_block,
                    'general' => $feature_general_block,
                ],
                'why-efi' => $why_content,
                'claim' => [
                    'title' => 'Claim Your Insurances',
                    'description' => '<p>We’re the first customer-centric innovative insurance company minimize your effort and maximize the value while being proactive, swift and responsive for the hassle-free applications and claiming process.</p>',
                    'buttonText' => 'Claim Now',
                ],
                'promotions' => $promo_content,
            ];
        } else if (Str::lower($data['locale']) == 'my-mm') {
            $page = [
                'slider' => $slider_block,
                'feature' => [
                    'life' => $feature_life_block,
                    'general' => $feature_general_block,
                ],
                'why-efi' => $why_content,
                'claim' => [
                    'title' => 'အာမခံလျော်ကြေးတောင်းခံခြင်း',
                    'description' => '<p>ကျွန်ုပ်တို့သည် ပထမဆုံး ဝယ်သူယူဗဟိုပြုအာမခံကုမ္ပဏီအနေဖြင့် မြန်ဆန်သော လျော်ကြေးပေးအပ်မှုကို ဝယ်ယူသူများ နှောင့်နှေးကြန့်ကြာမှုမရှိဘဲ လွယ်ကူစွာတောင်းခံနိုင်ရန် ပြုလုပ်ဆောင်ရွက်ပေးလျက်ရှိပါသည်။</p>',
                    'buttonText' => 'Claim Now',
                ],
                'promotions' => $promo_content,
            ];
        } else if (Str::lower($data['locale']) == 'zh-cn') {
            $page = [
                'slider' => $slider_block,
                'feature' => [
                    'life' => $feature_life_block,
                    'general' => $feature_general_block,
                ],
                'why-efi' => $why_content,
                'claim' => [
                    'title' => 'Claim Your Insurances',
                    'description' => '<p>We’re the first customer-centric innovative insurance company minimize your effort and maximize the value while being proactive, swift and responsive for the hassle-free applications and claiming process.</p>',
                    'buttonText' => 'Claim Now',
                ],
                'promotions' => $promo_content,
            ];
        } else {
            $error_messages[] = __('validation.required', ['attribute' => 'locale']);

            return $error_messages;
        }

        return $page;
    }
}
