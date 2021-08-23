<?php

namespace App\Http\Controllers\API;

use App\Models\Save;
use App\Models\Magazine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Magazine\MagazineResourc;
use App\Http\Resources\Magazine\MagazineCollection;

class MagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return new MagazineCollection(Magazine::filter($request->all())->get());
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Magazine $magazine)
    {
       return new MagazineResourc($magazine);
    }

    public function save(Magazine $magazine)
    {
        // dd( auth()->user());
        //TODO
        Save::create(['magazine_id'=>$magazine->id,'user_id'=>auth()->user()->id]);
    }
}
