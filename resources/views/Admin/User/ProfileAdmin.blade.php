@extends('/Admin/adminpage')
@section('content')

<div>
    <br><br>
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
    <div class="row">
    @foreach($user as $u)
  		<div class="col-sm-3" style="width:50%">
            <div class="text-center">
                <img src="{{asset('imgUser')}}/{{$u->Image}}" class="avatar img-circle img-thumbnail" alt="avatar">
                <h6>Upload a different photo...</h6>
                <input type="file" name="fileUpload" class="text-center center-block file-upload">
            </div><br>
        </div>
        <div class="col-sm-9" style="width:50%"> 
            <form class="form" action="{{route('ProfileAD')}}" method="post" enctype="multipart/form-data">
                @csrf
                
                <div>
                    <label for="first_name">Tên người dùng</label>
                    <input type="text" class="form-control" name="name"  value="{{$u->name}}"  >
                </div>
                <div>
                <label for="last_name">Email</label>
                    <input type="text" class="form-control" name="mail" value="{{$u->email}}" disabled>
                </div>
                <div class="col-xs-6">
                    <label for="phone">Giới tính:   </label><span> {{$u->Sex}}</span><br>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="Nam" name="sex">Nam
                        </label>
                        </div>
                        <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="Nữ" name="sex">Nữ
                        </label>
                    </div>
                </div><br>
                <div class="col-xs-6">
                    <label for="mobile">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" value="{{$u->Phone}}" >
                </div>
                <div class="col-xs-6">
                    <label for="email">Ngày sinh</label>
                    <input type="text" class="form-control" value="{{$u->Birth}}">
                    <input type="date" class="form-control" name="date" value="{{$u->Birth}}">
                </div>
                <div class="col-xs-6">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" value="{{$u->Address}}">
                </div>
                <div class="col-xs-6">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password"  placeholder="password" title="enter your password.">
                </div>
                <div class="col-xs-6">
                <label for="password2">Repassword</label>
                    <input type="password" class="form-control" name="repass"  placeholder="password2" title="enter your password2.">
                </div>
                <div class="col-xs-12">
                    <br>
                    <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                    <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                </div>
               
            </form>
            <hr>
        </div>
        @endforeach
    </div>

@stop