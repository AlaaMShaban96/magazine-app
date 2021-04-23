@extends('admin.layout.app')

@section('content')

    <div class="header__backbutton">
        <div><h2> تعديل مؤسسة : {{$corporation->name}}</h2><a  href="{{url('corporations')}}" class="">رجوع</a></div>


    </div>

    <div class="modal-content modal__shortmargin">
        <div class="modal-header">
            <h2>تعديل مؤسسة</h2>
        </div>
        <div class="modal-body">
            <form action="{{route('corporations',$corporation->id)}}" method="POST">
                @csrf
                @method('put')
                <div class="form-holder">
                    <div class="form-input-container">
                        <input type="text" name="name" class="form-input" value="{{$corporation->name}}" id="nameField" placeholder="اسم المؤسسة">
                        <label for="nameField">اسم المؤسسة</label>
                    </div>
                </div>
                <button type="submit" class="button button-wide modal-footer">تعديل المؤسسة</button>
            </form>
        </div>
    </div>

@endsection
