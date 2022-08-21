@extends('/Admin/adminpage')
@section('content')
<h1 style="text-align:center;color:red">THÊM SẢN PHẨM MỚI</h1>
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
            <label for="productname">Tên sản phẩm</label>
            <input type="text" name="productname" id="productname" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="title">Mô tả sản phẩm</label>
            <textarea name="title" id="title" class="form-control" row='5'></textarea>
        </div>
        <div class="form-group">
            <label for="unit">Đơn vị tính</label>
            <input type="text" name="unit" id="unit" class="form-control" required>
        </div>        
        <div class="form-group">
            <label for="price">Giá sản phẩm</label>
            <input type="text" name="price" id="price" class="form-control">
        </div>
        <div class="form-group">
            <label for="quanity">Số lượng</label>
            <input type="text" name="quanity" id="quanity" class="form-control" >
        </div>
        <div class="form-group">
            <label for="fileUpload">Hình ảnh</label>
            <input type="file" name='fileUpload' id="fileUpload" class="form-control">
        </div>
        <div class="form-group">
            <label for="categories">Loại sản phẩm</label>
            <select id="categories" name="categories" class="form-control" required>
                @foreach ($category as $c)
                <option value="{{$c->CategoryID}}">{{$c->CategoryName}}</option>
                @endforeach
            </select>
        </div>        
        <div>
            <button type="submit" style="cursor:pointer" class="btn btn-primary">Thêm</button> 
            <button type="reset"  class="btn btn-success">Nhập lại</button>            
            <a href="{{route('prodlist')}}"><button type="button"  class="btn btn-danger">Hủy</button></a>            
        </div>
        
    </form>
</div>
@stop