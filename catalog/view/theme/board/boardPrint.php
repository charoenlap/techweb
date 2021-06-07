<link rel="stylesheet" href="assets/css/board.css">
<div class="content-wrapper">
	<section class="content">
		<div class="content-fluid">
			<div class="card ">
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<table role="table" class="table table-hover">
								<thead role="rowgroup">
									<tr role="row">
										<th role="columnheader" style="width: 10px; content: none !important;" >
											<?php echo $lang['no'];?></th>
										<th role="columnheader" style="width: 8%"><?php echo $lang['type'];?></th>
										<th role="columnheader" ><?php echo $lang['detail'];?></th>
										<th role="columnheader" style="width: 15%"><?php echo $lang['date_start'];?></th>
										<th role="columnheader" style="width: 8%"><?php echo $lang['overtime'];?></th>
										<?php /*<th role="columnheader" style="width: 10%">สถานะ</th>*/ ?>
										<th role="columnheader" style="width: 9%; text-align:center;" ><?php echo $lang['person_request'];?></th>
										<th role="columnheader" style="width: 10%" ><?php echo $lang['person_receive'];?></th>
										<th role="columnheader" style="width: 10%">
											<!-- <i class="ion ion-ios-timer-outline"></i>  -->
											<?php echo $lang['process'];?>
										</th>
									</tr>
								</thead>
								<tbody role="rowgroup" class="td-text">
									<?php if($listTicket_num_rows > 0){  
										$i=1;
										foreach($listTicket as $val){ ?>
										<tr role="row">
											<td role="cell" class="text-center text_xs <?php echo $val['row_status'];?> ">
												<?php echo ($i+($page-1)*DEFAULT_LIMIT_PAGE); ?></td>
											<td  role="cell" class="text_xs"><span class="badge <?php echo $val['class_badge']; ?>  "><?php echo $val['name']; ?></span></td>
											<td  role="cell" class="text-left text_xs"><a href="<?php echo $val['link']; ?>"><?php echo strip_tags(mb_strimwidth($val['detail'],0,60,'...','utf8')); ?></a></td>
											<td  role="cell" class="text_xs"><?php echo $val['date_start']; ?>
											<td  role="cell" class="text_xs">
												<span class="badge">เกินกำหนด</span>
											</td>
											<?php /*
											<td role="cell">
												<span class="badge <?php echo $val['status_class']; ?>">
													<?php echo $val['status_text']; ?>
												</span>
											</td>
											*/ ?>
											<td  role="cell" class="text_xs"><?php echo $val['request']; ?></td>
											<td  role="cell" class="text_xs"><?php echo $val['recieve']; ?></td>
											<td  role="cell" class="text_xs"><span class="badge <?php echo $val['status_class']; ?>"><?php echo $val['days']; ?></span>
											</td>
										</tr>
										<?php $i++;} ?>
									<?php }else{?>
									<tr>
										<td colspan="10">ไม่พบข้อมูล</td>
									</tr>
									<?php } ?>
												
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</span>

