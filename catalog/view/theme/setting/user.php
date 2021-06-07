<link rel="stylesheet" href="assets/css/settings.css">
<div class="content-wrapper">
	<div class="header"></div>
	<section class="content">
		<div class="content-fluid">
			<div class="row">
				<div class="col-11 body-content">
					<div class="card">
						<form method="POST" action="<?php echo $action ?>" id="form-setting">
							<div class="card-header">
								<div class="row">
									<div class="col-6">
										<h3 class="panel-title"><i class="fa fa-pencil"></i> การตั้งค่า </h3>
									</div>
									<div class="col-6 text-right">
										<button id="btn-save" class="btn btn-info save" style="">
											<i class="far fa-save" style="font-size: 19px;"></i></button>
									</div>
								</div>
							</div>
							<div class="card-body">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="home-tab" data-toggle="tab" href="#email" role="tab" aria-controls="home" aria-selected="true">ตั้งค่าอีเมล</a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="email" role="tabpanel" aria-labelledby="home-tab">
										<div class="card-body">
											<div class="tab-pane active" id="tab-mail">
												<fieldset>
													<legend>Mail Alerts</legend>
													<!-- <div class="form-group">
														<div class="row">
															<label class="col-xs-4 col-sm-3 col-lg-2 control-label"><span data-toggle="tooltip" title="" data-original-title="Select which features you would like to receive an alert email on when a customer uses them.">Alert Mail</span></label>
															<div class="col-xs-8 col-sm-9 col-lg-10">
																<div class="card card-body bg-light" style="height: 140px; overflow: auto;" id="box-card">
																	<div class="checkbox">
																		<label>
																			<input type='hidden' value='0' name='mail_ticket'>
																			<input type="checkbox" name="mail_ticket" value="1" <?php echo ($setting['mail_ticket']==1?'checked':'')?>>
																		Ticket                                                 </label>
																	</div>
																	<div class="checkbox">
																		<label>
																			<input type='hidden' value='0' name='mail_purchase'>
																			<input type="checkbox" name="mail_purchase" value="1"  <?php echo ($setting['mail_purchase']==1?'checked':'')?>>
																		Purchase                                                  </label>
																	</div>
																	<div class="checkbox">
																		<label>
																			<input type='hidden' value='0' name='mail_receive'>
																			<input type="checkbox" name="mail_receive" value="1" <?php echo ($setting['mail_receive']==1?'checked':'')?>>
																		Receive                                                  </label>
																	</div>
																	<div class="checkbox">
																		<label>
																			<input type='hidden' value='0' name='mail_additional'>
																			<input type="checkbox" name="mail_additional" value="1" <?php echo ($setting['mail_additional']==1?'checked':'')?>>
																		Additional                                                  </label>
																	</div>
																</div>
															</div>
														</div>
													</div> -->
													<div class="form-group">
														<div class="row">
															<label class="col-xs-4 col-sm-3 col-lg-2 control-label" for="input-mail-alert-email"><span data-toggle="tooltip" title="">Additional Alert Mail (CC)</span></label>
															<div class="col-xs-8 col-sm-9 col-lg-10">
																<textarea name="email_cc" rows="5" placeholder="Additional Alert Mail" id="input-alert-email" class="form-control"><?php echo $email_cc;?></textarea>
															</div>
														</div>
													</div>
												</fieldset>
												<button id="btn-save-mobile" class="btn btn-info save" >บันทึก       <i class="far fa-save" style="font-size: 19px;"></i></button>
											</div>
										</div>
									</div>
								</div>
								<?php if(!empty($result)){?>
									<div class="row">
										<div class="col-12">
											<p class="alert alert-success"><?php echo $result;?></p>
										</div>
									</div>
								<?php } ?>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</fieldset>
</div>
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
<?php /*<!-- submit modal -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<!-- modal --><script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script><!-- modal -->*/ ?>
<script type="text/javascript">
	$(document).on('click','#btn-modal-add-form',function(e){
		$('#form-setting').submit();
	});
$(function () {
$('[data-toggle="tooltip"]').tooltip()
});

$('.save').click(function(){
$('#confirm_settings').modal('show');
});
$('[data-toggle="tooltip"]').tooltip()

</script>