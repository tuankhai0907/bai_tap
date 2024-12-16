@extends('layouts')

@section('content')

<div class="container mt-4 chitiet">
        @if (session('success'))
        <div class="alert alert-success" style="margin-top: 10px">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger" style="margin-top: 10px">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $products->image_url) }}"class="img-fluid stretch-image" alt="{{ $products->image_url }}">
        </div>
        <div class="col-md-6">
            <div class="card-body custom-card-body">
                <h4 class="card-title custom-card-title">{{ $products->product_name}}</h4>
                <p class="card-text custom-card-text" style="color: red;">
                    Giá: {{ number_format($products->price, 0, ',', '.') }} VND
                </p>
                <p class="product-description">{{$products->description}}</p>
    
               
                <div class="form-group">
                    <label for="sizeSelect" style="margin-right: 10px">Chọn kích thước:</label>
                    <select class="form-control" id="sizeSelect" name="size" style="margin-top: 10px; margin-right: 10px;">
                        <option value="39">Size 39</option>
                        <option value="40">Size 40</option>
                        <option value="41">Size 41</option>
                        <!-- Thêm các option khác tương tự cho các size khác -->
                    </select>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Size</th>
                            <th>Độ dài chân (cm)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>39</td>
                            <td>24.5</td>
                        </tr>
                        <tr>
                            <td>40</td>
                            <td>25</td>
                        </tr>
                        <tr>
                            <td>41</td>
                            <td>25.5</td>
                        </tr>
                        <!-- Thêm các dòng khác tương tự cho các size khác -->
                    </tbody>
                </table>
               
                <h6>Số lượng:</h6>
                <div class="input-group">  
                    <button class="btn btn-outline-secondary" onclick="decreaseQuantity()">-</button>  
                    <input type="text" id="quantityInput" name="quantity" value="1">  
                    <button class="btn btn-outline-secondary" onclick="increaseQuantity()">+</button>  
                </div>  
                
                <form action="{{ route('place.order') }}" method="POST" id="orderForm">  
                    @csrf  
                    <input type="hidden" name="product_id" value="{{ $products->product_id }}">  
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">  
                    <input type="hidden" name="quantity" id="hiddenQuantity" min="1">  
                    <button type="button" class="btn1" onclick="submitForm()">Mua sản phẩm</button>  
                </form>  
                <form action="{{ route('cart.store') }}" method="POST">  
                    @csrf  
                    <input type="hidden" name="product_id" value="{{ $products-> product_id }}">  
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">  
                    <input type="hidden" name="quantity" value="1" min="1">  
                <button type="submit" class="btn1">Thêm vào sản phẩm yêu thích</button>
                </form>  
               
            </div>
        </div>
            
        </div>
    </div>
</div>

<script>  
    function decreaseQuantity() {  
        let quantityInput = document.getElementById('quantityInput');  
        let quantity = parseInt(quantityInput.value);  
        if (quantity > 1) {  
            quantityInput.value = quantity - 1;  
        }  
    }  

    function increaseQuantity() {  
        let quantityInput = document.getElementById('quantityInput');  
        quantityInput.value = parseInt(quantityInput.value) + 1;  
    }  

    function submitForm() {  
        // Update the hidden input with the current quantity  
        document.getElementById('hiddenQuantity').value = document.getElementById('quantityInput').value;  
        
        // Submit the form  
        document.getElementById('orderForm').submit();  
    }  
    
</script>  
<script>
    function decreaseQuantity() {
        let quantityInput = document.getElementById('quantityInput');
        let quantity = parseInt(quantityInput.value);
        if (quantity > 1) {
            quantityInput.value = quantity - 1;
        }
    }

    function increaseQuantity() {
        let quantityInput = document.getElementById('quantityInput');
        let quantity = parseInt(quantityInput.value);
        quantityInput.value = quantity + 1;
    }

    function submitForm() {
        let quantityInput = document.getElementById('quantityInput');
        let hiddenQuantity = document.getElementById('hiddenQuantity');
        hiddenQuantity.value = quantityInput.value;
        document.getElementById('orderForm').submit();
    }
</script>

@endsection