<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Contact extends CI_Controller{



	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('web/Subscription_model');
		$this->load->library('form_validation');

	}


	public function index()
	{
		$this->load->view('web/contact');
	}

	public function contact_us()
	{
				$to_admin ="41heightspizza@gmail.com";
				$subjects = $this->input->post('subject');
				$from = $this->input->post('email');


				// To send HTML mail, the Content-type header must be set
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

				$headers .= 'From: '.$from."\r\n".
					'Reply-To: '.$from."\r\n" .
					'X-Mailer: PHP/' . phpversion();

				// Compose a simple HTML email message
				////////////////////////////////////////////////////
					$messagen = '<html><body style="">';
					$messagen .= '<div class="row" style="background:#f6f6f6;padding:2%">';
					$messagen .='<h2 style="text-align:center">customer sent message for 41heightspizza</h2>';
					$messagen .='<p style="text-align:justify"><strong>Email: </strong>'.$this->input->post('email').'</p>';
					$messagen .='<p style="text-align:justify"><strong>Message: </strong>'.$this->input->post('message').'</p>';

										////////////////////////////////

								$messagen.= '</div>';
					$messagen.= '</body></html>';
				////////////////////////////////////////////////////


				// Sending email
				if(mail($to_admin, $subjects, $messagen, $headers))
					{
						
						echo "Mail Sent Successfully";
						$this->session->set_userdata('success','Your Messsage sent successfully');
						redirect(site_url('Contact'));
						//return true; 
					}
					else
					{
						echo "Mail Not Sent";
						$this->session->set_userdata('failure','Unable to send email ! Try again');
						redirect(site_url('Contact'));
						//return false;
					}

	}
      /////////funtion for subscription/////////////////////
	public function subscribe()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[subscribe.email]');
		if ($this->form_validation->run()==FALSE)
		{
			echo "<p><font color=red><h5>". validation_errors()."</h5></font></p>";


			//redirect(site_url('Welcome'));
		}
		else
		{
			$data=array
			(
				'email'=>$this->input->post('email')
				);

			$result= $this->Subscription_model->add_email($data);
			if($result)
			{
				echo "<p> <center><font color=white><h5>You have subscribed successfully!</h5></font></center></p>";

				$to_admin ="sheikh.wurfel@gmail.com";
				$subjects = '41heightspizza';
				$from = $this->input->post('email');


				// To send HTML mail, the Content-type header must be set
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

				$headers .= 'From: '.$from."\r\n".
					'Reply-To: '.$from."\r\n" .
					'X-Mailer: PHP/' . phpversion();

				// Compose a simple HTML email message
				////////////////////////////////////////////////////
					$messagen = '<html><body style="">';
					$messagen .= '<div class="row" style="background:#f6f6f6;padding:2%">';
					$messagen .='<h2 style="text-align:center">customer sent message for 41heightspizza</h2>';
					$messagen .='<p style="text-align:justify"><strong>Email: </strong>'.$this->input->post('email').'</p>';
					

										////////////////////////////////

								$messagen.= '</div>';
					$messagen.= '</body></html>';
				////////////////////////////////////////////////////


				// Sending email
				if(mail($to_admin, $subjects, $messagen, $headers))
					{
						
						echo "Mail Sent Successfully";
						
					}
					else
					{
						echo "Mail Not Sent";
					
					}
			}
			else
			{
				echo "failed";
			}

			
		}
	}
}