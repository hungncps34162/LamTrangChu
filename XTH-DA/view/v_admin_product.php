
<div class="container">
        <a href="<?=$base_url?>admin/book/add" class="btn btn-success float-end">Thêm sách</a>
        <h2 class="my-3 ">Sách</h2>
        <table class="table text-center align-middle">
            <thead>
            <tr>
                <th>STT</th>
                <td>Mã Sách</td>
                <th>Tựa Sách</th>
                <th>Hình Ảnh</th>
                <th>Tac Giả</th>
                <th>Giá Trị</th>
                <!-- <th>Mô tả</th> -->
                <th>MaCD</th>
                <th>SoLuong</th>
            </tr>
            </thead>
            <tbody>   

            <?php $i=1; foreach ($QuanLySach as $sach): ?>
            <tr>
                <td><?=$i?></td>
                <td><?=$sach['MaSach']?></td>
                <td ><?=$sach['TuaSach']?></td>
                <td><img src="<?=$base_url?>upload/product/<?=$sach['HinhAnh']?>" width="100px"></td>
                <td ><?=$sach['TacGia']?></td>
                <td ><?=$sach['GiaTri']?>đ</td>
                <!-- <td ><?=$sach['MoTa']?></td> -->
                <td ><?=$sach['MaCD']?></td>
                <td class="text-end">
                <a class="btn btn-warning" href="<?=$base_url?>admin/book/edit/<?=$sach['MaSach']?>">Sửa</a>
                <button onclick="deleteCD(<?=$sach['MaSach']?>)" class="btn btn-danger" href="<?=$base_url?>admin/book/delete/<?=$sach['MaSach']?>">Xóa</button>
                </td>
                
            </tr>
            <?php $i++; endforeach; ?>

            </tbody>
        </table>
    </div>

            
<script >
    function deleteCD(MaSach){
    var kq = confirm('Bạn có chắc chắn muốn xóa Sách này không?');
    if(kq){
        window.location= '<?=$base_url?>admin/book/delete/'+MaSach;
    }
    
    }
</script>            