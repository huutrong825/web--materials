@extends('Admin/adminpage')
@section('content')
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
<div>
    <h3>Nhập hàng hóa</h3>
</div>
<div>
   
    <form class='form-group' action="{{route('ProdImp')}}" method="post">
        @csrf
        <div>
            <label>Tên nhân viên</label>
            <input type="text" class="form-control" name=""  value='{{$user->name}}'/>
        </div>
        @foreach($billnew as $b)
        <div>
            <label>Mã bill nhập hàng</label>
            <input type="text" class="form-control" name="id" value="{{$b->id}}" />
        </div>
        <div>
            <label>Tên nhà cung cấp</label>
            <input type="text" class="form-control" name="" value="{{$b->CompanyName}}" />
        </div>
        <div>
            <label>Ngày nhập hàng</label>
            <input type="text" class="form-control" name="" value="{{$b->Date}}" />
        </div>
        @endforeach
        <div class="form-group">
            <label>Sản phẩm
            <select id="prod" name="prod" class="form-control" required>
                @foreach ($product as $p)
                <option value="{{$p->ProductID}}">{{$p->ProductName}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Đơn vị tính</label>
            <input type="text" class="form-control" name="unit" />
        </div>
        <div>
            <label>Số lượng</label>
            <input type="text" class="form-control" name="qty" />
        </div>
        <div>
            <label>Đơn giá nhập</label>
            <input type="text" class="form-control" name="unit_price" />
        </div>
        <br>
        <div>
            <input type='submit' class='btn btn-success' value='Nhập'/>
        </div>
    </form>
</div>
@stop      