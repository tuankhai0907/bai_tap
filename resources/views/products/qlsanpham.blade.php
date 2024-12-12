@extends('admin')  

@section('content')   
    <div class="container">  
        <h1 class="mt-4 mb-4">Danh sách Sản Phẩm</h1>  

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  
        <script>  
            $(document).ready(function () {  
                // Fade-in effect for table rows  
                $('tbody tr').hide().fadeIn(1000);  
                
                // Button hover effects  
                $('.btn').hover(  
                    function() {  
                        $(this).addClass('btn-hover');  
                    },   
                    function() {  
                        $(this).removeClass('btn-hover');  
                    }  
                );  

                // Smooth scroll for pagination links  
                $('.pagination a').on('click', function() {  
                    $('html, body').animate({  
                        scrollTop: 0  
                    }, 800);  
                });  
            });  
        </script>  

        <style>  
            .btn-hover {  
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);  
                transform: scale(1.05);  
                transition: all 0.3s ease;  
            }  
        </style>  

        <div class="nui">  
            <form action="{{ route('products.qlsanpham') }}" method="GET" class="mb-4">  
                @csrf  
                <input class="form-control search" type="search" name="search" id="search" placeholder="Search" aria-label="Search">  
                <button class="btn border-0" type="submit">  
                    <i class="fas fa-search"></i>  
                </button>  
            </form>  
            <a href="{{ route('products.create') }}" class="btn btn-primary btn3" style="margin-bottom: 20px; margin-left: 80%">Thêm sản phẩm</a>  
        </div>  
    
        <div class="table-responsive">  
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
                            <td><img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->image_url }}" style="width: 100px;"></td>  
                            <td>{{ number_format($product->price, 0, ',', '.') }} VND</td>  
                            <td>{{ $product->quantity }}</td>  
                            <td>  
                                <a href="{{ route('products.edit', $product->product_id) }}" class="btn btn-primary" title="Sửa">  
                                    <i class="bi bi-pencil-fill"></i>  
                                </a>  
                                <form method="POST" action="{{ route('products.destroy', $product->product_id) }}" style="display: inline;">  
                                    @csrf  
                                    @method('DELETE')  
                                    <button type="submit" class="btn btn-danger" title="Xóa">  
                                        <i class="bi bi-trash-fill"></i>  
                                    </button>  
                                </form>   
                            </td>
                        </tr>  
                    @endforeach  
                </tbody>  
            </table>  
        </div>
        
        <div class="row">  
            <div class="col-md-12 text-center">  
                <ul class="pagination">  
                    {{ $products->links() }}  
                </ul>  
            </div>  
        </div>  
    </div>  
@endsection