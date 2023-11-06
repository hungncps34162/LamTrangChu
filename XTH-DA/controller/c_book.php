<?php
    // Gửi nhận dữ liệu thông qua model
    // Gửi nhận dữ liệu thông qua view
    if(isset($_GET['act'])){
        switch ($_GET['act']) {
            case 'detail':
                // lấy dữ liệu
                include_once 'model/m_book.php';
                include_once 'model/m_comment.php';
                $ctSach = book_getById($_GET['id']);
                $dsNgauNhienCungChuDe =book_getRandomByCategory($ctSach['MaCD']);
                $dsCamNghi = comment_getByBook($_GET['id']);
                // hiển thị dữ liệu
                $view_name = 'book_detail';
                break;
            case 'search':
                if(isset($_POST['keyword'])){
                    //đổi post sang get
                    header("Location: $base_url?mod=book&act=search&keyword=".$_POST['keyword']);
                }
                else{
                    $_SESSION['keyword'] = '';
                }
                //lấy dữ liệu
                include_once 'model/m_book.php';
                $page = 1;
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }
                $ketqua = book_search($_SESSION['keyword'], $page, 8);
                $sotrang = ceil(book_countSearch($_GET['keyword'])/8);
                // hiển thị dữ liệu
                $view_name = 'book_search';
                break;
                // $sotrang = tong so trang chia 8
                
            case 'addToCart':
                if(!isset($_SESSION['user'])){
                    $_SESSION['loi'] = 'Bạn cần đăng nhập để thực hiện chức năng này';
                    header('Location: '.$base_url.'user/login');
                    return;
                }
                //add To Cart
                //lấy dữ liệu
                $MaSach = $_GET['id'];
                $MaTK= $_SESSION['user']['MaTK'];
                
                    try {
                        //kiểm tra có gio-hang hay chưa
                        include_once 'model/m_history.php';
                        $kq= history_hasCart($MaTK);
                        if ($kq) {
                            // Đúng , đã có gior sách , thêm sách vào
                            history_addToCart($kq['MaLS'], $MaSach);
                        }
                        else {
                            //Sai chưa có giỏ sách
                            history_add($MaTK);
                            $kq= history_hasCart($MaTK);
                            history_addToCart($kq['MaLS'], $MaSach);
                        }
                        $_SESSION['thongbao'] = 'Thêm sách thành công';
                    } catch (\Throwable $th) {
                        $_SESSION['loi'] = 'Thêm sách thất bại';
                    }
                
                header("Location: $base_url?mod=book&act=detail&id=$MaSach");
                break;
            case 'removeFromCart':
                include_once 'model/m_history.php';
                $MaTK = $_SESSION['user']['MaTK'];
                $MaSach=$_GET['id'];
                $GioSach = history_hasCart($MaTK);
                if($GioSach){
                    history_removeFromCart($GioSach['MaLS'], $MaSach);
                }
                header('Location:'.$base_url.'page/cart');
                break;
            case 'removeCart':
                include_once 'model/m_history.php';
                $MaTK = $_SESSION['user']['MaTK'];
                $GioSach = history_hasCart($MaTK);
                if($GioSach){
                    history_removeCart($GioSach['MaLS']);
                }
                header('Location: '.$base_url.'page/cart');
                break;
            case 'updateCart':
                include_once 'model/m_history.php';
                $MaTK = $_SESSION['user']['MaTK'];
                $GioSach = history_hasCart($MaTK);
                if($GioSach){
                    $NgayMuon =date_format(date_create( $_POST['NgayMuon']), "Y-m-d H:i:s");
                    $NgayTra = date_format(date_create( $_POST['NgayTra']), "Y-m-d H:i:s");
                    $SoSachMuon = $_POST['SoSachMuon'];
                    $TongTien = $_POST['TongTien'];
                    $TrangThai = 'chuan-bi';

                    include_once 'model/m_book.php';
                    $ctGioSach = history_getCart($MaTK);
                    foreach($ctGioSach  as $sach){
                        book_decreaseAmount($sach['MaSach']);
                    }

                    history_updateCart($GioSach['MaLS'], $NgayMuon, $NgayTra, $SoSachMuon, $TongTien, $TrangThai);
                    $_SESSION['thongbao'] = 'Thầy Cường đã tiếp nhận yêu cầu của bạn';
                }
                header('Location: '.$base_url.'page/cart');
                break;
            case 'comment':
                include_once 'model/m_comment.php';
                comment_add($_SESSION['user']['MaTK'], $_POST['MaSach'], $_POST['NoiDung']);
                header('Location: '.$base_url.'book/detail/'.$_POST['MaSach']);
                break;
            default:
                # code...
                break;
        }
        include_once 'view/v_user_layout.php';
    }  
 ?>