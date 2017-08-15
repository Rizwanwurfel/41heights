	<?php
					//var_dump($product_d->result_array());
					//var_dump($all_cat);
					//exit;
				//var_dump($all_brands);
				
						foreach($product_d->result_array() as $row_show){
							
						
				?>
				<!--------for popup modal--------------->
   <!-- <link rel="stylesheet" href="<?php echo base_url();?>public/custom/modal_style.css">-->
					
						<form class="form-horizontal" action="<?php echo site_url("Product_p/update_product")?>" method="post" enctype="multipart/form-data">
						
										<!--<tbody>-->
										<div class="form-group">
											<label for="inputName" class="col-sm-4 control-label">Product Category</label>
											
										<div class="col-sm-5">
											<select class="form-control" name="cat_id">
											<?php foreach($all_cat->result_array() as $main_cat){ ?>
												<option value='<?php echo $main_cat['cat_id']; ?>' <?php if($main_cat['cat_id']==$row_show['cat_id']){ echo "selected";}?>><?php echo $main_cat['cat_name']; ?></option>
												<?php }?>
											</select>
											</div >
							
									</div>
									<!--------------------------------------------------------->
									
									<!--------------------------------------------------------->
										 
										<div class="form-group">
												<label for="inputName" class="col-sm-4 control-label">Product Name</label>
												 <div class="col-sm-5">
												  <input   type="text" class="form-control"  required placeholder="Product Name" id="pr_name" name="pr_name" value="<?php echo $row_show['pr_name']; ?>"/>
												</div>
						
										</div>
									
										
										<div class="form-group">
												<label for="inputName" class="col-sm-4 control-label">Product price</label>
												 <div class="col-sm-5">
												 <input type="number" min="0" class="form-control"   name="pr_price" value="<?php echo $row_show['pr_price']; ?>">
												</div>
						
										</div>
											
										
										
											<div class="form-group">
												<label for="inputName" class="col-sm-4 control-label">Product desc</label>
												 <div class="col-sm-5">
												 <textarea style="text-align:left" class="form-control" required name="pr_desc" id="pr_desc"><?php echo $row_show['pr_note']; ?></textarea>
												 <input  readonly type="hidden" class="form-control"    name="old_image" value="<?php echo $row_show['pr_image']; ?>"/>
												  
												  <input  readonly type="hidden" class="form-control"  placeholder="pr id" id="pr_id" name="pr_id" value="<?php echo $row_show['pr_id']; ?>"/>
												</div>
						
										</div>
										<div class="form-group">
											<label for="inputName" class="col-sm-4 control-label">Product attribute Cat</label>
												<div class="col-sm-5">
													<select class="form-control" name="att_cat_id">
													<option <?php if($row_show['att_cat_id']==0 || empty($row_show['att_cat_id'])){ echo "selected" ;}else{}?>>------------No Att------------</option>
													<?php foreach($all_att_cat->result_array() as $main_cat){ ?>
														<option value='<?php echo $main_cat['att_cat_id']; ?>' <?php if($main_cat['att_cat_id']==$row_show['att_cat_id']){ echo "selected";}?>><?php echo $main_cat['att_cat_name']; ?></option>
														<?php }?>
													</select>
												</div >
										</div >
										
										
									
								
									
									
							
										
										 <div class="form-group">
												<label for="inputName" class="col-sm-4 control-label">Image</label>
												 <div class="col-sm-5">
												 <?php if(!empty($row_show['pr_image'])){ ?>
												  <img src="<?php echo base_url($row_show['pr_image'])?>"  class="form-control" height="400px" style="height:200px" />
												  <?php } else{?>
												<img src="<?php echo base_url();?>public/images/general_cat.png" class="form-control" height="400px" style="height:200px"alt="User Image">
													<?php }?>
												</div>
									
										</div>
										<div class="form-group">
												
												 <div class="col-sm-offset-4 col-sm-8">
												 
												
												 <input type="file" name="product_image" id="product_image"/>
												</div>
									</div>
										
											
											<center> 
											
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