<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Uniscreen| Add food item</title>
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

 <?php $this->load->view('include/header');?>
  <?php 
		$this->session->set_userdata('main','menu_management');
		$this->session->set_userdata('main_sub','menu_food');
		$this->session->set_userdata('page','add_food_item');
		 ?>
 <?php $this->load->view('include/sidebar');?>
 <!---------------------seting page active session--------------->

		 <?php
		$this->session->unset_userdata('main');
		$this->session->unset_userdata('main_sub');
		$this->session->unset_userdata('page');
	?>

  <!-- ===================modal for help of attributes============================ -->
	   <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="attribute_help" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
							<h4 class="modal-title">Attribute help</h4>
						</div>
						<div class="modal-body">
								
									<center>
											
								</center>	           
                              
						</div>
						<div class="modal-footer">
						<button type="button" class="btn blue" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Food Item/Dish
        <small>restaurant Name</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Menu Management</a></li>
        <li class="active">Add food Item</li>
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
          <h3 class="box-title">Add Food Item/Dish</h3>

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
				<form action="<?php echo site_url('Food_dish/add_food_dish');?>" method="post"  enctype="multipart/form-data">
				
					  <br>
					  <div class="input-group ">
							<span class="input-group-addon"><i class="fa fa-code-fork"></i></span>
							<?php if(isset($all_food_cat) && !empty($all_food_cat)) { ?>
						
							<select class="form-control" name="cat_name">
							<option value="-11" selected>choose category</option>
							<?php foreach($all_food_cat->result_array() as $food_cat){ ?>
								<option value='<?php echo $food_cat['f_cat_id']; ?>'><?php echo $food_cat['f_cat_name']; ?></option>
								<?php } ?>
							</select>
							
					  </div>
					  <br>
					   <div class="input-group ">
							<span class="input-group-addon"><i class="fa fa-cutlery"></i></span>
						<input type="text" name="food_name" required class="form-control" placeholder="Enter name of item">
							<!--<textarea required placeholder="enter small description" name="cat_desc" class="form-control" ></textarea>-->
					  </div>
					  <br>
					    <div class="input-group ">
							<span class="input-group-addon"><i class="fa fa-money"></i></span>
								<input type="number" min="0" name="food_price" required class="form-control" placeholder="Enter price">
							
					  </div>
					  <br>
					  <div class="input-group ">
							<span class="input-group-addon"><i class="fa fa-tags"></i></span>
							
							<select class="form-control" name="food_attr">
							<option value="-11" selected>choose attribute</option>
								<?php if(isset($all_food_att) && !empty($all_food_att)) { ?>
								<?php foreach($all_food_att->result_array() as $food_att){ ?>
								<option value="<?php echo $food_att['f_att_id'];?>" ><?php echo $food_att['f_att_name'];?></option>
								<?php }}  ?>
								
								
							</select>
							<span class="input-group-addon" title="help" href="#attribute_help" data-toggle="modal"><i class="fa fa-question-circle"></i></span>
							
					  </div>
					  <br>
					     <div class="input-group ">
							<span class="input-group-addon"><i class="fa fa-info"></i></span>
						
							<textarea required placeholder="enter small description/note" name="food_desc" class="form-control" ></textarea>
					  </div>
					  <br>
					  <div class="input-group ">
							<span class="input-group-addon"><i class="fa  fa-file-image-o"></i></span>
							<input type="file" name="food_image" id="food_image"  class="form-control">
					  </div>
					  <br>
					
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
		<?php } ////if isset  ?>
              </div>
			
            <div class="col-lg-5 col-md-4 hidden-xs hidden-sm">
				<center>
					<img src="<?php echo base_url('public/images/menu_food.png')?>" width="70%" class="img-responsive" style="padding-top:15%">
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

  <?php $this->load->view('include/footer');?>

  <!-- Control Sidebar -->
 <?php $this->load->view('include/setting_aside_bar');?>
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
