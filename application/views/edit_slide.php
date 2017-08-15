	<?php
				//var_dump($slider->result_array());
				//exit;
						foreach($slider->result_array() as $row_show){
							
						
				?>
				<!--------for popup modal--------------->
   <!-- <link rel="stylesheet" href="<?php echo base_url();?>public/custom/modal_style.css">-->
					
						<form class="form-horizontal" action="<?php echo site_url("Logo/update_slider")?>" method="post" enctype="multipart/form-data">
						
										<!--<tbody>-->
										
										 
										<div class="form-group">
												<label for="inputName" class="col-sm-4 control-label">slider page</label>
												 <div class="col-sm-5">
												  <input   type="text" class="form-control" readonly required placeholder="slider page"  name="slider_page" value="<?php echo $row_show['slider_page']; ?>"/>
												<input type="hidden" name="old_image" value="<?php echo $row_show['slide_link']; ?>">
												<input type="hidden" name="id" value="<?php echo $row_show['slider_id']; ?>">
												</div>
						
										</div>
										
										<div class="form-group">
												<label for="inputName" class="col-sm-4 control-label">slider text 1</label>
												 <div class="col-sm-5">
												  <input   type="text" class="form-control"  placeholder="slider text1"  name="text1" value="<?php echo $row_show['slider_text1']; ?>"/>
												
												</div>
						
										</div>
										<?php if($row_show['slider_page']=="home" ){ ?>
										
													<div class="form-group">
												<label for="inputName" class="col-sm-4 control-label">slider text 2</label>
												 <div class="col-sm-5">
												  <input   type="text" class="form-control"  placeholder="slider text2"  name="text2" value="<?php echo $row_show['slider_text2']; ?>"/>
												
												</div>
						
										</div>
												
										<?php } ?>
										
										<center><p style="color:red">Preffered resolution is 1600*700 for home page slider</p></center>
									
										 <div class="form-group">
												<label for="inputName" class="col-sm-4 control-label"></label>
												 <div class="col-sm-4">
												 <?php if(!empty($row_show['slide_link'])){ ?>
												  <img src="<?php echo base_url($row_show['slide_link'])?>"  class="form-control"  style="height:200px;width:250px" />
												  <?php } else{?>
												<img src="<?php echo base_url();?>public/images/general_cat.png" class="form-control" height="400px" style="height:200px"alt="User Image">
													<?php }?>
												</div>
									
										</div>
										<div class="form-group">
												
												 <div class="col-sm-offset-4 col-sm-8">
												 
												<br>
												 <input type="file" name="logo" />
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