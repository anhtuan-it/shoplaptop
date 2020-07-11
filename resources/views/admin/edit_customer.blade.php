@extends('admin_layout')  {{-- trang nay de lay giao dien --}}
@section('admin_content')  {{-- con day la phan code cua tung trang  --}}
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật thông tin khách hàng
            </header>
            <div class="panel-body">
                @foreach($edit_customer as $key => $edit_value)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-customer/'.$edit_value->customer_id)}}" method="post"> {{-- gui du lieu den save-category de xu ly --}} {{-- xu dung phuong thuc post nen ben web update cung post --}}
                        {{csrf_field()}}  {{--  giup bao mat hon --}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tài Khoản khách hàng</label>
                        <input type="text" value="{{$edit_value->customer_account}}" name="customer_account" class="form-control" id="exampleInputEmail1" placeholder="Tài khoản khách hàng">{{-- category_product_name --}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mật khẩu</label> <font color = "red">(Mã hóa MD5)</font>
                        <input type="text" value="{{$edit_value->customer_password}}" name="customer_password" class="form-control" id="exampleInputEmail1" placeholder="Tài khoản khách hàng">{{-- category_product_name --}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Họ tên</label>
                        <input type="text" value="{{$edit_value->customer_name}}" name="customer_name" class="form-control" id="exampleInputEmail1" placeholder="Tên khách hàng">{{-- category_product_name --}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số điện thoại</label>
                        <input type="text"value="{{$edit_value->customer_phone}}"name="customer_phone" class="form-control" id="exampleInputEmail1" placeholder="Số điện thoại">{{-- product_id --}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ </label>
                        <textarea style="resize: none;" rows="4" name="customer_address" class="form-control" id="exampleInputEmail1" placeholder="Địa chỉ khách hàng">{{$edit_value->customer_address}}</textarea>
                    </div>
                    <button onclick="myFunction()" type="submit" name="update_customer" class="btn btn-info">Cập nhật Thông Tin Khách Hàng</button> {{-- them sp --}}
                    <script>
                        function myFunction() {
                            alert("Cập nhật thông tin khách hàng thành công!");
                        }
                    </script>
                </form>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
