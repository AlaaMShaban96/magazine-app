@extends('admin.layout.app')

@section('content')

    <div class="nav">
        <div><h2>الرئيسية</h2></div>


    </div>
    <div class="card-container">
        <div class="card">
            <i class="fa fa-map-o"></i>
            <span>{{$status['magazine']}}</span>
            <h2>مجلة</h2>
        </div>
        <div class="card">
            <i class="fa fa-flag"></i>
            <span>{{$status['country']}}</span>
            <h2>دولة</h2>
        </div>
        <div class="card">
            <i class="fa fa-briefcase"></i>
            <span>{{$status['corporation']}}</span>
            <h2>مؤسسة</h2>
        </div>
        <div class="card">
            <i class="fa fa-star"></i>
            <span>{{$status['rating']}}</span>
            <h2>تصنيف</h2>
        </div>
    </div>



@endsection
