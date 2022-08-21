@extends('/Page/layout')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('home')}}">Home</a> / <span>Chi tiết sản phẩm</span>/<span>{{$product->ProductName}}</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="product">
    <div class="contain">
        <div class="left">
            <img src="{{asset('imgpro')}}/{{$product->Image}}"  alt="picture" /> 
            <div class="minileft">
                <div><img src="" onClick="doianh(this)" /></div>
                <div><img src="../images/galaxys8/Black_2.jpg" onClick="doianh(this)" /></div>
                <div><img src="../images/galaxys8/Black_3.jpg" onClick="doianh(this)" /></div>
                <div><img src="../images/galaxys8/Black_4.jpg" onClick="doianh(this)" /></div>
                <div><img src="../images/galaxys8/Black_5.jpg" onClick="doianh(this)" /></div>
            </div>           
        </div>
        <div class="right">
            <h2>{{$product->ProductName}}</h2>
            <h2 class="red"><?php echo number_format("$product->Price"); ?> VNĐ</h2>
            <h6>Kho: {{$product->Quanity}}</h6>
            <h6>Đơn vị tính: {{$product->Unit}}</h6>
            <div>
            <button onClick="AddCart($product->ProductID)" class="btn btn-outline-success" >
                <a id="add-cart" href="{{route('AddCart',['ProductID'=>$product->ProductID])}}"><i class="fas fa-shopping-cart"></i>
                <span>Thêm vào giỏ hàng</span>
                </a>
            </button>  
            </div>           
        </div>
    </div>
</div>

<div class="container mt-3">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Mô tả</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">Đánh giá</a>
    </li> 
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      <h5>Mô tả chi tiết</h5>
      <p>{{$product->Title}}</p>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
      <h3>Menu 1</h3>
      <p></p>
    </div>
  </div>
</div>

@stop