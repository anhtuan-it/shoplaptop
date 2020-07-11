<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Input, File;
use App\Http\Requests;
use App\Http\Requests\UploadFileRequest;
use Illuminate\Support\Facades\Redirect;
session_start();

    class Product extends Controller
    {
        public function add_product(){
            $select = DB::table('tbl_category_product')->select('*')->get();
            return view('admin.add_product')->with('select', $select);
        }
        public function all_product(Request $request){
            // sap xep gia tien san pham
            if($request->asc_desc) {
                $selected = $request->asc_desc;
                switch($selected) {
                    case 'asc':
                        $all_product = DB::table('tbl_product')->orderBy('product_price', 'asc')->get();// lay ra all du lieu
                        $manager_product = view('admin.all_product')->with('all_product',$all_product);
                        return view('admin_layout')->with('admin.all_product',$manager_product);
                    break;
                    case 'desc':
                        $all_product = DB::table('tbl_product')->orderBy('product_price', 'desc')->get();// lay ra all du lieu
                        $manager_product = view('admin.all_product')->with('all_product',$all_product);
                        return view('admin_layout')->with('admin.all_product',$manager_product);
                    break;
                    default:
                        $all_product = DB::table('tbl_product')->paginate(10);// lay ra all du lieu
                        $manager_product = view('admin.all_product')->with('all_product',$all_product);
                        return view('admin_layout')->with('admin.all_product',$manager_product);
                    break;
                }
            } else {
                // tim kiem san pham
                if($request->isMethod('get')) {
                    $search = $request->search;
                    if($search) {
                        Session::put('value', $search);
                        Session::put('index', 'check');
                        $all_product = DB::table('tbl_product')->where('id', 'like', '%'.$search.'%')->orWhere('product_name', 'like', '%'.$search.'%')->get();
                        $manager_product = view('admin.all_product')->with('all_product',$all_product);
                        return view('admin_layout')->with('admin.all_product',$manager_product);
                    }
                }
                Session::put('paginate', '{!! $all_product->links() !!}');
                $all_product = DB::table('tbl_product')->orderBy('product_name', 'desc')->paginate(10);
                $manager_product = view('admin.all_product')->with('all_product',$all_product);
                return view('admin_layout')->with('admin.all_product',$manager_product);
            }
        }
        // ham tim kiem san pham
        /*public function all_product_search(Request $request) {
            if($request->isMethod('get')) {
                $search = $request->search;
                if($search) {
                    Session::put('value', $search);
                    $all_product = DB::table('tbl_product')->where('product_name', 'like', '%'.$search.'%')->get();
                    $manager_product = view('admin.all_product')->with('all_product',$all_product);
                    return view('admin_layout')->with('admin.all_product',$manager_product);
                }
            }
        }*/
        public function save_product(UploadFileRequest $request){  //request la yeu cau
            $data = array();  // khai bao 1 chuoi
            if(empty($request->product_name) || empty($request->product_desc) || empty($request->product_price) || empty($request->category_id) || empty($request->chip) || empty($request->ram) || empty($request->weight) || empty($request->hard_drive)) {
                Session::put('message','Chưa nhập đủ thông tin!');
                return Redirect::to('add-product');
            } else {
                // ham upload file hinh anh
                if($request->hasFile('product_img')) {
                    $file_name = $request->file('product_img')->getClientOriginalName();
                    $request->file('product_img')->move('public/backend/img_admin', $file_name);
                    $data['product_img'] = $file_name;
                    $data['product_name'] = $request->product_name;// lay tu add_category_name xong them vao tbl_category cua category_name
                    $data['product_desc'] = $request->product_desc;
                    $data['product_price'] = $request->product_price;
                    $data['product_status'] = $request->product_status;
                    $data['category_id'] = $request->category_id;
                    $data['chip'] = $request->chip;
                    $data['ram'] = $request->ram;
                    $data['weight'] = $request->weight;
                    $data['hard_drive'] = $request->hard_drive;
                    DB::table('tbl_product')->insert($data);  // chen du lieu vao table
                    Session::put('message','Thêm sản phẩm thành công!'); // tao 1 bien sesstion de thong bao
                    return Redirect::to('add-product');
                } else {
                    Session::put('messageUploadFile','Chưa chọn File hình ảnh!');
                    return Redirect::to('add-product');
                }
            }
        }
        public function unactive_product($product_id){
            DB::table('tbl_product')->where('id',$product_id)->update(['product_status'=>1]);  // khi click vao no se so snh vs id -> cho no bang 0
            Session::put('message','Kích hoạt sản phẩm thành công!');
            return Redirect::to('all-product');  // tra ve lai all category
        }
        public function active_product($product_id){
            DB::table('tbl_product')->where('id',$product_id)->update(['product_status'=>0]);  // khi click vao no se so snh vs id -> cho no bang 1
            Session::put('message','Không kích hoạt sản phẩm thành công!');
            return Redirect::to('all-product');  // tra ve lai all category
        }
        public function edit_product($product_id){
            $edit_product = DB::table('tbl_product')->where('id',$product_id)->get(); // where dieu kien
            $select = DB::table('tbl_category_product')->select('*')->get();
            $manager_product = view('admin.edit_product', compact('select'))->with('edit_product',$edit_product);
            return view('admin_layout')->with('admin.edit_product',$manager_product);
        }
        public function update_product(Request $request,$product_id){
            $data = array();
            if($request->isMethod('post')) {
                // ham upload file hinh anh
                if($request->hasFile('product_img')) {
                    $file_name = $request->file('product_img')->getClientOriginalName();
                    $request->file('product_img')->move('public/backend/img_admin', $file_name);
                    $data['product_img'] = $file_name;
                    $data['product_name'] = $request->product_name;// lay tu add_category_name xong them vao tbl_category cua category_name
                    $data['product_desc'] = $request->product_desc;
                    $data['product_price'] = $request->product_price;
                    $data['category_id'] = $request->category_id;
                    $data['chip'] = $request->chip;
                    $data['ram'] = $request->ram;
                    $data['weight'] = $request->weight;
                    $data['hard_drive'] = $request->hard_drive;
                    DB::table('tbl_product')->where('id',$product_id)->update($data);
                    Session::put('message','Cập nhật sản phẩm thành công!');
                    return Redirect::to('all-product');  // tra ve lai all category
                } else {
                        $select = DB::table('tbl_product')->select('*')->get();
                        foreach ($select as $value) {
                            $product_img = $value->product_img;
                        }
                        $data['product_img'] = $product_img;
                        $data['product_name'] = $request->product_name;// lay tu add_category_name xong them vao tbl_category cua category_name
                        $data['product_desc'] = $request->product_desc;
                        $data['product_price'] = $request->product_price;
                        $data['category_id'] = $request->category_id;
                        $data['chip'] = $request->chip;
                        $data['ram'] = $request->ram;
                        $data['weight'] = $request->weight;
                        $data['hard_drive'] = $request->hard_drive;
                        DB::table('tbl_product')->where('id',$product_id)->update($data);
                        Session::put('message','Cập nhật sản phẩm thành công!');
                        return Redirect::to('all-product');
                    }
            }
        }
        public function delete_product($product_id){
            DB::table('tbl_product')->where('id',$product_id)->delete();
            Session::put('message','Xóa danh phẩm thành công!');
            return Redirect::to('all-product');  // tra ve lai all category
        }
    }
