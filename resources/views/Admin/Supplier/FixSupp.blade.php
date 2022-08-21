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
    <form method="POST"  action="{{route('SuppFix',['SupplierID'=>$supp->SupplierID])}}">
        @csrf
        <div class="form-group">
            <label for="suppisd">Mã nhà cung ứng</label>
            <input type="text" name="suppid" id="suppid" value="{{$supp->SupplierID}}" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label for="name">Tên nhà cung ứng</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$supp->CompanyName}}" disabled>
        </div>        
        <div class="form-group">
            <label for="address">Địa chỉ</label>
            <input type="text" name="address" id="addess"  value="{{$supp->Address}}"class="form-control">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" value="{{$supp->Phone}}" class="form-control" >
        </div>                      
        <div>
            <button type="submit" style="cursor:pointer" class="btn btn-primary">Lưu thay đổi</button> 
            <button type="reset"  class="btn btn-success">Nhập lại</button>            
            <a href="{{route('supplist')}}"><button type="button"  class="btn btn-danger">Hủy</button></a>            
        </div>
        
    </form>
</div>
@stop