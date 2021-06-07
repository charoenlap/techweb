<link rel="stylesheet" href="assets/css/UserList.css">
<div class="content-wrapper d-print-none">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1>รายชื่อผู้ใช้ทั้งหมด</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
            <li class="breadcrumb-item active">รายชื่อผู้ใช้ทั้งหมด</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="content-fluid">
      <div class="card ">
        <div class="card-body">
          <form action="<?php echo $action; ?>" method="POST" >
            <div class="row search">
              <div class="col-3">
                <div class="input-group">
                  <input type="search" class="form-control" id="" name="user_code"  aria-label="btn-search" placeholder="ค้นหาด้วยID" data-toggle="tooltip" data-placement="bottom" title="ค้นหาด้วยID" value="<?php echo $user_code; ?>">
                </div>
              </div>
              <div class="col-2">
                <div class="input-group">
                  <input type="search" class="form-control" id="" name="username"  aria-label="btn-search" placeholder="ค้นหาด้วย Username" data-toggle="tooltip" data-placement="bottom" title="ค้นหาด้วย Username" value="<?php echo $username; ?>">
                </div>
              </div>
              <div class="col-4">
                <div class="input-group">
                  <input type="search" class="form-control" id=""  name="name" aria-label="btn-search" placeholder="ค้นหาด้วย ชื่อ-นามสกุล" data-toggle="tooltip" data-placement="bottom" title="ค้นหาด้วยนามสกุล" value="<?php echo $name; ?>">
                </div>
              </div>
              <div class="col-2">
                <select class="form-control">
                  <option disabled="" selected="" name="status">สถานะ</option>
                  <?php //if($Location->num_rows > 0){ ?>
                    <?php //$i=1;foreach($Location->rows as $val){ ?>
                  <option value="0" <?php echo ($status==0?'selected':'');?>>เปิด</option>
                  <option value="1" <?php echo ($status==1?'selected':'');?>>ปิด</option>
                   <?php //} }?>
                </select>
              </div>
              <div class="col-1">
                <div class="form-group">
                    <button class="btn btn-primary w-100" type="submit">
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
            <div class="col-12 text-right mb-4">
              <a href="./index.php?route=UserListAdd" class="btn btn-success add"><i class="fas fa-plus"></i> เพิ่ม</a>
            </div>
          </div>
          <table class="table table-bordered" id="table-inform" style="table-layout:fixed;">
            <thead>
                <th width="50px">
                  <input class="form-check-input" type="checkbox"  id="table-inform" onClick="toggle(this) ">
                </th>
                <th width="100px" >User Code</th>
                <th width="100px">Username</th>
                <th width="">ชื่อ-นามสกุล</th>
                <th width="">Email</th>
                <th width="100px">สถานะ</th>
                <th width="100px">วันที่สร้าง</th>
                <th width="120px"> Operation </th>
            </thead>
            <tbody role="rowgroup">
              <?php if($users->num_rows > 0){ ?>
              <?php $i=1;foreach($users->rows as $val){ ?>
              <tr  role="row" > 
                <td class="td-select"><h3 style="vertical-align: middle;">
                  <input class="form-check-input" type="checkbox" name="userid[<?php echo $val['id'] ?>]" value="<?php echo $val['id']; ?>" >
                </td>
                <td><?php echo $val['user_code']; ?></td>
                <td><a href="#"></a><?php echo $val['username']; ?></td>
                <td class="text-left"><?php echo $val['name']," ", $val['lname'] ?></td>
                 <td class="text-left"><?php echo $val['user_email']?></td>
                <td><?php echo ($val['status']==0?'เปิด':'ปิด')?></td>
                <td><span class=""><?php echo $val['date_update']; ?></span></td>
                <td class="text-center">
                    <a href="<?php echo route('UserListEdit&id='.$val['id']); ?>" class="btn btn-warning edit_user"><i class="fas fa-pencil-alt"></i></a>
                    <button id="btn-del-mobile"  data-id="<?php echo $val['id']; ?>" data-code="<?php echo $val['user_code']; ?>" class="btn btn-danger delete" >ลบ</button>
                    <button id="btn-del-desk" data-id="<?php echo $val['id']; ?>" data-code="<?php echo $val['user_code']; ?>" class="btn btn-danger delete"><i class="far fa-trash-alt"></i></button>
                </td>
              </tr>
              <?php } } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>
<div class="modal" tabindex="-1" id="confirmDel">
  <div class="modal-dialog">
    <div class="modal-content delete">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h7>กรุณายืนยันการลบข้อมูลพนักงาน</h7>
        <span id="txt-code"></span> <h7>!!</h7>
        <div>
          <input type="hidden" id="id_user" value="">
        </div>
      </div>
      <div class="modal-footer">
        <div class="con-form">
          <div class="item-form">
            <button type="button" class="btn btn-danger" id="btn-modal"> ยกเลิก </button>
            <button type="button" class="btn btn-primary" id="btn-confirm-del-"> ยืนยัน </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end delete modal -->
      
   
    
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    
  <script type="text/javascript">

//checkBOX
function toggle(source) {
  checkboxes = document.getElementsByName('check');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}

$(document).on('click','.delete',function(e){
// $('.delete').click(function(){
  $('#confirmDel').modal('show');
  // var link_id = 'index.php?route=purchase/del&id='+parseInt($(this).attr('data-id'));
  // console.log(link_id);
  $('#id_user').val(parseInt($(this).attr('data-id')));
  // $('#btn-confirm-del').attr('link',link_id);
  $('#txt-code').text( $(this).attr('data-code') );
});
$(document).on('click','#btn-confirm-del-',function(e){
  // alert($(this).attr('link'));
  // alert( $('#idpurchase').val() );
  window.location = 'index.php?route=UserList/del&id='+$('#id_user').val() ;
});


  
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
    // $('.delete').click(function(){
    // $('#confirmDel').modal('show');
    // });
    $('[data-toggle="tooltip"]').tooltip()
    $('#datepicker-end').datepicker({
            uiLibrary: 'bootstrap4'
        });

</script>

