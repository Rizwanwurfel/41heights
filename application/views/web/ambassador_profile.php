<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
		<title>41 Heights, Ambassador profile</title>

    	<link href="favicon.png" type="image/x-icon" rel="shortcut icon">
		<link href="<?php echo base_url()?>/public/web_template/assets/css/master.css" rel="stylesheet">
		<script src="<?php echo base_url()?>/public/web_template/assets/plugins/jquery/jquery-1.11.3.min.js"></script>
		<style>
			#photo_label {
   cursor: pointer;
   /* Style as you please, it will become the visible UI component. */
}

#upload-photo {
   opacity: 0;
   position: absolute;
   z-index: -1;
}
		</style>
	</head>


	<body>

		<!-- Loader -->
		<div id="page-preloader"><span class="spinner"></span></div>
		<!-- Loader end -->

  <!---------------------------------------------------------------------------------------------------------------------------->
<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			
			<!-- /.modal -->
  <!--------------------------------->
		<div class="layout-theme animated-css" id="wrapper" data-header="sticky" data-header-top="200">

			<div id="sb-site">

				<div class="wrap-content">


					<!-- HEADER -->
					<?php $this->load->view('web/include/header');?>
					<!-- end header -->

				
					<!-- end section-title -->
					
					<div class="container">
					
									
										<ul class="nav nav-tabs">
										  <li class="active"><a data-toggle="tab" href="#home">profile</a></li>
										  <li><a data-toggle="tab" href="#edit_profile">Edit profile</a></li>
										  <li><a data-toggle="tab" href="#change_pass">Change password</a></li>
										  <li><a data-toggle="tab" href="#view_orders">View orders</a></li>
										</ul>

										<div class="tab-content">
										  <div id="home" class="tab-pane fade in active">
												<div class="row" style="">
													<div class="col-lg-4" >
														
															<?php if(isset($amb_data->amb_image) && !empty($amb_data->amb_image)){ ?>
														  <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url($amb_data->amb_image);?>" style="width:200px;height:220px" alt="User profile picture">
														  <?php } else{?>
														<img src="<?php echo base_url();?>public/images/no_profile.png" style="width:200px;height:220px" class="profile-user-img img-responsive img-circle" alt="User Image">
															<?php }?>
														  <h3 style="" class="af_amb_name"><?php echo $amb_data->amb_name;?></h3>
														
													</div>
													
													<div class="col-lg-4">
														<div class="jumbotron" style="color:#D94F2B;background:#151515">
															<b><span class="fa fa-key"> Ref id: </span> <br/><span style="color:#FDBB2A"><?php echo $this->session->userdata('ambs_ref_id');?></span></b><br/>
															<b><span class="fa fa-envelope"> Email: </span><br/><span style="color:#FDBB2A"> <?php echo $this->session->userdata('ambs_email');?></span></b><br/>
															<b><span class="fa fa-mobile"> Phone: </span><br/><span style="color:#FDBB2A" class="af_amb_phone"> <?php echo $amb_data->amb_phone;?></span></b><br/>
															
															
														</div>
														
													</div>
													
													<div class="col-lg-4">
															<div class="jumbotron" style="color:#D94F2B;background:#151515;">
															<b><span class="fa fa-map-marker"> Address: </span> <br/><span style="color:#FDBB2A" class="af_amb_address"><?php echo $amb_data->amb_address;?></span></b><br/>
															<b><span class="fa fa-building-o"> Office: </span><br/><span style="color:#FDBB2A" class="af_amb_office"> <?php echo $amb_data->amb_office;?></span></b><br/>
															<b><span class="fa fa-money"> Points: </span><br/><span style="color:#FDBB2A"> <?php echo $amb_data->amb_ref_points;?></span></b><br/>
															
															
														</div>
													</div>
													
												</div>
              
										  </div>
										  
										  <!---------------------------------------------->
										  <div id="edit_profile" class="tab-pane fade">
																	<div class="row" style="">
												<form action="<?php echo site_url('Ambassador/update_profile');?>" method="post" enctype="multipart/form-data" id="profile_update_form">
													<div class="col-lg-4" >
														
															<?php if(isset($amb_data->amb_image) && !empty($amb_data->amb_image)){ ?>
														  <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url($amb_data->amb_image);?>" style="width:200px;height:220px" alt="User profile picture">
														  <?php } else{?>
														<img src="<?php echo base_url();?>public/images/no_profile.png" style="width:200px;height:220px" class="profile-user-img img-responsive img-circle" alt="User Image">
															<?php }?>
															<br/>
															<!--<label> change Image</label>
														  <input  type="file" style="opacity: 0">-->
														 <label for="upload-photo" id="photo_label" style="padding-left:10%">Change Profile Pic<span style="font-size:12px"> (Max 2mb)</span></label>
															<input type="file" name="photo" id="upload-photo" />
														
													</div>
													
													<div class="col-lg-7">
														<div class="form-group row">
					
															  <div class="col-sm-12 col-lg-4 col-col-md-6">
																<label for="example-text-input" class="col-2 col-form-label">Name*</label>
																<input class="form-control af_amb_name" type="text" required placeholder="Full name" name="name" value="<?php echo $amb_data->amb_name;?>">
															  </div>
															   <div class="col-sm-12 col-lg-4 col-col-md-6">
																<label for="example-text-input" class="col-2 col-form-label">Phone#*</label>
																<input class="form-control af_amb_phone" type="text" required placeholder="Phone" name="phone" value="<?php echo $amb_data->amb_phone;?>">
																<input class="form-control" type="hidden" required placeholder="amb_id" name="amb_id" value="<?php echo $amb_data->amb_id;?>">
																<input class="form-control" type="hidden" required placeholder="old_image" id="old_image" name="old_image" value="<?php echo $amb_data->amb_image;?>">
															  </div>
															  <div class="col-sm-12 col-lg-4 col-col-md-6">
																<label for="example-text-input" class="col-2 col-form-label">Hostelite</label>
																<select class="form-control" style="color:orange" name="hostelite">
																	<option <?php if($amb_data->hostelite=="1"){ echo "selected";}?> value="1">Yes</option>
																	<option <?php if($amb_data->hostelite=="0"){ echo "selected";}?> value="0" >No</option>
																</select>
															  </div>
															 
															  
															  
														</div>
														<div class="form-group row">
					
															  <div class="col-sm-12 col-lg-6 col-col-md-6">
																<label for="example-text-input" class="col-2 col-form-label">Address*</label>
																<textarea class="form-control af_amb_address"  required placeholder="Address" name="address"> <?php echo $amb_data->amb_address;?></textarea>
															  </div>
															   <div class="col-sm-12 col-lg-6 col-col-md-6">
																<label for="example-text-input" class="col-2 col-form-label">Office*</label>
																<textarea class="form-control af_amb_office" type="text" required placeholder="Institute/office" name="office" ><?php echo $amb_data->amb_office;?></textarea>
															  </div>
															  
															  
															  
															  
														</div>
														<div class="form-group row">
				  
				  
														  <div class="col-sm-12 col-lg-6 ">
																
																	<button class="table-order__btn ui-btn ui-btn-primary btn-effect form-control" ><span class="fa fa-pencil"> Update</span></button>
															
														</div>
														<div class="col-sm-12 col-lg-6 ">
																
																	<span id="profile_not_area"></span>
															
														</div>
									</div>
														
													</div>
													
													</form>
													
												</div>
										  </div>
										  <!----------------------------------------------------->
										  <div id="change_pass" class="tab-pane fade">
												<div class="row">
													 <div class="col-sm-10 col-lg-4 col-col-md-6 col-lg-offset-2">
														<form action="<?php echo site_url('Ambassador/change_pass');?>" method="post" id="pass_update_form">
																
																<label for="example-text-input" class="col-2 col-form-label">Current Password</label>
																<input class="form-control" type="password" required placeholder="password" id="cur_pass" name="curr_password" >
																<input type="hidden" name="amb_id" value="<?php echo $amb_data->amb_id;?>">
																
																<label for="example-text-input" class="col-2 col-form-label">New Password</label>
																<input class="form-control" type="password" required placeholder="password" id="ch_pass" name="password" >
																
																<label for="example-text-input" class="col-2 col-form-label">Conform Password</label>
																<input class="form-control" type="password" required placeholder="confrom password" id="ch_pass_con" name="conform_pass" >
																<button class="table-order__btn ui-btn ui-btn-primary btn-effect form-control" ><span class="fa fa-pencil"> Update</span></button>
														</form>
															 </div>
												
															  <div class="col-sm-10 col-lg-4 col-col-md-6 col-lg-offset-2">
															 <span id="pass_not_area"></span>
															  <img src="<?php echo base_url('public/images/admin.png');?>" width="50%" style="margin-top:10%">
															   
															  
																
															  </div>
												</div>
										  </div>
										  <div id="view_orders" class="tab-pane fade">
														<h3>Orders</h3>
														
										  </div>
										</div>
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
		$("#profile_update_form").submit(function(e){
			e.preventDefault();
		
        $.ajax({
		 type: "POST",
			url: "<?php echo site_url('Ambassador/update_profile');?>",
		 data:  new FormData(this),
    contentType: false,
	dataType:"json",
    cache: false,
    processData:false,
		 ///		
		 beforeSend: function(){
						$('#profile_not_area').html("<center><span style='color:Orange'>Updating..</span></center>");
						$(".profile-user-img").attr('src',"<?php echo base_url('public/images/load2.gif');?>");
   },
				 success: function(msg){
				 //obj= JSON.stringify(msg) ;
					if(msg=="failed")
					{
						$('#profile_not_area').html("<center><span style='color:orange'>"+msg+"</span></center>");
					}
					else{
						$('#profile_not_area').html("<center><span style='color:orange'>Updated Successfully!</span></center>");
						$(".profile-user-img").attr('src',"<?php echo base_url();?>/"+msg.amb_image+"");
						$(".af_amb_name").html(msg.amb_name);
						$(".af_amb_phone").html(msg.amb_phone);
						$(".af_amb_address").html(msg.amb_address);
						$(".af_amb_office").html(msg.amb_office);
						$("#old_image").val(msg.amb_image);
						}
						
					
				 },
	
		 error: function(XMLHttpRequest, textStatus, errorThrown) { 
																	  
														$('#profile_not_area').html("<center>Some thing is wrong Contact support! Or try again</center>");																	   
																//	$('#forgot_pass_form').hide();
																	} 
			   });
		 });
		 /////////////////////////////////
		 //////////////////////////////function to update password//////////////////////
		 /////////////////////////////////////
		$("#pass_update_form").submit(function(e){
			e.preventDefault();
		//alert();
			
        $.ajax({
		 type: "POST",
			url: "<?php echo site_url('Ambassador/change_pass');?>",
		 ///
		 data:  new FormData(this),
    contentType: false,
    cache: false,
    processData:false,
		 ///
				 success: function(msg){
					// alert(msg); 
					if(msg=="Updated Successfully")
					{
						$("#cur_pass").val("");
						$("#ch_pass").val("");
						$("#ch_pass_con").val("");
					}
						$('#pass_not_area').html("<span style='color:orange'>"+msg+"</span>");
						//$('#forgot_pass_form').hide();
					
				 },
				 beforeSend: function(){
						$('#pass_not_area').html("<span style='color:Orange'>Updating..</span>");
						//$('#forgot_pass_form').hide();
   },
		 error: function(XMLHttpRequest, textStatus, errorThrown) { 
																	   //alert("Status: " + textStatus); alert("Error: " + errorThrown);
														//$('#cart_load').hide();
														$('#pass_not_area').html("<center><h2>Some thing is wrong</h2>Contact support! Or try again</center>");																	   
																//	$('#forgot_pass_form').hide();
																	} 
			   });
		 });
		</script>
			

	</body>
</html>


