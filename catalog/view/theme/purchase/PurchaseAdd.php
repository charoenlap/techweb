<link rel="stylesheet" href="assets/css/purchase_add.css">
<div class="content-wrapper">
	<section class="content">
		<div class="content-fluid pt-4">
			<div class="card ">
	        	<div class="card-header"><h4><?php echo l('title_home'); ?></h4></div>
	        	<div class="card-body">
	        		<div class="row">
						<div class="col-2">
							  <form class="form" action="<?php echo $action; ?>" method="POST" id="form-add-purchase"  enctype="multipart/form-data">
							<label ><?php echo l('po'); ?></label>
						</div>
						<div class="col-10">
							<input type="text"  name="po_no" placeholder="<?php echo l('po'); ?>" value="">
						</div>
					</div>
					<div class="row">
						<div class="col-2">
							<label ><?php echo l('supplier'); ?></label>
						</div>
						<div class="col-10">
							<input type="text"  name="name_sup" placeholder="<?php echo l('supplier'); ?>" value="">
						</div>
					</div>
					<div class="row">
						<div class="col-2">
							<label><?php echo l('detail'); ?></label>
						</div>
						<div class="col-10">
							<textarea id="summernote" placeholder="<?php echo l('detail'); ?>" class="summernote-board" value="" name="detail"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-2">
							<label ><?php echo l('quantity'); ?></label>
						</div>
						<div class="col-10">
							<input type="number" class="form-control" name="quantity" placeholder="<?php echo l('quantity'); ?>" value="">
						</div>
					</div>
					<div class="row">
						<div class="col-2">
							<label ><?php echo l('purchaser'); ?></label>
						</div>
						<div class="col-10">
							<input type="text"  name="purchaser" 
							placeholder="<?php echo l('purchaser'); ?>" 
							disabled="" value="<?php echo $purchaser ?>">
						</div>
					</div>
					<div class="row">
						<div class="col-2">
							<label ><?php echo l('branch'); ?></label>
						</div>
						<div class="col-10">
							<select id="type" name="name_depart">
								<option value="" disabled selected><?php echo l('branch'); ?></option>
								<?php if($department->num_rows > 0){ ?>
								<?php $i=1;foreach($department->rows as $val){ ?>
								<option value=" <?php echo $val['id_department']; ?> "><?php echo $val['name_department']; ?></option>
								<?php } }?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-2">
							<label ><?php echo l('store'); ?></label>
						</div>
						<div class="col-10">
							<select name="location">
								<option value="" disabled selected>Store</option>
								<?php if($Location->num_rows > 0){ ?>
								<?php $i=1;foreach($Location->rows as $val){ ?>
								<option value=" <?php echo $val['id']; ?> "><?php echo $val['location']; ?></option>
								<?php } }?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-12 text-right">
							<button type="button" class="btn btn-danger cancel"><?php echo l('cancle'); ?></button>
							
							
							<button type="button" class="btn btn-primary submit" ><?php echo l('submit'); ?></button>
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- submit purchase -->
<div class="modal" tabindex="-1" id="Addpurchase">
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title"></h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<h7>กรุณายืนยันการเพิ่มรายการ</h7>
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
					<button type="button" class="btn btn-primary" id="btn-modal-add-pur"> ยืนยัน </button>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- submit purchesa -->


<script>
	$(document).on('click','#btn-modal-add-pur',function(e){
    			var form = $('#form-add-purchase');
    			form.submit();
    		});
$(document).ready(function() {
	$('#summernote').summernote({
		height: 70,                 // set editor height
		minHeight: null,             // set minimum height of editor
		maxHeight: null,             // set maximum height of editor
		focus: true                  // set focus to editable area after initializing summernote
	});
	$('.submit').click(function(){
		$('#Addpurchase').modal('show');
	});
});
</script>