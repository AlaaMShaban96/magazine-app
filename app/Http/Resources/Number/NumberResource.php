<?php

namespace App\Http\Resources\Number;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class NumberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'edition'=>$this->edition,
            'date'=> Storage::disk('s3')->url($this->pdf) ,
        ];
    }
}
