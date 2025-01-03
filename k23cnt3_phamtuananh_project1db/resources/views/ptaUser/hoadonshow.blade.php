    <!-- resources/views/ptauser/hoadonshow.blade.php -->

    @extends('layouts.frontend.user1')  <!-- Hoặc layout của bạn -->
    @section('title', 'Thông Tin Hóa Đơn')
    @section('content-body')
    <div class="container">
        <h1>Thông Tin Hóa Đơn</h1>
        
        <div class="card">
            <div class="card-header">
                <h3>Hóa Đơn ID: {{ $hoaDon->ptaMaHoaDon }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Tên Khách Hàng:</strong> {{ $hoaDon->ptaHoTenKhachHang }}</p>
                <p><strong>Email:</strong> {{ $hoaDon->ptaEmail }}</p>
                <p><strong>Số Điện Thoại:</strong> {{ $hoaDon->ptaDienThoai }}</p>
                <p><strong>Địa Chỉ:</strong> {{ $hoaDon->ptaDiaChi }}</p>
                <p><strong>Tổng Giá Trị:</strong> {{ number_format($hoaDon->ptaTongGiaTri, 0, ',', '.') }} VND</p>
                <p><strong>Ngày Hóa Đơn:</strong> {{ $hoaDon->ptaNgayHoaDon }}</p>
                <p><strong>Ngày Nhận:</strong> {{ $hoaDon->ptaNgayNhan }}</p>
                <p><strong>Trạng Thái:</strong> 
                    @if ($hoaDon->ptaTrangThai == 0)
                        Chưa Thanh Toán
                    @elseif ($hoaDon->ptaTrangThai == 1)
                        Đã Thanh Toán
                    @endif
                </p>
            </div>
            <a href="{{ route('cthoadon.Create', ['hoaDonId' => $hoaDon->id, 'sanPhamId' => $sanPham->id]) }}">Xem chi tiết hóa đơn</a>

        </div>
    </div>

    @endsection