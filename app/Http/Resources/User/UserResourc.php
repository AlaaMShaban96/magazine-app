<?php

namespace App\Http\Resources\User;

use App\Models\Magazine;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Reading\ReadingCollection;
use App\Http\Resources\Magazine\MagazineCollection;

class UserResourc extends JsonResource
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
            'name'=>$this->name,
            'reading'=>new ReadingCollection($this->reading),
            'new_magazine'=> new MagazineCollection(Magazine::orderBy('id', 'desc')->limit(5)->get()),
            'token'=>$this->createToken('Laravel Password Grant Client')->accessToken,
        ];
    }
}
