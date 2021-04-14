@extends('admin.layout.app')

@section('content')

    <div class="">
        <div><h2> تعديل دولة : {{$category['name']}}</h2><a  href="{{url('countries')}}" class="">رجوع</a></div>


    </div>

    <div class="modal-content">
        <div class="modal-header">
            <h2>تعديل دولة</h2>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-holder">
                    <div class="form-input-container">
                        <input type="text" name="name" class="form-input" value="{{$category['name']}}" id="nameField" placeholder="اسم الدولة">
                        <label for="nameField">اسم الدولة</label>
                    </div>
                </div>
                <button type="submit" class="button button-wide modal-footer">تعديل دولة</button>
            </form>
        </div>
    </div>

@endsection
