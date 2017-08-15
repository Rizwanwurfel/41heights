<?php
class Subscription_model extends CI_Model
{
	public function add_email($data)
	{
		$result=$this->db->insert('subscribe',$data);
		if($result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}