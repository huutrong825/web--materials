@extends('/Page/layout')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('home')}}">Home</a> / <span>Dịch vụ</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class='bodynews'>
  <div class='service'>
    <!-- begin post -->
        <div class="post">
            <div class="thumb"><a href="#"><img src="{{asset('images')}}/_thumb1.jpg" alt="" /></a></div>
            <h2><a href="#"> Thiết kế nhà phố</a></h2>
            <p class="date"></p>
            <p></p>
            
        </div>
        <!-- end post -->
        <!-- begin post -->
        <div class="post">
            <div class="thumb"><a href="#"><img src="{{asset('images')}}/_thumb2.jpg" alt="" /></a></div>
            <h2><a href="#">Dịch vụ sơn nhà giá rẻ</a></h2>
            <p class="date"></p>
            <p></p>
            
        </div>
        <!-- end post -->
        <!-- begin post -->
        <div class="post">
            <div class="thumb"><a href="#"><img src="{{asset('images')}}/_thumb1.jpg" alt="" /></a></div>
            <h2><a href="#">Dịch vụ sửa chữa nhà trọn gói giá rẻ</a></h2>
            <p class="date"></p>
            <p></p>
            
        </div>
        <div class="post">
            <div class="thumb"><a href="#"><img src="{{asset('images')}}/_thumb2.jpg" alt="" /></a></div>
            <h2><a href="#">Dịch vụ chuyển nhà trọn gói</a></h2>
            <p class="date"></p>
            <p></p>
            
        </div>
        <div class="post">
            <div class="thumb"><a href="#"><img src="{{asset('images')}}/_thumb1.jpg" alt="" /></a></div>
            <h2><a href="#">Dịch vụ cải tạo, sửa chữa nhà cũ trọn gói</a></h2>
            <p class="date"></p>
            <p></p>
            
        </div>
        <div class="post">
            <div class="thumb"><a href="#"><img src="{{asset('images')}}/_thumb2.jpg" alt="" /></a></div>
            <h2><a href="#">Dịch vụ vệ sinh công nghiệp, vệ sinh nhà ở</a></h2>
            <p class="date"></p>
            <p></p>
            
        </div>
        
        <div class="post">
            <div class="thumb"><a href="#"><img src="{{asset('images')}}/_thumb1.jpg" alt="" /></a></div>
            <h2><a href="#">A cras tincidunt, ut tellus et Gravida Ipsum</a></h2>
            <p class="date"></p>
            <p></p>
            
        </div>   
        <div class="post">
            <div class="thumb"><a href="#"><img src="{{asset('images')}}/_thumb2.jpg" alt="" /></a></div>
            <h2><a href="#">A cras tincidunt, ut tellus et Gravida Ipsum</a></h2>
            <p class="date"></p>
            <p></p>
             
        </div>
    </div>   
</div>
@stop