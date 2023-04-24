<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>

    <!-- ======= Styles ====== -->
        <!--  icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
        <!--  style -->
    <link rel="stylesheet" type="text/css" href="view/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="view/css/UI_employee/UI_employee.css">
    <!-- ======= Scripts ====== -->
    <script src="view/jquery/jquery-3.6.4.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar Start -->
        <div class="sidebar sidebarwidth" id="sidebar">
            <div class="list-gr">
                <div class="text-muted" id="navigation">Navigation</div>
                <a class="list-gr-item active" href="#" data-url="confirm_table_tab">
                    <i class="fas fa-chevron-right text-muted me-2"></i> Xác Nhận Đặt Bàn</a>
                <a class="list-gr-item" href="#" data-url="/confirm_order_tab">
                    <i class="fas fa-chevron-right text-muted me-2"></i> Xác Nhận Đơn Hàng</a>
            </div>
        </div>
        <!-- Sidebar End -->
        <div class="main">
            <!-- NavBar Start -->
            <nav class="navbar navbar-expand-md" style="background-color: white;">
                <div class="container align-items-center">
                    <button class="toggle-btn ms-4" onclick="toggleSidebar()">
                        <span class="fas fa-bars"></span>
                    </button>
            
                    <a href="#">
                        <img src="view/images/logo.jpg" style="width: 25vw; max-width: 120px;" alt="logo">
                    </a>
            
                    <button class="toggle-btn d-md-none" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="fas fa-bars"></span>
                    </button> 
            
                    <div id="collapsibleNavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="#" class="nav-link me-3">
                                    <i class="bi bi-shield-lock me-1"></i>
                                    Thay Đổi Mật Khẩu
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/logout" class="nav-link me-2">
                                    <i class="bi bi-box-arrow-right me-1"></i>
                                    Đăng xuất
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Tab Start -->
            <div id="tab-content"></div>
            <!-- Tab End -->
        <div>
    </div>
    <!-- ======= Scripts ====== -->
    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById("sidebar");
            var aElements = document.getElementsByClassName('list-gr-item'); 

            if (sidebar.classList.contains('hidden')) {
                sidebar.classList.remove('hidden');
            } else {
                sidebar.classList.add('hidden');
            } 

            for (var i = 0; i < aElements.length; i++) {
                if (aElements[i].classList.contains('hidden')) {
                    aElements[i].classList.remove('hidden');
                } else {
                    aElements[i].classList.add('hidden'); 
                }
            }
        }
    </script>
    <script>
        /* AJAX */
        $(document).ready(function() {
            $('#tab-content').load($('a.list-gr-item.active').data('url'));
            $('a.list-gr-item').click(function() {
                var url = $(this).data('url');
                var clickedTab = $(this);
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'html',
                    success: function(data) {
                        $('#tab-content').html(data);
                        $('a.list-gr-item').removeClass('active');
                        clickedTab.addClass('active');
                    }
                });
                return false;
            });
        }); 
    </script>
    <script>
        //with each id searchkey, search, and food, add table id to define each form and modal search
        //so when call function to show, hide or get search result, we need to add parameter table id
        
        function getSearchResult(id) {
            var searchPatternElement = document.getElementById('searchKey' + id.toString())
            console.log('searchKey' + id.toString())
            var link = "/search_result?pattern=" + searchPatternElement.value + "&tableId=" +id.toString()
            console.log(link)
            $.ajax({
                // The link we are accessing.
                url: link,
                    
                // The type of request.
                type: "get",
                    
                // The type of data that is getting returned.
                dataType: "html",

                success: function( strData ){
                    console.log(strData)
                    document.getElementById("search" + id.toString()).innerHTML = strData;
                    // console.log("do")

                }
            });
        }

        function getProductId(id, tableId) {
        document.getElementById('food' + tableId.toString()).value=id;
        hideSearchResult(tableId)
        }

        function showSearchResult(id) {
            var searchElement = document.getElementById('search' + id.toString())
            searchElement.className = "searchBarDisplayResult d-block"
        }

        function hideSearchResult(id){
            var searchElement = document.getElementById('search' + id.toString())
            searchElement.className = "searchBarDisplayResult d-none"
        }
    </script>
   
</body>
</html>