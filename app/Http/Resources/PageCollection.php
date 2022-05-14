<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
                if($row->category_machine_name=='life-products') {
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

        $page = [
            'slider' => $slider_block,
            'feature' => [
                'life' => $feature_life_block,
                'general' => $feature_general_block,
            ],
            'why-efi' => [
                'title' => 'Why EFI',
                'description' => '<p>Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English to emphasise design elements over content. It\'s also called placeholder (or filler) text. It\'s a convenient tool for mock-ups. It helps to outline the visual elements of a document or presentation, eg typography, font, or layout. Lorem ipsum is mostly a part of a Latin text by the classical author and philosopher Cicero. Its words and letters have been changed by addition or removal, so to deliberately render its content nonsensical; it\'s not genuine, correct, or comprehensible Latin anymore. While lorem ipsum\'s still resembles classical Latin, it actually has no meaning whatsoever. As Cicero\'s text doesn\'t contain the letters K, W, or Z, alien to latin, these, and others are often inserted randomly to mimic the typographic appearence of European languages, as are digraphs not to be found in the original.</p><p>In a professional context it often happens that private or corporate clients corder a publication to be made and presented with the actual content still not being ready. Think of a news blog that\'s filled with content hourly on the day of going live. However, reviewers tend to be distracted by comprehensible content, say, a random text copied from a newspaper or the internet. The are likely to focus on the text, disregarding the layout and its elements. Besides, random text risks to be unintendedly humorous or offensive, an unacceptable risk in corporate environments. Lorem ipsum and its many variants have been employed since the early 1960ies, and quite likely since the sixteenth century.</p>',
                'image' => config('app.url') .'/storage/uploads/demo/ratings-efi-l.svg',
            ],
            'claim' => [
                'title' => 'Claim Your Insurances',
                'description' => '<p>We’re the first customer-centric innovative insurance company minimize your effort and maximize the value while being proactive, swift and responsive for the hassle-free applications and claiming process.</p>',
                'buttonText' => 'Claim Now',
            ],
            'promotion' => [],
        ];

        return $page;
    }
}
