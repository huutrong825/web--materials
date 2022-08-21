@extends('Admin/adminpage')
@section('content')
<div>
    <h1>TẠO BILL NHẬP LIỆU</h1>
</div>
<br>
<div>
    <form class='form-group' action="{{route('postinputImp')}}" method="post">
    @csrf
        <div class="form-group">
            <label for="Supp">Nhà cung cấp</label>
            <select id="supp" name="supp" class="form-control" required>
                <option value=""></option>
                @foreach ($supp as $s)
                <option value="{{$s->SupplierID}}">{{$s->CompanyName}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="user">Nhân viên</label>
            <input type="text" class='form-control' value='{{$user->name}}' disabled/>               
        </div>
        <br>
        <div>
            <input type="submit" class='btn btn-success' value='Tạo'/>
        </div>
    </form>
</div>
@stop