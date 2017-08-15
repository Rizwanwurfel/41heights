<h1>service for profile updation</h1>
		<form method="post" action="<?php echo site_url('Service/update_profile')?>" enctype="multipart/form-data">
		 <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">name</label>
						 <div class="col-sm-4">
                          <input   type="text" class="form-control"   placeholder="name"  name="amb_name"/>
                          <input   type="text" class="form-control"   placeholder="amb_id"  name="amb_id"/>
                        
                          <input   type="text" class="form-control"   placeholder="hostelite"  name="hostelite"/>
                        </div>
						
          </div>
		   <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">phone</label>
						 <div class="col-sm-4">
                          <input   type="text" class="form-control"   placeholder="phone"  name="amb_phone"/>
                        
                        
                        </div>
						
          </div>
		    <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">address</label>
						 <div class="col-sm-4">
                         
                          <input   type="text" class="form-control"   placeholder="address"  name="amb_address"/>
                          <input   type="text" class="form-control"   placeholder="institute/office"  name="amb_office"/>
                          
                        </div>
						
          </div>
		    <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">password</label>
						 <div class="col-sm-4">
                         
                          <input   type="text" class="form-control"   placeholder="old_pass"  name="old_pass"/>
                          <input   type="text" class="form-control"   placeholder="new_pass"  name="new_pass"/>
                          <input   type="text" class="form-control"   placeholder="old image" value="public/amb/9/bilal_14.jpg" name="old_image"/>
                          <input   type="file" class="form-control"   placeholder="new_pass"  name="amb_image"/>
                          
                        </div>
						
          </div>
		  <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-7">
                         <center>  <button  type="submit" class="btn btn-success" id="password_update" >Add</button>
						  <button type="button" class="btn btn-danger js-modal-close">cancel</button></center>
                        </div>
                      </div>
	</form>
<!----------------------------------------->
	<form method="post" action="<?php echo site_url('Service/ambassador_signup')?>">
		 <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">name</label>
						 <div class="col-sm-4">
                          <input   type="text" class="form-control"   placeholder="name"  name="name"/>
                        </div>
						
          </div>
		   <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">email</label>
						 <div class="col-sm-4">
                          <input   type="text" class="form-control"   placeholder="email"  name="email"/>
                        </div>
						
          </div>
		   <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">phone</label>
						 <div class="col-sm-4">
                          <input   type="text" class="form-control"   placeholder="name"  name="phone_number"/>
                        </div>
						
          </div>
		  <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">password</label>
						 <div class="col-sm-4">
                          <input   type="text" class="form-control"   placeholder="name"  name="password"/>
                        </div>
						
          </div>
		    <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">hostelite</label>
						 <div class="col-sm-4">
                          <input   type="text" class="form-control"   placeholder="name"  name="hostelite"/>
                          <input   type="text" class="form-control"   placeholder="address"  name="address"/>
                          <input   type="text" class="form-control"   placeholder="institute/office"  name="institute_office"/>
                          <input   type="text" class="form-control"   placeholder="reffered_by"  name="referred_by"/>
                        </div>
						
          </div>
		  <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-7">
                         <center>  <button  type="submit" class="btn btn-success" id="password_update" >Add</button>
						  <button type="button" class="btn btn-danger js-modal-close">cancel</button></center>
                        </div>
                      </div>
	</form>
	<!--------------sign in-------------------->
			<form method="post" action="<?php echo site_url('Service/ambassador_signin')?>">
		
		   <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">email</label>
						 <div class="col-sm-4">
                          <input   type="text" class="form-control"   placeholder="email"  name="email"/>
                        </div>
						
          </div>
		  
		  <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">password</label>
						 <div class="col-sm-4">
                          <input   type="text" class="form-control"   placeholder="password"  name="password"/>
                          <input   type="text" class="form-control"   placeholder="fcm token"  name="fcm_token"/>
                        </div>
						
          </div>
		   
		  <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-7">
                         <center>  <button  type="submit" class="btn btn-success" id="password_update" >Add</button>
						  <button type="button" class="btn btn-danger js-modal-close">cancel</button></center>
                        </div>
                      </div>
	</form>
	<!---------------------------------->
<form class="form-horizontal" method="post" action="<?php echo site_url('Order/order_receive')?>" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">user name</label>
						 <div class="col-sm-4">
                          <input   type="text" class="form-control"   placeholder="user_name"  name="user_name"/>
                        </div>
						
                      </div>
					
					   <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">Order Total bill</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="total_bill" placeholder="total bill" ></textarea>
						  
                        </div>
						
                      </div>
					  
					    <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">user address</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="user_address"  placeholder="address" ></textarea>
                        </div>
						
                      </div>
					   <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">order phone</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="user_phone" id="user_phone" placeholder="phone" ></textarea>
                        </div>
						
                      </div>
					  <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">order area</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="user_area"  placeholder="user area" ></textarea>
                        </div>
						
                      </div>
					   <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">fcm token</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="fcm_token"  placeholder="user area" ></textarea>
                        </div>
						
                      </div>
					  <hr/>
					  <hr/>
					  <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">item_type</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="item"  placeholder="type" ></textarea>
                        </div>
						
                      </div>
					  <!------------------------------------  <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">item id</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="item_id[]"  placeholder="item id" ></textarea>
                        </div>
						
						
                      </div>
					  <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">item name</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="item_name[]"  placeholder="item name" ></textarea>
                        </div>
						
                      </div>
					  <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">item image</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="item_image[]"  placeholder="item image" ></textarea>
                        </div>
						
                      </div>
					     <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">item ind price</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="item_ind_price[]"  placeholder="item ind price" ></textarea>
                        </div>
						
                      </div>
					    <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">item total price</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="item_total_price[]" id="phone_no" placeholder="item total price" ></textarea>
                        </div>
						
                      </div>
					  
					  
					    <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">item quantity</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="item_qty[]" id="phone_no" placeholder="itm qty" ></textarea>
                        </div>
						
                      </div>
					   <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">item attr</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="item_att[]"  placeholder="product att" ></textarea>
                        </div>
						
                      </div>
					   
					  
					  <hr/>
					  <hr/>
					  <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">item_type</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="item_type[]"  placeholder="type" ></textarea>
                        </div>
						
                      </div>
					   <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">item id</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="item_id[]"  placeholder="item id" ></textarea>
                        </div>
						
						
                      </div>
					  <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">item name</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="item_name[]"  placeholder="item name" ></textarea>
                        </div>
						
                      </div>
					  <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">item image</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="item_image[]"  placeholder="item image" ></textarea>
                        </div>
						
                      </div>
					     <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">item ind price</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="item_ind_price[]"  placeholder="item ind price" ></textarea>
                        </div>
						
                      </div>
					    <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">item total price</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="item_total_price[]" id="phone_no" placeholder="item total price" ></textarea>
                        </div>
						
                      </div>
					  
					  
					    <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">item quantity</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="item_qty[]" id="phone_no" placeholder="itm qty" ></textarea>
                        </div>
						
                      </div>
					   <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">item attr</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="item_att[]"  placeholder="product att" ></textarea>
                        </div>
						
                      </div>
					
					 ------------------------------>
					 
					 
					  
					  
					 
                      
                     
						<div class="form-group">
                        <div class="col-sm-offset-2 col-sm-7">
                         <center>  <button  type="submit" class="btn btn-success" id="password_update" >Add</button>
						  <button type="button" class="btn btn-danger js-modal-close">cancel</button></center>
                        </div>
                      </div>
                      <p style="color:red" id="notice"><p>
					  </form>
					  <!--------------------------------------------------------------------------------->
					  <!--------------------------------------------------------------------------------->
					  	<!--<form class="form-horizontal" method="post" action="<?php echo site_url('test_controller/rec_order')?>" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">user name</label>
						 <div class="col-sm-4">
                          <input   type="text" class="form-control"   placeholder="user_name" id="name" name="user_name"/>
                        </div>
						
                      </div>
					
					   <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">phone</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="user_phone" id="user_phone" placeholder="phone" ></textarea>
						  
                        </div>
						
                      </div>
					    <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">address</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="user_adress" id="email" placeholder="user address" ></textarea>
                        </div>
						
                      </div>
					  
					  
					    <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">order item1</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="item_name[]" id="phone_no" placeholder="item" ></textarea>
                        </div>
						
                      </div>
					   <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">order item2</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="item_name[]" id="phone_no" placeholder="item" ></textarea>
                        </div>
						
                      </div>
					 
					   
					 
					 
					  
					  
					 
                      
                     
						<div class="form-group">
                        <div class="col-sm-offset-2 col-sm-7">
                         <center>  <button  type="submit" class="btn btn-success" id="password_update" >Add</button>
						  <button type="button" class="btn btn-danger js-modal-close">cancel</button></center>
                        </div>
                      </div>
                      <p style="color:red" id="notice"><p>
					  </form>-->
					  
					  <!--------------------------------------------------------------------------------->
					  <!--------------------------------------------------------------------------------->
					  <form class="form-horizontal" method="post" action="<?php echo site_url('Service/discount')?>" enctype="multipart/form-data">
                     
					
					   <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">coupon code</label>
						 <div class="col-sm-4">
                         
						  <textarea class="form-control" name="coupon_code"  placeholder="product description" ></textarea>
						  
                        </div>
						
                      
						
                      </div>
					   
					 
                     
						<div class="form-group">
                        <div class="col-sm-offset-2 col-sm-7">
                         <center>  <button  type="submit" class="btn btn-success" id="password_update" >Add</button>
						  <button type="button" class="btn btn-danger js-modal-close">cancel</button></center>
                        </div>
                      </div>
                      <p style="color:red" id="notice"><p>
					  </form>