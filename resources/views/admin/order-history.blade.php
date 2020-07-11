@extends('admin_layout')  {{-- trang nay de lay giao dien --}}
@section('admin_content')  {{-- con day la phan code cua tung trang  --}}
<div class="panel panel-default">
    <div class="panel-heading">
    @foreach ($customer as $item)
        Lịch sử mua hàng - Khách hàng: {{$item->customer_name}}
    @endforeach
    </div>
    <div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th style="text-align: center">STT</th>
            <th style="text-align: center">Mã khách hàng</th>
            <th style="text-align: center">Tên khách hàng</th>
            <th style="text-align: center">Mã đơn hàng</th>
            <th style="text-align: center">Ngày đặt hàng</th>
            <th style="text-align: center">Trạng thái</th>
            <th style="text-align: center">Chức năng</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach ($history as $item)
            <tr>
                <td style="text-align: center">
                    <?php $i++; echo $i; ?>
                </td>
                <td style="text-align: center">{{$item->customer_id}}</td>
                <td style="text-align: center">{{$item->customer_name}}</td>
                <td style="text-align: center">{{$item->order_id}}</td>
                <td style="text-align: center">{{$item->order_day}}</td>
                <td style="text-align: center">
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
                <td style="text-align: center">
                    <a href="{{URL::to('/order-history-detail')}}/{{$item->order_id}}">Chi tiết</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <footer class="panel-footer">
    <div class="row">
        <div class="col-sm-5 text-center">
        <small class="text-muted inline m-t-sm m-b-sm"></small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">
            <!-- Phân trang -->
            {!! $history->links() !!}
        </div>
    </div>
    </footer>
</div>
</div>
@endsection
