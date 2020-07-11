@extends('admin_layout')  {{-- trang nay de lay giao dien --}}
@section('admin_content')  {{-- con day la phan code cua tung trang  --}}
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật danh mục sản phẩm
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
                @foreach($edit_category_product as $key => $edit_value)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="post"> {{-- gui du lieu den save-category de xu ly --}} {{-- xu dung phuong thuc post nen ben web update cung post --}}
                        {{csrf_field()}}  {{--  giup bao mat hon --}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên Danh Mục</label>
                        <input type="text" value="{{$edit_value->category_id}}" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">{{-- category_product_name --}}
                    </div>
                    <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật danh mục</button> {{-- them danh muc sp --}}
                </form>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
