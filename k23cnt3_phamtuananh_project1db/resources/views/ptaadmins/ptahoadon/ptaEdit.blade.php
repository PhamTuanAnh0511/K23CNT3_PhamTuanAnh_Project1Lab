@extends('layouts.admins.master')
@section('title','Sửa Loại Hóa Đơn')
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <!-- Update the form action route to pass the ptaMaKhachHang as a parameter -->
                <form action="{{ route('ptaadmins.ptahoadon.ptaEditsubmit', ['id' => $ptahoadon->id]) }}" method="POST">
                    @csrf
                    <!-- Hidden input for the ID -->
                    <input type="hidden" name="id" value="{{ $ptahoadon->id }}">

                    <div class="card">
                        <div class="card-header">
                            <h1>Sửa loại Hóa Đơn</h1>
                        </div>
                        <div class="card-body">
                            <!-- Mã Loại (disabled) -->
                            <div class="mb-3">
                                <label for="ptaMaHoaDon" class="form-label">Mã Hóa Đơn</label>
                                <input type="text" class="form-control" id="ptaMaHoaDon" name="ptaMaHoaDon" value="{{ $ptahoadon->ptaMaHoaDon }}" >
                                @error('ptaMaHoaDon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ptaMaKhachHang" class="form-label">Khách Hàng</label>
                                <select name="ptaMaKhachHang" id="ptaMaKhachHang" class="form-control">
                                    @foreach ($ptakhachhang as $item)
                                        <option value="{{ $item->id }}" 
                                            {{ old('ptaMaKhachHang', $ptahoadon->ptaMaKhachHang) == $item->id ? 'selected' : '' }}>
                                            {{ $item->ptaHoTenKhachHang }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('ptaMaKhachHang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                             
                             <div class="mb-3">
                                <label for="ptaNgayHoaDon" class="form-label">Ngày Hóa Đơn</label>
                                <input type="date" class="form-control" id="ptaNgayHoaDon" name="ptaNgayHoaDon" value="{{ old('ptaNgayHoaDon', $ptahoadon->ptaNgayHoaDon) }}" >
                                @error('ptaNgayHoaDon')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>

                             <div class="mb-3">
                                <label for="ptaNgayNhan" class="form-label">Ngày Nhận</label>
                                <input type="date" class="form-control" id="ptaNgayNhan" name="ptaNgayNhan" value="{{ old('ptaNgayNhan', $ptahoadon->ptaNgayNhan) }}" >
                                @error('ptaNgayNhan')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>


                            <!-- Tên Loại -->
                            <div class="mb-3">
                                <label for="ptaHoTenKhachHang" class="form-label">Họ Tên Khách Hàng</label>
                                <input type="text" class="form-control" id="ptaHoTenKhachHang" name="ptaHoTenKhachHang" value="{{ old('ptaHoTenKhachHang', $ptahoadon->ptaHoTenKhachHang) }}" >
                                @error('ptaHoTenKhachHang')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ptaEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="ptaEmail" name="ptaEmail" value="{{ old('ptaEmail', $ptahoadon->ptaEmail) }}" >
                                @error('ptaEmail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            

                            <div class="mb-3">
                                <label for="ptaDienThoai" class="form-label">Điện Thoại</label>
                                <input type="tel" class="form-control" id="ptaDienThoai" name="ptaDienThoai" value="{{ old('ptaDienThoai', $ptahoadon->ptaDienThoai) }}" >
                                @error('ptaDienThoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ptaDiaChi" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" id="ptaDiaChi" name="ptaDiaChi" value="{{ old('ptaDiaChi', $ptahoadon->ptaDiaChi) }}" >
                                @error('ptaDiaChi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ptaTongGiaTri" class="form-label">Tổng Giá Trị</label>
                                <input type="number" class="form-control" id="ptaTongGiaTri" name="ptaTongGiaTri" value="{{ old('ptaTongGiaTri', $ptahoadon->ptaTongGiaTri) }}" >
                                @error('ptaTongGiaTri')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Trạng Thái -->
                            <div class="mb-3">
                                <label for="ptaTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="ptaTrangThai0" name="ptaTrangThai" value="0" {{ old('ptaTrangThai', $ptahoadon->ptaTrangThai) == 0 ? 'checked' : '' }} />
                                    <label for="ptaTrangThai0">Chờ Sử Lý</label>
                                    &nbsp;
                                    <input type="radio" id="ptaTrangThai1" name="ptaTrangThai" value="1" {{ old('ptaTrangThai', $ptahoadon->ptaTrangThai) == 1 ? 'checked' : '' }} />
                                    <label for="ptaTrangThai1">Đang Sử Lý</label>
                           
                                    &nbsp;
                                    <input type="radio" id="ptaTrangThai2" name="ptaTrangThai" value="2" {{ old('ptaTrangThai', $ptahoadon->ptaTrangThai) == 2 ? 'checked' : '' }} />
                                    <label for="ptaTrangThai0">Đã Hoàn Thành</label>
                                </div>
                                @error('ptaTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <!-- Change button label to (edit) -->
                            <button class="btn btn-success" type="submit">Sửa</button>
                            <a href="{{ route('ptaadmins.ptahoadon') }}" class="btn btn-primary">Trở lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection