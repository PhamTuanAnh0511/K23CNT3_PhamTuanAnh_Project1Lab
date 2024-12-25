<header class="d-flex justify-content-between align-items-center bg-dark text-white p-3">
    <!-- Logo hoặc Tiêu đề trang -->
    <div class="d-flex align-items-center">
        <a href="/ptaadmins" class="text-white text-decoration-none">
            <h3 class="mb-0">Trang Chủ Adimns</h3> <!-- Tiêu đề trang -->
        </a>
    </div>

    <!-- Menu người dùng và các chức năng khác -->
    <div class="d-flex align-items-center">
        <!-- Menu Thông báo -->
        <button class="btn btn-link text-white me-3" aria-label="Notifications">
            <i class="fas fa-bell"></i>
        </button>

        <!-- Menu Người dùng -->
        <div class="dropdown">
            <button class="btn btn-link text-white dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-circle"></i> {{ Auth::user()->name ?? 'Guest' }}
            </button>
            <ul class="dropdown-menu" aria-labelledby="userMenu">
                <li><a class="dropdown-item" href="">Profile</a></li>
                <li><a class="dropdown-item" href="">Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/">Logout</a></li>
            </ul>
        </div>

        <!-- Menu Cài đặt -->
        <button class="btn btn-link text-white ms-3" aria-label="Settings">
            <i class="fas fa-cogs"></i>
        </button>
    </div>
</header>