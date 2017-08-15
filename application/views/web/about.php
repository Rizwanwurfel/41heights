<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
		<title>About Us</title>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="favicon.png" type="image/x-icon" rel="shortcut icon">
		<link href="<?php echo base_url()?>/public/web_template/assets/css/master.css" rel="stylesheet">
		<script src="<?php echo base_url()?>/public/web_template/assets/plugins/jquery/jquery-1.11.3.min.js"></script>
		
	</head>


	<body>

	
	

									
	
	<div class="layout-theme animated-css" id="wrapper" data-header="sticky" data-header-top="700">

			<div id="sb-site">

				<div class="wrap-content">

					
					<!-- HEADER -->
					<?php $this->load->view('web/include/header');?>
					<!-- end header -->
					

					<section class="section-default">
						<div class="container">
							<div class="row">

								<div class="col-xs-12">
									<h2 class="ui-title-block wow fadeInUp" data-wow-duration="2s">We are pizza makers, and our mission is to make cool pizza which feeds all your senses.</h2>
									<p class="ui-subtitle-block wow fadeInUp" data-wow-duration="2s">We prefer to rely on instinct and feel, measuring by hand, not by the gram. This is the authentic way to make pizza. Sure it’s a little unrefined, but we’re proud. <br> It’s pizza like this which feeds your sense of sharing, adding flavour to those occasions when you get together with friends and family. <br> And really, isn’t that what it’s all about? Because when pizza feeds all your senses, it’s not just great, it’s sensational.</p>

									<div class="advantages">
										<div class="row">
											<div class="col-md-4">
												<div class="advantages__item wow fadeInLeft" data-wow-duration="2s">
													<i class="icon pe-7s-leaf"></i>
													<h3 class="advantages__title ui-title-inner">We’re Careful</h3>
													<div class="advantages__description">The crust is stored in a separate container, on a separate shelf in our fridge. The cheese, marinara sauce and pepperoni are stored in a  designated kit, and every pizza is freshly baked on designated parchment paper in our ovens.</div>
												</div>
											</div>

											<div class="col-md-4">
												<div class="advantages__item wow fadeInUp" data-wow-duration="2s">
													<i class="icon pe-7s-medal"></i>
													<h3 class="advantages__title ui-title-inner">We’re Certified</h3>
													<div class="advantages__description">Our cheese-only and cheese-and-pepperoni gluten-free pizzas are prepared using the procedures certified by the Gluten Intolerance Group (GIG), and we take specific caution when making these pizzas.</div>
												</div>
											</div>

											<div class="col-md-4">
												<div class="advantages__item wow fadeInRight" data-wow-duration="2s">
													<i class="icon pe-7s-rocket"></i>
													<h3 class="advantages__title ui-title-inner">You’re Creative</h3>
													<div class="advantages__description">For those simply looking to reduce gluten in their diets, we offer a Create Your Own pizza option. The cheese, pepperoni and marinara come from our gluten-free kit, but all additional toppings are stored at our standard make table.</div>
												</div>
											</div>
										</div>
									</div>
									<!-- end advantages -->
								</div>
								<!-- end col -->
							</div>
							<!-- end row -->
						</div>
						<!-- end container -->
					</section>
					<!-- end section-default -->
						

					<section class="section_mod-a section-bg section-bg_mod-b wow fadeInUp" data-wow-duration="2s">
						<div class="section__inner block-a rtd">
							<div class="container">
								<div class="row">
									<div class="col-md-4 wow fadeInLeft" data-wow-duration="2s">
										<img class="block-a__img img-responsive" src="<?php echo base_url()?>/public/web_template/assets/media/img-mob.png" height="752" width="369" alt="Mobile">
									</div>
									<!-- end col -->
									<div class="col-md-7 col-md-offset-1 wow fadeInRight" data-wow-duration="2s">
										<h2 class="ui-title-block">Get the newest version of our mobile app for your phone.</h2>
										<p>Do you have an  Android device or an web-enabled mobile? Then it’s easier than ever to order hot and fresh pizza – no phone calls necessary! Mobile ordering lets you access all the best features in a format that’s tailored to the screen size of your mobile phone, find special online offers and order your favorite pizza and sides in a flash.</p>
										<h3 class="ui-title-inner">Here's why it's great:</h3>
										<ul class="list_mod-b">
											<li>It's free</li>
											<li>No registration required</li>
											<li>Order from the full menu</li>
											<li>Find local deals</li>
											<li>Enjoy discount</li>
										</ul>
										<a class="ui-btn ui-btn-primary ui-btn_with_icon btn-effect" href="javascript:void(0);"><i class="icon fa fa-apple"></i>coming soon</a>
										<a class="ui-btn ui-btn-primary ui-btn_with_icon btn-effect" href="https://play.google.com/store/apps/details?id=com.wurfel.fortyoneheightspizza&hl=en"><i class="icon fa fa-android"></i>download Android App</a>
									</div>
									<!-- end col -->
								</div>
								<!-- end row -->
							</div>
							<!-- end container -->
						</div>
					</section>

					<?php $this->load->view('web/include/subscription');?>
				
					</div>
					</div>
				
				<!-- end wrap-content -->

			
			<!-- end #sb-site -->



		<?php $this->load->view('web/include/navigation');?>
			<!-- end sb-right -->
			</div>
		
		<!-- end layout-theme -->



		<!-- SCRIPTS MAIN -->

		<?php $this->load->view('web/include/footer');?>


		

	</body>
</html>
