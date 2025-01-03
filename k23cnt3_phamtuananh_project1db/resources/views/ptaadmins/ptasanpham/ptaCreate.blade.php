@extends('layouts.admins.master')
@section('title','Create  Sản Phẩm')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{route('ptaadmins.ptasanpham.ptaCreatesubmit')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới sản phẩm</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="ptaMaSanPham" class="form-label">Mã sản phẩm</label>
                                <input type="text" class="form-control" id="ptaMaSanPham" name="ptaMaSanPham" value="{{ old('ptaMaSanPham') }}" >
                                @error('ptaMaSanPham')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ptaTenSanPham" class="form-label">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="ptaTenSanPham" name="ptaTenSanPham" value="{{ old('ptaTenSanPham') }}" >
                                @error('ptaTenSanPham')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="ptaHinhAnh" class="form-label">Hình Ảnh</label>
                                <input type="file" class="form-control" id="ptaHinhAnh" name="ptaHinhAnh" accept="image/*">
                                @error('ptaHinhAnh')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            

                            <div class="mb-3">
                                <label for="ptaSoLuong" class="form-label">Số Lượng</label>
                                <input type="number" class="form-control" id="ptaSoLuong" name="ptaSoLuong" value="{{ old('ptaSoLuong') }}" >
                                @error('ptaSoLuong')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ptaDonGia" class="form-label">Đơn Giá</label>
                                <input type="text" class="form-control" id="ptaDonGia" name="ptaDonGia" value="{{ old('ptaDonGia') }}" >
                                @error('ptaDonGia')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ptaMaLoai" class="form-label">Loại Danh Muc</label>
                                <select name="ptaMaLoai" id="ptaMaLoai" class="form-control">
                                    @foreach ($ptaloaisanpham as $item)
                                        <option value="{{ $item->id }}">{{ $item->ptaTenLoai }}</option>
                                    @endforeach
                                </select>
                                @error('ptaMaLoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            

                            <div class="mb-3">
                                <label for="ptaTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="ptaTrangThai1" name="ptaTrangThai" value="0" checked/>
                                    <label for="ptaTrangThai1"> Hiển Thị</label>
                                    &nbsp;
                                    <input type="radio" id="ptaTrangThai0" name="ptaTrangThai" value="1"/>
                                    <label for="ptaTrangThai0">Khóa</label>
                                </div>
                                @error('ptaTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Create</button>
                            <a href="{{route('ptaadmins.ptasanpham')}}" class="btn btn-primary"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection