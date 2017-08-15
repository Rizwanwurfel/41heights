<?php if(isset($order_detail) && $order_detail!=false) { ?>
<div class="row" style="background:#f6f6f6;padding:2%">
		<div class="col-lg-4">
		<?php foreach($order_detail->result_array() as $ro){ 
		
			$user_name=$ro['user_name'];
			$user_address=$ro['user_address'];
			$user_phone=$ro['user_phone'];
			$order_date=$ro['order_date'];
			$order_area=$ro['user_area'];
			$discounted_bill=$ro['discounted_bill'];
			$order_note=$ro['order_note'];
			$order_source=$ro['source'];
			$order_id=$ro['order_id'];
			
		}
		////////////////////check if ambassdor ordered and used points/////////////////
		$check_points_used=$this->db->query("SELECT `points_used` FROM `ambassador_order` where `order_id`='".$order_id."'")->row();
		$points_used_in=0;
		if($check_points_used)
		{
			$points_used_in=$check_points_used->points_used;
			$points_used_in=($points_used_in*10);
		}
		?>
			
			<p style="background:#f6f6f6"><span class="glyphicon glyphicon-user"> </span> <?php echo $user_name; ?></p>
			 
			<p style="background:#f6f6f6"><span class="glyphicon glyphicon-map-marker"> </span> <?php  echo $user_address; ?></p>
			  
			  <p style="background:#f6f6f6"><span class="glyphicon glyphicon-phone"> </span> <?php  echo $user_phone; ?></p>
			  
		
		</div>
		<div class="col-lg-4" align="center">
		<?php if($order_source=="android") {?>
			<img src="<?php echo base_url();?>public/images/and_icn.png" class="img-responsive" style="width:60%" />
		<?php } else if($order_source=="web"){?>
		<img src="<?php echo base_url();?>public/images/web_ic.png" class="img-responsive" style="width:60%" />
		<?php } else{  ?>
			<img src="<?php echo base_url();?>public/images/logo.png" class="img-responsive" style="width:60%" />
			<?php } ?>
		</div>
		<div class="col-lg-4" align="right">
		
			<p>	order date:<br/> <?php echo $order_date; ?></p>
			<?php if(!empty($order_area)){?>
			<p style="background:#f6f6f6"><span class="glyphicon glyphicon-map-marker"> Location </span><br/> <?php  echo $order_area; ?></p>
		<?php } ?>
		</div>
</div>
<br/>	
<?php //var_dump($order_detail->result_array() );?>
<div class="table-responsive">
 <table  border="0" class="table table-striped table-hover table-bordered">	
<tbody>
					<thead>
                      <tr>
					   <th>No</th>
					   <th>Item image</th>
					   <th>Item Name</th>
					   <th>Item type</th>
                        <th>Item attributes</th>
                        <th>Item quantity</th>
						<th>Item price</th>
						<th>Total price</th>
                        
                      </tr>
                    </thead>
				<?php 	
				$count=1;
								$product_name="";
								$product_image="";
								$product_price="";
								$total_quantity="";
								$grand_total="";
								$overall_total_bill=0;
				
					foreach($order_detail->result_array() as $row_show){
								
					
					
					?>
				
	
								<tr>
											<td><strong> <?php echo $count;?></strong></td>
											<td>
												<?php if(strtolower(trim($row_show['item_type']))=="pizza" || trim($row_show['item_image'])=="no" ) { ?>
													<img src="<?php  echo base_url($row_show['item_image']);?>" width="60px" height="60px"/>
												<?php } else{ ?>
												<img src="<?php  echo base_url($row_show['item_image']);?>" width="60px" height="60px"/>
												<?php } ?>
											</td>
											<td><?php echo $row_show['item_name']; ?></td>
											<td><?php echo $row_show['item_type']; ?></td>
											<td>
												<?php
													if(trim($row_show['item_attribute'])!="")
													{
																$data = json_decode($row_show['item_attribute'], true);
																foreach($data as $main=>$val)
																{
																		if(!empty($val))
																		{
																			echo "<b style='color:red'>".$main."</b><br/>";
																		}
																		
																			
																		foreach($val as $att=>$att_val)
																		{
																			
																			foreach($att_val as $key=>$value)
																			{
																				echo "<b>" .$key."</b>:";
																				if(is_array($value))
																				{
																					foreach($value as $sk=>$sv)
																					{
																						echo $sv.",";
																					}
																					echo "<br/>";
																				}
																				else
																				{
																					echo $value."<br/>";
																				}
																					
																			}
																			//echo "-----------------------<br/>";
																		}
																}
																//var_dump($data);
													}
													else
													{
														echo "X";
													}
												?>
											</td>
											<td><?php echo $row_show['item_qty']; ?></td>
											<td><?php echo $row_show['item_ind_price']; ?></td>
											<td><?php echo $row_show['item_total_price']; ?></td>
											
									</tr>
									
								
								
							
						
						<?php
							$referred_by=$row_show['referred_by'];
							$total_quantity+=$row_show['item_qty'];
							$grand_total=$row_show['total_bill'];
							$del_charges=$row_show['service_charges'];
							$count++;
							//}
							$product_name="";
								$product_image="";
								$product_price="";
						} ?>
						
						
						
							<td colspan="5">Sub Total </td>
						
						<td><b><?php echo $total_quantity;?></b></td>
						<td></td>
						<td><b><?php echo "RS.".$grand_total;?></b></td>
						</tr>
						<?php 
								$overall_total_bill=($grand_total+$del_charges)-$points_used_in;
								if(!empty($discounted_bill) && $discounted_bill!=0 && $discounted_bill!="" && $discounted_bill!=$grand_total) {
								$overall_total_bill=($discounted_bill+$del_charges)-$points_used_in;
						?>
						<tr >
						<td colspan="7">Discounted Bill</td>
					
						
						<td><b><?php echo "RS.".$discounted_bill;?></b></td>
						</tr>
						
						<?php }
						
						if($points_used_in!=0 && $points_used_in > 0)
						{ ?>
						
						<tr >
						<td colspan="7">Points used by Amb</td>
					
						
						<td><b><?php echo "- (RS.".$points_used_in.")";?></b></td>
						</tr>
							
					<?php 	}
				
							

						?>
						
						<tr>
							<td colspan="7"><b>Total bill inc charges</b></td>
							<td><b><?php echo "RS.".$overall_total_bill;?></b></td>
						</tr>
						<?php if($order_note!="" || !empty($order_note)) {?>
						<tr>
								<td colspan="2"><b style="color:red">Order Note*</b></td>
								<td colspan="6"><?php echo $order_note;?></td>
						</tr>
						<?php } ?>
						<?php if($referred_by!="" && !empty($order_note)) {?>
						<tr>
								<td colspan="2"><b style="color:red">Referred by</b></td>
								<td colspan="6"><?php echo $referred_by;?></td>
						</tr>
						<?php } ?>
						
						
						</tbody>
						</table>
			</div>
<?php } else {  ?>
	<center>
	<ul>
		<li>Either data is mishandled by customer</li>
		<li>Or data received is not in proper format </li>
		<li>for further info of order, call on phone # displayed  in order receive table</li>
		<li>or call service providers </li>
	</ul>
	</center>


<?php }
?>	