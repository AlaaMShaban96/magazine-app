<?php

namespace App\Http\Resources\Reading;

use App\Http\Resources\Reading\ReadingResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ReadingCollection extends ResourceCollection
{
    public $collects = ReadingResource::class;
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
