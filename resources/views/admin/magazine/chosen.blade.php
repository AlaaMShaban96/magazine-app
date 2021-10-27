@extends('admin.layout.app')

@section('content')

    <div class="nav">
        <div><h2>اخترنا لك</h2></div>

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
                <td><a href="{{url('/magazines/'.$item->id.'/folders')}}" style="padding-top:5px;padding-bottom:5px;" class="button button-primary">{{$item->call_by=='years'?'السنوات':'المجلدات'}}</a></td>
                <td>
                    {{-- @if(auth('admin')->user()->role == 'admin' ||  \Carbon\Carbon::now()->diffInDays($item->created_at) < 5)
                    <form action="{{route('magazines',$item->id)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="delete" type="submit"><i class="fa fa-trash"></i></button>
                    </form>
                @endif --}}
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