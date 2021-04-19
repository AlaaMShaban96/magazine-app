@extends('admin.layout.app')

@section('content')

    <div class="">
        <div><h2> تعديل تصنيف : {{$category['name']}}</h2><a  href="{{url('categories')}}" class="">رجوع</a></div>


    </div>

    <div class="modal-content">
        <div class="modal-header">
            <h2>تعديل تصنيف</h2>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-holder">
                    <div class="form-input-container">
                        <input type="text" name="name" class="form-input" value="{{$category['name']}}" id="nameField" placeholder="اسم التصنيف">
                        <label for="nameField">اسم التصنيف</label>
                    </div>
                </div>
                <button type="submit" class="button button-wide modal-footer">تعديل تصنيف</button>
            </form>
        </div>
    </div>

@endsection
