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
                    <label for="SoDienThoai" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control"
                    name="SoDienThoai"
                    id="SoDienThoai">
                  </div>
                  <div class="mb-3">
                    <label for="HoTen" class="form-label">Họ và Tên</label>
                    <input type="text" class="form-control"
                    name="HoTen"
                    id="HoTen">
                  </div>
                  <div class="mb-3">
                    <label for="ViTien" class="form-label">Ví Tiền</label>
                    <input type="number" class="form-control"
                    name="ViTien"
                    id="ViTien">
                  </div>
                  <div class="mb-3">
                    <label for="Quyen" class="form-label">Quyền</label>
                    <select class="form-select"
                    name="Quyen"
                    id="Quyen">
                      <option value="0" selected>Bạn đọc</option>
                      <option value="1">Quản lý</option>
                    <option value="2">Quản lý cấp cao</option>
                    </select>
                  </div>
                  <button type="submit" name="submit" value="submit" class="btn btn-primary">Xác nhận</button>
</form>