<?php

namespace App\Http\Controllers\API;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Note\NoteRequest;

class NoteController extends Controller
{
    public function store(NoteRequest $request)
    {
        $request["user_id"]=auth()->user()->id;
        Note::create($request->all());
        return response()->json(['date'=>"add notes Success"], 200);
    }
}
