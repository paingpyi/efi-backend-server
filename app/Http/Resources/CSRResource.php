<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class CSRResource extends JsonResource
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
                'title' => 'CSR',
                'blocks' => [
                    'title' => 'About CSR',
                    'text' => '<p>With our vision, to be the leading insurance provider in Myanmar, creating a better and brighter future for all our customers and we are committed to create a positive social impact through our businesses. This is how we believe our corporate social responsibility.</p>',
                ],
                'cover' => [
                    'image' => config('app.url') . '/storage/uploads/demo/csr.jpg',
                    'title' => 'Future Development Programme',
                    'text' => '<p>We go beyond providing financial assistance. We also prepare youths to be future-ready by offering them basic financial literacy, personal career and character development training.</p>'
                ],
                'gallery' => [
                    'title'=>'Project Photos',
                    'image' => [
                        'src' => config('app.url') . '/storage/photos/1/stock-images/Short term endownment 02.jpg',
                        'src' => config('app.url') . '/storage/uploads/demo/kid-on-lap.jpg',
                        'src' => config('app.url') . '/storage/uploads/demo/news.jpg',
                    ]
                ]
            ];
        } else if(Str::lower($data['locale']) == 'my-mm') {
            $response = [
                'title' => 'CSR',
                'blocks' => [
                    'title' => 'About CSR',
                    'text' => '<p>With our vision, to be the leading insurance provider in Myanmar, creating a better and brighter future for all our customers and we are committed to create a positive social impact through our businesses. This is how we believe our corporate social responsibility.</p>',
                ],
                'cover' => [
                    'image' => config('app.url') . '/storage/uploads/demo/csr.jpg',
                    'title' => 'Future Development Programme',
                    'text' => '<p>We go beyond providing financial assistance. We also prepare youths to be future-ready by offering them basic financial literacy, personal career and character development training.</p>'
                ],
                'gallery' => [
                    'title'=>'Project Photos',
                    'image' => [
                        'src' => '/storage/photos/1/stock-images/Short term endownment 02.jpg',
                        'src' => '/storage/uploads/demo/kid-on-lap.jpg',
                        'src' => '/storage/uploads/demo/news.jpg',
                    ]
                ]
            ];
        }  else if(Str::lower($data['locale']) == 'zh-cn') {
            $response = [
                'title' => 'CSR',
                'blocks' => [
                    'title' => 'About CSR',
                    'text' => '<p>With our vision, to be the leading insurance provider in Myanmar, creating a better and brighter future for all our customers and we are committed to create a positive social impact through our businesses. This is how we believe our corporate social responsibility.</p>',
                ],
                'cover' => [
                    'image' => config('app.url') . '/storage/uploads/demo/csr.jpg',
                    'title' => 'Future Development Programme',
                    'text' => '<p>We go beyond providing financial assistance. We also prepare youths to be future-ready by offering them basic financial literacy, personal career and character development training.</p>'
                ],
                'gallery' => [
                    'title'=>'Project Photos',
                    'image' => [
                        'src' => '/storage/photos/1/stock-images/Short term endownment 02.jpg',
                        'src' => '/storage/uploads/demo/kid-on-lap.jpg',
                        'src' => '/storage/uploads/demo/news.jpg',
                    ]
                ]
            ];
        } else {
            $response = [__('validation.required', ['attribute' => 'locale'])];
        }

        return $response;
    }
}
