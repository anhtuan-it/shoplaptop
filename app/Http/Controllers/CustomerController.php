<?php

namespace App\Http\Controllers;

use App\Customers;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Orders;
use App\OrderDetails;
use Carbon\Traits\Timestamp;
use Illuminate\Support\Facades\Redirect;
session_start();

class CustomerController extends Controller
{
    // phan customer danh cho admin
    //*
    //** */
    public function all_customer(Request $request){
        // tim kiem khach hang
        if($request->isMethod('get')) {
            $search = $request->search;
            if($search) {
                Session::put('value', $search);
                $all_customer = DB::table('tbl_customer')->where('customer_name', 'like', '%'.$search.'%')->orWhere('customer_phone', 'like', '%'.$search.'%')->get();
                $manager_customer = view('admin.all_customer')->with('all_customer',$all_customer);
                return view('admin_layout')->with('admin.all_customer',$manager_customer);
            }
        }
        $all_customer = DB::table('tbl_customer')->get();// lay ra all du lieu
        $manager_customer = view('admin.all_customer')->with('all_customer',$all_customer);
        return view('admin_layout')->with('admin.all_customer',$manager_customer);
    }
    public function edit_customer($customer_id){
        $edit_customer = DB::table('tbl_customer')->where('customer_id',$customer_id)->get(); // where dieu kien
        $manager_customer = view('admin.edit_customer')->with('edit_customer',$edit_customer);
        return view('admin_layout')->with('admin.edit_customer',$manager_customer);
    }
    public function update_customer(Request $request,$customer_id){
        $data = array();
        $data['customer_account'] = $request->customer_account;
        $data['customer_password'] = $request->customer_password;
        $data['customer_name'] = $request->customer_name;
        $data['customer_address'] = $request->customer_address;
        $data['customer_phone'] = $request->customer_phone;
        DB::table('tbl_customer')->where('customer_id',$customer_id)->update($data);
        return Redirect::to('all-customer');  // tra ve lai all customer
    }
    public function delete_customer($customer_id){
        DB::table('tbl_customer')->where('customer_id',$customer_id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công!');
        return Redirect::to('all-customer');  // tra ve lai all customer
    }
    // lich su mua hang
        public function orderHistory($customer_id) {
            $customer = DB::table('tbl_customer')->where('customer_id', $customer_id)->get();
            $history = DB::table('orders')
            ->join('tbl_customer', 'orders.customer_id', '=', 'tbl_customer.customer_id')->where('orders.customer_id', $customer_id)->select('*')->orderBy('orders.order_status', 'asc')->paginate(10);
            return view('admin.order-history', compact('history', 'customer'));
        }
    // chi tiet lich su mua hang
        public function orderHistoryDetail($order_id) {
            // lay du lieu 3 table (customer, orders, order_detail)
            $db_join = DB::table('tbl_customer')
            ->join('orders', 'tbl_customer.customer_id', '=', 'orders.customer_id')
            ->where('orders.order_id', $order_id)->select('tbl_customer.customer_name', 'tbl_customer.customer_phone', 'tbl_customer.customer_address', 'orders.order_status')->get();
            // lay du lieu table order_details
            $db_order_detail = DB::table('order_details')
            ->where('order_id', $order_id)->select('*')->get();
            // lay du lieu ban orders
            $db_order = DB::table('orders')->where('order_id', $order_id)->select('*')->get();
            return view('admin.order-history-detail', compact('db_order_detail','db_order', 'db_join'));
        }
    // quan ly don dat hang
    //*
    //** */
        // don hang
            public function orderManager() {
                $db_order = DB::table('orders')
                ->join('tbl_customer', 'orders.customer_id', '=', 'tbl_customer.customer_id')
                ->where('order_status', 0)->select('*')->paginate(10);
                return view('admin.order_manager', compact('db_order'));
            }
        // chi tiet don hang
            public function orderDetailManager(Request $request) {
                // lay du lieu 3 table (customer, orders, order_detail)
                $db_join = DB::table('tbl_customer')
                ->join('orders', 'tbl_customer.customer_id', '=', 'orders.customer_id')
                ->where('orders.order_id', $request->order_id)->select('tbl_customer.customer_name', 'tbl_customer.customer_phone', 'tbl_customer.customer_address', 'orders.order_status')->get();
                // lay du lieu table order_details
                $db_order_detail = DB::table('order_details')
                ->where('order_id', $request->order_id)->select('*')->get();
                // lay du lieu ban orders
                $db_order = DB::table('orders')->where('order_id', $request->order_id)->select('*')->get();
                return view('admin.order-detail-manager', compact('db_order_detail','db_order', 'db_join'));
            }
        // xac nhan don hang
            public function verifyOrder($order_id) {
                DB::table('orders')->where('order_id', $order_id)->update(['order_status' => 1]);
                return Redirect::to('/order-manager');
            }
        // giao dien trang don hang dang van chuyen
            public function orderManagerVerified() {
                $db = DB::table('orders')
                ->join('tbl_customer', 'orders.customer_id', '=', 'tbl_customer.customer_id')
                ->where('order_status', 1)->select('*')->paginate(10);
                return view('admin.order_manager_verified', compact('db'));
            }
        // giao dien trang don hang da giao
            public function orderManagerSuccessfully(Request $request) {
                // tim kiem đơn hàng
                if($request->isMethod('get')) {
                    $search = $request->search;
                    if($search) {
                        Session::put('value', $search);
                        $db = DB::table('orders')
                ->join('tbl_customer', 'orders.customer_id', '=', 'tbl_customer.customer_id')
                ->where('orders.order_status', 2)->where('tbl_customer.customer_phone', 'like', '%'.$search.'%' )->orWhere('orders.order_id', 'like', '%'.$search.'%')->get();
                        return view('admin.order_manager_successfully', compact('db'));
                    }
                }
                $db = DB::table('orders')
                ->join('tbl_customer', 'orders.customer_id', '=', 'tbl_customer.customer_id')
                ->where('order_status', 2)->select('*')->get();
                return view('admin.order_manager_successfully', compact('db'));
            }
        // huy don hang
            public function cancelOrder($order_id) {
                DB::table('orders')->where('order_id', $order_id)->delete();
                return Redirect::to('/order-manager');
            }
        // giao hang thanh cong
            public function successOrder($order_id) {
                DB::table('orders')->where('order_id', $order_id)->update(['order_status' => 2]);
                return Redirect::to('/order-manager-verified');
            }
        // giao dien trang thu hoi don hang
            public function orderManagerCallBack(Request $request) {
                // tim kiem đơn hàng
                if($request->isMethod('get')) {
                    $search = $request->search;
                    if($search) {
                        Session::put('value', $search);
                        $db = DB::table('orders')
                        ->join('tbl_customer', 'orders.customer_id', '=', 'tbl_customer.customer_id')
                        ->where('orders.order_status', 3)->where('tbl_customer.customer_phone', 'like', '%'.$search.'%' )->orWhere('orders.order_id', 'like', '%'.$search.'%')->get();
                        return view('admin.order-manager-callback', compact('db'));
                    }
                }
                $db = DB::table('orders')
                ->join('tbl_customer', 'orders.customer_id', '=', 'tbl_customer.customer_id')
                ->where('order_status', 3)->select('*')->get();
                return view('admin.order-manager-callback', compact('db'));
            }
        // thu hoi don hang
            public function orderCallBack($order_id) {
                DB::table('orders')->where('order_id', $order_id)->update(['order_status' => 3]);
                return Redirect::to('/order-manager-callback');
            }
    // end
    //*
    //** */
    //* phan login danh cho khach hang
    //** */
        public function signup() {
            return view('customer.reg');
        }
        public function signin() {
            return view('customer.login');
        }
        // dang ky tai khoan khach hang
        public function addAcc(Request $request) {
            // Lay thong tin khach hang tu form dang ky
            $tenTaiKhoan = $request->nameAcc;
            $matKhau = $request->pass;
            $nhapLaiMatKhau = $request->re_pass;
            $hoTen = $request->name;
            $diaChi = $request->address;
            $sdt = $request->phone;
            // lay thong tin khach hang da dang ky
            $customer = DB::table('tbl_customer')->where('customer_account', $tenTaiKhoan)->select('*')->get();
            foreach ($customer as $value) {
                $acc = $value->customer_account;
            }
            // kiem tra thong tin khach hang
            if(isset($acc)) {
                Session::put('mess', 'Đã có tên tài khoản này!');
                return Redirect::to('/signup');
            } else {
                // kiem tra thong tin khach hang va mat khau da nhap vao from
                if($matKhau != $nhapLaiMatKhau) {
                    Session::put('mess', 'Mật khẩu đã nhập không khớp!');
                    return Redirect::to('/signup');
                } else if(($tenTaiKhoan == '') || ($matKhau == '') || ($nhapLaiMatKhau == '') || ($hoTen == '') || ($diaChi == '') || ($sdt == '')) {
                    Session::put('mess', 'Chưa nhập đủ thông tin!');
                    return Redirect::to('/signup');
                } {
                    // luu thong tin khach hang dang ky vao csdl
                    $customer = array();
                    $customer['customer_account'] = $tenTaiKhoan;
                    $customer['customer_password'] = md5($matKhau);
                    $customer['customer_name'] = $hoTen;
                    $customer['customer_phone'] = $sdt;
                    $customer['customer_address'] = $diaChi;
                    DB::table('tbl_customer')->insert($customer);
                    Session::put('mess', 'Đăng ký tài khoản thành công!');
                    return Redirect::to('/signin');
                }
            }
        }
        // trang dang nhap cua khach hang
        public function login(Request $request) {
            // lay thong tin dang nhap cua khach hang tu form
            $taiKhoan = $request->your_name;
            $matKhau = md5($request->your_pass);
            // truy van csdl
            $result = DB::table('tbl_customer')->where('customer_account',$taiKhoan)->where('customer_password',$matKhau)->first();
            if($result) {
                Session::put('customer_name',$result->customer_name);
                Session::put('customer_id',$result->customer_id);
                return Redirect::to('/show-cart');
            } else {
                Session::put('mess', 'Sai tên tài khoản hoặc mật khẩu!');
                return Redirect::to('/signin');
            }
        }
        // trang quan ly don hang cua khach hang
        public function customer() {
            $customer_id = Session::get('customer_id');
            $Product = DB::table('orders')->where('customer_id', $customer_id)->select('*')->get();
            return view('pages.customer', compact('Product'));
        }
        // trang thong tin cua khach hang
        public function infoCustomer() {
            $customer_id = Session::get('customer_id');
            $Product = DB::table('tbl_customer')->where('customer_id', $customer_id)->select('*')->get();
            return view('customer.info-customer', compact('Product'));
        }
        // cap nhat thong tin khach hang
        public function update_info_customer(Request $request) {
            // lay id khach hang
            $customer_id = Session::get('customer_id');
            // lay thong tin khach hang tu form giao dien
            $mkcu = md5($request->old_pass);
            $mkmoi = $request->new_pass;
            $re_mkmoi = $request->re_new_pass;
            $hoTen = $request->name;
            $sdt = $request->phone;
            $diaChi = $request->address;
            // cap nhat thong tin ten, sdt, dia chi
            if(isset($hoTen) && isset($sdt) && isset($diaChi)) {
                // luu thong tin khach hang vao csdl
                $customer = array();
                $customer['customer_name'] = $hoTen;
                $customer['customer_phone'] = $sdt;
                $customer['customer_address'] = $diaChi;
                DB::table('tbl_customer')->where('customer_id', $customer_id)->update($customer);
                Session::put('mess', 'Cập nhật thông tin tài khoản thành công!');
                return Redirect::to('/info-customer');
            } else if(isset($mkcu) && isset($mkmoi) && isset($re_mkmoi)) { // cap nhat mat khau khach hang
                // lay mat khau hien tai cua khach hang
                $result = DB::table('tbl_customer')->where('customer_id', $customer_id)->where('customer_password', $mkcu)->first();
                // lay thong tin khach hang
                $select = DB::table('tbl_customer')->where('customer_id', $customer_id)->select('*')->get();
                foreach ($select as $value) {
                    $hoTen = $value->customer_name;
                    $sdt = $value->customer_phone;
                    $diaChi = $value->customer_address;
                }
                if($result) { // neu lay duoc mat khau
                    if($mkmoi == $re_mkmoi) { // kiem tra su trung khop mat khau moi nhap
                        $customer = array();
                        $customer['customer_password'] = md5($mkmoi);
                        $customer['customer_name'] = $hoTen;
                        $customer['customer_phone'] = $sdt;
                        $customer['customer_address'] = $diaChi;
                        DB::table('tbl_customer')->where('customer_id', $customer_id)->update($customer);
                        Session::put('mess', 'Cập nhật mật khẩu tài khoản thành công!');
                        return Redirect::to('/info-customer');
                    } else {
                        Session::put('mess', 'Mật khẩu mới đã nhập không trùng!');
                        return Redirect::to('/info-customer');
                    }
                } else {
                    Session::put('mess', 'Mật khẩu cũ không đúng!');
                    return Redirect::to('/info-customer');
                }
            } else {
                Session::put('mess', 'Bạn chưa nhập đủ thông tin cần thiết!');
                return Redirect::to('/info-customer');
            }
        }
        // cap nhat mat khau khach hang
        public function update_pass_customer(Request $request) {
            // lay id khach hang
            $customer_id = Session::get('customer_id');
            // lay thong tin khach hang tu form giao dien
            $mkcu = md5($request->old_pass);
            $mkmoi = $request->new_pass;
            $re_mkmoi = $request->re_new_pass;
            // cap nhat mat khau khach hang
            if(isset($mkcu) && isset($mkmoi) && isset($re_mkmoi)) {
                $result = DB::table('tbl_customer')->where('customer_id', $customer_id)->where('customer_password', $mkcu)->first();
                if($result) {
                    if($mkmoi == $re_mkmoi) {
                        $customer = array();
                        $customer['customer_password'] = md5($mkmoi);
                        DB::table('tbl_customer')->where('customer_id', $customer_id)->update($customer);
                        Session::put('mess', 'Cập nhật mật khẩu tài khoản thành công!');
                        return Redirect::to('/info-customer');
                    } else {
                        Session::put('mess', 'Mật khẩu mới đã nhập không trùng!');
                        return Redirect::to('/info-customer');
                    }
                } else {
                    Session::put('mess', 'Bạn chưa nhập thông tin mật khẩu!');
                    return Redirect::to('/info-customer');
                }
            }
        }
        // dang xuat tai khoan khach hang
        public function logoutCustomer() {
            Session::put('customer_name',null);
            Session::put('customer_id',null);
            return Redirect::to('/');
        }
        // luu don dat hang vao csdl
        public function saveOrder(Request $request) {
            // lay id khach hang da dang nhap
            $customer_id = Session::get('customer_id');
            $content = Cart::content();
            // tao random ma don dat hang voi so va chu
            $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
            $maDonHang = substr(str_shuffle($permitted_chars), 0, 20);
            // tbl_order
                //*
                //** */
                    // lay tong tien thanh toan sau thue
                    $totalPrice = Cart::subtotal(null, null,'');
                    // gan model order vao bien
                    $db_order = new Orders();
                    // thuc thi luu thong tin vao csdl
                    $db_order->order_id = $maDonHang;
                    $db_order->customer_id = $customer_id;
                    $db_order->order_total_price = $totalPrice;
                    $db_order->order_status = 0;
                    $db_order->save();
                // end tbl_order
                //*
                //** */
            // vong lap lay thong tin san pham da them vao gio hang
            foreach ($content as $value) {
                // tbl_order_detail
                //*
                //** */
                    // lay thong tin san pham da them vao gio hang
                    $product_id = $value->id;
                    $product_img = $value->options->image;
                    $product_name = $value->name;
                    $product_qty = $value->qty;
                    $product_price = $value->price;
                    $thanhTien = $value->qty * $value->price;
                    // gan model Order vao bien
                    $db_order_detail = new OrderDetails();
                    // thuc thi luu thong tin vao csdl
                    $db_order_detail->order_id = $db_order->order_id;
                    $db_order_detail->order_product_id = $product_id;
                    $db_order_detail->order_product_image = $product_img;
                    $db_order_detail->order_product_name = $product_name;
                    $db_order_detail->order_qty = $product_qty;
                    $db_order_detail->order_product_price = $product_price;
                    $db_order_detail->order_total_price = $thanhTien;
                    $db_order_detail->save();
                // end tbl_order_detail
                //*
                //** */
            }
            Cart::destroy();
            return Redirect::to('/customer');
        }
        // chi tiet don dat hang
        public function orderDetail(Request $request) {
            $Product = DB::table('order_details')->where('order_id', $request->order_id)->get();
            return view('pages.order_detail')->with('Product', $Product);
        }
        // huy don dat hang
        public function deleteOrder(Request $request) {
            DB::table('orders')->where('order_id', $request->order_id)->delete();
            return Redirect::to('/customer');
        }
    //end
    //** */
}
