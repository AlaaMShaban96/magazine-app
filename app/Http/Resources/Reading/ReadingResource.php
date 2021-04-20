<?php

namespace App\Http\Resources\Reading;

use App\Models\Folder;
use App\Models\Number;
use Illuminate\Http\Resources\Json\JsonResource;

class ReadingResource extends JsonResource
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
            'page_number'=>$this->pivot->page_number,
            'magazine'=>[
               'name'=>Folder::find($this->folder_id)->magazine->name,
               'image'=>Folder::find($this->folder_id)->magazine->image,
            ],
            'number'=>Number::find($this->pivot->number_id)->number,
            
        ];
    }
}
