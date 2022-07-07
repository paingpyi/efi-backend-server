<?php

namespace App\Http\Resources;

use App\Models\ContactPage;
use Illuminate\Support\Str;
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

        if ($main_contact) {
            $contacts = ContactPage::where('main', '=', false)->get();
            $addresses = [];

            foreach ($contacts as $row) {
                $addresses[] = [
                    'title' => json_decode($row->title, true)[Str::lower($data['locale'])],
                    'description' => json_decode($row->address, true)[Str::lower($data['locale'])],
                ];
            }

            $content = [
                'title' => json_decode($main_contact->title, true)[Str::lower($data['locale'])],
                'main_address' => json_decode($main_contact->address, true)[Str::lower($data['locale'])],
                'map' => $main_contact->map,
                'addresses' => $addresses
            ];
        }

        return $content;
    }
}
