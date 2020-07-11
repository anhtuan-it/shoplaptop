@extends('layout')
@section('content')

<!-- Hiển thị sản phẩm theo danh mục -->

<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Sản phẩm theo hãng</h2>
    <div style="width: 30%;">
        <form id="sap_xep_gia" method="GET">
            <select name="asc_desc" class="asc_desc">
                <option selected="selected">Giá</option>
                <option value="asc">Giá tăng dần</option>
                <option value="desc">Giá giảm dần</option>
            </select>
        </form>
        <script>
            $(function() {
                $('.asc_desc').change(function() {
                    $('#sap_xep_gia').submit();
                })
            })
        </script>
    </div><br>
    @foreach($Product as $pro)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <a href="{{URL::to('/detail_product')}}/{{$pro->id}}"><img src="{{URL::to('public/backend/img_admin/'.$pro->product_img)}}" alt="" /></a>
                    <p>{{$pro->product_name}}</p>
                    <h2>{{number_format($pro->product_price).' '.'VND'}}</h2>
                    <a href="{{URL::to('/detail_product')}}/{{$pro->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div><!--features_items-->
@endsection
