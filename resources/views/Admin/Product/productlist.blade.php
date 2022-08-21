@extends('/Admin/adminpage')
@section('content')

    <h2 style="text-align:center;color:light-green">DANH MỤC SẢN PHẨM</h2>
    <br>
    <div style="align-items:right">
        <a href="{{route('prodadd')}}"><button type='button' class='btn btn-primary'>Thêm sản phẩm</button></a>
    </div><br>
    <div>
        <table class='table table-striped'>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th>Đơn vị tính</th>
                <th>Số lượng</th>
                <th>Loại sản phẩm</th>
                <th>Hình ảnh</th>
                <th colspan='2'>Thao tác</th>
            </tr>
            @foreach($product as $p)
            <tr>
                <td>{{$p->ProductID}}</td>
                <td>{{$p->ProductName}}</td>
                <td>{{$p->Price}}</td>
                <td>{{$p->Unit}}</td>
                <td>{{$p->Quanity}}</td>
                <td>{{$p->Category->CategoryName}}</td>
                <td>
                    <img src="{{asset('imgpro')}}/{{$p->Image}}" alt="picture" width='50' height='50'>
                </td>
                <td>
                    <a href="{{route('DelProd',['ProductID'=>$p->ProductID])}}"><i class="fa fa-trash" title="Xóa"></i></a>                    
                </td>
                <td><a href="{{route('ProdFix',['ProductID'=>$p->ProductID])}}"><i class="fa fa-pencil" title="Sửa"></i></a></td>
            </tr>
            @endforeach
        </table>
    </div>
    {{$product->links()}}
@stop