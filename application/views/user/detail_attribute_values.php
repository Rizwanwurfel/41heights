	
	<?php
						$count=0;  ?>
						<table id="example1" class="table table-bordered table-striped">
                    <thead>
					
                      <tr>
					   <th>No</th>
                        <th>value</th>
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
											<td><?php echo $row_show['f_att_vit_name']; ?></td>
											<td><?php echo $row_show['f_att_vit_price']; ?></td>
									</tr>
									
									
									
								
							
						</tbody>
				
						<?php } }?>
						</table>