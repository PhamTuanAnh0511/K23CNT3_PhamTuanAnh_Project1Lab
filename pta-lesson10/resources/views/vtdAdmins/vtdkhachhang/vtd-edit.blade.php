@extends('_layouts.admins._master')
@section('title','Sửa Loại Khách Hàng')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <!-- Update the form action route to pass the vtdMaKhachHang as a parameter -->
                <form action="{{ route('vtdadmin.vtdkhachhang.vtdEditSubmit', ['id' => $vtdkhachhang->id]) }}" method="POST">
                    @csrf
                    <!-- Hidden input for the ID -->
                    <input type="hidden" name="id" value="{{ $vtdkhachhang->id }}">

                    <div class="card">
                        <div class="card-header">
                            <h1>Sửa loại Khách Hàng</h1>
                        </div>
                        <div class="card-body">
                            <!-- Mã Loại (disabled) -->
                            <div class="mb-3">
                                <label for="vtdMaKhachHang" class="form-label">Mã Khách Hàng</label>
                                <input type="text" class="form-control" id="vtdMaKhachHang" name="vtdMaKhachHang" value="{{ $vtdkhachhang->vtdMaKhachHang }}" >
                                @error('vtdMaKhachHang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                            <!-- Tên Loại -->
                            <div class="mb-3">
                                <label for="vtdHoTenKhachHang" class="form-label">Họ Tên Khách Hàng</label>
                                <input type="text" class="form-control" id="vtdHoTenKhachHang" name="vtdHoTenKhachHang" value="{{ old('vtdHoTenKhachHang', $vtdkhachhang->vtdHoTenKhachHang) }}" >
                                @error('vtdHoTenKhachHang')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vtdEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="vtdEmail" name="vtdEmail" value="{{ old('vtdEmail', $vtdkhachhang->vtdEmail) }}" >
                                @error('vtdEmail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vtdMatKhau" class="form-label">Mật Khẩu</label>
                                <input type="password" class="form-control" id="vtdMatKhau" name="vtdMatKhau" value="{{ old('vtdMatKhau', $vtdkhachhang->vtdMatKhau) }}" >
                                @error('vtdMatKhau')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vtdDienThoai" class="form-label">Điện Thoại</label>
                                <input type="tel" class="form-control" id="vtdDienThoai" name="vtdDienThoai" value="{{ old('vtdDienThoai', $vtdkhachhang->vtdDienThoai) }}" >
                                @error('vtdDienThoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vtdDiaChi" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" id="vtdDiaChi" name="vtdDiaChi" value="{{ old('vtdDiaChi', $vtdkhachhang->vtdDiaChi) }}" >
                                @error('vtdDiaChi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vtdNgayDangKy" class="form-label">Ngày Đăng Ký</label>
                                <input type="date" class="form-control" id="vtdNgayDangKy" name="vtdNgayDangKy" value="{{ old('vtdNgayDangKy', $vtdkhachhang->vtdNgayDangKy) }}" >
                                @error('vtdNgayDangKy')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Trạng Thái -->
                            <div class="mb-3">
                                <label for="vtdTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="vtdTrangThai0" name="vtdTrangThai" value="0" {{ old('vtdTrangThai', $vtdkhachhang->vtdTrangThai) == 0 ? 'checked' : '' }} />
                                    <label for="vtdTrangThai0">Hoạt Động</label>
                                    &nbsp;
                                    <input type="radio" id="vtdTrangThai1" name="vtdTrangThai" value="1" {{ old('vtdTrangThai', $vtdkhachhang->vtdTrangThai) == 1 ? 'checked' : '' }} />
                                    <label for="vtdTrangThai1">Tạm Khóa</label>
                           
                                    &nbsp;
                                    <input type="radio" id="vtdTrangThai2" name="vtdTrangThai" value="2" {{ old('vtdTrangThai', $vtdkhachhang->vtdTrangThai) == 2 ? 'checked' : '' }} />
                                    <label for="vtdTrangThai0">Khóa</label>
                                </div>
                                @error('vtdTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <!-- Change button label to "Cập nhật" (Update) -->
                            <button class="btn btn-success" type="submit">Cập nhật</button>
                            <a href="{{ route('vtdadmins.vtdkhachhang') }}" class="btn btn-primary">Trở lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection