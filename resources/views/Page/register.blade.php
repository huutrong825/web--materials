@extends('/Page/layout')
@section('content')
<div>
  <form class="form-group register" method="post" action="">
  @csrf
		<div class="form-header" style="text-align:center" style="color:#15583E">
			<h1>Tạo tài khoản mới</h1>
		</div>
		<div class="form-group">
			<label for="username">Name</label>
			<i class="fas fa-user-alt"></i>
			<input type="text" class="form-control" name="username" placeholder="User name" required/>
		</div>
		<div class="form-group">
		<label for="email">Email</label>
			<i class="fas fa-mail-bulk"></i>
			<input type="email" class="form-control" name="email" placeholder="@gmail.com">
		</div>	
		<div class="form-group">
			<label for="password">Password</label>
			<i class="fas fa-key"></i>
			<input type="password" class="form-control" name="password" placeholder="Password" required/>
		</div>
		<div class="form-group">
			<label for="Re_password">Re-password</label>
			<i class="fas fa-key"></i>
			<input type="password" class="form-control" name="Re_password" placeholder="Re-password" required/>
		</div>
    	<div class="form-group">
			<input type="text"  class="form-control" name="types" value="USER"  style="display:none">
		</div>
		<div class="form-group">
			<button type="submit"  class="btn btn-success btn-block" id="btRegistered">Registered</button>
		</div>
		<div class="form-group" style="text-align:center">
			<label>Đã có tài khoản <a href="{{route('Login')}}">Đăng nhập</a></label>
		</div>
	</form>
</div>
@stop