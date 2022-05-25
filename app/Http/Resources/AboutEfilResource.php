<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
                    'description' => 'EFI Life is focused on creating fresh customer experiences, with easy-to-understand products, supported by digital technology. Through this customer-led approach, EFI Life aims to become a leading Myanmar insurer that changes the way people feel about insurance. Come journey with us! Let us help you live life truly. Let’s #livelifetruly. Together!'
                ],
                [
                    'title' => 'Objective & Strategy',
                    'image' => config('app.url') . '/storage/photos/1/pages/family_1.jpg',
                    'description' => 'We provide comprehensive explanations of the solutions based on your needs so that you can understand their features, benefits, risks, terms and conditions, and your commitment - before you make your purchase decision.We are committed to creating a positive social impact through our products and services and to empowering the people of Myanmar to live better life. We are making insurance available to all segments of society.'
                ],
            ]
        ];

        return $response;
    }
}
