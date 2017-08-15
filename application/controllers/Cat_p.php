<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cat_p extends CI_Controller {

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
	 
	 //////////////////////////////view all categories/////////////////////
	public function index()
	{
			$this->load->model('admin/Catp_model');
			$data['all_cat']=$this->Catp_model->all_categories();
			$this->load->view('admin/all_main_cat',$data);
	}
	/////////////////////add cat page//////////////////////////////////
	public function cat_add_page()
	{
		$this->load->view('admin/add_main_cat');
	}
		/////////////////////////function for adding main category////////////////////////////
	public function add_main_cat()
	{
			$this->load->model('admin/Catp_model');
			$res=$this->Catp_model->add_main_cat();
			if($res)
			{
				$this->session->set_userdata('success','Successfully added Category!');
				redirect(site_url('Cat_p/cat_add_page'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to add Category! Try Again');
				redirect(site_url('Cat_p/cat_add_page'));
			
			}
	}
	/////////////////////////////function for edit category///////////////////////////////////////
	
	public function edit_cat_display($id)
	{
			$this->load->view('admin/include/session_check');
			$this->load->model('admin/Catp_model');
			$res['cat_detail']=$this->Catp_model->edit_cat_display($id);
			$this->load->view('admin/edit_main_cat',$res);
			//var_dump($res['cat_detail']->result_array());
	}
	/////////////////////////
	////////////////////////function for update category////////////////////////////////////////////
	
	public function update_category()
	{
			$this->load->view('admin/include/session_check');
			$this->load->model('admin/Catp_model');
			$res=$this->Catp_model->update_category();
				if($res)
				{
				$this->session->set_userdata('success','Successfully updated category!');
				redirect(site_url('Cat_p'));
				}
				else
				{
					$this->session->set_userdata('failure','Failed to update category! Try Again');
					redirect(site_url('Cat_p'));
				}
			
	}
	/////////////////////////////////////public function for deleting main category//////////////////////////////
	public function delete_cat($id)
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
			$this->load->model('admin/Catp_model');
			$res=$this->Catp_model->delete_cat($id);
			if($res)
				{
				$this->session->set_userdata('success','Successfully deleted category!');
				redirect(site_url('Cat_p'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to delete category! Try Again');
				redirect(site_url('Cat_p'));
			}
	}
}