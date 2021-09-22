@extends('admin.layout.app')
@section('style')
    <style>
       td{
            max-width:200px;
            word-wrap:break-word;
        }
    </style>
@endsection

@section('content')

    <div class="nav">
        <div><h2>الملاحظات و البلاغات</h2></div>

        {{-- <a id="createModalOpen" href="#" class="button">إضافة تصنيف</a> --}}
    </div>
    <table>
        <thead>
            <td> المستخدم</td>
            <td> المجلة</td>
            <td> المجلد</td>
            <td> العدد</td>
            <td> نوع </td>
            <td> الملاحظة </td>
            <td>  </td>
            <td>  </td>
            <td>  </td>
            <td>  </td>
            <td>  </td>
            <td>  </td>
        </thead>
        <tbody>
            @foreach ($notes as $note)
            <tr>
                <td>{{$note->user->name}}</td>
                <td> {{$note->number->folder->magazine->name}}</td>
                <td>المجلد -{{$note->number->folder->folder_number}}</td>
                <td>العدد -{{$note->number->number}}</td>
                <td>{{$note['title']}}</td>
                <td colspan="7" >{{$note->body}}</td>
            {{--     <td>
                    <form action="{{url('/ratings/'.$rating->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="delete" type="submit"><i class="fa fa-trash "></i></button>
                        <a class="edit" href="{{route('ratings',$rating->id)}}"><i class="fa fa-pencil "></i></a>
                    </form> 
                </td>--}}
            </tr>
            @endforeach

        </tbody>

    </table>
    <div class="table--footer">
        {{$notes->links('vendor.pagination.semantic-ui')}}

    </div>

    {{-- <div id="createModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h2>إضافة تصنيف</h2>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <form action="{{url('/ratings')}}" method="post">
                    @csrf
                    <div class="form-holder">
                        <div class="form-input-container">
                            <input type="text" name="name" class="form-input" id="nameField" placeholder="اسم التصنيف">
                            <label for="nameField">اسم التصنيف</label>
                        </div>
                    </div>
                    <button type="submit" class="button button-wide modal-footer">إضافة تصنيف</button>
                </form>
            </div>
        </div>

    </div> --}}
@endsection
