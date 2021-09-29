<?php

namespace App\Http\Resources\Reading;

use App\Models\Folder;
use App\Models\Number;
use App\Http\Resources\Number\NumberResource;
use App\Http\Resources\Magazine\MagazineResourc;
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
            'magazine'=> new MagazineResourc (Folder::find($this->folder_id)->magazine),
            // 'magazine'=>[
            //    'name'=>Folder::find($this->folder_id)->magazine->name,
            //    'image'=>url('storage/images/' .Folder::find($this->folder_id)->magazine->image),
            // ],
            'number'=>new NumberResource( Number::find($this->pivot->number_id)),
            
        ];
    }
}
