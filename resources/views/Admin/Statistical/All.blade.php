@extends('/Admin/adminpage')
@section('content')


<div class="col_3"> 
    
    <div class="col-md-3 widget widget1">
        <div class="r3_counter_box">
            <i class="pull-left fa fa-user icon-rounded"></i>
            <div class="stats">
                <h5><strong>{{$all['ad']}}</strong></h5>
                <span>Quản lý</span>
            </div>
        </div>
    </div>
    <div class="col-md-3 widget widget1">
        <div class="r3_counter_box">
            <i class="pull-left fa fa-laptop user1 icon-rounded"></i>
            <div class="stats">
                <h5><strong>{{$all['cus']}}</strong></h5>
                <span>Khách hàng</span>
            </div>
        </div>
    </div>
    <div class="col-md-3 widget widget1">
        <div class="r3_counter_box">
            <i class="pull-left fa fa-money user2 icon-rounded"></i>
            <div class="stats">
                <h5><strong>{{$all['bill']}}</strong></h5>
                <span>Số đơn hàng</span>
            </div>
        </div>
    </div>
    <div class="col-md-3 widget widget1">
        <div class="r3_counter_box">
            <i class="pull-left fa fa-pie-chart dollar1 icon-rounded"></i>
            <div class="stats">
                <h5><strong>{{$all['Pro']}}</strong></h5>
                <span>Sản phẩm đã bán</span>
            </div>
        </div>
        </div>
    <div class="col-md-3 widget">
        <div class="r3_counter_box">
            <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
            <div class="stats">
                <h5><strong>{{$all['num']}}</strong></h5>
                <span>Người dùng</span>
            </div>
        </div>
    </div>
    <br><br>
    <div class="clearfix"> </div>
    <div class="col-md-3 widget widget1">
        <div class="r3_counter_box">
            <i class="pull-left fa fa-hdd-o icon-rounded"></i>
            <div class="stats">
                <h5><strong>{{$all['qty']}}</strong></h5>
                <span>Số lượng hàng đã bán</span>
            </div>
        </div>
    </div>
    <div class="col-md-3 widget widget1">
        <div class="r3_counter_box">
            <i class="pull-left fa fa-laptop user1 icon-rounded"></i>
            <div class="stats">
                <h5><strong>{{$all['ProQty']}}</strong></h5>
                <span>Hàng trong kho</span>
            </div>
        </div>
    </div>
    <div class="clearfix"> </div>
   
</div>
 @stop