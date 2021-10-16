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
                        <label for="call_by">صلاحيات  : </label>
                        <input type="text"  name="call_by" id="Going" value=" {{$magazine->call_by}}"/>

                    </div>
                </div>
                <button type="submit" class="button button-wide modal-footer">تعديل مستخدم</button>
            </form>
        </div>
    </div>

@endsection
