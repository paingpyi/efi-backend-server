<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class EFIGResource extends JsonResource
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
                'title' => 'Careers at EFI General',
                'text' => '<p>Being a lean organization, every employee plays an important role. We are always either solving problems or seeking new ideas. As such, we have plenty of opportunities to innovate, create and develop ourselves in unparalleled ways. We are always creating the opportunities to learn new skills and develop themselves through the journey of our people at EFIG.</p>',
                'image' => config('app.url') . '/storage/photos/1/stock-images/public term life insurance 01.jpg',
            ];
        } else if (Str::lower($data['locale']) == 'my-mm') {
            $response = [
                'title' => 'Careers at EFI General',
                'text' => '<p>Being a lean organization, every employee plays an important role. We are always either solving problems or seeking new ideas. As such, we have plenty of opportunities to innovate, create and develop ourselves in unparalleled ways. We are always creating the opportunities to learn new skills and develop themselves through the journey of our people at EFIG.</p>',
                'image' => config('app.url') . '/storage/photos/1/stock-images/public term life insurance 01.jpg',
            ];
        } else if (Str::lower($data['locale']) == 'zh-cn') {
            $response = [
                'title' => 'Careers at EFI General',
                'text' => '<p>Being a lean organization, every employee plays an important role. We are always either solving problems or seeking new ideas. As such, we have plenty of opportunities to innovate, create and develop ourselves in unparalleled ways. We are always creating the opportunities to learn new skills and develop themselves through the journey of our people at EFIG.</p>',
                'image' => config('app.url') . '/storage/photos/1/stock-images/public term life insurance 01.jpg',
            ];
        } else {
            $response = [__('validation.required', ['attribute' => 'locale'])];
        }

        return $response;
    }
}
