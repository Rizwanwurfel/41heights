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
class  Menu_model extends CI_Model
{
	public function all_deals_cats()
	{
		$deals=$this->db->query("select distinct(deals.cat_id),categories.cat_name,categories.cat_icon from `deals` INNER JOIN categories ON  deals.cat_id=categories.cat_id where deals.deal_deleted='0'");
		if($deals->num_rows()>0)
		{
			return $deals;
		}
		else
		{
			return false;
		}
	}
	public function deal_detail($id)
	{
		$deals=$this->db->query("select * from `deals`  where deals.deal_id='".$id."' AND deals.deal_deleted='0'");
		if($deals->num_rows()>0)
		{
			return $deals;
		}
		else
		{
			return false;
		}
	}
}