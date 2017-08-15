<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
		<title>41 Heights, Pizza Menu</title>

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
						//var_dump($this->cart->contents());
						if(isset($cats) && $cats!=false) { ?>
							<div class="col-xs-12">
								
									<ul class="nav nav-tabs" style="border-top:2px solid #D94F2B;margin-top:3%">
									<?php foreach($cats->result_array() as $cat){ ?>
									  <li  <?php if(strtolower($cat['cat_name'])=="pizza"){ ?> class="active" <?php } ?>>
										<?php if(strtolower($cat['cat_name'])=="pizza"){ ?>
											<a data-toggle="tab" href="#cat<?php echo $cat['cat_id'];?>"><img height="20px" width="20px" src="<?php echo base_url($cat['cat_icon']);?>"> <?php echo $cat['cat_name'];?></a>
										<?php } else{ ?> 
										
										<a  href="<?php echo site_url('Menu/cat/');?><?php echo $cat['cat_id']; ?>"><img height="20px" width="20px" src="<?php echo base_url($cat['cat_icon']);?>"> <?php echo $cat['cat_name'];?></a>
										<?php }?>
									</li>
									  <?php }?>
									  <li>
										<a   href="<?php echo site_url('Menu/deals');?>"><img height="20px" width="20px" src="<?php echo base_url('public/images/deal_ic.png');?>"> Deals</a>
									  </li>
									</ul>
									

									<div class="tab-content" >
									<?php foreach($cats->result_array() as $catg){ 
									
									if(strtolower($catg['cat_name'])=="pizza"){  //990
									
									?>
										  <div id="cat<?php echo $catg['cat_id'];?>" class="tab-pane fade <?php if(strtolower($catg['cat_name'])=="pizza"){ ?> in active <?php } ?> ">
													 
													 <!---------------------catalogue start------------------------>
															<div class="section-catalog" style="margin-top:-10%">
																<div class="container">
																	<div class="row">
																		<div class="col-xs-12">
																		<div class="pizza-builder__wrap-check">
																		<?php
																			$it_query=$this->db->query("select pr_id,pr_name,pr_price,pr_image,att_cat_id from products where cat_id='".$catg['cat_id']."' AND `pr_deleted`='0'");
																			if($it_query->num_rows()>0)
																			{
																				
																				foreach($it_query->result_array() as $prdcts) { 
																				?>
																				
																			
																						<!--======================= if product is pizza===================---->
																							<?php if(strtolower($catg['cat_name'])=="pizza" && $prdcts['att_cat_id']!=0) {//08 ?>
																							
																							
																										<!----==================----------->
																											<div class="section_mod-b" >
																												<form class="pizza-builder cart_form" method="post" action="<?php echo site_url('Cart/add_cart_product');?>" name="pizza-size" >
																												
																												<input style="color:red" type="hidden"  id="pizz_att_price" value="0"/>
																												
																												<input name="item_id" style="color:red" type="hidden" value="<?php echo $prdcts['pr_id'];?>">
																												<input name="item_name" style="color:red" type="hidden" value="<?php echo $prdcts['pr_name'];?>">
																												<input name="att_cart[type]" style="color:red" type="hidden" value="<?php echo $catg['cat_name'];?>">
																												<input type="hidden" style="color:red" name="att_cart[discounted]" value="1"  readonly>
																												<input type="hidden" style="color:red" name="att_cart[image]" value="<?php echo $prdcts['pr_image'];?>" >
																													<div class="container" style="margin-top:-10%;">
																														<div class="row">
																															<div class="col-md-8">
																																<div class="accordion accordion_mod-b panel-group" id="accordion-1">
																																		<?php	///////selecting attributes//////////////
																																		$piz_si=array(9,12,14,16,18);
																																		$main_att_c=1;
																																		$selected_pizza_price=0;
																																		$selected_pizza_size="X";
																																		$total_single_atts=array(); //total single atts to calculate price of atts
																																			$att_query=$this->db->query("select *from att_name where `att_name_deleted`='0' AND `att_cat_id`='".$prdcts['att_cat_id']."'");
																																			if($att_query->num_rows()>0){ //011 
																																				foreach($att_query->result_array() as $att_names) { //012
																																				
																																					$att_v_qu=$this->db->query("select `att_value_id`,`att_value`,`att_value_price`,`att_value_webimage`,`att_value_desc`,`att_value_selected` from `att_values` where `att_name_id`='".$att_names['att_name_id']."' ");
																																				if(strtolower($att_names['att_name'])=="size" || strtolower($att_names['att_name'])=="sizes"){
																																				foreach($att_v_qu->result_array() as $att_valsss) {
																																						if($att_valsss['att_value_selected']==1){
																																								$selected_pizza_price = $att_valsss['att_value_price'];
																																								$selected_pizza_size = $att_valsss['att_value_desc'];
																																							
																																							} 
																																							
																																				}
																																			?>
																																			
																																			<input style="color:red" type="hidden"  id="pizz_price" value="<?php  echo $selected_pizza_price;?>"/>
																																			<input style="color:red" type="hidden"  name="item_price" id="pizz_total_price" value="<?php  echo $selected_pizza_price;?>"/>
																																	<div class="panel panel-default">
																																		<div class="panel-heading">
																																			<a class="btn-collapse collapsed" data-toggle="collapse" href="#collapse-<?php echo $att_names['att_name_id'];?>"><i class="icon"></i></a>
																																			<h3 class="panel-title"><span class="panel-title__number"><?php echo $main_att_c; ?>.</span>Choose Your Pizza Size</h3>
																																		</div>
																																		<div id="collapse-<?php echo $att_names['att_name_id'];?>" class="panel-collapse collapse">
																																			<div class="panel-body" >
																																				<?php 
																																					$c_p=0;
																																					if($att_v_qu->num_rows()>0){ 
																																						foreach($att_v_qu->result_array() as $att_vals) {
																																					?> 
																																							<input required name="att_cart[<?php echo $att_names['att_name'];?>]" value="<?php echo $att_vals['att_value_desc']; ?>" <?php if($att_vals['att_value_selected']){echo "checked";} else{}?> onclick="selected_pizza('<?php echo $att_vals['att_value_desc']; ?>','<?php echo $att_vals['att_value_price']; ?>');" class="pizza-builder__radio hidden" id="pizza-size_<?php echo $piz_si[$c_p];?>" type="radio" name="pizza-size" value="<?php echo $piz_si[$c_p];?>">
																																							
																																							<label class="pizza-builder__radio-label" for="pizza-size_<?php echo $piz_si[$c_p];?>">
																																								<span class="pizza-builder__radio-number pizza-builder__radio-number_<?php echo $piz_si[$c_p];?>"><span class="pizza-builder__radio-inner"><?php echo $att_vals['att_value']; ?></span></span>
																																								<span class="pizza-builder__radio-title"><?php echo $att_vals['att_value_desc']."<br>(RS. ".$att_vals['att_value_price'].")"; ?></span>
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
																																					<input name="att_cart[<?php echo $att_names['att_name'];?>][]" value="<?php echo $att_vals['att_value'];?>" <?php if($att_vals['att_value_selected']==1) { echo "checked";}?> class="pizza-builder__check hidden" id="pizza-sauce_<?php echo $c_pz;?>" type="checkbox">
																																					<label class="pizza-builder__item" for="pizza-sauce_<?php echo $c_pz;?>">
																																						<span class="pizza-builder__check-img">
																																							<img class="img-responsive center-block" src="<?php echo base_url($att_vals['att_value_webimage']);?>" height="80" width="100" alt="Foto">
																																						</span>
																																						<!--<span class="pizza-builder__check-name"></span>-->
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
																																	
																																			else if(strtolower($att_names['att_selection']=="single")) { //014
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
																																						<span class="pizza-builder__check-description"><?php echo $att_vals['att_value'];?></span>
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
																																				<button class="table-order__btn ui-btn ui-btn-primary btn-effect form-control" ><span class="fa fa-cart-plus"> add to cart</span></button>
																																				
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
											<h2 class="table-order__title ui-title-inner">Pizza Selection</h2>
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
															<td class="border-cell table-order__base"><b>PIZZA SIZE : </b><span id="pizza_s"> <?php echo $selected_pizza_size;?></span><span class="table-order__size"></span></td>
															<td class="border-cell table-order__base"><span id="pizza_p"> <?php echo $selected_pizza_price;?></span></td>
														</tr>
														<tr>
															<td class="border-cell table-order__base"><b>PIZZA Atts Price :  </b><span class="table-order__size"></span></td>
															<td class="border-cell table-order__base"><span id="pizza_ap"> Rs 0</span></td>
														</tr>
														<tr>
															<td class="table-order__total">Order Total</td>
															<td class="table-order__total"><span id="pizza_o_t">Rs <?php echo $selected_pizza_price;?></span></td>
														</tr>
													</tbody>
												</table>
											</div>
											<button class="table-order__btn ui-btn ui-btn-primary btn-effect form-control" >add to cart</button>
											<select class="selectpicker form-control" data-style="ui-select" name="item_qty">
																																	<?php for($i=1;$i<=100;$i++){ ?>
																																	<option value="<?php echo $i;?>"><?php echo $i;?></option>
																																	<?php } ?>
																																</select>
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

																							<?php } //08
																							
																						
																						

																				}
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
										 <?php } }//990?>
									  
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
				pizza_total_price+=parseInt(pizza_price)+parseInt(total_att_price);
				//alert(pizza_total_price);
				$("#pizz_total_price").val(pizza_total_price);
				$("#pizz_att_price").val(total_att_price);
				$("#pizza_ap").html("Rs. "+total_att_price);
				$("#pizza_o_t").html("Rs. "+pizza_total_price);
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


