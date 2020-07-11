@extends('layout_customer')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs" style="text-align: center">
            <ol class="breadcrumb">
            <li class="active"><h3>QUẢN LÝ ĐƠN HÀNG CỦA BẠN</h3></li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table style="width: 100%;" class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="order_id" style="text-align: center">Mã đơn hàng</td>
                        <td class="order_day" style="text-align: center">Ngày đặt hàng</td>
                        <td class="order_total_price" style="text-align: center">Tổng tiền</td>
                        <td class="order_status" style="text-align: center">Trạng thái</td>
                        <td class="order_detail" style="text-align: center">Chi tiết đơn hàng</td>
                        <td class="delete_order" style="text-align: center">Hủy đơn hàng</td>
                        <td style="text-align: center"><a href="{{URL::to('/info-customer')}}">Thông tin của bạn</a></td>
                        <td style="text-align: center"><a href="{{URL::to('/show-cart')}}">Giỏ hàng</a></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Product as $item)
                    <tr>
                        <td class="order_id" style="text-align: center">
                            {{$item->order_id}}
                        </td>
                        <td class="order_day" style="text-align: center">
                            {{$item->order_day}}
                        </td>
                        <td class="order_total_price" style="text-align: center">
                            {{number_format($item->order_total_price)}} VND
                        </td>
                        <td class="order_status" style="text-align: center">
                            <?php
                                if($item->order_status == 0) {
                            ?>
                            Đang chờ xử lý
                            <?php
                                } else if($item->order_status == 1) {
                            ?>
                            Đang vận chuyển đơn hàng
                            <?php
                                } else if($item->order_status == 2) {
                            ?>
                            Đã giao hàng
                            <?php
                                } else if($item->order_status == 3) {
                            ?>
                            Đã hoàn trả
                            <?php
                                }
                            ?>
                        </td>
                        <td class="order_detail" style="text-align: center">
                            <a href="{{URL::to('order-detail')}}/{{$item->order_id}}">Chi tiết</a>
                        </td>
                        <?php
                            if($item->order_status == 0) {
                        ?>
                            <td class="cart_delete" style="text-align: center">
                                <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này không?')" class="cart_quantity_delete" href="{{URL::to('/delete-order')}}/{{$item->order_id}}"><i class="fa fa-times"></i></a>
                            </td>
                        <?php
                            }
                        ?>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
