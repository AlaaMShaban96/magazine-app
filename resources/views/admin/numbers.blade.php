@extends('admin.layout.app')

@section('content')

    <div class="nav">
        <div><h2>اعداد مجلد {{$folder->id}} لمجلة {{$folder->magazine->name}} </h2> <a href="{{url('magazines')}}"><span>الرجوع للمجلة</span></a></div>

        <a id="createModalOpen" href="#" class="button">اضافة عدد</a>
    </div>
    <table>
        <thead>
            <td>اسم العدد</td>
            <td></td>
        </thead>
        <tbody>
        @foreach($numbers as $number)
            <tr>
                <td> العدد {{$number->number}} </td>
                <td>
                    <form action="{{url('/numbers/'.$number->id)}}" class="d-inline" method="post">
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
        {{$numbers->links('vendor.pagination.semantic-ui')}}
    </div>

    <div id="createModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h2>اضافة عدد</h2>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <form action="{{route('numbers',$folder->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-holder">
                        <div class="form-input-container">
                            <input type="number" name="number" class="form-input" id="nameField" placeholder="اسم العدد">
                            <label for="nameField">رقم العدد</label>
                        </div>
                    </div>
                    <div class="form-input-container">
                        <input type="file" name="pdf" class="form-input" id="fileField" placeholder="ملف " >
                        <label for="fileField"> pdf العدد</label>
                    </div>
                    <button type="submit" class="button button-wide modal-footer">اضافة عدد</button>
                </form>
            </div>
        </div>

    </div>
@endsection
