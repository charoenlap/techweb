<link rel="stylesheet" href="assets/css/boardDetail.css">
<div class="content-wrapper">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>ข้อมูลการร้องขอลำดับที่ #NO. <?php echo $detail['id']; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item">ค้นหารายการคำร้อง</li>
              <li class="breadcrumb-item active">ข้อมูลการร้องขอลำดับที่ #NO. <?php echo $detail['id']; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	<section class="content">
		<div class="container-fluid">
			<div class="card">
				<!-- <div class="card-header">
					<div class="card-title"> <h2> ข้อมูลการร้องขอลำดับที่ #NO. <?php echo $detail['id']; ?></h2></div>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
						<i class="fas fa-minus"></i>
						</button>
					</div>
				</div> -->
				<div class="card-body">
					<div class="row">
						<div class="col-4 col-lg-2 col-md-3 col-sm-3">
							<label> วันที่ร้องขอ </label>
						</div>
						<div class="col-8 col-lg-10 col-md-9 col-sm-9">
							<label><?php echo $detail['date_start']; ?></label>
						</div>
					</div>
					<div class="row">
						<div class="col-4 col-lg-2 col-md-3 col-sm-3">
							
							<label> ประเภท </label>
							
						</div>
						<div class="col-8 col-lg-10 col-md-9 col-sm-9">
							
							<label><?php echo $detail['name']; ?></label>
							
						</div>
						
					</div>
					<div class="row">
						<div class="col-4 col-lg-2 col-md-3 col-sm-3">
							<label> ผู้ร้องขอ </label>
						</div>
						<div class="col-8 col-lg-10 col-md-9 col-sm-9">
							<label><?php echo $detail['receive_name'].' '.$detail['receive_lname']; ?></label>
						</div>
					</div>
					<div class="row">
						
						<div class="col-4 col-lg-2 col-md-3 col-sm-3">
							<label> รายละเอียด </label>
						</div>
						<div class="col-8 col-lg-10 col-md-9 col-sm-9">
							<div>
								<?php echo $detail['detail'];?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-4 col-lg-2 col-md-3 col-sm-3">
							<label> ผู้รับเรื่องต่อ </label>
						</div>
						<div class="col-8 col-lg-10 col-md-9 col-sm-9">
							<label><?php echo $detail['request_name'].' '.$detail['request_lname']; ?></label>
						</div>
						
					</div>
				</div>
				<?php if(!empty($detail['files'])){ ?>
				<div class="card-footer">
					<div class="row">
						<div class="col-8 col-lg-10 col-md-9 col-sm-9">
							<i class="ion ion-paperclip">  </i>
							<a href="uploads/ticket_file/<?php echo $detail['files']; ?>" target="_blank" >
								<?php echo $detail['files']; ?>
							</a>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<div>
				<h1>ข้อมูลการดำเนินการ</h1>
			</div>
			<?php foreach($sub_detail as $val){ ?>
			<div class="card">
				<div class="card-body secon">
					<div class="row">
						<div class="col-4 col-lg-2 col-md-3 col-sm-3">
							<label> ผู้ส่ง </label>
						</div>
						<div class="col-8 col-lg-10 col-md-9 col-sm-9">
							<label><?php echo $val['receive_name'].' '.$val['receive_lname']; ?></label>
						</div>
					</div>
					
					<div class="row">
						<div class="col-4 col-lg-2 col-md-3 col-sm-3">
							<label> รายละเอียด </label>
						</div>
						<div class="col-8 col-lg-10 col-md-9 col-sm-9">
							<?php echo $val['detail']; ?>
						</div>
					</div>
					<div class="row">
						<div class="col-4 col-lg-2 col-md-3 col-sm-3">
							<label> วันที่ทำรายการ </label>
						</div>
						<div class="col-8 col-lg-10 col-md-9 col-sm-9">
							<label><?php echo $val['date_create']; ?></label>
						</div>
					</div>
					<div class="row">
						<div class="col-4 col-lg-2 col-md-3 col-sm-3">
							<label> ส่งต่อถึง </label>
						</div>
						<div class="col-8 col-lg-10 col-md-9 col-sm-9">
							<label><?php echo $val['receive_name'].' '.$val['receive_lname']; ?></label>
						</div>
					</div>
				</div>
				<?php if(!empty($val['files'])){ ?>
				<div class="card-footer">
					<div class="row">
						<div class="col-8 col-lg-10 col-md-9 col-sm-9">
							<i class="ion ion-paperclip">  </i>
							<a href="uploads/ticket_file/<?php echo $val['files']; ?>" target="_blank">
								<?php echo $val['files']; ?>
							</a>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<?php } ?>
			<div class="card">
				<div class="card-header reply">
					<div class="card-title"><h2>ตอบกลับคำร้องขอ</h2></div>
				</div>
				<div class="form">
					<form action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="job_id" value="<?php echo $id; ?>">
						<div class="card-body reply">
							<div class="row mb-2">
								<div class="col-4 col-lg-2 col-md-3 col-sm-3">
									<label >ผู้ส่ง</label>
								</div>
								<div class="col-8 col-lg-10 col-md-9 col-sm-9">
									<?php echo $username; ?>
								</div>
							</div>
							<div class="row mb-2">
								<div class="col-4 col-lg-2 col-md-3 col-sm-3">
									<label>รายละเอียด</label>
								</div>
								<div class="col-8 col-lg-10 col-md-9 col-sm-9">
									<textarea id="summernote" placeholder="กรอกรายละเอียด" name="detail"></textarea>
								</div>
							</div>
							<div class="row mb-2">
								<div class="col-4 col-lg-2 col-md-3 col-sm-3">
									<label for="exampleInputFile">ผู้รับเรื่องต่อ</label>
								</div>
								<div class="col-8 col-lg-10 col-md-9 col-sm-9">
									<select class="form-control" name="user_receive_id">
										<?php foreach($User->rows as $val){ ?>
										<option value="<?php echo $val['id'];?>"><?php echo $val['user_code'].' '.$val['name']; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="row mb-2">
								<div class="col-4 col-lg-2 col-md-3 col-sm-3">
									<label> Upload</label>
								</div>
								<div class="col-8 col-lg-10 col-md-9 col-sm-9">
									<input type="file" name="file" placeholder="upload">
								</div>
							</div>
							<div class="row mb-2">
								<div class="col-4 col-lg-2 col-md-3 col-sm-3">
									<label> </label> 
								</div>
								<div class="col-8 col-lg-10 col-md-9 col-sm-9">
									<input type="radio" id="customRadio1" name="status_job"  value="0" <?php echo ($detail['status']==0?'checked':''); ?>>
									<label for="customRadio1">อัปเดตความคืบหน้า</label>

									<input type="radio" id="customRadio2" name="status_job" value="1" <?php echo ($detail['status']==1?'checked':''); ?>>
									<label for="customRadio2">งานเสร็จสิ้นแล้ว</label>
								</div>
							</div>
						</div>
						<div class="card-footer reply">
							<button type="submit" class="btn submit">ส่งต่องาน</button>
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</section>
</div>

<script>			
	$(document).ready(function() {
		$('#summernote').summernote({
			
			height: 140,                 // set editor height
					minHeight: null,             // set minimum height of editor
					maxHeight: null,             // set maximum height of editor
					focus: true                  // set focus to editable area after initializing summernote
		});
		$('.submit').click(function(){
			$('#confirmAdd').modal('show');
		});
	});
</script>