@extends('admin.layout.app')

@section('content')

    <div class="header__backbutton">
        <div><h2> تعديل عدد {{$number->number}} في مجلد {{$number->folder->id}} لمجلة {{$number->folder->magazine->name}}</h2><a  href="{{url('/folders/'.$number->folder->id.'/numbers')}}" class="">رجوع</a></div>


    </div>

    <div class="modal-content modal__shortmargin" style="height: 420px;">
        <div class="modal-header">
            <h2>تعديل عدد</h2>
        </div>
        <div class="modal-body" >
            <form action="{{route('numbers.update',$number->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-holder">
                    <div class="form-input-container">
                        <input type="number" name="number" class="form-input" id="nameField" value="{{$number->number}}" placeholder="اسم العدد">
                        <label for="nameField">رقم العدد</label>
                    </div>
                </div>
                <div class="form-holder">
                    <div class="form-input-container">
                        <input type="date" name="edition" class="form-input" value="{{$number->edition}}" id="editionField" placeholder="اصدار العدد">
                        <label for="editionField">اصدار العدد</label>
                    </div>
                </div>
                <div class="form-input-container">
                    <input type="file" name="pdf" class="form-input" id="fileField" placeholder="ملف " >
                    <label for="fileField"> pdf العدد</label>
                </div>
                <button type="submit" class="button button-wide modal-footer"> تعديل عدد</button>
            </form>
        </div>
    </div>

@endsection
