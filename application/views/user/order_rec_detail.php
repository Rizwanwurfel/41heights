<?php 
	//var_dump($order_detail->result_array());

// exit;
 ?>
<div class="row" style="background:#f6f6f6;padding:2%">
		<div class="col-lg-4">
		<?php foreach($order_detail->result_array() as $ro){ 
		
			$user_name=$ro['order_lname'];
			$user_address=$ro['order_address'];
			$user_phone=$ro['order_phone'];
			$order_date=$ro['order_date'];
			$order_no=$ro['order_no'];
		}
		?>
			
			<p style="background:#f6f6f6"><span class="glyphicon glyphicon-user"> </span> <?php echo $user_name; ?></p>
			 
			<p style="background:#f6f6f6"><span class="glyphicon glyphicon-envelope"> </span> <?php  echo $user_address; ?></p>
			  
			  <p style="background:#f6f6f6"><span class="glyphicon glyphicon-phone"> </span> <?php  echo $user_phone; ?></p>
		
		</div>
		<div class="col-lg-4" align="center">
		<img src="<?php echo base_url();?>public/Logo/general_logo.png" class="img-responsive" style="width:60%" />
		</div>
		<div class="col-lg-4" align="right">
		
			<p>	order date:<br/> <?php echo $order_date; ?></p>
			<p>	order #:<br/> <?php echo $order_no; ?></p>
		
		</div>
</div>
<br/>	
<?php //var_dump($order_detail->result_array() );?>
 <table  border="0" class="table table-striped table-hover table-bordered">	
<tbody>
					<thead>
                      <tr>
					   <th>No</th>
					   <th>Item Id</th>
					   <th>Item Name</th>
					   <th>Item Attributes</th>
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
				
					foreach($order_detail->result_array() as $row_show){
								
					
					
					?>
				
	
								<tr>
											<td><strong> <?php echo $count;?></strong></td>
											<td>
												
												<?php echo $row_show['order_product_id']; ?>
												
											</td>
											<td><?php echo $row_show['order_product_name']; ?></td>
											<td><?php 
													$att=explode(',', $row_show['order_product_att']);
													
													for($p=0;$p<count($att);$p++)
													{
														echo $att[$p]."<br/>";
													}
													?>
											
												</td>
										
											<td><?php echo $row_show['order_product_qty']; ?></td>
											<td><?php echo $row_show['order_product_price']; ?></td>
											<td><?php echo $row_show['order_product_total']; ?></td>
											
									</tr>
									
								
								
							
						
						<?php
							//$total_quantity+=$row_show['order_product_qty'];
							//$grand_total=$row_show['total_bill'];
							$count++;
							//}
							$product_name="";
								$product_image="";
								$product_price="";
						} ?>
						<tr >
						<td colspan="4"><b>Total bill</b></td>
					
						<td><b><?php echo $row_show['order_total_qty'];?></b></td>
						<td></td>
						<td><b><?php echo "$".$row_show['order_total'];?></b></td>
						</tr>
						
						</tbody>
						</table>
						