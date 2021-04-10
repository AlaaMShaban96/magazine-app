@extends('admin.layout.app')

@section('content')

    <div class="nav">
        <div><h2>الدول</h2></div>

        <a id="createModalOpen" href="#" class="button">اضافة دولة</a>
    </div>
    <table>
        <thead>
            <td>اسم الدولة</td>
            <td></td>
        </thead>
        <tbody>
        @for($i=0;$i<10;$i++)
            <tr>
                <td>اسم الدولة</td>
                <td><form class="d-inline">
                        <button class="delete" type="submit"><i class="fa fa-trash "></i></button>
                    </form>
                    <a class="edit" href="#"><i class="fa fa-pencil "></i></a>
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
                <h2>اضافة دولة</h2>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-holder">
                        <div class="form-input-container">
                            <input type="text" name="name" class="form-input" id="nameField" placeholder="اسم الدولة">
                            <label for="nameField">اسم الدولة</label>
                        </div>
                    </div>
                    <button type="submit" class="button button-wide modal-footer">اضافة دولة</button>
                </form>
            </div>
        </div>

    </div>
@endsection
