<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test Email</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


</head>
	<body>
		<div> 
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
						@foreach($cart->products as $c)
						<tr>
							<td>{{$c['prodInfo']->ProductName}}</td>
							<td>{{$c['quanity']}}</td>
							<td>{{$c['prodInfo']->Unit}}</td>
							<td><?php echo number_format($c['prodInfo']->Price); ?></td>
							<td><?php echo number_format($c['prodInfo']->Price*$c['quanity']); ?></td>
						</tr>
						@endforeach                        				
					</tbody>
				</table>
			</div>

			<hr class="nomargin-top">
			<div class="row">
				<div class="col-sm-6 text-left">

					<address>
						Web vật liệu xây dựng<br>
						Vivas 2355 Australia<br>
						Phone: 1-800-565-2390 <br>
						Hotline: 1-800-565-2390 <br>
						Email:examplemailvr@gmail.com
					</address>
				</div>
				
			</div>
		</div>
	</body>
</html>