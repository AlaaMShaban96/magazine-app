@extends('admin.layout.app')

@section('content')

    <div class="nav">
        <div><h2>مجلدات لمجلة تجريب</h2> <a href="{{url('/magazines')}}"><span>الرجوع للمجلة</span></a></div>

        <a id="createModalOpen" href="#" class="button">اضافة مجلد</a>
    </div>
    <table>
        <thead>
        <td>اسم المجلد</td>
        <td>الاعداد </td>
            <td></td>
        </thead>
        <tbody>
        @for($i=0;$i<10;$i++)
            <tr>
                <td> مجلد {{$i }} </td>
                <td><a href="{{url('/magazines/'.$i.'/numbers')}}" style="padding-top:5px;padding-bottom:5px;" class="button button-primary">الاعداد</a></td>
                <td><form class="d-inline">
                        <button class="delete" type="submit"><i class="fa fa-trash "></i></button>
                    </form>
                </td>
            </tr>
        @endfor
        </tbody>

    </table>
    <div class="table--footer">
        <div class="pagination">
            <a href="#" class="pagination-button active">1</a>
            <a href="#" class="pagination-button">2</a>
            <a href="#" class="pagination-button">...</a>
        </div>
    </div>

    <div id="createModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h2>اضافة مجلد</h2>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-holder">
                        <div class="form-input-container">
                            <input type="text" name="name" class="form-input" id="nameField" placeholder="اسم المجلد">
                            <label for="nameField">اسم المجلد</label>
                        </div>
                    </div>
                    <button type="submit" class="button button-wide modal-footer">اضافة مجلد</button>
                </form>
            </div>
        </div>

    </div>
@endsection
