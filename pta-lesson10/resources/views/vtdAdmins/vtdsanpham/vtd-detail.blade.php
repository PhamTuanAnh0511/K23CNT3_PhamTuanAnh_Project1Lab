@extends('_layouts.admins._master')

@section('title', 'Chi Tiết Sản Phẩm')

@section('content-body')
<div class="container border mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Chi Tiết Sản Phẩm</h1>
                </div>
                <div class="card-body">
                    <!-- Mã sản phẩm -->
                    <p class="card-text">
                        <b>Mã sản phẩm:</b> {{ $vtdsanpham->vtdMaSanPham }}
                    </p>

                    <!-- Tên sản phẩm -->
                    <p class="card-text">
                        <b>Tên sản phẩm:</b> {{ $vtdsanpham->vtdTenSanPham }}
                    </p>

                    <!-- Hình ảnh sản phẩm -->
                    <p class="card-text">
                        <b>Hình Ảnh:</b><br>
                        <img src="{{ asset('storage/' . $vtdsanpham->vtdHinhAnh) }}" alt="Sản phẩm {{ $vtdsanpham->vtdMaSanPham }}" width="200" class="img-fluid">
                    </p>

                    <!-- Số lượng -->
                    <p class="card-text">
                        <b>Số Lượng:</b> {{ $vtdsanpham->vtdSoLuong }}
                    </p>

                    <!-- Đơn giá -->
                    <p class="card-text">
                        <b>Đơn Giá:</b> {{ number_format($vtdsanpham->vtdDonGia, 0, ',', '.') }} VND
                    </p>

                    <!-- Mã Loại -->
                    <p class="card-text">
                        <b>Mã Loại:</b> {{ $vtdsanpham->vtdMaLoai }}
                    </p>

                    <!-- Trạng thái -->
                    <p class="card-text">
                        <b>Trạng Thái:</b>
                        @if($vtdsanpham->vtdTrangThai == 0)
                            <span class="badge bg-success">Hiển Thị</span>
                        @else
                            <span class="badge bg-danger">Khóa</span>
                        @endif
                    </p>
                </div>
                <div class="card-footer">
                    <!-- Nút Quay lại -->
                    <a href="{{ route('vtdadims.vtdsanpham') }}" class="btn btn-primary">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection