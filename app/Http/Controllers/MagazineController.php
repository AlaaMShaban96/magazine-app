<?php

namespace App\Http\Controllers;

use App\Http\Requests\Magazine\MagazineRequest;
use App\Models\Magazine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class MagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $magazines=Magazine::paginate(7);
        return view('admin.magazine.index',compact('magazines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MagazineRequest $request)
    {

        $fileName = time().'.'.$request->image->extension();
        $request->image->storeAs(
            'images',
            $fileName,
            'public'
        );
        Magazine::create(array_merge (
            $request->except('image'),
            ['image' => $fileName]
        ));
        Session::flash('message', 'تم إضافة  بنجاح');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function show(Magazine $magazine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function edit(Magazine $magazine)
    {
        return view('admin.magazine.edit',compact('magazine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function update(MagazineRequest $request, Magazine $magazine)
    {
        $fileName = $magazine->image;
        if($request->has('image')){
            $fileName = time().'.'.$request->image->extension();
            $request->image->storeAs(
                'images',
                $fileName,
                'public'
            );
            $destinationPath = 'images/'.$magazine->image;
            if(Storage::disk('public')->exists($destinationPath)){
                Storage::disk('public')->delete($destinationPath);
            }
        }
      $magazine->update(array_merge (
            $request->except('image'),
            ['image' => $fileName]
        ));
        Session::flash('message', 'تم لتعديل  بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Magazine $magazine)
    {
        $destinationPath = 'images/'.$magazine->image;
        if(Storage::disk('public')->exists($destinationPath)){
            Storage::disk('public')->delete($destinationPath);
        }

        foreach ($magazine->numbers as $number){
            $destinationPath = 'pdf/'.$number->pdf;
            if(Storage::disk('public')->exists($destinationPath)){
                Storage::disk('public')->delete($destinationPath);
            }
            $number->delete();
        }
        $magazine->folders()->delete();
        $magazine->delete();
        Session::flash('message', 'تم الحذف  بنجاح');
        return redirect()->back();
    }

    public function folders(Magazine $magazine)
    {
        $folders = $magazine->folders()->paginate(7);
        return view('admin.folders',compact('magazine','folders'));

    }

}
