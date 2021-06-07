<link rel="stylesheet" href="assets/css/board.css">
<div class="content-wrapper">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1><?php echo $lang['title_search']; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?php echo $lang['title_home']; ?></a></li>
              <li class="breadcrumb-item active"><?php echo $lang['title_search']; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	<section class="content">
		<div class="content-fluid">
			<div class="card ">
				<div class="card-body">
					<form action="<?php echo $link_form_search; ?>" method="POST" id="form-search">
						<div class="row ">
							<div class="col-4">
								<div class="form-group">
									<div><label for=""><?php echo $lang['title_search_detail']; ?></label></div>
									<div class="input-group" id="header-searchBoard">
										<input type="search" class="form-control " id=""  aria-label="btn-search" placeholder="<?php echo $lang['title_search_detail']; ?>" name="detail" value="<?php echo $detail; ?>">
									</div>
								</div>
							</div>
							<div class="col-3 col-lg-2 col-md-4">
								<div class="form-group">
									<div><label for=""><?php echo $lang['title_search_type']; ?></label></div>
									<div class="input-group">
										<select class="form-control" id="search-filter" name="type">
											<option value="" style="text-align: center;"><?php echo $lang['all']; ?></option>
											<?php if($Type->num_rows > 0){ ?>
											<?php $i=1;foreach($Type->rows as $val){ ?>
											<option value="<?php echo $val['type_id']; ?>" 
												<?php echo ($val['type_id']==$type?'selected':''); ?>>
												<?php echo $val['name_type']; ?>
											</option>
											<?php } } ?>
										</select>
									</div>
								</div>
							</div>
							<div class="col-3 col-lg-2 col-md-4">
								<div class="form-group">
									<div><label for=""><?php echo $lang['title_search_status']; ?></label></div>
									<div class="input-group">
										<select class="form-control" id="search-filter" name="status">
											<option value=""><?php echo $lang['all']; ?></option>
											<option value="1" <?php echo ($status=='1'?'selected':''); ?>>
												<?php echo $lang['title_status_complete']; ?></option>
											<option value="0" <?php echo ($status=='0'?'selected':''); ?>>
												<?php echo $lang['title_status_not_complete']; ?></option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-3">
								<div class="form-group">
									<div><label for=""><?php echo $lang['title_search_date_create']; ?></label></div>
									<div class="input-group ">
										<div class="input-group-prepend" id="datepicker">
											<span class="input-group-text">
												<i class="far fa-calendar-alt fo"></i>
											</span>
										</div>
										<input type="text" class="form-control float-right" id="date_range" name="date_range" value="<?php echo $date_range; ?>">
									</div>
								</div>
							</div>
							<div class="col-1 " id="search-btn">
								<div class="form-group">
									<button class="btn btn-primary w-100" id=" <?php /*btn-searchBoard-filter*/ ?>" type="submit">
										<i class="fas fa-search fa-fw"></i>
									</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="card ">
				<div class="card-body">
					<div class="row">
						<div class="col-6">
							<div class=""><span>(<?php echo $lang['search_pageing']; ?> <b><?php echo $total_row;?></b> <?php echo $lang['row']; ?>) </span></div>
						</div>
						<div class="col-6 text-right" id="print-btn">
							<div class="form-group">
								<a class="btn btn-info" href="<?php echo $link_print; ?>" target="_blank">
									<?php echo $lang['print'];?>  <i class="fas fa-print"></i>
								</a>
								<a class="btn btn-success" href="<?php echo $link_export; ?>" target="_blank">
									<?php echo l('excel');?>  <i class="fas fa-excel"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<table role="table" class="table table-hover"  id="<?php /*table-inform*/ ?>">
								<thead role="rowgroup">
									<tr role="row">
										<th style="width: 10px; content: none !important;" >
											<?php echo $lang['no'];?>
										</th>
										<th style="width: 8%">
											<?php echo $lang['type'];?>
											
										</th>
										<th >
											<?php echo $lang['detail'];?>
										</th>
										<th style="width: 15%">
											<?php echo $lang['date_start'];?>
										</th>
										<th style="width: 15%">
											<?php echo $lang['date_end'];?>
										</th>
										<th style="width: 8%">
											<?php echo $lang['overtime'];?>
										</th>
										<th style="width: 9%; text-align:center;" >
											<?php echo $lang['person_request'];?>
										</th>
										<th style="width: 10%" >
											<?php echo $lang['person_receive'];?>
										</th>
										<th style="width: 10%">
											<?php echo $lang['process'];?>
										</th>
									</tr>
								</thead>
								<tbody role="rowgroup" class="td-text">
									<?php if($listTicket_num_rows > 0){  
										$i=1;
										foreach($listTicket as $val){ ?>
										<tr role="row">
											<td role="cell" class="text-center text_xs <?php echo $val['row_status'];?> "> <?php echo ($i+($page-1)*DEFAULT_LIMIT_PAGE); ?></td>
											<td  role="cell" class="text_xs"><span class="badge <?php echo $val['class_badge']; ?>  "><?php echo $val['name']; ?></span></td>
											<td  role="cell" class="text-left text_xs"><a href="<?php echo $val['link']; ?>"><?php echo strip_tags(mb_strimwidth($val['detail'],0,60,'...','utf8')); ?></a></td>
											<td  role="cell" class="text_xs"><?php echo $val['date_start']; ?>
											<td  role="cell" class="text_xs"><?php echo $val['date_end']; ?>
											<td  role="cell" class="text_xs">
												<?php if($val['days']==0){ ?>
													<span class="badge">เกินกำหนด</span>
												<?php } ?>
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
							<div class="card-footer clearfix">
								<ul class="pagination pagination-sm m-0 float-right">
									<?php for($i=1;$i<=$page_total;$i++){ ?>
									<li class="page-item"><a class="page-link" href="<?php echo route('board&page='.$i); ?>"><?php echo $i; ?></a></li>
									<?php //if($i>3){ break; }
									} ?>
									<!-- <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
									<li class="page-item"><a class="page-link" href="#">1</a></li>
									<li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
									-->
								</ul>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</span>



<!-- <style>
/*desktop*/



    @media screen and (max-width: 768px) {
    /* Force table to not be like tables anymore */
    table, thead, tbody, th, td, tr {
    display: block;
    }
    /* Hide table headers (but not display: none;, for accessibility) */
    thead tr {
    position: absolute;
    top: -9999px;
    left: -9999px;


    }
    tr {
    margin: 0 0 1rem 0;
   border: 1px solid #9e9e9e !important;

    }
    
    tr:nth-child(odd) {
    background: #fff;
    

    } 
    
    td {
    /* Behave  like a "row" */
    border: none;
    border-bottom: 1px solid #fff;
    position: relative;
    padding-left: 50%;

    }
    td:before {
    /* Now like a table header */
    position: absolute;
    /* Top/left values mimic padding */
    
    left: 6px;
    vertical-align: middle;
    padding-right: 10px;
    white-space: nowrap;

    }
    /*
    Label the data
    You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
    */
  td:nth-of-type(1):before { content: "no."; }
  td:nth-of-type(2):before { content: "ประเภท"; }
  td:nth-of-type(3):before { content: "รายละเอียด"; }
  td:nth-of-type(4):before { content: "วันที่เริ่ม"; }
  td:nth-of-type(5):before { content: "ผู้ร้องขอ"; }
  td:nth-of-type(6):before { content: "ผู้รับเรื่อง"; }
  td:nth-of-type(7):before { content: "ดำเนินการ(วัน)"; }



  .text-left{
  	text-align: right !important;
  }
    
    td  {
   
    text-align: right !important;
    }
    
    #header-searchBoard {
    display: flex;
    width: 100%;
    
    
    }
   #search-filter{
    display: flex;
    /*width: 6rem;*/
    text-align: center;
    font-size: 14px;
}
}
}
  }
    .fas.fa-filter{
    margin-top: 5px;
    margin-left: 5px;
    padding-right: 5px;
    }
    #btn-searchBoard-filter{
    margin-left: 3px;
    }
    .col-lg-5.col-sm-8 {
    display: inline-flex;
    }
    .label-filter {
    vertical-align: middle;
    }
    }
    </style>
 -->


<script type="text/javascript">
	$(function () {
		$('#date_range').daterangepicker({
			locale: {
		      format: 'YYYY-MM-DD'
		    }
		});
	});
</script>