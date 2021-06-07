  <link href="assets/css/addboard.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h1><?php echo l('petition_create'); ?></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"><?php echo l('home'); ?></a></li>
                <li class="breadcrumb-item"><a href="<?php echo route('board'); ?>"><?php echo l('petition'); ?></a></li>
                <li class="breadcrumb-item active"><?php echo l('petition_create'); ?></li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <section class="content">
        <div class="content-fluid">
          <div class="card ">
            <div class="card-body">
              <div class="row page">
                <div class="col-lg-9 col-sm-12">
                  <form class="form" action="<?php echo $action; ?>" method="POST" id="form-add-request"  enctype="multipart/form-data">
                    <div class="row mb-2">
                      <div class="col-lg-2 col-md-2 col-sm-2">
                        <label ><?php echo l('type'); ?></label>
                      </div>
                      <div class="col-lg-10 col-md-10 col-sm-10">
                        <select name="type_id" class="form-control">
                          <?php if($Type->num_rows > 0){ ?>
                          <?php $i=1;foreach($Type->rows as $val){ ?>
                          <option value="<?php echo $val['type_id'] ?>"><?php echo $val['name_type']; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col col-lg-2 col-md-2 col-sm-2">
                        <label ><?php echo l('person_request');?></label>
                      </div>
                      <div class="col col-lg-10 col-md-10 col-sm-12">
                        <input type="text"  name="user_request_id" placeholder="<?php echo l('person_request');?>" disabled="" value="<?php echo $request_name;?>"  class="form-control">
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col col-lg-2 col-md-2 col-sm-2">
                        <label><?php echo l('detail');?></label>
                      </div>
                      <div class="col col-lg-10 col-md-10 col-sm-12">
                        <textarea id="summernote" placeholder="<?php echo l('detail');?>" class="summernote-board " name="detail" value="detail"></textarea>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col col-lg-2 col-md-2 col-sm-2">
                        <label ><?php echo l('person_receive');?></label>
                      </div>
                      <div class="col col-lg-10 col-md-10 col-sm-12 ">
                        <select name="user_receive_id" required  class="form-control">
                            <?php if($User->num_rows > 0){ ?>
                                <?php $i=1;foreach($User->rows as $val){ if($request_id==$val['user_id']){ continue; }?>
                                <option value="<?php echo $val['user_id'] ?>"><?php echo $val['name']; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col col-lg-2 col-md-2 col-sm-2">
                        <label ><?php echo l('date_end'); ?></label>
                      </div>
                      <div class="col col-lg-10 col-md-10 col-sm-12">
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="date_end" placeholder="YYYY-mm-dd">
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-2" >
                      <div class="col col-lg-2 col-md-2 col-sm-2" >
                        <label ><?php echo l('file'); ?></label>
                      </div>
                      <div class="col col-lg-10 col-md-10 col-sm-10">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile form-input" name="file" value="file" style="padding: 12px;">
                          <h6 class="custom-file-label" for="exampleInputFile"><?php echo l('file'); ?></h6>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-2" id="row-btn">
                      <div class="col col-lg-12 col-md-12 col-sm-12 text-center">
                         <span type="button" class="btn btn-primary submit " id="btn-form-summit"> <?php echo l('send'); ?> </span>
                         <div id="btn-form-cancel"><h1 > &nbsp;  </h1></div>
                        <a href="<?php echo route('board'); ?>" class="btn btn-danger cancel"  id="btn-form-cancel"> <?php echo l('cancle'); ?> </a>
                       
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-12 col-lg-3 col-sm-12 col-md-12" id="mean-column">
                  <div class="row mean">
                    <div class="card mean">
                      <div class="card-header">
                        <?php echo l('status'); ?>
                      </div>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">NEW : </li>
                        <li class="list-group-item">MODIFY : </li>
                        <li class="list-group-item">CANCEL : </li>
                        <li class="list-group-item">PROBLEM : </li>
                        <li class="list-group-item">QUALITY COMPLAIN : </li>
                        <li class="list-group-item">STOCK OUT : </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php //include 'viewModal.php'?>
        </div>
      </section>
    </div>
    <div class="modal" tabindex="-1" id="confirmAdd">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><?php echo l('petition_create'); ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <!-- <div class="modal-body">
          </div> -->
          <div class="modal-footer">
            <div class="con-form">
              <!-- <div class="label-form">
                <label></label>
              </div> -->
              <div class="item-form">
                <button type="button" class="btn btn-danger" id="btn-modal" data-dismiss="modal"><?php echo l('cancle'); ?></button>
              </div>
              <div class="item-form" id="btn-success">
                <button type="button" class="btn btn-primary" id="btn-modal-add-form"><?php echo l('confirm'); ?></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

        <script>
          $('#reservationdate').datetimepicker({
              format: 'YYYY-MM-DD'
          });
        $(document).on('click','#btn-modal-add-form',function(e){
    			var form = $('#form-add-request');
    			form.submit();
    		});
        $(document).ready(function() {
          $('#summernote').summernote({
            height: 200,
                            // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true ,                 // set focus to editable area after initializing summernote
            });
            $('.submit').click(function(){
            $('#confirmAdd').modal('show');
          });
        });
        </script>
      