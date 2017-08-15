<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galleryweb extends CI_Controller {

	

	public function index()
	{
		 $this->load->model('admin/Gallery_model');
		 $data['gallery_web']=$this->Gallery_model->gallery_web();

		  $this->session->set_userdata('gallery_page','web');
              
          $this->load->view('web/gallery',$data);
		

	}

	
	
}