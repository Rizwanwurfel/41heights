<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->load->view('admin/admin_signin');
	}
	
	
	
	
	//////////////////////////function for loading page of forgot password/////////////
	
	public function user_forgot_password()
	{
		$this->load->view('admin/user_forgot_pass');
	}
	/////////////////////////function for Admin login //////////////////////////////////////
	
	public function user_login()
	{
		
		$this->load->model('admin/Admin_register_model');
		$res=$this->Admin_register_model->user_login();
		if($res)
		{
			////////////get user_role_name///////////
			//$this->user_register_model->user_role_name();
			redirect(site_url('Welcome/dashboard_load'));
			
		}
		else
		{
			$this->session->set_userdata('failure','Invalid Credentials!');
			redirect(site_url('Admin'));
		}
		
		
	}
	
	/////////////////////////function for user registeration/////////////////////////////////
	
	public function user_registration()
	{
		
		////////////////////////////check validation/////////////////
		 $this->load->library('form_validation');
        $this->form_validation->set_rules('user_name', 'Name', 'trim|required|min_length[5]|max_length[100]|is_unique[user.user_name]',array('is_unique' => 'This %s already exists.'));
        $this->form_validation->set_rules('user_email', 'email', 'trim|required|valid_email|is_unique[user.user_email]',array('is_unique' => 'This %s already exists.')); 
        $this->form_validation->set_rules('user_pass','Password','required|min_length[6]|max_length[20]',array('max_length' => '%s must have atleast 6 and max 20.'));
        $this->form_validation->set_rules('user_conpass', 'Confirm Password', 'required|matches[user_pass]', array('matches' => 'Password Mismatched.'));
        $this->form_validation->set_error_delimiters('<span class="error" style="color: red;">', '</span>');
		 if($this->form_validation->run() == false )
        {
			$this->session->set_userdata('failure_email',$this->input->post('user_email'));
			$this->session->set_userdata('failure_name',$this->input->post('user_name'));
			
            $this->session->set_userdata('failure',validation_errors());
            redirect(site_url('User/user_register'));

        }
		else
		{
			$this->load->model('user/User_register_model');
			$res=$this->User_register_model->user_registration();
			if($res)
			{
				//$this->session->set_userdata('success','Successfully created account');
				redirect(site_url('User/account_pending_page'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to register');
				redirect(site_url('User/user_register'));
			}
		}
	}
	
	//////////////////////////////////////function for admin forgot pasword////////////////////////////////
	
	public function admin_forgot_password()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('forgot_email', 'email', 'required|valid_email');
		
			if ($this->form_validation->run() == FALSE)
			{
				redirect(site_url('User/user_forgot_password'));
			}
			else
			{
				$this->load->model('user/User_register_model');
				$res=$this->User_register_model->admin_forgot_password();
				if($res)
				{
					
///////////////////////email sending///////////////////////////
									     ///////////////////////////////////////////////////////
                   $to =$this->input->post('forgot_email');
					$subject = '41 Heights Password Reset';
					$from = 'bilal.wurfel@gmail.com';
					 
					// To send HTML mail, the Content-type header must be set
					$headers  = 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					// $from="sales@yeswecan.pk";
					// Create email headers
					$headers .= 'From: '.$from."\r\n".
						'Reply-To: '.$from."\r\n" .
						'X-Mailer: PHP/' . phpversion();
					 
					// Compose a simple HTML email message
					$message = '<html><body style="padding:2%"><center>';
					$message .= '<h1 style="color:#f40;">Password Reset Info</h1>';
					$message .= '<p style="font-size:15px;">YouR Password Changed for admin panel!</p>';
					$message .= '<h2 style="color:green">'.$res.'</h2>';
					$message .= '<p style="font-size:15px;">Have a wonderful day!</p>';
					$message .= '<h3 style="">Embroider Fabrics Support!</h3><br/>';
					$message .= '</center></body></html>';
					 
					// Sending email
					mail($to, $subject, $message, $headers);
///////////////////////////////////////////////////////					
                   $this->session->set_userdata('info_passreset','Pass sent To Your Email');
					redirect(site_url('User/user_forgot_password'));
					
				}
				else
				{
					$this->session->set_userdata('info_passreset','This Email Not registered !');
					redirect(site_url('User/user_forgot_password'));
				}
			}
		
	}
}
