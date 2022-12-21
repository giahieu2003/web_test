<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/index');
    }
    public function login()
    {
        // dd (bcrypt(123456));
        return view('admin/login'); 
    }

    public function check_login(Request $req)
    {
       $form_data = $req->only('email','password');
       $check = Auth::attempt($form_data, $req->has('remember'));

       if ($check) {
            return redirect()->route('admin.index')->with('yes', 'Chào mừng trở lại');
       }

       return redirect()->back()->with('no', 'Tài khoản hoặc mật khảu không chính xác');

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('yes', 'Đăng xuất thành công, vui lòng đăng nhập lại');
    }
    
    public function profile()
    {
        $auth = Auth::user();
        // dd ($auth);
        return view('admin.profile', compact('auth'));
    }
 

    public function update_profile(Request $req)
    {
        $auth = Auth::user();
        $req->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                'unique:users,email,'.$auth->id, 
            ],
            'password' => [
                'required',
                function($attribute, $value, $fail) use($req, $auth) {
                    if (!Hash::check($req->password, $auth->password)) {
                        $fail('Mật khẩu bạn nhập không chính xác');
                    }
                }
            ]
        ]);

        $form_data = $req->only('name','email');
        
        if ($auth->update($form_data)) {
            return redirect()->back()->with('yes', 'Cập nhật profile thành công');
        }

        return redirect()->back()->with('no', 'Cập nhật profile không thành công');
    }

    public function change_password()
    {
        return view('admin.change_password');
    }

    public function update_password(Request $req)
    {
        $auth = Auth::user();
        $req->validate([
            'old_password' => [
                'required',
                function($attribute, $value, $fail) use($req, $auth) {
                    if (!Hash::check($req->old_password, $auth->password)) {
                        $fail('Mật khẩu bạn nhập không chính xác');
                    }
                }
            ],
            'new_password' => 'required|different:old_password',
            'confirm_new_password' => 'required|same:new_password'
        ]);

        $form_data = [
            'password' => bcrypt($req->new_password)
        ];
        
        if ($auth->update($form_data)) {
            Auth::logout();
            return redirect()->route('admin.login')->with('yes', 'Cập nhật mật khẩu thành công');
        }

        return redirect()->back()->with('no', 'Cập nhật mật khẩu không thành công');
    }
}
