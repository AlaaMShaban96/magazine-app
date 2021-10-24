@extends('admin.layout.app')

@section('content')

    <div class="nav">
        <div><h2>الدول</h2></div>

        <a id="createModalOpen" href="#" class="button">إضافة دولة</a>
    </div>
    <table>
        <thead>
            <td>اسم الدولة</td>
            <td></td>
        </thead>
        <tbody>
        @foreach ($countries as $country)
            <tr>
                <td>{{$country->name}}</td>
                <td>
                    <form action="{{url('/countries/'.$country->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        @if (auth()->guard('admin')->user()->role=='admin')
                        <button class="delete" type="submit"><i class="fa fa-trash "></i></button>

                        @endif

                        <a class="edit" href="{{route('countries',$country->id)}}"><i class="fa fa-pencil "></i></a>

                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
    <div class="table--footer">
        {{$countries->links('vendor.pagination.semantic-ui')}}
    </div>

    <div id="createModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h2>إضافة دولة</h2>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                    <form action="{{url('/countries')}}" method="post">
                    @csrf
                        <div class="form-holder">
                        <div class="form-input-container">
                            <input type="text" name="name" class="form-input" id="nameField" placeholder="اسم الدولة">
                            <label for="nameField">اسم الدولة</label>
                        </div>
                    </div>
                    <button type="submit" class="button button-wide modal-footer">إضافة دولة</button>
                </form>
            </div>
        </div>

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
