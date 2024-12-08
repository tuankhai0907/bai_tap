@extends('admin')  

@section('content')
<div class="container mt-5">
    <h1>Sửa Sản Phẩm</h1>
    <form action="{{ route('products.update', $product -> product_id) }}" method="POST" enctype="multipart/form-data" class="mt-4">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="product_name">Tên sản phẩm:</label>
            <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}">
        </div>
        <div class="form-group">
            <label for="description">Mô tả:</label>
            <input type="text" class="form-control" name="description" value="{{ $product->description }}">
        </div>
        <div class="form-group">
            <label for="price">Giá:</label>
            <input type="number" class="form-control" name="price" value="{{ $product->price }}">
        </div>
        <div class="form-group">
            <label for="quantity">Số lượng:</label>
            <input type="number" class="form-control" name="quantity" value="{{ $product->quantity }}">
        </div>
        <div class="form-group">
            <label for="thuong_hieu">Thương hiệu:</label>
            <select class="form-control" name="thuong_hieu">
                <option value="nike" {{ $product->thuong_hieu == 'nike' ? 'selected' : '' }}>Nike</option>
                <option value="adidas" {{ $product->thuong_hieu == 'adidas' ? 'selected' : '' }}>Adidas</option>
                <option value="puma" {{ $product->thuong_hieu == 'puma' ? 'selected' : '' }}>Puma</option>
                <!-- Thêm các option cho các thương hiệu khác nếu cần -->
            </select>
        </div>

        @if ($product->image_url)
        <img src="{{ asset('storage/' . $product->image_url) }}" alt="Hình ảnh sản phẩm" style="max-width: 100px; max-height: 100px; margin-leftt: 100px;">
        @endif
        <div class="form-group">
            <label for="image_url">Hình ảnh:</label>
            <input type="file" class="form-control-file" id="image_url"name="image_url">
        </div>
        <button type="submit" class="btn btn-primary bnt2">Lưu Sản Phẩm</button>
    </form>
</div>
@endsection