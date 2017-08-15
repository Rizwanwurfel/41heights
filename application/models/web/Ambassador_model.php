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
class  Ambassador_model extends CI_Model
{
	/////////////////fuction for showing all ambassador data in admin panel//////////
	public function all_ambassadors()
	{
		$all=$this->db->query("select *from `ambassador` order by `amb_id` desc");
		if($all->num_rows()>0)
		{
			return $all;
		}
		else
		{
			return false;
		}
	}
	//////////////showing deals in website for ambassador////////////////////////////////
	public function deals()
	{
		$deals=$this->db->query("select * from `deals`  INNER JOIN `categories` ON  deals.cat_id=categories.cat_id where deals.deal_for='1' AND deals.deal_deleted='0'");
		if($deals->num_rows()>0)
		{
			return $deals;
		}
		else
		{
			return false;
		}
	}
	//////////////////function for loading ambassador profile page///////////////
	public function ambassador_profile()
	{
		$amb_data=$this->db->query("select *from `ambassador` where `amb_id`='".$this->session->userdata('ambs_id')."'")->row();
		if($amb_data)
		{
			return $amb_data;
		}
		else
		{	
			return false;
		}
	}
	////////////////function for signingup the ambassador/////////////
	public function signup()
	{
		date_default_timezone_set("Asia/Karachi");
		$curr_dat=date("ymd");
		$reffered_by="";
		if($this->input->post('referred_by') && trim($this->input->post('referred_by'))!="")
		{
			$check_ref=$this->db->query("select amb_name,amb_ref_id from `ambassador` where  `amb_ref_id`='".$this->input->post('referred_by')."' AND `amb_approved`='1'")->row();
			if($check_ref)
			{
				$reffered_by=$check_ref->amb_ref_id;
			}
			else
			{
				return "invalid_reference";
				exit;
			}
		}
		$am_data=array(
				'amb_name'=>$this->security->xss_clean($this->input->post('name')),
				'amb_email'=>$this->security->xss_clean($this->input->post('email')),
				'amb_phone'=>$this->security->xss_clean($this->input->post('phone_number')),
				'amb_password'=>$this->security->xss_clean(md5($this->input->post('password'))),
				'hostelite'=>$this->security->xss_clean($this->input->post('hostelite')),
				'amb_address'=>$this->security->xss_clean($this->input->post('address')),
				'amb_office'=>$this->security->xss_clean($this->input->post('institute_office')),
				'amb_image'=>'public/images/no_profile.png',
				'amb_ref_by'=>$this->security->xss_clean($reffered_by),
	
		);
		$insert_ambassador=$this->db->insert('ambassador',$am_data);
		$insert_id=$this->db->insert_id();
		$ref_id=$curr_dat.$insert_id;
		if($insert_ambassador)
		{
			$update_ref_id=$this->db->query("UPDATE `ambassador` set `amb_ref_id`='".$ref_id."' where `amb_id`='".$insert_id."'");
			return "success";
		}
		else
		{
			return false;
		}
		
	}
	////////////////function for signin the ambassador/////////////
	public function signin()
	{
		$sign_in=$this->db->query("select *from `ambassador` where `amb_email`='".$this->security->xss_clean($this->input->post('email'))."'")->row();
		if($sign_in)
		{
			 
			 return $sign_in;
			 
			 
		}
		else
		{
			//$sign_inmail=$this->db->query("select ");
			return false;
		}
	}
	//////////////////////////////////////////////////////////function for approving and unapproving////////////////////////////////
	public function amb_approval($status,$id)
	{
		$update=$this->db->query("UPDATE `ambassador` set `amb_approved`='".$status."' where `amb_id`='".$id."'");
	//	echo "UPDATE `ambassador` set `amb_approved`='".$status."' where `amb_id`='".$id."'";
		//exit;
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	//////////////////////////////////full ambassdor detail at admin panel/////////////
	
	public function amb_complete_detail($id)
	{
		$amb=$this->db->query("select *from `ambassador` where `amb_id`='".$id."'")->row();
		if($amb)
		{
			return $amb;
			
		}
		else
		{
			return false;
		}
	}
	
	
	
	/////////////////////function for update ambassador profile//////////////
	
	public function update_profile()
	{
		$data=array(
				'amb_name'=>$this->input->post('name'),
				'amb_phone'=>$this->input->post('phone'),
				'hostelite'=>$this->input->post('hostelite'),
				'amb_address'=>$this->input->post('address'),
				'amb_office'=>$this->input->post('office'),
				
				);
				$old_image=$this->input->post('old_image');
	
		///////////////////////image profile/////////////////
			if(isset( $_FILES['photo']) && $_FILES['photo']['size'] > 0 &&  $_FILES['photo']['size'] <= 2098152)
			{
		
				//$up_pic=str_replace(' ', '_', $cat_name);
				 $path = "public/amb/".$this->input->post('amb_id')."/";
				 $up_pic_name=str_replace(' ', '_', $_FILES['photo']['name']);
				$db_pic=$path.$up_pic_name;
					if(!is_dir($path)) //create the folder if it's not already exists
					{
					  mkdir($path,0755,TRUE);
					} 
                $config = array(
                  'upload_path' => $path,
                  'file_name' => $up_pic_name,
                  'allowed_types' => 'png|jpg|jpeg|svg',
                  'max_size' => '500000',
                  'overwrite' => TRUE
                );
				
				
                $this->load->library('upload');
				$this->upload->initialize($config);
					if(!$this->upload->do_upload('photo'))
					{
					//echo $path;
					$errors = $this->upload->display_errors();
					echo $errors;
					$db_pic="public/images/no_profile.png";
					//exit;	
					}
					else{
							$uploaded_data = $this->upload->data();
							//$result['image_data']=$uploaded_data;
							
							///////////resize image/////////////
							if($uploaded_data['file_size'] > 800){
							//$result['pathss']=base_url().$path.$uploaded_data['file_name'];
								$this->load->library('image_lib');
								$config['image_library'] = 'gd2';
								$config['source_image'] = $uploaded_data['full_path'];//base_url().$path.$uploaded_data['file_name'];
								$config['create_thumb'] = False;
								$config['maintain_ratio'] = TRUE;
								$config['width']         = 1;
								$config['height']       = 500;
								$config['master_dim'] = 'height';

								//$this->load->library('image_lib', $config);

								//$this->image_lib->resize();
								$this->image_lib->clear();
								$this->image_lib->initialize($config);
								$this->image_lib->resize();
								}
						
						if($old_image!="public/images/no_profile.png" && $old_image!=$path.$up_pic_name)
						{
							
							if(file_exists($old_image)){
								unlink($old_image);
							}else{
								//echo 'file not found';
							}
							
						}
						
							$db_pic=$path.$up_pic_name;
						
						}
			}
		else
		{
			$db_pic=$old_image;
		}
		$data['amb_image']=$db_pic;
		////////////////////////////////////////////////////
		
		$update=$this->db->where('amb_id',$this->input->post('amb_id'))->update('ambassador',$data);
		if($update)
		{
			return $data;
		}
		else
		{
			return false;
		}
	}
	
	///////////////////forgot pass ambassador////////////
	
	public function forgot_pass()
	{
		$email_add=$this->input->post('f_email');
		$query_f=$this->db->query("SELECT `amb_email` from  `ambassador` WHERE `amb_email`='".$email_add."'");
		if($query_f->num_rows()>0)
		{
			//////////////////////////////////////
								$password = "";
					  $charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
					 
					  for($i = 0; $i < 8; $i++)
					  {
					     $random_int = mt_rand();
					      $password .= $charset[$random_int % strlen($charset)];
					 }
					 
					$pass=md5($password);
					$up_q=$this->db->query("UPDATE `ambassador` SET `amb_password`='".$pass."' where `amb_email`='".$email_add."'");
					if($up_q)
					{
							///////////////////////email sending///////////////////////////
									     ///////////////////////////////////////////////////////
                   $to =$this->input->post('f_email');
					$subject = '41 Heights Password Reset';
					$from = 'info@41heightspizza.com';
					 
					// To send HTML mail, the Content-type header must be set
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					// $from="sales@yeswecan.pk";
					// Create email headers
					$headers .= 'From: '.$from."\r\n".
						'Reply-To: '.$from."\r\n" .
						'X-Mailer: PHP/' . phpversion();
					 
					// Compose a simple HTML email message
					$message = '<html><body style="padding:2%">';
					$message .= '<center><h1 style="color:#f40;">41 heightspizza</h1>';
					$message .= '<p style="font-size:15px;">Your Password Changed At 41 heightspizza!</p>';
					$message .= '<p style="font-size:15px;">New Password:<b>'.$password.'</b></p>';
					$message .= '<p style="font-size:15px;">Thanks and have a wonderful day!</p>';
					$message .= '<p style="font-size:15px;padding-left:2%">41 heights Support!</p></center>';
					$message .= '</body></html>';
					 
					// Sending email
					mail($to, $subject, $message, $headers);
					return "sent";
					}
					else
					{
					return false;
					}
			///////////////////////////////////////
			//return $password;
		}
		else
		{
			return "email_not_reg";
		}
	}
	/////////////////////////////////////////change password////////
	///////////////function for updating password of mbassador////////////////
	public function change_pass()
	{
		$amb_id=$this->input->post('amb_id');
		$old_pass=$this->input->post('curr_password');
		$new_pass=$this->input->post('password');
		//$con_pass=$this->input->post('conform_pass');
		$old=array(
				'amb_password'=>md5($new_pass),
		);
		$check_passs=$this->db->query("SELECT `amb_password` from  `ambassador` where `amb_id`='".$amb_id."' AND `amb_password`='".md5($old_pass)."'")->row();
		if($check_passs)
		{
			$update=$this->db->where('amb_id',$amb_id)->update('ambassador',$old);
			if($update)
			{
				return "updated";
			}
			else
			{
				return false;
			}
		}
		else
		{
			return "old_incorrect";
		}
		
	}
	////////////////////function to get points of ambassador against amb id for android serviece//////////////
	public function amb_points()
	{
		if($this->input->post('amb_id'))
		{
			$amb=$this->db->query("select *from `ambassador` where `amb_id`='".$this->input->post('amb_id')."'")->row();
			if($amb)
			{
				return $amb;
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
	///////////////////////function for android service ambassador deals///////////////
	public function amb_deals()
	{
		$data=array();
		$data_it=array();	
		$already=array();
		//////////fetching all public  deals against categories 
						$select_deal=$this->db->query("select deals.*,categories.cat_name from deals inner join categories on deals.cat_id=categories.cat_id  where deals.deal_for='1' and deals.deal_deleted='0'  order by deals.deal_top desc");
								if($select_deal->num_rows()>0)
								{
									
													
											foreach($select_deal->result_array() as $deal_i)
											{
												////////////////
														$select_deal_i=$this->db->query("select * from deals_products  where deal_id='".$deal_i['deal_id']."'");
														foreach($select_deal_i->result_array() as $deal_iii)
													{
														$data_it[$deal_i['deal_name']][]=$deal_iii['deal_pr_name'];
													}
												////////////////
												
												$data[]=array(
												
														
														'deal_type'=>$deal_i['cat_name'],
														'deal_name'=>$deal_i['deal_name'],
														'deal_name'=>$deal_i['deal_name'],
														'deal_id'=>$deal_i['deal_id'],
														'deal_price'=>$deal_i['deal_price'],
														'deal_image'=>$deal_i['deal_image'],
														'main_product_qty'=>$deal_i['main_pr_qty'],
														'drink_qty'=>$deal_i['drink_qty'],
														'deal_item'=>$data_it[$deal_i['deal_name']],
												);
												$data_it[$deal_i['deal_name']]="";
											}
										return $data;	
								}
								else
								{
									return false;
								}
	}
}