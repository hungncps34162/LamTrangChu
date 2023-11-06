<h1>Thêm Sách mới</h1>

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
                    <label for="TuaSach" class="form-label">Tựa Sách</label>
                    <input type="text" class="form-control"
                    name="TuaSach"
                    id="TuaSach">
                  </div>
                  <div class="mb-3">
                    <label for="HinhAnh" class="form-label">Hình Ảnh</label>
                    <input type="text" class="form-control"
                    name="HinhAnh"
                    id="HinhAnh">
                  </div>
                  <div class="mb-3">
                    <label for="TacGia" class="form-label">Tác Giả</label>
                    <input type="text" class="form-control"
                    name="TacGia"
                    id="TacGia">
                  </div>
                  <div class="mb-3">
                    <label for="GiaTri" class="form-label">Gía Trị</label>
                    <input type="number" class="form-control"
                    name="GiaTri"
                    id="GiaTri">
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