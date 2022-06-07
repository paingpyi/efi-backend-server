<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class FireTypeOfBuildingResource extends JsonResource
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

        $types = [
            'residential' => [
                'Residential/Dwelling House/Apartment',
                'Residential/Dwelling House/Apartment (Isolated - at lease 100\')',
                'Office (Isolated - at lease 100\')',
                'Office',
                'Schools/Colleges/Universities',
                'Religious Building',
                'Hotels/Motels/Similars as Inns',
                'Hospitals/Similars as Hospitals/Laboratory',
                'Clinics ( Normal )',
                'Libraries/Museums and Gallery',
                'Cinemas/a Amusement Part/Airport/Railway Station',
                'Theatre',
                'Video/Game',
                'Karaok',
                'Zoological Gauden',
                'Poultry Farms/Incubatory',
                'Gymnasium'
            ],
            'warehouse' => [
                'Non Hazardous Goods',
                'Hazardous Goods',
                'Kerosene/Petrol  , Jute/Cotton',
                'Rice/Broken Rice and Paddy (In The Compound of Rice Mill)',
                'Rice/Broken Rice and Paddy (Out of The Compound of Rice Mill)',
                'Tember mill Ware House',
                'Log Yard',
                'Lunber Yard',
                'Cold Storage and Factories',
                'Virginia',
                'Non Hazardous Goods Yard',
                'Hazardous Goods Yard',
            ],
            'shops' => [
                'Non Hazardous Goods (Shopes/Broker houses )',
                'Hazardous Goods (Shopes/Broker houses/Super market)',
                'Tember/Furniture',
                'Petrol',
                'Banboo and Accessory',
                'Photographic Studios',
                'Hair Dressing Salon, Beacuties Salon and Laundries',
                'Restaurants',
                'Internet/e-mail/Photo Copier Serivses',
                'Market, Shop in the Market',
                'Medicine, Optical and Test eye(retail)',
                'Motor Showroom',
            ],
            'factories' => [
                'Radio , Television , Transmitting Stations and Studios',
                'Electric Power Stations',
                'Transformers',
                'Generators (Detached)',
                'Generators (Open Space)',
                'Boiler House (Gas , Electic , Diesel , Crude Oil)',
                'Boiler House (Fire Wood)',
                'Only Package any kind of food',
                'Biscuits Manufacture/Bakeries',
                'Candy',
                'Flour, Meehoom, Nodel, related products',
                'Suger, Coffee, Tea, Grinding',
                'Animal Food Manufacturing',
                'Diary Process',
                'Ice Production',
                'Distilleries',
                'Cold drink, Purified water Factory',
                'Beer',
                'Purified water and Cold drink (with Container making)',
                'Processing Canning and Preserving of Meet',
                'Fishpaste, salt Factory',
                'Hairy and Fearther Processor',
                'Tobacco and Cigarette Factory',
                'Cheroots Processor',
                'Rice Mill , Oil Mill ,Bean Crushing Mill',
                'Bran Oil Mill',
                'Stone Crush Mill, Refineries Bean/Rice Mill',
                'Saw Mill , Planning and Shaping Mill',
                'Timber Steaming Mill',
                'Cane , Furniture , Pencil Industry',
                'Carpenters',
                'Paper Product',
                'Paper Binding Industry/Factory',
                'Paper and Cardboard Mill',
                'Wax Paper Product',
                'Coal Factory',
                'Printing (Paper)',
                'Printing (Plastic)',
                'Medicine Manufacturing by Machine',
                'Medicine Manufacturing by Hand',
                'Paint Manufacturing',
                'Soap, Shampoo, Tooth Paste Factory',
                'Package Servic (Soap, Shanpoo, Tooth Paste Factory)',
                'Cosmetic Factory',
                'Only Cosmetic Packaging Services',
                'Candles , Wax Factory',
                'Fertilizer Factory (Produce From Natural Gas)',
                'Only Fertilizer Packaging Services',
                'Bio Fertilizer Factory',
                'Insecticide Factory / Including Bottling',
                'Only Insecticide Packaging Services',
                'Matches , Joss Stick, Mosquito Coil Product Factory',
                'Rubber Factory',
                'Leather Goods Manufacturing',
                'Plastic Goods Manufacturing',
                'Melamine Goods Manufacturing',
                'Packaging Foam / Plastic Bag Factory',
                'Cement Factory',
                'Glass , Ceramic Factory',
                'Kerosene , Petrol , Natural Gas Factory',
                'Black Smith , Produce of Metal goods which is melted',
                'Metal mould services',
                'Gold Smith',
                'Car Workshop',
                'Car Servicing',
                'Tyre Retreading and Vulcaniting',
                'Battery',
                'Battery Cell',
                'Concrete Mixer and Concrete Form Services',
                'Brick Processor',
                'Fluoresent Lamp, Bult Factory',
                'Cablewire Factory',
                'Transformer and Electrical device, Voltage regulator',
                'Production of Motor Vehicle Motor Cycle , Bicycle',
                'Lathe Services',
                'Workshop Training School',
                'Cotton Machine , Weaving Machine',
                'Silk - Screen Printing',
                'Vest Factory',
                'Blanket Factory',
                'Garment Factory',
                'Tailors',
                'Silk wear',
                'Carpet',
                'Mattress',
                'Knit Wear, Lace Manufacturing',
                'Weaving Machine by hand',
            ],
        ];

        if(isset($data['buildingType'])) {
            if($data['buildingType'] == '*') {
                return $types;
            } else {
                return $types[Str::lower($data['buildingType'])];
            }
        } else {
            return $types;
        }
    }
}
