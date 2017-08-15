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
class  Discount_model extends CI_Model
{
	  public function update_discount()
	  {
		$id=$this->input->post('dis_id');
		$dis=$this->input->post('dis_amount');
		$amb_dis=$this->input->post('amb_dis');
		$amb_product_points=$this->input->post('amb_product_points');
		$amb_deal_points=$this->input->post('amb_deal_points');
		$up=$this->db->query("update discount set `discount`='".$dis."',`ref_discount`='".$amb_dis."',`ref_points_products`='".$amb_product_points."',`ref_points_deals`='".$amb_deal_points."' where `dis_id`='".$id."'");
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