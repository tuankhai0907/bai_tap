
@extends('admin')  

@section('content') 
    <div class="container">
        <h1 class="mt-4 mb-4">Danh sách Sản Phẩm</h1>
    <div class="nui">
        <form  action="{{ route('orders.qldonhang') }}" method="GET" class="mb-4">
            @csrf <!-- Thêm CSRF token cho form POST -->
            <input class="form-control search" type="search" name="search" id="search" placeholder="Search" aria-label="Search">
            <button class="btn border-0" type="submit">
                <i class="fas fa-search"></i> <!-- Biểu tượng tìm kiếm -->
            </button>
        </form>
       
    </div>
        <table class="table">
            <thead>
                <tr>
                      
                    <th>Mã Đơn Hàng</th>  
                    <th>Tên Khách Hàng</th>
                    <th>Ngày Đặt Hàng</th>
                    <th>Tổng tiền</th>  
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($donHangs as $donhang)
                    <tr>
                        <td>{{ $donhang->order_id }}</td>
                        <td>{{ $donhang->user->user_name }}</td>
                        <td>{{ $donhang->order_date }}</td>
                        <td>{{ number_format($donhang->total_amount, 0, ',', '.') }} VND</td>
                        <td><form action="{{ route('orders.delete1', ['order_id' => $donhang->order_id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xoá đơn hàng này?')">
                                <i class="bi bi-trash"></i> <!-- Sử dụng icon Trash của Bootstrap Icons -->
                            </button>
                        </form>
                        </td>
                    <td>
                        <a href="{{ route('orders.show', ['order_id' => $donhang->order_id]) }}" class="btn btn-secondary btn-sm">Xem chi tiết</a>  
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-12 text-center"> <!-- Sử dụng lớp text-center để căn giữa nút phân trang -->
                <ul class="pagination">
                    {{ $donHangs->links() }} <!-- Đảm bảo rằng $products là đối tượng phân trang -->
                </ul>
            </div>
        </div> 
    </div>
    @endsection
    
       