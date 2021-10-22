@extends('admin.layout.app')

@section('content')

    <div class="nav">
        <div><h2>المستخدمين</h2></div>

        <a id="createModalOpen" href="#" class="button">إضافة مستخدم</a>
    </div>
    <table>
        <thead>
            <td>اسم المستخدم</td>
            <td>البريد الالكتروني</td>
            <td>الصلاحيات</td>
            <td></td>
        </thead>
        <tbody>
        @foreach ($admins as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role=='admin'?'مدير':'مستخدم'}}</td>
                <td>
                    <form action="{{url('/admins/'.$user->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="delete" type="submit"><i class="fa fa-trash "></i></button>
                        <a class="edit" href="{{url('admins/'.$user->id)}}"><i class="fa fa-pencil "></i></a>

                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
    <div class="table--footer">
        {{$admins->links('vendor.pagination.semantic-ui')}}
    </div>

    <div id="createModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            {{-- <div class="modal-header">
                <h2>إضافة مستخدم</h2>
                <span class="close">&times;</span>
            </div> --}}
            <div class="modal-body">
                <form action="{{url("/admins")}}" method="post">
                @csrf
                    <div class="form-holder">
                    <div class="form-input-container">
                        <input type="text" name="name" class="form-input" id="nameField"  placeholder="اسم المستخدم">
                        <label for="nameField">اسم المستخدم</label>
                    </div>
                    <div class="form-input-container">
                        <input type="text" name="email" class="form-input"   placeholder="البريد الالكتروني">
                        <label for="nameField">البريد الاكتروني</label>
                    </div>
                    <div class="form-input-container">
                        <input type="password" name="password" class="form-input"   placeholder="كلمة السر">
                        <label for="nameField">كلمة السر</label>
                    </div>
                    <div class="form-input-container">
                        <label for="call_by">صلاحيات  : </label>

                        <input type="radio" value="admin" name="role" id="Going"  />
                        <label for="admin">مدير</label>
                        <input type="radio" value="edtor" name="role" id="Stopped" />
                        <label for="edtor"> مستخدم</label>
                    </div>
                </div>
                <button type="submit" class="button button-wide modal-footer">إضافة مستخدم</button>
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
