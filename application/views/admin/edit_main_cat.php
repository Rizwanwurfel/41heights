	<?php
				//var_dump($cat_detail);
						foreach($cat_detail->result_array() as $row_show){
							
						
				?>
				<!--------for popup modal--------------->
   <!-- <link rel="stylesheet" href="<?php echo base_url();?>public/custom/modal_style.css">-->
					
						<form action="<?php echo site_url("Cat_p/update_category")?>/<?php echo $row_show['cat_id']; ?>" method="post" enctype="multipart/form-data">
						
										<!--<tbody>-->
										
										 
										<div class="form-group">
												<label for="inputName" class="col-sm-4 control-label">Category Name</label>
												 <div class="col-sm-5">
												
												<input   type="text" class="form-control"  required placeholder="Category Name" id="cat_edit_name" name="cat_edit_name" value="<?php echo $row_show['cat_name']; ?>"/>
												<input  readonly type="hidden" class="form-control"   id="old_image" name="old_image" value="<?php echo $row_show['cat_image']; ?>"/>
												<input  readonly type="hidden" class="form-control"   id="old_icon" name="old_icon" value="<?php echo $row_show['cat_icon']; ?>"/>
												  <input  readonly type="hidden" class="form-control"    name="cat_id" value="<?php echo $row_show['cat_id']; ?>"/>
												</div>
						
										</div>
									
										<br/><br>
											<div class="form-group">
												<label for="inputName" class="col-sm-4 control-label">Category Desc</label>
												 <div class="col-sm-5">
												 <textarea style="text-align:left" class="form-control" name="cat_edit_desc" id="cat_edit_desc"><?php echo $row_show['cat_desc']; ?></textarea>
												</div>
						
										</div>
										<br><br><br>
										
										 <div class="form-group">
										 <!--------------------------------------icon------------------>
												<div class="col-sm-4 col-sm-offset-3">
												<center>icon</center>
												 <?php if(!empty($row_show['cat_icon'])){ ?>
												  <img src="<?php echo base_url($row_show['cat_icon'])?>"  class="form-control" height="400px" style="height:200px" />
												  <?php } else{?>
												<img src="<?php echo base_url();?>public/images/general_cat.png" class="form-control" height="400px" style="height:200px"alt="User Image">
													<?php }?>
												</div>
												<!--------------------------------------image------------------>
												 <div class="col-sm-4">
												 <center>image</center>
												 <?php if(!empty($row_show['cat_image'])){ ?>
												  <img src="<?php echo base_url($row_show['cat_image'])?>"  class="form-control" height="400px" style="height:200px" />
											
												 <?php } else{?>
												<img src="<?php echo base_url();?>public/images/general_cat.png" class="form-control" height="400px" style="height:200px"alt="User Image">
													<?php }?>
												</div>
									
										</div><br><br>
										<div class="form-group">
											 <div class="col-sm-4 col-sm-offset-3">
												 
												<br>
												 <input type="file" name="cat_icon" />
												</div>
												
												 <div class="col-sm-4">
												 
												<br>
												 <input type="file" name="cat_image" id="cat_image"/>
												</div>
									</div>
									<br>
										
											
											<center> 
											<br><br>
											<div class="form-group">
												<div class="col-sm-offset-1 col-sm-10">
												<br>
												    <button type="submit" class="btn btn-success" style="width:220px;">Update</button>
												</div>
											</div>
													
													 <!-- <button type="submit" class="btn btn-success" style="width:220px;">Update</button>-->
													  
													  
													
											</center>
											
								</form>
							
					
						<?php } ?>