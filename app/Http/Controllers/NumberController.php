<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Number;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class NumberController extends Controller
{
    public function store( Folder $folder , Request $request)
    { 
        $request->validate([
            'pdf' => 'required',
        ],['pdf.*' => 'يجب ادخال ملف pdf']);

        $folder->numbers()->create([
            'number'=> $request->number,
            'edition' => $request->edition,
            'pdf' => $this->compress($request)
        ]);
        Session::flash('message', 'تم إضافة  بنجاح');
        return redirect()->back();
    }

    public function destroy(Number $number)
    {
        $destinationPath = 'pdf/'.$number->pdf;
        Storage::disk('s3')->delete($number->pdf);
        $number->delete();
        Session::flash('message', 'تم الحذف  بنجاح');
        return redirect()->back();
    }
    private function compress(Request $request)
    {
        $photo =  $request->file('pdf')->store('magazine','s3');
        return $photo;

    } 
}
