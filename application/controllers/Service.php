<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service extends CI_Controller
{
	//////////////////////////////service for dine in android customers to call waiter//////////////////
	public function waiter_call()
	{
		$update_call=$this->db->query("update `waiter_call` set `call_status`='1' ");
		if($update_call)
		{
				$msg="Wait Waiter is notified";
				header('Content-type: application/json');
				$data= json_encode($msg);
				echo $data;
		}
		else
		{
				$msg="Unable to call! Call Manual";
				header('Content-type: application/json');
				$data= json_encode($msg);
				echo $data;
		}
	}
	////////////////////////////////service for loading all categories ////////////////////////////
	public function all_cat()
	{
		$this->load->model('admin/Services_model');
		$data_cat['cat_detail']=$this->Services_model->show_all_categories();
	
		$this->load->view('services/all_categories',$data_cat);
	}
	///////////////////////service for display all products against particular cat id/////////////////
	public function all_products()
	{
		$id=$this->input->post('cat_id');
		$this->load->model('admin/Services_model');
		if($id==-1 || $id<0)
			{
				$data_cat['pr_detail']=$this->Services_model->all_deals();
				$this->load->view('services/all_deals',$data_cat);
				
			}
			else
			{
				$data_cat['pr_detail']=$this->Services_model->all_products($id);
				$this->load->view('services/all_products',$data_cat);
				
			}
	}
	public function all_deal($id)
	{
			$this->load->model('admin/Services_model');
			$data_cat['pr_detail']=$this->Services_model->all_deals();
			$this->load->view('services/all_deals',$data_cat);
		
	}
	/////////////ambassador deals service/////////////
	public function amb_deals()
	{
			$this->load->model('web/Ambassador_model');
			$data_cat['pr_detail']=$this->Ambassador_model->amb_deals();
			$this->load->view('services/ambassador_deals',$data_cat);
	}
	public function deal_custom()
	{
			$id=$this->input->post('deal_id');
			$this->load->model('admin/Services_model');
			$data_cat['pr_detail']=$this->Services_model->deal_custom($id);
			$this->load->view('services/deals_customization',$data_cat);
		
	}
	public function deal_custom_test($id)
	{
			$this->load->model('admin/Services_model');
			$data_cat['pr_detail']=$this->Services_model->deal_custom($id);
			$this->load->view('services/deals_customization',$data_cat);
		
	}
	///////////////////////service for display all products against particular cat id test data flow/////////////////
	public function all_products_test($id)
	{
		$this->load->model('admin/Services_model');
		$data_cat['pr_detail']=$this->Services_model->all_products_test($id);
		$this->load->view('services/all_products',$data_cat);
	}
	/////////////////////////////service for menu slider///////////////////////////
	public function slider()
	{
		$this->load->model('admin/Services_model');
		$data_cat['slider']=$this->Services_model->all_slides();
		$this->load->view('services/all_slides',$data_cat);
	}
		/////////////////////////////service for Total discount/////////////
	public function discount()
	{
		
		$this->load->model('admin/Services_model');
		$data_cat['dis']=$this->Services_model->total_discount();
		$this->load->view('services/total_discount',$data_cat);
	}
		public function all_locations()
	{
		
		$this->load->model('admin/Services_model');
		$data_cat['loc']=$this->Services_model->all_locations();
		$this->load->view('services/all_locations',$data_cat);
	}
	////////////////////service function for restaurant opening closing////////////////////////
	public function rest_timing()
	{
		$this->load->model('admin/Services_model');
		$data['timing']=$this->Services_model->rest_timing();
		$this->load->view('services/rest_timing',$data);
	}
		////////////////////////function for  storing fcm token///////////////////////////////
	public function get_fcm()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fcm_token','Token','required|is_unique[fcm_tokens.fcm_token]',array('is_unique'=>'%s already registered','required'=>'%s mendatory field'));
		if($this->form_validation->run()==FALSE)
		{
			$error="already";
			header('Content-type: application/json');
			$data= json_encode($error);
			echo $data;
		}
		else
		{
			$this->load->model('admin/Services_model');
			$res=$this->Services_model->get_fcm();
			if($res)
			{
				$error="success";
				header('Content-type: application/json');
				$data= json_encode($error);
				echo $data;
			}
			else
			{
				$error="failed";
				header('Content-type: application/json');
				$data= json_encode($error);
				echo $data;
			}
		}
	}
	/////////////////////////////////////function for storing feedback from android phone user//////////
	public function order_feedback()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fb_star','fb_star','trim|required');
		$this->form_validation->set_rules('fb_text','fb_text','trim|required');
		$this->form_validation->set_rules('fb_order_id','fb_order_id','trim|required');
		if($this->form_validation->run()==FALSE)
		{
			$error="invalid or missing parameters";
			header('Content-type: application/json');
			$data= json_encode($error);
			echo $data;
		}
		else
		{
			$this->load->model('admin/Services_model');
			$res=$this->Services_model->order_feedback();
			if($res)
			{
				$error="success";
				header('Content-type: application/json');
				$data= json_encode($error);
				echo $data;
			}
			else
			{
				$error="failed";
				header('Content-type: application/json');
				$data= json_encode($error);
				echo $data;
			}
		}
	}
	/////////////////////////////////////function for storing feedback from android tab from dine in users/customers//////////
	public function feedback_dinein()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fb_star','fb_star','trim|required');
		$this->form_validation->set_rules('fb_text','fb_text','trim|required');
		if($this->form_validation->run()==FALSE)
		{
			$error="invalid or missing fields";
			header('Content-type: application/json');
			$data= json_encode($error);
			echo $data;
		}
		else
		{
			$this->load->model('admin/Services_model');
			$res=$this->Services_model->order_feedback();
			if($res)
			{
				$error="success";
				header('Content-type: application/json');
				$data= json_encode($error);
				echo $data;
			}
			else
			{
				$error="failed";
				header('Content-type: application/json');
				$data= json_encode($error);
				echo $data;
			}
		}
	}
	///////////////////////////////////////function for ambassador signup/////////////////////////////////
	public function ambassador_signup()
	{
				$this->form_validation->set_rules('name','Name','trim|required|min_length[3]',array('required' => 'You must provide a %s.'));
				$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[ambassador.amb_email]',array('is_unique'=>'%s entered already registered','required' => 'You must provide a %s.','valid_email'=>'invalid email'));
				$this->form_validation->set_rules('phone_number','phone','trim|required|is_unique[ambassador.amb_phone]|min_length[5]',array('is_unique'=>'%s entered already registered','required' => 'You must provide a %s.'));
				$this->form_validation->set_rules('password','password','trim|required|min_length[5]',array('required' => 'You must provide a %s.'));
				$this->form_validation->set_rules('hostelite','hostelite','trim|required',array('required' => 'You must provide a %s.'));
				$this->form_validation->set_rules('address','address','trim|required|min_length[5]',array('required' => 'You must provide a %s.'));
				$this->form_validation->set_rules('institute_office','office/inst name','trim|required|min_length[5]',array('required' => 'You must provide a %s.'));
				if($this->form_validation->run()==FALSE)
				{
								//$this->session->set_userdata('errors', validation_errors());
								$error=htmlspecialchars(strip_tags(validation_errors()));
								$status=array(
									'status'=>$error,
								);
						header('Content-type: application/json');
						$data= json_encode($status);
						echo $data;
								
				}
				else
				{
					$this->load->model('web/Ambassador_model');
					$res=$this->Ambassador_model->signup();
					if($res=="success")
					{
						//$error="success";
						$status=array(
									'status'=>'success',
								);
						header('Content-type: application/json');
						$data= json_encode($status);
						echo $data;
					}
					else if($res=="invalid_reference") 
					{
						//$error="invalid reference";
						$status=array(
									'status'=>'invalid reference',
								);
						header('Content-type: application/json');
						$data= json_encode($status);
						echo $data;
					}
					else
					{
						//$error="failed";
						$status=array(
									'status'=>'failed',
								);
						header('Content-type: application/json');
						$data= json_encode($status);
						echo $data;
					}
				}
	}
	///////////////////function for ambassador sign in////////////////////////////////
	public function ambassador_signin()
	{
		$this->form_validation->set_rules('email','Email','trim|required|valid_email',array('required' => 'You must provide a %s.','valid_email'=>'invalid email'));
				$this->form_validation->set_rules('password','password','trim|required',array('required' => 'You must provide a %s.'));
				if($this->form_validation->run()==FALSE)
				{
								$error=htmlspecialchars(strip_tags(validation_errors()));
								$userdata=array(
									'status'=>'error',
									'user_data'=>$error
								);
								header('Content-type: application/json');
								$data= json_encode($userdata);
								echo $data;
								
				}
				else
				{
						$this->load->model('web/Ambassador_model');
						$res=$this->Ambassador_model->signin();
						
						if(!$res)
						{
								//$this->session->set_userdata('error_signin', "Invalid credentials!");
								//redirect(site_url('Ambassador'));	
								//$error="invalid";
								$userdata=array(
									'status'=>'error',
									'user_data'=>"invalid_email"
								);
								header('Content-type: application/json');
								$data= json_encode($userdata);
								echo $data;
						}
						else if($res->amb_email==$this->input->post('email') && $res->amb_password==md5($this->input->post('password')) && $res->amb_approved=="1")
						{
								$user_d=array('amb_id'=>$res->amb_id,'amb_name'=>$res->amb_name,'amb_email'=>$res->amb_email,'amb_phone'=>$res->amb_phone,'amb_password'=>$res->amb_password,'amb_hostelite'=>$res->hostelite,'amb_address'=>$res->amb_address,'amb_office'=>$res->amb_office,'amb_ref_id'=>$res->amb_ref_id,'amb_ref_points'=>$res->amb_ref_points,'amb_image'=>$res->amb_image);
								$userdata=array(
									'status'=>'success',
									'user_data'=>$user_d
								);
			
								
								//////if fcm token///////////////
								if($this->input->post('fcm_token') && $this->input->post('fcm_token')!="" )
								{
									$fcm_token="";
											$fcm_id=0;
											
												$fcm_token=$this->input->post('fcm_token');
												$check_fcm=$this->db->query("select `fcm_id`,`fcm_token` from `fcm_tokens` where `fcm_token`='".$fcm_token."'")->row();
												if($check_fcm)
												{
													$fcm_id=$check_fcm->fcm_id;
												}
												else
												{
													$fcm_insert=array(
														'fcm_token'=>$fcm_token
													
														);
													$insert_fc=$this->db->insert('fcm_tokens',$fcm_insert);
													$fcm_id=$this->db->insert_id();
													
													
													
												}
												$update_fcm=$this->db->query("Update `ambassador` set `fcm_id`='".$fcm_id."' where `amb_id`='".$res->amb_id."'");
											
								}
								header('Content-type: application/json');
								$data= json_encode($userdata);
								echo $data;
						}
						else if($res->amb_email==$this->input->post('email') && $res->amb_password==md5($this->input->post('password'))  && $res->amb_approved=="0")
						{
								$userdata=array(
									'status'=>'error',
									'user_data'=>"not_approved"
								);
								header('Content-type: application/json');
								$data= json_encode($userdata);
								echo $data;
							
						}
						else if($res->amb_email==$this->input->post('email') && $res->amb_password!=md5($this->input->post('password')))
						{
							$userdata=array(
									'status'=>'error',
									'user_data'=>"invalid_password"
								);
								header('Content-type: application/json');
								$data= json_encode($userdata);
								echo $data;
						}
				}
		
	}
	
	////////////function for updating profile from android device/////////////////////////
	public function update_profile()
	{
				$this->form_validation->set_rules('amb_id','Id','trim|required',array('required' => '%s required.'));
				$this->form_validation->set_rules('amb_name','Name','trim|required|min_length[3]',array('required' => '%s required.'));
				$this->form_validation->set_rules('amb_phone','phone','trim|required|min_length[5]',array('required' => '%s required.'));
				$this->form_validation->set_rules('hostelite','hostelite','trim|required',array('required' => '%s required.'));
				$this->form_validation->set_rules('amb_address','address','trim|required|min_length[5]',array('required' => '%s required.'));
				$this->form_validation->set_rules('amb_office','office/inst name','trim|required|min_length[3]',array('required' => '%s required.'));
				if($this->form_validation->run()==FALSE)
				{
							
							$error=htmlspecialchars(strip_tags(validation_errors()));
								$status=array(
									'status'=>'error',
									'data'=>$error,
								);
						header('Content-type: application/json');
						$data= json_encode($status);
						echo $data;
								
				}
				else
				{
					$this->load->model('admin/Services_model');
					$res=$this->Services_model->update_profile();
					//var_dump($res);
					//exit;
					if($res['status']=="old_pass_incorrect")
					{
							$status=array(
									'status'=>'error',
									'data'=>"Old password incorrect!",
								);
						header('Content-type: application/json');
						$data= json_encode($status);
						echo $data;
					}
					else if($res['status']=="success")
					{
						$status=array(
									'status'=>'success',
									'data'=>array('image_url'=>$res['image_url'],'password'=>$res['password']),
								);
						header('Content-type: application/json');
						$data= json_encode($status);
						echo $data;
					}
					else
					{
						$status=array(
									'status'=>'error',
									'data'=>"Failed to update! Try again",
								);
						header('Content-type: application/json');
						$data= json_encode($status);
						echo $data;
					}
				}
	}
	///////////////////////////ambassador forgot password///////////////////////////////
	public function forgot_pass()
	{
		
		$email=$this->input->post('f_email');
		
				$this->form_validation->set_rules('f_email','Email','trim|required|valid_email',array('required' => 'You must provide a %s.','valid_email'=>'invalid email'));
				if($this->form_validation->run()==FALSE)
				{
								//$error=validation_errors();
								$error=validation_errors();
								$userdata=array(
									'status'=>"Check format",
									
								);
								header('Content-type: application/json');
								$data= json_encode($userdata);
								echo $data;
								
				}
				else
				{
					$this->load->model('web/Ambassador_model');
					$res=$this->Ambassador_model->forgot_pass();
					if($res=="sent")
					{
							$userdata=array(
									'status'=>'Successfully sent',
									
								);
								header('Content-type: application/json');
								$data= json_encode($userdata);
								echo $data;
					
					}
					else if($res=="email_not_reg")
					{
						$userdata=array(
									'status'=>'Email not registered',
									
								);
								header('Content-type: application/json');
								$data= json_encode($userdata);
								echo $data;
					}
					else
					{
						$userdata=array(
									'status'=>'Unknown error',
									
								);
								header('Content-type: application/json');
								$data= json_encode($userdata);
								echo $data;
					}
				
				}
		
	
	}
	////////////////////function to get points of ambassador against amb id//////////////
	public function amb_points()
	{
		//$this->load->model('');
		$this->load->model('web/Ambassador_model');
		$res['amb_points']=$this->Ambassador_model->amb_points();
		$this->load->view('services/amb_points',$res);
	}
	//////////////////////////////check coupon if invalid or not from android/////////////
	public function check_coupon()
	{
		if(!$this->input->post('coupon_code') && trim($this->input->post('coupon_code'))=="")
		{
			$userdata=array(
									'status'=>'code is required',
									
								);
								header('Content-type: application/json');
								$data= json_encode($userdata);
								echo $data;
		}
		else
		{
			$query = $this->db->get_where('coupon', array('cop_code' => trim($this->input->post('coupon_code')),'cop_valid'=>'1'));
			if($query->num_rows()>0)
			{
				$userdata=array(
									'status'=>'valid',
									
								);
								header('Content-type: application/json');
								$data= json_encode($userdata);
								echo $data;
			}
			else
			{
				$userdata=array(
									'status'=>'invalid',
									
								);
								header('Content-type: application/json');
								$data= json_encode($userdata);
								echo $data;
			}
		}
	}
	
}