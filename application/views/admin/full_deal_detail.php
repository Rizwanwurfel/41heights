	<form action="<?php echo site_url('Deals/update_deal');?>" method="post" enctype="multipart/form-data">
	<?php
						
						foreach($pro_detail->result_array() as $row_show){
						
							
						
				?>
				
				<table id="example1" class="table table-bordered table-striped">
	<tbody>
	
									<tr>
										  
										  
												<td colspan="2" align="center">
												<img style="border:3px solid #f6f6f6;border-radius:20px;box-shadow: 10px 10px 10px 5px #888888;" src="<?php echo base_url($row_show['deal_image'])?>" class="img-responsive" width="20%" align="center"/>
													
												</td>
												
										
									</tr>
									
									<tr>
											<td><strong> Deal Name</strong></td>
											<td>
												<input type="text" required name="deal_name" class="form-control" value="<?php echo $row_show['deal_name']; ?>">
												<input type="hidden" name="deal_id" value="<?php echo $row_show['deal_id'];?>">
												<input type="hidden" name="old_image" value="<?php echo $row_show['deal_image'];?>">
											</td>
									</tr>
									<tr>
											<td><strong>Deal category</strong></td>
											<td>
											<?php 
												if(isset($all_sub_cat) && $all_sub_cat!=false) { 
												
												?>
												<select class="form-control" name="cat_id">
												<?php 
													foreach($all_sub_cat->result_array() as $cats){
												?>
													<option value="<?php echo $cats['cat_id'];?>" <?php if($row_show['cat_id']==$cats['cat_id']){echo "selected"; } ?>><?php echo $cats['cat_name'];?></option>
													
													<?php }?>
												</select>
											<?php  } ?>
											</td>
									</tr>
									
									
									<tr>
											<td><strong> Deal price RS. </strong></td>
											<td><input name="deal_price" type="number" class="form-control" value="<?php echo $row_show['deal_price']; ?>"></td>
									</tr>
									<tr>
																<td><strong> Deal main product qty</strong></td>
																<td><input name="main_pr_qty" required type="number" min="1" class="form-control" value="<?php echo $row_show['main_pr_qty']; ?>"></td>
									</tr>
									<tr>
																<td><strong> Deal Drink qty</strong></td>
																<td><input name="drink_qty" required type="text" min="0" class="form-control" value="<?php echo $row_show['drink_qty']; ?>"></td>
									</tr>
									
									<tr>
											<td><strong>Deal attribute cat</strong></td>
											<td>
											<?php 
												if(isset($all_att_cat) && $all_att_cat!=false) { 
												
												?>
												<select class="form-control" name="att_cat_id">
												<option value="0" <?php if($row_show['att_cat_id']==0){echo "selected"; } ?>>---------No attribute--------</option>
												<?php 
													foreach($all_att_cat->result_array() as $acat){
												?>
													<option value="<?php echo $acat['att_cat_id'];?>" <?php if($row_show['att_cat_id']==$acat['att_cat_id']){echo "selected"; } ?>><?php echo $acat['att_cat_name'];?></option>
													
													<?php }?>
												</select>
											<?php  } ?>
											</td>
									</tr>
										<tr>
											<td><strong>Display deal at top</strong></td>
											<td>
											
												<select class="form-control" name="deal_top">
												<option value="1" <?php if($row_show['deal_top']==1){echo "selected"; } ?>>yes</option>
												<option value="0" <?php if($row_show['deal_top']==0){echo "selected"; } ?>>No</option>
												
												</select>
											
											</td>
									</tr>
									<tr>
											<td><strong>Deal for</strong></td>
											<td>
											
												<select class="form-control" name="deal_for">
												<option value="0" <?php if($row_show['deal_for']==0){echo "selected"; } ?>>public</option>
												<option value="1" <?php if($row_show['deal_for']==1){echo "selected"; } ?>>Ambassador</option>
												
												</select>
											
											</td>
									</tr>
									
										<?php 
										
									
										
										
											$items=$this->db->query("select `deal_pr_id`,`deal_pr_name` from deals_products where deal_id='".$row_show['deal_id']."'");
											if($items->num_rows()>0)
											{ ?>
											
											
												<?php $c=1;
												foreach($items->result_array() as $rowi)
												{	
													
												?>
													<tr style="background:lightgreen">
																<td><strong> Item <?php echo $c;?></strong></td>
																<td>
																	<input name="product_name[]" type="text" class="form-control" value="<?php echo $rowi['deal_pr_name']; ?>">
																	<input name="product_id[]" type="hidden" class="form-control" value="<?php echo $rowi['deal_pr_id']; ?>">
																</td>
													</tr>
													
											<?php	$c++;}
											}
										?>
																		
									
							<tr style="">
																<td><button type="submit" class="btn btn-info" > Update</button></td>
																<td>Deal Image to update<input type="file" name="deal_image"></td>
													</tr>
									
								
							
						</tbody>
						</table>
						
						<?php } ?>
						</form>