<?php

namespace App\Http\Resources;

use App\Models\ContactPage;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactPageResource extends JsonResource
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

        $main_contact = ContactPage::where('main', '=', true)->first();
        $content = [];

        if($main_contact) {
            $content = [
                'title' => $main_contact->title,
                'main_address' => $main_contact->address,
                'map' => $main_contact->map,
            ];
        }

        return $content;
    }
}
