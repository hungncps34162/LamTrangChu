<h1>Giỏ Hàng</h1>
<?php if(isset($_SESSION['thongbao'])): ?>
  <div class="alert alert-success" role="alert">
      <?=$_SESSION['thongbao']?>
  </div>
<?php endif; unset($_SESSION['thongbao']); ?>
<!-- form -->
  <form action="<?=$base_url?>book/updateCart" method="post">
  <input type="hidden" name="SoSachMuon" id="SoSachMuon">
  <input type="hidden" name="TongTien" id="TongTien">
  <div class="row">
      <div class="col-md-6">
          <div class="input-group flex-nowrap">
              <span class="input-group-text">Ngày dự kiến mượn</span>
              <input type="datetime-local"  
              name="NgayMuon" id="NgayMuon"
              value="<?=$GioSach['NgayMuon']?>"
              class="form-control" onchange="tinhThanhTien()">
          </div>
      </div>
      <div class="col-md-6">
          <div class="input-group flex-nowrap">
                  <span class="input-group-text">Ngày dự kiến trả</span>
                  <input type="datetime-local" 
                  name="NgayTra" id="NgayTra"
                  value="<?=$GioSach['NgayTra']?>"
                  class="form-control" onchange="tinhThanhTien()">
              </div>
      </div>
  </div>
  <table class="table text-center">
      <thead>
          <tr>
              <th>Ảnh</th>
              <th class="text-start">Tựa sách</th>
              <th class="text-end">Giá Trị</th>
              <th class="text-end">Giá Mượn</th>
              <th class="text-end">Thành Tiền</th>
              <th>Hành Động</th>
          </tr>
      </thead>
      
      <tbody>
        <?php foreach ($ctGioSach as $item): ?>
          <tr>
            <!-- hình ảnh -->
              <td><img class="rounded-3" style="width:50px" src="<?=$base_url?>upload/product/<?=$item['HinhAnh']?>" alt=""></td>
              <!-- Tựa sách -->
              <td class="text-start"><?=$item['TuaSach']?></td>
              <!-- Giá trị -->
              <td class="text-end"><?=$item['GiaTri']?>đ</td>
              <!-- Giá Mượn -->
              <td class="text-end">
                <?=max($item['GiaTri']*0.5/100,500) ?>đ
              </td>
              <!-- tính thành tiền trong td -->
              <td class="text-end"></td>

              <td><a href="<?=$base_url?>book/removeFromCart/<?=$item['MaSach']?>" class="btn btn-outline-danger btn-sm">Xóa</a>
              </td>
          </tr>
        <?php endforeach; ?>
      </tbody>

      <tfoot>
          <tr>
              <th colspan="4" class="text-end">TỔNG THÀNH TIỀN</th>
              <th class="text-end">0đ</th>
              <th>
                  <a href="<?=$base_url?>book/removeCart" class="btn btn-outline-danger btn-sm">Xóa hết</a>
              </th>
          </tr>
      </tfoot>
  </table>
  <!-- Button trigger modal -->
  <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Xác nhận mượn
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Xác nhận mượn</h1>
          <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          QUY ĐỊNH MƯỢN TRẢ SÁCH TẠI THƯ VIỆN

      Mượn sách đọc tại thư viện:

      Bạn đọc có thể đọc sách, báo, tạp chí, tập san các loại tại chỗ không cần đăng ký mượn.
      
      Bạn đọc không được mượn báo chí mang về nhà. Báo chí đọc xong để lại vào kệ hoặc tập trung lại một chỗ để thủ thư cất.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
          <button type="submit" class="btn btn-primary">Đồng ý</button>
        </div>
      </div>
    </div>
  </div>
</form>
<script>
  function tinhThanhTien() {
    var dsSach = document.querySelectorAll('table tbody tr');
    var NgayMuon = document.querySelector('#NgayMuon').value;
    
    var NgayTra = document.querySelector('#NgayTra').value;
    var SoNgayMuon =(new Date(NgayTra) - new Date(NgayMuon))/(24*60*60*1000);
  
    var tong=0;
    for (const sach of dsSach) {
        var gia = Number(sach.querySelector('td:nth-child(4)').innerText.replace('đ',''));
        var tien= gia * SoNgayMuon;
        sach.querySelector('td:nth-child(5)').innerText = tien +'đ';
        tong= tong + tien;
    }
    document.querySelector('tfoot th:nth-child(2)').innerText = tong + 'đ';
    document.querySelector('#SoSachMuon').value = dsSach.length;
    document.querySelector('#TongTien').value = tong;

  }
  tinhThanhTien();
</script>