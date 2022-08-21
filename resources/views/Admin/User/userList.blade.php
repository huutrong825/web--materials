@extends('/Admin/adminpage')
@section('content')
<div>
    <h2 style="text-align:center;color:light-green">DANH SÁCH NGƯỜI DÙNG</h2>
    <div>
        <table class='table table-striped'>
            <tr>
                <th>User ID</th>
                <th>Full Name</th>                
                <th>Email</th>
                <th>Type</th>
                <th colspan="2">Tool</th>
            </tr>
            @foreach($user as $u)
            <tr>
                <td>{{$u->id}}</td>
                <td>{{$u->name}}</td>
                <td>{{$u->email}}</td>
                <td>{{$u->Type}}</td>
                <td>
                    <a href="{{route('XoaUser',['id'=>$u->id])}}"><i class="fa fa-trash"></i></a>                    
                </td>
                <td><a href="{{route('SuaUser',['id'=>$u->id])}}"><i class="fa fa-pencil"></i></a></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>


@stop