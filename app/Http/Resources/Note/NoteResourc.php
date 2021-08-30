<?php

namespace App\Http\Resources\Note;

use App\Models\Number;
use App\Models\Magazine;
use App\Http\Resources\Number\NumberResource;
use App\Http\Resources\Magazine\MagazineResourc;
use Illuminate\Http\Resources\Json\JsonResource;

class NoteResourc extends JsonResource
{
    public static $wrap = '';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            "id"=>$this->id,
            "title"=>$this->title,
            "body"=>$this->body,
            "number"=> new NumberResource(Number::find($this->number_id)),
            "magazine"=> new MagazineResourc(Magazine::find($this->number->folder->magazine_id)),
            "user_id"=>$this->user_id,
            "created_at"=>$this->created_at,
            "updated_at"=>$this->updated_at,
        ];
    }
}
