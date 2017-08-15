	<?php
				
				if(isset($cat_detail)) {
						foreach($cat_detail->result_array() as $row_show){
							
						
				?>
						<form action="<?php echo site_url("Menu/update_cat_att")?>" method="post" enctype="multipart/form-data">
						
										<!--<tbody>-->
										
										 
										<div class="form-group">
												<label for="inputName" class="col-sm-3 control-label">Category Name</label>
												 <div class="col-sm-6">
												  <input   type="text" class="form-control" pattern=[a-zA-Z][a-zA-Z\s]+ required placeholder="Category Name" id="cat_edit_name" name="cat_edit_name" value="<?php echo $row_show['f_att_name']; ?>"/>
												  <input   type="hidden" class="form-control"  placeholder="Category Name" id="cat_id" name="cat_id" value="<?php echo $row_show['f_att_id']; ?>"/>
													
												</div>
												<div class="col-sm-offset-0 col-sm-1">
												
												    <button type="submit" class="btn btn-success" >Update</button>
												</div>
						
										</div>
									
											<center> 
											<br>
											<br>
										<!--	<div class="form-group">
												<div class="col-sm-offset-1 col-sm-10">
												<br>
												    <button type="submit" class="btn btn-success" style="width:220px;">Update</button>
												</div>
											</div>-->
													
													 <!-- <button type="submit" class="btn btn-success" style="width:220px;">Update</button>-->
													  
													  
													
											</center>
											
								</form>
							
					
						<?php } } ?>
						
						<!--=======================================for values attribute editing///////////////////////////////////////////-->
	<?php 

			if(isset($att_val))  {
 
                   
					$count=1;
					$att_name="";
					$att_id="";
					
							foreach($att_val->result_array() as $row) {   
							
										$att_name=$row['f_att_v_name'];
										$att_id=$row['f_att_v_id'];
							
							 }  ?>
				 
							
				<center> 
							<form class="form-horizontal" method="post" action="<?php echo site_url('Menu/update_att_items')?>" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">Attribute Name</label>
						 <div class="col-sm-6">
                          <input   type="text" class="form-control"  required placeholder="Att name" id="att_edit_name" name="att_edit_name" value="<?php echo $att_name;?>"/>
                          <input   type="hidden" class="form-control"  required placeholder="Att id" id="att_edit_name_id" name="att_edit_name_id" value="<?php echo $att_id;?>"/>
                        </div>
						 <div class="col-sm-2">
                          <a style="text-align:left;cursor:pointer"  onclick="add_att_value()">+ Add item</a>
                        </div>
						
                      </div>
					 
					
					    
					
					  <!------------------------------------>
				
					  
					  <!------------------------------------->
					  
						<?php $total_itms=count($item_det->result_array());?>
						<input  readonly  type="hidden"  required placeholder="exp Item" id="total_values"  value="<?php echo $total_itms;?>"/>
						<?php	 $c=1; foreach($item_det->result_array() as $rowit) {  	?>
							   
							  
							   
							<div class="form-group ">
								<label for="inputName" class="col-sm-4 control-label">attribute values <?php echo $c++;?></label>
								 <div class="col-sm-3">
								  <input   type="text" class="form-control"  required placeholder="exp Item" id="att_edit_value[]" name="att_edit_value[]" value="<?php echo $rowit['f_att_vit_name']; ?>"/>
								  
								  
								</div>
								 <div class="col-sm-3">
								  <input   type="number" min="0" class="form-control"  required placeholder="price" id="att_edit_price[]" name="att_edit_price[]" value="<?php echo $rowit['f_att_vit_price']; ?>"/>
								  <input   type="hidden" class="form-control"  required placeholder="exp cost"   id="att_edit_id[]" name="att_edit_id[]" value="<?php echo $rowit['f_att_vit_id']; ?>"/>
								</div>
								<div class="col-sm-2 " >
									<a style="text-align:left;cursor:pointer" class="remove" >
										<span class="glyphicon glyphicon-trash " style="color:red">
									</a>
								</div>
						
						</div>
						
							
								
					<?php  } ?>
					
					  <!------------------------------------->
					<div id="show_att_span"> </div>
					  <!------------------------------------->
					
					  <!------------------------------------->
					  
					  
					 
                    
						<div class="form-group">
                        <div class="col-sm-offset-4 col-sm-6">
                         <center>  <button  type="submit" class="btn btn-success btn-block" id="password_update"  >Update</button>
						 <!-- <button type="button" class="btn btn-danger js-modal-close">cancel</button>--></center>
                        </div>
                      </div>
                      <p style="color:red" id="notice"><p>
					  </form>
				 </center>
				 
				 <?php } 
				 ?>