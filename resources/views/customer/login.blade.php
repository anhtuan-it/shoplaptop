@extends('customer.layout')
@section('content')
<div class="main">
    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <?php
                $mess = Session::get('mess');
                if($mess) {
                    echo '<h3 style="font-family: Times New Roman;text-align:center">'.$mess.'</h3>';
                    Session::put('mess', null);
                }
            ?>
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="public/frontend/customer-login/images/signin-image.jpg" alt="sing up image"></figure>
                    <a href="{{URL::to('/signup')}}" style="font-family: Times New Roman; font-size: 18px" class="signup-image-link">Đăng ký tài khoản</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title" style="font-family: Times New Roman;">Đăng nhập</h2>
                    <form action="{{URL::to('/login')}}" method="POST" class="register-form" id="login-form"> {{ csrf_field() }}
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input style="font-family: Times New Roman;" type="text" name="your_name" id="your_name" placeholder="Tên tài khoản"/>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input style="font-family: Times New Roman;" type="password" name="your_pass" id="your_pass" placeholder="Mật khẩu"/>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" style="font-family: Times New Roman;" name="signin" id="signin" class="form-submit" value="Đăng nhập"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
