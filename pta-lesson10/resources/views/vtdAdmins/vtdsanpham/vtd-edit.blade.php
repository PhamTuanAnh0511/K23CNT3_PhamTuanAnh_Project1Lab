@extends('_layouts.admins._master')

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
                    <form action="{{ route('vtdadmin.vtdsanpham.vtdEditSubmit', $vtdsanpham->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <!-- Mã sản phẩm -->
                        <div class="mb-3">
                            <label for="vtdMaSanPham" class="form-label">Mã sản phẩm</label>
                            <input type="text" name="vtdMaSanPham" class="form-control" value="{{ old('vtdMaSanPham', $vtdsanpham->vtdMaSanPham) }}">
                            @error('vtdMaSanPham')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tên sản phẩm -->
                        <div class="mb-3">
                            <label for="vtdTenSanPham" class="form-label">Tên sản phẩm</label>
                            <input type="text" name="vtdTenSanPham" class="form-control" value="{{ old('vtdTenSanPham', $vtdsanpham->vtdTenSanPham) }}">
                            @error('vtdTenSanPham')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Hình ảnh sản phẩm -->
                        <div class="mb-3">
                            <label for="vtdHinhAnh" class="form-label">Hình ảnh</label>
                            <input type="file" name="vtdHinhAnh" class="form-control">
                            @if($vtdsanpham->vtdHinhAnh)
                                <img src="{{ asset('storage/' . $vtdsanpham->vtdHinhAnh) }}" alt="Sản phẩm {{ $vtdsanpham->vtdMaSanPham }}" width="200" class="mt-2">
                            @endif
                            @error('vtdHinhAnh')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Số lượng -->
                        <div class="mb-3">
                            <label for="vtdSoLuong" class="form-label">Số lượng</label>
                            <input type="number" name="vtdSoLuong" class="form-control" value="{{ old('vtdSoLuong', $vtdsanpham->vtdSoLuong) }}">
                            @error('vtdSoLuong')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Đơn giá -->
                        <div class="mb-3">
                            <label for="vtdDonGia" class="form-label">Đơn giá</label>
                            <input type="number" name="vtdDonGia" class="form-control" value="{{ old('vtdDonGia', $vtdsanpham->vtdDonGia) }}">
                            @error('vtdDonGia')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mã Loại -->
                        <div class="mb-3">
                            <label for="vtdMaLoai" class="form-label">Loại Danh Muc</label>
                            <select name="vtdMaLoai" id="vtdMaLoai" class="form-control">
                                @foreach ($vtdloaisanpham as $item)
                                    <option value="{{ $item->id }}" 
                                        {{ old('vtdMaLoai', $vtdsanpham->vtdMaLoai) == $item->id ? 'selected' : '' }}>
                                        {{ $item->vtdTenLoai }}
                                    </option>
                                @endforeach
                            </select>
                            @error('vtdMaLoai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Trạng thái -->
                        <div class="mb-3">
                            <label for="vtdTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="vtdTrangThai1" name="vtdTrangThai" value="1" {{ old('vtdTrangThai', $vtdsanpham->vtdTrangThai) == 1 ? 'checked' : '' }} />
                                <label for="vtdTrangThai1">Khóa</label>
                                &nbsp;
                                <input type="radio" id="vtdTrangThai0" name="vtdTrangThai" value="0" {{ old('vtdTrangThai', $vtdsanpham->vtdTrangThai) == 0 ? 'checked' : '' }} />
                                <label for="vtdTrangThai0">Hiển Thị</label>
                            </div>
                            @error('vtdTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Nút lưu -->
                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    </form>
                </div>
                <div class="card-footer">
                    <!-- Nút quay lại danh sách sản phẩm -->
                    <a href="{{ route('vtdadims.vtdsanpham') }}" class="btn btn-secondary">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection