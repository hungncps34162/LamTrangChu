<?php
    // Gửi nhận dữ liệu thông qua model
    // Gửi nhận dữ liệu thông qua view
    if(isset($_GET['act'])){
        switch ($_GET['act']) {
            case 'login':
                // lấy dữ liệu
                include_once 'model/m_user.php';
                //if isset
                if(isset($_POST['SoDienThoai']) && isset($_POST['MatKhau'])){
                    // lấy dữ liệu
                    $kq = user_login($_POST['SoDienThoai'], $_POST['MatKhau']);
                    if($kq){
                        // Đúng, đăng nhập thành công
                        // lưu thông tin vào session
                        $_SESSION['user'] = $kq;
                        // chuyển hướng
                        header('location: '.$base_url.'page/home');
                        }
                        else{
                        // đăng nhập thất bại
                        $_SESSION['loi'] = 'Số điện thoại hoặc mật khẩu không đúng';
                    }
                    }
                    
                
                // hiển thị dữ liệu
                $view_name = 'user_login';
                break;
            case 'logout':
                // xóa session
                unset($_SESSION['user']);
                // chuyển hướng
                header('location: '.$base_url.'page/home');
                break; 
            default:
                # code...
                break;
            }
        }
        include_once 'view/v_user_layout.php';
    
?>