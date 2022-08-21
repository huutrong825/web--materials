@extends('Admin/adminpage')
@section('content')
<div>
    <h2 style="text-align:center"> LỊCH SỬ NHẬP HÀNG</h2>
</div>
<br>
<div>
    <table class="table table-borderless">
        <tr>
            <th>Mã nhập hàng</th>
            <th>Tên nhân viên</th>
            <th>Nhà cung cấp</th>
            <th>Ngày nhập</th>
            <th></th>
        </tr>
        @foreach($bill as $b)
        <tr>
            <td>{{$b->id}}</td>
            <td>{{$b->name}}</td>
            <td>{{$b->CategoryName}}</td>
            <td>{{$b->Date}}</td>
            <td>
                <a href="#">Chi tiết</a>
            </td>
        </tr>  
        @endforeach     
    </table>
</div>
@stop