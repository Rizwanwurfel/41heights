<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
		<title>41 Heights, Checkout</title>

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
										<h1 class="ui-title-page">41Heights Checkout</h1>
										<ol class="breadcrumb">
											<li><a href="<?php echo site_url();?>">Home</a></li>
											<li class="active">checkout</li>
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
						
							<div class="col-xs-12 col-lg-8 col-md-8">
							
											<h4>Enter Billing/Shipping Address</h4>
									
							<center><p style="color:red"><?php if($this->session->userdata('errors')) { echo $this->session->userdata('errors'); $this->session->unset_userdata('errors');}?></p></center>
									<!-------------------------------------------------------------------------------------->

				<form action="<?php echo site_url('Checkout/add_order');?>" method="post" style="margin-top:6%;">
					<div class="form-group row">
					
						  <div class="col-sm-12 col-lg-4 col-md-4">
							<label for="example-text-input" class="col-2 col-form-label">Full Name*</label>
							<input class="form-control" type="text" value="<?php if($this->session->userdata('check_name')){ echo $this->session->userdata('check_name');}?>" required placeholder="Full name" pattern="[a-zA-Z][a-zA-Z ]+" name="full_name">
						  </div>
						   <div class="col-sm-12 col-lg-4 col-md-4">
							<label for="example-text-input" class="col-2 col-form-label">Phone*</label>
							<input class="form-control" type="text" required value="<?php if($this->session->userdata('check_phone')){ echo $this->session->userdata('check_phone');}?>" placeholder="Phone" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="15" name="phone">
						  </div>
						  <div class="col-sm-12 col-lg-4 col-md-4">
							<label for="example-text-input" class="col-2 col-form-label">Email<span style="font-size:12px"> (optional)</span></label>
							<input class="form-control" type="email"  placeholder="Email" value="<?php if($this->session->userdata('check_email')){ echo $this->session->userdata('check_email');}?>"  name="email">
						  </div>
						  
						  
					</div>
				<div class="form-group row">
					
						  
						  <div class="col-sm-12 col-lg-7 col-md-7">
						 
							<label for="example-text-input" class="col-2 col-form-label">Location*</label><br/>
							 <?php 
							$loc_price=array();
							$loc_min_order=array();
						  if(isset($loc) && $loc!=false){
						  $location_array=$loc->result_array();
							
						  ?>
								  <select class="form-control" name="locationss" id="loc_loc" >
									<?php 
										foreach($loc->result_array() as $locs) {
										$loc_price[$locs['loc_id']]=$locs['loc_charges'];
										$loc_min_order[$locs['loc_id']]=$locs['min_order'];
									?>
									<option style="color:orange" value="<?php echo $locs['loc_id'];?>"><?php echo $locs['loc_name'];?></option>
									
									<?php } ?>
								  </select>
							
						  <?php } ?>
						  </div>
						 <div class="col-sm-12 col-lg-5 col-md-5">
							<label for="example-text-input" class="col-2 col-form-label">Coupon<span style="font-size:12px"> (optional)</span></label><br/>
								<input type="text" class="form-control" name="coupon"   placeholder="coupon code ">
							  
						  </div>
						 
						  
					</div>
					<div class="form-group row">
						  <div class="col-sm-12 col-lg-7 col-md-7">
							<p id="note_min" style="color:red"></p>
							<p style="color:red;" id="note">Note:Delivery charges applied for some locations</p>
							<input type="hidden" class="form-control" name="location" id="loc_order" value="<?php echo $location_array[0]['loc_name'];?>">
				 
								<input type="hidden" class="form-control" name="service_charges" id="loc_charges" value="<?php echo $location_array[0]['loc_charges'];?>">
							  
								<input type="hidden" class="form-control" name="min_order" id="loc_min" value="<?php echo $location_array[0]['min_order'];?>">
							
						  </div>
						<?php  if($this->session->userdata('ambs_id')) { 
						
								$check_point=$this->db->query("select `amb_ref_points` from `ambassador` where `amb_id`='".$this->session->userdata('ambs_id')."'")->row();
								
								if($check_point->amb_ref_points>0) {
							?>
									<div class="col-sm-12 col-lg-5 col-md-5">
										<label for="example-text-input" class="col-2 col-form-label"></label><br/>
											<input type="radio"  name="amb_points" onclick="alert();" value="using_points" >  Use points
											<input type="radio"  name="amb_points" checked style="margin-left:5%" value="using_cash">  Cash
										  
									  </div>
						  <?php  }} else{ ?>
						  
							<div class="col-sm-12 col-lg-5 col-md-5">
							<label for="example-text-input" class="col-2 col-form-label">Refference id<span style="font-size:12px"> (optional)</span></label><br/>
								<input type="text" class="form-control" name="ref_id"   placeholder="referred by ">
							  
						  </div>
						  
						 <?php } ?>
				  
				</div>
					
				
				<div class="form-group row">
				  
				  <div class="col-sm-12 col-lg-7 col-md-7">
					<label for="example-url-input" class="col-2 col-form-label">Address*</label>
					<textarea class="form-control" required  placeholder="Complete address"  name="address"><?php if($this->session->userdata('check_address')){ echo $this->session->userdata('check_address');}?></textarea>
				  </div>
				  <div class="col-sm-12 col-md-5 col-lg-5">
						<label for="example-url-input" class="col-2 col-form-label">Order Note<span style="font-size:12px"> (optional)</span></label>
					<textarea class="form-control"   placeholder="Any Note/comment"  name="order_note"><?php if($this->session->userdata('check_note')){ echo $this->session->userdata('check_note');}?></textarea>
							
						 </div>
				</div>
				
				<div class="form-group row">
				  
				  
				  <div class="col-sm-12 col-lg-3 col-md-3">
						<!--<center>	<button type="submit" id="submit_button" class="btn btn-danger btn-lg " style="width:100%;background:#8D401E;margin-top:20%">Place Order</button></center>-->
							<button  id="submit_button" class="table-order__btn ui-btn ui-btn-primary btn-effect form-control" ><span class="fa fa-cart-plus"> Place Order</span></button>
							<span id="show_wait" style="color:white"></span>
						 </div>
				</div>
			
					
					<br/>

				

			</form>
			
				<!-------------------------------------------------------------------------------------->
				<?php
				
				
						$without_deal_total=0;
						$deals_total=0;
						$discounted_bill=0;
								if($this->cart->contents()){

									foreach ($this->cart->contents() as $items){
									$c_size="";
										if($items['options']!=NULL ||!empty($items['options']))
										{
											foreach($items['options'] as $k=>$v) 
												{
																			
																				 if($k==trim("discounted"))
																				{
																					if($v=="1")
																					{
																						$without_deal_total+=$items['subtotal'];
																					}
																					else if($v==0)
																					{
																						$deals_total+=$items['subtotal'];
																					}
																				}
												}
										}
									
										
						?>
						
							
						
						
						<?php }}
									$discount=$this->db->query("select discount from discount")->row();
								if($discount)
								{
									$discount_amount=$discount->discount;
									if($discount_amount!=0 && $discount_amount>0)
									{
										$total_discount=$without_deal_total*($discount_amount/100);
										$discounted_bill=$without_deal_total-$total_discount;
										$discounted_bill=$discounted_bill+$deals_total;
										 
									}
								}
						?>
				
								
							</div>
							<div class="col-sm-11 col-sm-offset-1 col-lg-3 col-md-3" style="margin-top:7%" id="checkout_bill_summary">
								<center><h4>Bill Summary</h4></center> 
									<center style="border:2px solid #CC9928;padding-top:5%">
									
									<ol class="breadcrumb">
										<li>Total Items</li>
										<li class="active"><?php echo $this->cart->total_items();?></li><br/>

													
									</ol><br/>
									<ol class="breadcrumb">
										<li>Bill</li>
										<li class="active"><?php echo $this->cart->total();?></li>
													
									</ol><br/>
									<?php if($discounted_bill!=0 && $discounted_bill> 0) { ?>
									<ol class="breadcrumb">
									
										<li>Discounted Bill</li>
										<li class="active"><?php echo $discounted_bill;?></li>
													
									</ol>
									<?php } ?>
								</center>
								<center><span style="color:white;font-size:12px" >Discount Not applied on deals and drinks</span></center>
								
							</div>
							
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
		/*function getloc(id)
		{
			//alert(id.text);
		}*/
		$('#loc_loc').on('change', function()
		{
			
			var id=this.value;
			
			var arrayprice = <?php echo json_encode($loc_price); ?>;
			var arraymin = <?php echo json_encode($loc_min_order); ?>;
			var d=$("#loc_loc option:selected").text();
			
			$("#loc_order").val(d);
			$("#loc_charges").val(arrayprice[id]);
			//alert(arrayprice[id]);
			$("#note").html("Delivery Charges for selected area is Rs. "+ arrayprice[id]);
			
			var total_order=$("#total_cart_bill").val(); /////this input field is present in cart_updation file
			total_order = parseInt(total_order);
			if(total_order<arraymin[id])
			{
				//alert("aur b lo cheeze");
				$("#submit_button").attr("disabled", true);
				$("#note_min").html("Minimum order for selected area should be  Rs. "+ arraymin[id]);
			}
			else
			{
				 $("#submit_button").removeAttr("disabled");
				 $("#note_min").html("");
			}
			$("#loc_min").val(arraymin[id]);
			//alert(arrayName[id]);
			//alert(d);
		});
			$("form").submit(function(){
   $("#submit_button").hide();
   $("#show_wait").html("Order submitting");
});
	</script>

	</body>
</html>


