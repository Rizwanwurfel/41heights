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
class  Location_model extends CI_Model
{
	public function all_locations()
	{
		$all=$this->db->query("select *from delivery_locations");
		if($all->num_rows()>0)
		{
			return $all;
		}
		else
		{
			return false;
		}
	}
	////////////////
	public function delete_loc($id)
	{
		$del=$this->db->query("delete from delivery_locations where loc_id='".$id."'");
		if($del)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	////////
	///////////////////////
	  public function add_location()
	  {
		$loc_name=$this->input->post('loc_name');
		$loc_charges=0;
		$min_order=0;
		if($this->input->post('loc_charges'))
		{
			$loc_charges=$this->input->post('loc_charges');
		}
		if($this->input->post('loc_min_order'))
		{
			$min_order=$this->input->post('loc_min_order');
		}
		
		$del_n=array(
			'loc_name'=>$loc_name,
			'loc_charges'=>$loc_charges,
			'min_order'=>$min_order
		);
		$insert=$this->db->insert('delivery_locations',$del_n);
		if($insert)
		{
			return true;
		}
		else
		{
			return false;
		}
	  }
	  ////////////////////
	  public function update_discount()
	  {
		$id=$this->input->post('dis_id');
		$dis=$this->input->post('dis_amount');
		$up=$this->db->query("update discount set discount='".$dis."' where `dis_id`='".$id."'");
		if($up)
		{
			return true;
		}
		else
		{
			return false;
		}
	  }
}