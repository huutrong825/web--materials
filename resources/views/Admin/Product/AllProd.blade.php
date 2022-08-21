@extends('Admin/adminpage')
@section('content')

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
{{$product->links()}}
@stop