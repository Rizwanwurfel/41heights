	<?php
						
						foreach($pro_detail->result_array() as $row_show){
							
						
				?>
				<table id="example1" class="table table-bordered table-striped">
	<tbody>
									<tr>
										  <center>
												<td colspan="2" align="center">
												<img style="border:3px solid #f6f6f6;border-radius:20px;box-shadow: 10px 10px 10px 5px #888888;" src="<?php echo base_url($row_show['pr_image'])?>" class="img-responsive" width="20%" align="center"/>
													
												</td>
										</center>
									</tr>
									
									<tr>
											<td><strong> Product Name:</strong></td>
											<td><?php echo $row_show['pr_name']; ?></td>
									</tr>
									<tr>
											<td><strong>Product category:</strong></td>
											<td><?php echo $row_show['cat_name']; ?></td>
									</tr>
									
									<tr>
											<td><strong> Product Description: </strong></td>
											<td><?php echo $row_show['pr_note']; ?></td>
									</tr>
									<tr>
											<td><strong> Product price: </strong></td>
											<td><?php echo "RS. ".$row_show['pr_price']; ?></td>
									</tr>
									
									
										<?php 
											
													$res_att_c=$this->db->query("SELECT `att_cat_name` FROM `att_category` where `att_cat_id`='".$row_show['att_cat_id']."'")->row();
													
													if($res_att_c){ 
														
													?>
													
														<tr>
																<td><strong> Product attribute cat</strong></td>
																<td><?php echo $res_att_c->att_cat_name; ?></td>
														</tr>
																	
										<?php  }?>
																		
									
				
									
								
							
						</tbody>
						</table>
						<?php } ?>