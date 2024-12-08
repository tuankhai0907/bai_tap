@extends('layouts')

@section('content')

<div class="container mt-5" >
    <div class="row mb-4">
        <div class="col-md-6" style="margin-top: 60px;">
            <h1 class="display-4">Chào mừng đến với Website Bán Giày</h1>
            <p class="lead">Chúng tôi cung cấp các sản phẩm giày thời trang chất lượng cao.</p>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('storage/images/3.png') }}" class="img-fluid rounded" alt="Giày thời trang" style="margin-top: 60px">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <h2>Giày Sneakers</h2>
            <p>Khám phá bộ sưu tập giày sneakers thời trang và phong cách.</p>
        </div>
        <div class="col-md-4">
            <h2>Giày Cao Gót</h2>
            <p>Chọn lựa giày cao gót đẹp để tự tin và quyến rũ.</p>
        </div>
        <div class="col-md-4">
            <h2>Giày Thể Thao</h2>
            <p>Sản phẩm giày thể thao chất lượng, thoải mái và phong cách.</p>
        </div>
    </div>
</div>
@endsection