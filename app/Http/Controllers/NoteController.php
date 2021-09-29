<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $notes=Note::paginate(50);
        if($request->query('search'))
        {
            $notes = Note::where('name' ,'LIKE', "%".$request->query('search')."%")->paginate(7);
        }
        return view('admin.notes',compact('notes'));
    }
}
