@extends('layouts')  

@section('content')  
<div class="container mt-4 lienhe">  
    <div class="row">  
        <div class="col-md-6">  
            <h6 class="tieu_de">Liên hệ ngay với chúng tôi</h6>  
            <form action="{{ route('feedbacks.store') }}" method="POST" class="contact-form">  
                @csrf  

                <div class="form-group">  
                    <textarea class="form-control" id="message" name="message" rows="3" placeholder="Nội dung" required></textarea>  
                </div>  
                <button type="submit" class="btn btn-primary bnt2">Gửi</button>  
            </form>  
        </div>  
        <div class="col-md-6">  
            <div id="map" style="height: 400px; border: 1px solid #ccc; border-radius: 8px; overflow: hidden;"></div>  
            <script>  
                function initMap() {  
                    var map = new google.maps.Map(document.getElementById('map'), {  
                        center: {lat: 10.762622, lng: 106.660172},  
                        zoom: 12  
                    });  
                }  
            </script>  
        </div>  
    </div>  
</div>  
<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>  

<style>  
    .contact-form {  
        background: #f9f9f9;  
        padding: 20px;  
        border-radius: 8px;  
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);  
    }  

    .tieu_de {  
        font-size: 1.25rem;  
        margin-bottom: 15px;  
    }  

    .bnt2 {  
        margin-top: 10px;  
    }  

    

    .form-control:focus {  
        border-color: #0056b3;  
        box-shadow: 0 0 5px rgba(0, 86, 179, 0.5);  
    }  
</style>  
@endsection