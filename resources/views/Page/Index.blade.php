@extends('/Page/layout')
@section('content')
<div>                
    <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/a1.jpg" alt="pic 1">
            </div>
            <div class="carousel-item">
                <img src="images/a2.jpg" alt="pic 2">
            </div>
            <div class="carousel-item">
                <img src="images/a3.jpg" alt="pic 3">
            </div>
            <div class="carousel-item">
                <img src="images/a4.jpg" alt="pic 4">
            </div>
            <div class="carousel-item">
                <img src="images/a5.jpg" alt="pic 5">
            </div>
        </div>

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
            <li data-target="#demo" data-slide-to="3"></li>
            <li data-target="#demo" data-slide-to="4"></li>
        </ul>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
        </a>  
    </div>             
</div>




<br><br>

<div class="cate">
    <h2>DANH MỤC</h2>       
    <div class="container-fluid">
        <div class="row">            
            <ul class='mycate'>
            @foreach ($category as $c)
                <li>
                    <div class="col-md-2">                
                        <a href="{{route('ListOfCate',['CategoryID'=>$c->CategoryID])}}"><img src="imgcate/{{$c->Image}}" ></a>
                        <p>{{$c->CategoryName}}</p>
                    </div>
                    @continue
                    <div class="col-md-2">                
                        <a href="{{route('ListOfCate',['CategoryID'=>$c->CategoryID])}}"><img src="imgcate/{{$c->Image}}" ></a>
                        <p>{{$c->CategoryName}}</p>
                    </div>
                </li>
                @endforeach
            </ul>            
            
        </div>
    </div>
</div> 






<div class="container">
    <div class="row">
        @foreach($product as $p)
            <div class="col-sm-3 ">
                <div class="single-item rectprod ">
                    <div class="single-item-header">
                        <img src="{{asset('imgpro')}}/{{$p->Image}}" alt="">
                    </div>
                    <div id="text" class="single-item-body" style="text-align:center">
                        <p class="single-item-title">{{$p->ProductName}}</p>
                    </div>
                    <div  class="single-item-caption" style="text-align:center">
                        <a class="beta-btn primary" href="{{route('DetailProd',['ProductID'=>$p->ProductID])}}">Chi tiết </a>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


@stop