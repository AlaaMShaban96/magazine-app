<?php

namespace App\Http\Resources\Corporation;

use App\Http\Resources\Corporation\CorporationResourc;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CorporationCollection extends ResourceCollection
{
    public $collects = CorporationResourc::class;
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
