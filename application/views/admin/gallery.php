<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>41 Heights | Gallery</title>
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
		$this->session->set_userdata('main','slider');
		$this->session->set_userdata('page','slideer_p');
	?>
	
 
	<!----------------sidebar-------------------------->
		 <?php $this->load->view('admin/include/sidebar');?>
		 <!----------------sidebar-------------------------->
		 <?php
		$this->session->unset_userdata('main');
		$this->session->unset_userdata('page');

		


	?>

  <!-- Content Wrapper. Contains page content -->
  
  <!---------------------------------------------------popup modal3 for edit detail-------------------------------------------------------->

     <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="popup4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
							<h4 class="modal-title">Gallery edit</h4>
						</div>
						<div class="modal-body">
								<form class="form-horizontal" method="post" action="<?php echo site_url('Gallery/add_gallery')?>" enctype="multipart/form-data">
								<div class="form-group">
			                        <label for="inputName" class="col-sm-4 control-label">Image Text</label>
								
                        			<input name="gallery_text" type="text" class="control-form"> 
                        			
                        			</div>

                        			<div class="form-group">
			                        <label for="inputName" class="col-sm-4 control-label">Gallery Image</label>
			                        
			                         <div class="col-sm-4">
									 
			                        
									 <input type="file" name="gallery_image" id="gallery_image"/>
			                        </div>
									</div>
								  <!----------------------------------- -->
					  
					  
					 
                    
						<div class="form-group">
                        <div class="col-sm-offset-2 col-sm-7">
                         <center>  <button  type="submit" class="btn btn-success" id="password_update" style="width:250px;margin-left:15%" >Add</button>
						 <!-- <button type="button" class="btn btn-danger js-modal-close">cancel</button>--></center>
                        </div>
                      </div>
                       </form>                       
                              
						</div>
						<div class="modal-footer">
						<br>
						<button type="button" class="btn blue" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
<!---------------------------------------------------popup modal3 for edit detail----------------------------------------------
---------->

			<div class="modal fade" id="popup3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
							<h4 class="modal-title">Gallery edit</h4>
						</div>
						<div class="modal-body">
								
                         <p id="detail_edit">
				 
						
				   
	
	
	
	</p>                           
                              
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
								  <!----------------------------------- -->
					  
					  
					 
                    
  <!-- ------------------------------------------------------------------------------------------------------------- -->






  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Gallery
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="javascript:"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="javascript:">Gallery management</a></li>
        <li class="active">Gallery</li>
      </ol>
    </section>
    <section class="content-header">
    					
      
        <CENTER><a class="btn btn-success" href="#popup4" data-toggle="modal">Add Image</a></CENTER> 
       
      
      
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
      <div class="row">
        <div class="col-xs-12">
     
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">galleries</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			<!--<?php //var_dump($all_staff->result_array());?>-->
          <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
					   <th>No</th>
                        <th>Gallery image</th>
                        <th>Text on image</th>
                        
                        <th>Edit</th>
                        <th>Delete</th>
                        
                      </tr>
                    </thead>
                    <tbody>
					<?php
							if(!empty($gallery_web)) {
					$count=1;
							foreach($gallery_web->result_array() as $row){  ?>
                       <tr>
                        <td><?php echo $count;?></td>
                        <td><img src="<?php echo base_url();?>/<?php echo $row['gallery_image'];?>"  width="150px" class="img-responsive" align="center"/></td>
                        
                       
						
                        <td><?php echo $row['gallery_text'];?></td>
                       
                        <td><a onClick="edit_gallery(<?php echo $row['gallery_id']; ?>)" style="cursor:pointer" href="#popup3" data-toggle="modal"> Edit</a></td>
                        <td>
						
							
							<a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="<?php echo site_url('gallery/toggle_gallery')?>/<?php echo $row['gallery_id']?>/1">Delete</a>
							
						
						</td>
                      </tr>
                   
                    
                    
                     <?php $count++; } } else { ?>
					 <center> <br><p style="color:red">No Gallery images </p></center>
						
					 <?php } ?>
						
							
                     </tbody>
                  </table>
            </div>
			<!--<form action="<?php echo site_url('Service/all_products');?>" method="post">
	<input type="text" name="cat_id"/>
	<input type="submit">
  </form>-->
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
<script type = "text/javascript" src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
	var baseURL = "<?php echo site_url(); ?>";
</script>
<script src="<?php echo base_url()?>/public/theme/dist/js/notification.js"></script>
  <script type="text/javascript">
   ///////////////////////////////////////function for hide alert notified bar with delay/////////
			function hide_bar()
			{
				window.setTimeout(function(){
               
						$(".pad margin no-print").hide();
							$("#board").hide();				 
                  }, 3000);
							
							
			}
  
  	$('document').ready(function() {  
						hide_bar();
					setInterval(function() {
						
						 check_noti();
						 check_label();
						}, 1000*5);
					
		   
		});
       
      </script>

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
  	////////////////////////////////////function for editing shawarma//////////////////////////
				function edit_gallery(d)
		
			{
				document.getElementById("detail_edit").innerHTML="<center>Wait Loading..</center>";
			var user_id=d;
			
			
			 // Create our XMLHttpRequest object
					var hr = new XMLHttpRequest();
					// Create some variables we need to send to our PHP file
					var url ="<?php echo site_url('Gallery/edit_gallery_display')?>/"+user_id;
					//alert(url);
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
			////////////////////////////
				////////

</script>
</body>
</html>
