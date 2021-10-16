@extends('admin.layout.app')

@section('content')

    <div class="header__backbutton">
        <div><h2>تعديل مستخدم</h2><a  href="{{url('admins')}}" class="">رجوع</a></div>


    </div>

    <div class="modal-content">
       
        <div class="modal-body">
                <form action="{{url("/admins/$admin->id")}}" method="post">
                @csrf
                @method('PUT')
                    <div class="form-holder">
                    <div class="form-input-container">
                        <input type="text" name="name" class="form-input" id="nameField" value="{{$admin->name}}" placeholder="اسم المستخدم">
                        <label for="nameField">اسم المستخدم</label>
                    </div>
                    <div class="form-input-container">
                        <input type="text" name="email" class="form-input" id="nameField" value="{{$admin->email}}" placeholder="البريد الالكتروني">
                        <label for="nameField">البريد الاكتروني</label>
                    </div>
                    <div class="form-input-container">
                        <input type="text" name="password" class="form-input" id="nameField"  placeholder="كلمة السر">
                        <label for="nameField">كلمة السر</label>
                    </div>
                    <div class="form-input-container">
                        <label for="role">صلاحيات  : </label>

                        <input type="radio" value="admin" name="role" id="Going"  {{$admin->role=='admin'?'checked':''}} />
                        <label for="admin">مدير</label>
                        <input type="radio" value="edtor" name="role" id="Stopped"{{$admin->role=='edtor'?'checked':''}} />
                        <label for="edtor"> مستخدم</label>
                    </div>
                </div>
                <button type="submit" class="button button-wide modal-footer">تعديل مستخدم</button>
            </form>
        </div>
    </div>

@endsection
