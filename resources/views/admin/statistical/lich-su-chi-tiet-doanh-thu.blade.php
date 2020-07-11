@extends('admin_layout')  {{-- trang nay de lay giao dien --}}
@section('admin_content')  {{-- con day la phan code cua tung trang  --}}
<div class="panel panel-default">
    <div class="panel-heading">
        @foreach ($title as $item)
            Chi tiết doanh thu tháng ({{$item->thang}})
        @endforeach
    </div>
    <div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th style="text-align: center">STT</th>
            <th style="text-align: center">Mã đơn hàng</th>
            <th style="text-align: center">Ngày đặt hàng</th>
            <th style="text-align: center">Tổng tiền</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach ($order as $item)
            <tr>
                <td style="text-align: center">
                    <?php $i++; echo $i; ?>
                </td>
                <td style="text-align: center">{{$item->order_id}}</td>
                <td style="text-align: center">{{$item->order_day}}</td>
                <td style="text-align: center">{{number_format($item->order_total_price)}} VND</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <footer class="panel-footer">
    <div class="row">
        <form action="{{URL::to('/doanh-thu')}}" method="get">
            <button type="submit" name="back" class="btn btn-info" style="text-align: center ;width: 200px;">Quay lại</button>
        </form>
    </div>
    </footer>
</div>
</div>
@endsection
