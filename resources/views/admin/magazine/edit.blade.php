@php
   $countries = App\Models\Country::all();
   $corporations = App\Models\Corporation::all();
   $ratings = App\Models\Rating::all();
@endphp
@extends('admin.layout.app')

@section('content')

    <div class="">
        <div><h2> تعديل مجلة : {{$magazine->name}}</h2><a  href="{{url('magazines')}}" class="">رجوع</a></div>


    </div>

    <div class="modal-content  modal__tall">
    
        <div class="modal-body">

            <form action="" method="post">
                @csrf
                @method('PUT')
               <div class="form-holder">
                    <div class="form-input-container">
                        <input type="text" name="name" class="form-input" id="nameField" placeholder="اسم المجلة" value="{{$magazine->name}}">
                        <label for="nameField">اسم المجلة</label>
                    </div>
                    <div class="form-input-container">
                        <select class="form-input" name="country" id="country">
                           @foreach ($countries as $country)
                                <option value="{{$country->id}}" {{$country->id==$magazine->country_id?'selected':''}}>{{$country->name}}</option>
                           @endforeach
                        </select>
                        <label for="country">الدولة</label>
                    </div>
                    <div class="form-input-container">
                        <select class="form-input" name="corporation" id="corporation">
                            @foreach ($corporations as $corporation)
                            <option value="{{$corporation->id}}" {{$corporation->id==$magazine->corporation_id?'selected':''}}>{{$corporation->name}}</option>
                            @endforeach
                        </select>
                        <label for="corporation">المؤسسة</label>
                    </div>
                    <div class="form-input-container">
                        <select class="form-input" name="rating" id="rating">
                            @foreach ($ratings as $rating)
                            <option value="{{$rating->id}}" {{$rating->id==$magazine->rating_id?'selected':''}}>{{$rating->name}}</option>
                            @endforeach
                        </select>
                        <label for="category">التصنيف</label>
                    </div>
                    <div class="form-input-container">
                        <input type="radio" value="1" name="avaliable" id="isAvaliable" {{$magazine->avaliable?'checked':''}}/>
                        <label for="isAvaliable">كاملة</label>
                        <input type="radio" value="0" name="avaliable" id="notAvaliable" {{$magazine->avaliable?'':'checked'}} />
                        <label for="notAvaliable">غير كاملة</label>
                    </div>
                    <div class="form-input-container">
                        <input type="radio" value="1" name="status" id="Going"  {{$magazine->avaliable?'checked':''}} />
                        <label for="Going">متوفرة</label>
                        <input type="radio" value="0" name="status" id="Stopped"  {{$magazine->avaliable?'':'checked'}}/>
                        <label for="Stopped">غير متوفرة</label>
                    </div>

                </div>
                <button type="submit" class="button button-wide modal-footer">اضافة مجلة</button>
            </form>
        </div>
    </div>

@endsection
