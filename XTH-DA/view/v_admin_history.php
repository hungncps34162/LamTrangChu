<h1>Lịch Sử </h1>
<table class="table text-center">
  <thead>
    <tr>
      <th>Mã mượn sách</th>
      <th>Ngày mượn</th>
      <th>Ngày trả</th>
      <th>Số sách mượn</th>
      <th>Tổng Tiền</th>
      <th>Trạng Thái</th>
      <th>Hành Động</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($dsLS as $ls): ?>
    <tr>
      <td><?=$ls['MaLS']?></td>
      <td><?=$ls['NgayMuon']?></td>
      <td><?=$ls['NgayTra']?></td>
      <td><?=$ls['SoSachMuon']?></td>
      <td><?=$ls['TongTien']?></td>
      <td>
        <?php switch ($ls['TrangThai']) {
          case 'chuan-bi':
            echo '<span class="badge text-bg-primary">Đã tiếp nhận</span>';
            break;
          case 'cho-giao':
            echo '<span class="badge text-bg-success">Đã có sách</span>';
            break;
          
          default:
            # code...
            break;
        }
        ?>
      
      </td>
      <td class="text-end"> 
        <a class="btn btn-warning" href="<?=$base_url?>admin/history/edit/<?=$ls['MaLS']?>">Sửa</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>