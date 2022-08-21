@extends('/Admin/adminpage')
@section('content')
    <h1 style="text-align:center;color:red">THÊM NGƯỜI QUẢN LÝ MỚI</h1>
    <div class="container-fluid">
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
    <form method="POST"  action="{{route('ThemUser')}}">
        @csrf
        <div class="form-group">
            <label for="fullname">Full Name</label>
            <input type="text" name="fullname" id="fullname" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="mail">Email</label>
            <input type="email" name='mail' id="mail" class="form-control">
        </div>   
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" require>
        </div>
        <div class="form-group">
            <label for="repass">RePassword</label>
            <input type="password" name="repass" id="repass" class="form-control" require>
        </div>              
        <div class="form-group">
            <label for="type">Type</label>
            <select id="type" name="type" class="form-control" required>                
                <option value="ADMIN">Admin - Quản trị viên</option>
                <option value="SUPER">Super - Quản lý</option>              
            </select>
        </div>        
        <div>
            <button type="submit" style="cursor:pointer" class="btn btn-primary">Thêm</button> 
            <button type="reset"  class="btn btn-success">Làm mới</button>            
            <a href="#"><button type="button"  class="btn btn-danger">Hủy</button></a>            
        </div>
        
    </form>
</div>
@stop