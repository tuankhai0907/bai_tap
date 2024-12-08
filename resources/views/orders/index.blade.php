@extends('layouts')

@section('content')
<div class="container" style="margin-top: 100px;">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <h2 class="text-center">Danh sách đơn hàng của: {{ $user->user_name }}</h2>
    <div class="row">
        <div class="col-md-6">
            <button id="toggle-button"><i class="fas fa-user-circle"></i></button>
            <!-- Hiển thị thông tin người dùng -->
            <div class="user-info" id="user-info">
                <p><strong>Số điện thoại</strong> {{ $user->phone_number }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Địa chỉ:</strong> {{ $user->address }}</p>
            </div>
            <!-- Nút để click để ẩn/hiển thị thông tin -->
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- Hiển thị danh sách đơn hàng -->
            @if ($donHangList)
                @foreach ($donHangList as $donHang)
                    <div class="order-info">
                      
                        <p><strong>Ngày đặt hàng:</strong> {{ date('d/m/Y', strtotime($donHang->order_date)) }}</p>
                        @if ($donHang->orderDetails)
                         
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donHang->orderDetails as $orderDetail)
                                    <tr>
                                        <td>{{ $orderDetail->product->product_name }}</td>
                                        <td>
                                            <a href="{{ route('products.show', ['product_id' => $orderDetail->product->product_id]) }}">
                                                <img src="{{ asset('storage/' . $orderDetail->product->image_url) }}" class="card-img-top img-fluid" alt="{{ $orderDetail->product->image_url }}" style="width: 70px;">
                                            </a>
                                        </td>
                                        <td>{{ $orderDetail->quantity }}</td>
                                        <td>{{ number_format($orderDetail->unit_price, 0, ',', '.') }} VNĐ</td>
                                        <td>
                                            <form action="{{ route('orders.delete', ['order_id' => $orderDetail->order_id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xoá đơn hàng này?')">
                                                    <i class="bi bi-trash"></i> <!-- Sử dụng icon Trash của Bootstrap Icons -->
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
<script>
    var userInfo = document.getElementById('user-info');
    var toggleButton = document.getElementById('toggle-button');

    userInfo.style.display = 'none'; // Ẩn thông tin người dùng ban đầu

    toggleButton.addEventListener('click', function() {
        if (userInfo.style.display === 'none') {
            userInfo.style.display = 'block'; // Hiển thị thông tin khi click vào nút
        } else {
            userInfo.style.display = 'none'; // Ẩn thông tin khi click vào nút
        }
    });
</script>
@endsection