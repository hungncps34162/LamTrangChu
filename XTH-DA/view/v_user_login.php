<!-- login -->
    <h2>Đăng Nhập</h2>    
    <form method="post" action="">
        
        <?php if(isset($_SESSION['loi'])): ?>
            <div class="alert alert-danger" role="alert">
                <?=$_SESSION['loi']?>
            </div>
        <?php endif; unset($_SESSION['loi']); ?>
        <div class="mb-3">
            <label for="phone" class="form-label">Số Điện Thoại</label>
            <input type="text" class="form-control" name="SoDienThoai" id="phone" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Mật Khẩu</label>
            <input type="password" class="form-control" name="MatKhau"
            id="pass">
        </div>
        
        <button type="submit" class="btn btn-primary">Đăng Nhập</button>
    </form>