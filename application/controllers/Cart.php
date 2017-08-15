<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
///for website checkout and cart controller
class Cart extends CI_Controller
{
	public function index()
	{
		
		$this->load->view('website/cart');
	}
	//////////////////
	public function add_cart_product()
	{
		//var_dump($this->input->post());
		//exit;
		
		$this->load->model('web/Cart_model');
		$rslt=$this->Cart_model->add_cart_product();
		if($rslt)
		{
			echo "done";
			//var_dump($this->cart->contents());
		}
		else
		{
			echo "failed";
		}
		
	}
	public function add_pizza_deal()
	{
		if($this->input->post('drink'))
		{
			$sp=$this->session->userdata('pizza_deal');
			$sp['option']['drink']=$this->input->post('drink');
			$this->session->set_userdata('pizza_deal',$sp);
			$this->load->model('web/Cart_model');
			$rslt=$this->Cart_model->add_pizza_deal();
			if($rslt)
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
			
	}
	
	///////////////////
	public function remove_item()
	{
		$k=$this->input->post('keyword');
				$data = array(
						'rowid'   => $k,
						'qty'     => 0
						);

		$do=$this->cart->update($data); 
		if($do)
		{
			$this->cart_update();
		}
		else
		{
			$this->cart_update();
		}
	}
	//////////////
	public function check_cart_update()
	{
		
		if ($this->cart->contents()){
			echo $this->cart->total_items();
		}
		else
		{
			echo "0";
		}
	}
	////////////function for checking bill summary at checkout page//////////
	public function checkout_bill_summary()
	{
		$this->load->view('web/checkout_bill_summary');
	}
	//////////////////////////////function for dynamic updation of side cart///////
	public function cart_update()
	{
		$this->load->model('web/Cart_model');
		$rslt=$this->Cart_model->add_cart_product();
		$this->load->view('web/cart_updation');
	}
	
}