<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Rating;
use App\Models\Country;
use App\Models\Magazine;
use App\Models\Corporation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\API\AuthRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Admin\AdminRequest;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.login');
    }
    public function indexView()
    {
       $admins=Admin::paginate(50);
       return view('admin.user.index',compact('admins'));
    }
    public function showView(Admin $admin)
    {
       return view('admin.user.edit',compact('admin'));
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
    public function store(AdminRequest $request)
    {
        $request['password']=Hash::make($request->password);
        admin::create($request->all());
        Session::flash('message', 'تم إضافة  بنجاح');
        return redirect()->back();
    }

    public function update(AdminRequest $request,Admin $admin)
    {
       if (isset($request->password)) {
        $request['password']=Hash::make($request->password);
       }else {
        $request['password']=$admin->password;
       }
       $admin->update($request->all());
       Session::flash('message', 'تم التعديل بنجاح');

       return redirect('/admins');
    }
    public function destroy(Admin $admin)
    {
        $admin->delete();
        Session::flash('message', 'تم الحذف بنجاح');
        return redirect('/admins');
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



