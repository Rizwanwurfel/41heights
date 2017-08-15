<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller 
{

	public function index()
			{
				$this->load->model('admin/Gallery_model');
				$data['page']='gallery_web';
				
				$data['gallery_web']=$this->Gallery_model->gallery_web();
				
			 	$this->session->set_userdata('gallery_page','gallery');
				$this->load->view('admin/gallery',$data);
				
			}

	public function web_slider()
			{
               $this->load->model('admin/Slider_model');
               $data['page']='slides_web';
               $data['all_slides']=$this->Slider_model->slides_web();
               $this->session->set_userdata('slider_page','web');
               $this->load->view('admin/all_slides',$data);

			}
			public function gallery_web()
			{
               $this->load->model('admin/Gallery_model');
              // $data['page']='gallery_web';
               $data['gallery_web']=$this->Gallery_model->gallery_web();
               $this->session->set_userdata('gallery_page','web');
               $this->load->view('admin/gallery',$data);
              

			}
	
	public function toggle_gallery($id)
	{
		$this->load->view('admin/include/session_check.php');
				$this->load->model('admin/Gallery_model');
			$this->Gallery_model->toggle_gallery($id);
			

}

	////////////////////display data of image of slider to edit//////////////
	public function edit_gallery_display($id)
	{
		$this->load->view('admin/include/session_check.php');
		$this->load->model('admin/Gallery_model');
		$data['gallery']=$this->Gallery_model->edit_gallery_display($id);
		$this->load->view('admin/gallery_edit',$data);
		
		
	}
	//////////////////////function for update slider image///////////////////
	public function edit_add_gallery()
	{
		$this->load->view('admin/include/session_check.php');
		$this->load->model('admin/Gallery_model');
		$data['gallerydata']=$this->Gallery_model->edit_add_gallery();
		$this->load->view('admin/add_gallery_image',$data);
		
		
	}

	//////////////////////////////////////

	public function update_gallery()
	{
		$this->load->view('admin/include/session_check.php');
		$this->load->model('admin/Gallery_model');
		$data=$this->Gallery_model->update_gallery();
		redirect(site_url('Gallery/gallery_web'));
	}
	/////////////////////////////////////

		public function add_gallery()
	{

		$this->load->view('admin/include/session_check.php');
		$this->load->model('admin/Gallery_model');
		$data=$this->Gallery_model->add_gallery();
		redirect(site_url('Gallery/gallery_web'));
	}











////////////////////////////////////////////
	public function testing_add_gallery()
	{
		$this->load->view('admin/include/session_check.php');
		$object = $this->load->view('admin/add_gallery_image');
		
		$this->load->view('admin/gallery',$object);
	//	$data['gallerydata']=$this->Gallery_model->edit_add_gallery();
	//	$this->load->view('admin/add_gallery_image',$data);
		
		
	}
	
	


}