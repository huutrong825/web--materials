@extends('/Admin/adminpage')
@section('content')
<h1 style="text-align:center;color:red">THÊM NHÀ CUNG ỨNG MỚI</h1>
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
    <form method="POST"  action="{{route('ThemSupp')}}">
        @csrf
        <div class="form-group">
            <label for="suppid">Mã nhà cung ứng</label>
            <input type="text" name="suppid" id="suppid" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="name">Tên nhà cung ứng</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>        
        <div class="form-group">
            <label for="address">Địa chỉ</label>
            <input type="text" name="address" id="addess" class="form-control">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" >
        </div>                      
        <div>
            <button type="submit" style="cursor:pointer" class="btn btn-primary">Thêm</button> 
            <button type="reset"  class="btn btn-success">Nhập lại</button>            
            <a href="{{route('supplist')}}"><button type="button"  class="btn btn-danger">Hủy</button></a>            
        </div>
        
    </form>
</div>
@stop