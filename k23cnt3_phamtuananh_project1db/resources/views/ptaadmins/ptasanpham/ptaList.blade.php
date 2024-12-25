@extends('layouts.admins.master')
@section('title', 'Danh Sách Sản Phẩm')

@section('content-body')
    <div class="container border mt-4">
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>Danh Sách Sản Phẩm</h1>
                <!-- Nút Thêm Mới -->
                <a href="{{ route('ptaadmins.ptasanpham.ptaCreate') }}" class="btn btn-success btn-lg">
                    <i class="fa-solid fa-plus-circle"></i> Thêm Mới
                </a>
            </div>
        </div>
        <div class="row">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình Ảnh</th>
                        <th>Số Lượng</th>
                        <th>Đơn Giá</th>
                        <th>Mã Loại</th>
                        <th>Trạng Thái</th>
                        <th>Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $stt = 0;
                    @endphp
                    @forelse ($ptasanphams as $item)
                        @php
                            $stt++;
                        @endphp
                        <tr>
                            <td>{{ $stt }}</td>
                            <td>{{ $item->ptaMaSanPham }}</td>
                            <td>{{ $item->ptaTenSanPham }}</td>
                            <td style="display: flex; justify-content: center; align-items: center; height: 100px;">
                                <img src="{{ asset('storage/' . $item->ptaHinhAnh) }}" alt="Sản phẩm {{ $item->ptaMaSanPham }}" width="100" height="100">
                            </td>
                            <td>{{ $item->ptaSoLuong }}</td>
                            <td>{{ number_format($item->ptaDonGia, 0, ',', '.') }} VND</td>
                            <td>{{ $item->ptaMaLoai }}</td>
                            <td>
                                @if($item->ptaTrangThai == 0)
                                    <span class="badge bg-success">Hiển Thị</span>
                                @else
                                    <span class="badge bg-danger">Khóa</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <!-- Xem chi tiết -->
                                    <a href="{{ route('ptaadmins.ptasanpham.ptaDetail', $item->id) }}" class="btn btn-success btn-sm" title="Xem">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <!-- Chỉnh sửa -->
                                    <a href="{{ route('ptaadmins.ptasanpham.ptaEdit', $item->id) }}" class="btn btn-primary btn-sm" title="Chỉnh sửa">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <!-- Xóa -->
                                    <a href="{{ route('ptaadmins.ptasanpham.ptaDelete', $item->id) }}" class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Bạn muốn xóa Mã sản phẩm này không? ID: {{ $item->id }}');" title="Xóa">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted">
                                Chưa có thông tin sản phẩm
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection