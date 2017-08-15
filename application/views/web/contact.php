<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
		<title>Contact Us</title>

    	<link href="<?php echo base_url()?>/public/web_template/html/favicon.png" type="image/x-icon" rel="shortcut icon">
		<link href="<?php echo base_url()?>/public/web_template/assets/css/master.css" rel="stylesheet">
		<script src="<?php echo base_url()?>/public/web_template/assets/plugins/jquery/jquery-1.11.3.min.js"></script>
	</head>


	<body>

		<!-- Loader -->
		<div id="page-preloader"><span class="spinner"></span></div>
		<!-- Loader end -->
<!-- HEADER -->
					<?php $this->load->view('web/include/header');?>
					<!-- end header -->

		<div class="layout-theme animated-css" id="wrapper" data-header="sticky" data-header-top="200">

			<div id="sb-site">

				<div class="wrap-content">


					

					<div class="section-title">
						<div class="container">
							<div class="row">
								<div class="col-xs-12">
									<div class="section__inner">
										<h1 class="ui-title-page">Contact Us</h1>
										<ol class="breadcrumb">
											<li><a href="home.html">Home</a></li>
											<li class="active">Contact</li>
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


					<div class="section_mod-b">
						<div class="container">
							<div class="row">
								<!--<div class="col-xs-12">
									<div class="map">
										<img class="img-responsive" src="assets/img/map.jpg" height="600" width="1100" alt="map">
									</div>
								</div>-->
								<div class="col-md-8">
									<h3 class="ui-title-inner ui-title-inner_mod-a">Feel free to contact us with any questions!</h3>
									
									<?php if($this->session->userdata('success'))
									{ 
									echo  "<p style='color:white'>".$this->session->userdata('success')."</p>";
									$this->session->unset_userdata('success');
											} 
									else if($this->session->userdata('failure'))
									{
										echo "<p style='color:red'>".$this->session->userdata('failure')."</p>";
										$this->session->unset_userdata('failure');
									} 
									?>


									<form class="comment-reply-form" id="comment-reply-form" action="<?php echo site_url('Contact/contact_us'); ?>" method="post">
										<div class="row">
											<div class="col-md-6">
												<label class="comment-reply-form__title ui-form-label">YOUR NAME *</label>
												<input class="form-control" type="text" id="comment-author" name="name" required >
											</div>
											<div class="col-md-6">
												<label class="comment-reply-form__title ui-form-label">EMAIL *</label>
												<input class="form-control" type="email" id="comment-email" name="email" required>
											</div>
										</div>
										<label class="comment-reply-form__title ui-form-label">SUBJECT</label>
										<input class="form-control" type="text" id="comment-website" name="subject" required>
										<label class="comment-reply-form__title ui-form-label">YOUR MESSAGE</label>
										<textarea class="form-control" id="comment-text" name="message" rows="6" required></textarea>
										<button class="comment-reply-form__btn ui-btn ui-btn-primary btn-effect">send message</button>
									</form>
									<!-- end comment-reply-form -->
								</div>
								<div class="col-md-4">
									<div class="section-contact">
										<section class="contact-block">
											<h3 class="contact-block__title ui-title-inner">Get in Touch</h3>
											<div class="contact-block__inner">Phone: <span class="color_primary">051-5412121</span></div>
											<div class="contact-block__inner">Mobile: <span class="color_primary">0341-0004141</span></div>
											<div class="contact-block__inner">Email: <span class="color_primary">41heightspizza@gmail.com</span></div>
										</section>
										<section class="contact-block">
											<h3 class="contact-block__title ui-title-inner">Store Address</h3>
											
											<div class="contact-block__inner">Bahria Town, phase-7,Near Meezan Bank </div>
											<div class="contact-block__inner">Rawalpindi , Pakistan</div>
										</section>
										<section class="contact-block">
											<h3 class="contact-block__title ui-title-inner">Working Hours</h3>
											<div class="contact-block__inner">Monday:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php 
										$query=$this->db->query('SELECT opening_time, closing_time FROM rest_timing');
										foreach ($query->result() as $row) 
										{
											echo date("h:i A", strtotime($row->opening_time))." TO "		
											.date("h:i A", strtotime($row->closing_time)); 

										}

										?>
											
										</div>
											<div class="contact-block__inner">Tuesday:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php 
										$query=$this->db->query('SELECT opening_time, closing_time FROM rest_timing');
										foreach ($query->result() as $row) 
										{
											echo date("h:i A", strtotime($row->opening_time))." TO "		
											.date("h:i A", strtotime($row->closing_time)); 

										}

										?>
											
										</div>
											<div class="contact-block__inner">Wednesday:<?php 
										$query=$this->db->query('SELECT opening_time, closing_time FROM rest_timing');
										foreach ($query->result() as $row) 
										{
											echo date("h:i A", strtotime($row->opening_time))." TO "		
											.date("h:i A", strtotime($row->closing_time)); 

										}

										?></div>
											<div class="contact-block__inner">Thursday:&nbsp;&nbsp;&nbsp;&nbsp;<?php 
										$query=$this->db->query('SELECT opening_time, closing_time FROM rest_timing');
										foreach ($query->result() as $row) 
										{
											echo date("h:i A", strtotime($row->opening_time))." TO "		
											.date("h:i A", strtotime($row->closing_time)); 

										}

										?>
											
										</div>
											<div class="contact-block__inner">Friday: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php 
										$query=$this->db->query('SELECT opening_time, closing_time FROM rest_timing');
										foreach ($query->result() as $row) 
										{
											echo date("h:i A", strtotime($row->opening_time))." TO "		
											.date("h:i A", strtotime($row->closing_time)); 

										}

										?>
											
										</div>
											<div class="contact-block__inner">Saturday:&nbsp;&nbsp;&nbsp;&nbsp;<?php 
										$query=$this->db->query('SELECT opening_time, closing_time FROM rest_timing');
										foreach ($query->result() as $row) 
										{
											echo date("h:i A", strtotime($row->opening_time))." TO "		
											.date("h:i A", strtotime($row->closing_time)); 

										}

										?>
											
										</div>
											<div class="contact-block__inner">Sunday:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php 
										$query=$this->db->query('SELECT opening_time, closing_time FROM rest_timing');
										foreach ($query->result() as $row) 
										{
											echo date("h:i A", strtotime($row->opening_time))." TO "		
											.date("h:i A", strtotime($row->closing_time)); 

										}

										?>
											
										</div>
											
										</section>
									</div>
								</div>
							</div>
						</div>
					</div>



					

				</div>
				<!-- end wrap-content -->
				<?php $this->load->view('web/include/subscription');?>

			</div>
			<!-- end #sb-site -->


			
				<?php $this->load->view('web/include/navigation');?>
			
			<!-- end sb-left -->

			<!-- end sb-right -->

		</div>
		<!-- end layout-theme -->

<?php $this->load->view('web/include/footer');?>

	
	
	</body>
</html>



