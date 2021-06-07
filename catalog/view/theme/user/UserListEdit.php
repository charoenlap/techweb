<link rel="stylesheet" href="assets/css/UserListEdit.css">
<div class="content-wrapper">
	<div class="header"></div>
	<section class="content">
		<div class="content-fluid">
			 <form class="form" action="<?php echo $action; ?>" method="POST" id="form-edit-user"  enctype="multipart/form-data">
			<div class="row">
				<div class="col-12">
					<div class="table-header" style="float: left;"><h1>User [Edit]</h1></div>
					<a href="./index.php?route=UserList#">
						<button id="btn-back" class="btn btn-secondary back " style="margin-left: auto; margin: 3% 3% 1% 0; float: right;"><i class="fas fa-backspace"></i></button>
					</a>
					<a id="btn-save" class="btn btn-info submit save" style="margin-left: auto;  margin: 3% 1% 1% 0; float: right;"><i class="far fa-save" style="font-size: 19px;"></i></a>
				</div>
				
			</div>
			<div class="row">
				<div class="col-11 body-content">
					<div class="card">
						<div class="card-header">
							<h3 class="panel-title"><i class="fa fa-pencil"></i> Edit User</h3>
						</div>
						<div class="card-body">
							
							<div class="form-group required">
									<label class="col-sm-2 control-label" for="">รหัสพนักงาน</label>
									<div class="col-sm-10">
										<input type="text" name="user_code"  placeholder="รหัสพนักงาน" id="" class="form-control" value="<?php echo $UserGET['user_code']; ?>"> 
									</div>
								</div>
								<div class="form-group required">
									<label class="col-sm-2 control-label" for="input-username">Username</label>
									<div class="col-sm-10">
										<input type="text" name="username"  placeholder="Username" id="input-username" class="form-control" value="<?php echo $UserGET['username']; ?>">
									</div>
									<input type="text" name="id" hidden="true" placeholder="Username" id="input-username" class="form-control" value="<?php echo $UserGET['id']; ?>">
								</div>
								<!-- 	<div class="form-group">
										<label class="col-sm-2 control-label" for="input-user-group">User Group</label>
										<div class="col-sm-10">
												<select name="user_group_id" id="input-user-group" class="form-control">
														
														<option selected="selected">fsoftpro</option>
														
														<option></option>
														<option></option>
												</select>
										</div>
								</div> -->
								<div class="form-group required">
									<label class="col-sm-2 control-label" for="input-firstname">First Name</label>
									<div class="col-sm-10">
										<input type="text" name="name" value="<?php echo $UserGET['name']; ?>" placeholder="First Name" id="input-firstname" class="form-control">
									</div>
								</div>
								<div class="form-group required">
									<label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
									<div class="col-sm-10">
										<input type="text" name="lname" value="<?php echo $UserGET['lname']; ?>" placeholder="Last Name" id="input-lastname" class="form-control">
									</div>
								</div>
								<div class="form-group required">
									<label class="col-sm-2 control-label" for="input-username">Email</label>
									<div class="col-sm-10">
										<input type="email" name="username" value="<?php echo $UserGET['user_email']; ?>" placeholder="email" id="input-username" class="form-control" value="">
									</div>
								</div>
								<!-- 	<div class="form-group required">
										<label class="col-sm-2 control-label" for="input-email">E-Mail</label>
										<div class="col-sm-10">
												<input type="text" name="email" value="" placeholder="E-Mail" id="input-email" class="form-control">
										</div>
								</div> -->
							<!-- 	<div class="form-group">
									<label class="col-sm-2 control-label" for="input-image">Image</label>
									<div class="col-sm-10"><a href="" id="thumb-image" data-toggle="image" class="img-thumbnail"></a>
									<input type="image" name="image" value="" id="input-image">
								</div>
							</div> -->
							<div class="form-group required">
								<label class="col-sm-2 control-label" for="input-password">Password</label>
								<div class="col-sm-10">
									<input type="text" name="password" value="<?php echo $UserGET['password']; ?>" placeholder="Password" id="input-password" class="form-control" >
								</div>
							</div>
					<!-- 		<div class="form-group required">
								<label class="col-sm-2 control-label" for="input-confirm">Confirm Password</label>
								<div class="col-sm-10">
									<input type="password" name="confirm" value="" placeholder="Confirm" id="input-confirm" class="form-control">
								</div>
							</div> -->
							<div class="form-group required">
								<label class="col-sm-2 control-label" for="input-confirm">Contact</label>
								<div class="col-sm-10">
									<input type="text" name="contact" value="<?php echo $UserGET['contact']; ?>" placeholder="Confirm" id="input-confirm" class="form-control">
								</div>
							</div>
							<!-- 	<div class="form-group">
									<label class="col-sm-2 control-label" for="input-status">Status</label>
									<div class="col-sm-10">
											<select name="status" id="input-status" class="form-control">
													<option value="0" selected="selected">Disabled</option>
													<option value="1">Enabled</option>
											</select>
									</div>
							</div> -->
						
						<button id="btn-save-mobile" class="btn btn-info save" >บันทึก       <i class="far fa-save" style="font-size: 19px;"></i></button>
					</div>
					</form>
					
					
					
				</div>
			</div>
			
			</div>                            <!-- /.card-header -->
			<!--  <div class="card-body">
				<table class="table table-bordered" id="table-inform">
					<thead>
						<tr>
							<th style="width: 10%" ><input class="form-check-input" type="checkbox"  id=""></th>
							<th style="width: 75%" >User Group</th>
							<th style="width: 15%">operation</th>
							
							
						</tr>
					</thead>
					<tbody role="rowgroup">
						
						<tr  role="row">
							<td><input class="form-check-input" type="checkbox"  value=""></td>
							<td><a href="./index.php?route=UserPermissionAdd#">Group Name</a></td>
							
							
							<td>  <button type="button" class="btn btn-info edit_user"> <i class="fas fa-pencil-alt"></i> </button> </td>
							
							
							
							
						</tr>
						
						
						
						
						
					</tbody>
				</table>
			</div>
			
			<div class="card-footer clearfix">
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
		
	
	</div>
</div>


<!-- EditUser_admin -->
<div class="modal" tabindex="-1" id="confirmEdit_user">
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
					<button type="button" class="btn btn-primary" id="btn-modal-edit-form"> ยืนยัน </button>
				</div>
			</div>
		</div>
	</div>
</div>
</div>


<!-- end-EditUser_admin -->


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


$(document).on('click','#btn-modal-edit-form',function(e){
			var form = $('#form-edit-user');
			form.submit();
		});

$(document).on('submit','#form-edit-user',function(e){

		});		

$('#btn-save').click(function(){
$('#confirmEdit_user').modal('show');
});



$('[data-toggle="tooltip"]').tooltip()
$('#datepicker-end').datepicker({
uiLibrary: 'bootstrap4'
});
</script>