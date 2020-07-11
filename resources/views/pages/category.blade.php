@extends('layout')
@section('a')
<div class="panel-group category-products" id="accordian"><!--category-productsr-->
    <div class="panel panel-default">
        @foreach($Category as $cg)
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                    {{$cg->category_name}}
                </a>
            </h4>
        </div>
        @endforeach
    </div>
</div><!--/category-p
@endsection
