<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Vật liệu xây dựng</title>
        <link href="{{asset('images/construction.png')}}" rel="shortcut icon" />
        <link href="{{asset('css/layout.style.css')}}" rel="stylesheet" >
        <script defer src="{{asset('js/javascrip.js')}}" rel="stylesheet"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    </head>
    <body>
        <div>
            <div class="head">
                <img src="{{asset('images/logo.jpg')}}" alt="logo-icon">
                <div>
                  <p>Hotline</p><br>
                  <p>xxxxxxxx</p>
                </div>  
                <div class="search" >
                  <form method="get" action="{{route('search')}}"> 
                      <div class="input-group mb-3">
                        <input id="myFind" name="search" type="text" class="form-control inputSeacrh" placeholder="Nhập sản phẩm cần tìm">
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                          </div>
                      </div>                    
                  </form>
                </div>                               
                <div class="cart">                
                  <a href="{{route('DetailCart')}}">
                    <button class="btn btn-danger">Giỏ Hàng <i class="fas fa-shopping-cart"></i>
                    @if(Session::has("Cart")!=null)
                    <span class="badge">{{Session::get('Cart')->totalQuanity}}</span>                    
                    @endif
                    </button>
                  </a>
                  @if(Session::has("Cart")!=null)
                  <div class="cart-body">
                    <div class="cart-item">
                    @foreach(Session::get("Cart")->products as $p)
                      <div class="media">
                        <a class="pull-left" href="#"><img src="{{asset('imgpro')}}/{{$p['prodInfo']->Image}}" width="50" height="50" alt=""/></a>
                        <div class="media-body">
                          <span class="cart-item-title">{{$p['prodInfo']->ProductName}}</span>
                          <span class="cart-item-amount">{{$p['quanity']}}*<span><?php echo number_format($p['prodInfo']->Price);?> VNĐ</span></span>
                        </div>
                      </div>
                    @endforeach
                    </div>
                    <div class="cart-caption">
                      <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value"><?php echo number_format(Session::get("Cart")->totalPrice);?> VNĐ</span></div>
                      <div class="clearfix"></div>

                      <div class="center">
                        <div class="space10">&nbsp;</div>
                        <a href="checkout.html" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                      </div>
                    </div>                    
                  </div>
                  @else
                  <div class="cart-body cart-null" >
                    <span>Chưa có sản phẩm trong giỏ</span>
                  </div>
                  @endif 
                  </div>
                </div>
            </div>            
            <div class="main">
              <div class="menu">
                <ul class="nav nav-tabs justify-content-center">
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">Trang chủ</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Danh mục sản phẩm</a>
                    <div class="dropdown-menu">
                      @foreach($category as $c)
                      <a class="dropdown-item" href="{{route('ListOfCate',['CategoryID'=>$c->CategoryID])}}">{{$c->CategoryName}}</a>                      
                      @endforeach                       
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('service')}}">Dịch vụ</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('news')}}">Tin tức</a>
                  </li>                  
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('contact')}}">Liên hệ</a>
                  </li>
                  
                  <li class="nav-item user-sy">
                    @if(Auth::check())
                    <a class="nav-link " href="{{route('Profile')}}"><i class="fas fa-user"></i></a>                     
                    <div class='user-pro'>
                      <div> <a href=""></i> </a> </div>
                      <div><a href="{{route('Profile')}}"><i class="fa fa-suitcase"></i> Profile</a>  </div>
                      <div> <a href="{{route('Logout')}}"><i class="fas fa-sign-out-alt"> Logout</i></a> </div>
                    </div>                    
                    @else    
                      <a class="nav-link " href="{{route('Login')}}"><i class="fas fa-user"></i></a>
                    @endif               
                  </li>
                  
                </ul>
              </div>  
            </div>
            @if(session('canhbao'))
              <div class="alert alert-success">
                {{session('canhbao')}}
              </div>
	          @endif
            <div class="bodymain">
              @yield('content')
            </div>
            <div class="footer">
              <div id="footer" class="color-div">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-3">
                      <div class="widget">
                        <h4 class="widget-title"></h4>
                        <div id="beta-instagram-feed">
                          <div></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="widget">
                        <h4 class="widget-title">Thông tin</h4>
                        <div>
                          <ul>
                            <li>
                              <a href="{{route('home')}}">
                                <i class="fa fa-chevron-right"></i> Trang chủ </a>
                            </li>
                            <li>
                              <a href="{{route('service')}}">
                                <i class="fa fa-chevron-right"></i> Dịch vụ </a>
                            </li>
                            <li>
                              <a href="{{route('news')}}">
                              <i class="fa fa-chevron-right"></i> Tin tức </a>
                            </li>
                            <li>
                            <a href="{{route('contact')}}">
                            <i class="fa fa-chevron-right"></i> Liên hệ </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="col-sm-10">
                        <div class="widget">
                          <h4 class="widget-title">Thông tin liên hệ</h4>
                          <div>
                            <div class="contact-info">
                              <i class="fa fa-map-marker"></i>
                              <p>371 Nguyen Kiem P3 Go Vap Tp Ho Chi Minh Phone: +78 123 456 78</p>
                              <p></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="widget">
                        <h4 class="widget-title">Newsletter Subscribe</h4>
                        <form action="#" >
                          <input type="email" name="your_email">
                          <button class="pull-right" type="submit">Subscribe <i class="fa fa-chevron-right"></i>
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>                
              </div>
              <div class="copyright">
                <div style="text-align:center" class="container">
                  <p class="pull-left">Copyright &copy; <?php echo date('Y') ;?> Web vật liệu xây dựng | Thiết kế bởi Trong Huu</p>
                  <p class="pull-right pay-options">
                    <a href="#">
                      <img src="{{asset('images/mastercard.jpg')}}" alt="" />
                    </a>
                    <a href="#">
                      <img src="{{asset('images/pay.png')}}" alt="" />
                    </a>
                    <a href="#">
                      <img src="{{asset('images/visa.png')}}" alt="" />
                    </a>
                    <a href="#">
                    <img src="{{asset('images/paypal.png')}}" alt="" />
                    </a>
                  </p>
              </div>
            <!-- .container -->
            </div>
          </div>            
      
          <div>
            <a onClick="topFunction()" id="onTop" title='Go to top' class='btn btn-primary' >
              <i class="fas fa-angle-double-up"></i>
            </a>
          </div>         

          <div class="icon-bar">
              <a target="_blank"  href="https://www.facebook.com" >
                      <img src="{{asset('images/social2.png')}}" alt="Facebook" title="Facebook" width="48" height="48">
                </a>
            
              <a target="_blank"  href="https://zalo.me/" >
                      <img src="{{asset('images/zalo.png')}}" width="48" height="48" alt="Zalo" title="Zalo">
                </a>
                
              <a target="_blank"  href="https://www.youtube.com" >
                <img src="{{asset('images/youtube.png')}}" width="48" height="48" alt="youtube" title="youtube">
              </a>
          
          </div>
    </body>
</html>