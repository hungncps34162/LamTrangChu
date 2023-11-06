</nav>
            <div class="container">
              <a href="<?=$base_url?>admin/user/add" class="btn btn-success float-end">Thêm tài khoản</a>
                <h2 class="my-3 ">Tài Khoản</h2>
                <table class="table text-center align-middle">
                  <thead>
                    <tr>
                      <th>STT</th>
                        <th>Ảnh</th>
                        <th class="text-start">Họ Tên</th>
                        <th>Số điện thoại</th>
                        <th>Quyền</th>
                        <th class="text-end">Hành động</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php $i=1; foreach ($dsTK as $tk): ?>
                    <tr>
                      <td><?=$i?></td>
                      <td><img class="rounded-3" src="<?=$base_url?>upload/avatart/<?=$tk['HinhAnh']?>" width="40px" alt=""></td>
                      <td class="text-start"><?=$tk['HoTen']?></td>
                      <td><?=$tk['SoDienThoai']?></td>
                    
                      <td> 
                          <?php 
                            switch ($tk['Quyen']) {
                              case '2':
                                echo '<span class="badge text-bg-danger">Quản lý cấp cao</span>';
                                break;
                              case '1':
                                echo '<span class="badge text-bg-success">Quản lý</span>';
                                break;

                              default:
                                echo '<span class="badge text-bg-primary">Bạn đọc</span>';
                                break;
                            }
                          ?>
                        </td>
                      <td class="text-end">
                        <a class="btn btn-warning" href="<?=$base_url?>admin/user/edit/<?=$tk['MaTK']?>">Sửa</a>
                        <button onclick="deleteUser(<?=$tk['MaTK']?>)" class="btn btn-danger" href="<?=$base_url?>admin/user/delete/<?=$tk['MaTK']?>">Xóa</button>
                      </td>
                      
                    </tr>
                  <?php $i++; endforeach; ?>

                  </tbody>
                </table>
            </div>
            <script >
              function deleteUser(MaTK){
                var kq = confirm('Bạn có chắc chắn muốn xóa tài khoản này không?');
                if(kq){
                  window.location= '<?=$base_url?>admin/user/delete/'+MaTK;
                }
                
              }
            </script>