@extends('layouts.admins.master')
@section('title', 'Create Tin Tức')
@section('content-body')
<div class="container border">
    <div class="row">
        <div class="col">
            <form action="{{ route('ptaadmins.ptatintuc.ptaCreatesubmit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h1>Thêm Mới Tin Tức</h1>
                    </div>
                    <div class="card-body">
                        <!-- Mã Tin Tức -->
                        <div class="mb-3">
                            <label for="ptaMaTT" class="form-label">Mã Tin Tức</label>
                            <input type="text" class="form-control" id="ptaMaTT" name="ptaMaTT" value="{{ old('ptaMaTT') }}">
                            @error('ptaMaTT')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tiêu đề tin tức -->
                        <div class="mb-3">
                            <label for="ptaTieuDe" class="form-label">Tiêu đề tin tức</label>
                            <input type="text" class="form-control" id="ptaTieuDe" name="ptaTieuDe" value="{{ old('ptaTieuDe') }}">
                            @error('ptaTieuDe')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Mô tả tin tức -->
                        <div class="mb-3">
                            <label for="ptaMoTa" class="form-label">Mô tả tin tức</label>
                            <input type="text" class="form-control" id="ptaMoTa" name="ptaMoTa" value="{{ old('ptaMoTa') }}">
                            @error('ptaMoTa')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Nội dung tin tức -->
                        <div class="mb-3">
                            <label for="ptaNoiDung" class="form-label">Nội dung tin tức</label>
                            <textarea class="form-control" id="ptaNoiDung" name="ptaNoiDung" rows="5">{{ old('ptaNoiDung') }}</textarea>
                            @error('ptaNoiDung')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Hình ảnh tin tức -->
                        <div class="mb-3">
                            <label for="ptaHinhAnh" class="form-label">Hình Ảnh</label>
                            <input type="file" class="form-control" id="ptaHinhAnh" name="ptaHinhAnh" accept="image/*">
                            @error('ptaHinhAnh')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Ngày đăng tin -->
                        <div class="mb-3">
                            <label for="ptaNgayDangTin" class="form-label">Ngày Đăng</label>
                            <input type="datetime-local" class="form-control" id="ptaNgayDangTin" name="ptaNgayDangTin" value="{{ old('ptaNgayDangTin') }}">
                            @error('ptaNgayDangTin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Ngày cập nhật -->
                        <div class="mb-3">
                            <label for="ptaNgayCapNhap" class="form-label">Ngày Cập Nhật</label>
                            <input type="datetime-local" class="form-control" id="ptaNgayCapNhap" name="ptaNgayCapNhap" value="{{ old('ptaNgayCapNhap') }}">
                            @error('ptaNgayCapNhap')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Trạng thái -->
                        <div class="mb-3">
                            <label for="ptaTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="ptaTrangThai1" name="ptaTrangThai" value="0" checked/>
                                <label for="ptaTrangThai1"> Hiển Thị</label>
                                &nbsp;
                                <input type="radio" id="ptaTrangThai0" name="ptaTrangThai" value="1"/>
                                <label for="ptaTrangThai0">Khóa</label>
                            </div>
                            @error('ptaTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success">Create</button>
                        <a href="{{ route('ptaadmins.ptatintuc') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection