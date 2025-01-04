@extends('_layouts.admins._master')
@section('title','Sửa Loại Hóa Đơn')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <!-- Update the form action route to pass the vtdMaKhachHang as a parameter -->
                <form action="{{ route('vtdadmin.vtdhoadon.vtdEditSubmit', ['id' => $vtdhoadon->id]) }}" method="POST">
                    @csrf
                    <!-- Hidden input for the ID -->
                    <input type="hidden" name="id" value="{{ $vtdhoadon->id }}">

                    <div class="card">
                        <div class="card-header">
                            <h1>Sửa loại Hóa Đơn</h1>
                        </div>
                        <div class="card-body">
                            <!-- Mã Loại (disabled) -->
                            <div class="mb-3">
                                <label for="vtdMaHoaDon" class="form-label">Mã Hóa Đơn</label>
                                <input type="text" class="form-control" id="vtdMaHoaDon" name="vtdMaHoaDon" value="{{ $vtdhoadon->vtdMaHoaDon }}" >
                                @error('vtdMaHoaDon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vtdMaKhachHang" class="form-label">Khách Hàng</label>
                                <select name="vtdMaKhachHang" id="vtdMaKhachHang" class="form-control">
                                    @foreach ($vtdkhachhang as $item)
                                        <option value="{{ $item->id }}" 
                                            {{ old('vtdMaKhachHang', $vtdhoadon->vtdMaKhachHang) == $item->id ? 'selected' : '' }}>
                                            {{ $item->vtdHoTenKhachHang }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('vtdMaKhachHang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                             
                             <div class="mb-3">
                                <label for="vtdNgayHoaDon" class="form-label">Ngày Hóa Đơn</label>
                                <input type="date" class="form-control" id="vtdNgayHoaDon" name="vtdNgayHoaDon" value="{{ old('vtdNgayHoaDon', $vtdhoadon->vtdNgayHoaDon) }}" >
                                @error('vtdNgayHoaDon')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>

                             <div class="mb-3">
                                <label for="vtdNgayNhan" class="form-label">Ngày Nhận</label>
                                <input type="date" class="form-control" id="vtdNgayNhan" name="vtdNgayNhan" value="{{ old('vtdNgayNhan', $vtdhoadon->vtdNgayNhan) }}" >
                                @error('vtdNgayNhan')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>


                            <!-- Tên Loại -->
                            <div class="mb-3">
                                <label for="vtdHoTenKhachHang" class="form-label">Họ Tên Khách Hàng</label>
                                <input type="text" class="form-control" id="vtdHoTenKhachHang" name="vtdHoTenKhachHang" value="{{ old('vtdHoTenKhachHang', $vtdhoadon->vtdHoTenKhachHang) }}" >
                                @error('vtdHoTenKhachHang')
                                    <span class="text-danger">{{ $message }}</span> 
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vtdEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="vtdEmail" name="vtdEmail" value="{{ old('vtdEmail', $vtdhoadon->vtdEmail) }}" >
                                @error('vtdEmail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            

                            <div class="mb-3">
                                <label for="vtdDienThoai" class="form-label">Điện Thoại</label>
                                <input type="tel" class="form-control" id="vtdDienThoai" name="vtdDienThoai" value="{{ old('vtdDienThoai', $vtdhoadon->vtdDienThoai) }}" >
                                @error('vtdDienThoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vtdDiaChi" class="form-label">Địa Chỉ</label>
                                <input type="text" class="form-control" id="vtdDiaChi" name="vtdDiaChi" value="{{ old('vtdDiaChi', $vtdhoadon->vtdDiaChi) }}" >
                                @error('vtdDiaChi')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vtdTongGiaTri" class="form-label">Tổng Giá Trị</label>
                                <input type="number" class="form-control" id="vtdTongGiaTri" name="vtdTongGiaTri" value="{{ old('vtdTongGiaTri', $vtdhoadon->vtdTongGiaTri) }}" >
                                @error('vtdTongGiaTri')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Trạng Thái -->
                            <div class="mb-3">
                                <label for="vtdTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="vtdTrangThai0" name="vtdTrangThai" value="0" {{ old('vtdTrangThai', $vtdhoadon->vtdTrangThai) == 0 ? 'checked' : '' }} />
                                    <label for="vtdTrangThai0">Chờ Sử Lý</label>
                                    &nbsp;
                                    <input type="radio" id="vtdTrangThai1" name="vtdTrangThai" value="1" {{ old('vtdTrangThai', $vtdhoadon->vtdTrangThai) == 1 ? 'checked' : '' }} />
                                    <label for="vtdTrangThai1">Đang Sử Lý</label>
                           
                                    &nbsp;
                                    <input type="radio" id="vtdTrangThai2" name="vtdTrangThai" value="2" {{ old('vtdTrangThai', $vtdhoadon->vtdTrangThai) == 2 ? 'checked' : '' }} />
                                    <label for="vtdTrangThai0">Đã Hoàn Thành</label>
                                </div>
                                @error('vtdTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <!-- Change button label to (edit) -->
                            <button class="btn btn-success" type="submit">Sửa</button>
                            <a href="{{ route('vtdadmins.vtdhoadon') }}" class="btn btn-primary">Trở lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection