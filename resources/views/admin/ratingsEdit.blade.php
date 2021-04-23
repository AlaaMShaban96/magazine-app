@extends('admin.layout.app')

@section('content')

    <div class="header__backbutton">
        <div><h2> تعديل تصنيف : {{$rating->name}}</h2><a  href="{{url('ratings')}}" class="">رجوع</a></div>


    </div>

    <div class="modal-content modal__shortmargin">
        <div class="modal-header">
            <h2>تعديل تصنيف</h2>
        </div>
        <div class="modal-body">
            <form action="{{route('ratings',$rating->id)}}" method="POST">
                @csrf
                @method('put')
                <div class="form-holder">
                    <div class="form-input-container">
                        <input type="text" name="name" class="form-input" value="{{$rating->name}}" id="nameField" placeholder="اسم التصنيف">
                        <label for="nameField">اسم التصنيف</label>
                    </div>
                </div>
                <button type="submit" class="button button-wide modal-footer">تعديل تصنيف</button>
            </form>
        </div>
    </div>

@endsection
