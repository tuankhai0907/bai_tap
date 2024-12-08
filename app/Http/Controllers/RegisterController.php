<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    public function showRegistrationForm1()
    {
        return view('auth.register1');
    }

    
    public function register(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'user_name' => 'required|string|max:255',
            'password' => 'required|string|min:2',
            'email' => 'required|string|email|max:255|unique:users,email',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'role' => 'required|string|max:255',

        ]);

        try {
            $user = User::create([
                'user_name' => $validatedData['user_name'],
                'password' => Hash::make($validatedData['password']),
                'email' => $validatedData['email'],
                'address' => $validatedData['address'],
                'phone_number' => $validatedData['phone_number'],
                'role' => $validatedData['role'],
                
            ]);

            Auth::login($user);

            return redirect('login')->with('success', 'Đăng ký thành công. Đăng nhập để tiếp tục.');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Đã xảy ra lỗi khi đăng ký'], 500);
        }
    }
    public function register1(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'user_name' => 'required|string|max:255',
            'password' => 'required|string|min:2',
            'email' => 'required|string|email|max:255|unique:users,email',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'role' => 'required|string|max:255',

        ]);

        try {
            $user = User::create([
                'user_name' => $validatedData['user_name'],
                'password' => Hash::make($validatedData['password']),
                'email' => $validatedData['email'],
                'address' => $validatedData['address'],
                'phone_number' => $validatedData['phone_number'],
                'role' => $validatedData['role'],
                
            ]);

            Auth::login($user);

            return redirect('qltaikhoan')->with('success', 'Đăng ký thành công. Đăng nhập để tiếp tục.');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Đã xảy ra lỗi khi đăng ký'], 500);
        }
    }
   
}