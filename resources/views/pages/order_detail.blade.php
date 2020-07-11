@extends('layout_customer')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs" style="text-align: center">
            <ol class="breadcrumb">
            <li class="active"><h3>CHI TIẾT ĐƠN HÀNG CỦA BẠN</h3></li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table style="width: 100%;" class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="order_id" style="text-align: center">Mã sản phẩm</td>
                        <td class="order_day" style="text-align: center">Hình ảnh</td>
                        <td class="order_total_price" style="text-align: center">Tên sản phẩm</td>
                        <td class="order_status" style="text-align: center">Số lượng</td>
                        <td class="order_detail" style="text-align: center">Đơn giá</td>
                        <td class="delete_order" style="text-align: center">Thành tiền</td>
                        <td style="text-align: center"><a href="{{URL::to('/customer')}}">Quay lại</a></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Product as $item)
                    <tr>
                        <td class="order_id" style="text-align: center">
                            {{$item->order_product_id}}
                        </td>
                        <td class="order_product_img" style="text-align: center">
                            <img src="/shopmaytinh/public/backend/img_admin/{{$item->order_product_image}}" alt="" style="height: 100px;" />
                        </td>
                        <td class="order_product_name" style="text-align: center">
                            <a href="{{URL::to('/detail_product')}}/{{$item->order_product_id}}">{{$item->order_product_name}}</a>
                        </td>
                        <td class="order_qty" style="text-align: center">
                            {{$item->order_qty}}
                        </td>
                        <td class="order_product_price" style="text-align: center">
                            {{number_format($item->order_product_price)}} VND
                        </td>
                        <td class="order_total_price" style="text-align: center">
                            {{number_format($item->order_total_price)}} VND
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
