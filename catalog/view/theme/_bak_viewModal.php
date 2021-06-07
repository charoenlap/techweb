

<?php 
	<div class="content-wrapper">
		<div class="container-fluid">
			<div class="modal" tabindex="-1" id="dataEdit-receive">
				<div class="modal-dialog">
					<div class="modal-content receive">
						<div class="modal-header">
							<h5 class="modal-title">แก้ไขรายการ PO.</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body receive">
							<div class="row dataEdit-receive">
								<div class="col-12">
									<div class="row">
										<div class="col-4 col-lg-2 col-md-2 col-sm-2">
											<label >PO. no.</label>
										</div>
										<div class="col-11 col-lg-10 col-md-10 col-sm-8">
											<input type="text"  name="PO_Number" placeholder="เลข PO" class="form-control rc">
										</div>
									</div>
									<div class="row">
										<div class="col-4 col-lg-2 col-md-2 col-sm-2">
											<label >Supplier</label>
										</div>
										<div class="col-11 col-lg-10 col-md-10 col-sm-8">
											<input type="text"  name="Supplier_name" placeholder="Supplier" class="form-control rc">
										</div>
									</div>
									<div class="row">
										<div class="col-4 col-lg-2 col-md-2 col-sm-2">
											<label>รายละเอียด</label>
										</div>
										<div class="col-11 col-lg-10 col-md-10 col-sm-8">
											<div id="summernote" placeholder="กรอกรายละเอียด" class="form-control" style="position: relative;"></div>
										</div>
									</div>
									<div class="row">
										<div class="col-4 col-lg-2 col-md-2 col-sm-2">
											<label >จำนวน</label>
										</div>
										<div class="col-11 col-lg-10 col-md-10 col-sm-8">
											<input type="text"  name="Quantity" placeholder="จำนวน" class="form-control">
										</div>
									</div>
									<div class="row">
										<div class="col-4 col-lg-2 col-md-2 col-sm-2">
											<label >ผู้สั่งซื้อ</label>
										</div>
										<div class="col-11 col-lg-10 col-md-10 col-sm-8">
											<input type="text"  name="Purchaser" placeholder="username" disabled="" class="form-control">
										</div>
									</div>
									<div class="row">
										<div class="col-4 col-lg-2 col-md-2 col-sm-2">
											<label >แผนก</label>
										</div>
										<div class="col-11 col-lg-10 col-md-10 col-sm-8">
											<select id="type" name="type" class="form-control">
												<option value="" disabled selected>แผนก</option>
												<option>QGM</option>
												<option>TBM</option>
												<option>EP</option>
												<option>GQP</option>
												<option>TCMP</option>
											</select>
										</div>
									</div>
									
									<div class="row">
										<div class="col-4 col-lg-2 col-md-2 col-sm-2">
											<label >ที่จัดเก็บ</label>
										</div>
										<div class="col-11 col-lg-10 col-md-10 col-sm-8">
											<select class="form-control">
												<option value="" disabled selected>Store</option>
												<option value="">store1</option>
												<option value="">store2</option>
												<option value="">store3</option>
											</select>
										</div>
									</div>
									
									
								</div>
								<!-- หมายเหตุ -->
							</div>
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
									<button type="button" class="btn btn-primary " id="btn-modal"> แก้ไข </button>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
 ?>