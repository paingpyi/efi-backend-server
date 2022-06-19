<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class BlogPageResource extends JsonResource
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
                'title' => 'Learn why insurance matters for your life, your family and your business.',
                'text' => '<p>Scelerisque hendrerit suscipit mi neque. Enim ut morbi hendrerit quisque at suscipit tortor elit morbi. Aliquet morbi tortor est id.</p>',
                'image' => config('app.url') . '/storage/photos/1/stock-images/008. Fire and Allied Perlis Insurance PHOTO 2.jpg',
            ];
        } else if (Str::lower($data['locale']) == 'my-mm') {
            $response = [
                'title' => 'Learn why insurance matters for your life, your family and your business.',
                'text' => '<p>Scelerisque hendrerit suscipit mi neque. Enim ut morbi hendrerit quisque at suscipit tortor elit morbi. Aliquet morbi tortor est id.</p>',
                'image' => config('app.url') . '/storage/photos/1/stock-images/008. Fire and Allied Perlis Insurance PHOTO 2.jpg',
            ];
        } else if (Str::lower($data['locale']) == 'zh-cn') {
            $response = [
                'title' => 'Learn why insurance matters for your life, your family and your business.',
                'text' => '<p>Scelerisque hendrerit suscipit mi neque. Enim ut morbi hendrerit quisque at suscipit tortor elit morbi. Aliquet morbi tortor est id.</p>',
                'image' => config('app.url') . '/storage/photos/1/stock-images/008. Fire and Allied Perlis Insurance PHOTO 2.jpg',
            ];
        } else {
            $response = [__('validation.required', ['attribute' => 'locale'])];
        }

        return $response;
    }
}
