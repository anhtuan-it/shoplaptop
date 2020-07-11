@extends('admin_layout')  {{-- trang nay de lay giao dien --}}
@section('admin_content')  {{-- con day la phan code cua tung trang  --}}
<div class="panel panel-default">
    <div style="background: #626262; text-align: center; widows: 100%;">
        <form action="{{URL::to('/all-customer')}}" method="get" enctype="multipart/form-data" class="form-inline md-form mr-auto mb-4">
            {{-- <input type="hidden" name="_token" value="{{ csrf_token()}}"> --}}
            <font color="white" style="font-size: 25px; vertical-align: bottom"><b>Khách hàng</b>&nbsp;&nbsp;&nbsp;&nbsp;</font>
            <input style="vertical-align: top" name="search" type="text" class="form-control search" placeholder="Nhập tên hoặc SĐT KH" value="<?php
                $value = Session::get('value');
                if($value) {
                    echo $value;
                    Session::put('value', null);
                }
            ?>">
        </form><br>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th style="text-align: center">STT</th>
            <th style="text-align: center">Mã khách hàng</th>
            <th style="text-align: center">Tài khoản khách hàng</th>
            <th style="text-align: center">Họ tên</th>
            <th style="text-align: center">Địa chỉ</th>
            <th style="text-align: center">Số điện thoại</th>
            <th style="text-align: center">Lịch sử mua hàng</th>
            <th style="text-align: center">Chức năng</th>
        </tr>
        </thead>
        <tbody><?php $i = 0; ?>
        @foreach($all_customer as $key => $cate_custom)
        <tr>
            <td style="text-align: center"><?php $i++; echo $i; ?></td>
            <td style="text-align: center">{{ $cate_custom->customer_id }}</td>
            <td style="text-align: center">{{ $cate_custom->customer_account }}</td>
            <td style="text-align: center">{{ $cate_custom->customer_name }}</td>
            <td style="text-align: center">{{ $cate_custom->customer_address }}</td>
            <td style="text-align: center">{{ $cate_custom->customer_phone }}</td>
            <td style="text-align: center"><a href="{{URL::to('/order-history')}}/{{$cate_custom->customer_id}}">Chi tiết</a></td>
            <td style="text-align: center">
            <a href="{{URL::to('/edit-customer/'.$cate_custom->customer_id)}}" class="active" ui-toggle-class="" style="font-size: 17px">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
            </a>
            <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này không?')" href="{{URL::to('/delete-customer/'.$cate_custom->customer_id)}}" class="active" ui-toggle-class=""style="font-size: 17px">
                <i  class="fa fa-trash text-danger text"></i>
            </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</div>
</div>
@endsection
