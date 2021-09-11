<?php

namespace App\Http\Resources\Number;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

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
            'number'=>$this->number,
            'edition'=>$this->edition,
            'file'=>Storage::disk('s3')->url($this->pdf),
            // 'date'=>$this->pdf,
        ];
    }
}
