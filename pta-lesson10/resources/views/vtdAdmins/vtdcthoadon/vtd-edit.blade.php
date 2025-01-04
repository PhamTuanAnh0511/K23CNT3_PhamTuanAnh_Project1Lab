@extends('_layouts.admins._master')
@section('title','Chỉnh Sửa Chi Tiết Hóa Đơn')

@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{ route('vtdadmin.vtdcthoadon.vtdEditSubmit', $vtdcthoadon->id) }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card">
                        <div class="card-header">
                            <h1>Chỉnh Sửa Chi Tiết Hóa Đơn</h1>
                        </div>

                        <div class="mb-3">
                            <label for="vtdHoaDonID" class="form-label">Mã Hóa Đơn</label>
                            <select name="vtdHoaDonID" id="vtdHoaDonID" class="form-control">
                                @foreach ($vtdhoadon as $item)
                                    <option value="{{ $item->id }}" {{ $vtdcthoadon->vtdHoaDonID == $item->id ? 'selected' : '' }}>{{ $item->vtdMaHoaDon }}</option>
                                @endforeach
                            </select>
                            @error('vtdHoaDonID')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="vtdSanPhamID" class="form-label">Mã Sản Phẩm</label>
                            <select name="vtdSanPhamID" id="vtdSanPhamID" class="form-control">
                                @foreach ($vtdsanpham as $item)
                                    <option value="{{ $item->id }}" {{ $vtdcthoadon->vtdSanPhamID == $item->id ? 'selected' : '' }}>{{ $item->vtdMaSanPham }}</option>
                                @endforeach
                            </select>
                            @error('vtdSanPhamID')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="vtdSoLuongMua" class="form-label">Số Lượng Mua</label>
                            <input type="number" class="form-control" id="vtdSoLuongMua" name="vtdSoLuongMua" value="{{ old('vtdSoLuongMua', $vtdcthoadon->vtdSoLuongMua) }}" min="1" oninput="calculateThanhTien()">
                            @error('vtdSoLuongMua')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="vtdDonGiaMua" class="form-label">Đơn Giá Mua</label>
                            <input type="number" class="form-control" id="vtdDonGiaMua" name="vtdDonGiaMua" value="{{ old('vtdDonGiaMua', $vtdcthoadon->vtdDonGiaMua) }}" oninput="calculateThanhTien()">
                            @error('vtdDonGiaMua')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="vtdThanhTien" class="form-label">Thành Tiền</label>
                            <input type="number" class="form-control" id="vtdThanhTien" name="vtdThanhTien" value="{{ old('vtdThanhTien', $vtdcthoadon->vtdThanhTien) }}" readonly>
                            @error('vtdThanhTien')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="vtdTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="vtdTrangThai0" name="vtdTrangThai" value="0" {{ $vtdcthoadon->vtdTrangThai == 0 ? 'checked' : '' }} />
                                <label for="vtdTrangThai0">Hoàn Thành</label>
                                &nbsp;
                                <input type="radio" id="vtdTrangThai1" name="vtdTrangThai" value="1" {{ $vtdcthoadon->vtdTrangThai == 1 ? 'checked' : '' }} />
                                <label for="vtdTrangThai1">Trả Lại</label>
                                &nbsp;
                                <input type="radio" id="vtdTrangThai2" name="vtdTrangThai" value="2" {{ $vtdcthoadon->vtdTrangThai == 2 ? 'checked' : '' }} />
                                <label for="vtdTrangThai2">Xóa</label>
                            </div>
                            @error('vtdTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success">Cập Nhật</button>
                            <a href="{{ route('vtdadmins.vtdcthoadon') }}" class="btn btn-primary">Quay lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Hàm tính Thành Tiền
        function calculateThanhTien() {
            var quantity = parseFloat(document.getElementById('vtdSoLuongMua').value);
            var unitPrice = parseFloat(document.getElementById('vtdDonGiaMua').value);
            var thanhTien = quantity * unitPrice;
            document.getElementById('vtdThanhTien').value = thanhTien.toFixed(2);  // Làm tròn đến 2 chữ số thập phân
        }
    </script>
@endsection