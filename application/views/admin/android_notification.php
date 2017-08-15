<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>41 Heights | send notifications</title>
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
		$this->session->set_userdata('main','android_not');
		//$this->session->set_userdata('main_sub','menu_cat');
		
		 ?>
 <?php $this->load->view('admin/include/sidebar');?>
 <!---------------------seting page active session--------------->

		 <?php
		$this->session->unset_userdata('main');
	//	$this->session->unset_userdata('main_sub');
		
	?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Send Promotional notifications
        <small>41 Heights</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">notifications</a></li>
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
          <h3 class="box-title">send notifications</h3>

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
				<div class="col-lg-5 col-md-8 col-lg-offset-2" style="margin-top:3%;margin-bottom:3%">
				<center><div id="duplicate_notice"></div></center>
				<form action="<?php echo site_url('Notification/send_android_notification');?>" method="post"  enctype="multipart/form-data">
				
					  <br>
					  <div class="input-group ">
							<span class="input-group-addon"><i class="fa fa-bullhorn"></i></span>
							<input type="text"  name="not_title" required class="form-control" placeholder="Enter Title">
					  </div>
					  <br>
					<div class="input-group ">
							<span class="input-group-addon"><i class="fa fa-at"></i></span>
							<input type="text"  name="not_url" required class="form-control" placeholder="Enter URL( package name of app)">
					  </div>
					  
					  <br>
					   <div class="input-group ">
							<span class="input-group-addon"><i class="fa fa-info"></i></span>
						<!--	<input type="text" name="staff_name" required class="form-control" placeholder="Name">-->
							<textarea required placeholder="enter small description" name="not_desc" class="form-control" ></textarea>
					  </div>
					  <br>
					 <div class="input-group ">
							<span class="input-group-addon"><i class="fa fa-mobile"></i></span>
							<select class="form-control" name="not_type">
								<option value="self">Target self app</option>
								<option value="other">Target other app</option>
							</select>
							
					  </div>
					 <br>
					  <div class="input-group ">
							<span class="input-group-addon"><i class="fa  fa-file-image-o"> PNG only </i></span>
							<input type="file" name="not_image"   class="form-control">
					  </div>
					  <br>
					
					  <br>
					  <div class="col-sm-12 col-lg-offset-1">
							<div class="col-sm-4 ">
							
									<button type="submit"  class="form-control btn btn-success add_btn" > Send</button>
							
							</div>
							<div class="col-sm-4 ">
							
									<a href="<?php echo site_url('Welcome/dashboard_load');?>" required class="form-control btn btn-danger">Cancel</a>
							
							</div>
							
							
					  </div>
					  <br>
		</form>
              </div>
			
            <div class="col-lg-5 col-md-4 hidden-xs hidden-sm">
				<center>
					<img src="<?php echo base_url('public/images/noti.png')?>" width="50%" class="img-responsive" style="padding-top:15%">
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
