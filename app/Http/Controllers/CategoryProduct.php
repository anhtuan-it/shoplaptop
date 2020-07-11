<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    public function add_category_product(){
        return view('admin.add_category_product'); //vao admin lay add...
    }

    public function all_category_product(){
        $all_category_product = DB::table('tbl_category_product')->paginate(10);// lay ra all du lieu
        $manager_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product);
        return view('admin_layout')->with('admin.all_category_product',$manager_category_product);
    }
    public function save_category_product(Request $request){  //request la yeu cau
        $data = array();  // khai bao 1 chuoi
        if(empty($request->category_product_id)) {
            Session::put('notiAddCategory', 'Chưa nhập mã danh mục sản phẩm!');
            return Redirect::to('add-category-product');
        } else {
            $data['category_id'] = $request->category_product_id;
            $data['category_status'] = $request->category_product_status;
            DB::table('tbl_category_product')->insert($data);  // chen du lieu vao table
            Session::put('notiAddCategory','Thêm danh mục sản phẩm thành công!'); // tao 1 bien sesstion de thong bao
            return Redirect::to('all-category-product'); // tra ve
        }
    }
    public function unactive_category_product($category_product_id){
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);  // khi click vao no se so snh vs id -> cho no bang 0
        Session::put('message','Kích hoạt danh mục sản phẩm thành công!');
        return Redirect::to('all-category-product');  // tra ve lai all category

    }
    public function active_category_product($category_product_id){
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);  // khi click vao no se so snh vs id -> cho no bang 1
        Session::put('message','Không kích hoạt danh mục sản phẩm thành công!');
        return Redirect::to('all-category-product');  // tra ve lai all category
    }
    public function edit_category_product($category_product_id){
        $edit_category_product = DB::table('tbl_category_product')->where('category_id',$category_product_id)->get(); // where dieu kien
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product',$manager_category_product);
    }
    public function update_category_product(Request $request,$category_product_id){
        $data = array();
        $data['category_id'] = $request->category_product_name;
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
        Session::put('message','Cập nhật danh mục sản phẩm thành công!');
        return Redirect::to('all-category-product');  // tra ve lai all category
    }
    public function delete_category_product($category_product_id){
        DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công!');
        return Redirect::to('all-category-product');  // tra ve lai all category
    }
}
