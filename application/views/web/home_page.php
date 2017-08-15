

<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
		<title>41Heights Pizza</title>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="favicon.png" type="image/x-icon" rel="shortcut icon">
		<link href="<?php echo base_url()?>/public/web_template/assets/css/master.css" rel="stylesheet">
		<script src="<?php echo base_url()?>/public/web_template/assets/plugins/jquery/jquery-1.11.3.min.js"></script>
		
	</head>


	<body>

		<!-- Loader -->
	<!--	<div id="page-preloader"><span class="spinner"></span></div>
		<!-- Loader end -->


		<div class="layout-theme animated-css" id="wrapper" data-header="sticky" data-header-top="700">

			<div id="sb-site">

				<div class="wrap-content">

					<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
						    <ol class="carousel-indicators">
						      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						      <li data-target="#myCarousel" data-slide-to="1"></li>
						      <li data-target="#myCarousel" data-slide-to="2"></li>
						      </ol>

    <!-- Wrapper for slides -->
   
						    <div class="carousel-inner">

                       
                       <?php 
                       		$count=0;
                       		if(isset($slides_web1)&& $slides_web1!=false){
                           foreach($slides_web1->result_array() as $row) { 

                       		
                       	?>
                        
                     <!--   <img src="<?php echo base_url();?>/<?php echo $row['slider_image'];?>"  width="150px" class="img-responsive" align="center"/>-->
						  <div class="item <?php if($count==0){ echo "active";} ?>">
						      
						     
						      
						        <img class="sp-image img-responsive" src="<?php echo base_url()?>/<?php echo $row['slider_image'];?>" height="1080" width="100%" alt="slider" align="center"/> 
						        
						        <div class="carousel-caption">
						          <p class="hidden-xs">&nbsp;&nbsp;</p><br/><br/>
									<a class="ui-btn ui-btn_mod-a btn-effect hidden-xs" style="background:#D94F2B" href="<?php echo site_url('Menu/deals');?>">Order Now</a>
								      
								   
								

                     
								</div>
						</div>
						 <?php $count++;  } } ?>
							    <!--  <div class="item">
							        <img class="sp-image img-responsive" src="<?php echo base_url()?>/public/web_sliders/slider2.jpg" height="1080" width="100%" alt="slider">
							        <div class="carousel-caption">
							          <p class="hidden-xs">&nbsp;&nbsp;</p><br/><br/>
									<a class="ui-btn ui-btn_mod-a btn-effect hidden-xs" style="background:#D94F2B" href="<?php echo site_url('Menu/deals');?>">Order Now</a>
								        </div>
								      </div>
							    
							      <div class="item">
								        <img class="sp-image img-responsive" src="<?php echo base_url()?>/public/web_sliders/slider3.jpg" height="1080" width="100%" alt="slider">
							        <div class="carousel-caption">
							          <p class="hidden-xs">&nbsp;&nbsp;</p><br/><br/>
									<a class="ui-btn ui-btn_mod-a btn-effect hidden-xs" style="background:#D94F2B" href="<?php echo site_url('Menu/deals');?>">Order Now</a>
								        </div>
										 </div>
								      <div class="item">
								        <img class="sp-image img-responsive" src="<?php echo base_url()?>/public/web_sliders/slider1.jpg" height="1080" width="100%" alt="slider">

								        <div class="carousel-caption">
								         <p class="hidden-xs">&nbsp;&nbsp;</p><br/><br/>
									<a class="ui-btn ui-btn_mod-a btn-effect hidden-xs" style="background:#D94F2B" href="<?php echo site_url('Menu/deals');?>">Order Now</a>
									        </div>
									      </div> -->
									  
									   

                                      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
										      <span class="glyphicon glyphicon-chevron-left"></span>
										      <span class="sr-only">Previous</span>
										    </a>
										    <a class="right carousel-control" href="#myCarousel" data-slide="next">
										      <span class="glyphicon glyphicon-chevron-right"></span>
										      <span class="sr-only">Next</span>
										    </a>
   												 <!-- Left and right controls -->
										     </div>
										</div>

										<!-- end main-slider -->

					<!-- HEADER -->
					<?php $this->load->view('web/include/header');?>
					<!-- end header -->


					<section class="section-default">
						<div class="container">
							<div class="row">
								<div class="col-xs-4">
									 <a href="#">
										<img class="img-responsive" src="<?php echo base_url()?>/public/images/yellow.png"  height="200" width="200" alt="Foto">
										
									</a>
									</div> 
									<div class="col-xs-4">
									<a href="#">
										<img class="img-responsive" src="<?php echo base_url()?>/public/images/yellow.png"  height="200" width="200" alt="Foto">
										
									</a> 
									</div>
									<div class="col-xs-4">
									
									<a href="#">
										<img class="img-responsive" src="<?php echo base_url()?>/public/images/yellow.png"  height="200" width="200" alt="Foto">
										
									</a> 
									</div>
									</div>
									<br>
									<div class="row">
									<div class="col-xs-4">
									 <a href="#">
										<img class="img-responsive" src="<?php echo base_url()?>/public/images/yellow.png"  height="200" width="200" alt="Foto">
										
									</a>
									</div> 
									<div class="col-xs-4">
									<a href="#">
										<img class="img-responsive" src="<?php echo base_url()?>/public/images/yellow.png"  height="200" width="200" alt="Foto">
										
									</a> 
									</div>
									<div class="col-xs-4">
									
									<a href="#">
										<img class="img-responsive" src="<?php echo base_url()?>/public/images/yellow.png"  height="200" width="200" alt="Foto">
										
									</a> 
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


					<div class="section-bg_mod-c wow bounceInUp" data-wow-duration="2s">
						<div class="container">
							<div class="slider-goods slider-type-a slider_mod-a owl-carousel owl-theme owl-theme_mod-a enable-owl-carousel"
								data-pagination="false"
								data-navigation="true"
								data-single-item="true"
								data-auto-play="7000"
								data-transition-style="fade"
								data-main-text-animation="true"
								data-after-init-delay="3000"
								data-after-move-delay="1000"
								data-stop-on-hover="true">

							<?php if(isset($deals) && $deals!=false){


									foreach($deals->result_array() as $deal){
							?>
							
							
						
								<div class="slider-type-a__item">
									<div class="slider-type-a__img">
										<img class="img-responsive" src="<?php echo base_url($deal['deal_image'])?>" height="617" width="618" alt="Foto">
									</div>
									<div class="slider-type-a__inner">
										<div class="slider-type-a__name"><?php echo $deal['cat_name']." - ".$deal['deal_name']?></div>
										<div class="slider-type-a__price"><?php echo "Rs. ".$deal['deal_price'];?></div>
										<div class="slider-type-a__description">
											<?php
												$deal_it=$this->db->query("select `deal_pr_name` from `deals_products` where `deal_id`='".$deal['deal_id']."'");
												foreach($deal_it->result_array() as $deal_it)
												{
													echo  $deal_it['deal_pr_name']." , <br/>";
												}
											?>
										</div>
										<a class="ui-btn ui-btn-primary btn-effect" href="<?php echo site_url('Menu/deals');?>">order now</a>
									</div>
								</div>

								
				<?php	} } ?>
							</div>
							<!-- end slider -->
						</div>
						<!-- end container -->
					</div>
					<!-- end section-bg_mod-c -->


					<section class="section-default">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<h2 class="ui-title-block wow fadeInUp" data-wow-duration="2s">Build Your Own Pizza</h2>
									
									<!-- end accordion -->
							<div class="text-center wow fadeInUp" data-wow-duration="2s" data-wow-delay="1.5s"><a class="btn-accordion-builder ui-btn ui-btn-primary btn-effect" href="<?php echo site_url('Menu');?>">CREATE YOUR OWN PIZZA</a></div>
								</div>
								<!-- end col -->
							</div>
							<!-- end row -->
						</div>
						<!-- end container -->
					</section>
					<!-- end section-default -->


				<!--	<div class="section-progress section-bg section-bg_mod-a wow fadeInUp" data-wow-duration="2s">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<div class="section__inner">
										<ul class="list-progress list-unstyled">
											<li class="list-progress__item clearfix">
												<span class="list-progress__percent chart" data-percent="5"><span class="percent"></span></span>
												<span class="list-progress__name">crusts</span>
											</li>

											<li class="list-progress__item clearfix">
												<span class="list-progress__percent chart" data-percent="17"><span class="percent"></span></span>
												<span class="list-progress__name">sauces</span>
											</li>

											<li class="list-progress__item clearfix">
												<span class="list-progress__percent chart" data-percent="8"><span class="percent"></span></span>
												<span class="list-progress__name">cheeses</span>
											</li>

											<li class="list-progress__item clearfix">
												<span class="list-progress__percent chart" data-percent="20"><span class="percent"></span></span>
												<span class="list-progress__name">veggies</span>
											</li>

											<li class="list-progress__item clearfix">
												<span class="list-progress__percent chart" data-percent="11"><span class="percent"></span></span>
												<span class="list-progress__name">meats</span>
											</li>

											<li class="list-progress__item clearfix">
												<span class="list-progress__percent chart" data-percent="36"><span class="percent"></span></span>
												<span class="list-progress__name">toppings</span>
											</li>
										</ul>
										
									</div>
								</div>
								
							</div>
							
						</div>
						
					</div>-->
					<!-- end section-progress -->


					<!--<section class="section-default wow fadeInRight" data-wow-duration="2s">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<h2 class="ui-title-block">Here's what some customers are saying...</h2>
									<p class="ui-subtitle-block">Customer service and product quality are our top priority. Although we strive to make  every customer experience as easy as possible, it’s how our customers rate us that really matters. Because it makes our customers happy! And we love making people happy.</p>

									<div class="slider-reviews slider_mod-b owl-carousel owl-theme enable-owl-carousel"
										data-min320="1"
										data-min480="1"
										data-min768="2"
										data-min992="3"
										data-min1200="3"
										data-pagination="false"
										data-navigation="true"
										data-auto-play="4000"
										data-stop-on-hover="true">

										<div class="slider-reviews__item">
											<div class="slider-reviews__img"><img class="center-block img-responsive" src="<?php echo base_url()?>/public/web_template/assets/media/slider-reviews/slider-reviews_1.png" height="170" width="171" alt="Foto"></div>
											<div class="slider-reviews__title">Florentine Ricotta</div>
											<ul class="raiting list-unstyled">
												<li class="raiting__item"><i class="icon fa fa-star"></i></li>
												<li class="raiting__item"><i class="icon fa fa-star"></i></li>
												<li class="raiting__item"><i class="icon fa fa-star"></i></li>
												<li class="raiting__item"><i class="icon fa fa-star"></i></li>
												<li class="raiting__item"><i class="icon fa fa-star-o"></i></li>
											</ul>
											<div class="slider-reviews__inner">
												<div class="decor-top-line"><span class="decor-top-line__inner"></span></div>
												<div class="slider-reviews__quote">“ We are serving pizza, your pizza is the fave of our family. Pick us as the pizza winner! ”</div>
											</div>
											<cite class="slider-reviews__autor">Daniela Black<a class="slider-reviews__link" href="www.pizzatempo.com">www.pizzatempo.com</a></cite>
										</div>

										<div class="slider-reviews__item">
											<div class="slider-reviews__img"><img class="center-block img-responsive" src="<?php echo base_url()?>/public/web_template/assets/media/slider-reviews/slider-reviews_2.png" height="173" width="173" alt="Foto"></div>
											<div class="slider-reviews__title">Garlic Prawn</div>
											<ul class="raiting list-unstyled">
												<li class="raiting__item"><i class="icon fa fa-star"></i></li>
												<li class="raiting__item"><i class="icon fa fa-star"></i></li>
												<li class="raiting__item"><i class="icon fa fa-star"></i></li>
												<li class="raiting__item"><i class="icon fa fa-star"></i></li>
												<li class="raiting__item"><i class="icon fa fa-star"></i></li>
											</ul>
											<div class="slider-reviews__inner">
												<div class="decor-top-line"><span class="decor-top-line__inner"></span></div>
												<div class="slider-reviews__quote">“ We are serving pizza, your pizza is the fave of our family. Pick us as the pizza winner! ”</div>
											</div>
											<cite class="slider-reviews__autor">Eliz Bellarosa<a class="slider-reviews__link" href="www.pizzatempo.com">www.pizzatempo.com</a></cite>
										</div>

										<div class="slider-reviews__item">
											<div class="slider-reviews__img"><img class="center-block img-responsive" src="<?php echo base_url()?>/public/web_template/assets/media/slider-reviews/slider-reviews_3.png" height="177" width="177" alt="Foto"></div>
											<div class="slider-reviews__title">Kimchi BBQ Chicken</div>
											<ul class="raiting list-unstyled">
												<li class="raiting__item"><i class="icon fa fa-star"></i></li>
												<li class="raiting__item"><i class="icon fa fa-star"></i></li>
												<li class="raiting__item"><i class="icon fa fa-star"></i></li>
												<li class="raiting__item"><i class="icon fa fa-star-o"></i></li>
												<li class="raiting__item"><i class="icon fa fa-star-o"></i></li>
											</ul>
											<div class="slider-reviews__inner">
												<div class="decor-top-line"><span class="decor-top-line__inner"></span></div>
												<div class="slider-reviews__quote">“ We are serving pizza, your pizza is the fave of our family. Pick us as the pizza winner! ”</div>
											</div>
											<cite class="slider-reviews__autor">Bradley Taylor<a class="slider-reviews__link" href="www.pizzatempo.com">www.pizzatempo.com</a></cite>
										</div>

										<div class="slider-reviews__item">
											<div class="slider-reviews__img"><img class="center-block img-responsive" src="<?php echo base_url()?>/public/web_template/assets/media/slider-reviews/slider-reviews_2.png" height="173" width="173" alt="Foto"></div>
											<div class="slider-reviews__title">Garlic Prawn</div>
											<ul class="raiting blocks-inline">
												<li class="raiting__item"><i class="icon fa fa-star"></i></li>
												<li class="raiting__item"><i class="icon fa fa-star"></i></li>
												<li class="raiting__item"><i class="icon fa fa-star"></i></li>
												<li class="raiting__item"><i class="icon fa fa-star"></i></li>
												<li class="raiting__item"><i class="icon fa fa-star"></i></li>
											</ul>
											<div class="slider-reviews__inner">
												<div class="decor-top-line"><span class="decor-top-line__inner"></span></div>
												<div class="slider-reviews__quote">“ We are serving pizza, your pizza is the fave of our family. Pick us as the pizza winner! ”</div>
											</div>
											<cite class="slider-reviews__autor">Eliz Bellarosa<a class="slider-reviews__link" href="www.pizzatempo.com">www.pizzatempo.com</a></cite>
										</div>

									</div>
									
								</div>
								
							</div>
							
						</div>
						
					</section>-->
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
					<!-- end section_mod-a -->


					<!--<section class="section-default wow fadeInUp" data-wow-duration="2s">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<h2 class="ui-title-block">Latest News & Recipes</h2>
									<div class="row">
										<div class="col-md-4">
											<article class="post post_mod-a clearfix wow fadeInRight" data-wow-duration="2s">
												<div class="entry-media">
													<a href="<?php echo base_url()?>/public/web_template/assets/media/post/320x255/post_320x255_img-1.jpg" rel="prettyPhoto">
														<img class="img-responsive" src="<?php echo base_url()?>/public/web_template/assets/media/post/320x255/post_320x255_img-1.jpg" height="255" width="320" alt="Foto">
													</a>
												</div>
												<div class="entry-main">
													<div class="entry-header">
														<div class="entry-meta"><time datetime="2012-10-27 15:20"><a href="javascript:void(0);">January 22, 2015</a></time></div>
														<h2 class="entry-title ui-title-inner">Perfect Pizza Using Baking Steel Broiler Method</h2>
													</div>
													<div class="entry-content">
														<p>Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
													</div>
												</div>
												<footer class="entry-footer clearfix">
													<a class="ui-btn ui-btn-primary btn-effect" href="javascript:void(0);">read more</a>
												</footer>
											</article>
										</div>

										<div class="col-md-4">
											<article class="post post_mod-a clearfix wow fadeInUp" data-wow-duration="2s">
												<div class="entry-media">
													<a href="<?php echo base_url()?>/public/web_template/assets/media/post/320x255/post_320x255_img-2.jpg" rel="prettyPhoto">
														<img class="img-responsive" src="<?php echo base_url()?>/public/web_template/assets/media/post/320x255/post_320x255_img-2.jpg" height="255" width="320" alt="Foto">
													</a>
												</div>
												<div class="entry-main">
													<div class="entry-header">
														<div class="entry-meta"><time datetime="2012-10-27 15:20"><a href="javascript:void(0);">December 18, 2014</a></time></div>
														<h2 class="entry-title ui-title-inner">Green Onion and Burrata Cheese Pizza Recipe</h2>
													</div>
													<div class="entry-content">
														<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui.</p>
													</div>
												</div>
												<footer class="entry-footer clearfix">
													<a class="ui-btn ui-btn-primary btn-effect" href="javascript:void(0);">read more</a>
												</footer>
											</article>
										</div>

										<div class="col-md-4">
											<article class="post post_mod-a clearfix wow fadeInLeft" data-wow-duration="2s">
												<div class="entry-media">
													<a href="assets/media/post/320x255/post_320x255_img-3.jpg" rel="prettyPhoto">
														<img class="img-responsive" src="<?php echo base_url()?>/public/web_template/assets/media/post/320x255/post_320x255_img-3.jpg" height="255" width="320" alt="Foto">
													</a>
												</div>
												<div class="entry-main">
													<div class="entry-header">
														<div class="entry-meta"><time datetime="2012-10-27 15:20"><a href="javascript:void(0);">December 10, 2014</a></time></div>
														<h2 class="entry-title ui-title-inner">Brussels Sprouts, Pepper and Bacon Hot Pizza Recipes</h2>
													</div>
													<div class="entry-content">
														<p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui.</p>
													</div>
												</div>
												<footer class="entry-footer clearfix">
													<a class="ui-btn ui-btn-primary btn-effect" href="javascript:void(0);">read more</a>
												</footer>
											</article>
										</div>
									</div>
								</div>
								
							</div>
							
						</div>
						
					</section>
				 


					<!--<div class="section-carusel wow fadeInRight" data-wow-duration="2s">
						<div class="carusel slider_mod-c owl-carousel owl-theme enable-owl-carousel"
							data-min320="3"
							data-min480="4"
							data-min768="7"
							data-min992="7"
							data-min1200="7"
							data-pagination="false"
							data-navigation="true"
							data-auto-play="4000"
							data-stop-on-hover="true">

							<a href="assets/media/carusel/carusel_1.jpg" rel="prettyPhoto"><img class="img-responsive" src="<?php echo base_url()?>/public/web_template/assets/media/carusel/carusel_1.jpg" height="280" width="280" alt="Foto"></a>
							<a href="assets/media/carusel/carusel_2.jpg" rel="prettyPhoto"><img class="img-responsive" src="<?php echo base_url()?>/public/web_template/assets/media/carusel/carusel_2.jpg" height="280" width="280" alt="Foto"></a>
							<a href="assets/media/carusel/carusel_3.jpg" rel="prettyPhoto"><img class="img-responsive" src="<?php echo base_url()?>/public/web_template/assets/media/carusel/carusel_3.jpg" height="280" width="280" alt="Foto"></a>
							<a href="assets/media/carusel/carusel_4.jpg" rel="prettyPhoto"><img class="img-responsive" src="<?php echo base_url()?>/public/web_template/assets/media/carusel/carusel_4.jpg" height="280" width="280" alt="Foto"></a>
							<a href="assets/media/carusel/carusel_5.jpg" rel="prettyPhoto"><img class="img-responsive" src="<?php echo base_url()?>/public/web_template/assets/media/carusel/carusel_5.jpg" height="280" width="280" alt="Foto"></a>
							<a href="assets/media/carusel/carusel_6.jpg" rel="prettyPhoto"><img class="img-responsive" src="<?php echo base_url()?>/public/web_template/assets/media/carusel/carusel_6.jpg" height="280" width="280" alt="Foto"></a>
							<a href="assets/media/carusel/carusel_7.jpg" rel="prettyPhoto"><img class="img-responsive" src="<?php echo base_url()?>/public/web_template/assets/media/carusel/carusel_7.jpg" height="280" width="280" alt="Foto"></a>
							<a href="assets/media/carusel/carusel_3.jpg" rel="prettyPhoto"><img class="img-responsive" src="<?php echo base_url()?>/public/web_template/assets/media/carusel/carusel_3.jpg" height="280" width="280" alt="Foto"></a>
							<a href="assets/media/carusel/carusel_4.jpg" rel="prettyPhoto"><img class="img-responsive" src="<?php echo base_url()?>/public/web_template/assets/media/carusel/carusel_4.jpg" height="280" width="280" alt="Foto"></a>
						</div>
						
</div>-->
					<?php $this->load->view('web/include/subscription');?>
					

				</div>
				<!-- end wrap-content -->

			</div>
			<!-- end #sb-site -->



		<?php $this->load->view('web/include/navigation');?>
			<!-- end sb-right -->

		</div>
		<!-- end layout-theme -->



		<!-- SCRIPTS MAIN -->

		<?php $this->load->view('web/include/footer');?>


		

	</body>
</html>
