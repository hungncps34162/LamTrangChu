</nav>
            <div class="container">
              <a href="<?=$base_url?>admin/category/add" class="btn btn-success float-end">Thêm chủ đề</a>
                <h2 class="my-3 ">Chủ đề</h2>
                <table class="table text-center align-middle">
                  <thead>
                    <tr>
                        <th>STT</th>
                        <td>Mã Chủ Đề</td>
                        <th>Tên chủ đề</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php $i=1; foreach ($dsCD as $cd): ?>
                    <tr>
                      <td><?=$i?></td>
                      <td><?=$cd['MaCD']?></td>
                      <td ><?=$cd['TenChuDe']?></td>
                      <td class="text-end">
                        <a class="btn btn-warning" href="<?=$base_url?>admin/category/edit/<?=$cd['MaCD']?>">Sửa</a>
                        <button onclick="deleteCD(<?=$cd['MaCD']?>)" class="btn btn-danger" href="<?=$base_url?>admin/category/delete/<?=$cd['MaCD']?>">Xóa</button>
                      </td>
                      
                    </tr>
                  <?php $i++; endforeach; ?>

                  </tbody>
                </table>
            </div>
            <script >
              function deleteCD(MaCD){
                var kq = confirm('Bạn có chắc chắn muốn xóa chủ đề này không?');
                if(kq){
                  window.location= '<?=$base_url?>admin/category/delete/'+MaCD;
                }
                
              }
            </script>