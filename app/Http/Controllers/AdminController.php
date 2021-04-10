<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rating;
use App\Models\Country;
use App\Models\Magazine;
use App\Models\Corporation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        
        return view('admin.login');
    }
    public function show()
    {
        $status=[
           'country'=> Country::count(),
           'magazine'=> Magazine::count(),
           'rating'=> Rating::count(),
           'corporation'=> Corporation::count(),
        ];
        return view('admin.index',compact('status'));
    }
}
