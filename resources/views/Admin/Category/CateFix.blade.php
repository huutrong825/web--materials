@extends('/Admin/adminpage')
@section('content')
<h1 style="text-align:center;color:red">SỬA LOẠI SẢN PHẨM</h1>
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
    <form method="POST" enctype="multipart/form-data" action="{{route('FixCate',['CategoryID'=>$c->CategoryID])}}">
        @csrf
        <div class="form-group">
            <label for="catename">Tên loại sản phẩm</label>
            <input type="text" name="catename" id="catename" class="form-control" value="{{$c->CategoryName}}">
        </div>        
        <div class="form-group">
            <label for="fileUpload">Hình ảnh</label>
            <div>
                <span><img style="float:left"src="{{asset('imgcate')}}/{{$c->Image}}" alt='' width='50' height='50'>
                <input type="file" name='fileUpload' id="fileUpload"  class="form-control"></span>
            </div>
        </div>
        <div class="form-group">
            <label for="quanity">Tình trạng</label>
            <input type="text" name="quanity" id="quanity"  value="{{$c->State}}"class="form-control" required>
        </div>
        <div>
            <button type="submit" style="cursor:pointer" class="btn btn-primary">Lưu thay đổi</button> 
            <button type="reset"  class="btn btn-success">Nhập lại</button>            
            <a href="{{route('catelist')}}"><button type="button"  class="btn btn-danger">Hủy</button></a>            
        </div>
        
        
    </form>
</div>
@stop