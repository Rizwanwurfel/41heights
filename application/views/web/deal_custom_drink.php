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
						 
						
						<!--<center><h3>Select drink</h3></center>-->
						
						<?php
						$total_att_price=0;
						if(($this->session->userdata('pizza_deal'))) {

								$spd=$this->session->userdata('pizza_deal');
								if(isset($spd['pattprice']))
							{
								foreach($spd['pattprice'] as $k=>$v)
								{
									
									$total_att_price+=$v;
									//echo $v;
								}
								//echo $total_att_price;
							}
						?>
							<div class="col-xs-12">
								
										 
													 
													 <!---------------------catalogue start------------------------>
								<div class="section-catalog" style="margin-top:1%">
									<div class="container">
										<div class="row">
											<div class="col-xs-12">
											<div class="pizza-builder__wrap-check">
											
													
																
																
																			<!----==================----------->
							<div class="section_mod-b" >
											<form class="pizza-builder cart_for" method="post" action="<?php echo site_url('Cart/add_pizza_deal');?>" name="pizza-size" >
											
											
												<div class="container" style="margin-top:-10%;">
													<div class="row">
														<div class="col-md-8">
															<div class="accordion accordion_mod-b panel-group" id="accordion-1">
																	
																		<div class="panel">
																			<div class="panel-heading">
																				<a class="btn-collapse collapsed" data-toggle="collapse" href="#collapse-drink"><i class="icon"></i></a>
																				<h3 class="panel-title"><span class="panel-title__number">1.</span>choose Drink</h3>
																			</div>
																			<div id="collapse-drink" class="panel-collapse collapse in">
																				<div class="panel-body">
																					<div class="pizza-builder__wrap-check">
																						
																							<?php for($drin=1;$drin<=$spd['pdrinkqty'];$drin++){ ?>
																							<b>Drink <?php echo $drin;?></b>
																									<select class="form-control" name="drink[]" style="color:orange">
																										<option value="Dew">Dew</option>
																										<option value="coca cola">Coca cola</option>
																										<option value="sprite" >Sprite</option>
																										<option value="fanta">Fanta</option>
																									</select>
																							
																						<?php	} ?>
																							
																						
																						</div>
																						<!-- end pizza-builder__wrap-check -->
																					</div>
																					<!-- end panel-body -->
																				</div>
																				<!-- end panel-collapse -->
																			</div>
																				
																			<!-- end panel -->
																			
																							
																		</div>
																		<!-- end accordion -->
																		
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
															<td class="border-cell table-order__base"><span id="pizza_ap"> Rs <?php  echo $total_att_price;?></span></td>
														</tr>
														<tr>
															<td class="table-order__total">Deal Total</td>
															<td class="table-order__total"><span id="pizza_o_t">Rs <?php echo ($spd['pprice']+$total_att_price);?></span></td>
														</tr>
													</tbody>
												</table>
											</div>
											
											<button class="table-order__btn ui-btn ui-btn-primary btn-effect form-control" >Add to cart</button>
											
												
											
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


