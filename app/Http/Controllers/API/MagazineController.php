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
        return new MagazineCollection(Magazine::filter($request->orderBy('desc'))->paginate(7));
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
        
        Save::create(['magazine_id'=>$magazine->id,'user_id'=>auth()->user()->id]);
        $response = ["message" =>'magazine is saved '];

    }
    public function showSave(Request $request)
    {
        return new MagazineCollection(Magazine::whereIn('id',Save::where('user_id',auth()->user()->id)->get()->pluck('magazine_id'))->get());
    }
}
