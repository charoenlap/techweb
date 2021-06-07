<link rel="stylesheet" href="assets/css/UserPermissionAdd.css">
<div class="content-wrapper">
    <div class="header"></div>
    <section class="content">
        <div class="content-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="table-header" style="float: left;"><h1>User Permission [ADD]</h1></div>
                    <a href="./index.php?route=UserPermission#">
                        <button id="btn-back" class="btn btn-secondary back " style="margin-left: auto; margin: 3% 3% 1% 0; float: right;"><i class="fas fa-backspace"></i></button>
                    </a>
                    <button id="btn-save" class="btn btn-info save" type="submit" style="margin-left: auto;  margin: 3% 1% 1% 0; float: right;"><i class="far fa-save" style="font-size: 19px;"></i></button>
                </div>
                
            </div>
            <div class="row">
                <div class="col-11 body-content">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="panel-title"><i class="fa fa-pencil"></i> Add User Group</h3>
                        </div>
                        <div class="list-group card-body">
                            
                            <div class="row">
                                <div class="col-5 col-lg-3 col-md-3 col-sm-3">
                                    <label class="label-title">Group Name</label>
                                </div>
                                <div class="col-7 col-lg-8 col-md-8 col-sm-9">
                                    <input type="text" id=""  name="" placeholder="ชื่อการจัดกลุ่ม" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="list-group card-body">
                            <div class="row">
                                <div class="col-5 col-lg-3 col-md-3 col-sm-3">
                                    <label class="label-title">Access Permission</label>
                                </div>
                                <div class="col-7 col-lg-8 col-md-8 col-sm-9">
                                    <div class="card card-body bg-light" style="height: 150px; overflow: auto;">
                                        <div class="checkbox">
                                            
                                            <input type="checkbox" name="" value="catalog/attribute">
                                            select 1
                                        </div>
                                        <div class="checkbox">
                                            
                                            <input type="checkbox" name="" value="catalog/attribute_group">
                                            select 2
                                        </div>
                                    </div>                                    <div>
                                    <a onclick="$(this).parent().find(':checkbox').prop('checked', true);">Select All</a> / <a onclick="$(this).parent().find(':checkbox').prop('checked', false);">Unselect All</a>
                                </div>
                            </div>
                        </div>
                        <button id="btn-save-mobile" class="btn btn-info save" style="margin-left: auto;  margin: 3% 1% 1% 0; float: right;">บันทึก   <i class="far fa-save" style="font-size: 19px;"></i></button>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<!-- AddUserPermission -->
<div class="modal" tabindex="-1" id="confirmAdd">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h7>ยืนยันการเพิ่มสมาชิก</h7>
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
</div>


<!-- AddUserPermission -->
        
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<!-- modal --><script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script><!-- modal -->


<script type="text/javascript">

$(function () {
$('[data-toggle="tooltip"]').tooltip()
});

$('.save').click(function(){
$('#confirmAdd').modal('show');
});
// $('.delete').click(function(){
// $('#confirmDel').modal('show');
// });
$('[data-toggle="tooltip"]').tooltip()

</script>