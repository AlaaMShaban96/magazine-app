<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Number\NumberRequest;

class NumberController extends Controller
{
    public function store(Folder $folder , Request $request)
    {

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

    public function edit(Number $number)
    {
        return view('admin.numbersEdit',compact('number'));
    }

    public function update(NumberRequest $request , Number $number)
    {
        $fileName = $number->pdf;
        if($request->has('pdf'))
        {
            $destinationPath = 'pdf/'.$number->pdf;
            if(Storage::disk('public')->exists($destinationPath)){
                Storage::disk('public')->delete($destinationPath);
            }
            $fileName = time().'.'.$request->pdf->extension();
            $request->image->storeAs(
                'pdf',
                $fileName,
                'public'
            );
        }
        $number->update(array_merge (
            $request->except('pdf'),
            ['pdf' => $fileName]
        ));        Session::flash('message', 'تم تعديل بنجاح');
        return redirect()->back();
    }

}
