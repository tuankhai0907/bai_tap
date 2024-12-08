@extends('layouts')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 style="margin-top: 60px;">Thông tin người dùng</h1>
            
                <div class="khai" style=" box-shadow: 0 2px 4px rgba(0,0,0,0.1); padding: 20px; margin-bottom: 40px;">
                    <h2 style="color: #333; font-size: 24px; font-weight: bold;">{{ $user->user_name }}</h2>
                    <p class="mb-1" style="color: #666;">Email: {{ $user->email }}</p>
                    <p class="mb-1" style="color: #666;">Địa chỉ: {{ $user->address }}</p>
                    <p class="mb-1" style="color: #666;">Số điện thoại: {{ $user->phone_number }}</p>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger" style="margin-top: 40px; transition: all 0.3s; margin-bottom: 60px; margin-right: 40xp;">Đăng xuất</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .khai{
        background-color: white;
    }
    body{
       
    }
    h1{
        text-align: center;
    }
    h2{
        text-align: center;
    }
    p{
        font-size: 20px;
       margin: 10px;
    }
    button {
    display: block;
    margin: 0 auto;
    }
</style>
    {{-- <h2>Update Profile</h2>
    <form method="POST" action="{{ route('updateProfile') }}">
        @csrf
        <label for="user_name">User Name:</label>
        <input type="text" id="user_name" name="user_name" value="{{ $user->user_name }}"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}"><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="{{ $user->address }}"><br><br>

        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" value="{{ $user->phone_number }}"><br><br>

        <button type="submit">Update</button>
    </form> --}}
    @endsection