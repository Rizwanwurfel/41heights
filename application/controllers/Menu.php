<?php
defined('BASEPATH') OR exit('No direct script access allowed');
////////////////controller fro website menu display
class Menu extends CI_Controller {

		public function index()
		{
			$this->load->model('admin/Catp_model');
			$data['cats']=$this->Catp_model->all_categories();
			$this->load->view('web/menu',$data);
		}
		public function cat($id)
		{
			$this->load->model('admin/Catp_model');
			$data['cats']=$this->Catp_model->all_categories();
			$data['cat_id']=$id;
			$this->load->view('web/menu_products',$data);
		}
		public function deals()
		{
			$this->load->model('web/Menu_model');
			$data['cats']=$this->Menu_model->all_deals_cats();
			$this->load->view('web/deals',$data);
			
		}
		public function deal($id)
		{
			$this->load->model('web/Menu_model');
			$data['cats']=$this->Menu_model->all_deals_cats();
			$data['cat_id']=$id;
			$this->load->view('web/deals_2',$data);
		}
			//////////////load page for pizza deal drink selection page///////////////
		public function deal_cust_drink_page()
		{
			
			$this->load->view('web/deal_custom_drink');
			
		}
		
		/////////////////////////////////////////////////////////////////////
		public function deal_cust()
		{
			
			$pizza_no=0;
			if($this->input->get('pizza'))
			{
				$pizza_no=$this->input->get('pizza');
			}
			else
			{
				if($this->session->userdata('deal_for')=="amb")
				{
					redirect(site_url('Ambassador/deals'));
				}
				else
				{
					redirect(site_url('Menu/deals'));
				}
				
			}
		
			$deal_data=array();
		//	$deal_option=array();
		//////////////when first time deal is selected/////////////////////
			if($this->input->post('first_time')){
		
			$deal_data['pizza_deal']=array(
						'pid'=>$this->input->post('item_id'),
						'pname'=>$this->input->post('item_name'),
						'ptype'=>$this->input->post('item_type'),
						'pprice'=>$this->input->post('item_price'),
						'pdiscounted'=>$this->input->post('item_discounted'),
						'pimage'=>$this->input->post('item_image'),
						'pqty'=>$this->input->post('item_qty'),
						'pmainqty'=>$this->input->post('item_main_qty'),
						'pdrinkqty'=>$this->input->post('item_drink_qty'),
						'pattcat'=>$this->input->post('item_att_cat'),
						
						
						);
					
						$this->session->set_userdata('pizza_deal',$deal_data['pizza_deal']);
						///////////////check whether deal is of ambassador or public///////////////
						if($this->input->post('ambassador_deal'))
						{
							$this->session->set_userdata('deal_for','amb');
						}
						else
						{
							$this->session->set_userdata('deal_for','public');
						}
						//////////////////////////////////////////////////////////////////////////////
						
					}
			/////////////////if pizza is selected //////////////////////
				if($this->input->post('pizza_no'))
				{	
					$option=array();
					$att_loop=array();
					
					$sp=$this->session->userdata('pizza_deal');
					if($pizza_no>$sp['pmainqty']+1)
					{
							if($this->session->userdata('deal_for')=="amb")
								{
									redirect(site_url('Ambassador/deals'));
								}
							else
								{
									redirect(site_url('Menu/deals'));
								}
						//redirect(site_url('Menu/deals'));
					}
					else
					{
					//var_dump($this->input->post());
								foreach($this->input->post('att_cart') as $key=>$value)
									{
										$att_loop[$key]=$value;
										
									}
								
									$sp['option'][$this->input->post('pizza_no')]=$att_loop;
									$sp['pattprice'][$this->input->post('pizza_no')]=$this->input->post('pizz_att_price');
									$this->session->set_userdata('pizza_deal',$sp);
									if($this->input->post('pizza_no')==$sp['pmainqty'])
									{
										redirect(site_url('Menu/deal_cust_drink_page'));
									}
					}
					
				}
		
			$data['pizza_no']=$pizza_no;
			$this->load->view('web/deals_custom',$data);
			
		}
		///////////////////////////
			public function menu2()
			{
				$this->load->model('admin/Catp_model');
				$data['cats']=$this->Catp_model->all_categories();
				$this->load->view('web/menu2',$data);
			}
	}