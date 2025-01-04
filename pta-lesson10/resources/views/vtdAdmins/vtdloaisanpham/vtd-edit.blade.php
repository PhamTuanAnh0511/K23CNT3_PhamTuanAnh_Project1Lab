@extends('_layouts.admins._master')
@section('title','Sửa Loại Sản Phẩm')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <!-- Update the form action route to pass the vtdMaLoai as a parameter -->
                <form action="{{ route('vtdadmin.vtdloaisanpham.vtdEditSubmit') }}" method="POST">
                    @csrf
                    <!-- Hidden input for the ID -->
                    <input type="hidden" name="id" value="{{ $vtdloaisanpham->id }}">

                    <div class="card">
                        <div class="card-header">
                            <h1>Sửa loại sản phẩm</h1>
                        </div>
                        <div class="card-body">
                            <!-- Mã Loại (disabled) -->
                            <div class="mb-3">
                                <label for="vtdMaLoai" class="form-label">Mã Loại</label>
                                <input type="text" class="form-control" id="vtdMaLoai" name="vtdMaLoai" value="{{ $vtdloaisanpham->vtdMaLoai }}" >
                                @error('vtdMaLoai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                            <!-- Tên Loại -->
                            <div class="mb-3">
                                <label for="vtdTenLoai" class="form-label">Tên Loại</label>
                                <input type="text" class="form-control" id="vtdTenLoai" name="vtdTenLoai" value="{{ old('vtdTenLoai', $vtdloaisanpham->vtdTenLoai) }}" >
                                @error('vtdTenLoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Trạng Thái -->
                            <div class="mb-3">
                                <label for="vtdTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="vtdTrangThai1" name="vtdTrangThai" value="1" {{ old('vtdTrangThai', $vtdloaisanpham->vtdTrangThai) == 1 ? 'checked' : '' }} />
                                    <label for="vtdTrangThai1">Khóa</label>
                                    &nbsp;
                                    <input type="radio" id="vtdTrangThai0" name="vtdTrangThai" value="0" {{ old('vtdTrangThai', $vtdloaisanpham->vtdTrangThai) == 0 ? 'checked' : '' }} />
                                    <label for="vtdTrangThai0">Hiển Thị</label>
                                </div>
                                @error('vtdTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <!-- Change button label to "Cập nhật" (Update) -->
                            <button class="btn btn-success" type="submit">Cập nhật</button>
                            <a href="{{ route('vtdadmins.vtdloaisanpham') }}" class="btn btn-primary">Trở lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection