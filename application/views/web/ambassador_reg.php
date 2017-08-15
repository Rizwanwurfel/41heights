<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
		<title>41 Heights, Ambassador</title>

    	<link href="favicon.png" type="image/x-icon" rel="shortcut icon">
		<link href="<?php echo base_url()?>/public/web_template/assets/css/master.css" rel="stylesheet">
		<script src="<?php echo base_url()?>/public/web_template/assets/plugins/jquery/jquery-1.11.3.min.js"></script>
	</head>


	<body>

		<!-- Loader -->
		<div id="page-preloader"><span class="spinner"></span></div>
		<!-- Loader end -->

  <!---------------------------------------------------------------------------------------------------------------------------->
<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="forgot_pass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						
						<div class="modal-body">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
								<form action="<?php echo site_url('Ambassador/forgot_pass');?>" method="post" id="forgot_pass_form">
									<input id="forgotten_email" name="f_email" type="email" class="form-control" style="color:red" placeholder="Enter email">
									<button  id="for_pass_sb"  class="btn btn-warning">submit</button>
								</form>
								<div id="forgot_pass_area" style="padding:5%">
								</div>
						</div>
					
						
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
  <!--------------------------------->
		<div class="layout-theme animated-css" id="wrapper" data-header="sticky" data-header-top="200">

			<div id="sb-site">

				<div class="wrap-content">


					<!-- HEADER -->
					<?php $this->load->view('web/include/header');?>
					<!-- end header -->

					<div class="section-title" style="height:100px">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<div class="section__inner">
										<!--<h1 class="ui-title-page">41Heights Ambassador registration</h1>-->
										<ol class="breadcrumb">
											<li><a href="<?php echo site_url();?>">Home</a></li>
											<li class="active">Ambassador Registration</li>
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
						
							/*$rest=$this->db->query("select *from `rest_timing`")->row();
									//$op_d= $rest->opening_time;
									$op_d= "20:00:00";
									//$cl_d= $rest->closing_time;
									$cl_d= "04:00:00";
									$rest_st= $rest->emergency_status;
									if(trim($rest_st)=="close")
									{
										echo "exit";
										exit;
									}
									else{
												date_default_timezone_set("Asia/Karachi");
												$now="18:00:00";
												// $now=Date('H:i:s');
												echo ($now-$cl_d);
												
												if(strtotime($now)>=strtotime($cl_d) && strtotime($now)<=strtotime($op_d))
												{
													echo "rest is close";
												}
												else
												{
													echo "rest is open";
												}
										}*/
							
						?>
							<div class="col-sm-12 col-lg-7">
											<h4>Do You Have Account!</h4>
												Become Ambassador of 41 Heights Pizza
												and Enjoy special discount, Be the referrer to customers and let them enjoy ambassador discount.<br/>
												<center><h5>SignUp  Today!</h5></center>
												
											
							<center><p style="color:red"><?php if($this->session->userdata('errors')) { echo $this->session->userdata('errors'); $this->session->unset_userdata('errors');}?></p></center>
							<center><?php if($this->session->userdata('success')) { ?> <p style="color:white;border:2px solid #FDBC2C;padding:4px"><?php echo $this->session->userdata('success'); $this->session->unset_userdata('success');}?></p></center>
							<center><p style="color:red"><?php if($this->session->userdata('failure')) { echo $this->session->userdata('failure'); $this->session->unset_userdata('failure');}?></p></center>
									<!-------------------------------------------------------------------------------------->

				<form action="<?php echo site_url('Ambassador/signup');?>" method="post" style="margin-top:6%;">
					<div class="form-group row">
					
						  <div class="col-sm-12 col-lg-4 col-col-md-6">
							<label for="example-text-input" class="col-2 col-form-label">Full Name*</label>
							<input class="form-control" type="text" required placeholder="Full name" name="name" pattern="[a-zA-Z][a-zA-Z ]+" value="<?php if(isset($name)){ echo $name;}?>">
						  </div>
						   <div class="col-sm-12 col-lg-4 col-col-md-6">
							<label for="example-text-input" class="col-2 col-form-label">Phone*</label>
							<input class="form-control" type="text" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="15" placeholder="Phone"  name="phone_number" value="<?php if(isset($phone_number)){ echo $phone_number;}?>">
						  </div>
						  <div class="col-sm-12 col-lg-4 col-col-md-6">
							<label for="example-text-input" class="col-2 col-form-label">Email*</label>
							<input class="form-control" type="email" required placeholder="Email"  name="email" value="<?php if(isset($email)){ echo $email;}?>">
						  </div>
						  
						  
					</div>
					<div class="form-group row">
					
						  <div class="col-sm-12 col-lg-4 col-col-md-6">
							<label for="example-text-input" class="col-2 col-form-label">Password*</label>
							<input class="form-control" type="password" required placeholder="Password" name="password">
						  </div>
						   <div class="col-sm-12 col-lg-4 col-col-md-6">
							<label for="example-text-input" class="col-2 col-form-label">Conform password*</label>
							<input class="form-control" type="password" required placeholder="conform password"  name="con_password">
						  </div>
						  <div class="col-sm-12 col-lg-4 col-col-md-6">
							<label for="example-text-input" class="col-2 col-form-label">Hostelite*</label><br/>
							<input type="radio" required   name="hostelite" value="yes" > Yes&nbsp;&nbsp;&nbsp;
							<input type="radio" required   name="hostelite" value="No"> NO
						  </div>
						  
						  
					</div>
			
					
				
				<div class="form-group row">
				  
				  <div class="col-sm-7">
					<label for="example-url-input" class="col-2 col-form-label">Address*</label>
					<textarea class="form-control" required  placeholder="Complete address"  name="address" ><?php if(isset($address)){ echo $address;}?></textarea>
				  </div>
				  <div class="col-sm-5 ">
						<label for="example-url-input" class="col-2 col-form-label">Office/Institue Name*</label>
					<textarea class="form-control"   placeholder="Office/institue name"  name="institute_office" ><?php if(isset($institute_office)){ echo $institute_office;}?></textarea>
							
						 </div>
				</div>
				
				<div class="form-group row">
				  
					<div class="col-sm-7 ">
						<label for="example-url-input" class="col-2 col-form-label">Reffered By</label>
							<input class="form-control" type="text"  placeholder="Refferred By(Optional)" name="referred_by" value="<?php if(isset($referred_by)){ echo $referred_by;}?>">
						  </div>
						<div class="col-sm-5 ">
						<label for="example-url-input" class="col-2 col-form-label"></label>
							<button class="table-order__btn ui-btn ui-btn-primary btn-effect form-control" ><span class="fa fa-users"> Signup</span></button>
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
							<div class="col-lg-4 col-sm-12 col-sm-offset-1" style="margin-top:1%;" >
								<center><h4>Sign IN</h4></center> 
									
									<div style="padding:5%;border:2px solid #CC9928;">
									<center><p style="color:red"><?php if($this->session->userdata('error_signin')) { echo $this->session->userdata('error_signin'); $this->session->unset_userdata('error_signin');}?></p></center>
								<form action="<?php echo site_url('Ambassador/signin');?>" method="post" style="margin-top:6%;">	
									
									<div class="form-group row" >
					
						  
										  <div class="col-sm-12">
											<label for="example-text-input" class="col-2 col-form-label">Email/Phone*</label>
											<input class="form-control" type="email" required placeholder="Email or phone"  name="email">
										  </div>
						  
						  
									</div>
									<div class="form-group row">
					
						  
										  <div class="col-sm-12">
											<label for="example-text-input" class="col-2 col-form-label">Password*</label>
											<input class="form-control" type="password" required placeholder="Password"  name="password">
										  </div>
						  
						  
									</div>
									<div class="form-group row">
				  
				  
										  <div class="col-sm-12 ">
												<!--<center>	<button type="submit" id="submit_button" class="btn btn-danger btn-lg " style="width:100%;background:#8D401E;margin-top:20%">Place Order</button></center>-->
													<button class="table-order__btn ui-btn ui-btn-primary btn-effect form-control" ><span class="fa fa-user"> Signin</span></button>
												<a  style="cursor:pointer" href="#forgot_pass" data-toggle="modal">Forgot password?</a>
										</div>
									</div>
									
								</div>
								</form>
								<center><span style="color:white;font-size:12px" >You should be email verified and admin approved</span></center>
								
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
	/////////////////////////////////////
		$("#forgot_pass_form").submit(function(e){
			e.preventDefault();
		//alert();
			
        $.ajax({
		 type: "POST",
			url: "<?php echo site_url('Ambassador/forgot_pass');?>",
		 data: $(this).serialize(),
				 success: function(msg){
					// alert(msg); 
					
						$('#forgot_pass_area').html("<span style='color:orange'>"+msg+"</span></center>");
						$('#forgot_pass_form').hide();
					
				 },
				 beforeSend: function(){
						$('#forgot_pass_area').html("<center><span style='color:green'>Wait..</span></center>");
						$('#forgot_pass_form').hide();
   },
		 error: function(XMLHttpRequest, textStatus, errorThrown) { 
																	  // alert("Status: " + textStatus); alert("Error: " + errorThrown);
														//$('#cart_load').hide();
														$('#forgot_pass_area').html("<center><h2>Some thing is wrong</h2>Contact support! Or try again</center>");																	   
																	$('#forgot_pass_form').hide();
																	} 
			   });
		 });
		 //////////
		</script>
			

	</body>
</html>


