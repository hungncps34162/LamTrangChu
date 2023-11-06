<?php
    // Gửi nhận dữ liệu thông qua model
    // Gửi nhận dữ liệu thông qua view
    if(isset($_GET['act'])){
        switch ($_GET['act']) {
            case 'dashboard':
                // lấy dữ liệu
                include_once 'model/m_book.php';
                include_once 'model/m_user.php';
                include_once 'model/m_category.php';
                include_once 'model/m_history.php';
                $tkCD = category_count();
                $tkSach = book_count();
                $tkBanDoc = user_count();
                $tkLS = history_count();
                $tkDoanhThu = history_stat();
                $tkSachTheoChuDe = category_statByBook();
                // hiển thị dữ liệu
                $view_name = 'admin_dashboard';
                break;
            case 'user':
                // lấy dữ liệu
                include_once 'model/m_user.php';
            
                $dsTK = user_getAll();
                // hiển thị dữ liệu
                $view_name = 'admin_user';
                break;
            case 'user-add':
                // lấy dữ liệu
                include_once 'model/m_user.php';
                
                if(isset($_POST['submit'])){
                    $SoDienThoai=$_POST['SoDienThoai'];
                    $HoTen=$_POST['HoTen'];
                    $ViTien=$_POST['ViTien'];
                    $Quyen=$_POST['Quyen'];
                    $kq = user_checkPhone($SoDienThoai);
                    if ($kq) {
                        // đúng, bị trùng, không thêm
                        $_SESSION['loi'] = 'Số điện thoại đã tồn tại <strong>'.$SoDienThoai.'</strong>.';
                    }
                    else{
                        //Sai , không trùng , thêm tài khoản
                        $MatKhau = 12345;
                        $HinhAnh = 'default.png';
                        user_add($SoDienThoai, $HoTen, $MatKhau, $ViTien, $Quyen, $HinhAnh);
                        $_SESSION['thongbao'] = 'Thêm tài khoản thành công. với số điện thoại <strong>'.$SoDienThoai.'</strong> và mật khẩu <strong>'.$MatKhau.'</strong>';
                    }
                }

                // hiển thị dữ liệu
                $view_name = 'admin_user_add';
                break;
            case 'user-edit':
                // lấy dữ liệu
                include_once 'model/m_user.php';
                $MaTK = $_GET['id'];
                if(isset($_POST['submit'])){
                    $SoDienThoai=$_POST['SoDienThoai'];
                    $HoTen=$_POST['HoTen'];
                    $ViTien=$_POST['ViTien'];
                    $Quyen=$_POST['Quyen'];
                    $kq = user_checkPhone($SoDienThoai);
                    if ($kq && $kq['MaTK'] != $MaTK) {
                        // đúng, bị trùng, không thêm
                        $_SESSION['loi'] = 'Số điện thoại đã tồn tại <strong>'.$SoDienThoai.'</strong>.';
                    }
                    else{
                        //Sai , không trùng , thêm tài khoản
                        $MatKhau = 12345;
                        $HinhAnh = 'default.png';
                        user_edit($MaTK, $SoDienThoai, $HoTen, $ViTien, $Quyen);
                        $_SESSION['thongbao'] = 'Thêm tài khoản thành công. với số điện thoại <strong>'.$SoDienThoai.'</strong> và mật khẩu <strong>'.$MatKhau.'</strong>';
                    }
                }
                $tk = user_getById($MaTK);
                // hiển thị dữ liệu
                $view_name = 'admin_user_edit';
                break;
            case 'user-delete':
                // lấy dữ liệu
                include_once 'model/m_user.php';
                user_delete($_GET['id']);
                header('location: '.$base_url.'admin/user');
                
                // hiển thị dữ liệu
                

                break;
            case 'category':
                // lấy dữ liệu
                include_once 'model/m_category.php';
                $dsCD = category_getAll();
                // hiển thị dữ liệu
                $view_name = 'admin_category';
                break;
            case 'category-add':
                // lấy dữ liệu
                include_once 'model/m_category.php';
                
                if(isset($_POST['submit'])){
                    $TenChuDe=$_POST['TenChuDe'];
                    $kq = category_checkChuDe($TenChuDe);
                    if ($kq && $kq['MaCD'] != $MaCD) {
                        // đúng, bị trùng, không thêm
                        $_SESSION['loi'] = 'chủ đề <strong>'.$TenChuDe.'</strong>.đã tồn tại ';
                    }
                    else{
                        //Sai , không trùng , thêm tài khoản
                        category_add($TenChuDe);
                        $_SESSION['thongbao'] = 'Thêm chủ đề  <strong>'.$TenChuDe.'</strong>. thành công';
                    }
                }
                
                // hiển thị dữ liệu
                $view_name = 'admin_category_add';
                break;
            case 'category-edit':
                // lấy dữ liệu
                include_once 'model/m_category.php';
                $MaCD = $_GET['id'];
                if(isset($_POST['submit'])){
                    $TenChuDe=$_POST['TenChuDe'];
                    $kq = user_checkPhone($SoDienThoai);
                    if ($kq && $kq['MaCD'] != $MaCD) {
                        // đúng, bị trùng, không thêm
                        $_SESSION['loi'] = 'chủ đề <strong>'.$TenChuDe.'</strong>.đã tồn tại ';
                    }
                    else{
                        //Sai , không trùng , thêm tài khoản
                        category_edit($MaCD,$TenChuDe);
                        $_SESSION['thongbao'] = 'Thêm chủ đề  <strong>'.$TenChuDe.'</strong>. thành công';
                    }
                }
                $cd = category_getById($MaCD);
                // hiển thị dữ liệu
                $view_name = 'admin_category_edit';
                break;
            case 'category-delete':
                // lấy dữ liệu
                include_once 'model/m_category.php';
                category_delete($_GET['id']);
                header('location: '.$base_url.'admin/category');
                // hiển thị dữ liệu
                

                break;
            case 'book':
                // lấy dữ liệu
                include_once 'model/m_book.php';
                $QuanLySach = book_getAll();
                // hiển thị dữ liệu
                $view_name = 'admin_book';
                break;
            case 'category-add':
                // lấy dữ liệu
                include_once 'model/m_category.php';
                
                if(isset($_POST['submit'])){
                    $TenChuDe=$_POST['TenChuDe'];
                    $kq = category_checkChuDe($TenChuDe);
                    if ($kq && $kq['MaCD'] != $MaCD) {
                        // đúng, bị trùng, không thêm
                        $_SESSION['loi'] = 'chủ đề <strong>'.$TenChuDe.'</strong>.đã tồn tại ';
                    }
                    else{
                        //Sai , không trùng , thêm tài khoản
                        category_add($TenChuDe);
                        $_SESSION['thongbao'] = 'Thêm chủ đề  <strong>'.$TenChuDe.'</strong>. thành công';
                    }
                }
                
                // hiển thị dữ liệu
                $view_name = 'admin_book_add';
                break;
            case 'history':
                // lấy dữ liệu
                include_once 'model/m_history.php';
                $dsLS = history_getAll();
                // hiển thị dữ liệu
                $view_name = 'admin_history';
                break;
            default:
                # code...
                break;
        }
        include_once 'view/v_admin_layout.php';
    }  
 ?>