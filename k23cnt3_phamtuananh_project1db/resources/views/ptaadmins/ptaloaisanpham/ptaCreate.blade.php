@extends('layouts.admins.master')
@section('title','Create Loại Sản Phẩm')
    
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{route('pta_Admins.ptaloaisanpham.pta_createsubmit')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới loại sản phẩm</h1>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="ptaMaLoai" class="form-label">Mã Loại</label>
                                <input type="text" class="form-control" id="ptaMaLoai" name="ptaMaLoai" value="{{ old('ptaMaLoai') }}" >
                                @error('ptaMaLoai')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ptaTenLoai" class="form-label">Tên Loại</label>
                                <input type="text" class="form-control" id="ptaTenLoai" name="ptaTenLoai" value="{{ old('ptaTenLoai') }}" >
                                @error('ptaTenLoai')
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
                            <a href="{{route('ptaadmins.ptaloaisanpham')}}" class="btn btn-primary"> Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection