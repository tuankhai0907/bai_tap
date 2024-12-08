
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" title="text/css" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" title="text/css" href="{{ asset('css/chitiet.css') }}">
    <link rel="stylesheet" title="text/css" href="{{ asset('css/lienhe.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-xl navbar-light bg-light">
        <a class="navbar-brand" href="#">Đức ĐZ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home.index')}}">Trang chủ</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="{{route('products.index')}}" id="navbarDropdown" role="button" >
                        Sản phẩm
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" id="dropdownMenu">
                        <li><a class="dropdown-item" href="{{route('products.nike')}}">Giày Nike</a></li>
                        <li><a class="dropdown-item" href="{{route('products.adidas')}}">Giày Adidas</a></li>
                        <li><a class="dropdown-item" href="{{route('products.puma')}}">Giày puma</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link underline-hover" href="#">Giới thiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('lienhe.lienhe')}}">Liên hệ</a>
                </li>
               
            </ul>  
        </div>
       
        <form class="d-flex justify-content-start" action="{{ route('products.index') }}" method="GET" class="mb-4">
            @csrf <!-- Thêm CSRF token cho form POST -->
            <input class="form-control search" list="products" type="search" name="search" id="search" placeholder="Search" aria-label="Search">
            {{-- <datalist id="products">
                @foreach($products as $product)
                    <option value="{{ $product->product_name }}">
                @endforeach
            </datalist> --}}
            <button class="btn border-0" type="submit">
                <i class="fas fa-search"></i> <!-- Biểu tượng tìm kiếm -->
            </button>
        </form>
        <ul class="icon-list">
            @guest
            <li><a href="{{ route('login') }}"><i class="fas fa-user"></i></a></li>
                @else
                    {{-- <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="custom-button">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </form> --}}
                    
                    <li><a href="{{ route('profile') }}"><i class="fas fa-user"></i></a></li>
                @endguest
                    
                
            <li><a href="{{ route('cart.index')}}"><i class="fas fa-heart"></i></a></li>
            <li><a href="{{route('orders.index')}}"><i class="fas fa-shopping-cart"></i> </a></li>
        </ul>
       

    </nav>

   
   
    @yield('content')
    
    <footer class="bg-white text-dark text-center py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2022 Tên Công Ty. All Rights Reserved.</p>
                    <p>Địa chỉ: 123 Đường ABC, Thành phố XYZ</p>
                    <p>Email: info@yourcompany.com</p>
                </div>
                <div class="col-md-6">
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    
    </footer>
    <script>
        // Hiệu ứng scroll smooth
        $('a[href^="#"]').on('click', function(event) {
            var target = $(this.getAttribute('href'));
            if( target.length ) {
                event.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top
                }, 1000);
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let dropdownMenu = document.getElementById("dropdownMenu");
            let navbarDropdown = document.querySelector(".nav-item.dropdown");
    
            navbarDropdown.addEventListener("mouseover", function() {
                dropdownMenu.classList.add("show");
            });
    
            navbarDropdown.addEventListener("mouseout", function() {
                dropdownMenu.classList.remove("show");
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>
</html>