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
class  Food_dish_model extends CI_Model
{
	public function all_dishes()
	{
		return false;
	}
	
	////////////////function for showing all menu categories//////////////////
	public function all_categories()
	{
		$cat=$this->db->query("SELECT *FROM `food_category` WHERE `f_cat_deleted`='0' AND `rest_id`='".$this->session->userdata('user_rest_uns')."'");
		if($cat->num_rows()>0)
		{
			return $cat;
		}
		else
		{
			return false;
		}
	}
	
	////////////////////////function for showing food attributes at product add page/////////////////////////////////////////
	public function food_attributes()
	{
		//$all_att=$this->db->get_where('food_attribute',array("rest_id"=>$this->session->userdata('user_rest_uns')));
		$all_att=$this->db->query("SELECT *FROM  `food_attribute` WHERE   EXISTS (SELECT 1 FROM   `food_assign_attribute` WHERE  food_assign_attribute.f_att_id = food_attribute.f_att_id AND food_assign_attribute.f_ass_att_del=0)");
		if($all_att)
		{
			return $all_att;
		}
		else
		{
			return false;
		}
	}
	
	
}