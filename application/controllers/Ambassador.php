<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
///for website checkout and cart controller
class Ambassador extends CI_Controller
{
	public function index()
	{
		$this->load->view('web/ambassador_reg.php');
	}
	//////////////showing deals in website for ambassador////////////////////////////////
	public function deals()
	{
	if($this->session->userdata('ambs_id')) { 
		$this->load->model('web/Ambassador_model');
		$data['all_deals']=$this->Ambassador_model->deals();
		$this->load->view('web/ambassador_deals',$data);
		}
		else
		{
			redirect(site_url());
		}
	}


	public function toggle_ambassador($u_id)
	{
		////echo $u_id;
		//exit;
		$this->load->view('admin/include/session_check.php');
				$this->load->model('admin/Ambassador_model');
			$this->Ambassador_model->toggle_ambassador($u_id);
			redirect(site_url('Ambassador/all_ambassadors'));
			

}
	///////////////////////function for showing all ambassadors records to admin///////////////////
	public function all_ambassadors()
	{
		$this->load->model('web/Ambassador_model');
		$data['all_amb']=$this->Ambassador_model->all_ambassadors();
		$this->load->view('admin/all_ambassadors',$data);
	}
	//////////////////function for loading ambassador profile page///////////////
	public function ambassador_profile()
	{
		if($this->session->userdata('ambs_id'))
			{
			$this->load->model('web/Ambassador_model');
			$data['amb_data']=$this->Ambassador_model->ambassador_profile();
			$this->load->view('web/ambassador_profile',$data);
			}
			else
			{
				redirect(site_url('Ambassador'));
			}
	}
	////////////////function for signingup the ambassador/////////////
	public function signup()
	{
				$form_data = $this->input->post();
				$this->form_validation->set_rules('name','Name','trim|required|min_length[3]',array('required' => 'You must provide a %s.'));
				$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[ambassador.amb_email]',array('is_unique'=>'This %s already registered','required' => 'You must provide a %s.','valid_email'=>'invalid email'));
				$this->form_validation->set_rules('phone_number','phone','trim|required|is_unique[ambassador.amb_phone]|min_length[5]',array('is_unique'=>'This %s already registered','required' => 'You must provide a %s.'));
				$this->form_validation->set_rules('password','password','trim|required|min_length[5]',array('required' => 'You must provide a %s.'));
				$this->form_validation->set_rules('hostelite','hostelite','trim|required',array('required' => 'You must provide a %s.'));
				$this->form_validation->set_rules('address','address','trim|required|min_length[5]',array('required' => 'You must provide a %s.'));
				$this->form_validation->set_rules('institute_office','office/inst name','trim|required|min_length[5]',array('required' => 'You must provide a %s.'));
				$this->form_validation->set_rules('con_password', 'confirm Password', 'required|matches[password]');
				if($this->form_validation->run()==FALSE)
				{
								$this->session->set_userdata('errors', validation_errors());
								//redirect(site_url('Ambassador
								$this->load->view('web/ambassador_reg.php',$form_data);
								
				}
				else
				{
						$this->load->model('web/Ambassador_model');
						$res=$this->Ambassador_model->signup();
						if($res=="success")
						{
							$this->session->set_userdata('success', 'Signed up successfully! After Admin approval you will be grant access');
							redirect(site_url('Ambassador'));
							//return true;
						}
						else if($res=="invalid_reference")
						{
							$this->session->set_userdata('failure', '<h5 style="color:red">Invalid reference!</h5>');
							//redirect(site_url('Ambassador'));
							$this->load->view('web/ambassador_reg.php',$form_data);
						}
						else
						{
							$this->session->set_userdata('failure', '<h5 style="color:red">Failed to register! Try again</h5>');
							redirect(site_url('Ambassador'));
							//return false;
						}
				}
	}
	
	////////////////function for signin the ambassador/////////////
	public function signin()
	{
				//$form_data = $this->input->post();
				$this->form_validation->set_rules('email','Email','trim|required|valid_email',array('required' => 'You must provide a %s.','valid_email'=>'invalid email'));
				$this->form_validation->set_rules('password','password','trim|required|min_length[5]',array('required' => 'You must provide a %s.','min_length'=>'password requirement failed'));
				if($this->form_validation->run()==FALSE)
				{
								$this->session->set_userdata('error_signin', validation_errors());
								redirect(site_url('Ambassador'));
								//$this->load->view('web/ambassador_reg.php',$form_data);
								
				}
				else
				{
						$this->load->model('web/Ambassador_model');
						$res=$this->Ambassador_model->signin();
						if(!$res)
						{
								
								$this->session->set_userdata('error_signin', "Invalid Email!");
								redirect(site_url('Ambassador'));
						}
						else if($res->amb_email==$this->input->post('email') && $res->amb_password==md5($this->input->post('password'))  && $res->amb_approved=="0")
						{
									$this->session->set_userdata('error_signin', "Admin not approved you yet!Wait until approval");
								redirect(site_url('Ambassador'));
						}
						else if($res->amb_email==$this->input->post('email') && $res->amb_password==md5($this->input->post('password')) && $res->amb_approved=="1")
						{
								$session_amb=array(
									'ambs_id'=>$res->amb_id,
									'ambs_ref_id'=>$res->amb_ref_id,
									'ambs_email'=>$res->amb_email,
									
								);
								$this->session->set_userdata($session_amb);
								redirect('Ambassador/ambassador_profile');
						}
						else if($res->amb_email==$this->input->post('email') && $res->amb_password!=md5($this->input->post('password')))
						{
							$this->session->set_userdata('error_signin', "Invalid password");
								redirect(site_url('Ambassador'));
						}
				}
	}
	//////////////////////////////////////////////////////////function for approving and unapproving ambassador////////////////////////////////
	public function amb_approval($status,$id)
	{
		$this->load->view('admin/include/session_check');
		$this->load->model('web/Ambassador_model');
		$res=$this->Ambassador_model->amb_approval($status,$id);
		if($res)
		{
			$this->session->set_userdata("success","successfully updated!");
			redirect('Ambassador/all_ambassadors');
		}
		else
		{
			$this->session->set_userdata("failure","Failed! TRy again");
			redirect('Ambassador/all_ambassadors');
		}
	}
	///////////////////////public function for complete detail of ambassador////////////
	
	
	public function amb_complete_detail($id)
	{
		$this->load->view('admin/include/session_check');
		$this->load->model('web/Ambassador_model');
		$data['amb']=$this->Ambassador_model->amb_complete_detail($id);
		$this->load->view('admin/ambassador_full_detail',$data);
		
	}
	///////////////////forgot pass ambassador////////////
	
	public function forgot_pass()
	{
		$email=$this->input->post('f_email');
		
				$this->form_validation->set_rules('f_email','Email','trim|required|valid_email',array('required' => 'You must provide a %s.','valid_email'=>'invalid email'));
				if($this->form_validation->run()==FALSE)
				{
								$th=validation_errors();
								echo $th;
								
				}
				else
				{
					$this->load->model('web/Ambassador_model');
					$res=$this->Ambassador_model->forgot_pass();
					if($res=="sent")
					{
					
///////////////////////////////////////////////////////	
					echo "password sent to your email";
					}
					else if($res=="email_not_reg")
					{
						echo "Email not registered";
					}
					else
					{
						echo "Failed Unknown reason! contact support";
					}
				
				}
		
	}
	
	
	///////////////////////function for update ambassador profile////////////////
	public function update_profile()
	{
		/*var_dump($this->input->post());
		var_dump($_FILES);
		exit;*/
		
				$this->form_validation->set_rules('name','Name','trim|required|min_length[3]',array('required' => 'You must provide a %s.'));
				$this->form_validation->set_rules('phone','phone','trim|required|min_length[5]',array('required' => 'You must provide a %s.'));
				$this->form_validation->set_rules('hostelite','hostelite','trim|required',array('required' => 'You must provide a %s.'));
				$this->form_validation->set_rules('address','address','trim|required|min_length[5]',array('required' => 'You must provide a %s.'));
				$this->form_validation->set_rules('office','office/inst name','trim|required|min_length[5]',array('required' => 'You must provide a %s.'));
				
				if($this->form_validation->run()==FALSE)
				{
								//$this->session->set_userdata('errors', validation_errors());
								echo "check validation errors";
								
				}
				else
				{
					$this->load->model('web/Ambassador_model');
					$res=$this->Ambassador_model->update_profile();
					if($res)
					{
						
					header('Content-type: application/json');
					$data= json_encode($res);
					echo $data;
					}
					else
					{
						$er="failed";
						header('Content-type: application/json');
						$data= json_encode($er);
						echo $data;
					}
				}
	}
	
	///////////////function for updating password of mbassador////////////////
	public function change_pass()
	{
				$this->form_validation->set_rules('password','password','trim|required|min_length[5]',array('required' => 'You must provide a %s.'));
				$this->form_validation->set_rules('conform_pass', 'confirm Password', 'required|matches[password]');
				if($this->form_validation->run()==FALSE)
				{
								$error=validation_errors();
								echo $error;
								exit;
								
				}
				else
				{
					$this->load->model('web/Ambassador_model');
					$res=$this->Ambassador_model->change_pass();
					if($res=="updated")
					{
						echo "Updated Successfully";
						exit;
					}
					else if($res=="old_incorrect")
					{
						echo "Old password incorrect entered!";
						exit;
					}
					else
					{
						echo "Failed to update";
						exit;
					}
				}
	}
	///////////////////function for showing page of ambassador benefits///////////////////////
	public function benefits()
	{
		$this->load->view('web/ambassador_benefits');
	}
	//////////////function for logout of ambassador////////////////////////////////
	public function amb_logout()
	{
		$this->session->unset_userdata('ambs_id');
		$this->session->unset_userdata('ambs_ref_id' );
		$this->session->unset_userdata('ambs_email');
		redirect(site_url());
		
	}
}