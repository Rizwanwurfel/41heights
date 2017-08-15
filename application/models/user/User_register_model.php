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
class  User_register_model extends CI_Model
{
		////////////////////function for creating restaurant //////////////////////////////////
	public function user_registration()
	{
		$rez=0;
		$rest_name=array(
						'rest_name'=>trim($this->input->post('user_name'))
						);
					$rest_in=$this->db->insert('restaurant',$rest_name);
					$ok=$this->db->insert_id();
					
					if($rest_in)
						{
								$insert_user=array(
									'user_name'=>trim($this->input->post('user_name')),
									'user_email'=>trim($this->input->post('user_email')),
									'user_password'=>trim(md5($this->input->post('user_pass'))),
									'user_role'=>2,
									'rest_id'=>$ok
								);
						
							$rez=$this->db->insert('user',$insert_user);
						}
		if($rez)
		{
			$this->session->set_userdata('inserted_email',$this->input->post('user_email'));
				if($this->session->userdata('failure_name')) { $this->session->unset_userdata('failure_name');} 
				if($this->session->userdata('failure_email')) { $this->session->unset_userdata('failure_email');} 
			return true;
		}
		else
		{
			return false;
		}
	}
	/////////////////////////////////function for signing in of restaurants//////////////////////////////////////////////////
	public function user_login()
	{
		$user_email=trim($this->input->post('user_email'));
		$user_pass=trim($this->input->post('user_password'));
		$login_query=$this->db->query("SELECT *FROM `user` INNER JOIN `user_role` ON user.user_role=user_role.user_role_id WHERE user.user_email='$user_email' AND user.user_password='".md5($user_pass)."' AND user.user_verified='1' AND user.user_suspended='0' AND user.user_deleted='0'");
		
		if($login_query->num_rows() == 1)
		{
				foreach($login_query->result_array() as $row)
				{
					$res_data=array(
						'user_name_emb'=>$row['user_name'],
						'user_email_emb'=>$row['user_email'],
						'user_image_emb'=>$row['user_image'],
						'user_pass_emb'=>$row['user_password'],
						'user_id_emb'=>$row['user_id'],
						'user_role_emb'=>$row['user_role'],
						'user_role_name_emb'=>$row['user_role_name'],
						'user_logged_in_emb'=>TRUE
					);
					
				}
				$this->session->set_userdata($res_data);
				return true;
		}
		else
		{
			return false;
		}
	}
	///////////////////////function for check user role name///////////////////////////////////////////////////
	public function user_role_name()
	{
		$role_name=$this->db->query("SELECT `user_role_name` From `user_role` where `user_role_id`='".$this->session->userdata('user_role_uns')."'")->row();
		$this->session->set_userdata('user_role_name_uns',$role_name->user_role_name);
	}
	/////////////////////////////
	////////////////////////////////////////function for admin forgot password//////////////////////////////////////
	public function admin_forgot_password()
	{
		$email_add=trim($this->input->post('forgot_email'));
		$query_f=$this->db->query("SELECT *FROM `user` WHERE `user_email`='".$email_add."'");
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
					$up_q=$this->db->query("UPDATE `user` SET `user_password`='".$pass."' where `user_email`='".$email_add."'");
					if($up_q)
					{
						return $password;
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
			return false;
		}
	}
}
?>