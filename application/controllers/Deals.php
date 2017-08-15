<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Deals extends CI_Controller
{
	public function index()
	{
		$this->load->model('admin/Deals_model');
		$data['all_pr']=$this->Deals_model->all_deals();
		$this->load->view("admin/all_deals",$data);
	}
	//////////page for adding deal /////////////////
	public function add_deal_page()
	{
		$this->load->model('admin/Catp_model');
			$this->load->model('admin/Attribute_model');
			$data['all_sub_cat']=$this->Catp_model->all_categories();
			$data['all_att_cat']=$this->Attribute_model->all_attr_cat();
		$this->load->view("admin/add_deal",$data);
	}
	//////////page for getting all deals /////////////////
	public function all_deals()
	{
		$this->load->view("admin/all_deals");
	}
	/////////////////////full detail of deal///////////////////////////
	public function full_deal_detail($id)
	{
			$this->load->model('admin/Deals_model');
			$this->load->model('admin/Catp_model');
			$this->load->model('admin/Attribute_model');
			$data['all_sub_cat']=$this->Catp_model->all_categories();
			$data['all_att_cat']=$this->Attribute_model->all_attr_cat();
			$data['pro_detail']=$this->Deals_model->full_deal_detail($id);
			$this->load->view('admin/full_deal_detail',$data);
	}
	///////////////////////function fro deleting deal//////////////
		public function delete_deal($id)
	{
		$this->load->view('admin/include/session_check');
			///////////////////////////////
				$id = strtr(
            $id,
            array(
                '.' => '+',
                '-' => '=',
                '~' => '/'
            )
        );
			$id=$this->encrypt->decode($id);
			/////////////////////////////////
			$this->load->model('admin/Deals_model');
			$res=$this->Deals_model->delete_deal($id);
			if($res)
				{
				$this->session->set_userdata('success','Successfully deleted category!');
				redirect(site_url('Deals'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to delete category! Try Again');
				redirect(site_url('Deals'));
			}
	}
	/////////////public funtion update deal//////////////
	public function update_deal()
	{
		//var_dump($this->input->post());
		//exit;
		$this->load->model('admin/Deals_model');
		$res=$this->Deals_model->update_deal();
		if($res)
				{
				$this->session->set_userdata('success','Successfully updated!');
				redirect(site_url('Deals'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to update ! Try Again');
				redirect(site_url('Deals'));
			}
	}
	/////////////public function add deal//////////////////
	public function add_deal()
	{
		$this->load->model('admin/Deals_model');
		$res=$this->Deals_model->add_deal();
		if($res)
				{
				$this->session->set_userdata('success','Successfully added!');
				redirect(site_url('Deals/add_deal_page'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to add ! Try Again');
				redirect(site_url('Deals/add_deal_page'));
			}
		//var_dump($this->input->post());
	}
}