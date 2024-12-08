@extends('admin')  

@section('content')  
<main class="content px-3 py-2">  
    <div class="container-fluid">  
        <div class="mb-6">  
            <h3>Quản lý tài khản</h3>  
        </div>  
        <table class="table table-striped table-bordered">  
            <thead>  
                <tr>  
                    
                    <th>Mã Tài Khoản</th>  
                    <th>Tên Người Dùng</th>
                    <th>Gmail</th>
                    <th>Số ĐT</th>  
                    <th>Địa chỉ</th>
                    <th>thao tác</th>
                 
                </tr>  
            </thead>  
            <tbody>  
                @foreach($users as $user)
                <tr>  
                    <td>{{ $user->user_id }}</td>  
                    <td>{{ $user->user_name }}</td>
                    <td>{{ $user->email}}</td>  
                    <td>{{ $user->phone_number}}</td>
                    <td>{{ $user->address}}</td>
                     <td>  
                         
                    <form method="POST" action="{{ route('users.destroy', $user->user_id ) }}" id="deleteForm">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xoá người dùng này?')">Xoá</button>
                    </form>
                    </td>  
                </tr>  
            @endforeach
         </tbody>  
        </table>  
    </div>  
</main>  
@endsection