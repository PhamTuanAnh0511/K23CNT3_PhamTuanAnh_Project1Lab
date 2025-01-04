@extends('_layouts.admins._master')
@section('title','Create  Sản Phẩm')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{route('vtdadmin.vtdsanpham.vtdCreateSubmit')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới sản phẩm</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="vtdMaSanPham" class="form-label">Mã sản phẩm</label>
                                <input type="text" class="form-control" id="vtdMaSanPham" name="vtdMaSanPham" value="{{ old('vtdMaSanPham') }}" >
                                @error('vtdMaSanPham')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vtdTenSanPham" class="form-label">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="vtdTenSanPham" name="vtdTenSanPham" value="{{ old('vtdTenSanPham') }}" >
                                @error('vtdTenSanPham')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="vtdHinhAnh" class="form-label">Hình Ảnh</label>
                                <input type="file" class="form-control" id="vtdHinhAnh" name="vtdHinhAnh" accept="image/*">
                                @error('vtdHinhAnh')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            

                            <div class="mb-3">
                                <label for="vtdSoLuong" class="form-label">Số Lượng</label>
                                <input type="number" class="form-control" id="vtdSoLuong" name="vtdSoLuong" value="{{ old('vtdSoLuong') }}" >
                                @error('vtdSoLuong')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vtdDonGia" class="form-label">Đơn Giá</label>
                                <input type="number" class="form-control" id="vtdDonGia" name="vtdDonGia" value="{{ old('vtdDonGia') }}" >
                                @error('vtdDonGia')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="vtdMaLoai" class="form-label">Loại Danh Muc</label>
                                <select name="vtdMaLoai" id="vtdMaLoai" class="form-control">
                                    @foreach ($vtdloaisanpham as $item)
                                        <option value="{{ $item->id }}">{{ $item->vtdTenLoai }}</option>
                                    @endforeach
                                </select>
                                @error('vtdMaLoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            

                            <div class="mb-3">
                                <label for="vtdTrangThai" class="form-label">Trạng Thái</label>
                                <div class="col-sm-10">
                                    <input type="radio" id="vtdTrangThai1" name="vtdTrangThai" value="0" checked/>
                                    <label for="vtdTrangThai1"> Hiển Thị</label>
                                    &nbsp;
                                    <input type="radio" id="vtdTrangThai0" name="vtdTrangThai" value="1"/>
                                    <label for="vtdTrangThai0">Khóa</label>
                                </div>
                                @error('vtdTrangThai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-success">Create</button>
                            <a href="{{route('vtdadims.vtdsanpham')}}" class="btn btn-primary"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection