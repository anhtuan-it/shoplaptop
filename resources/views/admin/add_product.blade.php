@extends('admin_layout')  {{-- trang nay de lay giao dien --}}
@section('admin_content')  {{-- con day la phan code cua tung trang  --}}
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm sản phẩm
            </header>
            <div style="text-align: center"><br>
                <font style="color: red;font-size:20px">
                <?php
                    $message = Session::get('message');
                    if($message){
                        echo $message;
                        Session::put('message',null);// chi cho phep in ra 1 lan
                    }
                    // thong bao trang thai chon file image
                    $messageUploadFile = Session::get('messageUploadFile');
                    if($messageUploadFile){
                        echo $messageUploadFile;
                        Session::put('messageUploadFile',null);// chi cho phep in ra 1 lan
                    }
                ?>
                </font>
            </div>
            <div class="panel-body">
                <div class="position-center">
                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data"> {{-- gui du lieu den save-category de xu ly --}}
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hình Ảnh Sản Phẩm </label><font color = "red"> (*Bắt buộc)</font>
                        <input type="file" name="product_img" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên Sản Phẩm </label>
                        <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">{{-- category_product_name --}}
                    </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Mô Tả Sản Phẩm </label>
                        <textarea style="resize: none;" rows="8" name="product_desc" class="form-control" id="exampleInputEmail1" placeholder="Mô tả sản phẩm"></textarea>
                    </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Giá Sản Phẩm </label>
                        <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Giá sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Trạng Thái</label>
                        <select name="product_status" class="form-control m-bot15">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển Thị</option>  {{-- category_product_status  --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mã danh mục</label><font color = "red"> (*Bắt buộc)</font>
                        <select name="category_id" class="form-control m-bot15">
                            @foreach ($select as $item)
                            <option>{{$item->category_id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Chip</label>
                        <input type="text" name="chip" class="form-control" id="exampleInputEmail1" placeholder="Mã danh mục">{{-- product_id --}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ram</label>
                        <input type="text" name="ram" class="form-control" id="exampleInputEmail1" placeholder="Mã danh mục">{{-- product_id --}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Weight</label>
                        <input type="text" name="weight" class="form-control" id="exampleInputEmail1" placeholder="Mã danh mục">{{-- product_id --}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hard Drive</label>
                        <input type="text" name="hard_drive" class="form-control" id="exampleInputEmail1" placeholder="Mã danh mục">{{-- product_id --}}
                    </div>
                    <button type="submit" name="add_category_product" class="btn btn-info">Thêm sản phẩm</button> {{-- them danh muc sp --}}
                </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
