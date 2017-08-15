<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_setting extends CI_Controller {

//////////////////////function to show home video page////////////////
	public function index()
	{
		$this->load->model('Home_setting_model');
		$data['video']=$this->Home_setting_model->home_video();
		$data['sp_deals']=$this->Home_setting_model->all_special_deals();
		$this->load->view('home_video',$data);
	}
	/////////////////////edit video data display//////////
	public function edit_video($id)
	{
		
		$this->load->model('Logo_model');
		$data['video']=$this->Logo_model->edit_video($id);
		$this->load->view('edit_video',$data);
	}
	///////////////////////////////function for update video///////////////////
	public function update_video()
	{
		$this->load->model('Logo_model');
		$res=$this->Logo_model->update_video();
			if($res)
			{
				$this->session->set_userdata('success','Successfully updated!if you dont see the change press ctrl+f5');
				redirect(site_url('Home_setting'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to update! Try Again');
				redirect(site_url('Home_setting'));
			
			}
	}
	////////////////////////
	public function update_special_deal()
	{
		//var_dump($this->input->post());
		//exit;
		$this->load->model('Home_setting_model');
		$res=$this->Home_setting_model->update_special_deal();
		if($res)
		{
				$this->session->set_userdata('success','Successfully updated!if you dont see the change press ctrl+f5');
				redirect(site_url('Home_setting'));
		}
		else
		{
				$this->session->set_userdata('failure','Failed to update! Try Again');
				redirect(site_url('Home_setting'));
		}
	}
	////////////////////////
	public function update_banner()
	{
		//var_dump($this->input->post());
		//exit;
		$this->load->model('Home_setting_model');
		$res=$this->Home_setting_model->update_banner();
		if($res)
		{
				$this->session->set_userdata('success','Successfully updated!if you dont see the change press ctrl+f5');
				redirect(site_url('Home_setting'));
		}
		else
		{
				$this->session->set_userdata('failure','Failed to update! Try Again');
				redirect(site_url('Home_setting'));
		}
	}
	/////////////////////
	public function banner_counter()
	{
		$a=$this->input->post('type');
		$date="";
		$get=$this->db->query("select h_m_date from home_banner where h_m_id='1'")->row();
		if($get)
		{
			$dt=explode('-',$get->h_m_date);
			$date="$dt[0],$dt[1],$dt[2]";
		}
		echo json_encode($date);
	}
	/////////////////////////////////
		public function update_menu_image()
	{
		//var_dump($this->input->post());
		//exit;
		$this->load->model('Home_setting_model');
		$res=$this->Home_setting_model->update_menu_image();
		if($res)
		{
				$this->session->set_userdata('success','Successfully updated!if you dont see the change press ctrl+f5');
				redirect(site_url('Home_setting'));
		}
		else
		{
				$this->session->set_userdata('failure','Failed to update! Try Again');
				redirect(site_url('Home_setting'));
		}
	}
}