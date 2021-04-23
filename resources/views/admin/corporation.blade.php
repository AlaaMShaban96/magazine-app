@extends('admin.layout.app')

@section('content')

    <div class="nav">
        <div><h2>المؤسسات</h2></div>

        <a id="createModalOpen" href="#" class="button">اضافة مؤسسة</a>
    </div>
    <table>
        <thead>
            <td>اسم مؤسسة</td>
            <td></td>
        </thead>
        <tbody>
            @foreach ($corporations as $corporation)
            <tr>
                <td>{{$corporation->name}}</td>
                <td>
                    <form action="{{url('/corporations/'.$corporation->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="delete" type="submit"><i class="fa fa-trash "></i></button>
                        <a class="edit" href="{{route('corporations',$corporation->id)}}" ><i class="fa fa-pencil "></i></a>

                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    <div class="table--footer">
        {{$corporations->links('vendor.pagination.semantic-ui')}}

    </div>

    <div id="createModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">

            <div class="modal-header">
                <span class="close">&times;</span>
                <h2 style="color: black">اضافة مؤسسة</h2>

            </div>
            <div class="modal-body">
                <form action="{{url('/corporations')}}" method="post">
                    @csrf
                    <div class="form-holder">
                        <div class="form-input-container">
                            <input type="text" name="name" class="form-input" id="nameField" placeholder="اسم المؤسسة">
                            <label for="nameField">اسم المؤسسة</label>
                        </div>
                    </div>
                    <button type="submit" class="button button-wide modal-footer">اضافة مؤسسة</button>
                </form>
            </div>
        </div>

    </div>
@endsection
