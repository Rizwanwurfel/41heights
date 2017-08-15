<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>41 Heights | Timings</title>
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
<!-- Site wrapper -->
<div class="wrapper">

  

  <!-- =============================================== -->

 <?php $this->load->view('admin/include/header');?>
  <?php 
		$this->session->set_userdata('main','rest_timing');
		$this->session->set_userdata('page','open_close');
		
		 ?>
 <?php $this->load->view('admin/include/sidebar');?>
 <!---------------------seting page active session--------------->

		 <?php
		$this->session->unset_userdata('main');
		$this->session->unset_userdata('page');
		
	?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Restaurant Opening Closing Time
        <small>41 Heights</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Opening closing time</a></li>
        <li class="active"></li>
      </ol>
    </section>
	<?php 
		
		if( $this->session->userdata('success')) {
		?>
		<div class="pad margin no-print" id="board">
          <div class="callout callout-success" style="margin-bottom: 0!important;">
            
           <i class="fa fa-info"> <?php echo $this->session->userdata('success');?></i>
          </div>
        </div>
		<?php 
		
		$this->session->unset_userdata('success');
		} ?>
		<?php 
		
		if( $this->session->userdata('failure')) {
		?>
		<div class="pad margin no-print" id="board" >
          <div class="callout callout-danger" style="margin-bottom: 0!important;">
            
           <i class="fa fa-info" > <?php echo $this->session->userdata('failure');?></i>
          </div>
        </div>
		<?php 
		
		$this->session->unset_userdata('failure');
		} ?>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Restaurant Opening/Closing Timing</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body" style="background:lightgray">
		<?php 
			
		//	var_dump($staff_role->result_array());
		?>
					<!-------------------------------------------------->
				<div class="col-lg-8 col-md-8 col-lg-offset-1" style="margin-top:3%;margin-bottom:3%">
				<?php //var_dump($timing->result_array());
						$opening_time=0;
						$closing_time=0;
						$status_rest="";
					if(isset($timing)&& $timing!=false)
					{
						foreach($timing->result_array() as $times)
						{
							$opening_time=$times['opening_time'];
							$closing_time=$times['closing_time'];
							$status_res=$times['emergency_status'];
						}
					}
					
				?>
				<center>
					<b>Restaurant currrent Opening Time : <span style="color:red"><?php echo $opening_time; ?></span></b><br/>
					<b>Restaurant current Closing Time : <span style="color:red"><?php echo $closing_time; ?></span></b><br/><br/>
					<b>Restaurant Emergency status : <span style="color:red">Restaurant is currently <?php echo $status_res; ?></span></b><br/><br/>
				</center>
				<hr/>
				<form action="<?php echo site_url('Rest_timing/update_rest_timing');?>" method="post"  enctype="multipart/form-data">
				
					 
					  
					  
				<div class="row">  
					  <br>
					  <div class="col-lg-3">
						 <div class="input-group ">
								<label>Opening time</label>
								
								
						  </div>
					</div>
					<div class="col-lg-3">
						 <div class="input-group ">
								<span class="input-group-addon"><i class=""></i>hr</span>
								<select class="form-control" name="op_hr">
								<?php 
									for($hr=0;$hr<=23;$hr++){ 
										if($hr<=9)
										{ ?>
											<option value="<?php echo "0".$hr;?>"><?php echo "0".$hr;?></option>
									<?php	} else{ 
										
									?>
									<option value="<?php echo $hr;?>"><?php echo $hr;?></option>
								<?php }} ?>
									
								</select>
								
						  </div>
					</div>
					<div class="col-lg-3">
						 <div class="input-group ">
								<span class="input-group-addon"><i class=""></i>min</span>
								<select class="form-control" name="op_min">
									<?php for($min=0;$min<=59;$min++){ 
										if($min<=9)
										{ ?>
											<option value="<?php echo "0".$min;?>"><?php echo "0".$min;?></option>
										<?php	} else{ 
										
									?>
									
									<option value="<?php echo $min;?>"><?php echo $min;?></option>
								<?php } }?>
								</select>
								
						  </div>
					</div>

						<div class="col-lg-3">
						 <div class="input-group ">
								<span class="input-group-addon"><i class=""></i>sec</span>
								<select class="form-control" name="op_sec">
									<?php for($min=0;$min<=59;$min++){ 
										if($min<=9)
										{ ?>
											<option value="<?php echo "0".$min;?>"><?php echo "0".$min;?></option>
										<?php	} else{ 
										
									?>
									<option value="<?php echo $min;?>"><?php echo $min;?></option>
								<?php }} ?>
								</select>
								
						  </div>
						</div>
				</div>
					<div class="row">  
					  <br>
					  <div class="col-lg-3">
						 <div class="input-group ">
								<label>Closing time</label>
								
								
						  </div>
					</div>
					<div class="col-lg-3">
						 <div class="input-group ">
								<span class="input-group-addon"><i class=""></i>hr</span>
								<select class="form-control" name="cl_hr">
								<?php 
									for($hr=0;$hr<=23;$hr++){ 
										if($hr<=9)
										{ ?>
											<option value="<?php echo "0".$hr;?>"><?php echo "0".$hr;?></option>
									<?php	} else{ 
										
									?>
									<option value="<?php echo $hr;?>"><?php echo $hr;?></option>
								<?php }} ?>
									
								</select>
								
						  </div>
					</div>
					<div class="col-lg-3">
						 <div class="input-group ">
								<span class="input-group-addon"><i class=""></i>min</span>
								<select class="form-control" name="cl_min">
									<?php for($min=0;$min<=59;$min++){ 
										if($min<=9)
										{ ?>
											<option value="<?php echo "0".$min;?>"><?php echo "0".$min;?></option>
										<?php	} else{ 
										
									?>
									<option value="<?php echo $min;?>"><?php echo $min;?></option>
								<?php }} ?>
								</select>
								
						  </div>
					</div>

						<div class="col-lg-3">
						 <div class="input-group ">
								<span class="input-group-addon"><i class=""></i>sec</span>
								<select class="form-control" name="cl_sec">
									<?php for($min=0;$min<=59;$min++){ 
										if($min<=9)
										{ ?>
											<option value="<?php echo "0".$min;?>"><?php echo "0".$min;?></option>
										<?php	} else{ 
										
									?>
									<option value="<?php echo $min;?>"><?php echo $min;?></option>
								<?php }} ?>
								</select>
								
						  </div>
						</div>
				</div>
					<div class="row">  
					  <br>
					  <div class="col-lg-3">
						 <div class="input-group ">
								<label>Emergency status/Holiday</label>
								
								
						  </div>
					</div>
					<div class="col-lg-6">
						 <div class="input-group ">
								<span class="input-group-addon"><i class="fa fa-alert"></i></span>
								<select class="form-control" name="emergency_status">
								
									<option value="open" <?php if($status_res=="open"){echo "selected";}?>>Show Restaurant Open</option>
									<option value="close" <?php if($status_res=="close"){echo "selected";}?>>Show Restaurant Close</option>
								
									
								</select>
								
						  </div>
					</div>
					

						
				</div>
					
					  <br>
					  <br>
					  <br>
					  <div class="col-sm-12 col-lg-offset-3">
							<div class="col-sm-4 ">
							
									<button type="submit"  class="form-control btn btn-success add_btn" > Submit</button>
							
							</div>
							<div class="col-sm-4 ">
							
									<a href="<?php echo site_url('Welcome/dashboard_load');?>" required class="form-control btn btn-danger">Cancel</a>
							
							</div>
							
							
					  </div>
					  <br>
		</form>
              </div>
			
           
         
					<!-------------------------------------------------->
        </div>
        <!-- /.box-body -->
        <div class="box-footer" >
			<span style="color:red" id="notice"></span>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php $this->load->view('admin/include/footer');?>

  <!-- Control Sidebar -->
 <?php $this->load->view('admin/include/setting_aside_bar');?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script type = "text/javascript" src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
	var baseURL = "<?php echo site_url(); ?>";
</script>
<script src="<?php echo base_url()?>/public/theme/dist/js/notification.js"></script>
  <script type="text/javascript">

   ///////////////////////////////////////function for hide alert notified bar with delay/////////
			function hide_bar()
			{
				window.setTimeout(function(){
               
						$(".pad margin no-print").hide();
							$("#board").hide();				 
                  }, 3000);
							
							
			}
  
  	$('document').ready(function() {  
						hide_bar();
					setInterval(function() {
						
						 check_noti();
						 check_label();
						}, 1000*5);
					
		   
		});
       
      </script>

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url()?>/public/theme/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url()?>/public/theme/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url()?>/public/theme/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()?>/public/theme/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>/public/theme/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>/public/theme/dist/js/demo.js"></script>

<!---------------------------------->
<script>
	function check_pass_match(e){
	
	var a=document.getElementById("staff_pass").value;
	var b=document.getElementById("staff_cpass").value;
	if(a!=b)
	{
			$(".add_btn").attr("disabled", "true");
			$("#staff_cpass").css("border","1px solid red");
			document.getElementById("notice").innerHTML="<b>password mismatched</b>";
	}
	else
	{
		$(".add_btn").removeAttr("disabled");
		$("#staff_cpass").css("border","1px solid lightgray");
		document.getElementById("notice").innerHTML="";
	}
	
	
	}
	///////////////////////////////////////
	/*$('document').ready(function() {  
						
					setInterval(function() {
							$(".pad margin no-print").hide();
							$("#board").hide();
						 
						}, 1000*4);	
		   
		});*/
</script>
</body>
</html>
