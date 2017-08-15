<?php $this->load->view('admin/include/session_check');?>
<header class="main-header">

    <!-- Logo -->
    <a href="javascript:" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>41</b>H</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>41</b>Heights</span>
    </a>
	
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
	  
      <div class="navbar-custom-menu">
	  
        <ul class="nav navbar-nav">
			<li style="background:red;display:none" id="waiter_notify">
				<a href="<?php echo site_url('Notification/update_waitercall');?>" >Customer calling</a>
          </li>
          <!-- Messages: style can be found in dropdown.less-->
       
          <!-- Notifications: style can be found in dropdown.less -->
            <?php
				$all_n=$this->db->query("SELECT  `order_id`,`order_notify`,`order_date` FROM `order` where `order_deleted`='0' AND `order_notify`='0' order by `order_id` desc");
			  ?>
              <!-- Notifications: style can be found in dropdown.less -->
			    <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning" id="label_not"><?php if($all_n->num_rows()>0) {  echo "new";}?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Order notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu" id="span_not">
				
				
				<?php 
					$all_n=$this->db->query("SELECT `order_id`,`order_notify`,`order_date` FROM `order` where `order_deleted`='0' AND `order_notify`='0' order by `order_id` desc");
						if($all_n->num_rows()>0){	
							foreach($all_n->result_array() as $row_not)
							{
								
							
				?>
                  <li id="noti<?php echo $row_not['order_id'];?>" <?php if($row_not['order_notify']==0){ ?> style="background:pink" <?php } ?> >
                    <a href="<?php echo base_url('Notification/load_notification_order');?>/<?php echo $row_not['order_id'];?>">
                      <i class="fa fa-cart-plus text-aqua" ></i> Fresh order placed  <small class="text-muted"><?php echo $row_not['order_date'];?></small>
                    </a>
                  </li>
                 
                 <?php }} ?>
				
				 <!---------------------------placing latest notifications seen------------------------->
				 
				 
				 	<?php 
					//$all_on=$this->db->query("SELECT *FROM  `order` WHERE order_deleted =0 AND order_notify='1' AND seen_detail='1' AND alerted='1' ORDER BY order_id desc  LIMIT 2");
					$all_on=$this->db->query("SELECT `user_name`,`order_id`,`order_date` FROM  `order` WHERE order_deleted =0 AND order_notify='1' AND seen_detail='1' AND alerted='1' ORDER BY order_id desc  LIMIT 10");
						if($all_on->num_rows()>0){	?>
									<li>
									<center class="text-muted" style="background:lightgray">---- older notifications----<center>
									</li>
						<?php	foreach($all_on->result_array() as $old_n_s)
							{
								
							
				?>
                  <li id="noti<?php echo $old_n_s['order_id'];?>"  style="background:lightgray;opacity:0.7"  >
                    <a href="<?php echo base_url('Notification/load_notification_order');?>/<?php echo $old_n_s['order_id'];?>">
                      <i class="fa fa-cart-plus text-aqua" ></i><?php echo $old_n_s['user_name'];?> placed order  <small class="text-muted text-red"><?php echo $old_n_s['order_date'];?></small>
                    </a>
                  </li>
                 
                 <?php }} ?>
				 
                
                 
                </ul>
              </li>
              <!--<li class="footer"><a href="#">View all</a></li>-->
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
      
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php if($this->session->userdata("user_image_emb")) { echo base_url()?>/<?php echo $this->session->userdata("user_image_emb"); } else { echo base_url("public/images/no_profile.png"); }?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('user_name_emb'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
			  
                <img src="<?php if($this->session->userdata("user_image_emb")) { echo base_url()?>/<?php echo $this->session->userdata("user_image_emb"); } else { echo base_url("public/images/no_profile.png"); }?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this->session->userdata('user_name_emb'); ?> - <?php echo $this->session->userdata('user_role_name_emb'); ?>
                 <!-- <small>Member since Nov. 2012</small>-->
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-6 text-center">
                    <a href="<?php echo site_url();?>" target="blank">Visit Website</a>
                  </div>
                  <div class="col-xs-6 text-center">
                    <a href="<?php echo site_url('Order/all_orders');?>">Orders</a>
                  </div>
                  
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo site_url('Profile');?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('Welcome/signout');?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!---------------------------------------------------popup modal-------------------------------------------------------->

<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="disc_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
							<h4 class="modal-title">Discount On Total Bill and Ambassdor discount</h4>
						</div>
						<div class="modal-body">
								
								<form class="form-horizontal" action="<?php echo site_url('Discount/update_discount');?>" method="post"  enctype="multipart/form-data">
											<center><label for="dis_amount">Discount on menu</label></center>
										  <div class="input-group col-md-offset-3 col-sm-6" >
											
												<span class="input-group-addon"><i class="fa fa-money"></i></span>
												<?php 
													$al_dis=$this->db->query("select *from discount where dis_id='1'")->row();
												?>
												<input type="hidden" name="dis_id" value="<?php if($al_dis){echo $al_dis->dis_id;}?>">
													
													<input type="number" min="0" value="<?php if($al_dis){echo $al_dis->discount;}?>" name="dis_amount" required class="form-control" placeholder="Enter discount eg 10">
												<span class="input-group-addon"><i class="fa fa-percent"></i></span>
												
										  </div>
										  <br/>
											<center><label for="dis_amount">Ambassador reference discount(to customer)</label></center>
										    <div class="input-group col-md-offset-3 col-sm-6" >
												<span class="input-group-addon"><i class="fa fa-money"></i></span>
													<input type="number" min="0" value="<?php if($al_dis){echo $al_dis->ref_discount;}?>" name="amb_dis" required class="form-control" placeholder="Enter ambassador discount eg 10">
												<span class="input-group-addon"><i class="fa fa-percent"></i></span>
												
										  </div>
										  <br/>
										  <center><label for="dis_amount">Ambassador reference points(on products)</label></center>
										    <div class="input-group col-md-offset-3 col-sm-6" >
												<span class="input-group-addon"><i class="fa fa-money"></i></span>
													<input type="number" min="0" value="<?php if($al_dis){echo $al_dis->ref_points_products;}?>" name="amb_product_points" required class="form-control" placeholder="Enter ambassador discount eg 10">
												<span class="input-group-addon"><i class="fa fa-percent"></i></span>
												
										  </div>
										  <br/>
										  <center><label for="dis_amount">Ambassador reference points(on deals)</label></center>
										    <div class="input-group col-md-offset-3 col-sm-6" >
												<span class="input-group-addon"><i class="fa fa-money"></i></span>
													<input type="number" min="0" value="<?php if($al_dis){echo $al_dis->ref_points_deals;}?>" name="amb_deal_points" required class="form-control" placeholder="Enter ambassador discount eg 10">
												<span class="input-group-addon"><i class="fa fa-percent"></i></span>
												
										  </div>
								
                              
						</div>
						<div class="modal-footer">
							<center><input type="submit" value="Update" style="width:30%" class="btn btn-success"></center>
							</form>
						<button type="button" class="btn blue" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!------------------------------------------------------------------->
			
			 <audio id="audiotag1" src="<?php echo base_url('public/audio/alarm.mp3');?>" preload="auto"></audio>
			 <audio id="audiotag2" src="<?php echo base_url('public/audio/beep.mp3');?>" preload="auto"></audio>
			 <audio id="audiowaiter" src="<?php echo base_url('public/audio/calling.mp3');?>" preload="auto"></audio>