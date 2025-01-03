@extends('layouts.frontend.user1')
@section('title', 'Hóa Đơn')
@section('content-body')
<div class="container">
    <h1>Mua Sản Phẩm: {{ $sanPham->ptaTenSanPham }}</h1>

    <form action="{{ route('hoadon.store', ['sanPham' => $sanPham->id]) }}" method="POST">
        @csrf
        <!-- Các trường khách hàng -->
        <div class="mb-3">
            <label for="ptaMaKhachHang" class="form-label">Mã Khách Hàng</label>
            <input type="text" name="ptaMaKhachHang" value="{{ Session::get('ptaMaKhachHang', '') }}" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label for="ptaHoTenKhachHang" class="form-label">Họ Tên Khách Hàng</label>
            <input type="text" name="ptaHoTenKhachHang" value="{{ Session::get('username1', '') }}" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label for="ptaEmail" class="form-label">Email</label>
            <input type="email" name="ptaEmail" value="{{ Session::get('ptaEmail', '') }}" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label for="ptaDienThoai" class="form-label">Số Điện Thoại</label>
            <input type="text" name="ptaDienThoai" value="{{ Session::get('ptaDienThoai', '') }}" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label for="ptaDiaChi" class="form-label">Địa Chỉ</label>
            <input type="text" name="ptaDiaChi" value="{{ Session::get('ptaDiaChi', '') }}" class="form-control" required>
        </div>

        <!-- Chọn sản phẩm và số lượng -->
        <input type="hidden" name="ptaSanPhamId" value="{{ $sanPham->id }}" required>
        <div class="mb-3">
            <label for="ptaSoLuong" class="form-label">Số Lượng</label>
            <input type="number" name="ptaSoLuong" value="1" min="1" max="{{ $sanPham->ptaSoLuong }}" class="form-control" required>
        </div>

        <!-- Nút Mua -->
        <button type="submit" class="btn btn-primary">Mua Sản Phẩm</button>
        
    </form>
</div>
@endsection