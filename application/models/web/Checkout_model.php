<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 *
 * @author bilal khan
 */
class  Checkout_model extends CI_Model
{
	public function add_order()
	{
		$user_email="";
		$total_bill="";
		$total_items="";
		$discounted_bill="";
		$order_note="";
		$fcm_update=0;
		$service_charges=$this->security->xss_clean($this->input->post("service_charges"));
		$user_name=$this->security->xss_clean($this->input->post("full_name"));
		$user_phone=$this->security->xss_clean($this->input->post("phone"));
		////////////////////check if refference is valid or not/////////////
		$amb_reference="";
		$amb_discount_allow="no";
		$coupon_discount_allow="no";
		$discount_on_coupon=0;
		if(trim($this->input->post('ref_id'))!="" && trim($this->input->post('coupon'))=="")
		{
			$amb_ref=$this->security->xss_clean($this->input->post('ref_id'));
			///checking from db if refernce is valid or not
			$check_reffer=$this->db->where(array('amb_ref_id'=>trim($amb_ref),'amb_approved'=>'1'))->count_all_results('ambassador');
			if($check_reffer > 0)
			{
				
				$amb_reference=$this->security->xss_clean($this->input->post('ref_id'));
				$amb_discount_allow="yes";
			}
			else
			{
				return "invalid_reference";
			}
		}
		//////////////////if coupon and reference both applied///////////////////////
		if(trim($this->input->post('ref_id'))!=""  && trim($this->input->post('coupon'))!="")
		{
			$code_cop=$this->security->xss_clean($this->input->post('coupon'));
			///checking from db if refernce is valid or not
			//$check_reffer=$this->db->where(array('cop_code'=>trim($code_cop),'cop_valid'=>'1'))->count_all_results('coupon');
			$check_cop_code=$this->db->query("select `cop_discount` from `coupon` where `cop_code`='".$code_cop."' and `cop_valid`='1'")->row();
			if($check_cop_code)
			{
				$discount_on_coupon=$check_cop_code->cop_discount;
				//$amb_reference=$this->security->xss_clean($this->input->post('ref_id'));
				$coupon_discount_allow="yes";
				$amb_discount_allow="no";
			}
			else
			{
				return "invalid_coupon";
			}
		}
		//////////////////////////////if coupon applied and ref not applied///////////////
		if(trim($this->input->post('ref_id'))=="" &&  trim($this->input->post('coupon'))!="")
		{
			$code_cop=$this->security->xss_clean($this->input->post('coupon'));
			///checking from db if refernce is valid or not
			//$check_reffer=$this->db->where(array('cop_code'=>trim($code_cop),'cop_valid'=>'1'))->count_all_results('coupon');
			$check_cop_code=$this->db->query("select `cop_discount` from `coupon` where `cop_code`='".$code_cop."' and `cop_valid`='1'")->row();
			if($check_cop_code)
			{
				$discount_on_coupon=$check_cop_code->cop_discount;
				//$amb_reference=$this->security->xss_clean($this->input->post('ref_id'));
				$coupon_discount_allow="yes";
				$amb_discount_allow="no";
			}
			else
			{
				return "invalid_coupon";
			}
		}
		if($this->input->post("email"))
		{
			$user_email=$this->security->xss_clean($this->input->post("email"));
		}
		if($this->input->post("order_note"))
		{
			$order_note=$this->security->xss_clean($this->input->post("order_note"));
		}
		
		$user_location=$this->security->xss_clean($this->input->post("location"));
		$user_address=$this->security->xss_clean($this->input->post("address"));
			date_default_timezone_set("Asia/Karachi");
		$curr_dat=date("Y-m-d H:i:s");
		$without_deal_total=0;
		$deals_total=0;
		if($this->cart->contents())
		{
			$total_bill=$this->cart->total();
			$total_items=$this->cart->total_items();
			////////////////////////////////////
				foreach ($this->cart->contents() as $items){
						
						/////////////////////////selecting image and type of product/////////////////
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
																					else
																					{
																						$deals_total+=$items['subtotal'];
																					}
																				}
												} 
										}
										
								}
			
			/////////////////dicount check/////
			////////////////if normal discount is there then no referral discount will be given 
			///////////if coupon is applied it will be given top priority/////////////// and no normal no reffereal discount will be applied
			if($coupon_discount_allow=="yes" && $discount_on_coupon!=0)
			{
										$total_discount=$without_deal_total*($discount_on_coupon/100);
										$discounted_bill=$without_deal_total-$total_discount;
										$discounted_bill=$discounted_bill+$deals_total;
										$dis_msg="<h4>Coupon  discount: ".$discount_on_coupon."%<br/>Total Bill: ".round($discounted_bill)."</h4>";
										$this->session->set_userdata('referral_dis',$dis_msg);
			}
			else { //id 009
				$discount=$this->db->query("select `discount`,`ref_discount` from discount")->row();
								if($discount)
								{
									$discount_amount=$discount->discount;
									$discount_ref_amount=$discount->ref_discount;
									if($discount_amount!=0 && $discount_amount>0)
									{
										$total_discount=$without_deal_total*($discount_amount/100);
										$discounted_bill=$without_deal_total-$total_discount;
										$discounted_bill=$discounted_bill+$deals_total;
										 
									}
									else
									{
										if($amb_discount_allow=="yes")
										{
											$prod_discount=10*($without_deal_total/100);
											$deal_discount=5*($deals_total/100);
											$points_to_amb=($prod_discount+$deal_discount)/10; ////ponits to ambassador 10% of deals and 5% of products ,, 1 point=10Rs
											$update_points=$this->db->query("update `ambassador` set `amb_ref_points`=amb_ref_points+".$points_to_amb." where `amb_ref_id`='".$amb_reference."'");
											if($update_points)
											{
												$select_fcm=$this->db->query("select `fcm_id` from `ambassador` where `amb_ref_id`='".$amb_reference."'")->row();
													if(!empty($select_fcm->fcm_id) && $select_fcm->fcm_id!=0 )
													{
														$fcm_update=$select_fcm->fcm_id;
													} 
													
												
											}
											////////discount to customer
											$total_discount=$without_deal_total*($discount_ref_amount/100);
											$discounted_bill=$without_deal_total-$total_discount;
											$discounted_bill=$discounted_bill+$deals_total;
											$dis_msg="<h4>Referral  discount: ".$discount_ref_amount."%<br/>Total Bill: ".round($discounted_bill)."</h4>";
											$this->session->set_userdata('referral_dis',$dis_msg);
										}
									}
								}
				}//id009
			///////////////////////////////////
		}
		/////////////
		$order_data=array(
					'user_name'=>$user_name,
					'user_address'=>$user_address,
					'user_area'=>$user_location,
					'user_email'=>$user_email,
					'user_phone'=>$user_phone,
					'order_date'=>$curr_dat,
					'total_bill'=>$total_bill,
					'discounted_bill'=>$discounted_bill,
					'service_charges'=>$service_charges,
					'order_note'=>$order_note,
					'total_items'=>$total_items,
					'order_status'=>"pending",
					'referred_by'=>$amb_reference,
					'source'=>"web",
		);
		$insert_data=$this->db->insert('order',$order_data);
		$insert_id=$this->db->insert_id();
		$item_image="";
		$item_type="";
		$items_att=array();
		$items_att_drink=array();
		//////////if customer info inserted///////////////////////
		if($insert_data)
		{
			///////////////if cart has data////////////////////
			if($this->cart->contents())
			{
				foreach ($this->cart->contents() as $items)
				{
							/////////////////////////selecting image and type of product/////////////////
							if($items['options']!=NULL ||!empty($items['options']))
										{
												foreach($items['options'] as $k=>$v) 
												{ 
																				if(trim($k)=="image")
																				{ 
																				
																					$item_image=$v;
																					
																				}
																				else if(trim($k)=="type" )
																				{
																					$item_type=$v;
																				}
																				else if(trim($k)=="drink")
																					{
																						$items_att_drink[]=array($k=>$v);
																					}
																				else if(trim($k)=="discounted")
																					{
																						
																					}
																				else
																				{
																					
																						$items_att[]=array($k=>$v);
																					
																					
																				}
												} 
										}
										else
										{
												
												$items_att=array();
										}
										header('Content-type: application/json');
										$data_atts=array(
							'pizza'=>$items_att,
							'drink'=>$items_att_drink
					);
					$data_atts= json_encode($data_atts);
						$desc_data=array(
															'item_type'=>$item_type,
															'item_id'=>$items['id'],
															'item_name'=>$items['name'],
															'item_image'=>$item_image,
															'item_ind_price'=>$items['price'],
															'order_id'=>$insert_id,
															'item_total_price'=>$items['subtotal'],
															'item_qty'=>$items['qty'],
															'item_attribute'=>$data_atts
															
																);
																$desc_query=$this->db->insert('order_description',$desc_data);
																$items_att=array();
																$items_att_drink=array();
						//////////////////////////////////////////
				}
				/////fcm update of points////////////
					if($fcm_update!=0 && $fcm_update > 0 )
					{
						$this->fcm_points_update($fcm_update);
					}
				//////////////////////////////////////
				return "success";
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
	///////////////////////////////////function to update fcm points if needed for ambassador// sending service notification//////////////////////////////////////
	public function fcm_points_update($fcm_update)
	{
		$select_token=$this->db->query("select fcm_tokens.fcm_token,ambassador.amb_ref_points,ambassador.amb_id from `fcm_tokens` INNER JOIN `ambassador` ON fcm_tokens.fcm_id=ambassador.fcm_id where fcm_tokens.fcm_id='".$fcm_update."'")->row();
		if($select_token)
		{
			
					/////////////////////////////////////////////
						$ch = curl_init("https://fcm.googleapis.com/fcm/send");

								//The device token.
								$token = $select_token->fcm_token;
								$amb_id = $select_token->amb_id;
								$amb_points = $select_token->amb_ref_points;
								$title ="";
								$body ="";
								//Title of the Notification.
								$title = "update points";

								//Body of the Notification.
								$body = "ambassador points updated";
								//Creating the notification array.
								$notification = array('title' =>$title , 'body' => $body, 'ntype'=>'ambassador','amb_id'=>$amb_id,'amb_points'=>$amb_points);
								//Creating the notification array.
								//$notification = array('title' =>$title , 'body' => $body, 'ntype'=>'order');

								//This array contains, the token and the notification. The 'to' attribute stores the token.
								$arrayToSend = array('to' => $token, 'data' => $notification);

								//Generating JSON encoded string form the above array.
								$json = json_encode($arrayToSend);

								//Setup headers:
								$headers = array();
								$headers[] = 'Content-Type: application/json';
								$headers[] = 'Authorization: key=AAAAchaUvag:APA91bFxfQ12W-rc1jA8yL8I8gCPaYyA4fSQqGFInHqRMmzYjaTuW8zNDzHl6GsxBfhtUOzNjVkWp2aAmLMkmJOrHF-GUcyeNQzvcZpFzPxOjdoPVD6egeWcv1dJDM_XXorSYLcb8Nam';

								//Setup curl, add headers and post parameters.
								curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
								curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
								curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);  
								curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);	// it is added by me to hide response on browser directly							

								//Send the request
								$ress=curl_exec($ch);
								if($ress)
								{
									
									curl_close($ch);
								//	exit;
									return true;
								}
								else
								{
									
									curl_close($ch);
									//exit;
									return false;
								}
		}
		else
		{
			return false;
		}
	}
}