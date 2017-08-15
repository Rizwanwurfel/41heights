<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Location extends CI_Controller 
{
	  function __construct()
      {
        parent::__construct();        
      }
	  
	  //////////////////
	  public function all_locations()
	  {
		
		$this->load->model('admin/Location_model');
		$data['locs']=$this->Location_model->all_locations();
		$this->load->view('admin/all_locations',$data);
	  }
	  ////////////
	  public function delete_loc($id)
	  {
		$this->load->view('admin/include/session_check.php');
		$this->load->model('admin/Location_model');
		$res=$this->Location_model->delete_loc($id);
		if($res)
		{
			$this->session->set_userdata("success","Successfully deleted");
			redirect(site_url('Location/all_locations'));
		}
		else
		{
			$this->session->set_userdata("failure","Failed To add! Try Again");
			redirect(site_url('Location/all_locations'));
		}
	  }
	  ///////////////////////
	  public function add_location()
	  {
		
		$this->load->model('admin/Location_model');
		$res=$this->Location_model->add_location();
		if($res)
		{
			$this->session->set_userdata("success","Successfully added");
			redirect(site_url('Location/all_locations'));
		}
		else
		{
			$this->session->set_userdata("failure","Failed To add! Try Again");
			redirect(site_url('Location/all_locations'));
		}
	  }
}