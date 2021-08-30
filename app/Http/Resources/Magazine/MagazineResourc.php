<?php

namespace App\Http\Resources\Magazine;

use Illuminate\Http\Resources\Json\JsonResource;

class MagazineResourc extends JsonResource
{
    public static $wrap = '';
    
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"=>$this->id,
            "name"=>$this->name,
            "image"=>url('storage/images/' .$this->image),
            "corporation_id"=>$this->corporation->name,
            "rating_id"=>$this->rating->name,
            "country_id"=>$this->country->name,
            "available"=>$this->available,
            "status"=>$this->status,
            "created_at"=>$this->created_at,
            "updated_at"=>$this->updated_at,
        ];
    }
}
