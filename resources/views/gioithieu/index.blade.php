@extends('layouts')  

@section('content')  
<div class="container mt-5">  
    <div class="row mb-4">  
        <div class="col-md-6" style="margin-top: 60px;">  
            <h1 class="display-4">Chào mừng đến với Website Bán Giày</h1>  
            <p class="lead">Chúng tôi cung cấp các sản phẩm giày thời trang chất lượng cao.</p>  
            <a class="btn btn-custom" href="#products">Khám Phá Ngay</a> <!-- Nút gọi hành động -->  
        </div>  
        <div class="col-md-6">  
            <img src="{{ asset('storage/images/3.png') }}" class="img-fluid rounded" alt="Giày thời trang" style="margin-top: 60px;">  
        </div>  
    </div>  

    <div class="row" id="products"> <!-- Thêm ID cho hiệu ứng cuộn -->  
        <div class="col-md-4" data-aos="fade-up">  
            <h2>Giày Sneakers</h2>  
            <p>Khám phá bộ sưu tập giày sneakers thời trang và phong cách.</p>  
        </div>  
        <div class="col-md-4" data-aos="fade-up">  
            <h2>Giày Cao Gót</h2>  
            <p>Chọn lựa giày cao gót đẹp để tự tin và quyến rũ.</p>  
        </div>  
        <div class="col-md-4" data-aos="fade-up">  
            <h2>Giày Thể Thao</h2>  
            <p>Sản phẩm giày thể thao chất lượng, thoải mái và phong cách.</p>  
        </div>  
    </div>  
</div>  

<!-- Thêm thư viện AOS và Smooth Scroll vào cuối body -->  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.css">  
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/16.1.0/smooth-scroll.polyfills.min.js"></script>  
<script>  
    AOS.init();  
    const scroll = new SmoothScroll('a[href*="#"]', {  
        speed: 300,  
        speedAsDuration: true  
    });  
</script>  

<!-- Thêm CSS để tùy chỉnh -->  
<style>  
    .btn-custom {  
        background-color: #28a745;  
        color: white;  
        transition: transform 0.2s, background-color 0.2s;  
    }  
    .btn-custom:hover {  
        transform: scale(1.05);  
        background-color: #218838; /* Màu nền khi hover */  
    }  
    h2:hover {  
        color: #ff5733; /* Màu sắc khi di chuột */  
        text-decoration: underline; /* Gạch chân */  
        transition: 0.3s; /* Thêm hiệu ứng chuyển đổi mượt mà */  
    }  
</style>  
@endsection