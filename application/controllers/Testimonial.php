<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends CI_Controller 
{
	public function index()
	{
		$this->load->model('Testimonial_model');
		$data['all_test']=$this->Testimonial_model->all_test();
		$this->load->view('all_testimonials',$data);
	}
	/////////////////////
	public function add_page()
	{
		$this->load->view('add_testimonial');
	}
	/////
	public function add_testimonial()
	{
		$this->load->model('Testimonial_model');
			$res=$this->Testimonial_model->add_testimonial();
			if($res)
			{
				$this->session->set_userdata('success','Successfully added testimonial!');
				redirect(site_url('Testimonial/add_page'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to add ! Try Again');
				redirect(site_url('Testimonial/add_page'));
			
			}
	}
	/////////////////////////////////////////////
	/////////////////////////////////////public function for deleting main category//////////////////////////////
	public function delete_test($id)
	{
		$this->load->view('include/session_check');
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
			$this->load->model('Testimonial_model');
			$res=$this->Testimonial_model->delete_test($id);
			if($res)
				{
				$this->session->set_userdata('success','Successfully deleted !');
				redirect(site_url('Testimonial'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to delete ! Try Again');
				redirect(site_url('Testimonial'));
			}
	}
}