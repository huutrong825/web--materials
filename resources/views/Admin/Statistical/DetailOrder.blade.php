@extends('/Admin/adminpage')
@section('content')

<div>
    <h2> Chi tiết đơn hàng</h2>
</div>
<br>



	<div class="panel panel-default">        
        @foreach($bill as $b)        
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6 col-sm-6 text-left">
					<h4><strong>Khách hàng</strong> {{$b->Name}}</h4>
					<ul class="list-unstyled">
						<li><strong>Họ và tên:</strong> {{$b->Name}}</li>
                        <li><strong>Giới tính:</strong> {{$b->Sex}}&nbsp; <strong>SĐT:</strong> {{$b->Phone}}</li>
						<li><strong>Địa chỉ:</strong> {{$b->Address}}</li>
						<li><strong>Thời gian đặt hàng:</strong> {{$b->created_at}}</li>
					</ul>
				</div>

				<div class="col-md-6 col-sm-6 text-right">
					<h4><strong>Hình thức thanh toán: </strong>{{$b->Payment}}</h4>
					<ul class="list-unstyled">
						<li><strong>Bank Name:</strong> 012345678901</li>
						<li><strong>Account Number:</strong> 012345678901</li>
						<li><strong>SWIFT Code:</strong> SWITCH012345678CODE</li>
						<li><strong>V.A.T Reg #:</strong> VAT5678901CODE</li>
					</ul>

				</div>

			</div>

			<div class="table-responsive">
				<table class="table table-condensed nomargin">
					<thead>
						<tr>
							<th>Tên sản phẩm</th>
							<th>Số lượng</th>
							<th>Đơn vị tính</th>
							<th>Đơn giá</th>
							<th>Thành tiền</th>
						</tr>
					</thead>
					<tbody>
                        @foreach($product as $p)
						<tr>
							<td>{{$p->ProductName}}</td>
							<td>{{$p->Quanity}}</td>
							<td>{{$p->Unit}}</td>
							<td><?php echo number_format($p->Price); ?></td>
							<td><?php echo number_format($p->Price*$p->Quanity); ?></td>
						</tr>
                        @endforeach					
					</tbody>
				</table>
			</div>

			<hr class="nomargin-top">
			<div class="row">
				<div class="col-sm-6 text-left">
					<h4><strong>Contact</strong> Details</h4>
					<p class="nomargin nopadding">
						<strong>Note:</strong> 
						{{$b->Note}}
					</p><br><!-- no P margin for printing - use <br> instead -->

					<address>
						Web vật liệu xây dựng<br>
						Vivas 2355 Australia<br>
						Phone: 1-800-565-2390 <br>
						Hotline: 1-800-565-2390 <br>
						Email:examplemailvr@gmail.com
					</address>
				</div>

				<div class="col-sm-6 text-right">
					<ul class="list-unstyled">
						<li><strong>Tổng hóa đơn thanh toán:</strong> <?php echo number_format($b->TotalPrice); ?> VNĐ</li>
					</ul>  
				</div>
			</div>
		</div>     
        @break    
        @endforeach
        
	</div>

	<div>
		<a href="{{route('BillOrder')}}" class='btn btn-success'>Trở về</a>
	</div>

@stop