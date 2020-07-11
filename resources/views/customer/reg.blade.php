@extends('customer.layout')
@section('content')
<div class="main">
    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <?php
                $mess = Session::get('mess');
                if($mess) {
                    echo '<h3 style="font-family: Times New Roman;text-align:center">'.$mess.'</h3>';
                    Session::put('mess', null);
                }
            ?>
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title" style="font-family: Times New Roman;">Đăng ký</h2>
                    <form action="{{URL::to('/add-acc')}}" method="POST" class="register-form" id="register-form"> {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input style="font-family: Times New Roman;" type="text" name="nameAcc" id="name" placeholder="Tên tài khoản"/>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input style="font-family: Times New Roman;" type="password" name="pass" id="pass" placeholder="Mật khẩu"/>
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input style="font-family: Times New Roman;" type="password" name="re_pass" id="re_pass" placeholder="Nhập lại mật khẩu"/>
                        </div>
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input style="font-family: Times New Roman;" type="text" name="name" id="name" placeholder="Họ tên"/>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input style="font-family: Times New Roman;" type="name" name="address" id="email" placeholder="Địa chỉ"/>
                        </div>
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input style="font-family: Times New Roman;" type="text" name="phone" id="name" placeholder="Số điện thoại"/>
                        </div>
                        <div class="form-group form-button">
                            <input style="font-family: 'Times New Roman', Times, serif; font-size: 18px" type="submit" name="signup" id="signup" class="form-submit" value="Đăng ký"/>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a style="font-family: 'Times New Roman', Times, serif; font-size: 18px" href="{{URL::to('/signin')}}">Đăng nhập</a>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="public/frontend/customer-login/images/signup-image.jpg" alt="sing up image"></figure>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
