@extends('_layouts.frontend.user1')

@section('title', 'Hóa Đơn')

@section('content-body')
<div class="container">
    <h1>Mua Sản Phẩm: {{ $sanPham->vtdTenSanPham }}</h1>

    <form action="{{ route('hoadon.store', ['sanPham' => $sanPham->id]) }}" method="POST">
        @csrf
        <!-- Các trường khách hàng -->
        <div class="mb-3">
            <label for="vtdMaKhachHang" class="form-label">Mã Khách Hàng</label>
            <input type="text" name="vtdMaKhachHang" value="{{ Session::get('vtdMaKhachHang', '') }}" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label for="vtdHoTenKhachHang" class="form-label">Họ Tên Khách Hàng</label>
            <input type="text" name="vtdHoTenKhachHang" value="{{ Session::get('username1', '') }}" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label for="vtdEmail" class="form-label">Email</label>
            <input type="email" name="vtdEmail" value="{{ Session::get('vtdEmail', '') }}" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label for="vtdDienThoai" class="form-label">Số Điện Thoại</label>
            <input type="text" name="vtdDienThoai" value="{{ Session::get('vtdDienThoai', '') }}" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label for="vtdDiaChi" class="form-label">Địa Chỉ</label>
            <input type="text" name="vtdDiaChi" value="{{ Session::get('vtdDiaChi', '') }}" class="form-control" required>
        </div>

        <!-- Chọn sản phẩm và số lượng -->
        <input type="hidden" name="vtdSanPhamId" value="{{ $sanPham->id }}" required>
        <div class="mb-3">
            <label for="vtdSoLuong" class="form-label">Số Lượng</label>
            <input type="number" name="vtdSoLuong" value="1" min="1" max="{{ $sanPham->vtdSoLuong }}" class="form-control" required>
        </div>

        <!-- Nút Mua -->
        <button type="submit" class="btn btn-primary">Mua Sản Phẩm</button>
        
    </form>
</div>
@endsection