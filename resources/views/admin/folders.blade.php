@extends('admin.layout.app')

@section('content')

    <div class="nav">
        <div><h2> {{$magazine->call_by=='years'?' سنوات' :'مجلدات'}}  مجلة {{$magazine->name}}</h2> <a href="{{url('magazines')}}"><span>الرجوع للمجلة</span></a></div>

        <a id="createModalOpen" href="#" class="button">اضافة {{$magazine->call_by=='years'?' سنة' :'مجلد'}} </a>
    </div>
    <table>
        <thead>
        <td>{{$magazine->call_by=='years'?' رقم السنة' :'رقم المجلد'}}</td>
        <td>الاعداد </td>
            <td></td>
        </thead>
        <tbody>
        @foreach($folders as $folder)
            <tr>
                <td> {{$magazine->call_by=='years'?' سنة' :'مجلد'}} {{$folder->folder_number}}</td>
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
                <h2>اضافة {{$magazine->call_by=='years'?' سنة' :'مجلد'}}</h2>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <form action="{{route('folders',$magazine->id)}}" method="POST">
                    @csrf
                    <div class="form-holder">

                        <div class="form-input-container">
                            <input type="number" name="folder_number" required class="form-input" id="nameField" placeholder="رقم المجلد">
                            <label for="nameField">{{$magazine->call_by=='years'?'السنة' :'رقم المجلد'}}</label>
                        </div>

                    <button type="submit" class="button button-wide modal-footer">اضافة مجلد</button>
                </form>
            </div>
        </div>

    </div>
@endsection
