  <h2 class="my-3 ">Tổng quan</h2>
                <div class="row">
                  <!-- đầu sách -->
                    <div class="col-md-3">    
                      <div class="card text-bg-primary mb-3">
                          <div class="card-body">
                          <h5 class="card-title">Đầu Sách</h5>
                          <p class="card-text fs-1 text-center"><?=$tkSach?></p>
                        </div>
                      </div>
                    </div>
                  <!-- bạn đọc -->
                  <div class="col-md-3">    
                      <div class="card text-bg-success mb-3">
                          <div class="card-body">
                          <h5 class="card-title">Bạn đọc</h5>
                          <p class="card-text fs-1 text-center"><?=$tkBanDoc?></p>
                        </div>
                      </div>
                    </div>
                  <!-- chủ đề -->
                  <div class="col-md-3">    
                      <div class="card text-bg-info mb-3">
                          <div class="card-body">
                            <h5 class="card-title">Chủ đề</h5>
                            <p class="card-text fs-1 text-center"><?=$tkCD?></p>
                          </div>
                      </div>
                  </div>
                  <!-- Lượt Mượn -->
                  <div class="col-md-3">    
                    <div class="card text-bg-danger mb-3">
                        <div class="card-body">
                          <h5 class="card-title">Lượt Mượn</h5>
                          <p class="card-text fs-1 text-center"><?=$tkLS?></p>
                        </div>
                    </div>
                  </div>
                </div> 

  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <strong>Thống kê Sách Theo chủ đề</strong>
        </div>
      </div>
      <!-- Biểu đồ -->
        <div id="myChart" style="max-width:700px; height:400px"></div> 
      <div class="card-body">
        <table class="table text-end">
          <thead>
            <tr>
              <th class="text-center">Chủ đề</th>
              <th>Số lượng sách</th>
              <th>Giá trung bình/Ngày</th>
              <th>Giá thấp nhất/Ngày</th>
              <th>Giá cao nhất/Ngày</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($tkSachTheoChuDe as $cd) : ?>
            <tr>
              <td class="text-center"><?=$cd['TenChuDe']?></td>
              <td><?=$cd['SoLuong']?></td>
              <td><?=number_format(round(max(500,$cd['TrungBinh']*0.5/100)))?>đ</td></td>
              <td><?=number_format(round(max(500,$cd['ThapNhat']*0.5/100)))?>đ</td>
              <td><?=number_format(round(max(500,$cd['CaoNhat']*0.5/100)))?>đ</td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>









    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <strong>Thống kê Doanh Thu</strong>
        </div>
      </div>
        <div id="DoanhThuChart" style="max-width:700px; height:400px"></div> 
      <div class="card-body">
        <table class="table text-end">
          <thead>
            <tr>
              <th class="text-center">Tháng/Năm</th>
              <th>Số bạn đọc</th>
              <th>Số lượt mượn</th>
              <th>Số Sách mượn</th>
              <th>Doanh Thu</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($tkDoanhThu as $dt) : ?>
            <tr>
              <td class="text-end"><?=$dt['thang']?>/<?=$dt['nam']?></td>
            
              <td class="text-end"><?=$dt['SoBanDoc']?></td>
              <td class="text-end"><?=$dt['SoLuotMuon']?></td>
              <td class="text-end"><?=$dt['SoSachMuon']?></td>
              <td class="text-end"><?=$dt['DoanhThu']?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://www.gstatic.com/charts/loader.js"></script>
  <script>
  google.charts.load('current',{packages:['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  // Your Function
  function drawChart() {
  // Set Data
  const data = google.visualization.arrayToDataTable([
    ['Chủ đề', 'Số Lượng Sách'],
    <?php foreach($tkSachTheoChuDe as $cd){
      echo"['".$cd['TenChuDe']."',".$cd['SoLuong']."],";
    }?>
  ]);

  
  // Set Options
  const options = {
    title:'Biểu đồ Thống Kê theo chủ đề',
    is3d:true,
  };

  // Draw
  const chart = new google.visualization.PieChart(document.getElementById('myChart'));
  chart.draw(data, options);








// Set Data
const data2 = google.visualization.arrayToDataTable([
    ['Tháng/Năm', 'Doanh Thu'],
  <?php foreach ($tkDoanhThu as $dt){
    echo "['" .$dt['thang']."/".$dt['nam']."',".$dt['DoanhThu']."],";
  }?>
  

]);

// Set Options
const options2 = {
  title:'Thống kê doanh thu'
};

// Draw
const chart2 = new google.visualization.ColumnChart(document.getElementById('DoanhThuChart'));
chart2.draw(data2, options2);
  }


</script>
