<?php

namespace App\Http\Controllers;

use App\Constants\UserType;
use App\Models\User;
use URL;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;

class AccountController extends Controller
{
    public function registerUser()
    {
        return view('website.signup');
    }

    public function loginUser()
    {
        return view('website.login');
    }

    public function createUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'unique:users', 'max:11', 'regex:/^(0|\+84)[3|5|7|8|9][0-9]{8}$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/i'],
            'fullName' => ['required', 'string', 'max:30'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ], [
            'email.regex' => "Gmail không hợp lệ",
            'email.required' => "Gmail không được để trống",
            'email.unique' => "gmail này đã tồn tại trên hệ thống",
            'email.max' => "gmail không đúng",

            'phone.required' => "số điện thoại không được để trống",
            'phone.unique' => "số điện thoại đã tồn tại",
            'phone.regex' => "số điện thoại không hợp lệ",
            'phone.max' => "số điện thoại không đúng",
            'fullName.required' => "Họ và tên không được để trống",
            'fullName.max' => "Họ và tên quá dài",
            'password.required' => "mật khẩu không được để trống",
            'password.min' => "Mật khấu phải ít nhất 6 ký tự",
            'password.confirmed' => 'Mật khẩu xác nhận không khớp',
        ]);

        if ($validator->fails()) {

            if ($validator->errors()->has('phone')) {
                $errors['phone'] = $validator->errors()->first('phone');
            }
            if ($validator->errors()->has('email')) {
                $errors['email'] = $validator->errors()->first('email');
            }

            if ($validator->errors()->has('fullName')) {
                $errors['fullName'] = $validator->errors()->first('fullName');
            }

            if ($validator->errors()->has('password')) {
                $errors['password'] = $validator->errors()->first('password');
            }
            return redirect()->route('registerUser')
                ->withErrors($errors)
                ->withInput();
        }

        $user = new User([

            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'fullName' => $request->input('fullName'),
            'typeID' => "0",
            'password' => Hash::make($request->input('password')),
        ]);

        $user->save();

        // Chuyển hướng tới trang đăng nhập
        return redirect()->route('loginUser')->with('success', 'Đăng ký thành công!');
    }

    public function confirmLogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            //tao session giỏ hàng
            $cartItemCount = DB::table('product_carts')
                ->where('user_id', auth()->user()->id)
                ->count();
            session()->put('cart', $cartItemCount);

            
            $previousUrl = Session::get('previousUrl');

            if ($previousUrl) {
                Session::forget('previousUrl');
                return redirect()->to($previousUrl);
            } else if (auth()->user()->typeID == UserType::ADMIN) {
                return redirect()->route('admin');
            }
            return redirect()->route('3TDL Store')
                ->withSuccess('Đăng nhập thành công');
        }



        return redirect()->route("loginUser")->withSuccess('Đăng nhập không thành công!!')->withInput();
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();
        Session::forget('favorite');

        //hủy session cart
        session()->forget('cart');

        return Redirect()->route('3TDL Store');
    }
}