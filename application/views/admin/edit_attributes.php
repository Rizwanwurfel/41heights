	<?php
				
				if(isset($cat_detail)) {
						foreach($cat_detail->result_array() as $row_show){
							
						
				?>
						<form action="<?php echo site_url("Att_p/update_att_cat")?>" method="post" enctype="multipart/form-data">
						
										<!--<tbody>-->
										
										 
										<div class="form-group">
												<label for="inputName" class="col-sm-3 control-label">Category Name</label>
												 <div class="col-sm-6">
												  <input   type="text" class="form-control" required placeholder="Category Name" id="cat_edit_name" name="cat_edit_name" value="<?php echo $row_show['att_cat_name']; ?>"/>
												  <input   type="hidden" class="form-control"  placeholder="Category Name" id="cat_id" name="cat_id" value="<?php echo $row_show['att_cat_id']; ?>"/>
													
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
					
							foreach($att_val->result_array() as $row) {  ?> 
							
								
				 
							
				<center> 
							<form class="form-horizontal" method="post" action="<?php echo site_url('Att_p/update_att_items')?>" enctype="multipart/form-data">
                      <div class="form-group">
                       
						 <div class="col-sm-4">
						 <center><b>Attribute Name</b></center>
                          <input   type="text" class="form-control"  required placeholder="Att name" id="att_name" name="att_name" value="<?php echo $row['att_name'];?>"/>
                          <input   type="hidden" class="form-control"  required placeholder="Att id" id="att_name_id" name="att_name_id" value="<?php echo $row['att_name_id'];?>"/>
                        </div>
						 <div class="col-sm-4">
						 <center><b>Attribute custom</b></center>
							<input type="radio" name="att_selection" value="multi" <?php if($row['att_selection']=="multi") {echo "checked";}?>> Multi select &nbsp;&nbsp;
							<input type="radio" name="att_selection" value="single" <?php if($row['att_selection']=="single") {echo "checked";}?>> Single select
                        </div>
						<div class="col-sm-4">
						 <center><b>Attribute Cat</b></center>
							<select class="form-control" name="att_cat_id">
													
													<?php foreach($all_att_cat->result_array() as $main_cat){ ?>
														<option value='<?php echo $main_cat['att_cat_id']; ?>' <?php if($main_cat['att_cat_id']==$row['att_cat_id']){ echo "selected";}?>><?php echo $main_cat['att_cat_name']; ?></option>
														<?php }?>
								</select>
							
                        </div>
						
                      </div>
					 
					<?php } ?>
					    
					
					  <!------------------------------------>
				
					  
					  <!------------------------------------->
					  
						<?php $total_itms=count($item_det->result_array());?>
						<input  readonly  type="hidden"  required placeholder="exp Item" id="total_values"  value="<?php echo $total_itms;?>"/>
						<?php	 $c=1; foreach($item_det->result_array() as $rowit) {  	?>
							   
							  
							   
							<div class="form-group " style="background:#f6f6f6;border-top:2px solid black;padding:1%">
								<!--<label for="inputName" class="col-sm-4 control-label">attribute values <?php echo $c++;?></label>-->
								<div class="row">
										<div class="col-sm-4">
											<center><b>Android Image</b></center><hr/>
										  <img style="width:100px" src="<?php echo base_url($rowit['att_value_image']); ?>" /><br/>
										  <input type="file" name="att_image[]">
										  
										</div>
										<div class="col-sm-4">
											<center><b>Android after click</b></center><hr/>
										  <img style="width:100px" src="<?php echo base_url($rowit['att_value_afimage']); ?>" /><br/>
										  <input type="file" name="att_afimage[]">
										  
										</div>
										<div class="col-sm-4">
											<center><b>web Image</b></center><hr/>
										  <img style="width:100px" src="<?php echo base_url($rowit['att_value_webimage']); ?>" /><br/>
										  <input type="file" name="att_webimage[]">
										  
										</div>
									</div>
									<hr/>
									<div class="row">
								 <div class="col-sm-4">
								 <center><b>value</b></center>
								  <input   type="text" class="form-control"  required placeholder="exp Item" id="att_value[]" name="att_value[]" value="<?php echo $rowit['att_value']; ?>"/>
								  
								</div>
								<div class="col-sm-4">
								<center><b>Description</b></center>
								  <input   type="text" class="form-control"    name="att_desc[]" value="<?php echo $rowit['att_value_desc']; ?>"/>
								  
								</div>
								 <div class="col-sm-2">
								 <center><b>Price</b></center>
								  <input   type="number" min="0" class="form-control"   placeholder="price"  name="att_price[]" value="<?php echo $rowit['att_value_price']; ?>"/>
								  <input   type="hidden" class="form-control"  required placeholder="id"    name="att_id[]" value="<?php echo $rowit['att_value_id']; ?>"/>
								  <input   type="hidden" class="form-control"  required placeholder="image"    name="att_old_image[]" value="<?php echo $rowit['att_value_image']; ?>"/>
								  <input   type="hidden" class="form-control"  required placeholder="image"    name="att_old_aimage[]" value="<?php echo $rowit['att_value_afimage']; ?>"/>
								  <input   type="hidden" class="form-control"  required placeholder="image"    name="att_old_webimage[]" value="<?php echo $rowit['att_value_webimage']; ?>"/>
								</div>
								<div class="col-sm-2">
																		 <b>Att selected</b><br/>
																		 <select class="form-control" name="att_selected[]">
																		 <option  value="1" <?php if($rowit['att_value_selected']==1){ echo "selected";} ?>> Yes </option>
																		 <option   value="0" <?php if($rowit['att_value_selected']==0){ echo "selected";} ?>> No </option>
																		 </select>
																</div>
							</div>
								<!--<div class="col-sm-2 " >
									<a style="text-align:left;cursor:pointer" class="remove" >
										<span class="glyphicon glyphicon-trash " style="color:red">
									</a>
								</div>-->
						
						</div>
						
							
								
					<?php  } ?>
					
					  <!------------------------------------->
					<div id="show_att_span"> </div>
					  <!------------------------------------->
					
					  <!------------------------------------->
					  
					  
					 
                    
						<div class="form-group">
                        <div class="col-sm-offset-4 col-sm-2">
                         <center>  <button  type="submit" class="btn btn-success btn-block" id="password_update"  >Update</button>
						 
                        </div>
						<div class="col-sm-2">
                         <center> 
						  <button type="button" class="btn btn-danger js-modal-close btn-block "  data-dismiss="modal" >cancel</button></center>
                        </div>
                      </div>
                      <p style="color:red" id="notice"><p>
					  </form>
				 </center>
				 
				 <?php } 
				 ?>