<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slider extends CI_Controller 
{

	public function index()
			{
				$this->load->model('admin/Slider_model');
				$data['page']='all_slides';
				
				$data['all_slides']=$this->Slider_model->all_slides();
				
			 	$this->session->set_userdata('slider_page','android');
				$this->load->view('admin/all_slides',$data);
				
			}

	public function web_slider()
			{
               $this->load->model('admin/Slider_model');
               $data['page']='slides_web';
               $data['all_slides']=$this->Slider_model->slides_web();
               $this->session->set_userdata('slider_page','web');
               $this->load->view('admin/all_slides',$data);

			}	
		/////////////////////
	

	
	public function toggle_slider($id,$status)
	{
		$this->load->view('admin/include/session_check.php');
				$this->load->model('admin/Slider_model');
			$this->Slider_model->toggle_slider($id,$status);
			if($this->session->userdata('slider_page')=='android')
			{
				redirect(site_url('Slider'));
			}	
			else 
			{
				redirect(site_url('Slider/web_slider'));
			}		

}

	////////////////////display data of image of slider to edit//////////////
	public function edit_slider_display($id)
	{
		$this->load->view('admin/include/session_check.php');
		$this->load->model('admin/Slider_model');
		$data['slider']=$this->Slider_model->edit_slider_display($id);
		$this->load->view('admin/slider_edit',$data);
		
	}
	//////////////////////function for update slider image///////////////////
	public function update_slider()
	{
		$this->load->view('admin/include/session_check.php');
		$this->load->model('admin/Slider_model');
		$data=$this->Slider_model->update_slider();
		if($this->session->userdata('slider_page')=='android')
			{
				redirect(site_url('Slider'));
			}	
			else 
			{
				redirect(site_url('Slider/web_slider'));
			}
		
		
	}
}