<?php

namespace App\Http\Controllers\API;

use App\Models\Note;
use App\Events\SendMail;
use App\Events\SendNote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Event;
use App\Http\Requests\Note\NoteRequest;
use App\Http\Resources\Note\NoteCollection;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $types=isset( $request->type)? $request->type:['not_working', 'incomplete','wrong_info','other','note'];
        return new NoteCollection(auth()->user()->notes()->whereIn('title',  $types)->get());
    }
    public function store(NoteRequest $request)
    {
        try {
            switch ($request->title) {
                case 'note':
                    $request["user_id"]=auth()->user()->id;
                    Note::create($request->all());
                    break;
                
                default:
    
                Event::dispatch(new SendNote($request->all()));
    
                    break;
            }
           
        } catch (\Throwable $th) {
            return response()->json(['date'=>"error on create note"], 500);

        }
       
        return response()->json(['date'=>"add notes Success"], 200);
    }
}
