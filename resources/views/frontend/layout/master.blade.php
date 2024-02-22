<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Sports Store</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Free HTML Templates" name="keywords" />
    <meta content="Free HTML Templates" name="description" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assets/frontend/img/android-chrome-512x512"/>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="/assets/frontend/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/assets/frontend/css/style.css" rel="stylesheet" />
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="https://www.facebook.com/VUHUUHIEUhd">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="{{route('home')}}" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold">
                        <img src="{{asset('assets/frontend/img/logo-black.png')}}" alt="" height="40">
                    </h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="{{route('shop')}}" method="get">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Tìm kiếm sản phẩm" />
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="{{route('profile')}}" class="btn border">
                    <i class="fas fa-user text-primary"></i>
                </a>
                <a href="{{route('cart')}}" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">{{ $cartQty ?? 0 }}</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" 
                data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Danh mục</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" 
                id="navbar-vertical" style="width: calc(100% - 30px); z-index: 2;">
                    <div class="navbar-nav w-100 overflow-hidden" >
                        @foreach($categories as $category)
                            <a href="{{route('category', $category->id)}}" class="nav-item nav-link">{{$category->name}}</a>
                        @endforeach
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold">
                            <img src="{{asset('assets/frontend/img/logo-black.png')}}" alt="" height="40">
                        </h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{route('home')}}" class="nav-item nav-link {{ request()->segment(1) == '' ? 'active' : '' }}">Trang chủ</a>
                            <a href="{{route('shop')}}" class="nav-item nav-link {{ request()->segment(1) == 'shop' ? 'active' : '' }}">Shop</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle {{ request()->segment(1) == 'brand' ? 'active' : '' }}" data-toggle="dropdown">Thương hiệu</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    @foreach($brands as $brand)
                                    <a href="{{route('brand', $brand)}}" class="dropdown-item">{{$brand->name}}</a>
                                    @endforeach
                                </div>
                            </div>
                            <!-- <a href="{{route('contact')}}" class="nav-item nav-link {{ request()->segment(1) == 'contact' ? 'active' : '' }}">Contact</a>
                            <a href="{{route('blog')}}" class="nav-item nav-link {{ request()->segment(1) == 'blog' ? 'active' : '' }}">Blog</a>
                            <a href="{{route('order-history')}}" class="nav-item nav-link {{ request()->segment(1) == 'order-history' ? 'active' : '' }}">Order Placed</a> -->
                        </div>
                        @if(Auth::guard('web')->check())
                            <div class="d-flex align-items-center">
                                <img class="user-avatar-small border" src="{{ Auth::guard('web')->user()->avatar ?? '/assets/frontend/img/no-avatar.png'}}" alt="avatar">
                                <div class="text-dark ml-2 font-weight-semi-bold">{{Auth::guard('web')->user()->username}}
                                    <form style="margin-top: -5px" action="{{route('logout')}}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn p-0" style="font-size: 12px">Đăng xuất</button>
                                    </form>
                                </div>

                            </div>
                        @else
                            <div class="navbar-nav ml-auto py-0">
                                <a href="{{route('login')}}" class="nav-item nav-link">Đăng Nhập</a>
                                <a href="{{route('register')}}" class="nav-item nav-link">Đăng ký</a>
                            </div>
                        @endif
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    @yield('content')

    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold">
                        <img src="{{asset('assets/frontend/img/logo-black.png')}}" alt="" height="40">
                    </h1>
                </a>
                <p>
                Chào mừng bạn đến với thiên đường của những đôi giày - nơi mà phong cách và thoải mái hoàn hảo hòa quyện. Tại cửa hàng chúng tôi, chúng tôi không chỉ cung cấp những đôi giày xuất sắc về chất lượng và thiết kế, mà còn mang đến trải nghiệm mua sắm độc đáo, nơi mà sự đam mê về thời trang bắt đầu. Hãy để chúng tôi làm hài lòng đam mê của bạn và đồng hành cùng bạn trên hành trình khám phá phong cách cá nhân của mình
                </p>
                <p class="mb-2">
                    <i class="fa fa-map-marker-alt text-primary mr-3"></i>Kiều Mai, Bắc Từ Liêm, Hà Nội
                </p>
                <p class="mb-2">
                    <i class="fa fa-envelope text-primary mr-3"></i>vuhieu@gmail.com
                </p>
                <p class="mb-0">
                    <i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890
                </p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">
                            Quick Links
                        </h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Trang chủ</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Shop</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Chi tiết sản phẩm</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Giỏ hàng</a>
                            <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Thanh toán</a>
                            <a class="text-dark" href="{{route('contact')}}"><i class="fa fa-angle-right mr-2"></i>Liên hệ</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold  text-dark mb-4">
                            MAP
                        </h5>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7442.287159034886!2d105.96393172028868!3d21.146683614551797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135062f4e7264c3%3A0xb35b62d3d82ebab8!2zeMOzbSBU4buxLCBUYW0gU8ahbiwgVOG7qyBTxqFuLCBC4bqvYyBOaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1704806784462!5m2!1svi!2s" width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">
                            NEWS
                        </h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Your Name"
                                    required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">
                                    Đăng ký ngay
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy;
                    <a class="text-dark font-weight-semi-bold" href="#">Sports Store</a>. All Rights Reserved.
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="/assets/frontend/img/payments.png" alt="" />
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
     <!-- <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a> -->
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/frontend/lib/easing/easing.min.js"></script>
    <script src="/assets/frontend/lib/owlcarousel/owl.carousel.min.js"></script>
    <!-- Contact Javascript File -->
    <script src="/assets/frontend/mail/jqBootstrapValidation.min.js"></script>
    <script src="/assets/frontend/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="/assets/frontend/js/main.js"></script>
</body>

</html>