<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Discount extends CI_Controller {

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
	 
	 	public function update_discount()
	{
		$this->load->model('admin/Discount_model');
		$res=$this->Discount_model->update_discount();
			if($res)
			{
				$this->session->set_userdata("success","Successfully updated");
				redirect(site_url("Welcome/dashboard_load"));
			}
			else
			{
				$this->session->set_userdata("failure","Failed To update! Try Again");
				redirect(site_url("Welcome/dashboard_load"));
				
			}
	}
	 
	 }