@extends('layouts.admins.master')
@section('title','Create Hóa Đơn')
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{route('ptaadmins.ptahoadon.ptaCreatesubmit')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới Hóa Đơn</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="ptaMaHoaDon" class="form-label">Mã Hóa Đơn</label>
                                <input type="text" class="form-control" id="ptaMaHoaDon" name="ptaMaHoaDon" value="{{ old('ptaMaHoaDon') }}" >
                                @error('ptaMaHoaDon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ptaMaKhachHang" class="form-label">Khách Hàng</label>
                                <select name="ptaMaKhachHang" id="ptaMaKhachHang" class="form-control">
                                    @foreach ($ptakhachhang as $item)
                                        <option value="{{ $item->id }}">{{ $item->ptaHoTenKhachHang }}</option>
                                    @endforeach
                                </select>
                                @error('ptaMaKhachHang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ptaNgayHoaDon" class="form-label">Ngày Hóa Đơn</label>
                                <input type="date" class="form-control" id="ptaNgayHoaDon" name="ptaNgayHoaDon" value="{{ old('ptaNgayHoaDon') }}" >
                                @error('ptaNgayHoaDon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ptaNgayNhan" class="form-label">Ngày Nhận</label>
                                <input type="date" class="form-control" id="ptaNgayNhan" name="ptaNgayNhan" value="{{ old('ptaNgayNhan') }}" >
                                @error('ptaNgayNhan')
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
                                <input type="Email" class="form-control" id="ptaEmail" name="ptaEmail" value="{{ old('ptaEmail') }}" >
                                @error('ptaEmail')
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
                                <label for="ptaTongGiaTri" class="form-label">Tổng Giá Trị</label>
                                <input type="number" class="form-control" id="ptaTongGiaTri" name="ptaTongGiaTri" value="{{ old('ptaTongGiaTri') }}" >
                                @error('ptaTongGiaTri')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ptaTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="ptaTrangThai0" name="ptaTrangThai" value="0" checked/>
                                    <label for="ptaTrangThai1">Chờ Sử Lý</label>
                                    &nbsp;
                                    <input type="radio" id="ptaTrangThai1" name="ptaTrangThai" value="1"/>
                                    <label for="ptaTrangThai0">Đang Sử Lý</label>
                                    &nbsp;
                                    <input type="radio" id="ptaTrangThai2" name="ptaTrangThai" value="2"/>
                                    <label for="ptaTrangThai0">Đã hoàn Thành</label>
                                </div>
                                @error('ptaTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Create</button>
                            <a href="{{route('ptaadmins.ptahoadon')}}" class="btn btn-primary"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection