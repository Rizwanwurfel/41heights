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
class  Order_model extends CI_Model
{
	 public  function __construct() 
    {
        parent::__construct();
    }
	////////////function fro android service reciving order of android app users//////////
	public function order_receive()
	{
		$item_data="";
		if($this->input->post('item'))
		{
			$item_data=$this->input->post('item');
		}
		$service_charges=0;
		$error_bill=0;
		$discounted_bill="";
		$user_email="";
		$user_area="";
		$order_note="";
		$amb_reference="";
		$amb_ref_points=0;
		if($this->input->post('ref_id'))
		{
			$amb_ref=$this->security->xss_clean($this->input->post('ref_id'));
			///checking from db if refernce is valid or not
			$check_reffer=$this->db->where(array('amb_ref_id'=>trim($amb_ref),'amb_approved'=>'1'))->count_all_results('ambassador');
			if($check_reffer > 0)
			{
				
				$amb_reference=$this->security->xss_clean($this->input->post('ref_id'));
				
			}
			else
			{
				return "invalid_reference";
			}
		}
		$grand_total=$this->input->post('total_bill');
		if($this->input->post('service_charges'))
		{
			$service_charges=$this->input->post('service_charges');
		}
		if($this->input->post('user_area'))
		{
			$user_area=$this->security->xss_clean($this->input->post('user_area'));
		}
		if($this->input->post('user_email'))
		{
			$user_email=$this->security->xss_clean($this->input->post('user_email'));
		}
		if($this->input->post('user_note'))
		{
			$order_note=$this->security->xss_clean($this->input->post('user_note'));
		}
		/////////////////fcm check/////////////////
		$fcm_token="";
		$fcm_id=0;
		if($this->input->post('fcm_token'))
		{
			$fcm_token=$this->input->post('fcm_token');
			$check_fcm=$this->db->query("select `fcm_id`,`fcm_token` from `fcm_tokens` where `fcm_token`='".$fcm_token."'")->row();
			if($check_fcm)
			{
				$fcm_id=$check_fcm->fcm_id;
			}
			else
			{
				$fcm_insert=array(
					'fcm_token'=>$fcm_token
				
					);
				$insert_fc=$this->db->insert('fcm_tokens',$fcm_insert);
				$fcm_id=$this->db->insert_id();
			}
		}
		
		/////////////////////////////////////
			if($this->input->post('discounted_bill') && trim($this->input->post('discounted_bill'))!="" && trim($this->input->post('discounted_bill'))> 0)
		{
			$discounted_bill=$this->input->post('discounted_bill');
			/* $dis_query=$this->db->query("select `discount` from discount")->row();
					if($dis_query->discount!=0 && $dis_query->discount>0 )
					{
						$todays_disc=$dis_query->discount;
						$discount_per=$todays_disc*($grand_total/100);
						$dis_bill=($grand_total-$discount_per);
						if($discounted_bill <= ($dis_bill+2) && $discounted_bill >= ($dis_bill-2))
						{
							$discounted_bill=$this->input->post('discounted_bill');
						}
						else
						{
							$discounted_bill=$dis_bill;
							$error_bill=2;
						}
					}
					else
					{
						$discounted_bill="";
						$error_bill=1;
					}*/
					
		}
		
		date_default_timezone_set("Asia/Karachi");
		$curr_dat=date("Y-m-d H:i:s");
			
		$order_data=array(
					'fcm_id'=>$fcm_id,
					'user_name'=>$this->security->xss_clean($this->input->post('user_name')),
					'user_address'=>$this->security->xss_clean($this->input->post('user_address')),
					'user_email'=>$user_email,
					'user_phone'=>$this->security->xss_clean($this->input->post('user_phone')),
					'user_area'=>$user_area,
					'order_date'=>$curr_dat,
					'total_bill'=>$this->input->post('total_bill'),
					'discounted_bill'=>$discounted_bill,
					'error_bill'=>$error_bill,
					'service_charges'=>$service_charges,
					'order_note'=>$order_note,
					'total_items'=>"",
					'order_status'=>"pending",
					'referred_by'=>$amb_reference,
					'source'=>"android",
		);
		$insert_order=$this->db->insert('order',$order_data);
		$order_i=$this->db->insert_id();
		if($insert_order){
				
				//////////////////////////////////////////////////////////////////
					$data = json_decode($item_data, true);
					foreach($data as $main=>$val)
					{
							
							
												$desc_data=array(
															'item_type'=>$val['item_type'],
															'item_id'=>$val['item_id'],
															'item_name'=>$val['item_name'],
															'item_image'=>$val['item_image'],
															'item_ind_price'=>$val['item_ind_price'],
															'order_id'=>$order_i,
															'item_total_price'=>$val['item_total_price'],
															'item_qty'=>$val['item_qty'],
															'item_attribute'=>$val['item_att']
																);
					
				
										       $desc_query=$this->db->insert('order_description',$desc_data);
							
						} // foreach loop ending
		
				//////////////////updating ambassador reference points against////////////
					if($this->input->post('amb_ref_points') && $this->input->post('ref_id'))
				{
					$amb_ref_points=$this->input->post('amb_ref_points');
					$update_points=$this->db->query("update `ambassador` set `amb_ref_points`=amb_ref_points+".$amb_ref_points." where `amb_ref_id`='".$amb_reference."'");
				}
				///// if order placed by ambassador////////////////////
				if($this->input->post('amb_id') && $this->input->post('points_used'))
				{
					$points_used=$this->input->post('points_used');
					$points_used_id=$this->input->post('amb_id'); //ambassador id 
					$insert_amb_order=array(
						'amb_id'=>$points_used_id,
						'order_id'=>$order_i,
						'points_used'=>$points_used
						
					);
					$insert_amb_o=$this->db->insert('ambassador_order',$insert_amb_order);
					$update_points=$this->db->query("update `ambassador` set `amb_ref_points`=amb_ref_points-".$points_used." where `amb_id`='".$points_used_id."'");
				}
				return "success";
				}
				else{
				return false;
				}
	
			
	}
			////////////function fro android service reciving order of android app users//////////
	public function order_receive_dinein()
	{
		$item_data="";
		if($this->input->post('item'))
		{
			$item_data=$this->input->post('item');
		}
		$service_charges=0;
		$error_bill=0;
		$discounted_bill="";
		$user_email="";
		$user_area="";
		$order_note="";
		$amb_reference="";
		$amb_ref_points=0;
		
		$grand_total=$this->input->post('total_bill');
	
		/////////////////fcm check/////////////////
		$fcm_token="";
		$fcm_id=0;
		
		
		/////////////////////////////////////
			if($this->input->post('discounted_bill') && trim($this->input->post('discounted_bill'))!="" && trim($this->input->post('discounted_bill'))> 0)
		{
			$discounted_bill=$this->input->post('discounted_bill');
		
					
		}
		
		date_default_timezone_set("Asia/Karachi");
		$curr_dat=date("Y-m-d H:i:s");
			
		$order_data=array(
					'fcm_id'=>$fcm_id,
					'user_name'=>"Dine IN Customer",
					'user_address'=>"41 heights",
					'user_email'=>$user_email,
					'user_phone'=>"XXXX-XXXXXXX",
					'user_area'=>$user_area,
					'order_date'=>$curr_dat,
					'total_bill'=>$this->input->post('total_bill'),
					'discounted_bill'=>$discounted_bill,
					'error_bill'=>$error_bill,
					'service_charges'=>$service_charges,
					'order_note'=>$order_note,
					'total_items'=>"",
					'order_status'=>"pending",
					'referred_by'=>$amb_reference,
					'source'=>"android",
		);
		$insert_order=$this->db->insert('order',$order_data);
		$order_i=$this->db->insert_id();
		if($insert_order){
				
				//////////////////////////////////////////////////////////////////
					$data = json_decode($item_data, true);
					foreach($data as $main=>$val)
					{
							
							
												$desc_data=array(
															'item_type'=>$val['item_type'],
															'item_id'=>$val['item_id'],
															'item_name'=>$val['item_name'],
															'item_image'=>$val['item_image'],
															'item_ind_price'=>$val['item_ind_price'],
															'order_id'=>$order_i,
															'item_total_price'=>$val['item_total_price'],
															'item_qty'=>$val['item_qty'],
															'item_attribute'=>$val['item_att']
																);
					
				
										       $desc_query=$this->db->insert('order_description',$desc_data);
							
						} // foreach loop ending
		
				
				///// if order placed by ambassador////////////////////
				if($this->input->post('amb_id') && $this->input->post('points_used') && $this->input->post('amb_id')!="" && $this->input->post('amb_id')!=0)
				{
					$points_used=$this->input->post('points_used');
					$points_used_id=$this->input->post('amb_id'); //ambassador id 
					$insert_amb_order=array(
						'amb_id'=>$points_used_id,
						'order_id'=>$order_i,
						'points_used'=>$points_used
						
					);
					$insert_amb_o=$this->db->insert('ambassador_order',$insert_amb_order);
					$update_points=$this->db->query("update `ambassador` set `amb_ref_points`=amb_ref_points-".$points_used." where `amb_id`='".$points_used_id."'");
				}
				return true;
				}
				else{
				return false;
				}
	
			
	}
		//////////////////////////////////function for showing all pending orders///////////////////////////
	public function show_all_pending_orders(){
		
			$result=$this->db->query("SELECT *FROM `order`  WHERE (order_status='pending' OR order_status='confirmed')  AND order_deleted='0' order BY order_id  desc ");
		//$result=$this->db->query("SELECT *FROM `order` INNER JOIN `order_product` ON order.order_id=order_product.order_id WHERE order.order_status='pending' AND order.order_deleted='0' group BY order.order_id  desc ");
			 if($result->num_rows()>0)
				{
					return $result;
					
				}
				else
				{
						return false;
				}
			
				
	
	}
		//////////////////////////////////function for showing all pending orders///////////////////////////
	public function show_all_orders(){
		$result=$this->db->query("SELECT *FROM `order` where  order_deleted='0' order BY order_id desc");
		//$result=$this->db->query("SELECT *FROM `order` INNER JOIN `order_product` ON order.order_id=order_product.order_id WHERE  order.order_deleted='0' group BY order.order_id  desc ");
			 if($result->num_rows()>0)
				{
					return $result;
					
				}
				else
				{
						return false;
				}
			
				
	
	}
	/////////////////////////////////////function for all orders data fecthing for dashboard////////////////////////////////
	public function all_orders()
	{
		$result=$this->db->query("SELECT *FROM `order` WHERE  `order_deleted`='0' order BY order_id  desc Limit 5");
			 if($result->num_rows()>0)
				{
					return $result;
					
				}
				else
				{
						return false;
				}
		
	}
	
	//////////////////////////function for displaying complete detail of order receive////////////////////////////////
	public function order_complete_detail($id){
		
		$result=$this->db->query("SELECT *from `order` INNER JOIN `order_description` ON order.order_id=order_description.order_id WHERE order.order_id='".$id."'");
		//$result=$this->db->query("SELECT *from `order` INNER JOIN `order_product` ON order.order_id=order_product.order_id WHERE order.order_id='".$id."'");
		if($result->num_rows()>0)
				{
					$update=$this->db->query("Update `order` set `seen_detail`='1',`order_notify`='1',`alerted`='1' where `order_id`='".$id."'");
					return $result;
					
				}
				else
				{
						$update=$this->db->query("Update `order` set `seen_detail`='1',`order_notify`='1',`alerted`='1' where `order_id`='".$id."'");
						return false;
				}
	}
		////////////////////////////////function for deleting order//////////////////////////
	public function delete_order($id){
				$query=$this->db->query("Update `order` set `order_deleted`='1' WHERE `order_id`='".$id."'");
			if($query)
			{	
				$query_desc=$this->db->query("update `order_description` set `order_desc_deleted`='1' WHERE `order_id`='".$id."'");
				$this->session->set_userdata('success', 'Order data deleted successfully');
				return true;
			}
			else{
			$this->session->set_userdata('failure', 'Failed to Delete Order data');
			return false;
			}
	}
	/////////////////////////////////////function for updating status order///////////////////////
	public function update_order_status($status,$id){
			$update_order=$this->db->query("Update `order` SET `order_status`='".$status."' where `order_id`='".$id."'");
				if($update_order){
				$this->send_push_notification($status,$id);
					return true;
				}
				else{
				return false;
				}
	}
	////////////////////////////////////////
	public function send_push_notification($status,$id)
	{
		$get_token=$this->db->query("select order.fcm_id ,fcm_tokens.fcm_token from `order` inner join `fcm_tokens` ON order.fcm_id=fcm_tokens.fcm_id where `order_id`='".$id."'")->row();
		if($get_token)
		{
			
				$notification=array();
				//$get_tok=$this->db->query("select fcm_token from fcm_notification where fcm_id='".$fcm_id."'")->row();
				if($get_token->fcm_token)
				{
					$token_id=$get_token->fcm_token;
					/////////////////////////////////////////////
						$ch = curl_init("https://fcm.googleapis.com/fcm/send");

								//The device token.
								$token = $token_id;
								$title ="";
								$body ="";
					if(strtolower(trim($status))=="confirmed")
					{
								//Title of the Notification.
								$title = "Order Confirmed";

								//Body of the Notification.
								$body = "Dear Customer!Your order has been received Order will be delivered to you with in 40 minutes.";
								//Creating the notification array.
								$notification = array('title' =>$title , 'body' => $body, 'ntype'=>'order');
					}
					if(strtolower(trim($status))=="delivered")
					{
								//Title of the Notification.
								$title = "Order Delivered";

								//Body of the Notification.
								$body = "Dear Customer!Your order has been Delivered.For further assistance call us at 0515412121";
								//Creating the notification array.
								$notification = array('title' =>$title , 'body' => $body, 'ntype'=>'order','order_id'=>$id);
					}
					if(strtolower(trim($status))=="cancelled")
					{
								//Title of the Notification.
								$title = "Order Cancelled";

								//Body of the Notification.
								$body = "Dear Customer!Your order has been Cancelled.For further assistance call us at 0515412121";
								//Creating the notification array.
								$notification = array('title' =>$title , 'body' => $body, 'ntype'=>'order');
					}
								

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
									//exit;
									return true;
								}
								else
								{
									
									curl_close($ch);
									//exit;
									return false;
								}
					//////////////////////////////////////////////
					
				}
			
		}
		else
		{
			return false;
		}
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
?>