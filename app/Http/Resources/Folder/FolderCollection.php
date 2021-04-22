<?php

namespace App\Http\Resources\Folder;

use App\Http\Resources\Folder\FolderResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FolderCollection extends ResourceCollection
{
    public $collects = FolderResource::class;
    public static $wrap = '';
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
