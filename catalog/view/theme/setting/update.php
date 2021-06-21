<link rel="stylesheet" href="assets/css/settings.css">
<div class="content-wrapper">
	<div class="header"></div>
	<section class="content">
		<div class="content-fluid">
			<div class="row">
				<div class="col-12">
					<div class="table-header" style="float: left; margin: 2.5% 0 0 3%;"><h1>System Update</h1></div>
					<button id="btn-save" class="btn btn-info save" style="margin-left: auto;  margin: 3% 1% 1% 0%; float: right;"><i class="far fa-save" style="font-size: 19px;"></i> Update</button>
				</div>
				
			</div>
			<div class="row">
				<div class="col-11 body-content">
					<div class="card">
						<form method="POST" action="<?php echo $action ?>" id="form-setting" enctype="multipart/form-data">
							<div class="card-body">
								<fieldset>
									<div class="form-group">
										<div class="row">
											<div class="col-xs-12">
												<h5>Resule panel update</h5>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12">
												<div id="panel_result" class="text-success"></div>
											</div>
										</div>
										<div class="row">
											<label class="col-xs-4 col-sm-3 col-lg-2 control-label" for="input-mail-protocol"><span data-toggle="tooltip" title="" data-original-title="">Version</span></label>
											<div class="col-xs-8 col-sm-9 col-lg-10">
												<span>V. </span><span id="version"></span>
											</div>
										</div>
										<!-- <div class="row">
											<label class="col-xs-4 col-sm-3 col-lg-2 control-label" for="input-mail-protocol"><span data-toggle="tooltip" title="" data-original-title="">URL Download</span></label>
											<div class="col-xs-8 col-sm-9 col-lg-10">
												<input type="text" class="form-control">
											</div>
										</div> -->
										<div class="row">
											<label class="col-xs-4 col-sm-3 col-lg-2 control-label" for="input-mail-protocol"><span data-toggle="tooltip" title="" data-original-title="">Upload</span></label>
											<div class="col-xs-8 col-sm-9 col-lg-10">
												<input type="file" >
											</div>
										</div>
										<div class="row">
											<label class="col-xs-4 col-sm-3 col-lg-2 control-label">Status</span></label>
											<div class="col-xs-8 col-sm-9 col-lg-10">
												<div class="panel"></div>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
		<!-- submit modal -->
		<div class="modal" tabindex="-1" id="confirm_settings">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title"></h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<h7>ยืนยันการตั้งค่า</h7>
					</div>
					<div class="modal-footer">
						<div class="con-form">
							<div class="label-form">
								<label></label>
							</div>
							<div class="item-form">
								<button type="button" class="btn btn-danger" id="btn-modal"> ยกเลิก </button>
								<button type="button" class="btn btn-primary" id="btn-modal-add-form"> ยืนยัน </button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).on('click','#btn-modal-add-form',function(e){
				$.ajax({
					url: 'git.php',
					type: 'GET',
					// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
					data: {type: 'pull'},
				})
				.done(function(html) {
					$('#panel_result').html(html);
					console.log("success");
				})
				.fail(function() {
					console.log("error");
				})
				.always(function() {
					console.log("complete");
				});
				$('#confirm_settings').modal('hide');
				// $('#form-setting').submit();
			});
		$(function () {
		$('[data-toggle="tooltip"]').tooltip()
		});
		
		$('.save').click(function(){
		$('#confirm_settings').modal('show');
		});
		$('[data-toggle="tooltip"]').tooltip()
		
		</script>