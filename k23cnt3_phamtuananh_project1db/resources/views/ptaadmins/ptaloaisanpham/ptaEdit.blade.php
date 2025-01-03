@extends('layouts.admins.master')
@section('title','Sửa Loại Sản Phẩm')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <!-- Update the form action route to pass the ptaMaLoai as a parameter -->
                <form action="{{ route('ptaadmins.ptaloaisanpham.ptaEditsubmit') }}" method="POST">
                    @csrf
                    <!-- Hidden input for the ID -->
                    <input type="hidden" name="id" value="{{ $ptaloaisanpham->id }}">

                    <div class="card">
                        <div class="card-header">
                            <h1>Sửa loại sản phẩm</h1>
                        </div>
                        <div class="card-body">
                            <!-- Mã Loại (disabled) -->
                            <div class="mb-3">
                                <label for="ptaMaLoai" class="form-label">Mã Loại</label>
                                <input type="text" class="form-control" id="ptaMaLoai" name="ptaMaLoai" value="{{ $ptaloaisanpham->ptaMaLoai }}" >
                                @error('ptaMaLoai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                            <!-- Tên Loại -->
                            <div class="mb-3">
                                <label for="ptaTenLoai" class="form-label">Tên Loại</label>
                                <input type="text" class="form-control" id="ptaTenLoai" name="ptaTenLoai" value="{{ old('ptaTenLoai', $ptaloaisanpham->ptaTenLoai) }}" >
                                @error('ptaTenLoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Trạng Thái -->
                            <div class="mb-3">
                                <label for="ptaTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="ptaTrangThai1" name="ptaTrangThai" value="1" {{ old('ptaTrangThai', $ptaloaisanpham->ptaTrangThai) == 1 ? 'checked' : '' }} />
                                    <label for="ptaTrangThai1">Khóa</label>
                                    &nbsp;
                                    <input type="radio" id="ptaTrangThai0" name="ptaTrangThai" value="0" {{ old('ptaTrangThai', $ptaloaisanpham->ptaTrangThai) == 0 ? 'checked' : '' }} />
                                    <label for="ptaTrangThai0">Hiển Thị</label>
                                </div>
                                @error('ptaTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <!-- Change button label to "Cập nhật" (Update) -->
                            <button class="btn btn-success" type="submit">Cập nhật</button>
                            <a href="{{ route('ptaadmins.ptaloaisanpham') }}" class="btn btn-primary">Trở lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection