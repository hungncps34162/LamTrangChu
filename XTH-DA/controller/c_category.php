<?php
    // Gửi nhận dữ liệu thông qua model
    // Gửi nhận dữ liệu thông qua view
    if(isset($_GET['act'])){
        switch ($_GET['act']) {
            case 'detail':
                // lấy dữ liệu
                include_once 'model/m_book.php';
                include_once 'model/m_category.php';
                $ctChuDe= category_getById($_GET['id']);
                $dsSach = book_getCategory($_GET['id']);
                // hiển thị dữ liệu
                $view_name = 'category_detail';
                break;
            case 'addToCart':
                // kiểm tra có giỏ hàng hay chưa
                include_once 'model/m_history.php';
                //maTK
                $MaTk = $_SESSION['user']['MaTk'];
                //masach
                $MaSach = $_GET['id'];
                //kq
                $kq = history_hasCart($MaTk);
                //if
                if($kq){
                    // đã có giỏ hàng
                    // lấy mã lịch sử
                    $MaLS = $kq['MaLS'];
                    // thêm vào chi tiết lịch sử
                    history_addToCart($kq['MaLS'], $MaSach);
                    // kiểm tra kết quả
                    

                }
                else{
                    // chưa có giỏ hàng
                    // thêm vào lịch sử
                    history_add($MaTk);
                    // lấy mã lịch sử
                    $kq = history_hasCart($MaTk);
                    $MaLS = $kq['MaLS'];
                    // thêm vào chi tiết lịch sử
                    history_addToCart($kq['MaLS'], $MaSach);
                    
                }
                if($kq){
                        // thành công
                        $_SESSION['thongbao'] = 'Thêm vào giỏ hàng thành công';
                    }
                    else{
                        // thất bại
                        $_SESSION['thongbao'] = 'Thêm vào giỏ hàng thất bại';
                    }
                header("Location: $base_url?mod=book&act=detail&id=$MaSach");
            default:
                # code...
                break;
        }
        include_once 'view/v_user_layout.php';
    }  
 ?>