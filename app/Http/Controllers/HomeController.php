<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(Request $request){
        if($request->isMethod('post')) {
            $search = $request->search;
            if($search) {
                Session::put('value', $search);
                $Product = DB::table('tbl_product')->where('product_name', 'like', '%'.$search.'%')->get();
                Session::put('noti', 'Tìm thấy ');
                return view('pages.home',compact('Product'));
            }
        }
        if($request->asc_desc) {
            $selected = $request->asc_desc;
            switch($selected) {
                case 'asc':
                    $Product = DB::table('tbl_product')->orderBy('product_price', 'asc')->get();// lay ra all du lieu
                    return view('pages.home',compact('Product'));
                break;
                case 'desc':
                    $Product = DB::table('tbl_product')->orderBy('product_price', 'desc')->get();// lay ra all du lieu
                    return view('pages.home',compact('Product'));
                break;
                default:
                    $Product = DB::table('tbl_product')->paginate(10);// lay ra all du lieu
                    return view('pages.home',compact('Product'));
                break;
            }
        }
        Session::put('paginate', '{!! $all_product->links() !!}');
        $Product = DB::table('tbl_product')->paginate(9);
        return view('pages.home',compact('Product'));
    }
    public function index1(){
        return view('pages.contacts');
    }
}
