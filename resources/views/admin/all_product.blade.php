@extends('admin_layout')  {{-- trang nay de lay giao dien --}}
@section('admin_content')  {{-- con day la phan code cua tung trang  --}}
<div class="panel panel-default">
    <div style="background: #626262; text-align: center; widows: 100%;">
        <form action="{{URL::to('/all-product')}}" method="get" enctype="multipart/form-data" class="form-inline md-form mr-auto mb-4">
            {{-- <input type="hidden" name="_token" value="{{ csrf_token()}}"> --}}
            <font color="white" style="font-size: 25px; vertical-align: bottom"><b>Sản Phẩm</b>&nbsp;&nbsp;&nbsp;&nbsp;</font>
            <input style="vertical-align: top" name="search" type="text" class="form-control search" placeholder="Nhập tên hoặc mã SP" value="<?php
                $value = Session::get('value');
                if($value) {
                    echo $value;
                    Session::put('value', null);
                }
            ?>">
        </form><br>
    </div>
    <div class="table-responsive" style="text-align: center">
        <a href="#" style="color: red;font-size:20px">
            <?php
            $message = Session::get('message');
            if($message){
            echo $message;
            Session::put('message',null);// chi cho phep in ra 1 lan
            }
            // thong bao trang thai chon file anh
            $messageEditProduct = Session::get('messageEditProduct');
                if($messageEditProduct){
                    echo $messageEditProduct;
                    Session::put('messageEditProduct',null);// chi cho phep in ra 1 lan
                }
            ?>
        </a>
        <table class="table table-striped table-bordered">
            <thead style="background: #ddede0 ">
            <tr>
                <th style="text-align: center">STT</th>
                <th style="text-align: center">Mã sản phẩm</th>
                <th style="text-align: center">Ảnh sản phẩm</th>
                <th style="text-align: center">Tên sản phẩm</th>
                <th style="text-align: center">Mô tả</th>
                <th style="text-align: center;width: 150px;">
                    <?php
                        $index = Session::get('index');
                        if($index) {
                    ?>
                        Giá tiền
                    <?php Session::put('index', null);
                        } else {
                    ?>
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
                    <?php
                        }
                    ?>
                </th>
                <th style="text-align: center">Trạng thái</th>
                <th style="text-align: center">Mã danh mục</th>
                <th style="text-align: center">Chức năng</th>
            </tr>
            </thead>
            <tbody><?php $i = 0; ?>
            @foreach($all_product as $key => $prod_pro)
            <tr>
                <td style="text-align: center"><?php $i++; echo $i; ?></td>
                <td style="text-align: center">{{ $prod_pro->id }}</td>
                <td style="text-align: center"><img style="width: 35px;height: 35px" src="public/backend/img_admin/{{ $prod_pro->product_img }}">{{ $prod_pro->product_img }}</td>
                <td style="text-align: center">{{ $prod_pro->product_name }}</td>   {{-- lay ten sp ra --}}
                <td style="text-align: center">{{ $prod_pro->product_desc }}</td>  {{-- mota sp --}}
                <td style="text-align: center">{{ number_format($prod_pro->product_price) }} VND</td>  {{-- gia sp --}}
                <td style="text-align: center"><span class="text-ellipsis">
                <?php
                if($prod_pro->product_status==0){  //trang thai
                ?>
                <a href="{{URL::to('/unactive-product/'.$prod_pro->id)}}"><span class="fa-thumb-styling fa fa-thumbs-down" style="color: red; font-size:20px"></span></a>{{--  an san pham --}}
                <?php
                    }else{
                    ?>
                    <a href="{{URL::to('/active-product/'.$prod_pro->id)}}"><span class="fa-thumb-styling fa fa-thumbs-up" style="color: blue; font-size:20px"></span></a> {{-- hien san pham --}}
                    <?php
                    }
                ?>
                </span></td>
                <td style="text-align: center">{{ $prod_pro->category_id }}</td>
                <td style="text-align: center">
                <a href="{{URL::to('/edit-product/'.$prod_pro->id)}}" class="active" ui-toggle-class="" style="font-size: 17px">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
                <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này không?')" href="{{URL::to('/delete-product/'.$prod_pro->id)}}" class="active" ui-toggle-class=""style="font-size: 17px">
                    <i  class="fa fa-trash text-danger text"></i>
                </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <footer class="panel-footer">
    <div class="row">
        <div class="col-sm-5 text-center">
        <small class="text-muted inline m-t-sm m-b-sm"></small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">
            <!-- Phân trang -->
            <?php
                $paginate = Session::get('paginate');
                if($paginate) {
            ?>
                {!! $all_product->links() !!}
            <?php
                Session::put('paginate', null); }
            ?>
        </div>
    </div>
    </footer>
</div>
</div>
@endsection
