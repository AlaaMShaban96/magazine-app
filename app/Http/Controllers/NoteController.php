<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes=Note::paginate(7);
        return view('admin.notes',compact('notes'));
    }
}
