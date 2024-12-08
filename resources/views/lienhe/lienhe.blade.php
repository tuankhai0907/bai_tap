@extends('layouts')  

@section('content')   
<div class="container mt-4 lienhe">
    <div class="row">
        <div class="col-md-6">
            <h6 class="tieu_de">liên hệ ngay với chúng tôi</h6>
            <form action="{{ route('feedbacks.store') }}" method="POST">
                 @csrf
              
                <div class="form-group">
                    <textarea class="form-control" id="message" name="message" rows="3" placeholder="Nội dung"></textarea>
                </div>
                <button type="submit" class="btn btn-primary bnt2">Gửi</button>
            </form>
        
        </div>
        <div class="col-md-6">
            <div id="map" style="height: 400px;"></div>
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
@endsection