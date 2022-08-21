@extends('/Admin/adminpage')
@section('content')
<div class="filler ">
<form class="form-group" action="{{route('turnoner')}}" method="post">
    @csrf
    <div class="form-group fill" > 
        <span>Từ:</span>
        <input type="text" id="datepicker" name="from_date"  min="1997-01-01" max="2030-12-31" />
    </div>
    <div class="form-group fill"> 
        <span>Đến:</span>
        <input type="text" id="datepicker" name="to_date"min="1997-01-01" max="2030-12-31" />
    </div>
    <div class="form-group fill"> 
        <select id="key" name="key" class="form-control" required>
            <option>--Chọn kiểu lọc--</option>
            <option value="Day">Theo ngày</option>
            <option value="Month">Theo tháng</option>
            <option value="Year">Theo năm</option>
            
        </select>
    </div>
    <br>
    <div class="fill">
        <button type="submit" class="btn btn-primary">Lọc</button>
    </div>
</form>
</div>
<div class="">

    @if(isset($total))
    <table class="table table-borderless" style="text-align:center">
        <tr>
            <th>Thời gian</th>
            <th>Tổng đơn hàng</th>
            <th>Tổng sản phẩm đã bán</th>
            <th>Tổng số lượng sản phẩm đã bán</th>
            <th>Tổng doanh thu</th>
            <th></th>
        </tr>
        @foreach($total as $t)
        
        <tr>            
            <td>{{$t->time}}</td>
            <td>{{$t->dh}}</td>
            <td>{{$t->sp}}</td>
            <td>{{$t->sl}}</td>
            <td>{{$t->dt}}</td>            
        </tr>        
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th hidden>{{$text+=$t->dt}}</th>
        </tr>
        @endforeach
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>{{$text}}</th>
        </tr>
    </table>
    @endif
</div>

@stop