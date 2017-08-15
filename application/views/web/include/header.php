
<header class="header clearfix wow slideInUp" data-wow-duration="2s" >
						<div class="header__wrap">
							<span class="sb-toggle-left"><i class="icon pe-7s-menu"></i></span>
							<a class="logo" href="<?php echo site_url();?>"><img style="margin-top:-20%;width:90%" class="img-responsive" src="<?php echo base_url()?>/public/images/logo.png" alt="Logo"></a>
							<span class="header-basket sb-toggle-right"><i class="icon pe-7s-cart"></i><span class="header-basket__number"></span></span>
						</div>
					</header>
				<?php if($this->session->userdata("pizz_d_added")){?>
<input type="hidden" id="pizz_deal_added" value="yes" >
<?php 
$this->session->unset_userdata("pizz_d_added");
} else{?>
<input type="hidden" id="pizz_deal_added" value="no" >
<?php } ?>