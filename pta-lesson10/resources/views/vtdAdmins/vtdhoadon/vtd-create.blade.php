@extends('_layouts.admins._master')
@section('title','Create Hóa Đơn')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{route('vtdadmin.vtdhoadon.vtdCreateSubmit')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới Hóa Đơn</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="vtdMaHoaDon" class="form-label">Mã Hóa Đơn</label>
                                <input type="text" class="form-control" id="vtdMaHoaDon" name="vtdMaHoaDon" value="{{ old('vtdMaHoaDon') }}" >
                                @error('vtdMaHoaDon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vtdMaKhachHang" class="form-label">Khách Hàng</label>
                                <select name="vtdMaKhachHang" id="vtdMaKhachHang" class="form-control">
                                    @foreach ($vtdkhachhang as $item)
                                        <option value="{{ $item->id }}">{{ $item->vtdHoTenKhachHang }}</option>
                                    @endforeach
                                </select>
                                @error('vtdMaKhachHang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vtdNgayHoaDon" class="form-label">Ngày Hóa Đơn</label>
                                <input type="date" class="form-control" id="vtdNgayHoaDon" name="vtdNgayHoaDon" value="{{ old('vtdNgayHoaDon') }}" >
                                @error('vtdNgayHoaDon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vtdNgayNhan" class="form-label">Ngày Nhận</label>
                                <input type="date" class="form-control" id="vtdNgayNhan" name="vtdNgayNhan" value="{{ old('vtdNgayNhan') }}" >
                                @error('vtdNgayNhan')
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
                                <input type="Email" class="form-control" id="vtdEmail" name="vtdEmail" value="{{ old('vtdEmail') }}" >
                                @error('vtdEmail')
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
                                <label for="vtdTongGiaTri" class="form-label">Tổng Giá Trị</label>
                                <input type="number" class="form-control" id="vtdTongGiaTri" name="vtdTongGiaTri" value="{{ old('vtdTongGiaTri') }}" >
                                @error('vtdTongGiaTri')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vtdTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="vtdTrangThai0" name="vtdTrangThai" value="0" checked/>
                                    <label for="vtdTrangThai1">Chờ Sử Lý</label>
                                    &nbsp;
                                    <input type="radio" id="vtdTrangThai1" name="vtdTrangThai" value="1"/>
                                    <label for="vtdTrangThai0">Đang Sử Lý</label>
                                    &nbsp;
                                    <input type="radio" id="vtdTrangThai2" name="vtdTrangThai" value="2"/>
                                    <label for="vtdTrangThai0">Đã hoàn Thành</label>
                                </div>
                                @error('vtdTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Create</button>
                            <a href="{{route('vtdadmins.vtdhoadon')}}" class="btn btn-primary"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection