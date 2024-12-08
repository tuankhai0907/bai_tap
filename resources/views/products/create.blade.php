@extends('admin')  

@section('content') 
<h1>Thêm sản phẩm</h1>
<div class="container">
    <div class="row">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf
        
            <div class="form-group">
                <label for="product_name">Tên sản phẩm:</label>
                <input type="text" class="form-control" name="product_name">
            </div>
            <div class="form-group">
                <label for="description">Mô tả:</label>
                <input type="text" class="form-control" name="description">
            </div>
            <div class="form-group">
                <label for="price">Giá:</label>
                <input type="number" class="form-control" name="price">
            </div>
            <div class="form-group">
                <label for="quantity">Số lượng:</label>
                <input type="number" class="form-control" name="quantity">
            </div>
            <div class="form-group">
                <label for="thuong_hieu">Thương hiệu</label>
                <select class="form-control" name="thuong_hieu">
                    <option value=""></option>
                    <option value="nike">Nike</option>
                    <option value="adidas">Adidas</option>
                    <option value="puma">Puma</option>
                    <!-- Thêm các option khác nếu cần -->
                </select>
            </div>
            <div class="form-group">
                <label for="image">Hình ảnh:</label>
                <input type="file" class="form-control-file" name="image">
            </div>
            <button type="submit" class="btn btn-primary bnt2 ">Tạo sản phẩm</button>
        </form>
        </div>
</div>
@endsection