<link rel="stylesheet" href="assets/css/purchase.css">
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1><?php echo l('title_search'); ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><?php echo $lang['title_home']; ?></a></li>
            <li class="breadcrumb-item active"><?php echo $lang['title_search']; ?></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="content-fluid">
      <div class="card ">
        <div class="card-body">
          <form action="<?php echo $link_form_search; ?>" method="POST" id="form-search">
            <div class="row search">
              <div class="col-5 col-lg-1 col-md-2 ">
                <div class="form-group">
                  <div><label for=""><?php echo l('detail'); ?></label></div>
                  <div class="input-group" id="header-searchBoard">
                    <input name="txtSearch" value="<?php echo $txtSearch; ?>" type="search"  class="form-control searchBox" id=""  aria-label="btn-search" 
                    placeholder="<?php echo l('title_search_detail'); ?>" style="font-size: 14px; text-align: center;" 
                    data-toggle="tooltip" data-placement="bottom" title="รายละเอียด,PO,ลูกค้า">
                    <!-- <button class="btn btn-sidebar" id="btn-searchBoard" data-toggle="tooltip" data-placement="bottom" title="ค้นหารายการที่ต้องการ"><i class="fas fa-search fa-fw"></i></button>
                    -->
                  </div>
                </div>
              </div>
              <div class="col-5 col-lg-2 col-md-2 ">
                <div class="form-group">
                  <div><label for=""><?php echo l('status'); ?></label></div>
                  <div class="input-group" id="header-searchBoard">
                    <select name="status" 
                      class="form-control" 
                      style="width:130px;display:inline-block;">
                        <option value="0" <?php echo ($status=='0'?'selected':''); ?>>Wait recieve</option>
                        <option value="1" <?php echo ($status=='1'?'selected':''); ?>>Recieved</option>
                        <option value="2" <?php echo ($status=='2'?'selected':''); ?>>Problem</option>
                      </select>
                  </div>
                </div>
              </div>
              <div class="col-5 col-lg-2 col-md-2 ">
                <div class="form-group">
                  <label><?php echo l('date_start'); ?></label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input name="date" type="text" class="form-control datetimepicker-input" data-target="#reservationdate" value="<?php echo $date; ?>">
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <?php /* ?>
                <div>
                  <input id="datepicker" class="form-control" name=""  placeholder="วันที่" style="font-size: 14px; text-align: center;">
                </div><?php */ ?>
              </div>
              <div class="col-3 col-lg-2 col-md-2">
                <div class="form-group">
                  <div><label for=""><?php echo l('purchase'); ?></label></div>
                  <div class="form-group">
                    <select name="purchaser" class="form-control">
                      <option disabled="" selected=""><?php echo l('all'); ?></option>
                      <?php if($User->num_rows > 0){ ?>
                      <?php $i=1;foreach($User->rows as $val){ ?>
                      <option value="<?php echo $val['name']; ?>" <?php echo ($purchaser==$val['name']?'selected':''); ?>><?php echo $val['name']; ?></option>
                      <?php } }?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-3 col-lg-2 col-md-2">
                <div class="form-group">
                  <div><label for=""><?php echo l('branch'); ?></label></div>
                  <div class="form-group">
                    <select name="branch" class="form-control">
                      <option disabled="" selected=""><?php echo l('all'); ?></option>
                      <?php if($department->num_rows > 0){ ?>
                      <?php $i=1;foreach($department->rows as $val){ ?>
                      <option value="<?php echo $val['name_department']; ?>" <?php echo ($branch==$val['name_department']?'selected':''); ?>><?php echo $val['name_department']; ?></option>
                      <?php } }?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-3 col-lg-2 col-md-2">
                <div class="form-group">
                  <div><label for=""><?php echo l('location'); ?></label></div>
                  <div class="form-group">
                    <select name="store" class="form-control">
                      <option disabled="" selected=""><?php echo l('all'); ?></option>
                      <?php if($Location->num_rows > 0){ ?>
                      <?php $i=1;foreach($Location->rows as $val){ ?>
                      <option value="<?php echo $val['store']; ?>" <?php echo ($store==$val['location']?'selected':''); ?>><?php echo $val['location']; ?></option>
                      <?php } }?>
                    </select>
                  </div>
                </div>
              </div>
            <div class="col-1" id="search-btn">
                <div class="form-group">
                  <button class="btn btn-primary  w-100" id=" <?php /*btn-searchBoard-filter*/ ?>" type="submit">
                    <i class="fas fa-search fa-fw"></i>
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="card ">
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <div class=""><span>(<?php echo $lang['search_pageing']; ?> <b><?php echo $total_row;?></b> <?php echo $lang['row']; ?>) </span></div>
            </div>
            <div class="col-6 text-right" id="print-btn">
              <div class="form-group">
                <a class="btn btn-info" href="<?php echo $link_print; ?>" target="_blank">
                  <?php echo $lang['print'];?>  <i class="fas fa-print"></i>
                </a>
                <a class="btn btn-success" href="<?php echo $link_export; ?>" target="_blank">
                  <?php echo l('excel');?>  <i class="fas fa-excel"></i>
                </a>
              </div>
            </div>
          </div>
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
                    <th  width="100px;"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php if($ListPurchaseNumRows > 0){ ?>
                  <?php $i=1;foreach($ListPurchase as $val){ ?>
                  <tr >
                    <td style="vertical-align: top;">
                      <?php echo mb_strimwidth(strip_tags($val['po_no']),0,10,'...','utf-8'); ?>
                    </td>
                    <td style="vertical-align: top;">
                      <?php
                      $originalDate = $val['date_create'];
                      $date_create = date("Y-m-d", strtotime($originalDate));
                      echo $date_create; ?></td>
                    <td style="vertical-align: top;"><a href="#"></a><?php echo $val['name_sup']; ?></td>
                    <td style="vertical-align: top;">
                      <select name="PR_status" 
                      data-id="<?php echo $val['id']; ?>"
                      class="form-control PR_status" 
                      style="width:130px;display:inline-block;">
                        <option value="0" <?php echo ($val['status']=='0'?'selected':''); ?>>Wait recieve</option>
                        <option value="1" <?php echo ($val['status']=='1'?'selected':''); ?>>Recieved</option>
                        <option value="2" <?php echo ($val['status']=='2'?'selected':''); ?>>Problem</option>
                      </select>
                    </td>
                    <td style="vertical-align: top;">
                      <p class="text-left">Quantity: <b><?php echo $val['quantity']; ?></b></p>
                      <p class="text-left">Department: <b><?php echo $val['name_depart']; ?></b></p>
                      <p class="text-left">Location: <?php echo $val['location']; ?></p>
                      <p class="text-left">Recieved by: <b><?php echo mb_strimwidth($val['name']." ".$val['lname'],0,50,'...','utf-8'); ?></b></p>
                      <p class="text-left"><?php echo mb_strimwidth(strip_tags($val['detail']),0,150,'...','utf-8'); ?></p>
                      
                    </td>
                    <td style="vertical-align: top;"><?php echo $val['days']; ?></td>
                    <td style="vertical-align: top;">
                      <a href="<?php echo route('receive&id='.$val['id']); ?>" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                      <a type="button" data-id="<?php echo $val['id']; ?>" data-po="<?php echo $val['po_no']; ?>" class="btn btn-danger delete btn-xs" href="#"><i class="fa fa-trash"></i></a>
                    </td>
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
        <div class="text-right"><span>(จำนวนที่ค้นหา <?php echo $total_row;?> แถว) </span></div>
        <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-right">
            <?php for($i=1;$i<=$page_total;$i++){ ?>
            <li class="page-item"><a class="page-link" href="<?php echo route('purchase&page='.$i); ?>"><?php echo $i; ?></a></li>
            <?php //if($i>3){ break; }
            } ?>
            <!-- <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
            -->
          </ul>
        </div>
      </div>
    </div>
  </section>
</div>
<div class="panel panel-success d-none" id="show-panel-success">
  <p class="alert alert-success">
    บันทึกเรียบร้อยแล้ว
  </p>
</div>


<!-- delete modal -->
<div class="modal" tabindex="-1" id="confirmDel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h7><b>กรุณายืนยันการลบข้อมูล!</b></h7>
        <p>PO NO. <span id="txt-po"></span></p>
        <input type="hidden" id="idpurchase" value="">
        <div class="con-form">
          <div class="item-form">
            <button type="button" class="btn btn-danger" > ยกเลิก </button>
            <button class="btn btn-primary" link="#" id="btn-confirm-del-"> ยืนยัน </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end delete modal -->


<script type="text/javascript">
$(document).on('change','.PR_status',function(e){
  var value = $(this).val();
  var id = $(this).attr('data-id');
  console.log(value+' '+id);
  $.ajax({
    url: 'index.php?route=api/updateReceptStatus',
    type: 'POST',
    dataType: 'json',
    data: {
      value: value,
      id: id
    },
  })
  .done(function(json) {
    console.log(json);
    $('#show-panel-success').removeClass('d-none');
    console.log("success");
  })
  .fail(function(a,b,c) {
    console.log(a);
    console.log(b);
    console.log(c);
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
  
  
});
$(function () {
  $('#reservationdate').datetimepicker({
    format: 'YYYY-MM-DD'
  });


  
});
$(document).on('click','.delete',function(e){
// $('.delete').click(function(){
  $('#confirmDel').modal('show');
  // var link_id = 'index.php?route=purchase/del&id='+parseInt($(this).attr('data-id'));
  // console.log(link_id);
  $('#idpurchase').val(parseInt($(this).attr('data-id')));
  // $('#btn-confirm-del').attr('link',link_id);
  $('#txt-po').text( $(this).attr('data-po') );
});
$(document).on('click','#btn-confirm-del-',function(e){
  // alert($(this).attr('link'));
  // alert( $('#idpurchase').val() );
  window.location = 'index.php?route=purchase/del&id='+$('#idpurchase').val() ;
});
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