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
class  Coupon_model extends CI_Model
{
	//////////////////////all deals//////////////////
	public function all_coupons()
	{
		$all_cop=$this->db->get("coupon");
		if($all_cop->num_rows()>0)
		{
			return $all_cop;
		}
		else
		{
			return false;
		}
		
	}
	////////////////////
	public function add_coupon()
	{
		
		
		$res=$this->db->query("select cop_code from `coupon` where `cop_code`='".$this->input->post('cop_code')."'");
		if($res->num_rows()>0){
			$this->session->set_userdata('failure',"coupon code exists already!");
				return false;
				
			}
			else
			{
				$insert=$this->db->insert('coupon',array('cop_code'=>$this->input->post('cop_code'),'cop_discount'=>$this->input->post('code_discount')));

				if($insert)
				{
				$this->session->set_userdata('success',"Added Sucessfully");
					return true;
				}
				else
				{
				$this->session->set_userdata('failure',"Failed to add!");
				return false;
				}
			}
	}
	//////////////////enable /disable coupon
	public function toggle_coupon($id,$status)
	{
		$update=$this->db->query("update `coupon` set `cop_valid`='".$status."' where `cop_id`='".$id."'");
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	//////////////
	public function delete_coupon($id)
	{
			$update=$this->db->query("Delete from  `coupon`  where `cop_id`='".$id."'");
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}