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
            <div class="user-info" id="user-info">  
                <p><strong>Số điện thoại:</strong> {{ $user->phone_number }}</p>  
                <p><strong>Email:</strong> {{ $user->email }}</p>  
                <p><strong>Địa chỉ:</strong> {{ $user->address }}</p>  
            </div>  
        </div>  
    </div>  
    <div class="row">  
        <div class="col-md-12">  
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
                                        <th>Hành động</th>  
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
                                            <form action="{{ route('orders.delete', ['order_id' => $orderDetail->order_id]) }}" method="POST" class="delete-form">  
                                                @csrf  
                                                @method('DELETE')  
                                                <button type="submit" class="btn btn-danger">  
                                                    <i class="bi bi-trash"></i>  
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

<!-- Loading Spinner -->  
<div id="loading-spinner" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); z-index: 9999;">  
    <div class="spinner-border" role="status">  
        <span class="visually-hidden">Loading...</span>  
    </div>  
</div>  

<script>  
    var userInfo = document.getElementById('user-info');  
    var toggleButton = document.getElementById('toggle-button');  
    var loadingSpinner = document.getElementById('loading-spinner');  

    userInfo.style.display = 'none'; // Ẩn thông tin người dùng ban đầu  

    toggleButton.addEventListener('click', function() {  
        if (userInfo.style.display === 'none') {  
            userInfo.style.display = 'block'; // Hiển thị thông tin khi click vào nút  
            userInfo.style.transition = 'all 0.5s ease'; // Thêm hiệu ứng chuyển tiếp  
        } else {  
            userInfo.style.display = 'none'; // Ẩn thông tin khi click vào nút  
            userInfo.style.transition = 'all 0.5s ease'; // Thêm hiệu ứng chuyển tiếp  
        }  
    });  

    // Confirmation dialog and loading spinner for delete action  
    document.querySelectorAll('.delete-form').forEach(function(form) {  
        form.addEventListener('submit', function(event) {  
            if (!confirm('Bạn có chắc chắn muốn xoá đơn hàng này?')) {  
                event.preventDefault(); // Ngăn chặn việc gửi form nếu người dùng không xác nhận  
            } else {  
                loadingSpinner.style.display = 'block'; // Hiện spinner khi đang xóa  
            }  
        });  
    });  
</script>  
@endsection