@extends('_layouts.admins._master')

@section('title', 'Danh Sách Người Dùng')

@section('content-body')
    <div class="container mt-4">
        <h1 class="mb-4 text-center text-primary">Danh Sách Người Dùng</h1>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center">STT</th>
                    <th scope="col" class="text-center">Tên Người Dùng</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Số Điện Thoại</th>
                    <th scope="col" class="text-center">Ngày Đăng Ký</th>
                    <th scope="col" class="text-center">Trạng Thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vtdnguoidung as $index => $user)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="text-center">{{ $user->vtdHoTenKhachHang }}</td> <!-- Tên người dùng -->
                        <td class="text-center">{{ $user->vtdEmail }}</td> <!-- Email -->
                        <td class="text-center">{{ $user->vtdDienThoai }}</td> <!-- Số điện thoại -->
                        <td class="text-center">{{ $user->vtdNgayDangKy->format('d/m/Y') }}</td> <!-- Ngày đăng ký -->
                            <td class="text-center">
                                @if($user->vtdTrangThai == 0)
                                    <span class="badge bg-success">Hoạt Động</span>
                                @elseif($user->vtdTrangThai == 1)
                                    <span class="badge bg-warning">Tạm Khóa</span>
                                @else
                                    <span class="badge bg-danger">Khóa</span>
                                @endif
                            </td>
                   
                    </tr>
                @endforeach
            </tbody>
            
        </table>
           <!-- Nút Quay lại -->
     <a href="{{ route('vtdAdmins.vtddanhsachquantri.danhmuc') }}" class="btn btn-secondary mt-3">Quay lại</a>
    </div>
  
@endsection