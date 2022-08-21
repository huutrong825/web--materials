@extends('/Admin/adminpage')
@section('content')

<div>
    <h2 style="text-align:center;color:light-green">THAY QUYỀN NGƯỜI DÙNG</h2>
    <br><br>

    @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>
    @endif
    @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
    @endif
    <div>
        <table class='table table-striped'>
            <tr>
                <th>User ID</th>
                <th>Full Name</th>  
                <th>Type</th>
                <th>Change</th>
                <th>Save</th>
            </tr>
            @foreach($user as $u)
            <tr>
                <td>{{$u->id}}</td>
                <td>{{$u->name}}</td>
                <td>{{$u->Type}}</td>
                <form action="{{route('Changetype',['UserID'=>$u->id])}}" method="get">
                   
                <td>
                    <select class="form-control" name='type' id="sel1">
                        <option ></option>
                        <option value="ADMIN">Admin</option>
                        <option value="SUPER">Super</option>
                        <option value="USER">User</option>
                    </select>         
                </td>
                <td><button type="submit" class="btn btn-success"><i class="fa fa-save"></i></button></td>
                </form>
            </tr>
            @endforeach
        </table>
    </div>
</div>


@stop