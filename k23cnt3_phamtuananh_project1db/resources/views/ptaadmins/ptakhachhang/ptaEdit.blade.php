@extends('layouts.admins.master')
@section('title','Sửa Loại Khách Hàng')
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <!-- Update the form action route to pass the ptaMaKhachHang as a parameter -->
                <form action="{{ route('ptaadmins.ptakhachhang.ptaEditsubmit', ['id' => $ptakhachhang->id]) }}" method="POST">
                    @csrf
                    <!-- Hidden input for the ID -->
                    <input type="hidden" name="id" value="{{ $ptakhachhang->id }}">

                    <div class="card">
                        <div class="card-header">
                            <h1>Sửa loại Khách Hàng</h1>
                        </div>
                        <div class="card-body">
                            <!-- Mã Loại (disabled) -->
                            <div class="mb-3">
                                <label for="ptaMaKhachHang" class="form-label">Mã Khách Hàng</label>
                                <input type="text" class="form-control" id="ptaMaKhachHang" name="ptaMaKhachHang" value="{{ $ptakhachhang->ptaMaKhachHang }}" >
                                @error('ptaMaKhachHang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                            <!-- Tên Loại -->
                            <div class="mb-3">
                                <label for="ptaHoTenKhachHang" class="form-label">Họ Tên Khách Hàng</label>
                                <input type="text" class="form-control" id="ptaHoTenKhachHang" name="ptaHoTenKhachHang" value="{{ old('ptaHoTenKhachHang', $ptakhachhang->ptaHoTenKhachHang) }}" >
                                @error('ptaHoTenKhachHang')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ptaEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="ptaEmail" name="ptaEmail" value="{{ old('ptaEmail', $ptakhachhang->ptaEmail) }}" >
                                @error('ptaEmail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ptaMatKhau" class="form-label">Mật Khẩu</label>
                                <input type="password" class="form-control" id="ptaMatKhau" name="ptaMatKhau" value="{{ old('ptaMatKhau', $ptakhachhang->ptaMatKhau) }}" >
                                @error('ptaMatKhau')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ptaDienThoai" class="form-label">Điện Thoại</label>
                                <input type="tel" class="form-control" id="ptaDienThoai" name="ptaDienThoai" value="{{ old('ptaDienThoai', $ptakhachhang->ptaDienThoai) }}" >
                                @error('ptaDienThoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ptaDiaChi" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" id="ptaDiaChi" name="ptaDiaChi" value="{{ old('ptaDiaChi', $ptakhachhang->ptaDiaChi) }}" >
                                @error('ptaDiaChi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ptaNgayDangKy" class="form-label">Ngày Đăng Ký</label>
                                <input type="date" class="form-control" id="ptaNgayDangKy" name="ptaNgayDangKy" value="{{ old('ptaNgayDangKy', $ptakhachhang->ptaNgayDangKy) }}" >
                                @error('ptaNgayDangKy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Trạng Thái -->
                            <div class="mb-3">
                                <label for="ptaTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="ptaTrangThai0" name="ptaTrangThai" value="0" {{ old('ptaTrangThai', $ptakhachhang->ptaTrangThai) == 0 ? 'checked' : '' }} />
                                    <label for="ptaTrangThai0">Hoạt Động</label>
                                    &nbsp;
                                    <input type="radio" id="ptaTrangThai1" name="ptaTrangThai" value="1" {{ old('ptaTrangThai', $ptakhachhang->ptaTrangThai) == 1 ? 'checked' : '' }} />
                                    <label for="ptaTrangThai1">Tạm Khóa</label>
                           
                                    &nbsp;
                                    <input type="radio" id="ptaTrangThai2" name="ptaTrangThai" value="2" {{ old('ptaTrangThai', $ptakhachhang->ptaTrangThai) == 2 ? 'checked' : '' }} />
                                    <label for="ptaTrangThai0">Khóa</label>
                                </div>
                                @error('ptaTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <!-- Change button label to "Cập nhật" (Update) -->
                            <button class="btn btn-success" type="submit">Cập nhật</button>
                            <a href="{{ route('ptaadmins.ptakhachhang') }}" class="btn btn-primary">Trở lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection