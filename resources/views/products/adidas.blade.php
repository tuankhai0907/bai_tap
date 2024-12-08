@extends('layouts')  

@section('content')   
<div class="container mt-4">
    <div class="row">
        @if($products->count() > 0)
            @foreach($products as $product)
                <div class="col-md-3 mb-4">
                    <div class="card" style="border: none; margin-top: 80px;">
                        <a href="{{ route('products.show', ['product_id' => $product->product_id]) }}">
                            <img src="{{ asset('storage/' . $product->image_url) }}" class="card-img-top img-fluid" alt="{{ $product->product_name }}" style="height: 300px;">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->product_name }}</h5>
                            <p class="card-text" style="color: red;">{{ number_format($product->price, 0, ',', '.') }} VND</p>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach  
        @else  
            <p style="margin-top: 70px;">Không có sản phẩm nào.</p>  
        @endif  
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
<script>
    
    document.addEventListener("DOMContentLoaded", function() {
        const cards = document.querySelectorAll('.card');

        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.05)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'scale(1)';
            });
        });
    });

</script>