<?php

    include_once('config.php');

    // điều hướng đến các controller
    // INCLUDE
    include_once('model/m_book.php');
    include_once('model/m_category.php');
    $dsDocNhieu = book_getMostView(10);
    $dsChuDe = category_getAll();
    if (isset($_GET['mod'])) {
        switch ($_GET['mod']) {
            case 'page':
                $ctrl_name= 'page';
                break;
            case 'user':
                $ctrl_name= 'user';
                break;
            case 'book':
                $ctrl_name= 'book';
                break;
            case 'category':
                $ctrl_name= 'category';
                break;
            case 'admin':
                $ctrl_name= 'admin';
                break;
            default:
                # code...
                break;
        }
        // goi file controller
        include_once('controller/c_'.$ctrl_name.'.php');
    } else {
        //chuyển về trang chủ với location
        header('Location: page/home');
        


    }
    
?>