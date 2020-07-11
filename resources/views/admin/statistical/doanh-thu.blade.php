@extends('admin_layout')  {{-- trang nay de lay giao dien --}}
@section('admin_content')  {{-- con day la phan code cua tung trang  --}}
<div class="panel panel-default">
    <div class="panel-heading">
        Doanh thu tháng
    </div>
    <div class="table-responsive">
        <div style="text-align: center; background: #ddede0">
            <font style="color: red;font-size:20px">
                <?php
                $message = Session::get('message');
                $mess = Session::get('notiAddCategory');
                if($message || $mess){
                echo $message;
                echo $mess;
                Session::put('message',null);
                Session::put('notiAddCategory',null);
                }
                ?>
            </font>
        </div>
    <table class="table table-striped table-bordered">
        <thead style="">
        </thead>
        <tbody>
            <tr>
                <td style="text-align: center"><b>Doanh thu tháng này</b> ({{$currentYear}}-{{$currentMonth}})</td>
                <td style="text-align: center">{{number_format($sum)}} VND</td>
                <td style="text-align: center"><b>Tổng số đơn hàng đã bán tháng này</b> ({{$currentYear}}-{{$currentMonth}})</td>
                <td style="text-align: center">{{number_format($count)}}</td>
                <td style="text-align: center"><a href="{{URL::to('/chi-tiet-doanh-thu')}}/{{$currentMonth}}">Chi tiết</a></td>
            </tr>
        </tbody>
    </table>
    <div class="panel-heading">
        Doanh thu năm
    </div>
    <table class="table table-striped table-bordered">
        <thead style="">
        </thead>
        <tbody>
            <tr>
                <th style="text-align: center">Doanh thu năm</th>
                <th style="text-align: center">Tổng doanh thu</th>
            </tr>
            @foreach ($historyY as $item)
            <tr>
                <td style="text-align: center">{{$item->nam}}</td>
                <td style="text-align: center">{{number_format($item->tong_doanh_thu)}} VND</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="panel-heading">
        Lịch sử
    </div>
    <table class="table table-striped table-bordered">
        <thead style="">
        </thead>
        <tbody>
            @foreach ($history as $item)
            <tr>
                <td style="text-align: center"><b>Doanh thu tháng</b> ({{$item->thang}})</td>
                <td style="text-align: center">{{number_format($item->tong_doanh_thu)}} VND</td>
                <td style="text-align: center"><b>Tổng số đơn hàng đã bán tháng </b> ({{$item->thang}})</td>
                <td style="text-align: center">{{$item->tong_don_hang}}</td>
                <td style="text-align: center"><a href="{{URL::to('/lich-su-chi-tiet-doanh-thu')}}/{{$item->thang}}">Chi tiết</a></td>
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
        </div>
    </div>
    </footer>
</div>
</div>
@endsection
