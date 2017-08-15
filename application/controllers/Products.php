<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller 
{
	public function index()
	{
	
			$var_url = urldecode($this->uri->segment(2));
			$this->load->model('Product_web_model');
			$this->load->model('Product_rev_model');
			$data['pro_detail']=$this->Product_web_model->full_product_detail($var_url);
			if($data['pro_detail']!="" || $data['pro_detail']!=false || !empty($data['pro_detail']))
			{
				$data['all_gall']=$this->Product_web_model->product_gallery($data['pro_detail'][0]['product_id']);
				$data['reviews']=$this->Product_rev_model->product_review($data['pro_detail'][0]['product_id']);
				$data['similar_p']=$this->Product_web_model->similar_products($data['pro_detail'][0]['sub_cat_id'],$data['pro_detail'][0]['product_id']);
				$data['average_rating']=$this->Product_rev_model->product_avg_rating($data['pro_detail'][0]['product_id']);
				
				$this->load->view('web/single_product',$data);
			}
			else
			{
				redirect(site_url());
			}
		
	}
	//////////////////////////////////////function for showing full detail of particular product in home page of website/////////////
	
	public function full_product_detail($id)
	{
			$this->load->model('user/Product_model');
			$this->load->model('Product_rev_model');
			$data['pro_detail']=$this->Product_model->full_product_detail($id);
			$data['average_rating']=$this->Product_rev_model->product_avg_rating($id);
			$this->load->view('web/full_product_detail_web',$data);
	}
	
}