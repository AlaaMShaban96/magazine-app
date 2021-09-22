@extends('admin.layout.app')

@section('content')

    <div class="nav">
        <div><h2>التصنيفات</h2></div>

        <a id="createModalOpen" href="#" class="button">إضافة تصنيف</a>
    </div>
    <table>
        <thead>
            <td>اسم التصنيف</td>
            <td></td>
        </thead>
        <tbody>
            @foreach ($ratings as $rating)
            <tr>
                <td>{{$rating->name}}</td>
                <td>
                    <form action="{{url('/ratings/'.$rating->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="delete" type="submit"><i class="fa fa-trash "></i></button>
                        <a class="edit" href="{{route('ratings',$rating->id)}}"><i class="fa fa-pencil "></i></a>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>

    </table>
    <div class="table--footer">
        {{$ratings->links('vendor.pagination.semantic-ui')}}

    </div>

    <div id="createModal" class="modal">

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

    </div>
@endsection
