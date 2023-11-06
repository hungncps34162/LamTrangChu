<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thư Viện HCMC</title>
    <link rel="stylesheet" href="<?=$base_url?>template/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?=$base_url?>page/home">HCMCLib</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- menu-1 -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?=$base_url?>page/home">Trang Chủ</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Chủ Đề
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach ($dsChuDe as $chude) : ?>
                            <li><a class="dropdown-item" href="<?=$base_url?>category/detail/<?=$chude['MaCD']?>"><?=$chude['TenChuDe']?></a></li>
                            
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <!-- menu-2 -->
                <ul class="navbar-nav mb-2 mb-lg-0" >
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?=$base_url?>page/cart">Giỏ Sách</a>
                    </li>
                    <?php if ( !isset($_SESSION['user'])): ?>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?=$base_url?>user/login">Đăng Nhập</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Xin Chào, <?=$_SESSION['user']['HoTen']?>
                        </a>
                        <ul class="dropdown-menu end-0" style="left: auto;">
                            <li><a class="dropdown-item" href="#">Thông Tin Tài Khoản</a></li>
                            <li><a class="dropdown-item" href="<?=$base_url?>page/history">Lịch Sử Mượn Sách</a></li>
                            <li><a class="dropdown-item" href="#">Nạp</a></li>
                            <?php if($_SESSION['user']['Quyen']>=1): ?>
                            <li><hr class="dropdown-divider text-warning"></li>
                            <li><a class="dropdown-item" href="<?=$base_url?>admin/dashboard">Trang quản lý</a></li>
                            <?php endif; ?>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?=$base_url?>user/logout">Đăng Xuất</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- div contaitner -->
    <div class="container">
        <!-- carosel -->
         <?php if($view_name=='page_home' || $view_name=='user_login'): ?>
        <div id="carouselExample" class="carousel slide my-3 w-100 mx-auto">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://res.cloudinary.com/dujxbtilq/image/upload/f_auto,q_auto/v1/banner/vrlbhx2jh8uy1rwgaay5" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://res.cloudinary.com/dujxbtilq/image/upload/f_auto,q_auto/v1/banner/k6x1swrjbpxkfjj7vyto" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://res.cloudinary.com/dujxbtilq/image/upload/f_auto,q_auto/v1/banner/cs47cpdkzsco8auehef8" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
                <button class="carousel-control-next" type="button"                             data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
        </div>
        <?php endif; ?>
        <!-- chia cột -->
        <div class="row">
            <div class="col-md-3">
                <form action="<?=$base_url?>book/search" method="POST" class="mb-3">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="keyword" placeholder="Nhập tựa sách">
                        <button class="btn btn-primary" type="submit" id="search">Tìm Kiếm</button>
                    </div>
                </form>
    <ul class="list-group mb-3">
        <li class="list-group-item active" aria-current="true">Sách đọc nhiều <i class="fa-solid fa-fire"></i></li>
        <?php foreach ($dsDocNhieu as $sach): ?>
        
        <li class="list-group-item"><?=$sach['LuotDoc']?><i class="fa-solid fa-eye"></i>
        <br/>
        <?=$sach['TuaSach']?></li>
        <?php endforeach; ?>
    </ul>
            </div>
            <div class="col-md-9">
                <!-- ruột của web -->
                <?php
                 include_once 'view/v_'.$view_name.'.php';
                ?>
            </div>
        </div>
    </div>  
    <!-- footer -->
        <footer class="text-center text-bg-primary p-3 rounded-3">
            Bản quyền &copy; 2023, thuộc về thư viện HCMC LIB
        </footer> 
    <script src="<?=$base_url?>template/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/27b9d8f5b1.js" crossorigin="anonymous"></script> 
</body>

</html>