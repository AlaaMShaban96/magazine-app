@extends('admin.layout.app')

@section('content')

    <div class="">
        <div><h2> تعديل مؤسسة : {{$category['name']}}</h2><a  href="{{url('corporation')}}" class="">رجوع</a></div>


    </div>

    <div class="modal-content">
        <div class="modal-header">
            <h2>تعديل مؤسسة</h2>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-holder">
                    <div class="form-input-container">
                        <input type="text" name="name" class="form-input" value="{{$category['name']}}" id="nameField" placeholder="اسم المؤسسة">
                        <label for="nameField">اسم المؤسسة</label>
                    </div>
                </div>
                <button type="submit" class="button button-wide modal-footer">تعديل المؤسسة</button>
            </form>
        </div>
    </div>

@endsection
