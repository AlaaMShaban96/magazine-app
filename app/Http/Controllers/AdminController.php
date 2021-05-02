<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rating;
use App\Models\Country;
use App\Models\Magazine;
use App\Models\Corporation;
use Illuminate\Http\Request;
use App\Http\Requests\API\AuthRequest;

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
    public function login(AuthRequest $request)
    {
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            return redirect()->route('dashboard');

        } else {
            return back()->withErrors('كلمة السر او اسم المستخدم خطا ');
        }
    }
    public function logout()
    {
        auth()->guard('admin')->logout();

        return redirect('/');
    }
}



