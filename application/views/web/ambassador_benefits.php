<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
		<title>41 Heights, Ambassador Benefits</title>

    	<link href="favicon.png" type="image/x-icon" rel="shortcut icon">
		<link href="<?php echo base_url()?>/public/web_template/assets/css/master.css" rel="stylesheet">
		<script src="<?php echo base_url()?>/public/web_template/assets/plugins/jquery/jquery-1.11.3.min.js"></script>
	</head>
<!----------------------------------------------------------------------------------------------->

<!----------------------------------------------------------------------------------------------->

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
											<li class="active">Ambassador Benefits</li>
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
						
							<div class="col-lg-8 col-md-8">
							
							<!-- end col -->
						</div>
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
	
			

	</body>
</html>


