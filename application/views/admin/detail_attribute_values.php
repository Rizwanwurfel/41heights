	
	<?php
						$count=0;  ?>
						<table id="example1" class="table table-bordered table-striped">
                    <thead>
					
                      <tr>
					   <th>No</th>
					   <th>Android image</th>
					   <th>Android after click</th>
					   <th>web</th>
                        <th>value</th>
                        <th>desc</th>
                        <th>price</th>
						
                      </tr>
                    </thead>
						<?php
						
							if($item_det!=false){
							foreach($item_det->result_array() as $row_show){
							
						
				?>
				
					<tbody>
									
									<tr>
											<td><strong> <?php echo ++$count; ?></strong></td>
											<td><img src="<?php echo base_url($row_show['att_value_image']); ?>" width="100px" height="100px"></td>
											<td><img src="<?php echo base_url($row_show['att_value_afimage']); ?>" width="100px" height="100px"></td>
											<td><img src="<?php echo base_url($row_show['att_value_webimage']); ?>" width="100px" height="100px"></td>
											<td><?php echo $row_show['att_value']; ?></td>
											<td><?php echo $row_show['att_value_desc']; ?></td>
											<td><?php echo "RS.". $row_show['att_value_price']; ?></td>
									</tr>
									
									
									
								
							
						</tbody>
				
						<?php } }?>
						</table>