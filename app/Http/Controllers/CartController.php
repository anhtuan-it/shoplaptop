<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Input, File;
use App\Http\Requests;
use App\Http\Requests\UploadFileRequest;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
session_start();
class CartController extends Controller
{
    public function save_cart(Request $request){


        $productId = $request->productid_hidden;//laays 2 truong tu bang trang detail
        $quantity = $request->qty;

        $product_info = DB::table('tbl_product')->where('id',$productId)->first();//lay duoc tat ca cac thong tin dua vao id



        //Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        //Cart::destroy();//huy phien session
        $data['id'] = $product_info->id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = $product_info->product_price;
        $data['options']['image'] = $product_info->product_img;
        Cart::add($data);
        return Redirect::to('show-cart');//sau khi them cao gio hang thi tr lai show_cart

    }
    public function show_cart(){
        $category = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        return view('pages.show_cart')->with('category',$category);
    }

    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('show-cart');//sau khi xoa sp gio hang thi tr lai show_cart
    }

    public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('show-cart');
    }
}
