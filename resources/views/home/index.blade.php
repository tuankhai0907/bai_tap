@extends('layouts')

@section('content')
<div class="container">
    @if (session('success'))  
    <div class="success-alert" role="alert">  
        {{ session('success') }}  
        <span class="close" onclick="this.parentElement.style.display='none';">&times;</span> 
    </div>  
@endif
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('storage/images/3.png') }}" class="d-block w-100" alt="Hình ảnh 2">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('storage/images/3.png') }}" class="d-block w-100" alt="Hình ảnh 2">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('storage/images/3.png') }}" class="d-block w-100" alt="Hình ảnh 2">
        </div> 
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <h1>Chào mừng đến với trang web của chúng tôi</h1>
            <p>Chúng tôi cung cấp các sản phẩm giày chất lượng hàng đầu</p>
            <a href="{{route('products.index')}}" class="btn btn-primary">Xem sản phẩm</a>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('storage/images/image.png')}}" class="img-fluid" alt="Giày">
        </div>
    </div>
</div>

<div class="container mt-4">  
    <div class="row">  
        @foreach($products as $product)  
            <div class="col-md-3 mb-4">  
                <div class="card" style="border: none;">  
                    <a href="{{ route('products.show', ['product_id' => $product->product_id]) }}">  
                        <img src="{{ asset('storage/' . $product->image_url) }}" class="card-img-top img-fluid" alt="{{ $product->image_url }}" style="height: 300px;">  
                    </a>  
                    <div class="card-body">  
                        <h5 class="card-title">{{ $product->product_name }}</h5>  
                        <p class="card-text" style="color: red;">{{ number_format($product->price, 0, ',', '.') }} VND</p>  
                       
                        
                    </div>  
                </div>  
            </div>  
        @endforeach  
    </div>  

    <div class="row">
        <div class="col-md-12 text-center"> <!-- Sử dụng lớp text-center để căn giữa nút phân trang -->
            <ul class="pagination">
                {{ $products->links() }} <!-- Đảm bảo rằng $products là đối tượng phân trang -->
            </ul>
        </div>
    </div>
</div>
<style>
    #success-alert {  
    display: none; /* Bắt đầu ẩn */  
}

</style>
<script>
    document.addEventListener("DOMContentLoaded", function() {  
    const successAlert = document.getElementById('success-alert');  
    
    if (successAlert) {  
        // Hiện thông báo  
        successAlert.style.display = 'block';  
        successAlert.style.opacity = 0;  
        
        // Hiệu ứng fade-in  
        let fadeEffect = setInterval(function () {  
            if (!successAlert.style.opacity) {  
                successAlert.style.opacity = 0;  
            }  
            if (successAlert.style.opacity < 1) {  
                successAlert.style.opacity += 0.1;  
            } else {  
                clearInterval(fadeEffect);  
                // Hiệu ứng fade-out sau 3 giây  
                setTimeout(function() {  
                    let fadeOutEffect = setInterval(function () {  
                        if (successAlert.style.opacity > 0) {  
                            successAlert.style.opacity -= 0.1;  
                        } else {  
                            clearInterval(fadeOutEffect);  
                            successAlert.style.display = 'none'; // Ẩn lại sau khi fade out  
                        }  
                    }, 50);  
                }, 3000); // Thời gian hiển thị thông báo  
            }  
        }, 50);  
    }  
});
</script>



@endsection
