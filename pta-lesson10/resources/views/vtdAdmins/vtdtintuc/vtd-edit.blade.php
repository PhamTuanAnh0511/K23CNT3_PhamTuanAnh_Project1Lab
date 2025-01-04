@extends('_layouts.admins._master')

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
                    <form action="{{ route('vtdadmin.vtdtintuc.vtdEditSubmit', $vtdtinTuc->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <!-- Tiêu đề tin tức -->
                        <div class="mb-3">
                            <label for="vtdTieuDe" class="form-label">Tiêu đề tin tức</label>
                            <input type="text" name="vtdTieuDe" class="form-control" value="{{ old('vtdTieuDe', $vtdtinTuc->vtdTieuDe) }}">
                            @error('vtdTieuDe')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mô tả tin tức -->
                        <div class="mb-3">
                            <label for="vtdMoTa" class="form-label">Mô tả tin tức</label>
                            <input type="text" name="vtdMoTa" class="form-control" value="{{ old('vtdMoTa', $vtdtinTuc->vtdMoTa) }}">
                            @error('vtdMoTa')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nội dung tin tức -->
                        <div class="mb-3">
                            <label for="vtdNoiDung" class="form-label">Nội dung tin tức</label>
                            <textarea name="vtdNoiDung" class="form-control" rows="5">{{ old('vtdNoiDung', $vtdtinTuc->vtdNoiDung) }}</textarea>
                            @error('vtdNoiDung')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Hình ảnh tin tức -->
                        <div class="mb-3">
                            <label for="vtdHinhAnh" class="form-label">Hình ảnh</label>
                            <input type="file" name="vtdHinhAnh" class="form-control">
                            @if($vtdtinTuc->vtdHinhAnh)
                                <img src="{{ asset('storage/' . $vtdtinTuc->vtdHinhAnh) }}" alt="Tin tức {{ $vtdtinTuc->vtdTieuDe }}" width="200" class="mt-2">
                            @endif
                            @error('vtdHinhAnh')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ngày đăng -->
                        <div class="mb-3">
                            <label for="vtdNgayDangTin" class="form-label">Ngày Đăng</label>
                            <input type="datetime-local" name="vtdNgayDangTin" class="form-control" value="{{ old('vtdNgayDangTin', $vtdtinTuc->vtdNgayDangTin) }}">
                            @error('vtdNgayDangTin')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ngày cập nhật -->
                        <div class="mb-3">
                            <label for="vtdNgayCapNhap" class="form-label">Ngày Cập Nhật</label>
                            <input type="datetime-local" name="vtdNgayCapNhap" class="form-control" value="{{ old('vtdNgayCapNhap', $vtdtinTuc->vtdNgayCapNhap) }}">
                            @error('vtdNgayCapNhap')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Trạng thái -->
                        <div class="mb-3">
                            <label for="vtdTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="vtdTrangThai1" name="vtdTrangThai" value="1" {{ old('vtdTrangThai', $vtdtinTuc->vtdTrangThai) == 1 ? 'checked' : '' }} />
                                <label for="vtdTrangThai1">Khóa</label>
                                &nbsp;
                                <input type="radio" id="vtdTrangThai0" name="vtdTrangThai" value="0" {{ old('vtdTrangThai', $vtdtinTuc->vtdTrangThai) == 0 ? 'checked' : '' }} />
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
                    <!-- Nút quay lại danh sách tin tức -->
                    <a href="{{ route('vtdadmins.vtdtintuc') }}" class="btn btn-secondary">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection