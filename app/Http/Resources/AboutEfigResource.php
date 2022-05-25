<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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

        $response = [
            'title' => 'About EFIG',
            'cover' => [
                'image' => config('app.url') . '/storage/photos/1/pages/efig_1.jpg',
                'text' => 'Live Life Truly'
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

        return $response;
    }
}
