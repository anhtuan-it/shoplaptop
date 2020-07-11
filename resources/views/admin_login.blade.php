
<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Trang Quản Lý Admin Web</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Online Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="{{asset('public/backend/css/style.css')}}" type="text/css" media="all" /> <!-- Style-CSS -->
<link rel="stylesheet" href="{{asset('public/backend/css/font-awesome.css')}}"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->
<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">
<!-- //online-fonts -->
</head>
<body>
<!-- main -->
<div class="center-container">
	<!--header-->
	<div class="header-w3l">
		<h1>Đăng Nhập</h1>
	</div>
	<!--//header-->\
	<p style="color: red">
	<?php
		$message = Session::get('message');
		if($message){
			echo $message;
			Session::put('message',null);// chi cho phep in ra 1 lan
		}
	?>
</p>
	<div class="main-content-agile">
		<div class="sub-main-w3">
			<form action="{{URL::to('/admin-dashboard')}}" method="post">   {{-- gui den admin-dashboard, dang nhap xong se vo admin dashboard --}}
				{{csrf_field()}}  {{--  giup bao mat hon --}}
				<div class="pom-agile">
					<input placeholder="Email" name="admin_email" class="user" type="email" required="">
				</div>
				<div class="pom-agile">
					<input  placeholder="Mật khẩu" name="admin_password" class="pass" type="password" required="">
				</div>
				<div class="sub-w3l">
					<div class="right-w3l">
						<input type="submit" value="Đăng Nhập" name="Login">
					</div>
				</div>
			</form>
		</div>
	</div>
	<!--//main-->
	<!--footer-->
	<div class="footer">

	</div>
	<!--//footer-->
</div>
</body>
</html>
