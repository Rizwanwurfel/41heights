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
class  Notification_model extends CI_Model
{
	///////////////////////////pubic function check for new order notfication///////
	  public function check_new()
	  {
		$check=$this->db->query("SELECT *FROM `order` where `order_notify`='0' AND `alerted`='0' AND `seen_detail`='0' AND `order_deleted`='0'");
		if($check->num_rows()>0)
		{
			return $check;
		}
		else
		{
			return false;
		}
	  }
	  
	  ///////////////////////function for db update that alert has been given////////////////
	  public function alerted_already($id)
	  {
		return "Update order set `alerted`='1' where `order_id`='".$id."'";
		exit;
		//$update=$this->db->query("Update `order` set `alerted`='1' where `order_id`='".$id."'");
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	  }
	  ///////////////
	   ///////////////////////function if need of new texton bell notification/////////////////
	  public function check_label()
	  {
			$check=$this->db->query("SELECT *FROM `order` where `order_notify`='0' AND `seen_detail`='0' AND `order_deleted`='0'");
			if($check->num_rows()>0)
			{
				return $check;
			}
			else
			{
				return false;
			}
	  }
	  /////////////////////////
	  public function send_android_notification()
	  {
	  
			$title="";
			$url="";
			$text="";
			$db_pic="";
			$type=$this->input->post('not_type');
			if($this->input->post('not_title'))
			{
				$title=$this->input->post('not_title');
			}
			if($this->input->post('not_url'))
			{
				$url=$this->input->post('not_url');
			}
			if($this->input->post('not_desc'))
			{
				$text=$this->input->post('not_desc');
			}
			
			
			 if(isset( $_FILES['not_image']) && $_FILES['not_image']['size'] > 0 ){
		 
				
				 $path = "public/promotions/";
				 $up_pic_name=str_replace(' ', '_', $_FILES['not_image']['name']);
				$db_pic=$path.$up_pic_name;
					if(!is_dir($path)) //create the folder if it's not already exists
					{
					  mkdir($path,0755,TRUE);
					} 
                $config = array(
                  'upload_path' => $path,
                  'file_name' => $up_pic_name,
                  'allowed_types' => 'png|jpg|jpeg',
                  'max_size' => '500000',
                  'overwrite' => TRUE
                );
				
				
                $this->load->library('upload');
				$this->upload->initialize($config);
					if(!$this->upload->do_upload('not_image'))
					{
					//echo $path;
					$errors = $this->upload->display_errors();
					echo $errors;
					$db_pic="public/images/general_cat.png";
					//exit;	
					}
					else{
						$db_pic=$path.$up_pic_name;
						
						}
					
        }
		else
		{
			$db_pic="public/images/general_cat.png";
		}
			$token_ids=array();
			$token_query=$this->db->query("select `fcm_token` from `fcm_tokens`");
			if($token_query->num_rows()>0)
			{
				foreach($token_query->result_array() as $row)
				{
					$token_ids[]=$row['fcm_token'];
				}
				
			}
			else
			{
				return false;
			}
					/////////////////////
							$tokens=$token_ids;
					/////////////////////////////////////////////
						$ch = curl_init("https://fcm.googleapis.com/fcm/send");
								$token = $token_ids;
								$title = $title;
								$notification = array('title' =>$title , 'body' => $text ,'url'=>$url,'image'=>$db_pic,'type'=>$type,'ntype'=>'promotion');

								//This array contains, the token and the notification. The 'to' attribute stores the token.
								$arrayToSend = array('registration_ids' => $token_ids, 'data' => $notification);

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

								//Send the request
								$ress=curl_exec($ch);
								if($ress)
								{
									
									curl_close($ch);
									return true;
								}
								else
								{
									
									curl_close($ch);
									return false;
								}
	  }
	    public function send_android_notification2()
	  {
	  
							$token_id="fjAXO1nZFuU:APA91bFfzan98tH8ShnmVZ4rNFkrCEQQ1dcwI7EuPpm0iL0bLIuWgjpFk4HZo_fJP5EN4bRZ3FSwzwDVp64kNfs4tpMz6US42D1J2H8UZFPvwDKdyuhg_0veI3DIIbStHgAB4pl0T33u";
					/////////////////////////////////////////////
						$ch = curl_init("https://fcm.googleapis.com/fcm/send");

								//The device token.
								$token = $token_id;
								$title ="41 heights";
								$body ="this is test body";
					//Creating the notification array.
								$notification = array('title' =>$title , 'body' => $body);

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

								//Send the request
								$ress=curl_exec($ch);
								if($ress)
								{
									
									curl_close($ch);
									return true;
								}
								else
								{
									
									curl_close($ch);
									return false;
								}
	  }
	  ///////////////////////////////////function for waiter call checking for dine in customers ///////////////////
	public function check_waitercall()
	{
		$check=$this->db->query("select `call_status` from `waiter_call`  where `wc_id`='1'")->row();
		if($check->call_status=="1")
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}