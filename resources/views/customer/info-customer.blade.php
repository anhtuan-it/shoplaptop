@extends('customer.layout-info-customer')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs" style="text-align: center">
            <ol class="breadcrumb">
                <li class="active">
                    <h5>
                        <?php
                            $mess = Session::get('mess');
                            if($mess) {
                                echo "<font color='red'>".$mess."</font>";
                                Session::put('mess', null);
                            }
                        ?>
                    </h5>
                </li><br>
                <li class="active"><h3>THÔNG TIN TÀI KHOẢN CỦA BẠN</h3></li>
            </ol>
        </div>
        <div class="table-responsive cart_info" style="width: 100%">
            <table style="width: 100%;" class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="" style="text-align: center">Tên tài khoản</td>
                        <td class="" style="text-align: center;width: 250px">Họ tên</td>
                        <td class="" style="text-align: center">SĐT</td>
                        <td class="" style="text-align: center">Địa chỉ</td>
                        <td style="text-align: center">Chức năng</a></td>
                        <td style="text-align: center"><a href="{{URL::to('/customer')}}">Quay lại</a></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Product as $item)
                    <tr>
                        <form action="{{URL::to('/update-customer')}}" method="POST"> {{ csrf_field() }}
                            <td class="" style="text-align: center">
                                <input type="text" name="name" placeholder="" style="" value="{{$item->customer_account}}" disabled>
                            </td>
                            <td class="" style="text-align: center">
                                <input type="text" name="name" placeholder="" style="" value="{{$item->customer_name}}">
                            </td>
                            <td class="" style="text-align: center">
                                <input type="text" name="phone" placeholder="" value="{{$item->customer_phone}}">
                            </td>
                            <td class="" style="text-align: center">
                                <input type="text" name="address" placeholder="" style="width: 400px;" value="{{$item->customer_address}}">
                            </td>
                            <td>
                                <button class="btn btn-default check_out" type="submit" name="verify">Xác nhận</button>
                            </td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="container">
        <div class="table-responsive cart_info">
            <table style="width: 100%;" class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="" style="text-align: center">Mật khẩu cũ</td>
                        <td class="" style="text-align: center">Mật khẩu mới</td>
                        <td class="" style="text-align: center">Nhập lại mật khẩu mới</td>
                        <td style="text-align: center">Chức năng</a></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Product as $item)
                    <tr>
                        <form action="{{URL::to('/update-customer')}}" method="POST"> {{ csrf_field() }}
                            <td class="" style="text-align: center">
                                <input type="text" name="old_pass" placeholder="Mật khẩu cũ" style="" value="">
                            </td>
                            <td class="" style="text-align: center">
                                <input type="text" name="new_pass" placeholder="Mật khẩu mới" style="" value="">
                            </td>
                            <td class="" style="text-align: center">
                                <input type="text" name="re_new_pass" placeholder="Nhập lại mật khẩu mới" style="" value="">
                            </td>
                            <td>
                                <button class="btn btn-default check_out" type="submit" name="verify">Xác nhận</button>
                            </td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
