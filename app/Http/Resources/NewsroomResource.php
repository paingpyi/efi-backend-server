<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class NewsroomResource extends JsonResource
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
                'title' => 'Newsroom',
                'cover' => [
                    'image' => config('app.url') . '/storage/uploads/demo/career/news.jpg.jpg',
                    'title' => 'Presess releases',
                    'text' => 'Get the latest news and announcements from EFI'
                ],
            ];
        } else if(Str::lower($data['locale']) == 'my-mm') {
            $response = [
                'title' => 'Newsroom',
                'cover' => [
                    'image' => config('app.url') . '/storage/uploads/demo/career/news.jpg.jpg',
                    'title' => 'Presess releases',
                    'text' => 'Get the latest news and announcements from EFI'
                ],
            ];
        }  else if(Str::lower($data['locale']) == 'zh-cn') {
            $response = [
                'title' => 'Newsroom',
                'cover' => [
                    'image' => config('app.url') . '/storage/uploads/demo/career/news.jpg.jpg',
                    'title' => 'Presess releases',
                    'text' => 'Get the latest news and announcements from EFI'
                ],
            ];
        } else {
            $response = [__('validation.required', ['attribute' => 'locale'])];
        }

        return $response;
    }
}
