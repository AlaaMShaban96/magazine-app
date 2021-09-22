<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\Magazine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class FolderController extends Controller
{
    public function numbers(Folder $folder)
    {
        $numbers = $folder->numbers()->orderBy('number')->paginate(7);
        return view('admin.numbers',compact('folder','numbers'));
    }
    public function store(Magazine $magazine , Request $request)
    {
        $magazine->folders()->create($request->all());
        Session::flash('message', 'تم إضافة  بنجاح');
        return redirect()->back();
    }

    public function destroy(Folder $folder)
    {
        foreach ($folder->numbers as $number){
            $destinationPath = 'numberFiles/'.$number->pdf;
            if(file_exists($destinationPath)){
                File::delete($destinationPath);
            }
            $number->delete();
        }
        $folder->delete();
        Session::flash('message', 'تم الحذف  بنجاح');
        return redirect()->back();
    }

}
