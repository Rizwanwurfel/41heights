 <?php 

 if(!empty($slider))  {
					$count=1;
					//var_dump($pro_detail->result_array());
							foreach($slider->result_array() as $row) {   ?>
 <center> 
							<form class="form-horizontal" method="post" action="<?php echo site_url('slider/update_slider')?>" enctype="multipart/form-data">
                      
					 
					
					    
					
					  <!------------------------------------>
					  	  <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">Slider Text</label>
                         <div class="col-sm-4">
						 
							<input   type="text" class="form-control"  required placeholder="slider text" id="slider_text" name="slider_text" value="<?php echo $row['slider_text'];?>"/>
							<input   type="hidden" class="form-control"  required placeholder="slider old image" id="old_image" name="old_image" value="<?php echo $row['slider_image'];?>"/>
							<input   type="hidden" class="form-control"  required placeholder="slider id" id="slider_id" name="slider_id" value="<?php echo $row['slider_id'];?>"/>
						
                        </div>
									
						</div>
				
					  
					  
					  <!------------------------------------->
					  <!----------------------------------- -->
					  <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label"></label>
                         <div class="col-sm-4">
						 
                          <img src="<?php echo base_url($row['slider_image'])?>"  class="form-control" height="400px" style="height:200px" />
						
                        </div>
									
						</div>
					 
                      
                     <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label" >slider image</label>
                         <div class="col-sm-4">
						 
                        
						 <input type="file" name="slider_image" id="slider_image"/>
                        </div>
						</div>
					  <!----------------------------------- -->
					  
					  
					 
                    
						<div class="form-group">
                        <div class="col-sm-offset-2 col-sm-7">
                         <center>  <button  type="submit" class="btn btn-success" id="password_update" style="width:250px;margin-left:15%" >Update</button>
						 <!-- <button type="button" class="btn btn-danger js-modal-close">cancel</button>--></center>
                        </div>
                      </div>
                      <p style="color:red" id="notice"><p>
					  </form>
				 </center>
				 <?php } } 
				 ?>