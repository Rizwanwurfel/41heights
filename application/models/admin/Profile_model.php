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
class  Profile_model extends CI_Model
{
	public function full_profile_display()
	{
		$result=$this->db->query("SELECT *FROM `user` WHERE `user_id`='".$this->session->userdata('user_id_emb')."'");
		 if($result->num_rows()>0)
			{
			
			   return $result;
				
			}
		else
			{
				return false;
			}
	}
	
	///////////////////////////////function for updating password/////////////////////////////
	public function update_password()
	{
		$result=array();
			$current_user_pass=$this->session->userdata('user_pass_emb');
			$current_user_id=$this->session->userdata('user_id_emb');
			
			if($current_user_pass==md5($this->input->post('old_pass')))
			{
					$query_up=$this->db->query("UPDATE `user` SET `user_password`='".md5($this->input->post('new_pass'))."' WHERE `user_id`='".$current_user_id."'");
						if($query_up)
						{
						$this->session->set_userdata('user_pass_emb',md5($this->input->post('new_pass')));
							return $result['pass_msg']="updated";
						}
						else
						{
							return $result['pass_msg']="update failed";
						}
			}
			else{
					
					return $result['pass_msg']="old password not correct";
			}
	}
	
	///////////////////////////////////////////////////////////////////////////////////////////////
	public function update_profile()
	{
		$user_name=$this->input->post('user_name');
		$user_phone=$this->input->post('user_phone');
		
		$user_address=$this->input->post('user_address');
		$current_user_id=$this->session->userdata('user_id_emb');
		$update_query=$this->db->query("UPDATE `user` SET `user_name`='".$user_name."', `user_phone`='".$user_phone."',`user_address`='".$user_address."' WHERE `user_id`='".$current_user_id."' ");	
			if($update_query)
			{
				$this->session->set_userdata('user_name_emb',$user_name);
				return true;
			}
			else{
				return false;
			}
			
	}
	
	///////////////////////////update profile image///////////////////////////////////////////////////////////
	
	public function update_profile_image()
	{
		$current_user_email=$this->session->userdata('user_email_emb');
		$current_user_id=$this->session->userdata('user_id_emb');
		$path="";
		$up_pic="";
		$date_cur=date("d_m_y_h_i_s_");
			///////////////////////////////updating image//////////////////////
					if(isset($_FILES['upload']) && $_FILES['upload']['size'] > 0 ){ //if 33
					//$up_pic=str_replace(' ', '_', $cat_name);
				 $path = "public/uploads/".$current_user_email."/";
				 
				$up_pic_name=str_replace(' ', '_', $_FILES['upload']['name']);
				$dest = $path.$date_cur.$up_pic_name;
					if(!is_dir($path)) //create the folder if it's not already exists
					{
					  mkdir($path,0755,TRUE);
					} 
                $config = array(
                  'upload_path' => $path,
                  'file_name' =>$date_cur.$up_pic_name,
                  'allowed_types' => 'png|jpg|jpeg',
                  'max_size' => '500000',
                  'overwrite' => TRUE
                );
				
				
                $this->load->library('upload');
				$this->upload->initialize($config);
					if(!$this->upload->do_upload('upload'))
					{
					//echo $path;
					$errors = $this->upload->display_errors();
					echo $errors;
						
					}
					else{
						
						
						
						$update_query=$this->db->query("UPDATE `user` SET `user_image`='".$dest."' WHERE `user_id`='".$current_user_id."'");
								if($update_query)
												{
													//unlink(base_url()/);
													unlink($this->session->userdata('user_image_emb'));
													
												$this->session->set_userdata('user_image_emb',$dest);
												return true;
												exit;
												}
								else
									{
										
										
											return false;
											exit;
										
									}
					
					}
					
       } //if 33
	}
}