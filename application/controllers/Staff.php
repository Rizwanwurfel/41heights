<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

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
			$this->load->model('admin/Staff_model');
			$data['all_staff']=$this->Staff_model->view_all_staff();
			$this->load->view('admin/all_staff',$data);
	}
	
	////////////////////function for loading page of add staff///////////////////
	public function add_staff_page()
	{
		$this->load->model('admin/Staff_model');
		$data['staff_role']=$this->Staff_model->show_roles();
		$this->load->view('admin/add_staff',$data);
	}
	
	//////////////////////function for adding staff///////////////////////////////
	
	public function add_staff()
	{
		 $this->load->library('form_validation');
        $this->form_validation->set_rules('staff_name', 'Name', 'trim|required|min_length[5]|max_length[100]|is_unique[user.user_name]',array('is_unique' => 'This %s already exists.'));
        $this->form_validation->set_rules('staff_email', 'email', 'trim|required|valid_email|is_unique[user.user_email]',array('is_unique' => 'This %s already exists.')); 
        $this->form_validation->set_rules('staff_pass','Password','required|min_length[6]|max_length[20]',array('max_length' => '%s must have atleast 6 and max 20.'));
        $this->form_validation->set_rules('staff_cpass', 'Confirm Password', 'required|matches[staff_pass]', array('matches' => 'Password Mismatched.'));
        $this->form_validation->set_error_delimiters('<span class="error" style="color: white;">', '</span>');
		 if($this->form_validation->run() == false )
        {
			
            $this->session->set_userdata('failure',validation_errors());
            redirect(site_url('Staff/add_staff_page'));

        }
		else
		{
			$this->load->model('admin/Staff_model');
			$res=$this->Staff_model->add_staff();
			if($res)
			{
				$this->session->set_userdata('success','Successfully added staff!');
				redirect(site_url('Staff/add_staff_page'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to add staff! Try Again');
				redirect(site_url('Staff/add_staff_page'));
			}
		}
	}
	
	//////////////////function for deleting staff///////////////////////////////
	public function delete_staff($id)
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
			$this->load->model('admin/Staff_model');
			$res=$this->Staff_model->delete_staff($id);
			if($res)
			{
				$this->session->set_userdata('success','Successfully deleted staff!');
				redirect(site_url('Staff'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to deleted staff! Try Again');
				redirect(site_url('Staff'));
			}
	}
	
}