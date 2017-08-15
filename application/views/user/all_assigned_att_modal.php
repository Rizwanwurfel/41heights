<?php ?>
						
                    
					<form class="form-horizontal" action="<?php echo site_url('Menu/assign_att_values');?>" method="post">
					<input type="hidden" readonly name="main_cat_att" value="<?php echo $main_cat;?>"/>
						<?php
								//	var_dump($all_asigned->result_array());
									//echo $main_cat;
									if($all_att!=false){
									$yes=0;
									foreach($all_att->result_array() as $row_show){
						?>
						
									<div class="form-group">
							
											 <div class="col-sm-offset-3 col-sm-6">
													  <div class="input-group">
															<span class="input-group-addon">
															<?php  foreach($all_asigned->result_array() as $already) {
																				
																	if($already['f_att_v_id']==$row_show['f_att_v_id']){
																	$yes=1;
																	break;
																	}
																	else
																	{
																	$yes=0;
																	}
																	
															 } ?>
															  <input type="checkbox" name="check_values[]" <?php if($yes){echo "checked";} ?>  value="<?php echo $row_show['f_att_v_id']; ?>">
															  
															</span>
														<input type="text"  readonly class="form-control" value="<?php echo $row_show['f_att_v_name']; ?>">
													  </div>
									  <!-- /input-group -->
											</div>
									
								</div>
											
											
											
									
				
						<?php } }?>
								<div class="form-group">
									<div class="col-sm-offset-3 col-sm-6">
											<center>  <button  type="submit" class="btn btn-success btn-block" id="password_update"  >Update</button>
									 <!-- <button type="button" class="btn btn-danger js-modal-close">cancel</button>--></center>
									</div>
							  </div>
					  
					  </form>