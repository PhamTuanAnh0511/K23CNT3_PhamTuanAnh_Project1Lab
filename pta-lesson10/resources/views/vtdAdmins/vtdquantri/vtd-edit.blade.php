@extends('_layouts.admins._master')
@section('title', 'Chỉnh Sửa Quản Trị Viên')

@section('content-body')
    <div class="container">
        <form action="{{ route('vtdadmin.vtdquantri.vtdEditSubmit', $vtdquantri->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="vtdTaiKhoan">Tài Khoản</label>
                <input type="text" class="form-control" id="vtdTaiKhoan" name="vtdTaiKhoan" value="{{ $vtdquantri->vtdTaiKhoan }}" required>
                @error('vtdTaiKhoan') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="vtdMatKhau">Mật Khẩu</label>
                <input type="password" class="form-control" id="vtdMatKhau" name="vtdMatKhau">
                @error('vtdMatKhau') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="vtdTrangThai">Trạng Thái</label>
                <select name="vtdTrangThai" id="vtdTrangThai" class="form-control" required>
                    <option value="0" {{ $vtdquantri->vtdTrangThai == 0 ? 'selected' : '' }}>Cho Phép Đăng Nhập</option>
                    <option value="1" {{ $vtdquantri->vtdTrangThai == 1 ? 'selected' : '' }}>Khóa</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Cập Nhật</button>
        </form>
    </div>
@endsection