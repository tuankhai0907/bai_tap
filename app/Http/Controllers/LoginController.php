<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'admin') {
                return redirect()->route('products.qlsanpham');
            } else {
                return redirect()->intended('home');
            }
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function showProfile()
    {
        $user = Auth::user(); // Lấy thông tin người dùng đã đăng nhập

        return view('auth.profile', compact('user'));
    }

        public function updateProfile(Request $request)
        {
            $user = Auth::user(); // Lấy thông tin người dùng đã đăng nhập

            $validatedData = $request->validate([
                'user_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
                'address' => 'required|string|max:255',
                'phone_number' => 'required|string|max:20',
            ]);

            $user->user_name = $validatedData['user_name'];
            $user->email = $validatedData['email'];
            $user->address = $validatedData['address'];
            $user->phone_number = $validatedData['phone_number'];

            

            return redirect()->route('profile')->with('success', 'Cập nhật thông tin thành công.');
        }
        public function qltaikhoan() {
            $users = User::all(); // Lấy tất cả người dùng từ bảng users
    
            return view('auth.qltaikhoan', compact('users')); // Trả về view và truyền danh sách người dùng
        }
        public function destroy(User $user)
        {
            // Kiểm tra xem người dùng có tồn tại không
            if ($user) {
                $user->delete();
                session()->flash('success', 'Xoá người dùng thành công.');
            } else {
                session()->flash('error', 'Người dùng không tồn tại.');
            }
            
            return redirect()->route('qltaikoan');
        }
}
