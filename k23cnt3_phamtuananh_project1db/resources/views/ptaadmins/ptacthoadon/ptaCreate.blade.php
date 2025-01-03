@extends('layouts.admins.master')
@section('title','Create chi tiết Hóa Đơn')
@section('content-body')
    <div class="container border">
        <div class="row">
            <div class="col">
                <form action="{{ route('ptaadmins.ptacthoadon.ptaCreatesubmit') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h1>Thêm Mới chi tiết Hóa Đơn</h1>
                        </div>

                        <div class="mb-3">
                            <label for="ptaHoaDonID" class="form-label">Mã Hóa Đơn</label>
                            <select name="ptaHoaDonID" id="ptaHoaDonID" class="form-control">
                                @foreach ($ptahoadon as $item)
                                    <option value="{{ $item->id }}">{{ $item->ptaMaHoaDon }}</option>
                                @endforeach
                            </select>
                            @error('ptaHoaDonID')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ptaSanPhamID" class="form-label">Mã Sản Phẩm</label>
                            <select name="ptaSanPhamID" id="ptaSanPhamID" class="form-control">
                                @foreach ($ptasanpham as $item)
                                    <option value="{{ $item->id }}" data-price="{{ $item->ptaDonGia }}">{{ $item->ptaMaSanPham }}</option>
                                @endforeach
                            </select>
                            @error('ptaSanPhamID')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ptaSoLuongMua" class="form-label">Số Lượng Mua</label>
                            <input type="number" class="form-control" id="ptaSoLuongMua" name="ptaSoLuongMua" value="{{ old('ptaSoLuongMua') }}" min="1" oninput="calculateThanhTien()">
                            @error('ptaSoLuongMua')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ptaDonGiaMua" class="form-label">Đơn Giá Mua</label>
                            <input type="number" class="form-control" id="ptaDonGiaMua" name="ptaDonGiaMua" value="{{ old('ptaDonGiaMua') }}" oninput="calculateThanhTien()">
                            @error('ptaDonGiaMua')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ptaThanhTien" class="form-label">Thành Tiền</label>
                            <input type="number" class="form-control" id="ptaThanhTien" name="ptaThanhTien" value="{{ old('ptaThanhTien') }}" readonly>
                            @error('ptaThanhTien')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="ptaTrangThai" class="form-label">Trạng Thái</label>
                            <div class="col-sm-10">
                                <input type="radio" id="ptaTrangThai0" name="ptaTrangThai" value="0" checked />
                                <label for="ptaTrangThai0">Hoàn Thành</label>
                                &nbsp;
                                <input type="radio" id="ptaTrangThai1" name="ptaTrangThai" value="1" />
                                <label for="ptaTrangThai1">Trả Lại</label>
                                &nbsp;
                                <input type="radio" id="ptaTrangThai2" name="ptaTrangThai" value="2" />
                                <label for="ptaTrangThai2">Xóa</label>
                            </div>
                            @error('ptaTrangThai')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success">Create</button>
                            <a href="{{ route('ptaadmins.ptacthoadon') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Hàm tính Thành Tiền
        function calculateThanhTien() {
            var quantity = parseFloat(document.getElementById('ptaSoLuongMua').value);
            var unitPrice = parseFloat(document.getElementById('ptaDonGiaMua').value);
            var thanhTien = quantity * unitPrice;
            document.getElementById('ptaThanhTien').value = thanhTien.toFixed(2);  // Làm tròn đến 2 chữ số thập phân
        }

        // Sự kiện khi chọn sản phẩm, tự động cập nhật Đơn Giá Mua
        document.getElementById('ptaSanPhamID').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var price = selectedOption.getAttribute('data-price');
            document.getElementById('ptaDonGiaMua').value = price;
            calculateThanhTien();
        });
    </script>
@endsection