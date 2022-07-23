<?php

namespace App\Http\Resources;

use App\Models\AboutEFIGBlock;
use App\Models\AboutEfigPage;
use App\Models\Stakeholders;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

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

        $cover = AboutEfigPage::where('id', '=', 1)->first();

        $cover_content = [];
        if ($cover) {
            $cover_content = [
                'image' => config('app.url') . $cover->cover,
                'text' => json_decode($cover->title, true)[Str::lower($data['locale'])]
            ];
        }

        $blocks = AboutEFIGBlock::where('is_active', '=', true)->get();
        $block_content = [];

        if($blocks) {
            $block_content[] = [
                'title' => json_decode($blocks->title, true)[Str::lower($data['locale'])],
                'image' => config('app.url') . $blocks->image,
                'description' => json_decode($blocks->description, true)[Str::lower($data['locale'])]
            ];
        }

        $stakeholders = Stakeholders::where('is_active', '=', true)->where('team', '=', 10)->get();
        $stakeholders_content = [];
        $restrict = ['<p>', '</p>', '<br>', '<br/>'];

        foreach ($stakeholders as $row) {
            $stakeholders_content[] = [
                'name' => json_decode($row->name, true)[Str::lower($data['locale'])],
                'description' => str_replace($restrict, '', json_decode($row->description, true)[Str::lower($data['locale'])]),
                'image' => $row->image
            ];
        }

        if (Str::lower($data['locale']) == 'en-us') {
            $response = [
                'title' => 'About EFIG',
                'cover' => $cover_content,
                'blocks' => $block_content,
                'stakeholders' => [
                    'title' => 'Our Stakeholders',
                    'description' => '<p>Loren scelequie plays an important role. We are always either believe in nurturing an engaging environment create and develop ourselves in unparalleled ways.</p>',
                    'data' => $stakeholders_content
                ]
            ];
        } else if (Str::lower($data['locale']) == 'my-mm') {
            $response = [
                'title' => 'About EFIG',
                'cover' => $cover_content,
                'blocks' => $block_content,
                'stakeholders' => [
                    'title' => 'Our Stakeholders',
                    'description' => '<p>Loren scelequie plays an important role. We are always either believe in nurturing an engaging environment create and develop ourselves in unparalleled ways.</p>',
                    'data' => $stakeholders_content
                ]
            ];
        } else if (Str::lower($data['locale']) == 'zh-cn') {
            $response = [
                'title' => 'About EFIG',
                'cover' => $cover_content,
                'blocks' => $block_content,
                'stakeholders' => [
                    'title' => 'Our Stakeholders',
                    'description' => '<p>Loren scelequie plays an important role. We are always either believe in nurturing an engaging environment create and develop ourselves in unparalleled ways.</p>',
                    'data' => $stakeholders_content
                ]
            ];
        } else {
            $response = [__('validation.required', ['attribute' => 'locale'])];
        }

        return $response;
    }
}
