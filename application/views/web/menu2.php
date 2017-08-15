<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
		<title>41Heights pizza</title>

    	<link href="favicon.png" type="image/x-icon" rel="shortcut icon">
		<link href="<?php echo base_url()?>/public/web_template/assets/css/master.css" rel="stylesheet">
		<script src="<?php echo base_url()?>/public/web_template/assets/plugins/jquery/jquery-1.11.3.min.js"></script>
	</head>


	<body>

		<!-- Loader -->
		<div id="page-preloader"><span class="spinner"></span></div>
		<!-- Loader end -->


		<div class="layout-theme animated-css" id="wrapper" data-header="sticky" data-header-top="200">

			<div id="sb-site">

				<div class="wrap-content">


					<!-- HEADER -->
					<?php $this->load->view('web/include/header');?>
					<!-- end header -->

					<div class="section-title">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<div class="section__inner">
										<h1 class="ui-title-page">41Heights Menu</h1>
										<ol class="breadcrumb">
											<li><a href="<?php echo site_url();?>">Home</a></li>
											<li class="active">Menu</li>
										</ol>
									</div>
									<!-- end section__inner -->
								</div>
								<!-- end col -->
							</div>
							<!-- end row -->
						</div>
						<!-- end container -->
					</div>
					<!-- end section-title -->


					<div class="container">
						<div class="row">
						<?php  
						//var_dump($cats->result_array());
						if(isset($cats) && $cats!=false) { ?>
							<div class="col-xs-12">
								
									<ul class="nav nav-tabs" style="border-top:2px solid #D94F2B;margin-top:3%">
									<?php foreach($cats->result_array() as $cat){ ?>
									  <li  <?php if(strtolower($cat['cat_name'])=="pizza"){ ?> class="active" <?php } ?>><a data-toggle="tab" href="#cat<?php echo $cat['cat_id'];?>"><img height="20px" width="20px" src="<?php echo base_url($cat['cat_icon']);?>"> <?php echo $cat['cat_name'];?></a></li>
									  <?php }?>
									</ul>
									

									<div class="tab-content" >
									<?php foreach($cats->result_array() as $catg){ ?>
										  <div id="cat<?php echo $catg['cat_id'];?>" class="tab-pane fade <?php if(strtolower($catg['cat_name'])=="pizza"){ ?> in active <?php } ?> ">
													 
													 <!---------------------catalogue start------------------------>
															<div class="section-catalog" style="margin-top:-10%">
																<div class="container">
																	<div class="row">
																		<div class="col-xs-12">
																		<div class="pizza-builder__wrap-check">
																		<?php
																			$it_query=$this->db->query("select pr_id,pr_name,pr_price,pr_image,att_cat_id from products where cat_id='".$catg['cat_id']."'");
																			if($it_query->num_rows()>0)
																			{
																				foreach($it_query->result_array() as $prdcts) { ?>
																				
																			
																						<!--======================= if product is pizza===================---->
																							<?php if(strtolower($catg['cat_name'])=="pizza" && $prdcts['att_cat_id']!=0) {//08 ?>
																							
																							
																										<!----==================----------->
																											<div class="section_mod-b" >
																												<form class="pizza-builder" action="post" name="pizza-size">
																													<div class="container" style="margin-top:-10%;">
																														<div class="row">
																															<div class="col-md-8">
																																<div class="accordion accordion_mod-b panel-group" id="accordion-1">
																																		<?php	///////selecting attributes//////////////
																																		$piz_si=array(9,12,14,16,18);
																																		$main_att_c=1;
																																			$att_query=$this->db->query("select *from att_name where `att_name_deleted`='0' AND `att_cat_id`='".$prdcts['att_cat_id']."'");
																																			if($att_query->num_rows()>0){ //011 
																																				foreach($att_query->result_array() as $att_names) { //012
																																					$att_v_qu=$this->db->query("select `att_value_id`,`att_value`,`att_value_price`,`att_value_webimage`,`att_value_desc` from `att_values` where `att_name_id`='".$att_names['att_name_id']."' ");
																																				if(strtolower($att_names['att_name'])=="size" || strtolower($att_names['att_name'])=="sizes"){
																																			?>
																																	<div class="panel panel-default">
																																		<div class="panel-heading">
																																			<a class="btn-collapse collapsed" data-toggle="collapse" href="#collapse-<?php echo $att_names['att_name_id'];?>"><i class="icon"></i></a>
																																			<h3 class="panel-title"><span class="panel-title__number"><?php echo $main_att_c; ?>.</span>Choose Your Pizza Size</h3>
																																		</div>
																																		<div id="collapse-<?php echo $att_names['att_name_id'];?>" class="panel-collapse collapse">
																																			<div class="panel-body">
																																				<?php 
																																					$c_p=0;
																																					if($att_v_qu->num_rows()>0){ 
																																						foreach($att_v_qu->result_array() as $att_vals) {
																																					?> 
																																							<input class="pizza-builder__radio hidden" id="pizza-size_<?php echo $piz_si[$c_p];?>" type="radio" name="pizza-size" value="<?php echo $piz_si[$c_p];?>">
																																							<label class="pizza-builder__radio-label" for="pizza-size_<?php echo $piz_si[$c_p];?>">
																																								<span class="pizza-builder__radio-number pizza-builder__radio-number_<?php echo $piz_si[$c_p];?>"><span class="pizza-builder__radio-inner"><?php echo $att_vals['att_value']; ?></span></span>
																																								<span class="pizza-builder__radio-title"><?php echo $att_vals['att_value_desc']; ?></span>
																																							</label>
																																				<?php $c_p++; } } ?>
																																			</div>
																																		</div>
																																	</div>
																																	<!-- end panel -->
																																	<?php } 
																																	
																																		else if(strtolower($att_names['att_selection']=="multi")) { //013
																																		?>

																																	<div class="panel">
																																		<div class="panel-heading">
																																			<a class="btn-collapse collapsed" data-toggle="collapse" href="#collapse-<?php echo $att_names['att_name_id'];?>"><i class="icon"></i></a>
																																			<h3 class="panel-title"><span class="panel-title__number"><?php echo $main_att_c; ?>.</span><?php echo $att_names['att_name'];?></h3>
																																		</div>
																																		<div id="collapse-<?php echo $att_names['att_name_id'];?>" class="panel-collapse collapse">
																																			<div class="panel-body">
																																				<div class="pizza-builder__wrap-check">
																																					<?php 
																																					$c_pz=0;
																																					if($att_v_qu->num_rows()>0){ 
																																						foreach($att_v_qu->result_array() as $att_vals) {
																																					?>
																																					<input class="pizza-builder__check hidden" id="pizza-sauce_<?php echo $c_pz;?>" type="checkbox">
																																					<label class="pizza-builder__item" for="pizza-sauce_<?php echo $c_pz;?>">
																																						<span class="pizza-builder__check-img">
																																							<img class="img-responsive center-block" src="<?php echo base_url($att_vals['att_value_webimage']);?>" height="135" width="135" alt="Foto">
																																						</span>
																																						<span class="pizza-builder__check-name"><?php echo $att_vals['att_value'];?></span>
																																						<span class="pizza-builder__check-description pizza-builder__check-description_mod-a"></span>
																																						<span class="pizza-builder__check-price"><?php echo "Rs." .$att_vals['att_value_price'];?></span>
																																						<i class="icon-check fa fa-check"></i>
																																					</label>
																																					<?php $c_pz ++;} } ?>
																																				</div>
																																				<!-- end pizza-builder__wrap-check -->
																																			</div>
																																			<!-- end panel-body -->
																																		</div>
																																		<!-- end panel-collapse -->
																																	</div>
																																	<!-- end panel -->
																																	<?php } //013 
																																	
																																			else if(strtolower($att_names['att_selection']=="single")) { //014
																																	?>
																																	<div class="panel">
																																		<div class="panel-heading">
																																			<a class="btn-collapse collapsed" data-toggle="collapse" href="#collapse-<?php echo $att_names['att_name_id'];?>"><i class="icon"></i></a>
																																			<h3 class="panel-title"><span class="panel-title__number"><?php echo $main_att_c; ?>.</span><?php echo $att_names['att_name'];?></h3>
																																		</div>
																																		<div id="collapse-<?php echo $att_names['att_name_id'];?>" class="panel-collapse collapse">
																																			<div class="panel-body">
																																				<div class="pizza-builder__wrap-check">
																																					
																																					<?php 
																																					$c_pz=0;
																																					if($att_v_qu->num_rows()>0){ 
																																						foreach($att_v_qu->result_array() as $att_vals) {
																																					?>

																																					<div onclick="select_att('<?php echo $att_vals['att_value_id'];?>','<?php echo $att_names['att_name_id'];?>')" id="att_val_<?php echo $att_vals['att_value_id'];?>" class="pizza-builder__item pizza-builder__item_mod-a single_<?php echo $att_names['att_name_id'];?>" tabindex="1">
																																						<span class="pizza-builder__check-img">
																																							<img class="img-responsive center-block" src="<?php echo base_url($att_vals['att_value_webimage']);?>" height="133" width="180" alt="Foto">
																																						</span>
																																						<span class="pizza-builder__check-name"><?php echo $att_vals['att_value'];?></span>
																																						<span class="pizza-builder__check-description pizza-builder__check-description_mod-a">Pineapple, 60g</span>
																																						<span class="pizza-builder__check-price"><?php echo "Rs." .$att_vals['att_value_price'];?></span>
																																						
																																						<a class="pizza-builder__btn-select ui-btn ui-btn-primary btn-effect" href="javascript:void(0);">add</a>
																																						<i class="icon-check fa fa-check"></i>
																																					</div>
																																					<?php } }?>
																																				</div>
																																				<!-- end pizza-builder__wrap-check -->
																																			</div>
																																			<!-- end panel-body -->
																																		</div>
																																		<!-- end panel-collapse -->
																																	</div>
																																		<?php } //014 ?>
																																	<!-- end panel -->
																																	
																																					<?php $main_att_c++; } /*012*/	}//011?>
																																</div>
																																<!-- end accordion -->
																																
																															</div>
																															<!-- end col -->
																															
																															<!-- end col -->
																														</div>
																														<!-- end row -->
																														
																													</div>
																													<!-- end container -->
																													<div style="margin-top:5%;margin-left:10%" class="col-md-1">
																													<center>
																																	<select class="selectpicker form-control" data-style="ui-select">
																																	<?php for($i=1;$i<=100;$i++){ ?>
																																	<option><?php echo $i;?></option>
																																	<?php } ?>
																																</select>
																																	
																														</center>
																													</div>
																													<div style="margin-top:5%" class="col-md-3">
																													<center>
																																	
																																	<button class="btn btn-warning form-control">Add To Cart</button>
																														</center>
																													</div>
																												</form>
																												<!-- end pizza-builder -->
																											</div>
																											<!-- end section_mod-b -->
																																																
																																																
																										<!----==================----------->

																							<?php } //08
																							
																							else { //09?>
																						<!--======================= if product is other than pizza ===================---->
																						
																							<div class="pizza-builder__item pizza-builder__item_mod-b" tabindex="1">
																								<div class="pizza-builder__check-img pizza-builder__check-img pizza-builder__check-img_mod-a">
																									<img class="img-responsive center-block" src="<?php echo base_url($prdcts['pr_image']);?>" height="258" width="258" alt="Foto">
																								</div>
																								<div class="pizza-builder__check-name"><?php echo $prdcts['pr_name'];?></div>
																								<!--<div class="pizza-builder__check-description pizza-builder__check-description_mod-a"></div>-->
																								<div class="pizza-builder__check-price pizza-builder__check-price_mod-a"><?php echo "Rs. " .$prdcts['pr_price'];?></div>
																								<select class="selectpicker" data-style="ui-select">
																									<?php for($i=1;$i<=100;$i++){ ?>
																									<option><?php echo $i;?></option>
																									<?php } ?>
																								</select>
																								<a class="pizza-builder__btn-select ui-btn ui-btn-primary btn-effect" href="javascript:void(0);">add</a>
																							</div>
																							<?php } //09 ?>
																						

																			<?php	}
																			}
																			?>
																			</div>
																		</div>
																		<!-- end col -->
																		
																	</div>
																	<!-- end row -->
																</div>
						<!-- end container -->
															</div>
													 <!----------------------catalogue end----------------------->
													 
										  </div>
										 <?php } ?>
									  
									</div>
								
								<!-- end filter -->

								<!-- end filter-categories -->
							</div>
							<?php } ?>
							<!-- end col -->
						</div>
						<!-- end row -->
					</div>
					<!-- end container -->


				
					<!-- end section-catalog -->


					
					<!-- end section-subscribe -->


					<?php $this->load->view('web/include/subscription');?>
					<!-- end footer -->

				</div>
				<!-- end wrap-content -->

			</div>
			<!-- end #sb-site -->

<?php $this->load->view('web/include/navigation');?>
			<!-- end sb-left -->

		
			<!-- end sb-right -->

		</div>
		<!-- end layout-theme -->



		<!-- SCRIPTS MAIN -->

		<?php $this->load->view('web/include/footer');?>
		<script>
			function select_att(id,pid)
			{
				$(".single_"+pid).removeClass('js-active');
				$("#att_val_"+id).addClass('js-active');
				//$("#att_val_"+id).css("background","lightgray");
			}
		</script>

	</body>
</html>


