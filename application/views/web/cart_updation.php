<h2 class="ui-title-inner ">Cart Totals</h2>
					<ul class="list-cart list-unstyled">
						
						
						<?php 
						
						$c_image="";
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
																			if($k==trim("image"))
																				{ 
																				
																					$c_image=$v;
																					
																				 }
																				 if($k==trim("size"))
																				{ 
																				
																					$c_size=$v;
																					
																				 }
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
						
							<li class="list-cart__item" id="it_<?php echo $items['rowid'];?>">
								<div class="list-cart__img">
								<i class="list-cart__icon icon fa fa-times js-del" onclick="del_cart_item('<?php echo $items['rowid'];?>')"></i><img class="img-responsive" src="<?php echo base_url($c_image);?>" height="87" width="87" alt="Foto"></div>
								<div class="list-cart__inner">
									<h3 class="list-cart__title"><?php echo $items['name'];?></h3>
									<?php if($c_size!="") { ?>
									<div class="list-cart__size"><span class="list-cart__size_name">Size:</span> <?php echo $c_size;?></div>
									<?php } ?>
									<div class="list-cart__price"><span class="color_primary"><?php echo $items['qty'];?> x</span> RS. <?php echo $items['price'];?></div>
								</div>
							</li>
						
						
						<?php }}?>
						<?php 
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
					</ul>
					<div class="total-price clearfix">Order Total
						<span class="total-price__number">RS. <?php echo $this->cart->total();?></span>
						<input type="hidden" value="<?php echo $this->cart->total();?>" id="total_cart_bill" readonly>
					</div>
					<?php if($discounted_bill!="" && $discounted_bill!=0) {?>
					<div class="total-price clearfix">Discounted Bill
						<span class="total-price__number">RS. <?php echo $discounted_bill;?></span>
						<br/><span style="color:white;font-size:12px">Deals & Drinks Excluded</span>
						
					</div>
					<?php } ?>
					
					<!--<a class="total-price__btn ui-btn ui-btn_mod-a btn-effect btn-block" href="javascript:void(0);">view shopping cart</a>-->
					<?php if($this->cart->total()< 250) { ?>
						<center>Minimum Order should be 250 Rs</center>
					<?php }  else {?>
					<a class="total-price__btn ui-btn ui-btn-primary btn-effect btn-block" href="<?php echo site_url('Checkout');?>">checkout</a>
					<?php } ?>