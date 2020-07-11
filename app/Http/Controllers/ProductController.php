<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
//hiển thị danh mục sản phẩm
    public function category(Request $request ,$id){
        // sap xep gia tien san pham
        if($request->asc_desc) {
            $selected = $request->asc_desc;
            switch($selected) {
                case 'asc':
                    $Product = DB::table('tbl_product')->where('category_id',$id)->orderBy('product_price', 'asc')->get();// lay ra all du lieu
                    return view('pages.category_product',['Product'=>$Product]);
                break;
                case 'desc':
                    $Product = DB::table('tbl_product')->where('category_id',$id)->orderBy('product_price', 'desc')->get();// lay ra all du lieu
                    return view('pages.category_product',['Product'=>$Product]);
                break;
                default:
                    $Product = DB::table('tbl_product')->where('category_id',$id)->get();// lay ra all du lieu
                    return view('pages.category_product',['Product'=>$Product]);
                break;
            }
        }
        $Product = DB::table('tbl_product')->where('category_id',$id)->get();//phân trang
        return view('pages.category_product',['Product'=>$Product]);
    }
//hiển thị trang chi tiết sp
    public function detail_product(Request $request, $id){
        $Product = DB::table('tbl_product')->where('id',$id)->select('*')->get();
        return view('pages.detail_product',compact('Product'));
    }
}
