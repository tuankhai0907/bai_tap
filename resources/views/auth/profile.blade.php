@extends('layouts')  

@section('content')  
<div class="container mt-5">  
    <div class="row justify-content-center">  
        <div class="col-md-6">  
            <h1 class="text-center mt-4">Thông tin người dùng</h1>  
            
            <div class="card shadow-sm">  
                <div class="card-body">  
                    <h2 class="text-center text-primary">{{ $user->user_name }}</h2>  
                    <p class="mb-1"><strong>Email:</strong> {{ $user->email }}</p>  
                    <p class="mb-1"><strong>Địa chỉ:</strong> {{ $user->address }}</p>  
                    <p class="mb-1"><strong>Số điện thoại:</strong> {{ $user->phone_number }}</p>  
                    
                    <div class="text-center">  
                        <form action="{{ route('logout') }}" method="post" class="d-inline">  
                            @csrf  
                            <button type="submit" class="btn btn-danger mt-4">Đăng xuất</button>  
                        </form>  
                        <button class="btn btn-secondary mt-4" data-toggle="modal" data-target="#updateModal">Cập nhật thông tin</button>  
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  

<!<!-- Update Profile Modal -->  
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">  
    <div class="modal-dialog">  
        <div class="modal-content">  
            <div class="modal-header">  
                <h5 class="modal-title" id="updateModalLabel">Cập nhật thông tin người dùng</h5>  
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>  
            </div>  
            <form method="POST" action="{{ route('updateProfile') }}">  
                @csrf  
                <div class="modal-body">  
                    <div class="form-group">  
                        <label for="user_name">Tên người dùng:</label>  
                        <input type="text" id="user_name" name="user_name" class="form-control" value="{{ $user->user_name }}">  
                    </div>  
                    <div class="form-group">  
                        <label for="email">Email:</label>  
                        <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}">  
                    </div>  
                    <div class="form-group">  
                        <label for="address">Địa chỉ:</label>  
                        <input type="text" id="address" name="address" class="form-control" value="{{ $user->address }}">  
                    </div>  
                    <div class="form-group">  
                        <label for="phone_number">Số điện thoại:</label>  
                        <input type="text" id="phone_number" name="phone_number" class="form-control" value="{{ $user->phone_number }}">  
                    </div>  
                </div>  
                <div class="modal-footer">  
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>  
                    <button type="submit" class="btn btn-primary">Cập nhật</button>  
                </div>  
            </form>  
        </div>  
    </div>  
</div>
<style>  
    .card {  
        background-color: white;  
    }  
</style>  

@endsection  

@section('scripts')  
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbvYUew+OrCXaRkfj" crossorigin="anonymous"></script>  
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-4oE48lyLtk28K3QM7+Qu5xBwM/h8u8mW7qzFkM05nvjW55pFhE/7ti+7D6l6c6C4" crossorigin="anonymous"></script>  
@endsection