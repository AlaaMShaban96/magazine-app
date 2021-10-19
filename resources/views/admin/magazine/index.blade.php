@php
    $countries = App\Models\Country::all();
    $corporations = App\Models\Corporation::all();
    $ratings = App\Models\Rating::all();
@endphp

@extends('admin.layout.app')

@section('content')

    <div class="nav">
        <div><h2>المجلات</h2></div>

        <a id="createModalOpen" href="#" class="button">إضافة مجلة</a>
    </div>
    <table>
        <thead>
        <td>اسم المجلة</td>
        <td>الدولة</td>
        <td>المؤسسة</td>
        <td>التصنيف</td>
        <td>التوافر</td>
        <td>الحالة</td>
        <td>المجلدات</td>
            <td></td>
        </thead>
        <tbody>
            @forelse ($magazines as $item)
            <tr>
                <td>{{$item->name}}</td>
                <td>{{$item->country->name}}</td>
                <td>{{$item->corporation->name}}</td>
                <td>{{$item->rating->name}}</td>
                <td>{{$item->status?'كاملة':"غير كاملة"}}</td>
                <td>{{$item->status?'متوفرة':"غير متوفرة"}}</td>
                <td><a href="{{url('/magazines/'.$item->id.'/folders')}}" style="padding-top:5px;padding-bottom:5px;" class="button button-primary">{{$item->call_by}}</a></td>
                <td>
                    @if(auth('admin')->user()->role == 'admin' || Carbon\Carbon::now()->diffInDays($item->created_at) < 5)
                        <form action="{{route('magazines',$item->id)}}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="delete" type="submit"><i class="fa fa-trash"></i></button>
                        </form>
                    @endif
                    <a class="edit" href="{{url('/magazines/'.$item->id)}}"><i class="fa fa-pencil "></i></a>
                </td>
            </tr>

            @empty
                <h1>welcome</h1>
            @endforelse

        </tbody>

    </table>
    <div class="table--footer">
        {{$magazines->links('vendor.pagination.semantic-ui')}}

    </div>

    <div id="createModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content modal__tall">
            <div class="modal-header">
                <h2>إضافة مجلة</h2>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <form action="{{url('/magazines')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-holder">
                        <div class="form-input-container">
                            <input type="text" name="name" class="form-input" id="nameField" placeholder="اسم المجلة">
                            <label for="nameField">اسم المجلة</label>
                        </div>
                        <div class="form-input-container">
                            <input type="file" name="image" class="form-input" id="imageField" placeholder="صورة المجلة" >
                            <label for="imageField"> صورة المجلة</label>
                        </div>
                        <div class="form-input-container">
                            <select class="form-input" name="country_id" id="country">
                                @foreach ($countries as $country)
                                    <option value="{{$country->id}}" >{{$country->name}}</option>
                                @endforeach
                            </select>
                            <label for="country">الدولة</label>
                        </div>
                        <div class="form-input-container">
                            <select class="form-input" name="corporation_id" id="corporation">
                                @foreach ($corporations as $corporation)
                                    <option value="{{$corporation->id}}" >{{$corporation->name}}</option>
                                @endforeach
                            </select>
                            <label for="corporation">المؤسسة</label>
                        </div>
                        <div class="form-input-container">
                            <select class="form-input" name="rating_id" id="category">
                                @foreach ($ratings as $rating)
                                    <option value="{{$rating->id}}" >{{$rating->name}}</option>
                                @endforeach
                            </select>
                            <label for="category">التصنيف</label>
                        </div>
                        <div class="form-input-container">
                            <label for="call_by">ترقيم باستخدام : </label>
                            <input type="text"  name="call_by" id="Going" value="مجلد"/>

                        </div>
                        <div class="form-input-container">
                            <input type="radio" value="1" name="available" id="isAvaliable" />
                            <label for="isAvaliable">كاملة</label>
                            <input type="radio" value="0" name="available" id="notAvaliable" />
                            <label for="notAvaliable">غير كاملة</label>
                        </div>
                        <div class="form-input-container">
                            <input type="radio" value="1" name="status" id="Going" />
                            <label for="Going">متوفرة</label>
                            <input type="radio" value="0" name="status" id="Stopped" />
                            <label for="Stopped">غير متوفرة</label>
                        </div>
                        <div class="form-input-container">
                            <input type="checkbox" name="chosen" id="chosen" />
                            <label for="chosen">صفحة اخترنا لك</label>
                        </div>


                    </div>
                    <button type="submit" class="button button-wide modal-footer">إضافة مجلة</button>
                </form>
            </div>
        </div>

    </div>
@endsection
@section('style')


@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(function(){
    $('.delete').on('click', function(event){
    var form = $(".delete").parent();
    event.preventDefault();
         swal.fire({
            title: "هل متأكد من الحذف ؟",
            text: "سيتم حذف جميع البيانات المتعلقة بها",
            icon: "warning",
             showDenyButton: false,
             showCancelButton: true,
             confirmButtonText: 'تاكيد الحذف',
             cancelButtonText: `الرجوع`,
            dangerMode: true,
        }).then(function(isConfirm) {
        if (isConfirm.isConfirmed) {
            form.submit();
        } else {
            console.log(isConfirm)
            swal.fire("تم التراجع عن الحذف بنجاح", "");
        }
        });

    });
    });
    </script>
@endpush
