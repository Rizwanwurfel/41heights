<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>41 Heights| Add Staff</title>
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
		$this->session->set_userdata('main','user_management');
		$this->session->set_userdata('main_sub','staff_management');
		$this->session->set_userdata('page','add_staff');
		 ?>
 <?php $this->load->view('admin/include/sidebar');?>
 <!---------------------seting page active session--------------->

		 <?php
		$this->session->unset_userdata('main');
		$this->session->unset_userdata('main_sub');
		$this->session->unset_userdata('page');
	?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add staff
        <small>41 Heights</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Staff Management</a></li>
        <li class="active">Add staff</li>
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
          <h3 class="box-title">Add staff</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body" style="background:lightgray">
		<?php 
			if($staff_role!=false) {
		//	var_dump($staff_role->result_array());
		?>
					<!-------------------------------------------------->
				<div class="col-lg-5 col-md-8 col-lg-offset-2" style="margin-top:3%;margin-bottom:3%">
				<form action="<?php echo site_url('Staff/add_staff');?>" method="post">
					<div class="input-group ">
							<span class="input-group-addon"><i class="fa fa-street-view"></i></span>
									
									<?php foreach($staff_role->result_array() as $role){ ?>
										
										<input type="text" readonly class="form-control" value="<?php echo $role['user_role_name'];?>"/>
										<input type="hidden" class="form-control" name="staff_role" value="<?php echo $role['user_role_id'];?>"/>
										<?php } ?>
									
									
					  </div>
					  <br>
					  <div class="input-group ">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<input type="email" name="staff_email" required class="form-control" placeholder="Email">
					  </div>
					  <br>
					   <div class="input-group ">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input type="text" name="staff_name" required class="form-control" placeholder="Name">
					  </div>
					  <br>
					  <div class="input-group ">
							<span class="input-group-addon"><i class="fa  fa-key"></i></span>
							<input type="password" name="staff_pass" id="staff_pass" required class="form-control" placeholder="password">
					  </div>
					  <br>
					  <div class="input-group ">
							<span class="input-group-addon"><i class="fa  fa-key"></i></span>
							<input type="password" name="staff_cpass" id="staff_cpass" required onkeyup="check_pass_match()" class="form-control" placeholder="conform password">
					  </div>
					  <br>
					  <div class="col-sm-12 col-lg-offset-1">
							<div class="col-sm-4 ">
							
									<button type="submit" required class="form-control btn btn-success add_btn" > Add</button>
							
							</div>
							<div class="col-sm-4 ">
							
									<a href="<?php echo site_url('Welcome/dashboard_load');?>" required class="form-control btn btn-danger">Cancel</a>
							
							</div>
							
							
					  </div>
					  <br>
		</form>
              </div>
			  <?php } else { echo "<center><h3 style='color:red'>user roles are not defined! contact admin </h3></center>"; } ?>
            <div class="col-lg-5 col-md-4 hidden-xs hidden-sm">
				<center>
					<img src="<?php echo base_url('public/images/admin2.png')?>" class="img-responsive">
				</center>
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
	$('document').ready(function() {  
						
					setInterval(function() {
							$(".pad margin no-print").hide();
							$("#board").hide();
						 
						}, 1000*4);	
		   
		});
</script>
</body>
</html>
