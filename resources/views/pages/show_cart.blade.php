@extends('layout-cart')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs" style="text-align: center">
            <ol class="breadcrumb">
            <li class="active"><h3>GIỎ HÀNG CỦA BẠN</h3></li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <?php
                $Product = Cart::content();//lay tat ca nhung gi da them vao gio hang
                if(Cart::subtotal(null, null, '') == 0) {
                    // an table san pham da them
                    echo "<h5 style = 'text-align: center;'><font color = 'red'>Bạn chưa có sản phẩm nào trong giỏ hàng!</font></h5>";
                } else {
            ?>
                <table style="width: 100%;" class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td style="text-align: center; width: 50px;">Hình ảnh</td>
                            <td style="text-align: center; width: 400px;">Tên sản phẩm</td>
                            <td style="text-align: center">Đơn giá</td>
                            <td style="text-align: center; width: 50px;">Số lượng</td>
                            <td style="text-align: center">Tổng tiền</td>
                            <td style="text-align: center">Chức năng</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Product as $v_content)
                        <tr>
                            <td style="text-align: center; vertical-align: bottom">
                                <img src="{{URL::to('public/backend/img_admin/'.$v_content->options->image)}}" width="70" alt="" />
                            </td>
                            <td style="text-align: center; vertical-align: bottom">
                                <a href="{{URL::to('/detail_product')}}/{{$v_content->id}}" style="font-size: 14px;">{{$v_content->name}}</a>
                            </td>
                            <td style="text-align: center; vertical-align: bottom">
                                <font style="font-size: 14px;">{{number_format($v_content->price).''.'vnđ'}}</font>
                            </td>
                            <td style="text-align: center; vertical-align: bottom">
                                <div>
                                    <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
                                    {{ csrf_field() }}
                                        <input style="width: 80px; height: 30px" class="cart_quantity_input" type="number" name="cart_quantity" value="{{$v_content->qty}}"  >
                                        <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
                                        <input style="width: 80px; height: 30px; font-size: 14px;" type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
                                    </form>
                                </div>
                            </td>
                            <td style="text-align: center; vertical-align: bottom">
                                <font style="font-size: 14px" class="cart_total_price">
                                    <?php
                                    $subtotal = $v_content->price * $v_content->qty;
                                    echo number_format($subtotal).' '.'VND';
                                    ?>
                                </font>
                            </td>
                            <td style="text-align: center; vertical-align: bottom">
                                <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart')}}/{{$v_content->rowId}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            <?php
                }
            ?>
        </div>
    </div>
</section> <!--/#cart_items-->
<section id="do_action">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <?php
                    if(Cart::subtotal(null, null, '') == 0) { // an form dat hang
                    } else {
                ?>
                    <div class="total_area">
                        <ul>
                            <li>Tổng tiền <span>{{number_format(Cart::subtotal(null, null,'')).' '.'VND'}}</span></li>
                            <li>Thuế VAT <span>10%</span></li>
                            <li>Phí vận chuyển <span>Free</span></li>
                            {{-- tinh tong tien phai thanh toan sau thue --}}
                            {{-- tinh thue VAT 10% bang cong thuc (110)/100 --}}
                            <li>Thành tiền (Đã bao gồm thuế VAT) <span>{{number_format(Cart::subtotal(null, null,'')).' '.'VND'}}</span></li>
                        </ul>
                            <?php
                                $customer_id = Session::get('customer_id');
                                if($customer_id == NULL){
                            ?>
                                <a class="btn btn-default check_out" href="{{URL::to('/signin')}}">Đặt hàng</a>
                            <?php
                                } else {
                            ?>
                                <input type="hidden" name="id_customer_hidden" value="<?php echo $customer_id; ?>">
                                <a class="btn btn-default check_out" href="{{URL::to('/save-order')}}">Đặt hàng</a>
                            <?php
                                }
                            ?>
                    </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</section><!--/#do_action-->
@endsection
