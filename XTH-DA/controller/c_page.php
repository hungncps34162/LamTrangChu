<?php
    // Gửi nhận dữ liệu thông qua model
    // Gửi nhận dữ liệu thông qua view
    if(isset($_GET['act'])){
        switch ($_GET['act']) {
            case 'home':
                // lấy dữ liệu
                include_once 'model/m_book.php';
                $dsMoi = book_getNew(4);
                $dsGhim = book_getPin(4);
                // hiển thị dữ liệu
                $view_name ='page_home';
                break;
            case 'cart':
                // lấy dữ liệu
                include_once 'model/m_history.php';
                $MaTK = $_SESSION['user']['MaTK'];
                $GioSach = history_hasCart($MaTK);
                if($GioSach){
                    $ctGioSach = history_getCart($MaTK);
                }
                else{
                    $ctGioSach = [];
                }
                $view_name ='page_cart';
                break;
            case 'history':
                include_once 'model/m_history.php';
                $MaTK = $_SESSION['user']['MaTK'];
                $dsLichSu=history_getAllByAccount($MaTK);
                
                $view_name ='page_history';
                break;
            default:
                # code...
                break;
        }
        include_once 'view/v_user_layout.php';
    }  
 ?>