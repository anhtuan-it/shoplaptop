@extends('admin_layout')  {{-- trang nay de lay giao dien --}}
@section('admin_content')  {{-- con day la phan code cua tung trang  --}}
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
            Thêm danh mục sản phẩm
            </header>
            <div style="text-align: center"><br>
                <font style="color: red;font-size:20px">
                <?php
                    $message = Session::get('notiAddCategory');
                    if($message){
                        echo $message;
                        Session::put('notiAddCategory',null);// chi cho phep in ra 1 lan
                    }
                ?>
                </font>
            </div>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{URL::to('/save-category-product')}}" method="post"> {{-- gui du lieu den save-category de xu ly --}}
                        {{csrf_field()}}  {{--  giup bao mat hon --}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mã danh mục</label>
                        <input type="text" name="category_product_id" class="form-control" id="exampleInputEmail1" placeholder="Mã danh mục">{{-- category_produc_id --}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Trạng Thái</label>
                        <select name="category_product_status" class="form-control m-bot15">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển Thị</option>  {{-- category_product_status  --}}
                        </select>
                    </div>
                    <button type="submit" name="add_category_product" class="btn btn-info">Thêm danh mục</button> {{-- them danh muc sp --}}
                </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
