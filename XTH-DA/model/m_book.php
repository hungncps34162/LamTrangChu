
<?php
    //thao tác dữ liệu trong CSDL
    include_once 'model/m_pdo.php';
    // lấy ra sách mới và có giới hạn
    function book_getNew($limit){
        return pdo_query("SELECT * FROM sach ORDER BY MaSach DESC LIMIT $limit");
    }
    // lấy ra sách nổi bật được chỉ định
    function book_getPin($limit){
        return pdo_query("SELECT * FROM sach WHERE GhimTrangChu = 1 LIMIT $limit");
    }
    // Lấy ra sách đọc nhiều và có giới hạn
    function book_getMostView($limit){
        return pdo_query("SELECT * FROM sach ORDER BY LuotDoc DESC LIMIT $limit");
    }
    // Lấy sách theo id
    function book_getById($id){
        return pdo_query_one("SELECT * FROM sach s INNER JOIN chude cd ON s.MaCD = cd.MaCD WHERE
         s.MaSach =?", $id);
    }
    // get random book by category
    function book_getRandomByCategory($id, ){
        return pdo_query("SELECT * FROM sach WHERE MaCD = ? ORDER BY RAND() LIMIT 4", $id);
    }
    //function book_getCategory(id)
    function book_getCategory($id){
        return pdo_query("SELECT * FROM sach WHERE MaCD = ?", $id);
    }
    // search book and page NO limit
    function book_search($keyword, $page, $limit){
        $offset = ($page - 1) * $limit;
        return pdo_query("SELECT * FROM sach WHERE TuaSach LIKE '%$keyword%' LIMIT $offset, $limit");
    }
    // tổng số sách đếm được
    function book_countSearch($keyword){
        return pdo_query_value("SELECT COUNT(*) FROM sach WHERE TuaSach LIKE '%$keyword%'");
    
    }
    // book decrease Amount
    function book_decreaseAmount($MaSach){
        pdo_execute("UPDATE sach SET SoLuong = SoLuong - 1 WHERE MaSach = ?", $MaSach);
    }
    function book_indecreaseAmount($MaSach){
        pdo_execute("UPDATE sach SET SoLuong = SoLuong + 1 WHERE MaSach = ?", $MaSach);
    }
    // function book_count
    function book_count(){
        return pdo_query_value("SELECT COUNT(*) FROM sach");
    }
    // book_getAll
    function book_getAll(){
        return pdo_query("SELECT * FROM sach");
    }
?>