@extends('Admin/adminpage')
@section('content')
<div>
    <table class="table table-striped">
        <tr>
            <th>Mã nhập</th>
            <th>Tên nhân viên</th>
            <th>Tên nhà cung cấp</th>
            <th>Ngày</th>
            <th></th>
        </tr>
        <tr>
            @foreach($billnew as $b)
            <td>{{$b->id}}</td>
            <td>{{$b->name}}</td>
            <td>{{$b->CompanyName}}</td>
            <td>{{$b->Date}}</td>
            <td>
                <a href="{{route('ProdImp',['Imid'=>$b->id])}}">Nhập hàng</a>
            </td>
            @endforeach
        </tr>
    </table>
</div>
@stop