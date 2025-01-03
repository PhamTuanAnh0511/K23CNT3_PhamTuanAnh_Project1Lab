@extends('layouts.admins.master')
@section('title','Danh Sách Quản Trị Viên')
@section('content-body')
    <div class="container border mt-4">
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>Danh Sách Quản Trị Viên</h1>
                <!-- Nút Thêm Mới -->
                <a href="{{route('ptaadmins.ptaquantri.ptaCreate')}}" class="btn btn-success btn-lg">
                    <i class="fa-solid fa-plus-circle"></i> Thêm Mới
                </a>
            </div>
        </div>
        <div class="row">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tài Khoản</th>
                        <th>Mật Khẩu</th>
                        <th>Trạng Thái</th>
                        <th>Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $stt = 0;
                    @endphp
                    @forelse ($ptaquantris as $item)
                        @php
                            $stt++;
                        @endphp
                        <tr>
                            <td>{{ $stt }}</td>
                            <td>{{ $item->ptaTaiKhoan }}</td>
                            <td>{{ $item->ptaMatKhau }}</td>
                            <td>
                                @if($item->ptaTrangThai == 0)
                                    <span class="badge bg-success">Cho Phép Đăng Nhập</span>
                                @else
                                    <span class="badge bg-danger">Khóa</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <!-- Các nút chức năng với icon -->
                                <div class="btn-group" role="group">
                                    <!-- Xem chi tiết -->
                                    <a href="/pta-admins/pta-quan-tri/pta-Detail/{{ $item->id }}" class="btn btn-success btn-sm" title="Xem"> Xem
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <!-- Chỉnh sửa -->
                                    <a href="/pta-admins/pta-quan-tri/pta-Edit/{{ $item->id }}" class="btn btn-primary btn-sm" title="Chỉnh sửa"> Chỉnh Sửa
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <!-- Xóa -->
                                    <a href="/pta-admins/pta-quan-tri/pta-Delete/{{ $item->id }}" class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Bạn muốn xóa Mã Loại này không? ID: {{ $item->id }}');" title="Xóa"> Xóa
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                            
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                Chưa có thông tin Quản Trị Viên
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection