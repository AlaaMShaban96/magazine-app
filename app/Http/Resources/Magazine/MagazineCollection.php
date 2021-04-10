<?php

namespace App\Http\Resources\Magazine;

use App\Http\Resources\Magazine\MagazineResourc;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MagazineCollection extends ResourceCollection
{
    public $collects = MagazineResourc::class;
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
