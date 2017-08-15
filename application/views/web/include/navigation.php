	<div class="sb-slidebar sb-left">
				<form method="post" class="form-search" action="<?php echo site_url('Menu');?>" id="search-global-form">
					<input class="form-search__input" type="text" placeholder="Search">
					<button class="form-search__btn"><i class="icon fa fa-search"></i></button>
					
				</form>
				
				<nav class="main-nav">
					<ul class="navig-menu list-unstyled">
						<li class="navig-menu__item">
							<a class="navig-menu__link" href="<?php echo site_url();?>">Home</a>
						</li>
						<li class="navig-menu__item">
							<a class="navig-menu__link" href="<?php echo site_url("Menu");?>">Menu</a>
						</li>
						<li class="navig-menu__item">
							<a class="navig-menu__link" href="<?php echo site_url("Menu/deals");?>">Deals</a>
						</li>
						<li class="navig-menu__item">
							<a class="navig-menu__link" href="<?php echo site_url("Galleryweb");?>">Gallery</a>
						</li>
						<!--<li class="navig-menu__item">
							<a class="navig-menu__link" href="blog.html">blog</a>
						</li>
						<li class="navig-menu__item">
							<a class="navig-menu__link" href="blog-details.html">pages</a>
						</li>-->
						<li class="navig-menu__item">
							<a class="navig-menu__link" href="<?php echo site_url("About");?>">about us</a>
						</li>
						<li class="navig-menu__item">
							<a class="navig-menu__link" href="<?php echo site_url("Contact");?>">Contact</a>
						</li>
					</ul>
				</nav>
				<!-- end main-nav -->

				<div class="border-bottom"></div>
				<!--<a class="link-account" href="javascript:void(0);">login</a>-->
				<?php if($this->session->userdata('ambs_id')) { ?>
					<a class="link-account" href="<?php echo site_url('Ambassador/deals');?>">Ambassador Deals </a>
					<a class="link-account" href="<?php echo site_url('Ambassador/ambassador_profile');?>">View Profile </a>
					<a class="link-account" href="<?php echo site_url('Ambassador/amb_logout');?>">Logout </a>
					
					
				<?php } else { ?>
					<a class="link-account" href="<?php echo site_url('Ambassador');?>">Ambassador account </a>
				<?php } ?>
				<a class="link-account" href="<?php echo site_url('Ambassador/benefits');?>">Ambassador Benefits </a>
				<!--<a class="link-account" href="javascript:void(0);">checkout</a>-->
			</div>
			<!-- end sb-left -->

			<div class="sb-slidebar sb-right">
				<section class="section-list-cart" id="cart_update">
					
				</section>
				<!-- end list-cart -->
			</div>
				<!--===========================modal product added====================----------->
						<div class="modal fade" id="product_added" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top:1%">
				<div class="modal-dialog">
					<div class="modal-content">
						<!--<div class="modal-header" style="background:#C24828">
							<button type="button"  class="close" data-dismiss="modal" aria-hidden="true">X</button>
							<h3 class="modal-title" style="color:white"><center>41 Heights Pizza</center></h3>
						</div>-->
						<div class="modal-body" style="background:#171717;border:2px solid #FDBC2C" id="failed_add">
						<button type="button"   class="close" data-dismiss="modal" aria-hidden="true">X</button>
						<center>
							<h3>41 Heights Pizza</h3>
						</center>
							<center>
								<img id="cart_load" src="<?php echo base_url('public/images/load.gif');?>" class="img-responsive" width="20%"><br/>
							<div id="cart_su">
								<img  src="<?php echo base_url('public/images/added.png');?>" class="img-responsive" width="30%"><br/>
								
										<button class="btn btn-success" style="width:60%;background:#C24828;color:white" class="close" data-dismiss="modal" aria-hidden="true">Continue shopping</button><br/><br/>
										
										<!--<a href="<?php echo site_url('Checkout');?>" class="btn btn-info" style="width:60%;background:#C24828;color:white">Check Out</a>-->
										<a onclick="hide_cart_popup();" class="btn btn-info sb-toggle-right"  style="width:60%;background:#C24828;color:white">View Cart</a>
										
								
							</div>
							</center>
								
                              
						</div>
						<!--<div class="modal-footer" style="background:#C24828">
						<button type="button" class="btn blue" data-dismiss="modal" style="background:white;color:black">Close</button>
						</div>-->
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			
				<!--===========================modal for  restaurant close indicator====================--------- -->
						<div class="modal fade" id="timing_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top:1%">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-body" style="background:#171717;border:2px solid #FDBC2C" id="failed_add">
						<button type="button"   class="close" data-dismiss="modal" aria-hidden="true">X</button>
						<center>
							<h3>41 Heights Pizza</h3>
						</center>
							<center>
								
							<div>
								<img  src="<?php echo base_url('public/images/close.png');?>" class="img-responsive" width="30%"><br/>
								
										<h3>Restaurant Opening Timing</h3>
										<?php 
										$query=$this->db->query('SELECT opening_time, closing_time FROM rest_timing');
										if($query->num_rows()>0)
										{


												foreach ($query->result() as $row) 
												{
													echo date("h:i A", strtotime($row->opening_time))." TO "		
													.date("h:i A", strtotime($row->closing_time));

												}

										}

										?>
									
									
							</div>
							</center>
								
                              
						</div>
						
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
				<!--===========================modal for  restaurant close indicator====================--------- -->
						<div class="modal fade" id="emergency_close_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top:1%">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-body" style="background:#171717;border:2px solid #FDBC2C" id="failed_add">
						<button type="button"   class="close" data-dismiss="modal" aria-hidden="true">X</button>
						<center>
							<h3>41 Heights Pizza</h3>
						</center>
							<center>
								
							<div>
								<img  src="<?php echo base_url('public/images/close.png');?>" class="img-responsive" width="30%"><br/>
								
										<h4>Temporarily Restaurant is closed!</h4>
										<h6>will be open soon</h6>
									
							</div>
							</center>
								
                              
						</div>
						
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>