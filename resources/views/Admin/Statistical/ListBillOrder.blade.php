@extends('/Admin/adminpage')
@section('content')

<div>
    <h2> DANH SÁCH ĐẶT HÀNG</h2>
</div>
<br>

    

<br>
<br>
<div>
    <table class="table table-borderless">
        <tr>
            <th>Mã đơn hàng</th>
            <th>Tên khách hàng</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Thời gian đặt</th>
            <th></th>
        </tr>
        @foreach($bill as $b)
        <tr>
            <td>{{$b->OrderID}}</td>
            <td>{{$b->Name}}</td>
            <td>{{$b->Email}}</td>
            <td>{{$b->Address}}</td>
            <td>{{$b->Order_Date}}</td>
            <td>
                <a href="{{route('DetailBill',['OrderID'=>$b->OrderID])}}">Chi tiết</a>
            </td>
        </tr>  
        @endforeach     
    </table>
</div>
{{$bill->links()}}
@stop