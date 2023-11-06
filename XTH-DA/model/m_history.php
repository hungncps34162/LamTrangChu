<?php
    // function user
    include_once'm_pdo.php';
    function history_hasCart($MaTK){
        return pdo_query_one("SELECT * FROM lichsu WHERE MaTK = ? and TrangThai = ?", $MaTK,'gio-sach');
    }

    // add
    function history_add($MaTK){
        pdo_execute("INSERT INTO lichsu(`MaTK`,`NgayMuon`,`NgayTra`,`TrangThai`) VALUES(?,?,?,?)", $MaTK, date('Y-m-d H:i:s'),
        date('Y-m-d H:i:s'), 'gio-sach');
    }

    // add to cart
    function history_addToCart($MaLS, $MaSach){
        pdo_execute("INSERT INTO chitietlichsu(`MaLS`,`MaSach`) VALUES(?,?)",
         $MaLS, $MaSach);
    }
    // lấy san phẩm ra giỏ hàng theo MaTK
    function history_getCart($MATK){
        return pdo_query("SELECT * FROM lichsu ls INNER JOIN chitietlichsu ct ON ls.MaLS = ct.MaLS INNER JOIN sach s ON ct.MaSach = s.MaSach WHERE ls.MaTK = ? and ls.TrangThai = ?", $MATK, 'gio-sach');
    }
    // removeFromCart
    function history_removeFromCart($MaLS, $MaSach){
        pdo_execute("DELETE FROM chitietlichsu WHERE MaLS = ? AND MaSach = ?", $MaLS, $MaSach);
    }
    // removeCart
    function history_removeCart($MaLS){
        pdo_execute("DELETE FROM chitietlichsu WHERE MaLS = ?", $MaLS);
    }
    // get history updateCart
    function history_updateCart($MaLS, $NgayMuon, $NgayTra, $SoSachMuon, $TongTien, $TrangThai){
        //pdo
        pdo_execute("UPDATE lichsu SET NgayMuon = ?, NgayTra = ?, SoSachMuon = ?, TongTien = ?, TrangThai = ? WHERE MaLS = ?", $NgayMuon, $NgayTra, $SoSachMuon, $TongTien, $TrangThai, $MaLS);
    }
    // function history_getAllByAccount
    function history_getAllByAccount($MaTK){
        return pdo_query("SELECT * FROM lichsu WHERE MaTK = ?", $MaTK);
    }
    //get_All
    function history_getAll(){
        return pdo_query("SELECT * FROM lichsu");
    }
    //history_count
    function history_count(){
        return pdo_query_value("SELECT COUNT(*) FROM lichsu");
    }
    // stat
    function history_stat(){
        return pdo_query("SELECT YEAR(NgayTra) AS nam, MONTH(NgayTra) AS thang, COUNT(DISTINCT MaTK) as SoBanDoc,
        COUNT(MaLS) AS SoLuotMuon, SUM(SoSachMuon) AS SoSachMuon, SUM(TongTien) AS DoanhThu
        FROM lichsu
        GROUP BY YEAR(NgayTra), MONTH(NgayTra)");
    }
?>