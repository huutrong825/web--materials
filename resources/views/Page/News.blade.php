@extends('/Page/layout')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('home')}}">Home</a> / <span>Tin tức</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class='bodynews'>
  <div class='content'>
    <!-- begin post -->
        <div class="post">
            <div class="thumb"><a href="#"><img src="{{asset('images')}}/_thumb1.jpg" alt="" /></a></div>
            <h2><a href="#">A cras tincidunt, ut tellus et Gravida Ipsum</a></h2>
            <p class="date">Posted on January 7, 2008 by admin</p>
            <p>Elementum ea, nibh et, velit sed sagittis. Ipsum libero. Viverra integer enim, sed dolor. Inceptos elit, vitae et. Eget eget nec, lectus nisl, vehicula est feugiat. </p>
            
        </div>
        <!-- end post -->
        <!-- begin post -->
        <div class="post">
            <div class="thumb"><a href="#"><img src="{{asset('images')}}/_thumb2.jpg" alt="" /></a></div>
            <h2><a href="#">A cras tincidunt, ut tellus et Gravida Ipsum</a></h2>
            <p class="date">Posted on January 7, 2008 by admin</p>
            <p>Elementum ea, nibh et, velit sed sagittis. Ipsum libero. Viverra integer enim, sed dolor. Inceptos elit, vitae et. Eget eget nec, lectus nisl, vehicula est feugiat. </p>
            
        </div>
        <!-- end post -->
        <!-- begin post -->
        <div class="post">
            <div class="thumb"><a href="#"><img src="{{asset('images')}}/_thumb1.jpg" alt="" /></a></div>
            <h2><a href="#">A cras tincidunt, ut tellus et Gravida Ipsum</a></h2>
            <p class="date">Posted on January 7, 2008 by admin</p>
            <p>Elementum ea, nibh et, velit sed sagittis. Ipsum libero. Viverra integer enim, sed dolor. Inceptos elit, vitae et. Eget eget nec, lectus nisl, vehicula est feugiat. </p>
            
        </div>
        <div class="post">
            <div class="thumb"><a href="#"><img src="{{asset('images')}}/_thumb2.jpg" alt="" /></a></div>
            <h2><a href="#">A cras tincidunt, ut tellus et Gravida Ipsum</a></h2>
            <p class="date">Posted on January 7, 2008 by admin</p>
            <p>Elementum ea, nibh et, velit sed sagittis. Ipsum libero. Viverra integer enim, sed dolor. Inceptos elit, vitae et. Eget eget nec, lectus nisl, vehicula est feugiat. </p>
            
        </div>
        <div class="post">
            <div class="thumb"><a href="#"><img src="{{asset('images')}}/_thumb1.jpg" alt="" /></a></div>
            <h2><a href="#">A cras tincidunt, ut tellus et Gravida Ipsum</a></h2>
            <p class="date">Posted on January 7, 2008 by admin</p>
            <p>Elementum ea, nibh et, velit sed sagittis. Ipsum libero. Viverra integer enim, sed dolor. Inceptos elit, vitae et. Eget eget nec, lectus nisl, vehicula est feugiat. </p>
            
        </div>
        <div class="post">
            <div class="thumb"><a href="#"><img src="{{asset('images')}}/_thumb2.jpg" alt="" /></a></div>
            <h2><a href="#">A cras tincidunt, ut tellus et Gravida Ipsum</a></h2>
            <p class="date">Posted on January 7, 2008 by admin</p>
            <p>Elementum ea, nibh et, velit sed sagittis. Ipsum libero. Viverra integer enim, sed dolor. Inceptos elit, vitae et. Eget eget nec, lectus nisl, vehicula est feugiat. </p>
            
        </div>
        
        <div class="post">
            <div class="thumb"><a href="#"><img src="{{asset('images')}}/_thumb1.jpg" alt="" /></a></div>
            <h2><a href="#">A cras tincidunt, ut tellus et Gravida Ipsum</a></h2>
            <p class="date">Posted on January 7, 2008 by admin</p>
            <p>Elementum ea, nibh et, velit sed sagittis. Ipsum libero. Viverra integer enim, sed dolor. Inceptos elit, vitae et. Eget eget nec, lectus nisl, vehicula est feugiat. </p>
            
        </div>   
        <div class="post">
            <div class="thumb"><a href="#"><img src="{{asset('images')}}/_thumb2.jpg" alt="" /></a></div>
            <h2><a href="#">A cras tincidunt, ut tellus et Gravida Ipsum</a></h2>
            <p class="date">Posted on January 7, 2008 by admin</p>
            <p>Elementum ea, nibh et, velit sed sagittis. Ipsum libero. Viverra integer enim, sed dolor. Inceptos elit, vitae et. Eget eget nec, lectus nisl, vehicula est feugiat. </p>
             
        </div>
    </div>
    <!-- end post -->
    
    <div id="sidebar">
    <!-- begin ads -->
    <div class="ads"> <a href="#"><img src="{{asset('images')}}/ad125x125.jpg" alt="" /></a> <a href="#"><img src="{{asset('images')}}/ad125x125.jpg" alt="" /></a> <a href="#"><img src="{{asset('images')}}/ad125x125.jpg" alt="" /></a> <a href="#"><img src="{{asset('images')}}/ad125x125.jpg" alt="" /></a> </div>
    <!-- end ads -->
    
    <div class="wrapper">
      <!-- begin popular posts -->
      <h2>Popular Posts</h2>
      <ul>
        <li><a href="#">Make Money Online Creating Websites</a></li>
        <li><a href="#">Top 100 Internet Marketing Tips</a></li>
        <li><a href="#">Tutorial: How to add Videos in your Post</a></li>
        <li><a href="#">Sample Post Unordered List</a></li>
        <li><a href="#">Sample Post Blockquote</a></li>
      </ul>
      <!-- end popular posts -->
      <!-- begin flickr photos -->
      <h2>Flickr Photos</h2>
      <div class="flickr"> <a href="#"><img src="{{asset('images')}}/_thumb3.jpg" alt="" /></a> <a href="#"><img src="{{asset('images')}}/_thumb4.jpg" alt="" /></a> <a href="#"><img src="{{asset('images')}}/_thumb5.jpg" alt="" /></a> <a href="#"><img src="{{asset('images')}}/_thumb6.jpg" alt="" /></a> <a href="#"><img src="{{asset('images')}}/_thumb7.jpg" alt="" /></a> <a href="#"><img src="{{asset('images')}}/_thumb8.jpg" alt="" /></a> </div>
      <!-- end flickr photos -->
      <!-- begin featured video -->
      <h2>Featured Video</h2>
      <div class="video"> <img src="{{asset('images')}}/_video.jpg" alt="" /> </div>
      <!-- end featured video -->
      
    </div>
</div>

@stop