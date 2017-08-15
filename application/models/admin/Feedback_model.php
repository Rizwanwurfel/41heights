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
class  Feedback_model extends CI_Model
{
	////////////////////////////feedbacks against particular order from android//////////////
	public function android_feebacks()
	{
		$feed=$this->db->query("select feedback.*,order.user_name,order.user_phone from `feedback` LEFT JOIN `order` ON feedback.order_id=order.order_id order by order_id desc");
		if($feed->num_rows()>0)
		{
			return $feed;
		}
		else
		{
			return false;
		}
	}
	///////////////deleting feedback from admin portal//////////
	public function delete_feedback($id)
	{
		$del=$this->db->query("delete from `feedback` where `fb_id`='".$id."'");
		if($del)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}