<?php
defined('BASEPATH') OR exit('No direct script access allowed');
////////////////for admin portal  product management controller
class Coupon extends CI_Controller {

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
	 function __construct() {
        parent::__construct();
       $this->load->view('admin/include/session_check');
        
    }
	 //////////////////////////////view all categories/////////////////////
	public function index()
	{
			$this->load->model('admin/Coupon_model');
			
			$data['all_coup']=$this->Coupon_model->all_coupons();
			
			$this->load->view('admin/all_coupons',$data);
	}
	////////////////////
	public function add_coupon()
	{
			$this->load->model('admin/Coupon_model');
			
			$res=$this->Coupon_model->add_coupon();
			
			//$this->session->set_userdata('success',"Added Sucessfully");
				redirect(site_url('Coupon'));
			
	}
	//////////////////enable /disable coupon
	public function toggle_coupon($id,$status)
	{
		$this->load->model('admin/Coupon_model');
			
			$res=$this->Coupon_model->toggle_coupon($id,$status);
			if($res)
			{
				$this->session->set_userdata('success',"status changed");
				redirect(site_url('Coupon'));
			}
			else
			{
				$this->session->set_userdata('failure',"Failed to change");
				redirect(site_url('Coupon'));
			}
	}
	//////////////
	public function delete_coupon($id)
	{
		$this->load->model('admin/Coupon_model');
			
			$res=$this->Coupon_model->delete_coupon($id);
			if($res)
			{
				$this->session->set_userdata('success',"Deleted");
				redirect(site_url('Coupon'));
			}
			else
			{
				$this->session->set_userdata('failure',"Failed to Delete");
				redirect(site_url('Coupon'));
			}
	}
}