@extends('/Page/layout')
@section('content')
<div>
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
  <form class="form-group login" method="post" action="{{route('Login')}}">
	  @csrf
		<div class="form-header" style="text-align:center" >
		</div>
		<div class="form-group">
			<label for="username">Email</label>
			<i class="fas fa-mail-bulk"></i>
			<input type="email" class="form-control" name="email" placeholder="Email" required/>
		</div>		
		<div class="form-group">
			<label for="password">Password</label>
			<i class="fas fa-key"></i>
			<input type="password" class="form-control" name="password" placeholder="Password" required/>
		</div>
		<div class="form-group">
			<button type="submit"  class="btn btn-primary btn-block" id="btLogin">Login</button>
		</div>
		<div class="form-group" style="text-align:center">
			<label>Tạo tài khoản mới <a href="{{route('Register')}}">Đăng ký</a></label>
		</div>
	</form>
</div>
@stop