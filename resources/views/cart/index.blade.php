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
                    <td>{{ $item->product->price }}</td>
                    <td>{{ $item->quantity * $item->product->price }}</td>
                    <td>   
                        <form action="{{ route('cart.destroy', ['favorite_id' => $item->favorite_id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<p class="mt-3">Tổng Số lượng: {{ $totalQuantity }}</p>
<p>Tổng Giá: {{ $totalPrice }}</p>
<form action="{{url('vnpay')}}" method="post">
    @csrf   
    <!-- Thêm nút submit với Bootstrap -->
    <button type="submit" name="redirect" class="btn btn-primary">Thanh toán bằng vnpay</button>
</form>
</div>