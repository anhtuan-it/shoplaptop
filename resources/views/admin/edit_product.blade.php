@extends('admin_layout')  {{-- trang nay de lay giao dien --}}
@section('admin_content')  {{-- con day la phan code cua tung trang  --}}
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật sản phẩm
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
                @foreach($edit_product as $key => $edit_value)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-product/'.$edit_value->id)}}" method="post" enctype="multipart/form-data"> {{-- gui du lieu den save-category de xu ly --}} {{-- xu dung phuong thuc post nen ben web update cung post --}}
                        {{csrf_field()}}  {{--  giup bao mat hon --}}
                        <input type="hidden" name="_token" value="{{ csrf_token()}}"> <!-- Không chuyển trang sau khi load form -->
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hình Ảnh Sản Phẩm </label><br>
                        <img style="width: 100px;height: 100px" src="../public/backend/img_admin/{{ $edit_value->product_img }}"><br>{{ $edit_value->product_img }}
                        <input type="file" value="" name="product_img" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên Sản Phẩm </label>
                        <input type="text"value="{{$edit_value->product_name}}" name="product_name" class="form-control" id="exampleInputEmail1">{{-- category_product_name --}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mô Tả Sản Phẩm </label>
                        <textarea style="resize: none;" rows="8" name="product_desc" class="form-control" id="exampleInputEmail1">{{$edit_value->product_desc}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giá Sản Phẩm </label>
                        <input type="text" value="{{$edit_value->product_price}}" name="product_price" class="form-control" id="exampleInputEmail1">
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
                        <input type="text" value="{{$edit_value->chip}}" name="chip" class="form-control" id="exampleInputEmail1" placeholder="Mã danh mục">{{-- product_id --}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ram</label>
                        <input type="text" value="{{$edit_value->ram}}" name="ram" class="form-control" id="exampleInputEmail1" placeholder="Mã danh mục">{{-- product_id --}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Weight</label>
                        <input type="text" value="{{$edit_value->weight}}" name="weight" class="form-control" id="exampleInputEmail1" placeholder="Mã danh mục">{{-- product_id --}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hard Drive</label>
                        <input type="text" value="{{$edit_value->hard_drive}}" name="hard_drive" class="form-control" id="exampleInputEmail1" placeholder="Mã danh mục">{{-- product_id --}}
                    </div>
                    <button type="submit" name="update_product" class="btn btn-info">Cập nhật sản phẩm</button> {{-- them sp --}}
                </form>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
