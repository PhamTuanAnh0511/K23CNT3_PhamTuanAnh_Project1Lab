@extends('_layouts.admins._master')

@section('title', 'Create Tin Tức')

@section('content-body')
<div class="container border">
    <div class="row">
        <div class="col">
            <form action="{{ route('vtdadmin.vtdtintuc.vtdCreateSubmit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h1>Thêm Mới Tin Tức</h1>
                    </div>
                    <div class="card-body">
                        <!-- Mã Tin Tức -->
                        <div class="mb-3">
                            <label for="vtdMaTT" class="form-label">Mã Tin Tức</label>
                            <input type="text" class="form-control" id="vtdMaTT" name="vtdMaTT" value="{{ old('vtdMaTT') }}">
                            @error('vtdMaTT')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tiêu đề tin tức -->
                        <div class="mb-3">
                            <label for="vtdTieuDe" class="form-label">Tiêu đề tin tức</label>
                            <input type="text" class="form-control" id="vtdTieuDe" name="vtdTieuDe" value="{{ old('vtdTieuDe') }}">
                            @error('vtdTieuDe')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Mô tả tin tức -->
                        <div class="mb-3">
                            <label for="vtdMoTa" class="form-label">Mô tả tin tức</label>
                            <input type="text" class="form-control" id="vtdMoTa" name="vtdMoTa" value="{{ old('vtdMoTa') }}">
                            @error('vtdMoTa')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Nội dung tin tức -->
                        <div class="mb-3">
                            <label for="vtdNoiDung" class="form-label">Nội dung tin tức</label>
                            <textarea class="form-control" id="vtdNoiDung" name="vtdNoiDung" rows="5">{{ old('vtdNoiDung') }}</textarea>
                            @error('vtdNoiDung')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Hình ảnh tin tức -->
                        <div class="mb-3">
                            <label for="vtdHinhAnh" class="form-label">Hình Ảnh</label>
                            <input type="file" class="form-control" id="vtdHinhAnh" name="vtdHinhAnh" accept="image/*">
                            @error('vtdHinhAnh')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Ngày đăng tin -->
                        <div class="mb-3">
                            <label for="vtdNgayDangTin" class="form-label">Ngày Đăng</label>
                            <input type="datetime-local" class="form-control" id="vtdNgayDangTin" name="vtdNgayDangTin" value="{{ old('vtdNgayDangTin') }}">
                            @error('vtdNgayDangTin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Ngày cập nhật -->
                        <div class="mb-3">
                            <label for="vtdNgayCapNhap" class="form-label">Ngày Cập Nhật</label>
                            <input type="datetime-local" class="form-control" id="vtdNgayCapNhap" name="vtdNgayCapNhap" value="{{ old('vtdNgayCapNhap') }}">
                            @error('vtdNgayCapNhap')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Trạng thái -->
                        <div class="mb-3">
                            <label for="vtdTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="vtdTrangThai1" name="vtdTrangThai" value="0" checked/>
                                <label for="vtdTrangThai1"> Hiển Thị</label>
                                &nbsp;
                                <input type="radio" id="vtdTrangThai0" name="vtdTrangThai" value="1"/>
                                <label for="vtdTrangThai0">Khóa</label>
                            </div>
                            @error('vtdTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success">Create</button>
                        <a href="{{ route('vtdadmins.vtdtintuc') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection