@php
    $years = range(1900, strftime("%Y", time()));
@endphp

@extends('admin.layout.app')

@section('content')

    <div class="nav">
        <div><h2>اعداد {{$folder->magazine->call_by}} {{$folder->folder_number}} لمجلة {{$folder->magazine->name}} </h2> <a href="{{url('magazines')}}"><span>الرجوع للمجلة</span></a></div>

        <a id="createModalOpen" href="#" class="button">إضافة عدد</a>
    </div>
    <table>
        <thead>
        <td>اسم العدد</td>
        <td>اصدار العدد</td>
            <td></td>
        </thead>
        <tbody>
        @foreach($numbers as $number)
            <tr>
                <td> العدد {{$number->number}} </td>
                <td>  {{date('Y', strtotime($number->edition))}} </td>

                <td>
                    <form action="{{url('/numbers/'.$number->id)}}" class="d-inline" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="delete" type="submit"><i class="fa fa-trash "></i></button>
                    </form>
                    <a class="edit" href="{{route('numbers.update',$number->id)}}"><i class="fa fa-pencil "></i></a>

                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
    <div class="table--footer">
        {{$numbers->links('vendor.pagination.semantic-ui')}}
    </div>

    <div id="createModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content" style="height: 420px;">
            <div class="modal-header">
                <h2>إضافة عدد</h2>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <form action="{{route('numbers',$folder->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-holder">
                        <div class="form-input-container">
                            <input type="text" name="number" class="form-input" id="nameField" placeholder="اسم العدد">
                            <label for="nameField">رقم العدد</label>
                        </div>
                    </div>
                    <div class="form-holder">
                        <div class="form-input-container">
                            <select name="edition" class="form-input">
                                @foreach ($years as $year)
                                <option value="{{$year}}">{{$year}}</option>
                                @endforeach
                              </select>

                            {{-- <input type="years" name="edition" class="form-input" id="editionField" placeholder="اصدار العدد" > --}}
                            <label for="editionField">اصدار العدد</label>
                        </div>
                    </div>
                    <div class="form-input-container">
                        <input type="file" name="pdf" class="form-input" id="fileField" placeholder="ملف " >
                        <label for="fileField"> pdf العدد</label>
                    </div>
                    <button type="submit" class="button button-wide modal-footer">إضافة عدد</button>
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
