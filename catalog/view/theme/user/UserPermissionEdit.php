<link rel="stylesheet" href="assets/css/UserPermissionEdit.css">
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Edit User Group</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit User Group</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="content-fluid">
            <div class="card ">
                <div class="card-body">
                    <form action="<?php echo $action;?>" method="POST" id="">
                        <?php if($result){ ?>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="alert alert-success"><?php echo $result;?></p>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="row mb-4">
                            <div class="col-12 text-right">
                                <button id="btn-save" class="btn btn-info save" type="submit"><i class="far fa-save"></i></button>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-5 col-lg-3 col-md-3 col-sm-3">
                                <label class="label-title">Group Name</label>
                            </div>
                            <div class="col-7 col-lg-8 col-md-8 col-sm-9">
                                <input type="text" id=""  name="" placeholder="ชื่อการจัดกลุ่ม" class="form-control" value="<?php echo $page['name']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5 col-lg-3 col-md-3 col-sm-3">
                                <label class="label-title">Access Permission</label>
                            </div>
                            <div class="col-7 col-lg-8 col-md-8 col-sm-9">
                                <div class="card card-body bg-light" style="height: 150px; overflow: auto;">
                                    <?php foreach($list_page->rows as $val){ ?>
                                    <div class="checkbox">
                                        <input type="checkbox" 
                                            id="chk_page_id_<?php echo $val['id']; ?>"
                                            name="page_id[]" 
                                            value="<?php echo $val['id']; ?>" 
                                            <?php echo (in_array($val['id'],$getPermissionListByGroupID)?'checked':''); ?>> 
                                        <label for="chk_page_id_<?php echo $val['id']; ?>"><?php echo $val['name']; ?></label>
                                    </div>
                                    <?php } ?>
                                </div>                                    <div>
                                     <!-- <a onclick="$(this).parent().find(':checkbox').prop('checked', true);">Select All</a> / <a onclick="$(this).parent().find(':checkbox').prop('checked', false);">Unselect All</a> -->
                               </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
 </div>
                
          <!-- EditUser_Permission -->
<div class="modal" tabindex="-1" id="confirmEdit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h7>ยืนยันการแก้ไขข้อมูล</h7>
            </div>
            <div class="modal-footer">
                <div class="con-form">
                    <div class="label-form">
                        <label></label>
                    </div>
                    <div class="item-form">
                        <button type="button" class="btn btn-danger" id="btn-modal"> ยกเลิก </button>
                    </div>
                    <div class="item-form" id=" btn-success">
                        <button type="button" class="btn btn-primary" id="btn-modal-add-form"> ยืนยัน </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>