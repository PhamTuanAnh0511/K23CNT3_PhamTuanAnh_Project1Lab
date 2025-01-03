@extends('layouts.admins.master')

@section('title', 'Chỉnh Sửa Sản Phẩm')

@section('content-body')
<div class="container border mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Chỉnh Sửa Sản Phẩm</h1>
                </div>
                <div class="card-body">
                    <!-- Form chỉnh sửa sản phẩm -->
                    <form action="{{ route('ptaadmins.ptasanpham.ptaEditsubmit', $ptasanpham->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <!-- Mã sản phẩm -->
                        <div class="mb-3">
                            <label for="ptaMaSanPham" class="form-label">Mã sản phẩm</label>
                            <input type="text" name="ptaMaSanPham" class="form-control" value="{{ old('ptaMaSanPham', $ptasanpham->ptaMaSanPham) }}">
                            @error('ptaMaSanPham')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tên sản phẩm -->
                        <div class="mb-3">
                            <label for="ptaTenSanPham" class="form-label">Tên sản phẩm</label>
                            <input type="text" name="ptaTenSanPham" class="form-control" value="{{ old('ptaTenSanPham', $ptasanpham->ptaTenSanPham) }}">
                            @error('ptaTenSanPham')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Hình ảnh sản phẩm -->
                        <div class="mb-3">
                            <label for="ptaHinhAnh" class="form-label">Hình ảnh</label>
                            <input type="file" name="ptaHinhAnh" class="form-control">
                            @if($ptasanpham->ptaHinhAnh)
                                <img src="{{ asset('storage/' . $ptasanpham->ptaHinhAnh) }}" alt="Sản phẩm {{ $ptasanpham->ptaMaSanPham }}" width="200" class="mt-2">
                            @endif
                            @error('ptaHinhAnh')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Số lượng -->
                        <div class="mb-3">
                            <label for="ptaSoLuong" class="form-label">Số lượng</label>
                            <input type="number" name="ptaSoLuong" class="form-control" value="{{ old('ptaSoLuong', $ptasanpham->ptaSoLuong) }}">
                            @error('ptaSoLuong')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Đơn giá -->
                        <div class="mb-3">
                            <label for="ptaDonGia" class="form-label">Đơn giá</label>
                            <input type="number" name="ptaDonGia" class="form-control" value="{{ old('ptaDonGia', $ptasanpham->ptaDonGia) }}">
                            @error('ptaDonGia')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mã Loại -->
                        <div class="mb-3">
                            <label for="ptaMaLoai" class="form-label">Loại Danh Muc</label>
                            <select name="ptaMaLoai" id="ptaMaLoai" class="form-control">
                                @foreach ($ptaloaisanpham as $item)
                                    <option value="{{ $item->id }}" 
                                        {{ old('ptaMaLoai', $ptasanpham->ptaMaLoai) == $item->id ? 'selected' : '' }}>
                                        {{ $item->ptaTenLoai }}
                                    </option>
                                @endforeach
                            </select>
                            @error('ptaMaLoai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Trạng thái -->
                        <div class="mb-3">
                            <label for="ptaTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="ptaTrangThai1" name="ptaTrangThai" value="1" {{ old('ptaTrangThai', $ptasanpham->ptaTrangThai) == 1 ? 'checked' : '' }} />
                                <label for="ptaTrangThai1">Khóa</label>
                                &nbsp;
                                <input type="radio" id="ptaTrangThai0" name="ptaTrangThai" value="0" {{ old('ptaTrangThai', $ptasanpham->ptaTrangThai) == 0 ? 'checked' : '' }} />
                                <label for="ptaTrangThai0">Hiển Thị</label>
                            </div>
                            @error('ptaTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Nút lưu -->
                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    </form>
                </div>
                <div class="card-footer">
                    <!-- Nút quay lại danh sách sản phẩm -->
                    <a href="{{ route('ptaadmins.ptasanpham') }}" class="btn btn-secondary">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection