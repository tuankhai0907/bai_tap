@extends('layouts')  

@section('content')  
<div class="container">  
    <h1 style="margin-top: 100px;">Giỏ Hàng của bạn</h1>  
    @if(session('success'))  
    <div class="alert alert-success">  
        {{ session('success') }}  
    </div>  
    @endif  
    <div class="table-responsive">  
        <table class="table table-striped">  
            <thead class="thead-dark">  
                <tr>  
                    <th>Tên sản phẩm</th>  
                    <th>Ảnh</th>  
                    <th>Số lượng</th>  
                    <th>Giá</th>  
                    <th>Tổng</th>  
                    <th>Hành Động</th> <!-- Thêm cột cho các hành động -->  
                </tr>  
            </thead>  
            <tbody>  
                @foreach($cartItems as $item)  
                    <tr>  
                        <td>{{ $item->product->product_name }}</td>  
                        <td>  
                            <a href="{{ route('products.show', ['product_id' => $item->product->product_id ]) }}">  
                                <img src="{{ asset('storage/' . $item->product->image_url) }}" class="img-thumbnail" alt="{{ $item->product->product_id }}" style="width: 60px; height: auto; margin-top: 5px;">  
                            </a>  
                        </td>  
                        <td>{{ $item->quantity }}</td>  
                        <td>{{ number_format($item->product->price, 2) }} VNĐ</td> <!-- Định dạng giá -->  
                        <td>{{ number_format($item->quantity * $item->product->price, 2) }} VNĐ</td> <!-- Tổng giá -->  
                        <td>   
                            <form action="{{ route('cart.destroy', ['favorite_id' => $item->favorite_id]) }}" method="POST">  
                                @csrf  
                                @method('DELETE')  
                                <button type="submit" class="btn btn-danger">  
                                    <i class="fas fa-trash-alt"></i> <!-- Biểu tượng xóa -->  
                                </button>  
                            </form>  
                        </td>  
                    </tr>  
                @endforeach  
            </tbody>  
        </table>  
    </div>  

    <p class="mt-3">Tổng Số lượng: {{ $totalQuantity }}</p>  
    <p>Tổng Giá: {{ number_format($totalPrice, 2) }} VNĐ</p>  
    <form action="{{ url('vnpay') }}" method="post">  
        @csrf   
        <button style="margin-bottom: 200px" type="submit" name="redirect" class="btn btn-primary">Thanh toán bằng vnpay</button> <!-- Nút thanh toán -->  
    </form>  
</div>  

<!-- Liên kết đến CSS styles -->  
<style>  
    /* CSS tùy chỉnh cho các kiểu dáng và hiệu ứng chuyển tiếp */  
    .table-responsive {  
        transition: transform 0.3s ease, box-shadow 0.3s ease; /* Hiệu ứng chuyển động cho bảng */  
    }  

    .table-striped tbody tr:hover {  
        background-color: #f2f2f2; /* Màu nền khi rê chuột */  
        transform: scale(1.02); /* Phóng to khi rê chuột */  
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1); /* Đổ bóng */  
    }  

    .btn {  
        transition: background-color 0.3s ease, transform 0.3s ease; /* Hiệu ứng chuyển đổi cho nút */  
    }  

    .btn:hover {  
        background-color: #0056b3 !important; /* Màu nền khi rê chuột */  
        transform: translateY(-2px); /* Nâng nút lên khi rê chuột */  
    }  
</style>  

<!-- JavaScript cho hộp thoại xác nhận -->  
<script>  
    document.addEventListener('DOMContentLoaded', function() {  
        const deleteButtons = document.querySelectorAll('.btn-danger');  

        deleteButtons.forEach(function(button) {  
            button.addEventListener('click', function(event) {  
                const confirmDelete = confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?'); // Hộp xác nhận xóa  
                if (!confirmDelete) {  
                    event.preventDefault(); // Ngăn không cho form được gửi nếu không xác nhận  
                }  
            });  
        });  
    });  
</script>  
@endsection