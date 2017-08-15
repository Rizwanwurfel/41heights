<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Embroidery | All  pending orders</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url()?>/public/theme/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()?>/public/theme/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>/public/theme/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>/public/theme/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 <!----------------header-------------------------->
		 <?php $this->load->view('include/header');?>
		 <!----------------header-------------------------->
  <!-- Left side column. contains the logo and sidebar -->
  		 <!---------------------seting page active session--------------->
 <?php 
		$this->session->set_userdata('main','order_management');
		//$this->session->set_userdata('main_sub','menu_food');
		$this->session->set_userdata('page','all_pending_orders');
		
	?>
	
 
	<!----------------sidebar-------------------------->
		 <?php $this->load->view('include/sidebar');?>
		 <!----------------sidebar-------------------------->
		 <?php
		$this->session->unset_userdata('main');
		//$this->session->unset_userdata('main_sub');
		$this->session->unset_userdata('page');
	?>

  <!-- Content Wrapper. Contains page content -->
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All pending  Orders
        <small>Embroidery</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="javascript:"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="javascript:">order management</a></li>
        <li class="active">All  pending orders</li>
      </ol>
    </section>
		<?php 
		
		if( $this->session->userdata('success')) {
		?>
		<div class="pad margin no-print" id="board">
          <div class="callout callout-success" style="margin-bottom: 0!important;">
            
           <i class="fa fa-info"> <?php echo $this->session->userdata('success');?></i>
          </div>
        </div>
		<?php 
		
		$this->session->unset_userdata('success');
		} ?>
		<?php 
		
		if( $this->session->userdata('failure')) {
		?>
		<div class="pad margin no-print" id="board" >
          <div class="callout callout-danger" style="margin-bottom: 0!important;">
            
           <i class="fa fa-info" > <?php echo $this->session->userdata('failure');?></i>
          </div>
        </div>
		<?php 
		
		$this->session->unset_userdata('failure');
		} ?>


    <!-- Main content -->
    <section class="content">
	<!-------------------------------------------------pop up modal 3------------------------------------------------------------>

<!---------------------------------------------------popup modal-------------------------------------------------------->



<!---------------------------------------------------------------------------------------------------------------------------->
<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="popup_order" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
							<h4 class="modal-title">order detail</h4>
						</div>
						<div class="modal-body">
								<span id="detail_order"></span>
                           
                                                    
                              
						</div>
						<div class="modal-footer">
						<button type="button" class="btn blue" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
<!---------------------------------------------------popup modal3 for edit detail-------------------------------------------------------->

<input id="not_number" type="hidden" readonly value="<?php if(isset($order_no) && !empty($order_no)){ echo $order_no;} else { echo "00";} ?>"/>
<!---------------------------------------------------------------------------------------------------------------------------->
      <div class="row">
        <div class="col-xs-12">
     
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">ALL Items</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<?php //var_dump($pro_details->result_array());?>
            <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
					   <th>No</th>
					   <th>Order No</th>
					   <th>Customer Name</th>
                        <th>Customer phone</th>
                        <th>Customer Country</th>
						<th>Total bill</th>
                        <th>Order Detail</th>
                        <th>Action</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
							if(!empty($pro_details)) {
					$count=1;
							foreach($pro_details->result_array() as $row){  
									
							
							?>
                       <tr id="<?php echo $row['order_id'];?>" <?php if ($row['seen_detail']==0){ echo "style='background:linear-gradient(45deg, rgba(254,187,187,1) 0%,rgba(254,186,186,1) 1%,rgba(254,150,150,0.3) 58%,rgba(254,144,144,0.3) 67%,rgba(255,92,92,0.3) 100%); ' " ;} ?>>
                        <td><?php echo $count;?></td>
                        <td><?php echo $row['order_no'];?></td>
                        <td><?php echo $row['order_fname']." ".$row['order_lname'];?></td>
                        <td><?php echo $row['order_phone'];?></td>
                        <td><?php echo $row['order_country'];?></td>
                        <td><?php echo "$".$row['order_total'];?></td>
						<?php
							 $or_id=$this->encrypt->encode($row['order_id']);
								 $or_id = strtr(
								$or_id,
								array(
									'+' => '.',
									'=' => '-',
									'/' => '~'
								)
							);
					?>
                      
                   
                        <td> <a  onClick="detail_order(<?php echo $row['order_id']; ?>)" style="cursor:pointer" href="#popup_order" data-toggle="modal">&nbsp;&nbsp;&nbsp;Detail&nbsp;&nbsp;&nbsp;</a></td>
                        <td><a href="<?php echo site_url('Order/update_order_status/cancelled')?>/<?php echo $or_id;?>" class="">reject/cancel</a> || <a href="<?php echo site_url('Order/update_order_status/delivered')?>/<?php echo $or_id;?>" class="">delivered</a></td>
                   
                        <td><a  onclick="return confirm('Are you sure?')" href="<?php echo site_url('Order/delete_order_pen')?>/<?php echo $or_id;?>"><span class="glyphicon glyphicon-trash"></span></td>
                      </tr>
                   
                    
                    
                     <?php $count++; } } else { ?>
					 
						
					 <?php } ?>
						
							
                     </tbody>
                  </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('include/footer');?>

  <!-- Control Sidebar -->
 <?php $this->load->view('include/setting_aside_bar');?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url()?>/public/theme/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url()?>/public/theme/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url()?>/public/theme/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>/public/theme/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url()?>/public/theme/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()?>/public/theme/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>/public/theme/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>/public/theme/dist/js/demo.js"></script>
<script>
	var baseURL = "<?php echo site_url(); ?>";
</script>
<script src="<?php echo base_url()?>/public/notification.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
  ////////////////////////////////////////////
 </script>
 <script type="text/javascript">
	/////////////////////////////////////////////////////////////

	/////////////////////////////////////////////////////////////
	

			/////////////////////////////////function for order detail////////////////////////////////
				function detail_order(d)
		
			{
				
			var order_id=d;
			
			document.getElementById("detail_order").innerHTML = "<center>wait loading..</center>";
			$("#"+order_id+"" ).css( "background" ,"none");
			$("#noti"+order_id+"" ).remove( );
			 // Create our XMLHttpRequest object
					var hr = new XMLHttpRequest();
					// Create some variables we need to send to our PHP file
					var url ="<?php echo site_url('Order/order_complete_detail')?>/"+order_id;
					//alert(url);
					hr.open("POST", url, true);
					
					// Set content type header information for sending url encoded variables in the request
					hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					// Access the onreadystatechange event for the XMLHttpRequest object
					
					hr.onreadystatechange = function() {
					
						if(hr.readyState == 4 && hr.status == 200) {
							var return_data = hr.responseText;
							//alert(return_data);
							document.getElementById("detail_order").innerHTML = return_data;
						}
					}
					// Send the data to PHP now... and wait for response to update the status div
					hr.send();
			
						
			}
			/////////////////////////////////////////////////////////////////////

			/////////////////////////function notification rung//////////////////
		
			
			///////////////////////////////////////function for hide alert notified bar with delay/////////
			function hide_bar()
			{
				window.setTimeout(function(){
               
						$(".pad margin no-print").hide();
							$("#board").hide();				 
                  }, 5000);
							
							
			}
			
			//////////////////////////////////////////////////////////////////////////////////////////
		$('document').ready(function() {  
							hide_bar();
							//alert();
							//////////////////for auto open notification clicked order///////////////////////////
										var ss=$("#not_number").val();
										if(ss=="00")
										{
										}
										else
										{
											$('#popup_order').modal('show');
											detail_order(ss);
											
										}
						setInterval(function() {
						
							/////////////////////////////checking for notifications////////////
						 
						 check_noti();
						 check_label();
						}, 1000*5);					
		
		   
		});
</script>
</body>
</html>
