<div class="row">
    <div class="col-md-6" >
        <img src="<?=$base_url?>upload/product/<?=$ctSach['HinhAnh']?>" alt="" class="w-100">
    </div>
    <div class="col-md-6">
        <h2><?=$ctSach['TuaSach']?></h2>
        <div class="row">
            <div class="col-md-6">Tác giả: 
                <strong><?=$ctSach['TacGia']?></strong>
            </div>
            <div class="col-md-6">Thể Loại:
                <strong><?=$ctSach['TenChuDe']?></strong>
            </div>
            <!-- ghichu -->
            <small>Số Lượng : <?=$ctSach['SoLuong']?></small>
            <div class="text-danger fs-2"><?=$ctSach['GiaTri']?>đ</div>
            
            
            <!-- button -->
            <a class="btn btn-primary btn-lg" href="<?=$base_url?>book/addToCart/
            <?=$ctSach['MaSach']?>">Mượn Sách</a>
            <?php if(isset($_SESSION['thongbao'])): ?>
                <div class="alert alert-success" role="alert">
                    <?=$_SESSION['thongbao']?>
                </div>
            <?php endif; unset($_SESSION['thongbao']); ?>

            
            <?php if(isset($_SESSION['loi'])): ?>
            <div class="alert alert-danger" role="alert">
                <?=$_SESSION['loi']?>
            </div>
            <?php endif; unset($_SESSION['loi']); ?>
        </div>
    </div>

</div>
<!-- mota -->
<hr class="my-4">
<h3><?=$ctSach['TuaSach']?></h3>
    <p class="my-3">
        <?=$ctSach['MoTa']?>
    </p>
<h2>Có thể bạn thích</h2>
    <div class="row">
        <!-- san pham -->
        <?php foreach ($dsNgauNhienCungChuDe as $sach):?>
        <div class="col-md-3 mb-3 col-sm-6">
            <div class="card">
                <img src="<?=$base_url?>upload/product/<?=$sach['HinhAnh']?>" class="card-img-top " alt="..." >
                <div class="card-body">
                    <h5 class="card-title"><?=$sach['TuaSach']?></h5>
                    <p class="card-text"><?=$sach['GiaTri']?>đ</p>
                    <a href="<?=$base_url?>book/detail/<?=$sach['MaSach']?>" class="btn btn-primary">Mượn</a>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
<h2>Cảm nghĩ bạn đọc</h2>
<?php if(isset($_SESSION['user'])): ?>
        <form action="<?=$base_url?>book/comment" method="post">
                    <input type="text" name="NoiDung" class="form-control form-control-lg" placeholder="Nhập cảm nghĩ của bạn về sách này">
                    <input type="hidden" name="MaSach" value="<?=$ctSach['MaSach']?>">
                    <button class="btn btn-primary btn-lg  mt-2" type="submit">Gửi</button>
        </form>
<?php endif; ?>
<?php foreach ($dsCamNghi as $cn): ?>
    <div class="row my-3 border rounded-3">
        <div class="col-sm-3">
            <strong><?=$cn['HoTen']?></strong> <br>
            <?=$cn['NgayGui']?> <br>
            <i>đã mượn <strong>5</strong> lần </i>
        </div>
        <div class="col-sm-9">
            <p>
                <?=$cn['NoiDung']?>
            </p>
        </div>
    </div>
<?php endforeach;?>
<!-- </div>
</div> -->