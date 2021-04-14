@extends('admin.layout.app')

@section('content')

    <div class="nav">
        <div><h2>المجلات</h2></div>

        <a id="createModalOpen" href="#" class="button">اضافة مجلة</a>
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
        @for($i=0;$i<10;$i++)
            <tr>
                <td>مجلة</td>
                <td>ليبيا</td>
                <td>مؤسسة</td>
                <td>تصنف</td>
                <td>كاملة</td>
                <td>متوافر</td>
                <td><a href="{{url('/magazines/'.$i.'/folders')}}" style="padding-top:5px;padding-bottom:5px;" class="button button-primary">المجلدات</a></td>
                <td><form class="d-inline">
                        <button class="delete" type="submit"><i class="fa fa-trash"></i></button>
                    </form>
                    <a class="edit" href="{{url('/magazines/'.$i)}}"><i class="fa fa-pencil "></i></a>
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
        <div class="modal-content modal__tall">
            <div class="modal-header">
                <h2>اضافة مجلة</h2>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-holder">
                        <div class="form-input-container">
                            <input type="text" name="name" class="form-input" id="nameField" placeholder="اسم المجلة">
                            <label for="nameField">اسم المجلة</label>
                        </div>
                        <div class="form-input-container">
                            <select class="form-input" name="country" id="country">
                                <option value="1">ليبيا</option>
                            </select>
                            <label for="country">الدولة</label>
                        </div>
                        <div class="form-input-container">
                            <select class="form-input" name="corporation" id="corporation">
                                <option value="1">مؤسسة</option>
                            </select>
                            <label for="corporation">المؤسسة</label>
                        </div>
                        <div class="form-input-container">
                            <select class="form-input" name="category" id="category">
                                <option value="1">تصنيف</option>
                            </select>
                            <label for="category">التصنيف</label>
                        </div>
                        <div class="form-input-container">
                            <input type="radio" value="1" name="avaliable" id="isAvaliable" />
                            <label for="isAvaliable">كاملة</label>
                            <input type="radio" value="0" name="avaliable" id="notAvaliable" />
                            <label for="notAvaliable">غير كاملة</label>
                        </div>
                        <div class="form-input-container">
                            <input type="radio" value="1" name="status" id="Going" />
                            <label for="Going">متوفرة</label>
                            <input type="radio" value="0" name="status" id="Stopped" />
                            <label for="Stopped">غير متوفرة</label>
                        </div>

                    </div>
                    <button type="submit" class="button button-wide modal-footer">اضافة مجلة</button>
                </form>
            </div>
        </div>

    </div>
@endsection
