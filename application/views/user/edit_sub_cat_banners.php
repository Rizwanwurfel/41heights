	<?php
				//var_dump($cat_detail);
						foreach($cat_detail->result_array() as $row_show){
							
						
				?>
				<!--------for popup modal--------------->
   <!-- <link rel="stylesheet" href="<?php echo base_url();?>public/custom/modal_style.css">-->
					
						<form class="form-horizontal" action="<?php echo site_url("Product/update_sub_category_banner")?>" method="post" enctype="multipart/form-data">
						
										<!--<tbody>-->
										
										<div class="form-group">
												<label for="inputName" class="col-sm-4 control-label">Category Name</label>
												 <div class="col-sm-6">
												  <input  readonly  type="text" class="form-control" pattern=[a-zA-Z][a-zA-Z\s]+ required placeholder="Category Name" id="cat_edit_name" name="cat_edit_name" value="<?php echo $row_show['sub_cat_name']; ?>"/>
												</div>
						
										</div>
										  <input  readonly type="hidden"  name="old_b1" value="<?php echo $row_show['sub_cat_b1']; ?>"/>
										  <input  readonly type="hidden"  name="old_b2" value="<?php echo $row_show['sub_cat_b2']; ?>"/>
										  <input  readonly type="hidden"    name="sub_cat_id" value="<?php echo $row_show['sub_cat_id']; ?>"/>
										  <div class="form-group">
												<label for="inputName" class="col-sm-4 control-label"></label>
												  <div class="input-group col-sm-6" style="padding-left:3%">
														<span class="input-group-addon">
														  <input type="checkbox" name="show" <?php if($row_show['sub_cat_b_show']==1){ echo "checked" ;} ?>>
														</span>
													<input type="text" readonly value="show at page"class="form-control">
												  </div>
						
										</div>
										
										 <div class="form-group">
												<label for="inputName" class="col-sm-4 control-label">banner 1</label>
												 <div class="col-sm-4">
												 <?php if(!empty($row_show['sub_cat_b1'])){ ?>
												  <img src="<?php echo base_url($row_show['sub_cat_b1'])?>"  class="form-control"  style="height:150px;width:200px" />
												  <?php } else{?>
												<img src="<?php echo base_url();?>public/images/general_cat.png" class="form-control"  style="height:150px"alt="User Image">
													<?php }?>
												</div>
									
										</div>
										
										<div class="form-group">
												
												 <div class="col-sm-offset-4 col-sm-8">
												 
												<br>
												 <input type="file" name="sub_cat_b1" />
												</div>
									</div>
									
										
											
											<center> 
											<p style="color:red">(preffered size 640*430)</p>
									
											<hr>
											 <div class="form-group">
												<label for="inputName" class="col-sm-4 control-label">banner 2</label>
												 <div class="col-sm-4">
												 <?php if(!empty($row_show['sub_cat_b2'])){ ?>
												  <img src="<?php echo base_url($row_show['sub_cat_b2'])?>"  class="form-control"  style="height:150px;width:200px" />
												  <?php } else{?>
												<img src="<?php echo base_url();?>public/images/general_cat.png" class="form-control"  style="height:150px"alt="User Image">
													<?php }?>
												</div>
									
										</div>
										
										<div class="form-group">
												
												 <div class="col-sm-offset-4 col-sm-8">
												
												 <input type="file" name="sub_cat_b2" />
												</div>
									</div>
										
											
											<center> 
											
											<div class="form-group">
												<div class="col-sm-offset-1 col-sm-10">
												
												    <button type="submit" class="btn btn-success" style="width:220px;">Update</button>
												</div>
											</div>
													
													 <!-- <button type="submit" class="btn btn-success" style="width:220px;">Update</button>-->
													  
													  
													
											</center>
											
								</form>
							
					
						<?php } ?>