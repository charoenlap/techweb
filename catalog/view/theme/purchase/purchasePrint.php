<link rel="stylesheet" href="assets/css/purchase.css">
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1>ค้นหารายการ</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
            <li class="breadcrumb-item active">ค้นหารายการ</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="content-fluid">
      <div class="card ">
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <table class="table table-striped" id="table-inform">
                <thead>
                  <tr>
                    <th width="100px;">PO. no.</th>
                    <th width="100px;" >Date</th>
                    <th width="100px;">Supplier</th>
                    <th width="120px;">Status</th>
                    <th >Detail</th>
                    <th  width="100px;"> วัน </th>
                  </tr>
                </thead>
                <tbody>
                  <?php if($ListPurchaseNumRows > 0){ ?>
                  <?php $i=1;foreach($ListPurchase as $val){ ?>
                  <tr >
                    <td>
                      <?php echo mb_strimwidth(strip_tags($val['po_no']),0,10,'...','utf-8'); ?>
                    </td>
                    <td>
                      <?php
                      $originalDate = $val['date_create'];
                      $date_create = date("Y-m-d", strtotime($originalDate));
                      echo $date_create; ?></td>
                    <td><a href="#"></a><?php echo $val['name_sup']; ?></td>
                    <td>
                      <?php echo $val['status']; ?>
                    </td>
                    <td>
                      <p class="text-left">Quantity: <b><?php echo $val['quantity']; ?></b></p>
                      <p class="text-left">Department: <b><?php echo $val['name_depart']; ?></b></p>
                      <p class="text-left">Location: <?php echo $val['location']; ?></p>
                      <p class="text-left">Recieved by: <b><?php echo mb_strimwidth($val['name']." ".$val['lname'],0,50,'...','utf-8'); ?></b></p>
                      <p class="text-left"><?php echo mb_strimwidth(strip_tags($val['detail']),0,150,'...','utf-8'); ?></p>
                      
                    </td>
                    <td><?php echo $val['days']; ?></td>
                  </tr>
                  <?php } ?>
                <?php }else{ ?>
                  <tr>
                    <td colspan="10">ไม่พบข้อมูล</td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


<script type="text/javascript">
window.print();
</script>
<?php /* ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--  <script>
$(document).ready(function(){
$('.modal_edit').click(function(){
$('#dataEdit').modal('show');
});
$('.delete').click(function(){
$('#confirmDel').modal('show');
});
$('[data-toggle="tooltip"]').tooltip()
$('#datepicker-end').datepicker({
uiLibrary: 'bootstrap4'
});
});

</script> -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">

$(function () {
$('[data-toggle="tooltip"]').tooltip()
});
$('#datepicker').datepicker({
uiLibrary: 'bootstrap4'
});
$('#datepicker-end').datepicker({
uiLibrary: 'bootstrap4'
});
$('.modal_edit').click(function(){
$('#dataEdit').modal('show');
});
$('.delete').click(function(){
$('#confirmDel').modal('show');
});
$('[data-toggle="tooltip"]').tooltip()
$('#datepicker-end').datepicker({
uiLibrary: 'bootstrap4'
});
</script>
<?php */?>