<?php

namespace App\Http\Controllers;
//trang controller de sxu ly code va su kien
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{

    // Hàm kiểm tra trạng thái đăng nhập
    public function authLogin() {
        $id = Session::get('admin_id');
        if($id) {
            return Redirect::to('/dashboard');
        } else {
            return Redirect::to('/admin-login')->send();
        }
    }

    public function index(){
        return view('admin_login');
    }
    public function show_dashboard(){
        $this->authLogin();
        return view('admin.dashboard');    //vao admin xong nhan trang dashboard
    }
    public function dashboard(Request $request){
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
    if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');  // neeus dung se lay thong tin va tra ve trang dashboard
        }// neu ngdung nhap sai
        else{
            Session::put('message','Mật Khẩu hoặc tài khoản bị sai. hãy đăng nhập lại!');
            return Redirect::to('/admin-login'); // neu sai se tro ve trang admin_login
        }
    }
    public function logout(){
        $this->authLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin-login');  // huong den trang admin (redirect)
    }
    // quan ly tai khoan admin
    public function adminManager() {
        $admin = DB::table('tbl_admin')->get();
        return view('admin.admin-manager', compact('admin'));
    }
    // edit tai khoan admin
    public function editAdmin($admin_id) {
        $editAdmin = DB::table('tbl_admin')->where('admin_id',$admin_id)->get(); // where dieu kien
        $manager_admin = view('admin.edit-admin')->with('editAdmin',$editAdmin);
        return view('admin_layout')->with('admin.edit-admin',$manager_admin);
    }
    // update tai khoan admin
    public function updateAdmin(Request $request, $admin_id) {
        $data = array();
        $new_pass = $request->admin_password_new;
        if($new_pass == null) {
            $data['admin_email'] = $request->admin_email;
            $data['admin_name'] = $request->admin_name;
            $data['admin_phone'] = $request->admin_phone;
            DB::table('tbl_admin')->where('admin_id',$admin_id)->update($data);
            Session::put('message','Cập nhật tài khoản Admin thành công!');
            return Redirect::to('admin-manager');
        } else {
            $data['admin_email'] = $request->admin_email;
            $data['admin_password'] = md5($new_pass);
            $data['admin_name'] = $request->admin_name;
            $data['admin_phone'] = $request->admin_phone;
            DB::table('tbl_admin')->where('admin_id',$admin_id)->update($data);
            Session::put('message','Cập nhật tài khoản Admin thành công!');
            return Redirect::to('admin-manager');
        }
    }
    // xoa tai khoan admin
    public function deleteAdmin($admin_id) {
        DB::table('tbl_admin')->where('admin_id',$admin_id)->delete();
        Session::put('message','Xóa tài khoản Admin thành công!');
        return Redirect::to('admin-manager');
    }
}
