<link rel="stylesheet" href="assets/css/receive.css">
<style>
	.itemDisplay {
		display:block;
	}
	.itemPrint {
		display:none;
	}
	@media print{
		.modal-dialog {
		     max-width: 100%; 
		     margin: 0px auto; 
		}
		.itemDisplay {
			display:none;
		}
		.itemPrint {
			display:block;
		}
	}

</style>
<div class="content-wrapper d-print-none">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1>#<?php echo $id; ?> / PO No.<?php  echo $receive['po_no'];   ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
            <li class="breadcrumb-item active">#<?php echo $id; ?> / PO No.<?php  echo $receive['po_no'];   ?></li>
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
        		<div class="col-6">
        			<table class="table table-bordered table-striped">
						<tr>
							<td class="topic"><label>Supplier</label></td>
							<td><?php  echo $receive['name_sup'];   ?></td>
						</tr>
						<tr>
							<td class="topic"><label>Detail</label></td>
							<td><?php  echo $receive['detail'];   ?></td>
						</tr>
						<tr>
							<td class="topic"><label>Quantity</label></td>
							<td><?php  echo $receive['quantity'];   ?></td>
						</tr>
						<tr>
							<td class="topic"><label>Purchaser</label></td>
							<td><?php  echo $receive['name'].' '. $receive['lname'];   ?></td>
						</tr>
						<tr>
							<td class="topic"><label>Department</label></td>
							<td><?php  echo $receive['name_depart'];   ?></td>
						</tr>
						<tr>
							
							<td class="topic"><label>สถานที่เก็บ</label></td>
							<td><?php  echo $receive['location'];   ?></td>
						</tr>
						<tr>
							<td class="topic"><label>วันที่รับของ</label></td>
							<td><?php  echo $receive['date_create'];   ?></td>
						</tr>
					</table>
        		</div>
        		<div class="col-6">
        			<form action="<?php echo $action; ?>" method="POST" id="form-save-receive" enctype="multipart/form-data">
        				<input type="hidden" name="id" value="<?php echo $id; ?>">
	        			<div class="row mb-4"> <!-- row in col-2-6 -->
							<div class="col-lg-3 col-md-2 col-sm-2">
								<label >ผู้รับ</label>
							</div>
							<div class="col-lg-9 col-md-10 col-sm-10">
								<select name="recipient" id="recipient" class="form-control">
									<?php foreach($User->rows as $val){?>
										<option value="<?php echo $val['id']?>" <?php echo ($receive['user_id']==$val['id']?'selected':'');?>><?php echo $val['user_code'].' '.$val['name'].' '.$val['lname'];?> </option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3 col-md-2 col-sm-2">
								<label >แผนก</label>
							</div>
							<div class="col-lg-9 col-md-10 col-sm-10">
								<div class="form-group">
									<select class="form-control select2" name="id_department" required>
										<option disabled selected>แผนก</option>
										<?php if($department->num_rows > 0){ ?>
											<?php $i=1;foreach($department->rows as $val){ ?>
											<option value="<?php echo $val['id_department']; ?>" <?php echo ($receive['department_id']==$val['id_department']?'selected':'');?>><?php echo $val['name_department']; ?></option>
											<?php } }?>
									</select>
								</div>
							</div>
						</div>
						<div class="row  mb-4">
							<div class="col-lg-3 col-md-2 col-sm-2">
								<label >วันที่</label>
							</div>
							<div class="col-lg-9 col-md-10 col-sm-10">
								<input type="text"  name="date" value="<?php echo (!empty($receive['date_create'])?$receive['date_create']:date('Y-m-d'));?>" class="form-control" disabled="" >
							</div>
						</div> <!-- END row in col-2-6 -->
						<?php if(empty($receive['file'])){ ?>
						<div class="row mb-4"> <!-- row in col-2-6 -->
							<div class="col-lg-3 col-md-2 col-sm-2">
								<label >Upload file</label>
							</div>
							<div class="col-lg-9 col-md-10 col-sm-10">
								<div class="custom-file">
									<input type="file" name="file" class="custom-file-input" id="exampleInputFile">
									<label class="custom-file-label" for="exampleInputFile">Choose file</label>
								</div>
							</div>
						</div>
						<?php }else{ ?>
							<div class="row mb-4"> <!-- row in col-2-6 -->
								<div class="col-lg-3 col-md-2 col-sm-2">
									<label >Upload file</label>
								</div>
								<div class="col-lg-9 col-md-10 col-sm-10">
									<a href="uploads/receive/<?php echo $receive['file'];?>"><?php echo $receive['file'];?></a>
								</div>
							</div>
						<?php } ?>
						<div class="row">
							<div class="col-lg-3 col-sm-4"></div>
							<div class="col-12">
								<div class="text-center">
									<?php echo $barcode_img; ?>
								</div>
								<div class="text-center">
									<?php echo $barcode_code; ?>
								</div>
							</div>
						</div>
						<div class="row btn">
							<div class="col-12 btn">
								<div class="btn-col-right">
								<button type="button" class="btn btn-danger cancel"> กลับ </button>
								<?php if(empty($receive['user_id'])){ ?>
								<button type="button" class="btn btn-primary submit" > บันทึก และพิมพ์</button>
								<?php }else{?>
								<button type="button" class="btn btn-primary " id="btn-print">พิมพ์</button>
								<?php } ?>
								</div>
							</div>
						</div>
						
					</form>
        		</div>
        	</div>
        </div>
      </div>
    </div>
  </section>
</div>


<div class="modal " tabindex="-1" id="confirmAdd">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header d-print-none">
				<h5 class="modal-title">กรุณายืนยันการทำรายการ</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body d-print-block">
				<?php foreach($layout as $val){ ?>
				<div class="itemPrint" style="position:absolute; top:<?php echo $val['l_top']; ?>px; left:<?php echo $val['l_left']; ?>px; width:<?php echo $val['l_width']; ?>px; height:<?php echo $val['l_height']; ?>px; text-align:center;">
					<div>
						<?php echo $barcode_img; ?>
					</div>
					<div>
						<?php echo $barcode_code; ?>
					</div>
				</div>
				<div class="itemDisplay">
					<div>
						<?php echo $barcode_img; ?>
					</div>
					<div>
						<?php echo $barcode_code; ?>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="modal-footer d-print-none">
				<div class="con-form">
					<div class="item-form">
						<button type="button" class="btn btn-danger" id="btn-modal" data-dismiss="modal"> กลับ </button>

						<button type="button" class="btn btn-primary" id="btn-modal-add-form"> บันทึก </button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
<div class="modal " tabindex="-1" id="print-only">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body d-print-block">
				<div>
					<?php echo $barcode_img; ?>
				</div>
				<div>
					<?php echo $barcode_code; ?>
				</div>
			</div>
		</div>
	</div>
</div>	
<!-- submit modal -->


<script>
	$(document).on('click','#btn-modal-add-form',function(e){
		$('#form-save-receive').submit();
	});
	$(document).on('click','#btn-print',function(e){
		$('#print-only').modal('show');
	});
$(document).ready(function(){
	$('.modal_edit').click(function(){
		$('#dataEdit-receive').modal('show');
	});
	$('.submit').click(function(){
		$('#confirmAdd').modal('show');
		window.print();
	});
	$('[data-toggle="tooltip"]').tooltip()
});
</script>
