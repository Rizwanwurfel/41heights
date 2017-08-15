<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cat extends CI_Controller 
{
	public function index()
	{
		$var_url = urldecode($this->uri->segment(2));
		$this->load->model('user/Product_model');
		$this->load->model('Product_web_model');
		$data['sub_cat_d']=$this->Product_web_model->particualr_sub_cat($var_url);
		$data['all_main_cat']=$this->Product_model->all_categories();
		if($data['sub_cat_d']!="" || $data['sub_cat_d']!=false || !empty($data['sub_cat_d']))
			{
		$data['all_products']=$this->Product_web_model->all_particular_cat_pr($data['sub_cat_d'][0]['sub_cat_id']);
		//$data['related_products']=$this->Product_web_model->related_products($data['sub_cat_d'][0]['sub_cat_id']);
		$this->load->view('web/all_products',$data);
		}
			else
			{
				redirect(site_url());
			}
	}
	
}