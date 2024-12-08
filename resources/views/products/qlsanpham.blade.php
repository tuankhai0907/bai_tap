
@extends('admin')  

@section('content') 
    <div class="container">
        <h1 class="mt-4 mb-4">Danh sách Sản Phẩm</h1>
    <div class="nui">
        <form  action="{{ route('products.qlsanpham') }}" method="GET" class="mb-4">
            @csrf <!-- Thêm CSRF token cho form POST -->
            <input class="form-control search" type="search" name="search" id="search" placeholder="Search" aria-label="Search">
            <button class="btn border-0" type="submit">
                <i class="fas fa-search"></i> <!-- Biểu tượng tìm kiếm -->
            </button>
        </form>
        <a href="{{ route('products.create') }}" class="btn btn-primary btn3" style="margin-bottom: 20px; margin-left: 80%">Thêm sản phẩm</a>
      
    </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Thương hiệu</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->thuong_hieu }}</td>
                        <td><img src="{{ asset('storage/' . $product->image_url) }}"  alt="{{ $product->image_url }}" style="width: 100px;"></td>
                        <td>{{ number_format($product->price, 0, ',', '.') }} VND</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->product_id) }}" class="btn btn-primary">Sửa</a>
            
                            <form method="POST" action="{{ route('products.destroy', $product->product_id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form> 
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-12 text-center"> <!-- Sử dụng lớp text-center để căn giữa nút phân trang -->
                <ul class="pagination">
                    {{ $products->links() }} <!-- Đảm bảo rằng $products là đối tượng phân trang -->
                </ul>
            </div>
        </div> 
    </div>
    @endsection