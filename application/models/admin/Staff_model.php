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
class  Staff_model extends CI_Model
{
	/////////////////////function for loading roles of users store in db/////////////////////
	public function show_roles()
	{
		$roles=$this->db->query("SELECT *FROM `user_role` WHERE `user_role_name` NOT IN ('super_admin')");
		if($roles->num_rows()>0)
		{
			return $roles;
		}
		else
		{
			return false;
		}
	}
	///////////////////////////function for adding staff//////////////////////////////////////////////
	
	public function add_staff()
	{
		$email=$this->input->post('staff_email');
		$name=$this->input->post('staff_name');
		$password=$this->input->post('staff_pass');
		$role=$this->input->post('staff_role');
		$check_email=$this->db->query("SELECT *FROM `user` where `user_email`='".$email."'");
		if($check_email->num_rows()>0)
		{
			return false;
		}
		else
		{
			$insert=array(
				'user_name'=>$name,
				'user_email'=>$email,
				'user_password'=>md5($password),
				'user_role'=>$role,
				'user_verified'=>'1',
			);
			$data_insert=$this->db->insert('user',$insert);
			if($data_insert)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	}
	/////////////////////////////function for view all staff of particular restaurant////////////////////////////////
	public function view_all_staff()
	{
		$staff=$this->db->query("SELECT *FROM `user` INNER JOIN `user_role` ON user.user_role=user_role.user_role_id WHERE `user_deleted`='0'");
		if($staff->num_rows()>0)
		{
			return $staff;
		}
		else
		{
			return false;
		}
	}
	
	
	////////////////////function for deleting staff//////////////////////////////////////////////
	public function delete_staff($id)
	{
		
		$delete=$this->db->query("delete from  `user`  WHERE `user_id`='".$id."'");
		if($delete)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}