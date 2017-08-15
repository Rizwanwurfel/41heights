<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rest_timing extends CI_Controller
{
	public function index()
	{
		$this->load->model('admin/Services_model');
		$data['timing']=$this->Services_model->rest_timing();
		$this->load->view('admin/rest_timing',$data);
	}
	public function update_rest_timing()
	{
	
		$this->load->model('admin/Timing_model');
		$res=$this->Timing_model->update_rest_timing();
			if($res)
				{
				$this->session->set_userdata('success','Successfully updated!');
				redirect(site_url('Rest_timing'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to delete update! Try Again');
				redirect(site_url('Rest_timing'));
			}
		
	}
	/////////////////function for checking restaurant timing of opening or closing////////////////
	public function check_rest_timing()
	{
									$rest=$this->db->query("select *from `rest_timing`")->row();
									$op_d= $rest->opening_time;
									$cl_d= $rest->closing_time;
									$rest_st= $rest->emergency_status;
									if(trim($rest_st)=="close")
									{
										echo "exit";
										exit;
									}
									else{
												date_default_timezone_set("Asia/Karachi");
												//$now="11:00:00";
												 $now=Date('H:i:s');
												
												if(strtotime($now)>=strtotime($cl_d) && strtotime($now)<=strtotime($op_d))
												{
													echo "rest_close";
												}
												else
												{
													echo "rest_open";
												}
										}
	}
}