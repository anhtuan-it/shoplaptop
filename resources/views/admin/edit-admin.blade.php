@extends('admin_layout')  {{-- trang nay de lay giao dien --}}
@section('admin_content')  {{-- con day la phan code cua tung trang  --}}
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật tài khoản Admin
            </header>
            <a href="#" style="color: red;font-size:20px">
            <?php
                    $message = Session::get('message');
                    if($message){
                        echo $message;
                        Session::put('message',null);// chi cho phep in ra 1 lan
                    }
                ?>
            </a>
            <div class="panel-body">
                @foreach($editAdmin as  $edit_value)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-admin/'.$edit_value->admin_id)}}" method="post"> {{-- gui du lieu den save-category de xu ly --}} {{-- xu dung phuong thuc post nen ben web update cung post --}}
                        {{csrf_field()}}  {{--  giup bao mat hon --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" value="{{$edit_value->admin_email}}" name="admin_email" class="form-control" id="exampleInputEmail1" placeholder="Nhập email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mật khẩu cũ <font color="red">(Mã hoá MD5)</font></label>
                            <input type="text" value="{{$edit_value->admin_password}}" name="admin_password" class="form-control" id="exampleInputEmail1" placeholder="Nhập mật khẩu" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mật khẩu mới <font color="red">(Chỉ nhập trường này nếu muốn thay đổi mật khẩu!)</font></label>
                            <input type="text" value="" name="admin_password_new" class="form-control" id="exampleInputEmail1" placeholder="Nhập mật khẩu mới">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Admin</label>
                            <input type="text" value="{{$edit_value->admin_name}}" name="admin_name" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên Admin">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">SĐT</label>
                            <input type="text" value="{{$edit_value->admin_phone}}" name="admin_phone" class="form-control" id="exampleInputEmail1" placeholder="Nhập sđt">
                        </div>
                        <button type="submit" name="update-admin" class="btn btn-info">Cập nhật</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
