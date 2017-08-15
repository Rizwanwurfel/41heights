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
class  Ambassador_model extends CI_Model
{
public function toggle_ambassador($u_id)
	{
		$update=$this->db->query("DELETE FROM ambassador WHERE amb_id='".$u_id."'");
		if($update)
		{
			$this->session->set_userdata('success', 'successfully done!');
			//redirect(site_url('Ambassador/all_ambassadors'));
			return true;
			
		}
		else
		{
			$this->session->set_userdata('failure', 'failed to delete!');
			return false; 
		}
	}
}///