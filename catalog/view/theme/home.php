<link rel="stylesheet" href="assets/css/home.css">
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">รายการทั้งหมด</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-2 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner" id="con-New">
              <h3>150</h3>
              <p>NEW<br><br></p>
            </div>
            <div class="icon">
              <i class="ion ion-android-time"></i>
            </div>
            <a href="#" class="small-box-footer" id="box-footer-New">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-6">
          <div class="small-box bg-info">
            <div class="inner" >
              <h3>150</h3>
              <p>MODIFY<br><br></p>
            </div>
            <div class="icon">
              <i class="ion ion-android-settings"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-6" >
          <div class="small-box bg-info">
            <div class="inner" id="con-Cancel">
              <h3>150</h3>
              <p>CANCEL<br><br></p>
            </div>
            <div class="icon">
              <i class="ion ion-android-cancel"></i>
            </div>
            <a href="#" class="small-box-footer" id="box-footer-Cancel">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-6">
          <div class="small-box bg-info">
            <div class="inner" id="con-Problem">
              <h3>150</h3>
              <p>PROBLEM<br><br></p>
            </div>
            <div class="icon">
              <i class="ion ion-alert-circled"></i>
            </div>
            <a href="#" class="small-box-footer" id="box-footer-Problem">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-6">
          <div class="small-box bg-info">
            <div class="inner" id="con-Complain">
              <h3>150</h3>
              <p>QUALITY<br>COMPLAIN</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-document"></i>
            </div>
            <a href="#" class="small-box-footer" id="box-footer-Complain">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-6">
          <div class="small-box bg-info">
            <div class="inner" id="con-Stock">
              <h3>150</h3>
              <p>STOCK OUT<br><br></p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-filing-outline"></i>
            </div>
            <a href="#" class="small-box-footer" id="box-footer-Stock">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="page-content page-container" id="page-content">
        <div class="padding">
          <div class="row content2">
            <div class="col-12">
              <div class="row">
                <div class="col-12 col-lg-8 employee">
                  <div class="card">
                    <div class="card-header">Pie chart</div>
                    <div class="card-body" style="height:auto;">
                      <div>
                        <canvas id="pieChart" style=""></canvas>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-4 employee">
                  <div class="card employee">
                    <div class="card-header">
                      <h3 class="card-title">บุคลากรผู้รับผิดชอบ</h3>
                    </div>
                    <div class="card-body table-responsive p-0" style="height:350px;">
                      <table class="table table-head-fixed text-nowrap">
                        <thead>
                          <tr>
                            <th>ชื่อ</th>
                            <th>ปัญหา</th>
                            <th>ทั่วไป</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if($User->num_rows > 0){ ?>
                          <?php $i=1;foreach($User->rows as $val){ ?>
                          <tr>
                            <td><?php echo $val['name']; ?></td>
                            <td>0</td>
                            <td>1</td>
                          </tr>
                          <?php } } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row-1">
          <div class="col-4 text-center">
            <div id="sparkline-1"></div>
          </div>
          <div class="col-4 text-center">
            <div id="sparkline-2"></div>
            <div class="text-white">Online</div>
          </div>
          <div class="col-4 text-center">
            <div id="sparkline-3"></div>
            <div class="text-white">Sales</div>
          </div>
        </div>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
        <script>
          var ctxP = document.getElementById("pieChart").getContext('2d');
          var myPieChart = new Chart(ctxP, {
          type: 'pie',
          data: {
          labels: ["PROBLEM", "NEW", "CANCEL", "MODIFY", "STOCK OUT" , "QUALITY COMPLAIN"],
          datasets: [{
          data: [300, 50, 100, 40, 120, 44],
          backgroundColor: ["#ff2c2c", "#95db5e", "#f48345", "#17a2b8", "#858583" , "#8a23c5" ],
          hoverBackgroundColor: ["#ff2c2c", "#95db5e", "#f48345", "#17a2b8", "#858583" , "#8a23c5"]
          }]
          },
          options: {
          
          responsive: true,
          
          // legend: { display: false }, // ลบ labels
          }
          });
        </script>
      </div>
    </div>
  </div>