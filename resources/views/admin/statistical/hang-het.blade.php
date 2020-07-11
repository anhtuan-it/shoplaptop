@extends('admin_layout')  {{-- trang nay de lay giao dien --}}
@section('admin_content')  {{-- con day la phan code cua tung trang  --}}
<div class="panel panel-default">
    <div style="background: #626262; text-align: center; widows: 100%;">
        <form action="{{URL::to('/hang-het')}}" method="get" enctype="multipart/form-data" class="form-inline md-form mr-auto mb-4">
            {{-- <input type="hidden" name="_token" value="{{ csrf_token()}}"> --}}
            <font color="white" style="font-size: 25px; vertical-align: bottom"><b>Hàng hết</b>&nbsp;&nbsp;&nbsp;&nbsp;</font>
            <input style="vertical-align: top" name="search" type="text" class="form-control search" placeholder="Nhập tên hoặc mã SP" value="<?php
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
            <p style="text-align: center; background: #ddede0"><b>Tổng số sản phẩm:
                @foreach ($product as $item)
                    <?php
                        $count = count($product);
                    ?>
                @endforeach
                <?php
                    if($count) {
                        echo "<font color='red'>".$count."</font>";
                    }
                ?></b></p>
        <tr>
            <th style="text-align: center">STT</th>
            <th style="text-align: center">Mã sản phẩm</th>
            <th style="text-align: center">Tên sản phẩm</th>
            <th style="text-align: center">Trạng thái</th>
        </tr>
        </thead>
        <tbody><?php $i = 0; ?>
        @foreach($product as $item)
        <tr>
            <td style="text-align: center"><?php $i++; echo $i; ?></td>
            <td style="text-align: center">{{ $item->id }}</td>
            <td style="text-align: center">{{ $item->product_name}}</td>
            <td style="text-align: center">
                <?php
                    if($item->product_status == 0){  //trang thai
                ?>
                    Hết hàng <span class="fa-thumb-styling fa fa-thumbs-down" style="color: red; font-size:20px"></span>{{--  an danh muc --}}
                <?php
                    }else{
                    ?>
                        Còn hàng <span class="fa-thumb-styling fa fa-thumbs-up" style="color: blue; font-size:20px"></span> {{-- hien danh muc --}}
                    <?php
                    }
                ?>
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
