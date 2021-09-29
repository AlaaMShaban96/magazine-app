<?php

namespace App\Http\Resources\Index;

use App\Models\Magazine;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Reading\ReadingCollection;
use App\Http\Resources\Magazine\MagazineCollection;

class IndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'reading'=>new ReadingCollection(isset($this->reading)?$this->reading:[]),
            'new_magazine'=> new MagazineCollection(Magazine::orderBy('id', 'desc')->limit(15)->get()),
            'choose_for_you'=> new MagazineCollection(Magazine::where('chosen', true)->limit(15)->get()),
        ];
    }
}
