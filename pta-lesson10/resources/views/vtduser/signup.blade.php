<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Đăng Ký</title>
    <style>
        body {
            background-color: #f8f9fa; /* Light background for the entire page */
        }
        .form-container {
            background-color: #ffffff; /* White background for the form */
            border-radius: 8px; /* Rounded corners for the form */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for the form */
            padding: 30px; /* Padding inside the form */
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group .is-invalid {
            border-color: #e74a3b;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="form-container">
        <h2 class="text-center mb-4">Đăng Ký</h2>

        <!-- Display errors from backend if validation fails -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('vtduser.vtdsignupSubmit') }}">
            @csrf

            <div class="form-group mb-3">
                <label for="vtdHoTenKhachHang">Họ và Tên</label>
                <input type="text" class="form-control @error('vtdHoTenKhachHang') is-invalid @enderror" 
                       id="vtdHoTenKhachHang" name="vtdHoTenKhachHang" value="{{ old('vtdHoTenKhachHang') }}" required>
                @error('vtdHoTenKhachHang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="vtdEmail">Email</label>
                <input type="email" class="form-control @error('vtdEmail') is-invalid @enderror" 
                       id="vtdEmail" name="vtdEmail" value="{{ old('vtdEmail') }}" required>
                @error('vtdEmail')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="vtdMatKhau">Mật Khẩu</label>
                <input type="password" class="form-control @error('vtdMatKhau') is-invalid @enderror" 
                       id="vtdMatKhau" name="vtdMatKhau" required>
                @error('vtdMatKhau')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="vtdDienThoai">Số Điện Thoại</label>
                <input type="text" class="form-control @error('vtdDienThoai') is-invalid @enderror" 
                       id="vtdDienThoai" name="vtdDienThoai" value="{{ old('vtdDienThoai') }}" required>
                @error('vtdDienThoai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="vtdDiaChi">Địa Chỉ</label>
                <input type="text" class="form-control @error('vtdDiaChi') is-invalid @enderror" 
                       id="vtdDiaChi" name="vtdDiaChi" value="{{ old('vtdDiaChi') }}" required>
                @error('vtdDiaChi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-lg w-100">Đăng Ký</button>
        </form>

        <div class="mt-3 text-center">
            <p>Đã có tài khoản? <a href="{{ route('vtduser.login') }}">Đăng nhập</a></p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>