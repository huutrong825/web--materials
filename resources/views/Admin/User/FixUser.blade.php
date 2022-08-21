@extends('/Admin/adminpage')
@section('content')
    <h1 style="text-align:center;color:red">SỬA THÔNG TIN NGƯỜI DÙNG</h1>
<div class="container-fluid">
    <form method="POST"  action="{{route('SuaUser',['id'=>$user->id])}}">
        @csrf        
        <div class="form-group">
            <label for="fullname">Full Name</label>
            <input type="text" name="fullname" id="fullname" value="{{$user->name}}" class="form-control" >
        </div>
        <div class="form-group">
            <label for="mail">Email</label>
            <input type="email" name='mail' id="mail" value="{{$user->email}}" class="form-control" disabled>
        </div>
        <div class="form-group">
            <input type="checkbox" id="check" name="changePass">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control password" >
        </div>
        <div class="form-group">
            <label for="repass">RePassword</label>
            <input type="password" name="repass" id="repass" class="form-control password" >
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" name='type' id="" value="{{$user->Type}}" readonly="" class="form-control">  
        </div>    
        <div>
            <button type="submit" style="cursor:pointer" class="btn btn-primary">Lưu</button> 
            <button type="reset"  class="btn btn-success">Làm mới</button>            
            <a href="{{route('userlist')}}"><button type="button"  class="btn btn-danger">Hủy</button></a>            
        </div>
        
    </form>
</div>
@stop


@push('script')
    <script>
        $(document).getElementById("check").onClick=function(e){
            if($this.checked){
                $(document).getElementsByClassName('password').removeAt('disabled');
            }
            else{
                $(document).getElementsByClassName('password').attr('disabled','');
            }
        }        
    </script>
@endpush