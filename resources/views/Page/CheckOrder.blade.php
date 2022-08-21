@extends('Page/layout')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('home')}}">Home</a> / <span>Kiểm tra đặt hàng</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
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
<div class="container">
    <div id="content">        
        <form action="{{route('Order')}}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <h4>Đặt hàng</h4>
                    <div class="space20">&nbsp;</div>
                    @foreach($user as $u)
                    <div class="form-block">
                        <label for="name">Họ tên*</label>
                        <input type="text" name="name" id="name" placeholder="Họ tên" value="{{$u->name}}" required>
                    </div>
                    <div class="form-block">
                        <label>Giới tính </label>
                        <input id="sex" type="radio" class="input-radio" name="sex" value="Nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
                        <input id="sex" type="radio" class="input-radio" name="sex" value="Nữ" style="width: 10%"><span>Nữ</span>
                                    
                    </div>

                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" name="email" id="email" value="{{$u->email}}" required placeholder="expample@gmail.com">
                    </div>

                    <div class="form-block">
                        <label for="address">Địa chỉ*</label>
                        <input type="text" name="address" id="address" value="{{$u->Address}}" placeholder="Street Address" required>
                    </div>
                    

                    <div class="form-block">
                        <label for="phone">Điện thoại*</label>
                        <input type="text" name="phone" value="{{$u->Phone}}" id="phone" required>
                    </div>
                    @endforeach
                    <div class="form-block">
                        <label for="notes">Ghi chú</label>
                        <textarea name='note' id="note" required></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="your-order">
                        <div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
                        <div class="your-order-body" style="padding: 0px 10px">
                        @if(Session::has("Cart")!=null)
                            <div class="your-order-item">
                                <div>
                                <!--  one item	 -->
                                @foreach(Session::get("Cart")->products as $p) 
                                    <div class="media">
                                        <img width="25%" src="{{asset('imgpro')}}/{{$p['prodInfo']->Image}}" alt="" class="pull-left">
                                        <div class="media-body">
                                            <p class="font-large">{{$p['prodInfo']->ProductName}}</p>
                                            <span class="color-gray your-order-info">Qty: {{$p['quanity']}} * <?php echo number_format($p['prodInfo']->Price);?> VNĐ</span>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- end one item -->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
                                <div class="pull-right"><h5 class="color-black"><?php echo number_format(Session::get("Cart")->totalPrice);?> VNĐ</h5></div>
                                <div class="clearfix"></div>
                            </div>
                            @endif
                        </div>

                        <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>                        
                        <div class="your-order-body">
                            <ul class="payment_methods methods">
                                <li class="payment_method_bacs">
                                    <input id="payment_method_bacs" type="radio" class="input-radio" name="payment" value="COD" checked="checked" data-order_button_text="">
                                    <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                                    <div class="payment_box payment_method_bacs" style="display: block;">
                                        Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                                    </div>						
                                </li>

                                <li class="payment_method_cheque">
                                    <input id="payment_method_cheque" type="radio" class="input-radio" name="payment" value="ATM" data-order_button_text="">
                                    <label for="payment_method_cheque">Chuyển khoản </label>
                                    <div class="payment_box payment_method_cheque" style="display: none;">
                                        Chuyển tiền đến tài khoản sau:
                                        <br>- Số tài khoản: 123 456 789
                                        <br>- Chủ TK: Nguyễn A
                                        <br>- Ngân hàng ACB, Chi nhánh TPHCM
                                    </div>						
                                </li>
                                
                            </ul>
                        </div>

                        <div class="text-center"><button type="submit">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
                    </div> <!-- .your-order -->
                </div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->

@stop