@extends('layouts.admins.master')
@section('title','Create Khách Hàng')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{route('ptaadmins.ptakhachhang.ptaCreatesubmit')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới Khách Hàng</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="ptaMaKhachHang" class="form-label">Mã Khách Hàng</label>
                                <input type="text" class="form-control" id="ptaMaKhachHang" name="ptaMaKhachHang" value="{{ old('ptaMaKhachHang') }}" >
                                @error('ptaMaKhachHang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ptaHoTenKhachHang" class="form-label">Họ Tên Khách Hàng</label>
                                <input type="text" class="form-control" id="ptaHoTenKhachHang" name="ptaHoTenKhachHang" value="{{ old('ptaHoTenKhachHang') }}" >
                                @error('ptaHoTenKhachHang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ptaEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="ptaEmail" name="ptaEmail" value="{{ old('ptaEmail') }}" >
                                @error('ptaEmail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ptaMatKhau" class="form-label">Mật Khẩu</label>
                                <input type="password" class="form-control" id="ptaMatKhau" name="ptaMatKhau" value="{{ old('ptaMatKhau') }}" >
                                @error('ptaMatKhau')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ptaDienThoai" class="form-label">Điện Thoại</label>
                                <input type="tel" class="form-control" id="ptaDienThoai" name="ptaDienThoai" value="{{ old('ptaDienThoai') }}" >
                                @error('ptaDienThoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ptaDiaChi" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" id="ptaDiaChi" name="ptaDiaChi" value="{{ old('ptaDiaChi') }}" >
                                @error('ptaDiaChi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ptaNgayDangKy" class="form-label">Ngày Đăng Ký</label>
                                <input type="date" class="form-control" id="ptaNgayDangKy" name="ptaNgayDangKy" value="{{ old('ptaNgayDangKy') }}" >
                                @error('ptaNgayDangKy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ptaTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="ptaTrangThai0" name="ptaTrangThai" value="0" checked/>
                                    <label for="ptaTrangThai1"> Hoạt Động</label>
                                    &nbsp;
                                    <input type="radio" id="ptaTrangThai1" name="ptaTrangThai" value="1"/>
                                    <label for="ptaTrangThai0">Tạm Khóa</label>
                                    &nbsp;
                                    <input type="radio" id="ptaTrangThai2" name="ptaTrangThai" value="2"/>
                                    <label for="ptaTrangThai0">Khóa</label>
                                </div>
                                @error('ptaTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Create</button>
                            <a href="{{route('ptaadmins.ptakhachhang')}}" class="btn btn-primary"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection