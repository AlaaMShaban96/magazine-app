@extends('admin.layout.app')

@section('content')

    <div class="">
        <div><h2> تعديل مجلة : {{$category['name']}}</h2><a  href="{{url('magazines')}}" class="">رجوع</a></div>


    </div>

    <div class="modal-content  modal__tall">
        <div class="modal-header">
            <h2>تعديل مجلة</h2>
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

@endsection
