<?php if (isset($amb) && $amb!=false){ ?>
<div class="row">
	<div class="col-lg-4 col-sm-12 col-md-6 col-sm-offset-1">
		<?php if($amb->amb_image) { ?>
			<img src="<?php echo base_url($amb->amb_image);?>" class="img-responsive" style="width:100px ;height:150px">
		<?php } else{  ?>
		<img src="<?php echo base_url('public/images/no_profile.png');?>" class="img-responsive" style="width:150px ;height:150px">
		<?php } ?>
	</div>
	<div class="col-lg-6 col-sm-12 col-md-6" style="padding:5%">
		<p><span style="color:red">Ref id: </span><?php echo $amb->amb_ref_id;?></p>
		<p><span style="color:red">Name: </span><?php echo $amb->amb_name;?></p>
		<p><span style="color:red">Email: </span><?php echo $amb->amb_email;?></p>
		<p><span style="color:red">Phone: </span><?php echo $amb->amb_phone;?></b>
	</div>
	
</div>
<!----------------->
	<div class="table-responsive">
 <table  border="0" class="table table-striped table-hover table-bordered">	
		<tbody>
						<?php if(trim($amb->amb_ref_by)!=""){ ?>
							<tr>
								<td>Referred by </td>
								<td><?php echo $amb->amb_ref_by;?></td>
								
							  </tr>
						
						<?php } ?>
							
							  <tr>
								<td>Points</td>
								<td><?php echo $amb->amb_ref_points;?></td>
								
							  </tr>
							  <tr>
								<td>Hostelite</td>
								<td><?php echo $amb->hostelite=="1" ? "yes":"NO";?></td>
								
							  </tr>
							  <tr>
								<td>Admin Approved</td>
								<td><?php echo $amb->amb_approved=="1" ? "yes":"NO";?></td>
								
							  </tr>
							  <tr>
								<td>Address</td>
								<td><?php echo $amb->amb_address;?></td>
								
							  </tr>
							  <tr>
								<td>Office</td>
								<td><?php echo $amb->amb_office;?></td>
								
							  </tr>
							  <tr>
								<td>Signup Date</td>
								<td><?php echo $amb->amb_signup_date;?></td>
								
							  </tr>
							
			</tbody>
</table>
</div>
<!----------------->
<?php } else{ echo "<center>No data to display</center>"; }?>