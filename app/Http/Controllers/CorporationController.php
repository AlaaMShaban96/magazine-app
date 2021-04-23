<?php

namespace App\Http\Controllers;

use App\Models\Corporation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Corporation\CorporationRequest;

class CorporationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $corporations=Corporation::paginate(7);
        return view('admin.corporation',compact('corporations'));
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
    public function store(CorporationRequest $request)
    {
        Corporation::create($request->all());
        Session::flash('message', 'تم إضافة  بنجاح');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Corporation  $corporation
     * @return \Illuminate\Http\Response
     */
    public function show(Corporation $corporation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Corporation  $corporation
     * @return \Illuminate\Http\Response
     */
    public function edit(Corporation $corporation)
    {
        return view('admin.corporationEdit',compact('corporation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Corporation  $corporation
     * @return \Illuminate\Http\Response
     */
    public function update(CorporationRequest $request, Corporation $corporation)
    {
        $corporation->update($request->all());
        Session::flash('message', 'تم تعديل بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Corporation  $corporation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Corporation $corporation)
    {
        $corporation->delete();
        Session::flash('message', 'تم الحذف بنجاح');
       return redirect('/corporations');
    }
}
