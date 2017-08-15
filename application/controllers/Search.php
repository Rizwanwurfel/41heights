<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
			public function s()
			{
				//echo "select *from product where product_name LIKE '%".$this->input->post('search')."%'";
				//exit;
					$this->load->model('Search_model');
					$data['search']=$this->Search_model->search_product();
					$this->load->view('web/search',$data);
			}
}