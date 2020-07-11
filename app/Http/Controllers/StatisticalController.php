<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StatisticalController extends Controller
{
    public function hangCon(Request $request) {
        // tim kiem san pham
            $search = $request->search;
            if($search) {
                Session::put('value', $search);
                $product = DB::table('tbl_product')
                ->where('product_status', '=', 1)->Where('product_name', 'like', '%'.$search.'%')->orWhere('id', 'like', '%'.$search.'%')->get();
                return view('admin.statistical.hang-con', compact('product'));
            }
        $product = DB::table('tbl_product')->where('product_status', 1)->get();
        return view('admin.statistical.hang-con', compact('product'));
    }
    public function hangHet(Request $request) {
        // tim kiem san pham
        $search = $request->search;
        if($search) {
            Session::put('value', $search);
            $product = DB::table('tbl_product')
            ->where('product_status', '=', 0)->Where('product_name', 'like', '%'.$search.'%')->orWhere('id', 'like', '%'.$search.'%')->get();
            return view('admin.statistical.hang-het', compact('product'));
        }
        $product = DB::table('tbl_product')->where('product_status', 0)->get();
        return view('admin.statistical.hang-het', compact('product'));
    }
    public function hangDaBan(Request $request) {
        // tim kiem đơn hàng
        if($request->isMethod('get')) {
            $search = $request->search;
            if($search) {
                Session::put('value', $search);
                $orders = DB::table('orders')
                ->join('tbl_customer', 'orders.customer_id', '=', 'tbl_customer.customer_id')
                ->where('orders.order_status', 2)->where('tbl_customer.customer_phone', 'like', '%'.$search.'%' )->orWhere('orders.order_id', 'like', '%'.$search.'%')->get();
                return view('admin.statistical.don-hang-da-ban', compact('orders'));
            }
        }
        $orders = DB::table('orders')->where('order_status', '=', 2)->get();
        return view('admin.statistical.don-hang-da-ban', compact('orders'));
    }
    public function chiTietDonHang(Request $request) {
        // lay du lieu 3 table (customer, orders, order_detail)
        $db_join = DB::table('tbl_customer')
        ->join('orders', 'tbl_customer.customer_id', '=', 'orders.customer_id')
        ->where('orders.order_id', $request->order_id)->select('tbl_customer.customer_name', 'tbl_customer.customer_phone', 'tbl_customer.customer_address', 'orders.order_status')->get();
        // lay du lieu table order_details
        $db_order_detail = DB::table('order_details')
        ->where('order_id', $request->order_id)->select('*')->get();
        // lay du lieu ban orders
        $db_order = DB::table('orders')->where('order_id', $request->order_id)->select('*')->get();
        return view('admin.statistical.chi-tiet-don-hang', compact('db_order_detail','db_order', 'db_join'));
    }
    public function doanhThu(Request $request) {
        // lay thang hien tai
        $currentMonth = Carbon::now()->month;
        // lay nam hien tai
        $currentYear = Carbon::now()->year;
        // lay ngay cuoi cung cua thang hien tai
        $lastCurrentMonth = date("Y-m-t", strtotime("0 month"));
        // lay nam thang hien tai
        $currentYM = $currentYear."-".$currentMonth;
        // tinh doanh thu va so luong don hang da ban theo thang
        $sum = DB::table('orders')->where('order_status', '=', 2)->whereBetween('order_day', [$currentYM.'-01 00:00:00', $lastCurrentMonth.' 23:59:59'])->sum('order_total_price');
        $count = DB::table('orders')->where('order_status', '=', 2)->whereBetween('order_day', [$currentYM.'-01 00:00:00', $lastCurrentMonth.' 23:59:59'])->count('order_status');
        // tinh doanh thu theo nam
        $sumY = DB::table('orders')->where('order_status', '=', 2)->whereBetween('order_day', [$currentYear.'-01-01 00:00:00', $currentYear.'-12-31 23:59:59'])->sum('order_total_price');
        // luu doanh thu vao csdl
            $data = array();
            $dataY = array();
            // check doanh thu thang trong csdl
                $select = DB::table('revenues')->where('thang', $currentYM)->first();
                if($select) { // neu da co doanh thu thang nay thi update du lieu
                    // thuc thi lenh update doanh thu vao csdl
                        $data['tong_doanh_thu'] = $sum;
                        $data['tong_don_hang'] = $count;
                        DB::table('revenues')->where('thang', $currentYM)->update($data);
                } else { // neu chua co doanh thu thang nay thi them vao csdl
                    // thuc thi lenh luu doanh thu vao csdl
                        $data['thang'] = $currentYM;
                        $data['tong_doanh_thu'] = $sum;
                        $data['tong_don_hang'] = $count;
                        DB::table('revenues')->insert($data);
                }
            // check doanh thu nam trong csdl
                $selectY = DB::table('revenue_years')->where('nam', $currentYear)->first();
                if($selectY) { // neu da co doanh thu nam nay thi update du lieu
                    // thuc thi lenh update doanh thu vao csdl
                        $dataY['tong_doanh_thu'] = $sumY;
                        DB::table('revenue_years')->where('nam', $currentYear)->update($dataY);
                } else { // neu chua co doanh thu nam nay thi them vao csdl
                    // thuc thi lenh luu doanh thu vao csdl
                        $dataY['nam'] = $currentYear;
                        $dataY['tong_doanh_thu'] = $sumY;
                        DB::table('revenue_years')->insert($dataY);
                }
        // lich su doanh thu
        $history = DB::table('revenues')->select('*')->orderBy('thang', 'desc')->get();
        $historyY = DB::table('revenue_years')->select('*')->orderBy('nam', 'desc')->get();
        return view('admin.statistical.doanh-thu', compact('sum', 'count', 'currentMonth', 'currentYear', 'history', 'historyY'));
    }
    // chi tiet doanh thu
    public function chiTietDoanhThu(Request $request) {
        // lay thang hien tai
        $currentMonth = Carbon::now()->month;
        // lay nam hien tai
        $currentYear = Carbon::now()->year;
        // lay ngay cuoi cung cua thang hien tai
        $lastCurrentMonth = date("Y-m-t", strtotime("0 month"));
        // lay nam thang hien tai
        $currentYM = $currentYear."-".$currentMonth;
        // xem chi tiet doanh thu
        $order = DB::table('orders')->where('order_status', '=', 2)->whereBetween('order_day', [$currentYM.'-01 00:00:00', $lastCurrentMonth.' 23:59:59'])->get();
        return view('admin.statistical.chi-tiet-doanh-thu-thang', compact('order', 'currentMonth', 'currentYear'));
    }
    // lich su chi tiet doanh thu
    public function lichSuChiTietDoanhThu($thang) {
        $title = DB::table('revenues')->where('thang', $thang)->get();
        // lay ngay cuoi cung cua thang
        $lastCurrentMonth = date($thang."-t", strtotime("0 month"));
        if($thang) {
            $order = DB::table('orders')->where('order_status', '=', 2)->whereBetween('order_day', [$thang.'-01 00:00:00', $lastCurrentMonth.' 23:59:59'])->get();
        }
        return view('admin.statistical.lich-su-chi-tiet-doanh-thu', compact('order', 'title'));
    }
}
