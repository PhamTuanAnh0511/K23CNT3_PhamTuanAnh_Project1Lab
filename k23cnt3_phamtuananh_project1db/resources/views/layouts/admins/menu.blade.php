<ul class="list-group">
    <!-- Hiển thị tên tài khoản nếu đã đăng nhập -->
    <li class="list-group-item active" style="background-color: #343a40; color: white;">
        @if(Session::has('username'))
            <span class="fw-bold">Hello, {{ Session::get('username') }}</span>
        @else
            <a href="/pta-admins/admins/pta-login" class="text-decoration-none text-light">Đăng nhập</a>
        @endif
    </li>

    <!-- Tiêu đề Quản Trị Nội Dung -->
    <li class="list-group-item active" aria-current="true" style="background-color: #007bff; color: white;">
        <strong>Quản Trị Nội Dung</strong>
    </li>

    <!-- Các mục trong Sidebar -->
    <li class="list-group-item">
        <a href="/pta-admins/ptadanhsachquantri/ptadanhmuc" class="text-decoration-none text-dark">
            Danh Sách Quản Trị
        </a>
    </li>

    <li class="list-group-item">
        <a href="/pta-admins/pta-quan-tri" class="text-decoration-none text-dark">
            Quản trị Viên
        </a>
    </li>

    <li class="list-group-item">
        <a href="/pta-admins/pta-loai-san-pham" class="text-decoration-none text-dark">
            Loại Sản Phẩm
        </a>
    </li>

    <li class="list-group-item">
        <a href="/pta-admins/pta-san-pham" class="text-decoration-none text-dark">
            Sản Phẩm
        </a>
    </li>

    <li class="list-group-item">
        <a href="/pta-admins/pta-khach-hang" class="text-decoration-none text-dark">
            Khách Hàng
        </a>
    </li>

    <li class="list-group-item">
        <a href="/pta-admins/pta-hoa-don" class="text-decoration-none text-dark">
            Hóa Đơn
        </a>
    </li>

    <li class="list-group-item">
        <a href="/pta-admins/pta-ct-hoa-don" class="text-decoration-none text-dark">
            Chi Tiết Hóa Đơn
        </a>
    </li>

    <li class="list-group-item">
        <a href="/pta-admins/pta-tin-tuc" class="text-decoration-none text-dark">
            Tin Tức
        </a>
    </li>
</ul>
