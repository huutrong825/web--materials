@extends('/Admin/adminpage')
@section('content')
    <h2 style="text-align:center;color:light-green">DANH MỤC LOẠI SẢN PHẨM</h2><br>
    <div style="align-items:right">
        <a href="{{route('AddCate')}}"><button type='button' class='btn btn-primary'>Thêm loại sản phẩm</button></a>
    </div><br>
    <div>
        <table class='table table-striped'>
            <tr>
                <th>Mã loại sản phẩm</th>
                <th>Tên loại</th>
                <th>Hình ảnh</th>
                <th>Tình trạng</th>                
                <th colspan='2'></th>
            </tr>
            @foreach($category as $c)
            <tr>
                <td>{{$c->CategoryID}}</td>
                <td>{{$c->CategoryName}}</td>                
                <td>
                    <img src="{{asset('imgcate')}}/{{$c->Image}}" alt="picture" width='50' height='50'>
                </td>
                <td>
                    @if($c->State=='1')                    
                        <p>Đang kinh doanh</p>                    
                    @else
                        <p>Đã dừng kinh doanh</p>                    }
                    @endif
                </td>
                <td>
                    <a href="{{route('DelCate',['CategoryID'=>$c->CategoryID])}}"><i class="fa fa-trash"></i></a>                    
                </td>
                <td><a href="{{route('Fixate',['CategoryID'=>$c->CategoryID])}}"><i class="fa fa-pencil"></i></a></td>
            </tr>
            @endforeach
        </table>
    </div>
{{$category->links()}}
@stop