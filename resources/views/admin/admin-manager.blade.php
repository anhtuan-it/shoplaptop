@extends('admin_layout')  {{-- trang nay de lay giao dien --}}
@section('admin_content')  {{-- con day la phan code cua tung trang  --}}
<div class="panel panel-default">
    <div class="panel-heading">
    Quản lý Admin
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
        <thead>
        <tr>
            <th style="text-align: center">STT</th>
            <th style="text-align: center">Email</th>
            <th style="text-align: center">Mật khẩu <font color="red">(Mã hoá MD5)</font></th>
            <th style="text-align: center">Tên Admin</th>
            <th style="text-align: center">SĐT</th>
            <th style="text-align: center">Chức năng</th>
        </tr>
        </thead>
        <tbody><?php $i = 0; ?>
        @foreach($admin as $item)
        <tr>
            <td style="text-align: center"><?php $i++; echo $i; ?></td>
            <td style="text-align: center">{{$item->admin_email}}</td>
            <td style="text-align: center">{{$item->admin_password}}</td>
            <td style="text-align: center">{{$item->admin_name}}</td>
            <td style="text-align: center">{{$item->admin_phone}}</td>
            <td style="text-align: center">
            <a href="{{URL::to('/edit-admin/'.$item->admin_id)}}" class="active" ui-toggle-class="" style="font-size: 17px">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
            </a>
            <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này không?')" href="{{URL::to('/delete-admin/'.$item->admin_id)}}" class="active" ui-toggle-class=""style="font-size: 17px">
                <i  class="fa fa-trash text-danger text"></i>
            </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <footer class="panel-footer">
    </footer>
</div>
</div>
@endsection
