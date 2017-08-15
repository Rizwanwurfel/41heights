<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Food_dish extends CI_Controller {

	public function index()
	{
			$this->load->model('user/Food_dish_model');
			$data['all_cat']=$this->Food_dish_model->all_dishes();
			$this->load->view('user/all_food_item',$data);
	}
		public function add_item_page()
	{
			$this->load->model('user/Food_dish_model');
			$data['all_food_cat']=$this->Food_dish_model->all_categories();
			$data['all_food_att']=$this->Food_dish_model->food_attributes();
			$this->load->view('user/add_food_item',$data);
		
	}
	
	/////////////////////////function for add dish to db//////////////////
	public function add_food_dish()
	{
		var_dump($this->input->post());
	}
	
	

}