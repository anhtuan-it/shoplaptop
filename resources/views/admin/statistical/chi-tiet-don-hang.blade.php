@extends('admin_layout')  {{-- trang nay de lay giao dien --}}
@section('admin_content')  {{-- con day la phan code cua tung trang  --}}
<div class="panel panel-default">
    <div class="panel-heading">
        @foreach ($db_join as $item)
        Chi tiết đơn hàng - Khách hàng: {{$item->customer_name}}
        @endforeach
    </div>
    <div class="table-responsive">
    <a href="#" style="color: red;font-size:20px">
        <?php
        $message = Session::get('message');
        if($message){
        echo $message;
        Session::put('message',null);// chi cho phep in ra 1 lan
        }
        ?>
    </a>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th style="text-align: center">STT</th>
            <th style="width: 10px; text-align: center">Mã đơn hàng</th>
            <th style="text-align: center">Mã sản phẩm</th>
            <th style="text-align: center">Hình ảnh</th>
            <th style="width: 70px; text-align: center">Tên sản phẩm</th>
            <th style="text-align: center">Số lượng</th>
            <th style="text-align: center">Đơn giá</th>
            <th style="text-align: center">Thành tiền</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=0 ?>
        @foreach ($db_order_detail as $item)
            <tr>
                <td style="text-align: center"><?php $i++; echo $i; ?></td>
                <td style="text-align: center">{{$item->order_id}}</td>
                <td style="text-align: center">{{$item->order_product_id}}</td>
                <td style="text-align: center"><img src="/shopmaytinh/public/backend/img_admin/{{$item->order_product_image}}" alt="" style="height: 50px;" /></td>
                <td style="text-align: center">{{$item->order_product_name}}</td>
                <td style="text-align: center">{{$item->order_qty}}</td>
                <td style="text-align: center">{{number_format($item->order_product_price)}} VND</td>
                <td style="text-align: center">{{number_format($item->order_total_price)}} VND</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <footer class="panel-footer">
    <div class="row">
        <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">Tổng tiền (Đã bao gồm thuế VAT (10%)):</small>
            @foreach ($db_order as $item)
                {{number_format($item->order_total_price)}} VND <br>
                <?php
                // trang thai dang cho xu ly
                    if($item->order_status == 0) {
                ?>
                    Trạng thái: Đang chờ xử lý<br>
                    {{-- xac nhan don hang --}}
                    <br><a onclick="myFunctionVerifi()" href="{{URL::to('/verify-order')}}/{{$item->order_id}}"><button type="submit" name="verify-order" class="btn btn-info" style="text-align: center ;width: 200px;">Xác nhận đơn hàng</button></a><br>
                    <script>
                        function myFunctionVerifi() {
                            alert("Xác nhận đơn hàng thành công!");
                        }
                    </script>
                    {{-- huy don hang --}}
                    <a onclick="myFunction()" href="{{URL::to('/cancel-order')}}/{{$item->order_id}}"><button type="submit" name="verify-order" class="btn btn-info" style="text-align: center ;width: 200px;">Hủy đơn hàng</button></a><br>
                    <script>
                        function myFunction() {
                            alert("Hủy đơn hàng thành công!");
                        }
                    </script>
                    <form action="{{URL::to('/order-manager')}}" method="get">
                        <button type="submit" name="back" class="btn btn-info" style="text-align: center ;width: 200px;">Quay lại</button>
                    </form>
                <?php
                    // trang thai dang van chuyen don hang
                    } else if($item->order_status == 1) {
                ?>
                    Trạng thái: Đang vận chuyển đơn hàng<br><br>
                    <a onclick="myFunction()" href="{{URL::to('/success-order')}}/{{$item->order_id}}"><button type="submit" name="verify-order" class="btn btn-info" style="text-align: center ;width: 200px;">Xác nhận đã giao hàng</button></a><br>
                    <script>
                        function myFunction() {
                            alert("Đã xác nhận giao hàng!");
                        }
                    </script>
                    <a onclick="myFunction2()" href="{{URL::to('/order-callback')}}/{{$item->order_id}}"><button type="submit" name="verify-order" class="btn btn-info" style="text-align: center ;width: 200px;">Thu hồi đơn hàng</button></a>
                    <script>
                        function myFunction2() {
                            alert("Thu hồi đơn hàng thành công!");
                        }
                    </script>
                    <form action="{{URL::to('/order-manager-verified')}}" method="get">
                        <button type="submit" name="back" class="btn btn-info" style="text-align: center ;width: 200px;">Quay lại</button>
                    </form>
                <?php
                    } else if($item->order_status == 2) {
                ?>
                    Trạng thái: Đã giao hàng<br><br>
                    <form action="{{URL::to('/hang-da-ban')}}" method="get">
                        <button type="submit" name="back" class="btn btn-info" style="text-align: center ;width: 200px;">Quay lại</button>
                    </form>
                <?php
                    } else if($item->order_status == 3) {
                ?>
                Trạng thái: Đã thu hồi<br><br>
                <form action="{{URL::to('/hang-da-ban')}}" method="get">
                    <button type="submit" name="back" class="btn btn-info" style="text-align: center ;width: 200px;">Quay lại</button>
                </form>
                <?php
                    }
                ?>
            @endforeach
        </div>
        <div class="col-sm-7 text-right text-center-xs">
            <table class="table table-striped b-t b-light">
                <thead>
                <tr>
                    <th style="text-align: center">Tên khách hàng</th>
                    <th style="width: 10px; text-align: center">SĐT</th>
                    <th style="text-align: center">Địa chỉ</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($db_join as $item)
                    <tr>
                        <td style="text-align: center">{{$item->customer_name}}</td>
                        <td style="text-align: center">{{$item->customer_phone}}</td>
                        <td style="text-align: center">{{$item->customer_address}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </footer>
</div>
</div>
@endsection
