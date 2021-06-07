	<link rel="stylesheet" type="text/css" href="assets/js/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css">
	<style>
		#content_layout{ border:2px solid #666; height:1280px; border-radius: 5px; position:relative; padding: 0px; width:1000px; margin:0 auto; float:none; }
		.item{ border-radius: 2px; background-color:rgba(55, 154, 240, 0.35); cursor: move; border: 0px dashed #666; font-size: 0.7em; min-height:20px; min-width: 20px; padding:0 15px;
			transition:all 0ms; -webkit-transition:all 0ms; -moz-transition:all 0ms; -o-transition:all 0ms;
			transition:opacity 200ms; -webkit-transition:opacity 200ms; -moz-transition:opacity 200ms; -o-transition:opacity 200ms;
			 }
			  #layoutover{
		        background-color: rgba(51, 51, 51, 0.5);
		        color:#fff; text-align: center;
		        font-weight: bold;
		        position: fixed; 
		        bottom: 10px; right: 20px;
		        width: 150px; height: 125px;
		        border-radius: 10px;
		        padding: 20px;
		        z-index: 1000;
		    }
	</style>
<div class="content-wrapper">
	<div class="header"></div>
	<section class="content">
		<div class="content-fluid">
			<div class="row">
				<div class="col-xs-12">
					<input type="submit" id="save_template" class='btn btn-success' style='width:100%;' value="save" />
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 text-justify" id="contain_body">
					<div class='row' style='margin:10px 10px 10px 15px; '>
						<div class='col-xs-12' >
							<h2>Management Layout Bill</h2>
							<p id="re"></p>
						</div>
					</div>
					<div class='row' style='margin:10px 10px 10px 15px; '>
						<div class='col-xs-12' id='content_layout'>
					        <div style="border-bottom:2.5px dashed rgba(51, 51, 51, 0.34); color:rgba(51, 51, 51, 0.34); font-weight:bold; width:950px; position:relative; top:20px; left:20px;">Body Zone</div>
					        <?php foreach($layout as $val){ ?>
					        <div class="item" pk="<?php echo $val['id']; ?>" style="position:absolute; top:<?php echo $val['l_top']; ?>px; left:<?php echo $val['l_left']; ?>px; width:<?php echo $val['l_width']; ?>px; height:<?php echo $val['l_height']; ?>px; text-align:center;"><small><?php echo $val['name']; ?></small> </div>
					    	<?php } ?>
						<?php /* 	$template = mysql_fetch_assoc($obj_db->select('m_template','fk_m_account='.$ch['pk']));
							$sql = $obj_db->select('m_layout','fk_m_template='.$template['pk'].' group by no_layout');
							while($query = mysql_fetch_assoc($sql)){ ?>
							<div class="item" pk="<?=$query['pk']?>" style="position:absolute; top:<?=$query['top']?>px; left:<?=$query['left']?>px; width:<?=$query['width']?>px; height:<?=$query['height']?>px; <? if($query['checked']=='0'){ echo 'background-color:rgba(52, 73, 94, 0.67); border:0px solid red; color:#fff;'; }?>"><input type='checkbox' <? if($query['checked']=='1'){ echo 'checked'; }else{ echo ''; } ?> /> <small><?=$query['name']?></small> </div>
						<?php	} */?>
						</div>
					</div>
				</div>
			</div>
		    <div id="layoutover"></div>
		</div>
	</section>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style='margin-top:80px;'>
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Save Template</h4>
				</div>
				<div class="modal-body" id='model_content'></div>
			</div>
		</div>
	</div>
		<script type="text/javascript" src='assets/js/jquery-ui/js/jquery-ui-1.10.4.custom.js'></script>
		<script>
		$(function(){ 
			// $('#myModal').modal('show');

        	$('#layoutover').hide();
			$('.item').draggable({ 
            containment: "#content_layout", 
            scroll: false,
            grid: [ 5, 5 ],
            drag: function(){
                var width  = $(this).width();
                var height  = $(this).height();
                var top  = $(this).css('top');
                var left  = $(this).css('left');
                $('#layoutover').html('Width : '+width+'<br/>Height : '+height+'<br/>Top : '+top+'<br/>Left : '+left);
                $('#layoutover').fadeIn('fast');
            },
            stop: function(){
                $('#layoutover').fadeOut('slow');
                $(this).css('background-color','rgba(248, 168, 168, 0.6)');
            }
        });
        $('.item').resizable({ 
            containment: "#content_layout",
            grid: [5,5],
            minHeight: 20,
            resize: function(){var width  = $(this).width();
                var height  = $(this).height();
                var top  = $(this).css('top');
                var left  = $(this).css('left');
                $('#layoutover').html('Width : '+width+'<br/>Height : '+height+'<br/>Top : '+top+'<br/>Left : '+left);
                $('#layoutover').fadeIn('fast');
            },
            stop: function(){
                $('#layoutover').fadeOut('slow');
                $(this).css('background-color','rgba(248, 168, 168, 0.6)');
            }
        }); //,aspectRatio: 1 / 1
			
			// $('.item').children("input[type='checkbox']").is(':checked').css('opacity','0.4');
			// $('.item').on('change',"input[type='checkbox']",function(){ 
			// 	var value = $(this).is(':checked');
			// 	if(value==true){
			// 		$(this).parent('.item').css('opacity','1');
			// 	}else{
			// 		$(this).parent('.item').css('opacity','0.4');
			// 	}
			// });


			$('#save_template').click(function(){
				$('#model_content').html('Loading...');
				$('#myModal').modal('show');
				var str = '';
				var len = $('.item').length;
				for(var i=0;i<len;i++){
					var name = $('.item:eq('+i+') > small').html();
					var t = $('.item:eq('+i+')').css('top');
					var l = $('.item:eq('+i+')').css('left');
					var w = $('.item:eq('+i+')').css('width');
					var h = $('.item:eq('+i+')').css('height');
					var ch = $('.item:eq('+i+')').children("input[type='checkbox']").is(':checked');
					if(ch==true){ ch = 1; }else{ ch=0; }
					// alert(ch);

					var pk = $('.item:eq('+i+')').attr('pk');
					str += pk+"="+name+'::'+t+'::'+l+'::'+w+'::'+h+'::'+ch;
					if(i!=(len-1)){ str += ','; }
				}
				// alert(str);
				// var template = $("select[name='template']").val();
				$.ajax({
					url: 	'index.php?route=settings/layout',
					type: 	'POST',
					data: 	{data:str},
					success:function(result){
						if(result=='Successful, save template for print.'){
							$('.modal-header').addClass('bg-success');
							$('#model_content').html(result);
						}else{
							$('.modal-header').addClass('bg-danger');
							$('#model_content').html(result);
						}
						 // alert(result);
					}
				});
			});

		});
		</script>
	</body>
</html>