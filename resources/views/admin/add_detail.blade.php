@extends('admin_layout')  {{-- trang nay de lay giao dien --}}
@section('admin_content')  {{-- con day la phan code cua tung trang  --}}
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm chi tiết cho sản phẩm
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
                           
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-detail')}}" method="post">
                                 {{csrf_field()}} {{-- gui du lieu den save-category de xu ly --}}
                                     {{--  giup bao mat hon --}}
                               {{--   <div class="form-group">
                                    <label for="exampleInputEmail1">Mã Khách Hàng </label>
                                    <input type="text" name="product_id" class="form-control" id="exampleInputEmail1" placeholder="Mã sản phẩm">
                                </div> --}}
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Mã sản phẩm</label>
                                    <input type="text" name="id" class="form-control" id="exampleInputEmail1" placeholder="Mã sản phẩm">{{-- category_product_name --}}
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Chip</label>
                                    <input type="text" name="detail_chip" class="form-control" id="exampleInputEmail1" placeholder="Chip">{{-- category_product_name --}}
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Ram</label>
                                    <input type="text" name="detail_ram" class="form-control" id="exampleInputEmail1" placeholder="Ram">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Weight</label>
                                    <input type="text" name="detail_weight" class="form-control" id="exampleInputEmail1" placeholder="Weight">
                                </div>

                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Hard Drive</label>
                                    <input type="text" name="detail_hard_drive" class="form-control" id="exampleInputEmail1" placeholder="Hard Drive">
                                </div>
                               
                                <button type="submit" name="add_detail" class="btn btn-info">Lưu chi tiết</button> 
                            </form>
                            </div>

                        </div>
                    </section>
            </div>
        </div>
@endsection
