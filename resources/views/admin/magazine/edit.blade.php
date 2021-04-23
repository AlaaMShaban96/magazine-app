@php
   $countries = App\Models\Country::all();
   $corporations = App\Models\Corporation::all();
   $ratings = App\Models\Rating::all();
@endphp
@extends('admin.layout.app')

@section('content')

    <div class="header__backbutton">
        <div><h2> تعديل مجلة : {{$magazine->name}}</h2><a  href="{{url('magazines')}}" class="">رجوع</a></div>


    </div>

    <div class="modal-content  modal__tall">

        <div class="modal-body">

            <form action="{{route('magazines',$magazine->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
               <div class="form-holder">
                    <div class="form-input-container">
                        <input type="text" name="name" class="form-input" id="nameField" placeholder="اسم المجلة" value="{{$magazine->name}}">
                        <label for="nameField">اسم المجلة</label>
                    </div>
                   <div class="form-input-container">
                       <input type="file" name="image" class="form-input" id="imageField" placeholder="صورة المجلة" >
                       <label for="imageField"> صورة المجلة</label>
                   </div>
                    <div class="form-input-container">
                        <select class="form-input" name="country_id" id="country">
                           @foreach ($countries as $country)
                                <option value="{{$country->id}}" {{$country->id==$magazine->country_id?'selected':''}}>{{$country->name}}</option>
                           @endforeach
                        </select>
                        <label for="country">الدولة</label>
                    </div>
                    <div class="form-input-container">
                        <select class="form-input" name="corporation_id" id="corporation">
                            @foreach ($corporations as $corporation)
                            <option value="{{$corporation->id}}" {{$corporation->id==$magazine->corporation_id?'selected':''}}>{{$corporation->name}}</option>
                            @endforeach
                        </select>
                        <label for="corporation">المؤسسة</label>
                    </div>
                    <div class="form-input-container">
                        <select class="form-input" name="rating_id" id="rating">
                            @foreach ($ratings as $rating)
                            <option value="{{$rating->id}}" {{$rating->id==$magazine->rating_id?'selected':''}}>{{$rating->name}}</option>
                            @endforeach
                        </select>
                        <label for="category">التصنيف</label>
                    </div>
                    <div class="form-input-container">
                        <input type="radio" value="1" name="available" id="isAvaliable" {{$magazine->available?'checked':''}}/>
                        <label for="isAvaliable">كاملة</label>
                        <input type="radio" value="0" name="available" id="notAvaliable" {{$magazine->available?'':'checked'}} />
                        <label for="notAvaliable">غير كاملة</label>
                    </div>
                    <div class="form-input-container">
                        <input type="radio" value="1" name="status" id="Going"  {{$magazine->status?'checked':''}} />
                        <label for="Going">متوفرة</label>
                        <input type="radio" value="0" name="status" id="Stopped"  {{$magazine->status?'':'checked'}}/>
                        <label for="Stopped">غير متوفرة</label>
                    </div>

                </div>
                <button type="submit" class="button button-wide modal-footer">تعديل مجلة</button>
            </form>
        </div>
    </div>

@endsection