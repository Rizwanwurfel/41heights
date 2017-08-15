<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('admin/Profile_model');
		$data['data']=$this->Profile_model->full_profile_display();
		$this->load->view('admin/user_profile',$data);
	}
	///////////////////update password//////////////////
	
	public function update_password()
	{
		$this->load->model('admin/Profile_model');
		$up_pass=$this->Profile_model->update_password();
			if($up_pass=="updated")
				{
					
					echo "<span style='color:green;opacity:1;height:20px'><span class='glyphicon glyphicon-ok-circle' style='color:green'></span>pass word updated successfully</span>";
				}
				if($up_pass=="update failed")
				{
					
					echo "<span style='color:red;opacity:1;height:20px'><span class='glyphicon glyphicon-remove' style='color:red'></span>updation failed sorry try again</span>";
				}
				if($up_pass=="old password not correct")
				{
					echo "<span style='color:red;height:20px'><span class='glyphicon glyphicon-remove' style='color:red'></span>old password not correct</span>";
					
				}
	}
	
	/////////////////////////////////update profile////////////////////////////////
	public function update_profile()
	{
		$this->load->model('admin/Profile_model');
		$up_profile=$this->Profile_model->update_profile();
			if($up_profile)
			{
				echo "<span style='color:green;font-size:20px'><span class='glyphicon glyphicon-ok-circle' style='color:green'></span>Profile  updated successfully</span>";
			}
			else
			{
			echo "<span style='color:red'>updation failed</span>";
			}
	}
	
	////////////////////////////////funtion for update profile image///////////////////////////
	
	public function update_profile_image()
	{
		$this->load->model('admin/Profile_model');
		$res=$this->Profile_model->update_profile_image();
		if($res)
		{
			$this->session->set_userdata('success','image changed successfully');
			redirect(site_url('Profile'));
		}
		else
		{
			$this->session->set_userdata('failure','Failed to update image');
			redirect(site_url('Profile'));
		}
	}
	
	
}
