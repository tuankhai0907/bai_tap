<!-- resources/views/donhang/show.blade.php -->
@extends('admin')

@section('content')
<div class="container" style="color: white">
    <h1>Thông tin đơn hàng</h1>
    <p>Tên khách hàng: {{ $donHang->user->user_name }}</p>
    <p>Số điện thoại: {{$donHang->user->phone_number}} </p>
    <p>Email: {{$donHang->user->email}} </p>
    <p>Địa chỉ: {{$donHang->user->address}} </p>
    <p>Mã đơn hàng: {{ $donHang->order_id }}</p>
    <p>Ngày đặt hàng: {{ $donHang->order_date }}</p>
    <p>Tổng tiền: {{ number_format($donHang->total_amount, 0, ',', '.') }} VND</p>
    
    <h2>Chi tiết đơn hàng</h2>
    
    <table class="table table-striped table-bordered"> 
        <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>hình ảnh</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>

            </tr>
        </thead>
        <tbody>
            @foreach($chiTietDonHangData as $chiTiet)
                <tr>
                    <td>{{ $chiTiet->product_id }}</td>
                    <td>{{ $chiTiet->product->product_name }}</td>
                    <td>   <img src="{{ asset('storage/' . $chiTiet->product->image_url) }}" class="card-img-top mt-2" alt="{{ $chiTiet->product->image_url}}" style="width: 60px; height: auto; margin-top: 5px;"></td>
                    <td>{{ $chiTiet->quantity }}</td>
                    <td>{{ $chiTiet->unit_price }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection