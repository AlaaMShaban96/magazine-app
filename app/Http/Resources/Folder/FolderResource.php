<?php

namespace App\Http\Resources\Folder;

use App\Http\Resources\Number\NumberCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class FolderResource extends JsonResource
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
            'folder_number'=>$this->folder_number,
            'numbers'=> new NumberCollection($this->numbers),
        ];
    }
}
