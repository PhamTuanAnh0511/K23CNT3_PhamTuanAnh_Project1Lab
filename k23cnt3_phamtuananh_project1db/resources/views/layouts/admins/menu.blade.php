x<ul class="list-group">
  <li class="list-group-item active" aria-current="true">
      <strong>Quản Trị Nội Dung</strong>
  </li>
  <li class="list-group-item">
      <a href="/pta-admins/ptadanhmuc" class="text-decoration-none text-dark">Danh Sách Quản Trị</a>
  </li>
  <li class="list-group-item">
      <a href="/pta-admins/pta-loai-san-pham" class="text-decoration-none text-dark">Loại Sản Phẩm</a>
  </li>
  <li class="list-group-item">
      <a href="/pta-admins/pta-san-pham" class="text-decoration-none text-dark">Sản Phẩm</a>
  </li>
</ul>

<style>
  /* Tăng cường hiệu ứng hover và thay đổi màu sắc của liên kết */
  .list-group-item a {
      color: #333;
      transition: all 0.3s ease;
  }

  .list-group-item a:hover {
      color: #007bff;
      text-decoration: underline;
  }

  /* Thêm màu sắc cho từng item khi hover */
  .list-group-item:hover {
      background-color: #f8f9fa;
  }

  /* Tùy chỉnh phần tử active */
  .list-group-item.active {
      background-color: #007bff;
      border-color: #007bff;
  }

  /* Đảm bảo khoảng cách giữa các mục trong danh sách */
  .list-group-item {
      padding: 15px 20px;
      margin-bottom: 5px;
  }
</style>