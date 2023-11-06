
<?php
    //thao tác dữ liệu trong CSDL
    include_once 'model/m_pdo.php';
    // function comment_add
    function comment_add($MaTK,$MaSach, $NoiDung){
        pdo_execute("INSERT INTO camnghi(`MaTk`, `MaSach`, `NoiDung`)
        VALUES(?,?,?)",$MaTK,$MaSach,$NoiDung);
    }
    // comment getByBook
    function comment_getByBook($MaSach){
        return pdo_query("SELECT * FROM camnghi cn INNER JOIN  taikhoan tk ON cn.MaTK = tk.MaTK WHERE cn.MaSach = ?",$MaSach);
    }
    
?>