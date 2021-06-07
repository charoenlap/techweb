<!DOCTYPE html>
<html>
  <head>
    <title></title>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    
  </head>
  <body>
    <div class="content-wrapper">
      <div class="header"></div>
      <section class="content">
        <div class="content-fluid">
          <div class="row">
            <div class="col-8">
              <div class="table-header"><h1>รายการคำร้องของฉัน</h1></div>
              <div class="input-group mb-6 " id="header-searchBoard">
                <div class="input-group mb-6 " id="header-searchBoard">
                  <input type="search" class="form-control form-control"  aria-label="btn-search">
                  <div>
                    <button class="btn btn-sidebar" id="btn-searchBoard" data-toggle="tooltip" data-placement="bottom" title="ค้นหารายการที่ต้องการ"><i class="fas fa-search fa-fw"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <div class="container-table">
            <div class="col-12" id="header-table">
              <div class="card-header-filter">
                
                <div class="form-group-filter">
                  <label class="label-filter"><i class="fas fa-filter"></i></label>
                  <select class="form-control" id="search-filter">
                    <option>ประเภท</option>
                    <option>สถานะ</option>
                    <option>ผู้ร้องขอ</option>
                    <option>ผู้รับเรื่อง</option>
                    <option>วันที่ร้องขอ</option>
                    <option>วันที่ปรับปรุง</option>
                  </select>
                  <!-- filtee 1 -->
                  <select class="form-control" id="search-filter">
                    <option>ประเภท</option>
                    <option>สถานะ</option>
                    <option>ผู้ร้องขอ</option>
                    <option>ผู้รับเรื่อง</option>
                    <option>วันที่ร้องขอ</option>
                    <option>วันที่ปรับปรุง</option>
                  </select>
                  <!-- filter 2 -->
                  <div>
                    <button class="btn btn-sidebar" id="btn-searchBoard-filter"><i class="fas fa-search fa-fw"></i></button>
                  </div>
                  <div>
                    <button class="btn btn-sidebar" id="btn-searchBoard-filter-reset" data-toggle="tooltip" data-placement="bottom" title="Reset"><i class="fas fa-sync-alt"></i></button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered" id="table-inform">
                  <thead>
                    <tr>
                      <th style="width: 2%" > ลำดับ </th>
                      <th style="width: 10%" >ประเภท</th>
                      <th>รายละเอียด</th>
                      <th style="width: 8%">วันที่เริ่ม</th>
                      <th>สถานะ</th>
                      <th style="width: 8%; text-align:center;" >ผู้ร้องขอ</th>
                      <th style="width: 8%" >ผู้รับเรื่อง</th>
                      <th style="width: 9%">
                        <!-- <i class="ion ion-ios-timer-outline"></i>  -->
                        วันดำเนินการทั้งหมด
                      </th>
                      <th style="width: 16%; text-align:center;"> ดำเนินการ </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>STOCK OUT</td>
                      <td><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form</p></td>
                      <td>1/5/62</td>
                      <td><span class="badge bg-danger" id="badge-table">ไม่เสร็จ</span></td>
                      <td>vijit</td>
                      <td>weerapong</td>
                      <td><span class="badge bg-danger" id="badge-table">367</span></td>
                      <td class="project-actions text-right" id="operation-btn">
                        <a class="btn btn-info btn-sm modal_edit">
                          <i class="fas fa-pencil-alt">
                          </i>
                          แก้ไข
                        </a>
                        <a class="btn btn-danger btn-sm delete">
                          <i class="fas fa-trash">
                          </i>
                          ลบ
                        </a>
                      </td>
                      
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>STOCK OUT</td>
                      <td><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced </p></td>
                      <td>1/5/62</td>
                      <td><span class="badge bg-danger" id="badge-table">ไม่เสร็จ</span></td>
                      <td>vijit</td>
                      <td>weerapong</td>
                      <td><span class="badge bg-danger" id="badge-table">282</span></td>
                      <td class="project-actions text-right" id="operation-btn">
                        <a class="btn btn-info btn-sm modal_edit">
                          <i class="fas fa-pencil-alt">
                          </i>
                          แก้ไข
                        </a>
                        <a class="btn btn-danger btn-sm delete">
                          <i class="fas fa-trash">
                          </i>
                          ลบ
                        </a>
                      </td>
                      
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>CANCEL</td>
                      <td><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original </p></td>
                      <td>1/5/62</td>
                      <td><span class="badge bg-success" id="badge-table">เสร็จ</span></td>
                      <td>vijit</td>
                      <td>weerapong</td>
                      <td><span class="badge bg-success" id="badge-table">488</span></td>
                      <td class="project-actions text-right" id="operation-btn">
                        <a class="btn btn-info btn-sm modal_edit">
                          <i class="fas fa-pencil-alt">
                          </i>
                          แก้ไข
                        </a>
                        <a class="btn btn-danger btn-sm delete">
                          <i class="fas fa-trash">
                          </i>
                          ลบ
                        </a>
                      </td>
                      
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>NEW</td>
                      <td><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact or</p></td>
                      <td>1/5/62</td>
                      <td><span class="badge bg-danger" id="badge-table">ไม่เสร็จ</span></td>
                      <td>vijit</td>
                      <td>weerapong</td>
                      <td><span class="badge bg-danger" id="badge-table">62</span></td>
                      <td class="project-actions text-right" id="operation-btn">
                        <a class="btn btn-info btn-sm modal_edit">
                          <i class="fas fa-pencil-alt">
                          </i>
                          แก้ไข
                        </a>
                        <a class="btn btn-danger btn-sm delete">
                          <i class="fas fa-trash">
                          </i>
                          ลบ
                        </a>
                      </td>
                      
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
            </di?>
            <?php include 'viewModal.php'?>
          </div>
        </div>
      </body>
    </html>
    <style type="text/css">
    #header-searchBoard {
    display: flex;
    margin-left: 1%;
    
    }
    #header-table{
    
    }
    .table-header {
    margin-left: 3% !important;
    padding-top: 2%;
    }
    #searchBoard {
    width: 10% ;
    height: 35px;
    display: flex;
    
    }
    /*#btn {
    width: 12%;
    height: 35px;
    
    
    }*/
    #table-inform th {
    text-align: center;
    vertical-align: middle;
    font-size: 16px;
    }
    #table-inform td {
    text-align: center;
    vertical-align: middle;
    font-size: 16px;
    }
    .progress.progress-xs{
    height: 25px;
    }
    #badge-table {
    width: 90%;
    height: 50%;
    font-size: 18px;
    }
    h2.badge.bg-danger {
    font-size: 18px !important;
    margin-left: 4% !important;
    margin-right:  1% !important;
    }
    h2.badge.bg-success {
    font-size: 18px !important;
    margin-left: 4% !important;
    margin-right:  2% !important;
    }
    h2.badge.badge-info.right {
    font-size: 18px !important;
    margin-left: 4% !important;
    margin-right:  2% !important;
    }
    #operation-btn{
    
    clear: both;
    }
    #btn.btn-outline-secondary.dropdown-toggle.pull-right{
    width:16%;
    }
    #search-filter{
    width: 12rem;
    margin-left: 2%;
    float: left;
    display: flex;
    border-radius: .35rem .35rem .35rem .35rem;
    }
    /*.card-header-filter{
    
    display: inline-flex;
    }*/
    .form-group-filter{
    display: flex;
    margin-top: 1rem;
    }
    .label-filter{
    font-size: 1.5rem;
    margin-left: 1%;
    }
    #btn-search{
    
    margin-left: 2%;
    float: left;
    display: flex;
    }
    #table-inform th {
    background-color: #ededed;
    }
    #table-inform tr {
    background-color: #fff;
    }
    .form-control.form-control{
    border-radius: .35rem 0 0 .35rem;
    margin-left: 1.5%;
    }
    
    #btn-searchBoard {
    
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    line-height: 1.5;
    font-size: 1rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    padding: .375rem .75rem;
    height: 7.5;
    position: relative;
    z-index: 2;
    border-radius: 0rem .35rem .35rem 0rem;
    }
    #btn-searchBoard-filter{
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    line-height: 1.5;
    font-size: 1rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    padding: .375rem .75rem;
    height: 7.5;
    position: relative;
    z-index: 2;
    border-radius: .35rem .35rem .35rem .35rem;
    margin-left: 1rem;
    }
    /*desktop*/
    @media screen and (max-width: 1024px) {
    /* Force table to not be like tables anymore */
    table, thead, tbody, th, td, tr {
    display: block;
    }
    /* Hide table headers (but not display: none;, for accessibility) */
    thead tr {
    position: absolute;
    top: -9999px;
    left: -9999px;
    }
    tr {
    margin: 0 0 1rem 0;
    }
    
    tr:nth-child(odd) {
    background: #ccc;
    }
    
    td {
    /* Behave  like a "row" */
    border: none;
    border-bottom: 1px solid #eee;
    position: relative;
    padding-left: 50%;
    }
    td:before {
    /* Now like a table header */
    position: absolute;
    /* Top/left values mimic padding */
    
    left: 6px;
    vertical-align: middle;
    padding-right: 10px;
    white-space: nowrap;
    }
    /*
    Label the data
    You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
    */
    td:nth-of-type(1):before { content: "ลำดับ"; }
    td:nth-of-type(2):before { content: "ประเภท"; }
    td:nth-of-type(3):before { content: "รายละเอียด"; }
    td:nth-of-type(4):before { content: "วันที่เริ่ม"; }
    td:nth-of-type(5):before { content: "สถานะ"; }
    td:nth-of-type(6):before { content: "ผู้ร้องขอ"; }
    td:nth-of-type(7):before { content: "ผู้รับเรื่อง"; }
    td:nth-of-type(8):before { content: "วันดำเนินการทั้งหมด"; }
    #table-inform td {
    text-align: right;
    vertical-align: middle;
    }
    td p {
    margin-left: 40%;
    text-align: left;
    }
    #badge-table {
    width: 22%;
    height: 50%;
    font-size: 15px;
    }
    h2.badge.bg-danger {
    font-size: 18px !important;
    margin-left: 2% !important;
    margin-right:  1% !important;
    }
    h2.badge.bg-success {
    font-size: 18px !important;
    margin-left: 4% !important;
    margin-right:  2% !important;
    }
    h2.badge.badge-info.right {
    font-size: 18px !important;
    margin-left: 4% !important;
    margin-right:  2% !important;
    }
    #header-searchBoard {
    display: flex;
    width: 85%;
    
    
    }
    #search-filter{
    display: flex;
    width: 6rem;
    
    font-size: 13px;
    }
    .fas.fa-filter{
    margin-top: 5px;
    margin-left: 5px;
    padding-right: 5px;
    }
    #btn-searchBoard-filter{
    margin-left: 3px;
    }
    .col-lg-5.col-sm-8 {
    display: inline-flex;
    }
    .label-filter {
    vertical-align: middle;
    }
    }
    </style>
  

    <script>
    $(document).ready(function(){
    $('.modal_edit').click(function(){
    $('#dataEdit').modal('show');
    });
    $('.delete').click(function(){
    $('#confirmDel').modal('show');
    });
    $('[data-toggle="tooltip"]').tooltip()
    });
    
    </script>