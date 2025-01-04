@extends('_layouts.admins._master')
@section('title', 'Thêm Quản Trị Viên')

@section('content-body')
    <div class="container">
        <form action="{{ route('vtdadmin.vtdquantri.vtdCreateSubmit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="vtdTaiKhoan">Tài Khoản</label>
                <input type="text" class="form-control" id="vtdTaiKhoan" name="vtdTaiKhoan" required>
                @error('vtdTaiKhoan') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="vtdMatKhau">Mật Khẩu</label>
                <input type="password" class="form-control" id="vtdMatKhau" name="vtdMatKhau" required>
                @error('vtdMatKhau') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="vtdTrangThai">Trạng Thái</label>
                <select name="vtdTrangThai" id="vtdTrangThai" class="form-control" required>
                    <option value="0">Cho Phép Đăng Nhập</option>
                    <option value="1">Khóa</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Thêm Quản Trị Viên</button>
        </form>
    </div>
@endsection