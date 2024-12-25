@extends('layouts.admins.master')
@section('title','Danh Sách Loại Sản Phẩm')

@section('content-body')
    <div class="container border mt-4">
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>Danh Sách Loại Sản Phẩm</h1>
                <!-- Nút Thêm Mới -->
                <a href="{{route('pta_Admins.ptaloaisanpham.pta_createsubmit')}}" class="btn btn-success btn-lg">
                    <i class="fa-solid fa-plus-circle"></i> Thêm Mới
                </a>
            </div>
        </div>
        <div class="row">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã Loại</th>
                        <th>Tên Loại</th>
                        <th>Trạng Thái</th>
                        <th>Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $stt = 0;
                    @endphp
                    @forelse ($ptaloaisanpham as $item)
                        @php
                            $stt++;
                        @endphp
                        <tr>
                            <td>{{ $stt }}</td>
                            <td>{{ $item->ptaMaLoai }}</td>
                            <td>{{ $item->ptaTenLoai }}</td>
                            <td>
                                @if($item->ptaTrangThai == 0)
                                    <span class="badge bg-success">Hiển Thị</span>
                                @else
                                    <span class="badge bg-danger">Khóa</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <!-- Các nút chức năng với icon -->
                                <div class="btn-group" role="group">
                                    <!-- Xem chi tiết -->
                                    <a href="/pta-admins/pta-loai-san-pham/pta-detail/{{ $item->id }}" class="btn btn-success btn-sm" title="Xem"> Xem
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <!-- Chỉnh sửa -->
                                    <a href="/pta-admins/pta-loai-san-pham/pta-edit/{{ $item->id }}" class="btn btn-primary btn-sm" title="Chỉnh sửa"> Sửa
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <!-- Xóa -->
                                    <a href="/pta-admins/pta-loai-san-pham/pta-delete/{{ $item->id }}" class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Bạn muốn xóa Mã Loại này không? ID: {{ $item->id }}');" title="Xóa"> Xóa
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>  
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                Chưa có thông tin loại sản phẩm
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection