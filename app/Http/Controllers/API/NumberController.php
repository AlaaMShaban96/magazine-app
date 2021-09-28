<?php

namespace App\Http\Controllers\API;

use App\Models\Number;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Reading\ReadingCollection;

class NumberController extends Controller
{
    public function reading(Request $request,Number $number)
    {
        if (auth()->user()->reading()->where('number_id',$number->id)->exists()) {
            auth()->user()->reading()->updateExistingPivot($number,['page_number'=>$request->page_number]);

        }else {
            auth()->user()->reading()->attach($number,['page_number'=>$request->page_number]);
        }
        return response()->json(['date'=>"add number to reading  Success"], 200);

    }
    public function remove(Number $number)
    {
        auth()->user()->reading()->detach($number->id);
        return response()->json(['date'=>"remove  number to reading  Success"], 200);

    }
    public function show()
    {
     return  new ReadingCollection( auth()->user()->reading()->paginate(7));
     

    }
}
