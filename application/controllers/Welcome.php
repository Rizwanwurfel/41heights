<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->model('admin/Deals_model');
		$this->load->model('admin/Slider_model');
               
        $data['slides_web1']=$this->Slider_model->slides_web1();
		$data['deals']=$this->Deals_model->all_deals();
		$this->load->view('web/home_page',$data);
	}
	public function dashboard_load()
	{
		$this->load->model('admin/Product_model');
		$this->load->model('admin/Order_model');
		$data['latest_products']=$this->Product_model->latest_products();
		$data['all_orders']=$this->Order_model->all_orders();
		$this->load->view('admin/dashboard',$data);
	}
		////////////////////
public function test()
{
	$this->load->view('services');
}
public function test_order()
{
	$this->load->view('test_order');
}
	public function signout()
	{
		//$this->session->sess_destroy();
		$this->session->unset_userdata('user_logged_in_emb');
		$this->session->unset_userdata('user_email_emb');
		redirect(site_url('Admin'));
	}
/*public function check_query()
{
	$this->benchmark->mark('code_start');
	$emails=$this->db->query("select *from `emails`");
	$count=1;
	foreach($emails->result_array() as $emails)
	{
		echo $count."=>".$emails['user_email']."<br/>";
		$count++;
	}
	$this->benchmark->mark('code_end');
	echo $this->benchmark->elapsed_time('code_start', 'code_end');
}
public function check_query2()
{
	$this->benchmark->mark('code_start');
	$emails=$this->db->query("select *from `emails` LIMIT 5");
	$count=1;
	foreach($emails->result_array() as $emails)
	{
		echo $count."=>".$emails['user_email']."<br/>";
		$count++;
	}
	$this->benchmark->mark('code_end');
	echo $this->benchmark->elapsed_time('code_start', 'code_end');
}*/
	
}
