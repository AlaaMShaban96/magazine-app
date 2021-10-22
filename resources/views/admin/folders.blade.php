@extends('admin.layout.app')

@section('content')

    <div class="nav">
        <div><h2> {{$magazine->call_by}}  مجلة {{$magazine->name}}</h2> <a href="{{url('magazines')}}"><span>الرجوع للمجلة</span></a></div>

        <a id="createModalOpen" href="#" class="button">إضافة {{$magazine->call_by}} </a>
    </div>
    <table>
        <thead>
        <td>{{'رقم ' .$magazine->call_by }}</td>
        <td>الاعداد </td>
            <td></td>
        </thead>
        <tbody>
        @foreach($folders as $folder)
            <tr>
                <td> {{$magazine->call_by}} {{$folder->folder_number}}</td>
                <td><a href="{{url('/folders/'.$folder->id.'/numbers')}}" style="padding-top:5px;padding-bottom:5px;" class="button button-primary">الاعداد</a></td>
                <td><form action="{{url('/folders/'.$folder->id)}}" class="d-inline" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="delete" type="submit"><i class="fa fa-trash "></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
    <div class="table--footer">
        {{$folders->links('vendor.pagination.semantic-ui')}}
    </div>

    <div id="createModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h2>إضافة {{$magazine->call_by}}</h2>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <form action="{{route('folders',$magazine->id)}}" method="POST">
                    @csrf
                    <div class="form-holder">

                        <div class="form-input-container">
                            <input type="number" name="folder_number" required class="form-input" id="nameField" placeholder="رقم المجلد">
                            <label for="nameField">{{$magazine->call_by}}</label>
                        </div>

                    <button type="submit" class="button button-wide modal-footer">إضافة مجلد</button>
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
