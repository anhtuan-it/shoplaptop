@extends('layout')
@section('content')

<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product" >
            @foreach($Product as $dt)
            <img src="{{URL::to('/public/backend/img_admin/'.$dt->product_img)}}" alt="" style="height: 309px;" />
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">
            <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="public/frontend/images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{$dt->product_name}}</h2>
            <p>Mã ID: {{$dt->id}}</p>
            <img src="public/frontend/images/product-details/rating.png" alt="" />
            <form action="{{URL::to('/save-cart')}}" method="POST">
                {{ csrf_field() }}
                <span>
                    <span>{{number_format($dt->product_price).'VNĐ'}} (Đã bao gồm thuế VAT)</span>
                    <?php
                        if($dt->product_status == 1) {
                    ?>
                    <label>Số lượng:</label>
                    <input name="qty" type="number" min="1"  value="1" />
                    <input name="productid_hidden" type="hidden"  value="{{$dt->id}}" />
                    <button type="submit" class="btn btn-fefault cart">
                        <i class="fa fa-shopping-cart"></i>
                        Thêm giỏ hàng
                    </button>
                </span>
                <p><b>Tình trạng:</b> Còn hàng </p>
                    <?php
                        } else if($dt->product_status == 0) {
                    ?>
                        <br><br><p><b>Tình trạng:</b> Hết hàng </p>
                    <?php
                        }
                    ?>
                </p>
                <p><b>Trạng thái:</b> Mới 100%</p>
                <p><b>Hãng:</b> {{$dt->category_id}}</p>
            </form>
            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
        </div><!--/product-information-->
    </div>
    <div class="category-tab shop-details-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
                <li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="details" >
                <p>{!!$dt->product_desc!!}</p>
            </div>
            <div class="tab-pane fade active in2" id="companyprofile" >
                <p>{!!$dt->product_name!!}</p>
                @foreach($Product as $item)
                    <p>Chip:  {!!$item->chip!!}</p>
                    <p>Ram:  {!!$item->ram!!}</p>
                    <p>Trọng Lượng:  {!!$item->weight!!}</p>
                    <p>Ổ cứng:  {!!$item->hard_drive!!}</p>
                @endforeach
            </div>
        </div>
        </div>
    </div><!--/category-tab-->
    </div><!--/product-details-->
            @endforeach {{-- end foreach product_detail --}}
@endsection
