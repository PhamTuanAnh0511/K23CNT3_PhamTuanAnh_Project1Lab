@extends('layouts.admins.master')
@section('title', 'Chỉnh Sửa Tin Tức')
@section('content-body')
<div class="container border mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Chỉnh Sửa Tin Tức</h1>
                </div>
                <div class="card-body">
                    <!-- Form chỉnh sửa tin tức -->
                    <form action="{{ route('ptaadmins.ptatintuc.ptaEditsubmit', $ptatintuc->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <!-- Tiêu đề tin tức -->
                        <div class="mb-3">
                            <label for="ptaTieuDe" class="form-label">Tiêu đề tin tức</label>
                            <input type="text" name="ptaTieuDe" class="form-control" value="{{ old('ptaTieuDe', $ptatintuc->ptaTieuDe) }}">
                            @error('ptaTieuDe')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mô tả tin tức -->
                        <div class="mb-3">
                            <label for="ptaMoTa" class="form-label">Mô tả tin tức</label>
                            <input type="text" name="ptaMoTa" class="form-control" value="{{ old('ptaMoTa', $ptatintuc->ptaMoTa) }}">
                            @error('ptaMoTa')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nội dung tin tức -->
                        <div class="mb-3">
                            <label for="ptaNoiDung" class="form-label">Nội dung tin tức</label>
                            <textarea name="ptaNoiDung" class="form-control" rows="5">{{ old('ptaNoiDung', $ptatintuc->ptaNoiDung) }}</textarea>
                            @error('ptaNoiDung')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Hình ảnh tin tức -->
                        <div class="mb-3">
                            <label for="ptaHinhAnh" class="form-label">Hình ảnh</label>
                            <input type="file" name="ptaHinhAnh" class="form-control">
                            @if($ptatintuc->ptaHinhAnh)
                                <img src="{{ asset('storage/' . $ptatintuc->ptaHinhAnh) }}" alt="Tin tức {{ $ptatintuc->ptaTieuDe }}" width="200" class="mt-2">
                            @endif
                            @error('ptaHinhAnh')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ngày đăng -->
                        <div class="mb-3">
                            <label for="ptaNgayDangTin" class="form-label">Ngày Đăng</label>
                            <input type="datetime-local" name="ptaNgayDangTin" class="form-control" value="{{ old('ptaNgayDangTin', $ptatintuc->ptaNgayDangTin) }}">
                            @error('ptaNgayDangTin')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ngày cập nhật -->
                        <div class="mb-3">
                            <label for="ptaNgayCapNhap" class="form-label">Ngày Cập Nhật</label>
                            <input type="datetime-local" name="ptaNgayCapNhap" class="form-control" value="{{ old('ptaNgayCapNhap', $ptatintuc->ptaNgayCapNhap) }}">
                            @error('ptaNgayCapNhap')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Trạng thái -->
                        <div class="mb-3">
                            <label for="ptaTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="ptaTrangThai1" name="ptaTrangThai" value="1" {{ old('ptaTrangThai', $ptatintuc->ptaTrangThai) == 1 ? 'checked' : '' }} />
                                <label for="ptaTrangThai1">Khóa</label>
                                &nbsp;
                                <input type="radio" id="ptaTrangThai0" name="ptaTrangThai" value="0" {{ old('ptaTrangThai', $ptatintuc->ptaTrangThai) == 0 ? 'checked' : '' }} />
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
                    <!-- Nút quay lại danh sách tin tức -->
                    <a href="{{ route('ptaadmins.ptatintuc') }}" class="btn btn-secondary">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection