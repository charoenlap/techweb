<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
		<table>
			<tr>
				<td><?php echo l('no');?></td>
				<td><?php echo l('type');?></td>
				<td><?php echo l('detail');?></td>
				<td><?php echo l('date_start');?></td>
				<td><?php echo l('overtime');?></td>
				<td><?php echo l('person_request');?></td>
				<td><?php echo l('person_receive');?></td>
				<td><?php echo l('process');?></td>
			</tr>
			<?php if($listTicket_num_rows > 0){  
				$i=1;
				foreach($listTicket as $val){ ?>
				<tr>
					<td> <?php echo ($i+($page-1)*DEFAULT_LIMIT_PAGE); ?></td>
					<td><?php echo $val['name']; ?></td>
					<td><?php echo strip_tags(mb_strimwidth($val['detail'],0,60,'...','utf8')); ?></td>
					<td><?php echo $val['date_start']; ?>
					<td><?php echo $val['date_end']; ?>
					<td><?php if($val['days']==0){ ?>เกินกำหนด<?php } ?></td>
					<td><?php echo $val['request']; ?></td>
					<td><?php echo $val['recieve']; ?></td>
					<td><?php echo $val['days']; ?></td>
				</tr>
				<?php $i++;} ?>
			<?php }else{?>
			<tr>
				<td>ไม่พบข้อมูล</td>
			</tr>
			<?php } ?>
		</table>
	</body>
</html>

