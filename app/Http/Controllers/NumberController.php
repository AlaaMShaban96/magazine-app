<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class NumberController extends Controller
{
    public function store(Folder $folder , Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf',
        ]);
        $fileName = time().'.'.$request->pdf->extension();
        $request->pdf->move(public_path('numberFiles'), $fileName);

        $folder->numbers()->create([
            'number'=> $request->number,
            'pdf' => $fileName
        ]);
        Session::flash('message', 'تم إضافة  بنجاح');
        return redirect()->back();
    }

    public function destroy(Number $number)
    {
        $destinationPath = 'numberFiles/'.$number->pdf;
        if(file_exists($destinationPath)){
            File::delete($destinationPath);
        }
        $number->delete();
        Session::flash('message', 'تم الحذف  بنجاح');
        return redirect()->back();
    }
}
