@extends('admin_layout')  {{-- trang nay de lay giao dien --}}
@section('admin_content')  {{-- con day la phan code cua tung trang  --}}
<div class="panel panel-default">
    <div class="panel-heading">
    Danh Mục Sản Phẩm
    </div>
    <div class="table-responsive">
        <div style="text-align: center; background: #ddede0"><br>
            <font style="color: red;font-size:20px">
                <?php
                $message = Session::get('message');
                $mess = Session::get('notiAddCategory');
                if($message || $mess){
                echo $message;
                echo $mess;
                Session::put('message',null);
                Session::put('notiAddCategory',null);
                }
                ?>
            </font>
        </div>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th style="text-align: center">STT</th>
            <th style="text-align: center">Mã danh mục</th>
            <th style="text-align: center">Trạng thái</th>
            <th style="text-align: center">Chức năng</th>
        </tr>
        </thead>
        <tbody><?php $i = 0; ?>
        @foreach($all_category_product as $key => $cate_pro)
        <tr>
            <td style="text-align: center"><?php $i++; echo $i; ?></td>
            <td style="text-align: center">{{ $cate_pro->category_id }}</td>
            <td style="text-align: center"><span class="text-ellipsis">
            <?php
            if($cate_pro->category_status==0){  //trang thai
            ?>
            <a href="{{URL::to('/unactive-category-product/'.$cate_pro->category_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down" style="color: red; font-size:20px"></span></a>{{--  an danh muc --}}
            <?php
                }else{
                ?>
                <a href="{{URL::to('/active-category-product/'.$cate_pro->category_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up" style="color: blue; font-size:20px"></span></a> {{-- hien danh muc --}}
                <?php
                }
            ?>
            </span></td>
            <td style="text-align: center">
            <a href="{{URL::to('/edit-category-product/'.$cate_pro->category_id)}}" class="active" ui-toggle-class="" style="font-size: 17px">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
            </a>
            <a onclick="return confirm('Bạn có chắc là muốn xóa danh mục này không?')" href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}" class="active" ui-toggle-class=""style="font-size: 17px">
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
            {!! $all_category_product->links() !!}
        </div>
    </div>
    </footer>
</div>
</div>
@endsection
