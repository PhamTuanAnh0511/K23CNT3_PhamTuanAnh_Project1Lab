@extends('layouts.admins.master')
@section('title', 'Chỉnh Sửa Quản Trị Viên')
@section('content-body')
    <div class="container">
        <form action="{{ route('ptaadmins.ptaquantri.ptaEditsubmit', $ptaquantri->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="ptaTaiKhoan">Tài Khoản</label>
                <input type="text" class="form-control" id="ptaTaiKhoan" name="ptaTaiKhoan" value="{{ $ptaquantri->ptaTaiKhoan }}" required>
                @error('ptaTaiKhoan') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="ptaMatKhau">Mật Khẩu</label>
                <input type="password" class="form-control" id="ptaMatKhau" name="ptaMatKhau">
                @error('ptaMatKhau') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="ptaTrangThai">Trạng Thái</label>
                <select name="ptaTrangThai" id="ptaTrangThai" class="form-control" required>
                    <option value="0" {{ $ptaquantri->ptaTrangThai == 0 ? 'selected' : '' }}>Cho Phép Đăng Nhập</option>
                    <option value="1" {{ $ptaquantri->ptaTrangThai == 1 ? 'selected' : '' }}>Khóa</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Cập Nhật</button>
        </form>
    </div>
@endsection