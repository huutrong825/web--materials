@extends('/Admin/adminpage')
@section('content')

    <h2 style="text-align:center;color:light-green">DANH SÁCH NHÀ CUNG ỨNG</h2>
    <div style="align-items:right">
        <a href="{{route('ThemSupp')}}"><button type='button' class='btn btn-primary'>Thêm nhà cung ứng</button></a>
    </div>
    <div>
        <table class='table table-striped'>
            <tr>
                <th>Mã nhà cung ứng</th>
                <th>Tên nhà cung ứng</th>
                <th>Địa chỉ</th>
                <th>Phone</th>
                <th colspan='2'></th>
            </tr>
            @foreach($supp as $s)
            <tr>
                <td>{{$s->SupplierID}}</td>
                <td>{{$s->CompanyName}}</td>
                <td>{{$s->Address}}</td>
                <td>{{$s->Phone}}</td>                
                <td>
                    <a href="{{route('DelSupp',['SupplierID'=>$s->SupplierID])}}"><i class="fa fa-trash"></i></a>                    
                </td>
                <td><a href="{{route('SuppFix',['SupplierID'=>$s->SupplierID])}}"><i class="fa fa-pencil"></i></a></td>
            </tr>
            @endforeach
        </table>
    </div>

@stop