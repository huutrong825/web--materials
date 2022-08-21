@extends('/Admin/adminpage')
@section('content')
<h1 style="text-align:center;color:red">THÊM LOẠI SẢN PHẨM MỚI</h1>
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
    <form method="POST" enctype="multipart/form-data" action="{{route('insert')}}">
        @csrf
        <div class="form-group">
            <label for="productname">Tên loại sản phẩm</label>
            <input type="text" name="catename" id="productname" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fileUpload">Hình ảnh</label>
            <input type="file" name='fileUpload' id="fileUpload" class="form-control">
        </div>  
        <div class="form-group">
            <label for="quanity">Trạng thái</label>  
            <div class="form-check-inline">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" value="1"> Đang kinh doanh
                </label>
                <t>
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" value="0"> Dừng kinh doanh
                </label>
            </div>       
        </div>   
        <div>
            <button type="submit" style="cursor:pointer" class="btn btn-primary">Thêm</button> 
            <button type="reset"  class="btn btn-success">Nhập lại</button>            
            <a href="{{route('catelist')}}"><button type="button"  class="btn btn-danger">Hủy</button></a>            
        </div>
        
    </form>
</div>
@stop