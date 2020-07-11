
<!DOCTYPE html>
<head>
<title>Trang Quản Lý</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<style type="text/css">
    .sub li a{
    background:#626262
    }
</style>
{{-- datatable bootstrap4 --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/backend/dashboard/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/backend/dashboard/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/backend/dashboard/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/backend/dashboard/css/font-awesome.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('public/backend/dashboard/css/morris.css')}}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('public/backend/dashboard/css/monthly.css')}}">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset('public/backend/dashboard/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('public/backend/dashboard/js/raphael-min.js')}}"></script>
<script src="{{asset('public/backend/dashboard/js/morris.js')}}"></script>
</head>
<body >
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix" style="background: #626262">
<!--logo start-->
<div class="brand" style="background: #626262">
    <a href="index.html" class="logo">
        ADMIN
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
{{-- logo end! --}}
<div class="top-nav clearfix" >
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{asset('public/backend/dashboard/images/admin.png')}}">
                <span class="username">
                    <?php
                    $name = Session::get('admin_name');
                    if($name){
                        echo $name;// neu name ton tai thi in ra
                    }
                ?>
                </span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="{{URL::to('/admin-manager')}}"><i class="fa fa-key"></i> Quản lý Admin</a></li>
                <li><a href="{{URL::to('/logout')}}"><i class="fa fa-key"></i> Đăng Xuất</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div style="background:#626262" id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation"style="background:#626262">
            <ul class="sidebar-menu" id="nav-accordion">
                <li >
                    <a class="active" href="{{URL::to('/dashboard')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng Quan</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh mục sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-category-product')}}">Thêm danh mục sản phẩm</a></li>
                        <li><a href="{{URL::to('/all-category-product')}}">Liệt kê danh mục sản phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Sản phẩm</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/add-product')}}">Thêm sản phẩm</a></li>
                        <li><a href="{{URL::to('/all-product')}}">Liệt kê sản phẩm</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Khách hàng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/all-customer')}}">Liệt kê thông tin khách hàng</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản lý đơn đặt hàng</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/order-manager')}}">Đơn hàng đang chờ xử lý</a></li>
                        <li><a href="{{URL::to('/order-manager-verified')}}">Đơn hàng đang vận chuyển</a></li>
                        <li><a href="{{URL::to('/order-manager-successfully')}}">Đơn hàng đã giao</a></li>
                        <li><a href="{{URL::to('/order-manager-callback')}}">Đơn hàng đã thu hồi</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Thống kê</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('hang-con')}}">Hàng còn</a></li>
                        <li><a href="{{URL::to('hang-het')}}">Hàng hết</a></li>
                        <li><a href="{{URL::to('hang-da-ban')}}">Đơn hàng đã bán</a></li>
                        <li><a href="{{URL::to('doanh-thu')}}">Doanh thu</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper" style="background: #626262">
        @yield('admin_content')  {{-- // goi ra tu dashboard.blade.php --}}
    </section>
<!-- footer -->
        <div class="footer" style="background: #626262">
            <div class="wthree-copyright">
            <p>Được phát triển bởi Sinh viên K18 trường Đại học CNTT & Truyền thông Việt - Hàn</p>
            </div>
        </div>
<!-- / footer -->
</section>

<script src="{{asset('public/backend/dashboard/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/dashboard/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/dashboard/js/scripts.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('public/backend/dashboard/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/dashboard/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('public/backend/dashboard/js/jquery.scrollTo.js')}}"></script>
</body>
</html>
