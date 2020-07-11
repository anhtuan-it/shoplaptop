@extends('admin_layout')  {{-- trang nay de lay giao dien --}}
@section('admin_content')  {{-- con day la phan code cua tung trang  --}}
<div class="panel panel-default">
    <div style="background: #626262; text-align: center; widows: 100%;">
        <form action="{{URL::to('/hang-da-ban')}}" method="get" enctype="multipart/form-data" class="form-inline md-form mr-auto mb-4">
            {{-- <input type="hidden" name="_token" value="{{ csrf_token()}}"> --}}
            <font color="white" style="font-size: 25px; vertical-align: bottom"><b>Đơn hàng đã bán</b>&nbsp;&nbsp;&nbsp;&nbsp;</font>
            <input style="vertical-align: top; width: 230px" name="search" type="text" class="form-control search" placeholder="Nhập SĐT KH hoặc mã ĐH" value="<?php
                $value = Session::get('value');
                if($value) {
                    echo $value;
                    Session::put('value', null);
                }
            ?>">
        </form><br>
    </div>
    <div class="table-responsive">
        <div style="text-align: center; background: #ddede0"><br>
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
        <thead style="background: #ddede0">
            <p style="text-align: center; background: #ddede0"><b>Tổng số đơn hàng đã bán:
                @foreach ($orders as $item)
                    <?php
                        $count = count($orders);
                    ?>
                @endforeach
                <?php
                    if($count) {
                        echo "<font color='red'>".$count."</font>";
                    }
                ?></b></p>
        <tr>
            <th style="text-align: center">STT</th>
            <th style="text-align: center">Mã đơn hàng</th>
            <th style="text-align: center">Ngày bán</th>
            <th style="text-align: center">Trạng thái</th>
            <th style="text-align: center">Chi tiết đơn hàng</th>
        </tr>
        </thead>
        <tbody><?php $i = 0; ?>
        @foreach($orders as $item)
        <tr>
            <td style="text-align: center"><?php $i++; echo $i; ?></td>
            <td style="text-align: center">{{ $item->order_id }}</td>
            <td style="text-align: center">{{ $item->order_day }}</td>
            <td style="text-align: center">
                <?php
                    if($item->order_status == 2) {
                ?>
                    Đã giao hàng
                <?php
                    }
                ?>
            </td>
            <td style="text-align: center">
                <a href="{{URL::to('/chi-tiet-don-hang')}}/{{$item->order_id}}">Chi tiết</a>
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
        </div>
    </div>
    </footer>
</div>
</div>
@endsection
