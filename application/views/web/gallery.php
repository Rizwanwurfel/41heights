<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
		<title>Gallery</title>

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
					<?php 
					
                       		$count=0;
                       		if(isset($gallery_web)&& $gallery_web!=false){
                           foreach($gallery_web->result_array() as $row) { 

                       		
                       	?>

<img class="sp-image img-responsive" src="<?php echo base_url()?>/<?php echo $row['gallery_image'];?>" height="1080" width="100%" alt="slider" align="center"/> 
				
				<?php $count++;  } }
				else{
					redirect(site_url('About'));
				}
				 ?>
						        
					

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



