<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>41 Heights | Attribute values</title>
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
		 <?php $this->load->view('admin/include/header');?>
		 <!----------------header-------------------------->
  <!-- Left side column. contains the logo and sidebar -->
  		 <!---------------------seting page active session--------------->
 <?php 
		$this->session->set_userdata('main','product_management');
		$this->session->set_userdata('main_sub','attr_cat');
		$this->session->set_userdata('page','all_attr_v');
	?>
	
 
	<!----------------sidebar-------------------------->
		 <?php $this->load->view('admin/include/sidebar');?>
		 <!----------------sidebar-------------------------->
		 <?php
		$this->session->unset_userdata('main');
		$this->session->unset_userdata('main_sub');
		$this->session->unset_userdata('page');
	?>

  <!-- Content Wrapper. Contains page content -->
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Food Attribute values
        <small>41 Heights</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="javascript:"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="javascript:">Menu management</a></li>
        <li class="active">All attribute values</li>
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
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
							<h4 class="modal-title">Add Attribute values</h4>
						</div>
						<div class="modal-body">
						<?php if (isset($all_cat) && $all_cat!=false) { ?>
							
                                       <form  class="form-horizontal" action="<?php echo site_url('Att_p/add_attr_value');?>" method="post"  enctype="multipart/form-data">
				
											  
											  <!---------------------->
															<div class="form-group">
																<!--<label for="inputName" class="col-sm-3 control-label">Attribute cat/Name</label>-->
															
																<div class=" col-sm-3 ">
																	<b>Select Attribute cat</b><br/>
																<select class="form-control" name="att_cat">
																	<?php
																		foreach($all_cat->result_array() as $att_cats) { ?>
																			<option value="<?php echo $att_cats['att_cat_id'];?>"><?php echo $att_cats['att_cat_name'];?></option>
																		<?php } ?>
																</select>
															  </div>
															  <div class=" col-sm-3 ">
																	<b>Attribute name*</b><br/>
																	<input type="text" name="att_name" required class="form-control" placeholder="Att Name(e.g size)">
															  </div>
															  <div class="col-sm-3">
																	<b>Customization Type*</b><br/>
																	<input type="radio"  name="att_selection" value="multi"> Multi select<br/>
																	<input type="radio"  name="att_selection" value="single" checked> Single select
																	
																</div>
															  <div class=" col-sm-3 ">
																	<b></b><br/>
																	<a style="text-align:left;cursor:pointer"  onclick="add_value_span()">+ Add New Value </a>
															  </div>
						
															
														</div>
														<!---------------------->
															 <!---------------------->
															<div class="form-group" style="background:#f6f6f6">
																<!--<label for="inputName" class="col-sm-3 control-label">value & Cost</label>-->
																 <div class="col-sm-4">
																	 <b>Attribute value*</b><br/>
																	 <input type="text" class="form-control"  autocomplete="off" name="att_value[]" placeholder="Enter value(e.g 7'')" required>
																</div>
																 <div class="col-sm-4">
																	 <b>Attribute description</b><br/>
																	 <input type="text" class="form-control"  autocomplete="off" name="att_desc[]" placeholder="Enter desc(e.g small)" >
																</div>
																 <div class="col-sm-2">
																		 <b>Attribute price</b><br/>
																		 <input type="number" class="form-control"  name="att_price[]"  placeholder="price" value="0">
																</div>
																 <div class="col-sm-2">
																		 <b>Att selected</b><br/>
																		 <select class="form-control" name="att_selected[]">
																		 <option  value="1" > Yes </option>
																		 <option   value="0" selected > No </option>
																		 </select>
																</div>
																 <div class="col-sm-4">
																	<b>Att android icon</b><br/>
																	<input type="file" class="form-control" name="att_image[]">
																	
																</div>
																<div class="col-sm-4">
																	<b>Att android after click icon</b><br/>
																	<input type="file" class="form-control" name="att_after_image[]">
																	
																</div>
																<div class="col-sm-4">
																	<b>Att web icon</b><br/>
																	<input type="file" class="form-control" name="att_web_image[]">
																	
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
								<?php } else{ ?>
									<center>
										<h1>First add attribute category<h1>
										<a href="<?php echo site_url('Att_p/all_attr_cat');?>"><h2>Add cat</h2></a>
									</center>
								<?php } ?>
								
                              
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
<!-------------------------------------------------pop up modal  for adding new value------------------------------------------------------------>
     <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="add_new_val" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
							<h4 class="modal-title">Add new value</h4>
						</div>
						<div class="modal-body">
						
							
                                       <form  class="form-horizontal" action="<?php echo site_url('Att_p/add_attr_new_value');?>" method="post"  enctype="multipart/form-data">
				
											  
											  <!---------------------->
															<div class="form-group">
																<!--<label for="inputName" class="col-sm-3 control-label">Attribute cat/Name</label>-->
															
																
															  <div class=" col-sm-3 ">
																	
																	<input type="hidden" name="att_id" id="att_id" required class="form-control" placeholder="Att Name(e.g size)">
																	<input type="hidden" name="att_name" id="att_name" required class="form-control" placeholder="Att Name(e.g size)">
															  </div>
															  <div class="col-sm-3 col-lg-offset-6">
																	<b></b><br/>
																	<a style="text-align:left;cursor:pointer"  onclick="add_new_value_span()">+ Add New Value </a>
															  </div>
															  
						
															
														</div>
														<!---------------------->
															 <!---------------------->
															<div class="form-group" style="background:#f6f6f6">
																<!--<label for="inputName" class="col-sm-3 control-label">value & Cost</label>-->
																 <div class="col-sm-4">
																	 <b>Attribute value*</b><br/>
																	 <input type="text" class="form-control"  autocomplete="off" name="att_value[]" placeholder="Enter value(e.g 7'')" required>
																</div>
																 <div class="col-sm-4">
																	 <b>Attribute description</b><br/>
																	 <input type="text" class="form-control"  autocomplete="off" name="att_desc[]" placeholder="Enter desc(e.g small)" >
																</div>
																 <div class="col-sm-2">
																		 <b>Attribute price</b><br/>
																		 <input type="number" class="form-control"  name="att_price[]"  placeholder="price" value="0">
																</div>
																 <div class="col-sm-2">
																		 <b>Att selected</b><br/>
																		 <select class="form-control" name="att_selected[]">
																		 <option  value="1" > Yes </option>
																		 <option   value="0" selected > No </option>
																		 </select>
																</div>
																 <div class="col-sm-4">
																	<b>Att android icon</b><br/>
																	<input type="file" class="form-control" name="att_image[]">
																	
																</div>
																<div class="col-sm-4">
																	<b>Att android after click icon</b><br/>
																	<input type="file" class="form-control" name="att_after_image[]">
																	
																</div>
																<div class="col-sm-4">
																	<b>Att web icon</b><br/>
																	<input type="file" class="form-control" name="att_web_image[]">
																	
																</div>
																
						
															</div>
															<span id="show_new_value_span"></span>
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
				<div class="modal-dialog modal-lg">
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
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
							<h4 class="modal-title">Item Edit</h4>
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
              <h3 class="box-title">Food attributes value</h3>
			    <a href="#add_new" data-toggle="modal" class="btn btn-info pull-right">Add New</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<?php //var_dump($all_staff->result_array());?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                 
                  <th>attribute name</th>
                  <th>attribute assigned to</th>
                  <th>attribute values/price</th>
                 <th>Add</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
				<?php
					//var_dump($all_att->result_array());
						if(isset($all_att) && $all_att!=false){
						$count=0;
						foreach($all_att->result_array() as $row){ ?>
                <tr>
                  <td><?php echo ++$count;?></td>
                  
                  <td><?php echo $row['att_name'];?> </td>
                  <td><?php echo $row['att_cat_name'];?> </td>
                  <td><a onClick="full_items_det(<?php echo $row['att_name_id']; ?>)" style="cursor:pointer" href="#full_items" data-toggle="modal"> view all values</a> </td>
                  <td><a onClick="add_new('<?php echo $row['att_name_id'];?>','<?php echo $row['att_name'];?>')" style="cursor:pointer" href="#add_new_val" data-toggle="modal">Add New Value</a></td>
                  <td><a onClick="edit_att(<?php echo $row['att_name_id']; ?>)" style="cursor:pointer" href="#popup3" data-toggle="modal"> Edit</a></td>
                  <td>
						<?php if( $this->session->userdata('user_role_emb')=="admin" ) { echo "-"; } else{ 
						
							$u_id=$this->encrypt->encode($row['att_name_id']);
						 $u_id = strtr(
						$u_id,
						array(
							'+' => '.',
							'=' => '-',
							'/' => '~'
						)
					);
						
						?>
								<a title="delete record" onclick="return confirm('Are you sure?')" href="<?php echo site_url('Att_p/delete_att')?>/<?php echo $u_id;?>"><span class="glyphicon glyphicon-trash"></span></td>
						<?php } ?>
			  </tr>
              
                <?php } } ?>
               
                </tbody>
                
              </table>
			  <a href="#add_new" data-toggle="modal" class="btn btn-info">Add New</a>
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
  <?php $this->load->view('admin/include/footer');?>

  <!-- Control Sidebar -->
 <?php $this->load->view('admin/include/setting_aside_bar');?>
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
			
				
				$("#show_value_span").append('<div class="row" style="background:#f6f6f6"><div class="col-sm-4"><b>Attribute value*</b><br/><input type="text" class="form-control"  autocomplete="off" name="att_value[]" placeholder="Enter value(e.g 12 in)" required></div><div class="col-sm-4"> <b>Attribute description</b><br/> <input type="text" class="form-control"  autocomplete="off" name="att_desc[]" placeholder="Enter desc(e.g medium)"></div><div class="col-sm-2"><b>Attribute price</b><br/> <input type="number" class="form-control"  name="att_price[]"  placeholder="price" value="0"></div><div class="col-sm-2"><b>Att selected</b><br/><select class="form-control" name="att_selected[]"><option  value="1" > Yes </option><option   value="0" selected > No </option></select></div> <div class="col-sm-4"><b>Attribute image</b><br/><input type="file" class="form-control" name="att_image[]"></div><div class="col-sm-4"><b>Att android after click icon</b><br/><input type="file" class="form-control" name="att_after_image[]"></div><div class="col-sm-4"><b>Att web icon</b><br/><input type="file" class="form-control" name="att_web_image[]"></div></div><hr/>');
 
				
			
				
			}
			function add_new_value_span(){
			
				
				$("#show_new_value_span").append('<div class="row" style="background:#f6f6f6"><div class="col-sm-4"><b>Attribute value*</b><br/><input type="text" class="form-control"  autocomplete="off" name="att_value[]" placeholder="Enter value(e.g 12 in)" required></div><div class="col-sm-4"> <b>Attribute description</b><br/> <input type="text" class="form-control"  autocomplete="off" name="att_desc[]" placeholder="Enter desc(e.g medium)"></div><div class="col-sm-2"><b>Attribute price</b><br/> <input type="number" class="form-control"  name="att_price[]"  placeholder="price" value="0"></div> <div class="col-sm-2"><b>Att selected</b><br/><select class="form-control" name="att_selected[]"><option  value="1" > Yes </option><option   value="0" selected > No </option></select></div><div class="col-sm-4"><b>Attribute image</b><br/><input type="file" class="form-control" name="att_image[]"></div><div class="col-sm-4"><b>Att android after click icon</b><br/><input type="file" class="form-control" name="att_after_image[]"></div><div class="col-sm-4"><b>Att web icon</b><br/><input type="file" class="form-control" name="att_web_image[]"></div></div><hr/>');
				
			
				
			}
			////////////////////////////////////////add dynamic field during editing //////////////
			
  ////////////////////////////////////////////
  	function edit_att(d)
		
			{
  		document.getElementById("detail_edit").innerHTML = "<center>Wait Loading..</center>";
			var user_id=d;
			
			
			 // Create our XMLHttpRequest object
					var hr = new XMLHttpRequest();
					// Create some variables we need to send to our PHP file
					var url ="<?php echo site_url('Att_p/edit_att_val_display')?>/"+user_id;
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
			  function add_new(id,name)
			  {
				//alert();
				$("#att_id").val(id);
				$("#att_name").val(name);
			  }
  	function full_items_det(d)
		
			{
  		document.getElementById("detail_item").innerHTML = "<center>Wait Loading..</center>";
			var user_id=d;
			
			
			 // Create our XMLHttpRequest object
					var hr = new XMLHttpRequest();
					// Create some variables we need to send to our PHP file
					var url ="<?php echo site_url('Att_p/full_detail_att_values')?>/"+user_id;
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
