 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php if($this->session->userdata("user_image_emb")) { echo base_url()?>/<?php echo $this->session->userdata("user_image_emb"); } else { echo base_url("public/images/no_profile.png"); }?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('user_name_emb'); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" readonly class="form-control" value="<?php echo date("d-m-Y");?>" placeholder="date">
              <span class="input-group-btn">
                <a href="javascript:" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-calendar"></i>
                </a>
              </span>
        </div>
      </form>
	  
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?php if ($this->session->userdata('main')=="dashboard"){echo "active";} else{} ?> treeview">
          <a href="<?php echo site_url('Welcome/dashboard_load');?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
        </li>
      
		<!------------------------------------------------------------->
			<li class="treeview <?php if ($this->session->userdata('main')=="user_management"){echo "active";} else{} ?>">
          <a href="#">
            <i class="fa fa-users"></i> <span>Users Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
           
            <li class="<?php if ($this->session->userdata('main_sub')=="staff_management"){echo "active";} else{} ?>">
              <a href="#"><i class="fa fa-circle-o"></i>Staff 
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
					<li class="<?php if ($this->session->userdata('page')=="add_staff"){echo "active";} else{} ?>"><a href="<?php echo site_url('Staff/add_staff_page');?>"><i class="fa fa-circle-o"></i> Add Staff</a></li>
					<li class="<?php if ($this->session->userdata('page')=="all_staff"){echo "active";} else{} ?>"><a href="<?php echo site_url('Staff');?>"><i class="fa fa-circle-o"></i> View All</a></li>
            
			</ul>
            </li>
				 <li class="<?php if ($this->session->userdata('main_sub')=="ambassador_management"){echo "active";} else{} ?>">
              <a href="#"><i class="fa fa-circle-o"></i> Ambassadors
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if ($this->session->userdata('page')=="all_ambassadors"){echo "active";} else{} ?>"><a href="<?php echo site_url('Ambassador/all_ambassadors');?>"><i class="fa fa-circle-o"></i> All Ambassadors</a></li>
              
               
               
              </ul>
            </li>
			
		
			
           
          </ul>
        </li>
		<!------------------------------------------------------------->
		 <li class="treeview <?php if ($this->session->userdata('main')=="product_management"){echo "active";} else{} ?>">
          <a href="#">
            <i class="fa fa-paste"></i> <span>products Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
           
            <li class="<?php if ($this->session->userdata('main_sub')=="menu_cat"){echo "active";} else{} ?>">
              <a href="#"><i class="fa fa-circle-o"></i>Categories
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if ($this->session->userdata('page')=="add_cat"){echo "active";} else{} ?>"><a href="<?php echo site_url('Cat_p/cat_add_page');?>"><i class="fa fa-circle-o"></i> Add Category</a></li>
                <li class="<?php if ($this->session->userdata('page')=="all_cat"){echo "active";} else{} ?>"><a href="<?php echo site_url('Cat_p');?>"><i class="fa fa-circle-o"></i> view all Categories</a></li>
               
              </ul>
            </li>
				 <li class="<?php if ($this->session->userdata('main_sub')=="products"){echo "active";} else{} ?>">
              <a href="#"><i class="fa fa-circle-o"></i> Products
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if ($this->session->userdata('page')=="add_product"){echo "active";} else{} ?>"><a href="<?php echo site_url('Product_p/add_product_page');?>"><i class="fa fa-circle-o"></i> Add Product</a></li>
                <li class="<?php if ($this->session->userdata('page')=="all_products"){echo "active";} else{} ?>"><a href="<?php echo site_url('Product_p/all_products');?>"><i class="fa fa-circle-o"></i> View All products</a></li>
               
               
              </ul>
            </li>
			<li class="<?php if ($this->session->userdata('main_sub')=="attr_cat"){echo "active";} else{} ?>">
              <a href="#"><i class="fa fa-circle-o"></i> Attributes
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if ($this->session->userdata('page')=="all_attr_cat"){echo "active";} else{} ?>"><a href="<?php echo site_url('Att_p/all_attr_cat');?>"><i class="fa fa-circle-o"></i> Attribute cat</a></li>
                <li class="<?php if ($this->session->userdata('page')=="all_attr_v"){echo "active";} else{} ?>"><a href="<?php echo site_url('Att_p/all_att_value');?>"><i class="fa fa-circle-o"></i> Attribute values</a></li>
                
               
              </ul>
            </li>
				<li class="<?php if ($this->session->userdata('main_sub')=="deals"){echo "active";} else{} ?>">
              <a href="<?php echo site_url("Deals");?>"><i class="fa fa-circle-o"></i> Deals
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
			                <ul class="treeview-menu">
                <li class="<?php if ($this->session->userdata('page')=="add_deal"){echo "active";} else{} ?>"><a href="<?php echo site_url('Deals/add_deal_page');?>"><i class="fa fa-circle-o"></i> Add Deal</a></li>
                <li class="<?php if ($this->session->userdata('page')=="all_deals"){echo "active";} else{} ?>"><a href="<?php echo site_url('Deals');?>"><i class="fa fa-circle-o"></i> View deals</a></li>
                
               
              </ul>
             
            </li>
		
			 <li ><a href="#disc_modal" data-toggle="modal"><i class="fa fa-circle-o"></i> Discount</a></li>
           
          </ul>
        </li>
		
		<!------------------------------------------------------------------------------------------- -->
	<li  class="treeview <?php if ($this->session->userdata('main')=="slider"){echo "active";} else{} ?>">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Menu Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('Slider');?>"><i class="fa fa-circle-o"></i> Android</a></li>
            <li><a href="<?php echo site_url('Slider/web_slider');?>"><i class="fa fa-circle-o"></i> Web</a></li>
            
          </ul>
        </li>
  <!------------------------------------------------------------------------------------------- -->
        <li  class="treeview <?php if ($this->session->userdata('main')=="gallery"){echo "active";} else{} ?>">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Gallery</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('Gallery/gallery_web');?>"><i class="fa fa-circle-o"></i> View all</a></li>
            
            
          </ul>
        </li>
		<!--------------------------------------------------------------------------------------------->
		<!------------------------------------------------------------------------------------------- -->
	<li  class="treeview <?php if ($this->session->userdata('main')=="coupon"){echo "active";} else{} ?>">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Coupons</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('Coupon');?>"><i class="fa fa-circle-o"></i> View all</a></li>
            
          </ul>
        </li>
		<!--------------------------------------------------------------------------------------------->
		<!--<li class="treeview <?php if ($this->session->userdata('main')=="mails"){echo "active";} else{} ?>">
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span>Mails/subscriptions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if ($this->session->userdata('page')=="mails_rec"){echo "active";} else{} ?>"><a href="<?php echo site_url('Contact/all_received_mails');?>"><i class="fa fa-circle-o"></i> Client messages</a></li>
            <li class="<?php if ($this->session->userdata('page')=="newsletter"){echo "active";} else{} ?>"><a href="<?php echo site_url('Contact/all_newsletter');?>"><i class="fa fa-circle-o"></i> newsletter subscribers</a></li>
            
          </ul>
        </li>-->
		<!--------------------------------------------------------------------------------------------->
			  <li  class="treeview <?php if ($this->session->userdata('main')=="order_management"){echo "active";} else{} ?>">
          <a href="#">
            <i class="fa fa-cart-plus"></i>
            <span>Orders Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if ($this->session->userdata('page')=="all_pending_orders"){echo "active";} else{} ?>"><a href="<?php echo site_url('Order/all_pending_orders');?>"><i class="fa fa-circle-o"></i> Pending Orders</a></li>
            <li class="<?php if ($this->session->userdata('page')=="all_orders"){echo "active";} else{} ?>"><a href="<?php echo site_url('Order/all_orders');?>"><i class="fa fa-circle-o"></i> All Orders</a></li>
            <li class="<?php if ($this->session->userdata('page')=="and_feedbacks"){echo "active";} else{} ?>"><a href="<?php echo site_url('Feedback/android_feebacks');?>"><i class="fa fa-circle-o"></i>Order Feedbacks <span class="label label-primary"><?php echo $this->db->count_all_results('feedback');?></span></a></li>
            
          </ul>
        </li>
		<!--------------------------------------------------------------------------------------------->
		<li class="treeview <?php if ($this->session->userdata('main')=="location"){echo "active";} else{} ?>">
              <a href="#">
                <i class="fa fa-map-marker"></i>
                <span>Delivery Locations</span>
              
			   <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              
                <li class="<?php if ($this->session->userdata('page')=="all_locations"){echo "active";} else{} ?>"><a href="<?php echo site_url('Location/all_locations');?>"><i class="fa fa-circle-o"></i> view all</a></li>
                
                
              </ul>
            </li>
			<!--------------------------------------------------------------------------------------------->
		<li class="treeview <?php if ($this->session->userdata('main')=="rest_timing"){echo "active";} else{} ?>">
          <a href="#">
            <i class="fa fa-clock-o"></i>
            <span>Restaurant Timing</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if ($this->session->userdata('page')=="open_close"){echo "active";} else{} ?>"><a href="<?php echo site_url('Rest_timing');?>"><i class="fa fa-circle-o"></i> Opening/closing</a></li>
          
            
          </ul>
        </li>
		<!--------------------------------------------------------------------------------------------->
        
		<li class="treeview <?php if ($this->session->userdata('main')=="android_not"){echo "active";} else{} ?>">
          <a href="<?php echo site_url('Notification/notification_page');?>">
            <i class="fa fa-th"></i> <span>Promotional notification</span>
         
          </a>
        </li>
		
     <!--   <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>-->
       <!-- <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>-->
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>