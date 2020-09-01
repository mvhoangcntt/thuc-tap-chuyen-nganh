<section id="main-content">
      <section class="wrapper">
        <div style="padding-top: 0px;">
        <div class="row"><br/><br/>
          <div style="padding-left: 10px; padding-top: 10px;"><h2>Quản lý hệ thống</h2></div>
          <table style="font-size: 20px;" cellpadding="0" cellspacing="0" width="100%" class="table table-bordered" id="checkAll">
          <tr>
            <th style="width: 50%;" colspan="2">Thống kê giao dịch</th>
            <th style="width: 50%;" colspan="2">Doanh số</th>
          </tr>
          <tr>
            <td style="width: 25%;">
              Tổng giao dịch : 
            </td>
            <td style="width: 25%;">
              <b style="color: red;">
              <?php while ($row = $tonggiaodich->fetch_assoc()) {
                echo number_format($row['COUNT(id)']);
              } ?></b>
            </td>
            <td style="width: 25%;">
              Tổng doanh số :
            </td>
            <td style="width: 25%;">
              <b style="color: red;">
              <?php while ($row = $tongdoanhso->fetch_assoc()) {
                echo number_format($row['SUM(amount)']);
              } ?> đ</b>
            </td>
          </tr>

          <tr>
            <td>
              Tổng sản phẩm :
            </td>
            <td>
              <b style="color: red;">
              <?php while ($row = $tongsp->fetch_assoc()) {
                echo number_format($row['COUNT(id)']);
              } ?></b>
            </td>
            <td>
              Doanh số hôm nay :
            </td>
            <td>
              <b style="color: red;">
              <?php while ($row = $doanhsohomnay->fetch_assoc()) {
                echo number_format($row['SUM(order.amount)']);
              } ?> đ</b>
            </td>
          </tr>

          <tr>
            <td>
              Tổng số thành viên :
            </td>
            <td>
              <b style="color: red;">
              <?php while ($row = $tonguser->fetch_assoc()) {
                echo number_format($row['COUNT(id)']);
              } ?></b>
            </td>
            <td>
              Doanh số tháng này :
            </td>
            <td>
              <b style="color: red;">
              <?php while ($row = $doanhsothangnay->fetch_assoc()) {
                echo number_format($row['SUM(order.amount)']);
              } ?> đ</b>
            </td>
          </tr>

          </table>
        </div>

        <!-- biểu đồ -->
        <div class="row">
          <div id="chart1" style="min-width: 100%; height: 400px; margin: 0 auto"></div>
  <?php 
          $tong1 = 0;$tong3 = 0;$tong5 = 0;$tong7 = 0;$tong9 = 0;$tong11 = 0;
          $tong2 = 0;$tong4 = 0;$tong6 = 0;$tong8 = 0;$tong10 = 0;$tong12 = 0;
          while ($row = $data->fetch_assoc()) {
              if (date('m',strtotime($row['created'])) == 1) {
                $tong1 = $tong1 + $row['amount']; 
              }
              if (date('m',strtotime($row['created'])) == 2) {
                $tong2 = $tong2 + $row['amount'];
              }
              if (date('m',strtotime($row['created'])) == 3) {
                $tong3 = $tong3 + $row['amount'];
              }
              if (date('m',strtotime($row['created'])) == 4) {
                $tong4 = $tong4 + $row['amount'];
              }
              if (date('m',strtotime($row['created'])) == 5) {
                $tong5 = $tong5 + $row['amount'];
              }
              if (date('m',strtotime($row['created'])) == 6) {
                $tong6 = $tong6 + $row['amount'];
              }
              if (date('m',strtotime($row['created'])) == 7) {
                $tong7 = $tong7 + $row['amount'];
              }
              if (date('m',strtotime($row['created'])) == 8) {
                $tong8 = $tong8 + $row['amount'];
              }
              if (date('m',strtotime($row['created'])) == 9) {
                $tong9 = $tong9 + $row['amount'];
              }
              if (date('m',strtotime($row['created'])) == 10) {
                $tong10 = $tong10 + $row['amount'];
              }
              if (date('m',strtotime($row['created'])) == 11) {
                $tong11 = $tong11 + $row['amount'];
              }
              if (date('m',strtotime($row['created'])) == 12) {
                $tong12 = $tong12 + $row['amount'];
              }
          }
echo "
          <script type='text/javascript'>
            $(function () {
    Highcharts.chart('chart1', {
        title: {
            text: 'Biểu đồ doanh thu theo theo năm',
        },
        xAxis: {
            categories: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12']
        },
        yAxis: {
            title: {
                text: 'Việt Nam đồng'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' đ'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            data: [$tong1, $tong2, $tong3, $tong4, $tong5, $tong6, $tong7, $tong8, $tong9, $tong10, $tong11, $tong12]
        }]
    });
});
          </script> ";
          ?>
        </div><br/>
        <div class="row">
          <form style="padding-left: 30px;" class="form-inline" method="get" action="index.php">
            <select class="form-control mr-sm-2" name="nam"  onchange="this.form.submit()">
                <option>Chọn năm</option>
                <?php 
                    for ($i=2018; $i < 2021 ; $i++) { ?>
                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                   <?php }
                 ?>
                
            </select>
              <input type="hidden" name="task" value="admin">
          </form>
        </div>
        <!-- /row -->
      </div>
      </section>
</section>