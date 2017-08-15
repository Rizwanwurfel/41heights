<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

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
		$this->load->model('Team_model');
		$data['all_team']=$this->Team_model->all_team();
		$this->load->view('all_team',$data);
	}
		/////////////////////edit team member data display//////////
	public function edit_display($id)
	{
		
		$this->load->model('Team_model');
		$data['team']=$this->Team_model->edit_display($id);
		$this->load->view('edit_team',$data);
	}
	///////////////////////////////function for update team member///////////////////
	public function update_team()
	{
		$this->load->model('Team_model');
		$res=$this->Team_model->update_team();
			if($res)
			{
				$this->session->set_userdata('success','Successfully updated!');
				redirect(site_url('Team'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to update! Try Again');
				redirect(site_url('Team'));
			
			}
	}

}