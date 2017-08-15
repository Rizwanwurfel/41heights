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
						//var_dump($cats->result_array());
						if(isset($cats) && $cats!=false) { ?>
							<div class="col-xs-12">
						<?php	//var_dump($this->cart->contents());
							//$this->cart->destroy();
						?>
								
									<ul class="nav nav-tabs" style="border-top:2px solid #D94F2B;margin-top:3%">
									<?php foreach($cats->result_array() as $cat){ ?>
									  <li  <?php if(strtolower($cat['cat_id'])==$cat_id){ ?> class="active" <?php } ?>>
										<?php if(strtolower($cat['cat_name'])=="pizza"){ ?>
											
											<a  href="<?php echo site_url('Menu');?>"><img height="20px" width="20px" src="<?php echo base_url($cat['cat_icon']);?>"> <?php echo $cat['cat_name'];?></a>
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
									
									if(strtolower($catg['cat_id'])==$cat_id){  //990
									?>
										  <div id="cat<?php echo $catg['cat_id'];?>" class="tab-pane fade <?php if(strtolower($catg['cat_id'])==$cat_id){ ?> in active <?php } ?> ">
													 
													 <!---------------------catalogue start------------------------>
															<div class="section-catalog" style="margin-top:-10%">
																<div class="container">
																	<div class="row">
																		<div class="col-xs-12">
																		
																		<div class="pizza-builder__wrap-check">
																		<?php
																			$it_query=$this->db->query("select pr_id,pr_name,pr_price,pr_image,att_cat_id from products where cat_id='".$cat_id."' AND pr_deleted='0'");
																			if($it_query->num_rows()>0)
																			{
																				
																				foreach($it_query->result_array() as $prdcts) { ?>
																				
																						<!--======================= if product is other than pizza ===================---->
																				
																					
																						
																							<div class="pizza-builder__item pizza-builder__item_mod-b" tabindex="1">
																								<div class="pizza-builder__check-img pizza-builder__check-img pizza-builder__check-img_mod-a">
																									<img class="img-responsive center-block" src="<?php echo base_url($prdcts['pr_image']);?>" height="258" width="258" alt="Foto">
																								</div>
																								<div class="pizza-builder__check-name"><?php echo $prdcts['pr_name'];?></div>
																								<!--<div class="pizza-builder__check-description pizza-builder__check-description_mod-a"></div>-->
																								<form method="post" action="<?php echo site_url('Cart/add_cart_product');?>" class="cart_form">
																								<input name="item_id" style="color:red" type="hidden" value="<?php echo $prdcts['pr_id'];?>">
																								<input name="item_name" style="color:red" type="hidden" value="<?php echo $prdcts['pr_name'];?>">
																								<input name="att_cart[type]" style="color:red" type="hidden" value="<?php echo $catg['cat_name'];?>">
																								<input name="item_price" style="color:red" type="hidden" value="<?php echo $prdcts['pr_price'];?>">
																								
																								<input type="hidden" style="color:red" name="att_cart[discounted]" value="<?php if (strtolower($catg['cat_name'])=="drink" || strtolower($catg['cat_name'])=="drinks"){ echo "0"; } else{ echo "1";}?>"  readonly>
																								<input type="hidden" style="color:red" name="att_cart[image]" value="<?php echo $prdcts['pr_image'];?>" >
																								<div class="pizza-builder__check-price pizza-builder__check-price_mod-a"><?php echo "Rs. " .$prdcts['pr_price'];?></div>
																								<select class="selectpicker" data-style="ui-select" name="item_qty">
																									<?php for($i=1;$i<=100;$i++){ ?>
																									<option value="<?php echo $i;?>"><?php echo $i;?></option>
																									<?php } ?>
																								</select>
																								<button class="pizza-builder__btn-select ui-btn ui-btn-primary btn-effect">add</button>
																								<?php if (strtolower($catg['cat_name'])=="drink" || strtolower($catg['cat_name'])=="drinks") {
																										if (!preg_match('/water/',strtolower($prdcts['pr_name']))) {
															
																										?>
																								<select class="selectpicker form-control" data-style="ui-select" name="att_cart[drink]">
																									
																									<option value="coca cola">Coca cola</option>
																									<option value="sprite">Sprite</option>
																									<option value="fanta">Fanta</option>
																									<option value="dew">Dew</option>
																									
																								</select>
																								<?php } }?>
																							</div>
																						</form>
																					
																				
																							
																						

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


