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
class  Timing_model extends CI_Model
{
	public function update_rest_timing()
	{
		$open=$this->input->post('op_hr').":".$this->input->post('op_min').":".$this->input->post('op_sec');
		$close=$this->input->post('cl_hr').":".$this->input->post('cl_min').":".$this->input->post('cl_sec');
		$rest_st=$this->input->post('emergency_status');
		//echo $open."<br/>";
		//echo $close;
		$insert=array(
			'opening_time'=>$open,
			'closing_time'=>$close,
			'emergency_status'=>$rest_st,
		
		);
		$in=$this->db->update('rest_timing',$insert);
		if($in)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}