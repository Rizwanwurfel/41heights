	<?php
				//var_dump($cat_detail);
						foreach($cat_detail->result_array() as $row_show){
							
						
				?>
				<!--------for popup modal--------------->
   <!-- <link rel="stylesheet" href="<?php echo base_url();?>public/custom/modal_style.css">-->
					
						<form action="<?php echo site_url("Product/update_sub_category")?>/<?php echo $row_show['sub_cat_id']; ?>" method="post" enctype="multipart/form-data">
						
										<!--<tbody>-->
										<div class="form-group">
											<label for="inputName" class="col-sm-4 control-label">choose main Category</label>
											<?php if(isset($all_main_cat) && !empty($all_main_cat)) { ?>
										<div class="col-sm-7">
											<select class="form-control" name="cat_name">
											<?php foreach($all_main_cat->result_array() as $main_cat){ ?>
												<option value='<?php echo $main_cat['m_cat_id']; ?>' <?php if($main_cat['m_cat_id']==$row_show['m_cat_id']){ echo "selected";}?>><?php echo $main_cat['m_cat_name']; ?></option>
												<?php }} ?>
											</select>
											</div >
							
									</div>
									<br/><br>
										 
										<div class="form-group">
												<label for="inputName" class="col-sm-4 control-label">Category Name</label>
												 <div class="col-sm-7">
												  <input   type="text" class="form-control" pattern=[a-zA-Z][a-zA-Z\s]+ required placeholder="Category Name" id="cat_edit_name" name="cat_edit_name" value="<?php echo $row_show['sub_cat_name']; ?>"/>
												</div>
						
										</div>
									
										<br/><br>
											<div class="form-group">
												<label for="inputName" class="col-sm-4 control-label">Category Desc</label>
												 <div class="col-sm-7">
												 <textarea style="text-align:left" class="form-control" name="cat_edit_desc" id="cat_edit_desc"><?php echo $row_show['sub_cat_desc']; ?></textarea>
												</div>
						
										</div>
										
										
										  <input  readonly type="hidden" class="form-control"  placeholder="cat creation date" id="old_image" name="old_image" value="<?php echo $row_show['sub_cat_image']; ?>"/>
										
										<br/><br><br>
										<div class="form-group">
												<label for="inputName" class="col-sm-4 control-label"></label>
												  <div class="input-group col-sm-6" style="padding-left:3%">
														<span class="input-group-addon">
														  <input type="checkbox" name="show" <?php if($row_show['show_at_home']==1){ echo "checked" ;} ?>>
														</span>
													<input type="text" readonly value="show at home page below slider"class="form-control">
												  </div>
						
										</div>
										<br/>
										 <div class="form-group">
												<label for="inputName" class="col-sm-4 control-label"></label>
												 <div class="col-sm-4">
												 <?php if(!empty($row_show['sub_cat_image'])){ ?>
												  <img src="<?php echo base_url($row_show['sub_cat_image'])?>"  class="form-control" height="400px" width="600px" style="height:200px;width:300px" />
												  <?php } else{?>
												<img src="<?php echo base_url();?>public/images/general_cat.png" class="form-control" height="400px" style="height:200px"alt="User Image">
													<?php }?>
												</div>
									
										</div><br><br>
										<div class="form-group">
												
												 <div class="col-sm-offset-4 col-sm-8">
												 
												<br>
												 <input type="file" name="cat_image" id="cat_image"/>
												</div>
									</div><br>
										
											
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