<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>41Heights | User Profile</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url()?>/public/theme/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>/public/theme/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>/public/theme/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  
  <!-- Left side column. contains the logo and sidebar -->
  <!----------------header-------------------------->
		 <?php $this->load->view('admin/include/header.php');?>
		 <!----------------header-------------------------->
  <!-- Left side column. contains the logo and sidebar -->
 
	<!----------------sidebar-------------------------->
		 <?php $this->load->view('admin/include/sidebar.php');?>
		 <!----------------sidebar-------------------------->

  <!-- Content Wrapper. Contains page content -->
				 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		
        <section class="content-header">
          <h1>
            User Profile
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
           <!-- <li><a href="#">Examples</a></li>-->
            <li class="active">User profile</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-3">
				
				<?php
						// base_url('profile_controller/profile_detail/'.$this->session->userdata('user_id'));
						foreach($data->result_array() as $rows){
							
						
				?>
              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
				<?php if(!empty($rows['user_image'])){ ?>
                  <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url($rows['user_image']);?>" alt="User profile picture">
				  <?php } else{?>
				<img src="<?php echo base_url();?>public/images/no_profile.png" class="profile-user-img img-responsive img-circle" alt="User Image">
					<?php }?>
                  <h3 class="profile-username text-center"><?php echo $rows['user_name'];?></h3>
                  <p class="text-muted text-center">
					
								<?php
										
										if($rows['user_role']==1){
										
											echo "super admin";
										
										}
										if($rows['user_role']==2){
										
											echo "admin";
										
										}
										if($rows['user_role']==3){
										
											echo "user";
										
										}
								?>
				  </p>

                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Email</b> <a class="pull-right" ><?php echo $rows['user_email'];?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Phone</b> <a class="pull-right" id="box_user_phone">
							<?php
									
									if(!empty($rows['user_phone']))
									{
										echo $rows['user_phone'];
									}
									else
									{
										echo "xxxx-xxxxxxx";
									}
										
							?>
					  </a>
                    </li>
                    <li class="list-group-item">
                      <b>Address</b> <a class="pull-right" id="box_user_address">
						<?php 
							if(!empty($rows['user_address']))
							{
							echo $rows['user_address'];
							}
							else
							{
								echo "NIL";
							}
						?>
					  </a>
                    </li>
                  </ul>
<?php } ?>
                  <a href="javascript:" class="btn btn-primary btn-block" disabled style="cursor:pointer"><b>&nbsp;&nbsp;&nbsp;</b></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- About Me Box -->
            <!--  <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">About Me</h3>
                </div><!-- /.box-header -->
               <!-- <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i>  Education</strong>
                  <p class="text-muted">
                    B.S. in Computer Science from the University of Tennessee at Knoxville
                  </p>

                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                  <p class="text-muted">Malibu, California</p>

                  <hr>

                  <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
                  <p>
                    <span class="label label-danger">UI Design</span>
                    <span class="label label-success">Coding</span>
                    <span class="label label-info">Javascript</span>
                    <span class="label label-warning">PHP</span>
                    <span class="label label-primary">Node.js</span>
                  </p>

                  <hr>

                  <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                </div><!-- /.box-body -->
            <!--  </div>--><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
			  <?php
					
				if ($this->session->userdata('success')) { ?>
				<div style="height:40px;"  class="alert alert-success alert-dismissable re">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p>	<i class="icon fa fa-check"></i> successfully changed image</p>
                    .
                  </div>
				  <?php 
							$this->session->unset_userdata('success');
					}
				  ?>
				  
				   <?php
					
				if ($this->session->userdata('failure')) { ?>
				<div style="height:40px;"  class="alert alert-danger alert-dismissable re">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<p>	<i class="icon fa fa-check"></i> Failed to Update image</p>
                    .
                  </div>
				  <?php 
							$this->session->unset_userdata('failure');
					}
				  ?>
                <ul class="nav nav-tabs">
                 <li class="active" ><a href="#activity" data-toggle="tab">Profile</a></li>
                  <li ><a href="#timeline" data-toggle="tab">Change password</a></li>
                  <li><a href="#settings" data-toggle="tab">Edit profile</a></li>
                  <li><a href="#profile_image_change" data-toggle="tab">Change Profile Image</a></li>
                </ul>
                <div class="tab-content">
				<!-------------------------------------------------------------------------------------------->
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
							  <form class="form-horizontal">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>
						 <div class="col-sm-10">
                          <input name="profile_user_name" id="profile_user_name" style="border:none" readonly  class="form-control"  placeholder="name" value="<?php echo $rows['user_name'];?>">
                        </div>
						
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input  style="border:none" readonly type="email" class="form-control" value="<?php echo $rows['user_email'];?>" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">phone1</label>
                         <div class="col-sm-10">
                          <input  name="profile_user_phone1" id="profile_user_phone1" style="border:none" readonly type="text" class="form-control" value="<?php if ($rows['user_phone']==0){ echo "xxxx-xxxxxxx" ;} else{ echo $rows['user_phone']; }?>" placeholder="phone1">
                        </div>
                      </div>
					
                      <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">address</label>
                        <div class="col-sm-10">
                          <textarea name="profile_user_address" id="profile_user_address" class="form-control"  placeholder="address" readonly><?php if(!empty($rows['user_address'])) { echo $rows['user_address']; } else {echo "Not entered"; } ?></textarea>
                        </div>
                      </div>
                       
                     <!-- <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>-->
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                        <!--  <button type="submit" class="btn btn-danger"></button>-->
                        </div>
                      </div>
                    </form>
                   <!-- /.post -->
                  </div><!-- /.tab-pane -->
				  
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
					  <form class="form-horizontal" method="post">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">Enter Old Password</label>
						 <div class="col-sm-4">
                          <input   type="password" required class="form-control" onfocus="remove_notice()" placeholder="Enter old password" id="old_pass" name="old_pass"/>
                        </div>
						
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-4 control-label">Enter New Password</label>
                        <div class="col-sm-4">
                          <input    type="password" required class="form-control" onfocus="remove_notice()" name="new_pass" id="new_pass" placeholder="Enter New Password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">Conform New Password</label>
                         <div class="col-sm-4">
                          <input    type="password" required class="form-control" onfocus="remove_notice()" id="con_pass" name="con_pass"  placeholder="Confrom New Password">
                        </div>
									
						</div><br>
						<input type="hidden" id="password_from_address" value="<?php echo site_url('Profile/update_password');?>"/>
						<div class="form-group">
                        <div class="col-sm-offset-2 col-sm-7">
                         <center>  <button  type="submit" class="btn btn-success" id="password_update" >Update</button>
						  <button type="reset" class="btn btn-danger">cancel</button></center>
                        </div>
                      </div>
                      
					  </form>
					 <p id="notice"></p>
							<!-- <div id="notice">
								
							 </div>-->
                  </div><!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                   	  <form class="form-horizontal">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>
						 <div class="col-sm-10">
                          <input  style="" name="user_edit_name" id="user_edit_name" required class="form-control"  placeholder="name" value="<?php echo $rows['user_name'];?>">
                        </div>
						
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input  style="" name="user_edit_email" id="user_edit_email" readonly type="email" class="form-control" value="<?php echo $rows['user_email'];?>" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">phone</label>
                         <div class="col-sm-10">
                          <input   name="user_edit_phone" id="user_edit_phone" required type="text" class="form-control" value="<?php if ($rows['user_phone']==0){ } else{ echo $rows['user_phone']; }?>" placeholder="phone1">
                        </div>
                      </div>
					
                      <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">address</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" required name="user_edit_address" id="user_edit_address"  placeholder="address" ><?php echo $rows['user_address'];?></textarea>
                        </div>
                      </div>
                    
                    
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                         
                        </div>
                      </div>
                    <input type="hidden" value="<?php echo site_url('Profile/update_profile')?>" id="get_edit_address"/>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-success " id="update_prof">Update</button>
						  <button type="button" class="btn btn-danger">cancel</button>
                        </div>
                      </div>
					  <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-7">
                         <p id="notice_edit"></p>
                        </div>
                      </div>
                    </form>
					
                  </div><!-- /.tab-pane -->
				  <!-----------------for profile image change---------------->
				       <div class="tab-pane" id="profile_image_change">
                    <!-- The timeline -->
					  <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo site_url('Profile/update_profile_image');?>">
                     
                      <br><br>
					    <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label"></label>
                         <div class="col-sm-4">
						 <?php if(!empty($rows['user_image'])){ ?>
                          <img src="<?php echo base_url($rows['user_image'])?>"  class="form-control" height="400px" style="height:200px" />
						  <?php } else{?>
						<img src="<?php echo base_url();?>public/images/no_profile.png" class="form-control" height="400px" style="height:200px"alt="User Image">
							<?php }?>
                        </div>
									
						</div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">Choose image</label>
                         <div class="col-sm-4">
                          <input    type="file" required class="form-control" name="upload" id="upload"/>
                        </div>
									
						</div><br><br>
						
						<div class="form-group">
                        <div class="col-sm-offset-2 col-sm-7">
                         <center>  <button  type="submit" class="btn btn-success" id="prfile_image_update" >Update</button>
						  <button type="reset" class="btn btn-danger">cancel</button></center>
                        </div>
                      </div>
                      
					  </form>
					 <p id="notice_image_update"></p>
					 
							<!-- <div id="notice">
								
							 </div>-->
                  </div><!-- /.tab-pane -->
				  <!--------------------------------------------------------------->
                </div><!-- /.tab-content -->
				
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
			
          </div><!-- /.row -->

        </section><!-- /.content -->
			
      </div>
  <!-- /.content-wrapper -->
 <!----------------footer-------------------------->
		 <?php $this->load->view('admin/include/footer');?>
 <!----------------footer-------------------------->

  <!-- Control Sidebar -->
 <?php $this->load->view('admin/include/setting_aside_bar');?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url()?>/public/theme/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url()?>/public/theme/bootstrap/js/bootstrap.min.js"></script>

<!-- FastClick -->
<script src="<?php echo base_url()?>/public/theme/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>/public/theme/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>/public/theme/dist/js/demo.js"></script>

</body>
<!------------------------------------------------------------------------------------------>

	
<script type="text/javascript">
			 $('#password_update').click(function(e){
							  e.preventDefault();
							 $("#notice").html("<span style='color:green'>wait updating..</span>");
							 var new_pass=$("#new_pass").val();
							  var con_pass=$("#con_pass").val();
							  var old_pass=$("#old_pass").val();
							  var get_address=$("#password_from_address").val();
							  if(new_pass.length<=5)
								{
									$("#notice").html("<span style='color:red'>X Minimum 6 characters require for new password</span>");
							  return false;
							  }
							 if(new_pass!=con_pass){
							 $("#notice").html("<span style='color:red'>New password mismatched</span>");
							 return false;
							
							 }
							 if(new_pass.trim()=="" || con_pass.trim()==""){
							 $("#notice").html("<span style='color:red'>Fill empty fields first</span>");
							 return false;
							
							 }
							
							
							//alert(get_address);
							 $.post(get_address,{ old_pass:old_pass, new_pass:new_pass,con_pass:con_pass},function(ajaxresult){
							 //$('#msg').val('');
							
							 
							$("#notice").html(ajaxresult);
							$("#new_pass").val("");
							 $("#con_pass").val("");
							 $("#old_pass").val("");
							setInterval(function() {
							$("#notice").html("");
						 // $("#notice").innerHTML="";
						}, 1000*5);
							
							
							 
								
								});//$.post ending
	
	
	 });
	  /////////////////function for updating profile////////////////////////////////////
	 
							 $('#update_prof').click(function(e){
							 $("#notice_edit").html("<span style='color:green'>wait updating..</span>");
							  e.preventDefault();
							 var user_name=$("#user_edit_name").val();
							  var user_phone=$("#user_edit_phone").val();
							//  alert(user_phone);
							  var user_address=$("#user_edit_address").val();
							  
							  var get_edit_address=$("#get_edit_address").val();
							 // alert(get_edit_address);
							 if(user_name.trim()=="" || user_phone.trim()==""  || user_address.trim()==""){
							 $("#notice_edit").html("<span style='color:red'>fill empty fields</span>");
							 return false;
							
							 }
							
							
							//alert(get_address);
							 $.post(get_edit_address,{ user_name:user_name, user_phone:user_phone,user_address:user_address},function(ajaxresult){
							 //$('#msg').val('');
							
							 
							$("#notice_edit").html(ajaxresult);
							/////////
							$("#box_user_phone").html(user_phone);
							$("#box_user_address").html(user_address);
							////////////////
							$("#profile_user_name").val(user_name);
							$("#profile_user_phone").val(user_phone);
							
							$("#profile_user_address").html(user_address);
							
							setInterval(function() {
							$("#notice_edit").html("");
							
							
						}, 1000*5);
							
							
							 
								
								});//$.post ending
	
	
	 });
	 /////////////////////////////
	 function remove_notice(){
	 $('#notice').html("");
	 }
	 //////////////////////////
	
</script>
<!------------------------------------------------------------------------------------------>
</html>
