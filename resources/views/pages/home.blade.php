@extends('layout')
@section('content')
<!-- Hiển thị tất cả sản phẩm -->
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Sản phẩm hiện có</h2>
    <?php
        $value = Session::get('value');
        if($value) {
        } else {
    ?>
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
    <?php
        }
    ?>
    @foreach($Product as $pro)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center" style="height: 400px">
                    <a href="detail_product/{{$pro->id}}"><img src="{{URL::to('public/backend/img_admin/'.$pro->product_img)}}" alt="" /></a>
                    <p>{{$pro->product_name}}</p>
                    <h2>{{number_format($pro->product_price).' '.'VND'}}</h2>
                    <a href="detail_product/{{$pro->id}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- Phân trang -->
    <?php
    $paginate = Session::get('paginate');
    if($paginate) {
?>
    {!! $Product->links() !!}
<?php
    Session::put('paginate', null); }
?>
</div><!--features_items-->
@endsection
