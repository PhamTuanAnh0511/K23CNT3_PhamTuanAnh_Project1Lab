@extends('_layouts.admins._master')
@section('title','Danh Sách Khách Hàng')

@section('content-body')
    <div class="container border mt-4">
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>Danh Sách Khách Hàng</h1>
                <!-- Nút Thêm Mới -->
                <a href="/vtd-admins/vtd-hoa-don/vtd-create" class="btn btn-success btn-lg">
                    <i class="fa-solid fa-plus-circle"></i> Thêm Mới
                </a>
            </div>
        </div>
        <div class="row">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã Hóa Đơn</th>
                        <th>Mã Khách hàng</th>
                        <th>Ngày Hóa Đơn</th>
                        <th>Ngày Nhận</th>
                        <th>Họ Tên Khách Hàng</th>
                        <th>Email</th>
                        <th>Điện Thoại</th>
                        <th>Địa Chỉ</th>
                        <th>Tổng Giá Trị</th>
                        <th>Trạng Thái</th>
                        <th>Chức Năng</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $stt = 0;
                    @endphp
                    @forelse ($vtdhoadons as $item)
                        @php
                            $stt++;
                        @endphp
                        <tr>
                            <td>{{ $stt }}</td>
                            <td>{{ $item->vtdMaHoaDon }}</td>
                            <td>{{ $item->vtdMaKhachHang }}</td>
                            <td>{{ $item->vtdNgayHoaDon }}</td>
                            <td>{{ $item->vtdNgayNhan }}</td>
                            <td>{{ $item->vtdHoTenKhachHang }}</td>
                            <td>{{ $item->vtdEmail }}</td>
                            <td>{{ $item->vtdDienThoai }}</td>
                            <td>{{ $item->vtdDiaChi }}</td>
                            <td>{{ number_format($item->vtdTongGiaTri, 0, ',', '.') }} VND</td>
                            
                            <td>
                                @if($item->vtdTrangThai == 0)
                                    <span class="badge bg-primary">Chờ Sử Lý</span>
                                @elseif($item->vtdTrangThai == 1)
                                    <span class="badge bg-warning">Đang Sử Lý</span>
                                @else
                                    <span class="badge bg-success">Đã Hoàn Thành</span>
                                @endif
                            </td>
                            <td class="text-center">    
                                <!-- Các nút chức năng với icon -->
                                <div class="btn-group" role="group">
                                    <!-- Xem chi tiết -->
                                    <a href="/vtd-admins/vtd-hoa-don/vtd-detail/{{ $item->id }}" class="btn btn-success btn-sm" title="Xem">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <!-- Chỉnh sửa -->
                                    <a href="/vtd-admins/vtd-hoa-don/vtd-edit/{{ $item->id }}" class="btn btn-primary btn-sm" title="Chỉnh sửa">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <!-- Xóa -->
                                    <a href="/vtd-admins/vtd-hoa-don/vtd-delete/{{ $item->id }}" class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Bạn muốn xóa Mã Khách Hàng này không? ID: {{ $item->id }}');" title="Xóa">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>
                                </div>
                            </td>
                            
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                Chưa có thông tin Khách Hàng 
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection