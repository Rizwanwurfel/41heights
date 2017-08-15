<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
		<title>41 Heights, Deals</title>

    	<link href="favicon.png" type="image/x-icon" rel="shortcut icon">
		<link href="<?php echo base_url()?>/public/web_template/assets/css/master.css" rel="stylesheet">
		<script src="<?php echo base_url()?>/public/web_template/assets/plugins/jquery/jquery-1.11.3.min.js"></script>
	</head>


	<body>

		<!-- Loader -->
		<div id="page-preloader"><span class="spinner"></span></div>
		<!-- Loader end -->
<!-----------==============================modal========================================----------->
					<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
						<div class="modal fade" id="custom_order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
										<h4 class="modal-title">Choose drink</h4>
									</div>
									<div class="modal-body" style="background:#1F1F1F">
										<form style="color:red" method="post" action="<?php echo site_url('Cart/add_cart_product');?>" class="cart_form">
											<input type="hidden" name="item_id" id="item_id">
											<input type="hidden" name="item_name" id="item_name">
											<input type="hidden" name="att_cart[type]" id="item_type">
											<input type="hidden" name="att_cart[image]" id="item_image">
											<input type="hidden" name="item_price" id="item_price">
											<input type="hidden" name="item_qty" id="item_qty">
											<input type="hidden" name="att_cart[discounted]" value="0">
											<span id="drink_select"></span>
											<button class="btn btn-primary"  >add to cart</button>
										</form>
																   
										  
									</div>
									<!--<div class="modal-footer">
									<button type="button" class="btn blue" data-dismiss="modal">Close</button>
									</div>-->
								</div>
								<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
						</div>
						<!-- /.modal -->
					<!-----------==============================modal========================================----------->

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
										<h1 class="ui-title-page">41Heights Deals</h1>
										<ol class="breadcrumb">
											<li><a href="<?php echo site_url();?>">Home</a></li>
											<li class="active">Deals</li>
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
									  <li  <?php if(strtolower($cat['cat_id'])==$cat_id){ ?> class="active" <?php } ?>>
										<?php if(strtolower($cat['cat_name'])=="pizza"){ ?>
											<a  href="<?php echo site_url('Menu/deals');?>"><img height="20px" width="20px" src="<?php echo base_url($cat['cat_icon']);?>"> <?php echo $cat['cat_name']." Deals";?></a>
										<?php } else{ ?> 
										
										<a  href="<?php echo site_url('Menu/deal/');?><?php echo $cat['cat_id']; ?>"><img height="20px" width="20px" src="<?php echo base_url($cat['cat_icon']);?>"> <?php echo $cat['cat_name']." Deals";?></a>
										<?php }?>
									</li>
									  <?php }?>
									  <li>
										<a   href="<?php echo site_url('Menu');?>"><img height="20px" width="20px" src="<?php echo base_url('public/images/deal_ic.png');?>"> Menu</a>
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
																			$it_query=$this->db->query("select *from deals where cat_id='".$cat_id."' AND `deal_deleted`='0' AND `deal_for`='0' order by `deal_top` desc");
																			if($it_query->num_rows()>0)
																			{
																				
																				foreach($it_query->result_array() as $prdcts) { 
																				?>
																				
																			
																						<!--======================= if product is pizza===================---->
																							
																							
																							
																										<!----==================----------->
																										
																												<div class="pizza-builder__item pizza-builder__item_mod-b" tabindex="1">
																								<div class="pizza-builder__check-img pizza-builder__check-img pizza-builder__check-img_mod-a">
																									<img class="img-responsive center-block" src="<?php echo base_url($prdcts['deal_image']);?>" height="258" width="258" alt="Foto">
																								</div>
																								<div class="pizza-builder__check-name"><?php echo $prdcts['deal_name'];?></div>
																								<?php
																										$deal_items=$this->db->query("select `deal_pr_name` from `deals_products` where `deal_id`='".$prdcts['deal_id']."'");
																											if($deal_items->num_rows()>0) { 
																											foreach($deal_items->result_array() as $deal_item){
																											?>
																							
																								<div class="pizza-builder__check-description pizza-builder__check-description_mod-a"><?php echo $deal_item['deal_pr_name'];?></div>
																								<?php }} ?>
																							<!--	<form method="post" action="<?php echo site_url('Cart/add_cart_product');?>" class="cart_form">-->
																								<input name="item_id" style="color:red" type="hidden" value="<?php echo $prdcts['deal_id'];?>">
																								<input name="item_name" style="color:red" type="hidden" value="<?php echo $prdcts['deal_name'];?>">
																								<input name="att_cart[type]" style="color:red" type="hidden" value="<?php echo $catg['cat_name'];?>">
																								<input name="item_price" style="color:red" type="hidden" value="<?php echo $prdcts['deal_price'];?>">
																								
																								<input type="hidden" style="color:red" name="att_cart[discounted]" value="0"  readonly>
																								<input type="hidden" style="color:red" name="att_cart[image]" value="<?php echo $prdcts['deal_image'];?>" >
																								<div class="pizza-builder__check-price pizza-builder__check-price_mod-a"><?php echo "Rs. " .$prdcts['deal_price'];?></div>
																								<select  class="selectpicker" data-style="ui-select" name="item_qty" id="item_qty_<?php echo $prdcts['deal_id'];?>">
																									<?php for($i=1;$i<=100;$i++){ ?>
																									<option value="<?php echo $i;?>"><?php echo $i;?></option>
																									<?php } ?>
																								</select>
																								<a onclick="customize_item('<?php echo $prdcts['deal_id'];?>','<?php echo $prdcts['deal_name'];?>','<?php echo $prdcts['deal_price'];?>','<?php echo $prdcts['deal_image'];?>','<?php echo $catg['cat_name'];?>','<?php echo $prdcts['drink_qty'];?>')" class="pizza-builder__btn-select ui-btn ui-btn-primary btn-effect" href="#custom_order" data-toggle="modal">add</a>
																							</div>
																						<!--</form>-->
																																																
																																																
																										<!----==================----------->

																							<?php  
																							
																						
																						

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
			function customize_item(did,dname,dprice,dimage,catname,drinkqty)
			{
				//alert("deal id"+did);
				$("#item_id").val(did);
				$("#item_name").val(dname);
				$("#item_type").val(catname);
				$("#item_price").val(dprice);
				$("#item_image").val(dimage);
				var d=$("#item_qty_"+did).val();
				var dqty=drinkqty;
				$("#item_qty").val(d);
				$("#drink_select").html("");
				for(var a=1;a<=dqty;a++){
				$("#drink_select").append('<select name="att_cart[drink][]" style="color:orange" class="form-control"><option value="coca cola">Coca Cola</option><option value="sprite">Sprite</option><option value="fanta">fanta</option><option value="dew">Dew</option></select>');
				
				}
		
				//$("#pizza_o_t").html("Rs. "+pizza_total_price);
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


