<?php
	$without_deal_total=0;
						$deals_total=0;
						$discounted_bill=0;
								if($this->cart->contents()){

									foreach ($this->cart->contents() as $items){
									$c_size="";
										if($items['options']!=NULL ||!empty($items['options']))
										{
											foreach($items['options'] as $k=>$v) 
												{
																			
																				 if($k==trim("discounted"))
																				{
																					if($v=="1")
																					{
																						$without_deal_total+=$items['subtotal'];
																					}
																					else if($v==0)
																					{
																						$deals_total+=$items['subtotal'];
																					}
																				}
												}
										}
									
										
						?>
						
							
						
						
						<?php }}
									$discount=$this->db->query("select discount from discount")->row();
								if($discount)
								{
									$discount_amount=$discount->discount;
									if($discount_amount!=0 && $discount_amount>0)
									{
										$total_discount=$without_deal_total*($discount_amount/100);
										$discounted_bill=$without_deal_total-$total_discount;
										$discounted_bill=$discounted_bill+$deals_total;
										 
									}
								}
						?>
<center><h4>Bill Summary</h4></center> 
									<center style="border:2px solid #CC9928;padding-top:5%">
									
									<ol class="breadcrumb">
										<li><a href="<?php echo site_url();?>">Total Items</a></li>
										<li class="active"><?php echo $this->cart->total_items();?></li><br/>

													
									</ol><br/>
									<ol class="breadcrumb">
										<li><a href="<?php echo site_url();?>">Bill</a></li>
										<li class="active"><?php echo $this->cart->total();?></li>
													
									</ol><br/>
									<ol class="breadcrumb">
										<li><a href="<?php echo site_url();?>">Discounted Bill</a></li>
										<li class="active"><?php echo $discounted_bill;?></li>
													
									</ol>
									
								</center>
								<center><span style="color:white;font-size:12px" >Discount Not applied on deals and drinks</span></center>