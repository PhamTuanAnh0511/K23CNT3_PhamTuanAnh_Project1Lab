@extends('_layouts.admins._master')
@section('title','Create Khách Hàng')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{route('vtdadmin.vtdkhachhang.vtdCreateSubmit')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới Khách Hàng</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="vtdMaKhachHang" class="form-label">Mã Khách Hàng</label>
                                <input type="text" class="form-control" id="vtdMaKhachHang" name="vtdMaKhachHang" value="{{ old('vtdMaKhachHang') }}" >
                                @error('vtdMaKhachHang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vtdHoTenKhachHang" class="form-label">Họ Tên Khách Hàng</label>
                                <input type="text" class="form-control" id="vtdHoTenKhachHang" name="vtdHoTenKhachHang" value="{{ old('vtdHoTenKhachHang') }}" >
                                @error('vtdHoTenKhachHang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vtdEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="vtdEmail" name="vtdEmail" value="{{ old('vtdEmail') }}" >
                                @error('vtdEmail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vtdMatKhau" class="form-label">Mật Khẩu</label>
                                <input type="password" class="form-control" id="vtdMatKhau" name="vtdMatKhau" value="{{ old('vtdMatKhau') }}" >
                                @error('vtdMatKhau')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vtdDienThoai" class="form-label">Điện Thoại</label>
                                <input type="tel" class="form-control" id="vtdDienThoai" name="vtdDienThoai" value="{{ old('vtdDienThoai') }}" >
                                @error('vtdDienThoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vtdDiaChi" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" id="vtdDiaChi" name="vtdDiaChi" value="{{ old('vtdDiaChi') }}" >
                                @error('vtdDiaChi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vtdNgayDangKy" class="form-label">Ngày Đăng Ký</label>
                                <input type="date" class="form-control" id="vtdNgayDangKy" name="vtdNgayDangKy" value="{{ old('vtdNgayDangKy') }}" >
                                @error('vtdNgayDangKy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vtdTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="vtdTrangThai0" name="vtdTrangThai" value="0" checked/>
                                    <label for="vtdTrangThai1"> Hoạt Động</label>
                                    &nbsp;
                                    <input type="radio" id="vtdTrangThai1" name="vtdTrangThai" value="1"/>
                                    <label for="vtdTrangThai0">Tạm Khóa</label>
                                    &nbsp;
                                    <input type="radio" id="vtdTrangThai2" name="vtdTrangThai" value="2"/>
                                    <label for="vtdTrangThai0">Khóa</label>
                                </div>
                                @error('vtdTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Create</button>
                            <a href="{{route('vtdadmins.vtdkhachhang')}}" class="btn btn-primary"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection