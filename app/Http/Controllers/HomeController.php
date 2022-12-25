<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Mail\ContactMail;
use App\Mail\VerifyCustomerAccount;
use App\Models\Category;
use App\Models\Product;
use App\Models\PasswordReset;
use Illuminate\Http\Request;
use Mail;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        
        $cats = Category::paginate(6);
        return view('home', compact('cats'));
    }

    public function product()
    {
        $cats = Category::get();
        $products = Product::paginate(12);
        return view('product', compact('cats','products'));
    }

    public function login()
    {
        return view('login-register');
    }

    public function check_login(Request $req)
    {
       $form_data = $req->only('email','password');
       $check = Auth::guard('cus')->attempt($form_data, $req->has('remember'));

       if ($check) {
            return redirect()->route('home.index')->with('yes', 'Chào mừng trở lại');
       }

       return redirect()->back()->with('no', 'Tài khoản hoặc mật khảu không chính xác');

    }

    public function check_register(Request $req)
    {
        $form_data = $req->only('name','email','gender','address','phone');
        $form_data['password'] = bcrypt($req->password);
        if (Customer::create($form_data)) {
            $token = \Str::random(50);
            PasswordReset::create([
                'email' => $req->email,
                'token' => $token
            ]);
            Mail::to($req->email)->send(new VerifyCustomerAccount($req->name, $token));
            return redirect()->route('home.login')->with('yes', 'Đăng ký thành công, Hãy check email để kích hoạt tài khoản trước khi đăng nhập');
        }
        return redirect()->back()->with('no', 'Đăng ký không thành công, hãy thử đăng ký lại thông tin');
    }

    public function logout()
    {
        Auth::guard('cus')->logout();
        return redirect()->route('home.login')->with('yes', 'Đăng xuất thành công, vui lòng đăng nhập lại');
    }

    public function profile()
    {
        $auth = Auth::guard('cus')->user();
        // dd ($auth);
        return view('home.profile', compact('auth'));
    }

    public function category(Category $cat)
    {
        $products = $cat->products()->paginate(12);
        return view('category', compact('cat','products'));
    }

    public function about()
    {
        return view('about');
    }

    public function productDetail(Product $product)
    {
        $randomProducts = Product::inRandomOrder()->limit(1)->get();
        return view('product-detail', compact('product','randomProducts'));
    }

    public function send_contact()
    {
        $name = request('name');
        $email = request('email');
        $subject = request('subject');
        $content = request('content');
        
        $send = Mail::to($email)->send(new ContactMail($name, $content, $subject));

        // dd ($send);
        
        return redirect()->route('home.about')->with('yes', 'Gửi contact thành công');
    }

    public function verifyAccount($token)
    {
       $info = PasswordReset::where('token', $token)->firstOrFail();
       $account = Customer::where('email', $info->email)->firstOrFail();
    //    dd ($account, date('Y-m-d H:i:s'));
       $check = $account->update([
            'email_verified_at' => date('Y-m-d h:i:s')
       ]);

       if ($check) {
            PasswordReset::where('token', $token)->delete();
            return redirect()->route('home.login')->with('yes', 'Kích hoạt tài khoản thành công, ban có thể đăng nhập');
       }

        return redirect()->route('home.home')->with('no', 'Kích hoạt tài khoản không thành công');

    }
}
