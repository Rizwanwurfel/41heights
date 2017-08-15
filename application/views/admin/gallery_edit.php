 <?php 

 if(!empty($gallery))  {
					$count=1;
					//var_dump($pro_detail->result_array());
							foreach($gallery->result_array() as $row) {   ?>
 <center> 
							<form class="form-horizontal" method="post" action="<?php echo site_url('gallery/update_gallery')?>" enctype="multipart/form-data">
                      
					 
					
					    
					
					  <!------------------------------------>
					  	  <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">Image Text</label>
                         <div class="col-sm-4">
						 
							<input   type="text" class="form-control"  required placeholder="gallery text" id="gallery_text" name="gallery_text" value="<?php echo $row['gallery_text'];?>"/>
							<input   type="hidden" class="form-control"  required placeholder="gallery old image" id="old_image" name="old_image" value="<?php echo $row['gallery_image'];?>"/>
							<input   type="hidden" class="form-control"  required placeholder="gallery id" id="gallery_id" name="gallery_id" value="<?php echo $row['gallery_id'];?>"/>
						
                        </div>
									
						</div>
				
					  
					  
					  <!------------------------------------->
					  <!----------------------------------- -->
					  <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label"></label>
                         <div class="col-sm-4">
						 
                          <img src="<?php echo base_url($row['gallery_image'])?>"  class="form-control" height="400px" style="height:200px" />
						
                        </div>
									
						</div>
					 
                      
                     <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label" >Gallery Image</label>
                         <div class="col-sm-4">
						 
                        
						 <input type="file" name="gallery_image" id="gallery_image"/>
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