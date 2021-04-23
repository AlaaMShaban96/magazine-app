@extends('admin.layout.app')

@section('content')

    <div class="nav">
        <div><h2> مجلدات لمجلة {{$magazine->name}}</h2> <a href="{{url('magazines')}}"><span>الرجوع للمجلة</span></a></div>

        <a id="createModalOpen" href="#" class="button">اضافة مجلد</a>
    </div>
    <table>
        <thead>
        <td>اسم المجلد</td>
        <td>الاعداد </td>
            <td></td>
        </thead>
        <tbody>
        @foreach($folders as $folder)
            <tr>
                <td>  مجلد{{$folder->id}}</td>
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
                <h2>اضافة مجلد</h2>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <form action="{{route('folders',$magazine->id)}}" method="POST">
                    @csrf
                    <div class="form-holder">
                    </div>
                    <button type="submit" class="button button-wide modal-footer">اضافة مجلد</button>
                </form>
            </div>
        </div>

    </div>
@endsection
