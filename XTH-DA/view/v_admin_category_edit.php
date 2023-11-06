<h1>Thêm Tài Khoản</h1>

<?php if(isset($_SESSION['loi'])): ?>
    <div class="alert alert-danger" role="alert">
        <?=$_SESSION['loi']?>
    </div>
<?php endif; unset($_SESSION['loi']); ?>
<?php if(isset($_SESSION['thongbao'])): ?>
    <div class="alert alert-success" role="alert">
        <?=$_SESSION['thongbao']?>
    </div>
<?php endif; unset($_SESSION['thongbao']); ?>
  
  <form action="" method="post">
                  <div class="mb-3">
                    <label for="TenChuDe" class="form-label">Tên Chủ Đề</label>
                    <input type="text" class="form-control"
                    name="TenChuDe" value="<?=$cd['TenChuDe']?>"
                    id="TenChuDe">
                  </div>
                  <button type="submit" name="submit" value="submit" class="btn btn-primary">Xác nhận</button>
</form>