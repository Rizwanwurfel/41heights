<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
		<title>41 Heights, Pizza customization</title>

    	<link href="favicon.png" type="image/x-icon" rel="shortcut icon">
		<link href="<?php echo base_url()?>/public/web_template/assets/css/master.css" rel="stylesheet">
		<script src="<?php echo base_url()?>/public/web_template/assets/plugins/jquery/jquery-1.11.3.min.js"></script>
	</head>


	<body>

		<!-- Loader -->
		<!--<div id="page-preloader"><span class="spinner"></span></div>-->
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
										<h1 class="ui-title-page">41Heights pizza customization</h1>
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
						 
						
						<center><h3>Select attributes for pizza <?php echo $pizza_no ?></h3></center>
						
						<?php
						$att_cat_id=0;
						$c_pz=0;
						$total_att_price=0;
						if(($this->session->userdata('pizza_deal'))) {

								$spd=$this->session->userdata('pizza_deal');
						//echo $spd['pattcat'];
							if(isset($spd['pattprice']))
							{
								foreach($spd['pattprice'] as $k=>$v)
								{
									if($k==$pizza_no)
									{
										
									}
									else{
									$total_att_price+=$v;
									}
									//$total_att_price=+$v;
								}
								//echo $total_att_price;
							}
						?>
							<div class="col-xs-12">
								
										 
															<input id="total_atts_price" style="color:red" type="hidden" value="<?php echo $total_att_price;?>">
													 <!---------------------catalogue start------------------------>
								<div class="section-catalog" style="margin-top:-10%">
									<div class="container">
										<div class="row">
											<div class="col-xs-12">
											<div class="pizza-builder__wrap-check">
											
													
																
																
																			<!----==================----------->
							<div class="section_mod-b" >
											<form class="pizza-builder cart_for" method="post" action="<?php echo site_url('Menu/deal_cust?pizza=');?><?php echo $pizza_no+1;?>" name="pizza-size" >
											
											
											<input style="color:red" type="hidden"  id="pizz_price" value="<?php  echo $spd['pprice'];?>"/>
											<input style="color:red" type="hidden" name="pizz_att_price"  id="pizz_att_price" value="0"/>
											<input style="color:red" type="hidden"  name="item_price" id="pizz_total_price" value="<?php  echo $spd['pprice'];?>"/>
											<input style="color:red" type="hidden"  name="pizza_no"  value="<?php  echo $pizza_no;?>"/>
												<div class="container" style="margin-top:-10%;">
													<div class="row">
														<div class="col-md-8">
															<div class="accordion accordion_mod-b panel-group" id="accordion-1">
																	<?php	///////selecting attributes//////////////
																	
																	$main_att_c=0;
																	$selected_pizza_price=0;
																	$selected_pizza_size="X";
																	$total_single_atts=array(); //total single atts to calculate price of atts
																		$att_query=$this->db->query("select *from att_name where `att_name_deleted`='0' AND `att_cat_id`='".$spd['pattcat']."'");
																		if($att_query->num_rows()>0){ //011 
																			foreach($att_query->result_array() as $att_names) { //012
																			
																				$att_v_qu=$this->db->query("select `att_value_id`,`att_value`,`att_value_price`,`att_value_webimage`,`att_value_desc`,`att_value_selected` from `att_values` where `att_name_id`='".$att_names['att_name_id']."' ");
																		 if(strtolower($att_names['att_selection']=="multi")) { //013
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
																						<input name="att_cart[<?php echo $att_names['att_name'];?>][]" value="<?php echo $att_vals['att_value'];?>" <?php if($att_vals['att_value_selected']==1) { echo "checked";}?> class="pizza-builder__check hidden" id="pizza-sauce_<?php echo $c_pz;?>" type="checkbox">
																						<label class="pizza-builder__item" for="pizza-sauce_<?php echo $c_pz;?>">
																							<span class="pizza-builder__check-img">
																								<img class="img-responsive center-block" src="<?php echo base_url($att_vals['att_value_webimage']);?>" height="80" width="100" alt="Foto">
																							</span>
																							<!--<span class="pizza-builder__check-name"><?php echo $att_vals['att_value'];?></span>-->
																							<span class="pizza-builder__check-description pizza-builder__check-description_mod-a"><?php echo $att_vals['att_value'];?></span>
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
																		
																				else if(strtolower($att_names['att_selection']=="single") && strtolower($att_names['att_name'])!="size") { //014
																				$total_single_atts[]=$att_names['att_name_id'];
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
																						$att_v=0;// storing default checked attribute
																						$att_v_p=0;// storing default checked price
																						
																							foreach($att_v_qu->result_array() as $att_vals) {
																							
																						?>

																						<div onclick="select_att('<?php echo $att_vals['att_value_id'];?>','<?php echo $att_names['att_name_id'];?>','<?php echo $att_vals['att_value'];?>','<?php echo $att_vals['att_value_price'];?>')" id="att_val_<?php echo $att_vals['att_value_id'];?>" class="pizza-builder__item pizza-builder__item_mod-a single_<?php echo $att_names['att_name_id'];?> <?php if($att_vals['att_value_selected']==1){echo "js-active";}?>" tabindex="1">
																							<span class="pizza-builder__check-img">
																								<img class="img-responsive center-block" src="<?php echo base_url($att_vals['att_value_webimage']);?>" height="80" width="100" alt="Foto">
																							</span>
																								<?php $at_na=str_replace(' ', '_', $att_names['att_name']);?>
																								<?php
																									
																									if($att_vals['att_value_selected']==1) {
																								
																										$att_v=$att_vals['att_value'];
																										$att_v_p=$att_vals['att_value_price'];
																								}?>
																							<input type="hidden" style="color:red" name="att_cart[<?php echo $at_na;?>]" class="single_p_name_<?php echo $att_names['att_name_id'];?>" value="<?php  echo $att_v; ?>">
																						
																							<input style="color:red" type="hidden" class="single_p_<?php echo $att_names['att_name_id'];?>" value="<?php echo $att_v_p;?>">
																							<!--<span class="pizza-builder__check-name"><?php echo $att_vals['att_value'];?></span>-->
																							<span class="pizza-builder__check-description "><?php echo $att_vals['att_value'];?></span>
																							<span class="pizza-builder__check-price"><?php echo "Rs." .$att_vals['att_value_price'];?></span>
																							
																							<!--<a class="pizza-builder__btn-select ui-btn ui-btn-primary btn-effect" href="javascript:void(0);">add</a>-->
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
																		<!------------------------------>
																			<div class="row" style="margin-top:5%">
																				<div class="col-sm-6">	
																					<button class="table-order__btn ui-btn ui-btn-primary btn-effect form-control" ><span class="fa fa-arrow-right"> Next</span></button>
																					
																					<!--<select class="selectpicker form-control" data-style="ui-select" name="item_qty">
																						<?php for($i=1;$i<=100;$i++){ ?>
																						<option value="<?php echo $i;?>"><?php echo $i;?></option>
																						<?php } ?>
																					</select>-->
																				</div>
																				
																				
																			</div>
																				<!------------------------------>
																		
																	</div>
																	<!-- end col -->
																			<div class="col-md-4" style="margin-top:5%">
										<section class="section-table-order">
											<h2 class="table-order__title ui-title-inner"><?php echo $spd['pname'];?> Selected</h2>
											<div class="table-container">
												<table class="table-order">
													<thead>
														<tr>
															<th>PRODUCT</th>
															<th>TOTAL</th>
														</tr>
													</thead>
													<tbody>
													

														<tr>
															<td class="border-cell table-order__base"><b>Deal price : </b><span id="pizza_s"> </span><span class="table-order__size"></span></td>
															<td class="border-cell table-order__base"><span id="pizza_p"> RS <?php echo $spd['pprice'];?></span></td>
														</tr>
														<tr>
															<td class="border-cell table-order__base"><b>Deal atts price :  </b><span class="table-order__size"></span></td>
															<td class="border-cell table-order__base"><span id="pizza_ap"> Rs <?php echo $total_att_price;?></span></td>
														</tr>
														<tr>
															<td class="table-order__total">Deal Total</td>
															<td class="table-order__total"><span id="pizza_o_t">Rs <?php echo ($spd['pprice']+$total_att_price);?></span></td>
														</tr>
													</tbody>
												</table>
											</div>
											
											<button class="table-order__btn ui-btn ui-btn-primary btn-effect form-control" >Next</button>
											
												
											
										</section>
										<!-- end section-table-order -->
										
									</div>
																															
																															<!-- end col -->
																														</div>
																														<!-- end row -->
																														
																													</div>
																													<!-- end container -->
																													
																													
																												</form>
																												<!-- end pizza-builder -->
																											</div>
																											<!-- end section_mod-b -->
																																																
																																																
																										<!----==================----------->
																	<!-- end section_mod-b -->
																																						
																																																
																										<!----==================----------->

																			</div>
																		</div>
																		<!-- end col -->
																		
																	</div>
																	<!-- end row -->
																</div>
						<!-- end container -->
															</div>
													 <!----------------------catalogue end----------------------->
													 
									
										 
										 <!------------=================tab for drink------------------------>
											
										 <!------------=================tab for drink==================---------------->
									  
									
								
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
				function select_att(id,pid,product_name,product_price)
			{
				//alert(product_name);
				var total_att_price=0;
				var att_ind_price=0;
				var pizza_price=0;
				var pizza_total_price=0;
				$(".single_"+pid).removeClass('js-active');
				$("#att_val_"+id).addClass('js-active');
				//$("#single_p_"+id).css("background","lightgray");
				$(".single_p_name_"+pid).val(product_name);
				$(".single_p_"+pid).val(product_price);
				var v=<?php echo json_encode($total_single_atts);?>
				
				$.each( v, function( key, value ) {
				 // alert( key + ": " + value );
				  att_ind_price=$(".single_p_"+value).val();
				  total_att_price+=parseInt(att_ind_price);
				  
				});
				//alert(total_att_price);
				pizza_price=$("#pizz_price").val();
				pizza_already_attp=$("#total_atts_price").val();//if already added pizza attributes are there
				pizza_total_price+=parseInt(pizza_price)+parseInt(total_att_price);
				//total_att_price+=parseInt(pizza_already_attp);
				$("#pizz_total_price").val(pizza_total_price);
				$("#pizz_att_price").val(total_att_price);
				$("#pizza_ap").html("Rs. "+(total_att_price+parseInt(pizza_already_attp)));
				$("#pizza_o_t").html("Rs. "+(pizza_total_price+parseInt(pizza_already_attp)));
			}
			function selected_pizza(pizza,price)
			{
				var pizz_att=0;
				var pizza_total_price=0;
				$("#pizza_s").html(pizza);
				$("#pizza_p").html("RS."+price);
				$("#pizz_price").val(price);
				pizz_att=$("#pizz_att_price").val();
				pizza_total_price+=parseInt(pizz_att)+parseInt(price);
				//alert(pizza_total_price);
				$("#pizz_total_price").val(pizza_total_price);
				$("#pizza_o_t").html("Rs. "+pizza_total_price);
			}
		</script>

	</body>
</html>


