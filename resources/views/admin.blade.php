<!DOCTYPE html>  
<html lang="en">  

<head>  
    <meta charset="UTF-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" title="text/css" href="{{ asset('css/admin.css') }}">  
    <title>Quản lí điện thoại</title>  
</head>  

<body>  
    <div class="wrapper">  
        <!-- Sidebar -->  
        <aside id="sidebar">  
            <div class="h-100">  
                <div class="sidebar-logo">  
                    <a href="{{route('products.qlsanpham')}}">Quản lí giày</a>  
                </div>  
                <!-- Sidebar Navigation -->  
                <ul class="sidebar-nav">  
                    <li class="sidebar-item">  
                        <a href="{{route('products.qlsanpham')}}" class="sidebar-link">  
                            <i class="fa-solid fa-shoe-prints pe-2"></i> <!-- Đổi icon thành giày (shoe-prints) -->
                            Quản lý Giày 
                        </a>  
                    </li> 
                    
                    <li class="sidebar-item">  
                        <a href="{{route('orders.qldonhang')}}" class="sidebar-link">  
                            <i class="fa-solid fa-file-invoice pe-2"></i>  
                            Quản lý hoá đơn  
                        </a>  
                    </li>  
                    <li class="sidebar-item">  
                        <a href="{{route('qltaikhoan')}}" class="sidebar-link">  
                            <i class="fa-solid fa-user pe-2"></i>  
                            Quản lý tài khoản  
                        </a>  
                    </li>  
                    <li class="sidebar-item">  
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#auth"  
                            aria-expanded="false" aria-controls="auth">  
                            <i class="fa-regular fa-user pe-2"></i>  
                            Auth  
                        </a>  
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">  
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="custom-button">
                                    <i class="fas fa-sign-out-alt"></i> Đăng xuất
                                </button>
                            </form> 
                         <li class="sidebar-item">    
                            <a class="sidebar-link" href="{{ route('register1') }}">Thêm tài khoản quản lý</a>
                         </li>
                        </ul>  
                    </li>  
                  
                </ul>  
            </div>  
        </aside>  
        <!-- Main Component -->  
        <div class="main">  
            <nav class="navbar navbar-expand px-3 border-bottom">  
                <!-- Button for sidebar toggle -->  
                <button class="btn" type="button" id="sidebarToggle">  
                    <span class="navbar-toggler-icon"></span>  
                </button>  
            </nav>  

            @yield('content')  

        </div>  
    </div>  

    <script>  
        const toggler = document.getElementById("sidebarToggle");  
        toggler.addEventListener("click", function() {  
            document.querySelector("#sidebar").classList.toggle("collapsed");  
        });  

        document.getElementById('searchInput').addEventListener('keyup', function() {  
            let input, filter, table, tr, td, i, txtValue;  
            input = document.getElementById('searchInput');  
            filter = input.value.toUpperCase();  
            table = document.getElementById('phoneTable');  
            tr = table.getElementsByTagName('tr');  
            
            for (i = 0; i < tr.length; i++) {  
                td = tr[i].getElementsByTagName('td')[1];  
                if (td) {  
                    txtValue = td.textContent || td.innerText;  
                    tr[i].style.display = txtValue.toUpperCase().indexOf(filter) > -1 ? '' : 'none';  
                }  
            }  
        });  
    </script>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"  
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"  
        crossorigin="anonymous"></script>  
    <script src="script.js"></script>  
    <style>
        .custom-button {
            border: none;
            background: none; /* Nếu bạn muốn xóa cả nền của nút */
            padding: 0; /* Xóa khoảng cách nội dung với viền của nút */
            cursor: pointer; /* Biến con trỏ thành hình cửa sổ khi di chuột qua nút */
            margin-left: 28px
        }
    </style>
</body>  

</html>