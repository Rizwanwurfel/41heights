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

					
					<!-- end section-title -->


					<div class="container">
						<div class="row">
						
							<div class="col-xs-12">
						<!--	<h3>Order Placed successfully</h3>-->
							
									<!-------------------------------------------------------------------------------------->
				
				  <div  style="padding-top:5%;padding-bottom:5%">
					   
					   <center>
					   
									    <h1 style="color:white">Thank You!</h1>
									    <?php if($this->session->userdata('referral_dis')){echo $this->session->userdata('referral_dis');$this->session->unset_userdata('referral_dis');} ?>
									<p>Your order has been placed</p>
									<p>You will receive order with in 1 hour</p>
									<p>For further assistance contact us<br/> info@41heightspizza.com<br/>051 541 2121<br/>0346 5383650</p>
						</center>
						
					   
					  </div>
					  <?php 
						$this->cart->destroy();
						//$this->session->sess_destroy();
						$this->session->unset_userdata('order_no');
						if($this->session->userdata('deal_for'))
						{
							$this->session->unset_userdata('deal_for');
						}
					  ?>

				<!-------------------------------------------------------------------------------------->
								
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
	

	</body>
</html>


