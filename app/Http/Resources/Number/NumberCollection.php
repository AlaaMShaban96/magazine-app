<?php

namespace App\Http\Resources\Number;

use App\Http\Resources\Number\NumberResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class NumberCollection extends ResourceCollection
{
    public $collects = NumberResource::class;
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
