@extends('layouts.admins.master')
@section('title', 'Thêm Quản Trị Viên')
@section('content-body')
    <div class="container">
        <form action="{{ route('ptaadmins.ptaquantri.ptaCreatesubmit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="ptaTaiKhoan">Tài Khoản</label>
                <input type="text" class="form-control" id="ptaTaiKhoan" name="ptaTaiKhoan" required>
                @error('ptaTaiKhoan') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="ptaMatKhau">Mật Khẩu</label>
                <input type="password" class="form-control" id="ptaMatKhau" name="ptaMatKhau" required>
                @error('ptaMatKhau') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="ptaTrangThai">Trạng Thái</label>
                <select name="ptaTrangThai" id="ptaTrangThai" class="form-control" required>
                    <option value="0">Cho Phép Đăng Nhập</option>
                    <option value="1">Khóa</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Thêm Quản Trị Viên</button>
        </form>
    </div>
@endsection