<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Uniscreen | food attribute assign</title>
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
		$this->session->set_userdata('main','menu_management');
		$this->session->set_userdata('main_sub','menu_food_attr');
		$this->session->set_userdata('page','food_att_assign');
	?>
	
 
	<!----------------sidebar-------------------------->
		 <?php $this->load->view('include/sidebar');?>
		 <!----------------sidebar-------------------------->
		 <?php
		$this->session->unset_userdata('main','menu_management');
		$this->session->unset_userdata('main_sub');
		$this->session->unset_userdata('page','food_att_assign');
	?>

  <!-- Content Wrapper. Contains page content -->
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Food Attribute asigning
        <small>Restaurant Name</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="javascript:"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="javascript:">Menu management</a></li>
        <li class="active">Attribute assign</li>
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
	<!-------------------------------------------------pop up modal  for addin new category------------------------------------------------------------>
     <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="add_new" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
							<h4 class="modal-title">Add Attribute values</h4>
						</div>
						<div class="modal-body">
							
                                       <form  class="form-horizontal" action="<?php echo site_url('Menu/add_attr_value');?>" method="post"  enctype="multipart/form-data">
				
											  
											  <!---------------------->
															<div class="form-group">
																<label for="inputName" class="col-sm-3 control-label">Attribute Name</label>
															
																<div class=" col-sm-7 ">
																	
																	<input type="text" name="att_name" required class="form-control" placeholder="Enter name of attribute(e.g flavour)">
															  </div>
						
															</div>
														<!---------------------->
															 <!---------------------->
															<div class="form-group">
																<label for="inputName" class="col-sm-3 control-label">value & Cost</label>
																 <div class="col-sm-4">
																 <input type="text" class="form-control"  autocomplete="off" name="att_value[]" placeholder="Enter value(chicken tikka)" required>
																</div>
																 <div class="col-sm-3">
																 <input type="number" class="form-control"  name="att_price[]"  placeholder="price" required>
																</div>
																 <div class="col-sm-2">
																	<a style="text-align:left;cursor:pointer"  onclick="add_value_span()">+ Add </a>
																</div>
						
															</div>
															<span id="show_value_span"></span>
														<!---------------------->
											  
											 <br/>
											   <div class="col-sm-12 col-lg-offset-3">
														<div class="col-sm-3 ">
														
																<button type="submit" required class="form-control btn btn-success add_btn" > Add</button>
														
														</div>
														<div class="col-sm-3 ">
														
																<button  data-dismiss="modal" class="form-control btn btn-danger">Cancel</button>
														
														</div>
													
							
												</div>
											 <br><br>
											  
										</form>
								
                              
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


<!---------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------pop up modal for detail of items/values of attribute------------------------------------------------------------>
     <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="full_items" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
							<h4 class="modal-title">values</h4>
						</div>
						<div class="modal-body">
								
                            <div id="detail_item">
	</div>                            
                              
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


<!---------------------------------------------------------------------------------------------------------------------------->
	<!-------------------------------------------------pop up modal 3------------------------------------------------------------>
     <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="popup3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
							<h4 class="modal-title">Assigned attributes</h4>
						</div>
						<div class="modal-body">
								
                            <div id="detail_edit">
	</div>                            
                              
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


<!---------------------------------------------------------------------------------------------------------------------------->
      <div class="row">
        <div class="col-xs-12">
     
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Food attributes asigned</h3>
			    
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<?php //var_dump($all_staff->result_array());?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                 
                  <th>attribute category</th>
                  <th>assigned attributes/values</th>
                 
                 <!-- <th>Edit</th>-->
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
				<?php
					//var_dump($all_att->result_array());
						if($all_att!=false){
						$count=0;
						foreach($all_att->result_array() as $row){ ?>
                <tr>
                  <td><?php echo ++$count;?></td>
                  
                  <td><?php echo $row['f_att_name'];?> </td>
                  <td><a onClick="all_attributes(<?php echo $row['f_att_id']; ?>)" style="cursor:pointer" href="#full_items" data-toggle="modal"> view all assigned attributes</a> </td>
                  
                  <!--<td><a onClick="edit_att(<?php echo $row['f_att_id']; ?>)" style="cursor:pointer" href="#popup3" data-toggle="modal"> Edit</a></td>-->
                  <td>
						<?php if( $this->session->userdata('user_role_uns')=="admin" ) { echo "-"; } else{ 
						
							$u_id=$this->encrypt->encode($row['f_att_id']);
						 $u_id = strtr(
						$u_id,
						array(
							'+' => '.',
							'=' => '-',
							'/' => '~'
						)
					);
						
						?>
								<a title="delete record" onclick="return confirm('Are you sure?')" href="<?php echo site_url('Menu/delete_attr_val')?>/<?php echo $u_id;?>"><span class="glyphicon glyphicon-trash"></span></td>
						<?php } ?>
			  </tr>
              
                <?php } } ?>
               
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
  ////////////////////////////////////////add dynamic fields //////////////
			function add_value_span(){
			
				
				$("#show_value_span").append('<div class="form-group"><label for="inputName" class="col-sm-3 control-label"></label><div class="col-sm-4"><input type="text" class="form-control"  name="att_value[]" placeholder="e.g chicken fajita" required></div><div class="col-sm-3"> <input type="number" class="form-control"  name="att_price[]" placeholder="price"  required></div><div class="col-sm-2 remove"><a style="text-align:left;cursor:pointer" class="" ><span class="glyphicon glyphicon-trash" style="color:red"></a></div></div>');
			
				
			}
			////////////////////////////////////////add dynamic field during editing //////////////
			function add_att_value(){
			
				
				$("#show_att_span").append('<div class="form-group removes" ><label for="inputName" class="col-sm-4 control-label">New value</label><div class="col-sm-3"><input type="text" class="form-control"  name="att_editadd_value[]" placeholder="Enter name" required></div><div class="col-sm-3"> <input type="number" min="1" class="form-control expense_amount"  name="att_editadd_price[]"  placeholder="price" required></div><div class="col-sm-2 remove"><a style="text-align:left;cursor:pointer" class="remove" ><span class="glyphicon glyphicon-trash" style="color:red"></a></div></div>');
			
				
			}
  ////////////////////////////////////////////
  	function edit_att(d)
		
			{
  		document.getElementById("detail_edit").innerHTML = "<center>Wait Loading..</center>";
			var user_id=d;
			
			
			 // Create our XMLHttpRequest object
					var hr = new XMLHttpRequest();
					// Create some variables we need to send to our PHP file
					var url ="<?php echo site_url('Menu/edit_att_val_display')?>/"+user_id;
				//	alert(url);
					hr.open("POST", url, true);
					// Set content type header information for sending url encoded variables in the request
					hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					// Access the onreadystatechange event for the XMLHttpRequest object
					hr.onreadystatechange = function() {
						if(hr.readyState == 4 && hr.status == 200) {
							var return_data = hr.responseText;
							//alert(return_data);
							document.getElementById("detail_edit").innerHTML = "";
							document.getElementById("detail_edit").innerHTML = return_data;
						}
					}
					// Send the data to PHP now... and wait for response to update the status div
					hr.send();
			
						
			}
			  ////////////////////////////////////////////
  	function all_attributes(d)
		
			{
  		document.getElementById("detail_edit").innerHTML = "<center>Wait Loading..</center>";
			var user_id=d;
			
			
			 // Create our XMLHttpRequest object
					var hr = new XMLHttpRequest();
					// Create some variables we need to send to our PHP file
					var url ="<?php echo site_url('Menu/all_assigned_attributes')?>/"+user_id;
				//	alert(url);
					hr.open("POST", url, true);
					// Set content type header information for sending url encoded variables in the request
					hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					// Access the onreadystatechange event for the XMLHttpRequest object
					hr.onreadystatechange = function() {
						if(hr.readyState == 4 && hr.status == 200) {
							var return_data = hr.responseText;
							//alert(return_data);
							document.getElementById("detail_item").innerHTML = "";
							document.getElementById("detail_item").innerHTML = return_data;
						}
					}
					// Send the data to PHP now... and wait for response to update the status div
					hr.send();
			
						
			}
			///////////////////////////////////////
	$('document').ready(function() {  
						
					setInterval(function() {
							$(".pad margin no-print").hide();
							$("#board").hide();
						 
						}, 1000*4);	
		   
		});
</script>
</body>
</html>
