<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class NumberController extends Controller
{
    public function store(Folder $folder , Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf',
        ],['pdf.*' => 'يجب ادخال ملف pdf']);
        $fileName = time().'.'.$request->pdf->extension();
        $request->image->storeAs(
            'pdf',
            $fileName,
            'public'
        );

        $folder->numbers()->create([
            'number'=> $request->number,
            'edition' => $request->edition,
            'pdf' => $fileName
        ]);
        Session::flash('message', 'تم إضافة  بنجاح');
        return redirect()->back();
    }

    public function destroy(Number $number)
    {
        $destinationPath = 'pdf/'.$number->pdf;
        if(Storage::disk('public')->exists($destinationPath)){
            Storage::disk('public')->delete($destinationPath);
        }
        $number->delete();
        Session::flash('message', 'تم الحذف  بنجاح');
        return redirect()->back();
    }
}
