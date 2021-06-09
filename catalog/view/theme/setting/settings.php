<link rel="stylesheet" href="assets/css/settings.css">
<div class="content-wrapper">
	<div class="header"></div>
	<section class="content">
		<div class="content-fluid">
			<div class="row">
				<div class="col-12">
					<div class="table-header" style="float: left; margin: 2.5% 0 0 3%;"><h1>จัดการระบบ</h1></div>
					<!-- 	<a href="./index.php?route=UserList#">
							<button id="btn-back" class="btn btn-secondary back " style="margin-left: auto; margin: 3% 3% 1% 0; float: right;"><i class="fas fa-backspace"></i></button>
					</a>
					-->					<button id="btn-save" class="btn btn-info save" style="margin-left: auto;  margin: 3% 1% 1% 0%; float: right;"><i class="far fa-save" style="font-size: 19px;"></i></button>
				</div>
				
			</div>
			<div class="row">
				<div class="col-11 body-content">
					<div class="card">
						<form method="POST" action="<?php echo $action ?>" id="form-setting">
							<ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="home-tab" data-toggle="tab" href="#email" role="tab" aria-controls="home" aria-selected="true">ตั้งค่าอีเมล</a>
								</li>
								
								<!-- <li class="nav-item">
									<a class="nav-link" id="contact-tab" data-toggle="tab" href="#FTP" role="tab" aria-controls="contact" aria-selected="false">FTP</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab" data-toggle="tab" href="#backup" role="tab" aria-controls="contact" aria-selected="false">Backup & Restore</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="profile-tab" data-toggle="tab" href="#update" role="tab" aria-controls="profile" aria-selected="false">อัปเดตระบบ</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="profile-tab" data-toggle="tab" href="#barcode" role="tab" aria-controls="profile" aria-selected="false">Barcode</a>
								</li> -->
							</ul>
							<div class="tab-content" id="myTabContent">
								<div class="card-body">
									<div class="tab-pane fade show active" id="email" role="tabpanel" aria-labelledby="home-tab">
										<div class="tab-pane active" id="tab-mail">
											<fieldset>
												<div class="form-group">
													<div class="row">
														<label class="col-xs-4 col-sm-3 col-lg-2 control-label" for="input-mail-protocol"><span data-toggle="tooltip" title="" data-original-title="Only choose 'Mail' unless your host has disabled the php mail function.">Mail Protocol</span></label>
														<div class="col-xs-8 col-sm-9 col-lg-10">
															<select name="mail_protocol" id="input-mail-protocol" class="form-control">
																<option value="465" <?php echo ($setting['mail_protocol']==465?'selected':'')?>>465</option>
																<option value="587" <?php echo ($setting['mail_protocol']==587?'selected':'')?>>587</option>
															</select>
														</div>
													</div>
													<div class="row">
														<label class="col-xs-4 col-sm-3 col-lg-2 control-label" for="input-mail-parameter"><span data-toggle="tooltip" title="" data-original-title="When using 'Mail', additional mail parameters can be added here (e.g. -f email@storeaddress.com).">Mail Parameters</span></label>
														
														
														<div class="col-xs-8 col-sm-9 col-lg-10">
															
															<input type="text" name="mail_parameters" placeholder="" id="input-mail-parameter" class="form-control"
															
															value="<?php echo $setting['mail_parameters'];?>"  >
															<?php /* echo $mail['value']; */  ?>
														</div>
													</div>
													<div class="row">
														<label class="col-xs-4 col-sm-3 col-lg-2 control-label" for="input-mail-smtp-hostname"><span data-toggle="tooltip" title="" data-original-title="Add 'tls://' or 'ssl://' prefix if security connection is required. (e.g. tls://smtp.gmail.com, ssl://smtp.gmail.com).">SMTP Hostname</span></label>
														<div class="col-xs-8 col-sm-9 col-lg-10">
															<input type="text" name="mail_hostname" value="<?php echo $setting['mail_hostname'];?>" placeholder="SMTP Hostname" id="input-mail-smtp-hostname" class="form-control">
														</div>
													</div>
													<div class="row">
														<label class="col-xs-4 col-sm-3 col-lg-2 control-label" for="input-mail-smtp-username">SMTP Username</label>
														<div class="col-xs-8 col-sm-9 col-lg-10">
															<input type="text" name="mail_username" value="<?php echo $setting['mail_username'];?>" placeholder="SMTP Username" id="input-mail-smtp-username" class="form-control">
														</div>
													</div>
													<div class="row">
														<label class="col-xs-4 col-sm-3 col-lg-2 control-label" for="input-mail-smtp-password"><span data-toggle="tooltip" title="" data-original-title="For gmail you might need to setup a application specific password here: https://security.google.com/settings/security/apppasswords.">SMTP Password</span></label>
														<div class="col-xs-8 col-sm-9 col-lg-10">
															<input type="text" name="mail_password" value="<?php echo $setting['mail_password'];?>" placeholder="SMTP Password" id="input-mail-smtp-password" class="form-control">
														</div>
													</div>
													<div class="row">
														<label class="col-xs-4 col-sm-3 col-lg-2 control-label" for="input-mail-smtp-port">SMTP Port</label>
														<div class="col-xs-8 col-sm-9 col-lg-10">
															<input type="text" name="mail_port" value="<?php echo $setting['mail_port'];?>" placeholder="SMTP Port" id="input-mail-smtp-port" class="form-control">
														</div>
													</div>
													<div class="row">
														<label class="col-xs-4 col-sm-3 col-lg-2 control-label" for="input-mail-smtp-timeout">SMTP Timeout</label>
														<div class="col-xs-8 col-sm-9 col-lg-10">
															<input type="text" name="mail_timeout" value="<?php echo $setting['mail_timeout'];?>" placeholder="SMTP Timeout" id="input-mail-smtp-timeout" class="form-control">
														</div>
													</div>
												</div>
											</fieldset>
											<fieldset>
												<hr>
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
														<label class="col-xs-4 col-sm-3 col-lg-2 control-label" for="input-mail-alert-email"><span data-toggle="tooltip" title="" data-original-title="Any additional emails you want to receive the alert email, in addition to the main store email. (comma separated).">Additional Alert Mail</span></label>
														<div class="col-xs-8 col-sm-9 col-lg-10">
															<textarea name="mail_alert_email" value="" rows="5" placeholder="Additional Alert Mail" id="input-alert-email" class="form-control"><?php echo $setting['mail_alert_email'];?></textarea>
														</div>
													</div>
												</div>
											</fieldset>
										</div>
									</div>
										<?php /* ?>
										<!-- email -->
										<!-- FTP -->
										<div class="tab-pane fade" id="FTP" role="tabpanel" aria-labelledby="profile-tab">
											<div class="form-group">
												<div class="row">
													<label class="col-xs-4 col-sm-3 col-lg-2" for="input-ftp-host">FTP Host</label>
													<div class="col-xs-8 col-sm-9 col-lg-10">
														<input type="text" name="ftp_host" value="<?php echo $setting['ftp_host'];?>" placeholder="FTP Host" id="input-ftp-host" class="form-control">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<label class="col-xs-4 col-sm-3 col-lg-2 control-label" for="input-ftp-port">FTP Port</label>
													<div class="col-xs-8 col-sm-9 col-lg-10">
														<input type="text" name="ftp_port" value="<?php echo $setting['ftp_host'];?>" placeholder="FTP Port" id="input-ftp-port" class="form-control">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<label class="col-xs-4 col-sm-3 col-lg-2 control-label" for="input-ftp-username">FTP Username</label>
													<div class="col-xs-8 col-sm-9 col-lg-10">
														<input type="text" name="ftp_username" value="<?php echo $setting['ftp_username'];?>" placeholder="FTP Username" id="input-ftp-username" class="form-control">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<label class="col-xs-4 col-sm-3 col-lg-2 control-label" for="input-ftp-password">FTP Password</label>
													<div class="col-xs-8 col-sm-9 col-lg-10">
														<input type="text" name="ftp_password" value="<?php echo $setting['ftp_password'];?>" placeholder="FTP Password" id="input-ftp-password" class="form-control">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<label class="col-xs-4 col-sm-3 col-lg-2 control-label" for="input-ftp-root"><span data-toggle="tooltip" data-html="true" title="" data-original-title="The directory your OpenCart installation is stored in. Normally 'public_html/'.">FTP Root</span></label>
													<div class="col-xs-8 col-sm-9 col-lg-10">
														<input type="text" name="ftp_root" value="<?php echo $setting['ftp_root'];?>" placeholder="FTP Root" id="input-ftp-root" class="form-control">
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<label class="col-xs-4 col-sm-3 col-lg-2 control-label">Enable FTP</label>
													<div class="col-xs-8 col-sm-9 col-lg-10">
														<label class="radio-inline">
															<input type="radio" name="ftp_status" value="1" <?php echo ($setting['ftp_status']==1?'checked':'')?>>
														Yes                                      </label>
														<label class="radio-inline">
															<input type="radio" name="ftp_status" value="0" <?php echo ($setting['ftp_status']==0?'checked':'')?>>
														No                                      </label>
													</div>
												</div>
											</div>
											<button id="btn-save-mobile" class="btn btn-info save" >บันทึก       <i class="far fa-save" style="font-size: 19px;"></i></button>
										</div>
										<!-- FTP -->
										<!-- backup&ReS -->
										<div class="tab-pane fade" id="backup" role="tabpanel" aria-labelledby="contact-tab">
											<div class="form-group">
												<div class="row">
													<label class="col-xs-4 col-sm-3 col-lg-2 control-label" for="input-import">Import</label>
													<div class="col-xs-8 col-sm-9 col-lg-10">
														<input type="file" name="restore_db" id="input-import" class="">
													</div>
												</div>
												<div class="row">
													<label class="col-xs-4 col-sm-3 col-lg-2 control-label" ></label>
													<div class="col-xs-8 col-sm-9 col-lg-10">
														<button type="button" class="btn btn-outline-warning" id="btn-import">UPLOAD   <i class="fas fa-upload"></i></button>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="row">
													<label class="col-sm-2 control-label">Export</label>
													<div class="col-sm-10">
														<div class="card card-body bg-light" style="height: 150px; overflow: auto;" id="box-card">
															<div class="checkbox">
																<label>
																	<input type="checkbox" name="backup_db" value="" checked="checked">tabel_a</label>
																</div>
																<div class="checkbox">
																	<label>
																		<input type="checkbox" name="backup_db" value="" checked="checked">tabel_b
																	</label>
																</div>
																
															</div>
															<a onclick="$(this).parent().find(':checkbox').prop('checked', true);">Select All</a> / <a onclick="$(this).parent().find(':checkbox').prop('checked', false);">Unselect All</a>
														</div>
													</div>
													<div class="row">
														<label class="col-xs-4 col-sm-3 col-lg-2 control-label" ></label>
														<div class="col-xs-8 col-sm-9 col-lg-10">
															<button type="button" class="btn btn-outline-info" id="btn-export">DOWNLOAD <i class="fas fa-download"></i></button>
														</div>
													</div>
												</div>
											</div>
											<!-- backup&ReS -->
											<!-- update -->
											<div class="tab-pane fade" id="update" role="tabpanel" aria-labelledby="profile-tab">
												<div class="form-group">
													<div class="row">
														<label class="col-xs-4 col-sm-3 col-lg-2 control-label" for="input-import">File update</label>
														<div class="col-xs-8 col-sm-9 col-lg-10">
															<input type="file" name="update_system" id="input-import" class="">
														</div>
													</div>
													<div class="row">
														<label class="col-xs-4 col-sm-3 col-lg-2 control-label" ></label>
														<div class="col-xs-8 col-sm-9 col-lg-10">
															<button type="button" class="btn btn-outline-warning" id="btn-import">UPDATE   <i class="fas fa-upload"></i></button>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<table class="table">
															<thead>
																<tr>
																	<th scope="col-1">#</th>
																	<th scope="col-3">Log file</th>
																	<th scope="col-4">Location</th>
																	<th scope="col-4">Description</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<th scope="col-1">1</th>
																	<td scope="col-3">update.log</td>
																	<td scope="col-4">/techweb/prototype/catalog/view/theme/UserList.php</td>
																	<td scope="col-4">luctus elit consectetur sit amet. In hac habitasse platea dictumst. Nam tincidunt erat velit. In non elit nisi. Duis nulla purus, lacinia convallis turpis id</td>
																</tr>
															</tbody>
														</table>
													</div>
												</div>
											</div>
											<!-- update -->
											<!-- Barcode -->
											<div class="tab-pane fade" id="barcode" role="tabpanel" aria-labelledby="profile-tab">
												<div class="form-group">
													<div class="form-group">
														<div class="row">
															<label class="col-xs-4 col-sm-3 col-lg-2 control-label" for="barcode-w"><span>ความกว้าง</span></label>
															<div class="col-xs-8 col-sm-9 col-lg-10">
																<input type="number" name="barcode-w" value="<?php echo $setting['mail_hostname'];?>" placeholder="ความกว้าง (cm)" id="input-mail-smtp-hostname" class="form-control">
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="row">
															<label class="col-xs-4 col-sm-3 col-lg-2 control-label" for="barcode-w"><span>ความยาว</span></label>
															<div class="col-xs-8 col-sm-9 col-lg-10">
																<input type="number" name="barcode-h" value="<?php echo $setting['mail_hostname'];?>" placeholder="ความยาว (cm)" id="input-mail-smtp-hostname" class="form-control">
															</div>
														</div>
														<br>
														<button id="btn-save-mobile" class="btn btn-info save" >บันทึก       <i class="far fa-save" style="font-size: 19px;"></i></button>
													</div>
												</div>
												
											</div>
											<!-- Barcode -->
										</div>
										<?php */?>
										<!-- <button id="btn-save-mobile" class="btn btn-info save" >บันทึก       <i class="far fa-save" style="font-size: 19px;"></i></button> -->
								</div>
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
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
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
								<button type="button" class="btn btn-danger" id="" data-dismiss="modal"> ยกเลิก </button>
								<button type="button" class="btn btn-primary" id="btn-modal-add-form"> ยืนยัน </button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- submit modal -->
		
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