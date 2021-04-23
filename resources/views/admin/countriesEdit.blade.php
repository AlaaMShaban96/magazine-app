@extends('admin.layout.app')

@section('content')

    <div class="header__backbutton">
        <div><h2> تعديل دولة : {{$country->name}}</h2><a  href="{{url('countries')}}" class="">رجوع</a></div>


    </div>

    <div class="modal-content modal__shortmargin">
        <div class="modal-header">
            <h2>تعديل دولة</h2>
        </div>
        <div class="modal-body">
            <form action="{{route('countries',$country->id)}}" method="POST">
                @csrf
                @method('put')
                <div class="form-holder">
                    <div class="form-input-container">
                        <input type="text" name="name" class="form-input" value="{{$country->name}}" id="nameField" placeholder="اسم الدولة">
                        <label for="nameField">اسم الدولة</label>
                    </div>
                </div>
                <button type="submit" class="button button-wide modal-footer">تعديل دولة</button>
            </form>
        </div>
    </div>

@endsection
