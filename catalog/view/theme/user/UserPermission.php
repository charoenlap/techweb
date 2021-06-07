<link rel="stylesheet" href="assets/css/UserPermission.css">
<div class="content-wrapper">
	<div class="header"></div>
	<section class="content">
		<div class="content-fluid">
			<div class="row">
				<div class="col-12">
					<div class="table-header" style="float: left;"><h1>User Permission</h1></div>
					<!-- <button class="btn btn-danger delete " style="margin-left: auto; margin: 3% 3% 1% 0; float: right;" id="delete_lg"><i class="far fa-trash-alt"></i></button> -->
					<!-- <a href="./index.php?route=UserPermissionAdd#"></a> -->
					<!-- <button class="btn btn-info add" style="margin-left: auto;  margin: 3% 1% 1% 0; float: right;"><i class="fas fa-plus"></i></button> -->
				</div>
				
			</div>
			<!-- /.card-header -->
			<div class="card-body">
				<table class="table table-bordered" id="table-inform">
					<thead>
						<tr>
							<!-- <th style="width: 5%" ><input class="form-check-input" type="checkbox"  id=""></th> -->
							<th style="text-align: left;" >User Group</th>
							<th style="width: 30px;">operation</th>
						</tr>
					</thead>
					<tbody role="rowgroup">
						<?php foreach($permission_group_list->rows as $val){ ?>
						<tr  role="row">
							<!-- <td class="td-select"><input class="form-check-input" type="checkbox"  value=""></td> -->
							<td id="GroupName"><?php echo $val['name']; ?></td>
							<td>
								<?php if($val['name']!="Admin"){ ?>
								<button class="btn btn-danger delete " style=" float: left;" id="delete_xs"><i class="far fa-trash-alt"></i></button>
								<a href="<?php echo route('UserPermission/userPermissionEdit&id='.$val['id']);?>">  <button type="button" class="btn btn-info edit_user"> <i class="fas fa-pencil-alt"></i> </button></a> 
								<?php } ?>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
			<!-- <div class="card-footer clearfix">
				<ul class="pagination pagination-sm m-0 float-right">
					<li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
					<li class="page-item"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
				</ul>
			</div> -->
		</div>
		<!-- /.card -->
		</di?>
		
	</div>
</div>


<!-- delete modal -->
<div class="modal" tabindex="-1" id="confirmDel">
<div class="modal-dialog">
	<div class="modal-content delete">
		<div class="modal-header">
			<h5 class="modal-title"></h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<h7>กรุณายืนยันการลบข้อมูล!</h7>
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
					<button type="button" class="btn btn-primary" id="btn-modal"> ยืนยัน </button>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- end delete modal -->


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