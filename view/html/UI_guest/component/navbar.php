<nav class="navbar navbar-expand-lg bg-light navbar-light p-2">
    <a href="/home_page" class="d-block d-lg-none">
        <img src="view/images/logo.jpg" style="width: 100px;" alt="logo">
    </a>
    <button type="button" 
            class="navbar-toggler" 
            data-toggle="collapse" 
            data-target="#navbarCollapse"
            style="border-radius: 0;">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="/home_page" 
            class="nav-item nav-link <?php echo $page=='home_page'?'active':''; ?>">Trang Chủ</a>
            <a href="/menu" class="nav-item nav-link" >Thực Đơn</a>
            <a href="/news" class="nav-item nav-link">Tin Tức</a>
            <a href="/contact_page" class="nav-item nav-link">Liên Hệ</a>
            <a href="/login_manager" 
            class="nav-item nav-link <?php echo $page=='login_manager'?'active':''; ?>">Quản Trị Viên</a>
        </div>
        <div class="navbar-nav ml-auto nav_main">
            <div>
                <a href="/login"
                 class="nav-item nav-link <?php echo $page=='login'?'active':'' ?>">
                    <i class="bi bi-person text-dark"></i>
                    Đăng Nhập
                </a>
            </div>
            <div>
                <a href="/signup" 
                class="nav-item nav-link <?php echo $page=='signup'?'active':'' ?>">
                    <i class="bi bi-person-plus text-dark"></i>
                    Đăng Ký
                </a>
            </div>
        </div>
    </div>
</nav>