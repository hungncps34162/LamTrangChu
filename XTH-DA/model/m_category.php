<?php
    // function getAll Masach
    function category_getAll(){
        $sql = "SELECT * FROM chude";
        return pdo_query($sql);
    }

    // function category_getbyId
    function category_getById($MaCD){
        $sql = "SELECT * FROM chude WHERE MaCD = ?";
        return pdo_query_one($sql, $MaCD);
    } 
    // category_add
    function category_add($TenChuDe){
        $sql = "INSERT INTO chude(TenChuDe) VALUES(?)";
        pdo_execute($sql, $TenChuDe);
    }
    // category_checkChuDe
    function category_checkChuDe($TenChuDe){
        $sql = "SELECT * FROM chude WHERE TenChuDe = ?";
        return pdo_query_one($sql, $TenChuDe);
    }
    //function category_edit
    function category_edit($MaCD, $TenChuDe){
        pdo_execute("UPDATE chude SET TenChuDe = ? WHERE MaCD = ?", $TenChuDe, $MaCD);
    }
    // category_delete
    function category_delete($MaCD){
        pdo_execute("DELETE FROM chude WHERE MaCD = ?", $MaCD);
    }

    function category_count(){
        
        return pdo_query_value("SELECT COUNT(*) FROM chude");
    }
    function category_statByBook(){
        return pdo_query("SELECT cd.MaCD, cd.TenChuDe ,COUNT(s.MaSach) AS SoLuong, AVG(s.GiaTri) AS TrungBinh, 
MIN(s.GiaTri) AS ThapNhat, MAX(s.GiaTri) AS CaoNhat
FROM chude cd LEFT JOIN sach s ON cd.MaCD = s.MaCD
GROUP BY cd.MaCD, cd.TenChuDe");
    }

?>