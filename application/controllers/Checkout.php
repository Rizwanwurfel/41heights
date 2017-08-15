<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller 
{
	public function index()
	{
		
		if ($this->cart->contents()){
				$this->load->model('admin/Location_model');
				$res['loc']=$this->Location_model->all_locations();
				$this->load->view('web/checkout',$res);
			}
			else
			{
				redirect(site_url());
			}
			
		
	}
	////////////////////////////
	public function add_to_cart()
	{
		
		$this->load->model('Checkout_model');
		$res=$this->Checkout_model->add_to_cart();
		if($res)
		{
				//var_dump($this->cart->contents());
			//echo"<script>alert('added');
					//window.history.back()</script>";
				echo "done";
		}
		else
		{
			echo "failed";
		}
		
	}
	
	//////////////////////////for popup submission//////////////////
		public function add_to_cart_popup()
	{
	
		$this->load->model('Checkout_model');
		$res=$this->Checkout_model->add_to_cart();
		if($res)
		{
			$this->session->set_userdata('cart_added','show');
				//var_dump($this->cart->contents());
			echo"<script>
					window.history.back();
					
					</script>";
				//echo "done";
		}
		else
		{
			echo "failed";
		}
		
	}
	
	//////////////
	public function del_one()
	{
		$k=$this->input->post('keyword');
		$do=$this->cart->remove($k);
		if($do)
		{
			echo $k;
		}
		else
		{
			echo "not";
		}
		
	}
	/////////////////////////////////function for updating qty from checkout page/////////////////
	public function update_quantity()
	{
		$rowid=$this->input->post('id_e');
		$qty=$this->input->post('qty');
		$data=$this->cart->update(array(
        'rowid'=>$rowid,
        'qty'=> $qty,
					));
					/////////////////////////////////////
						if ($this->cart->contents()){ 
						$total=0;
						foreach ($this->cart->contents() as $itemss){
							echo "<li>".$itemss['name']."<i>-</i> <span>$". $itemss['subtotal'] ."</span></li>";
								$total+=$itemss['subtotal'];
						}
							echo "<li style='background:#f6f6f6'><b>Total</b> <i>-</i> <span><b>$ ".$total."</b></span></li>";
							//echo $itemss['name'];
						}
					//////////////////////////////////
	
		
	}
	/////////////////////////////////function for updating qty from checkout page/////////////////
	public function update_co_bel_page()
	{
		
		
					/////////////////////////////////////
						if ($this->cart->contents()){ 
						$total=0;
						foreach ($this->cart->contents() as $itemss){
							echo "<li>".$itemss['name']."<i>-</i> <span>$". $itemss['subtotal'] ."</span></li>";
								$total+=$itemss['subtotal'];
						}
							echo "<li style='background:#f6f6f6'><b>Total</b> <i>-</i> <span><b>$ ".$total."</b></span></li>";
							//echo $itemss['name'];
						}
					//////////////////////////////////
	
		
	}
	///////////////////////////////////function for billing after proceed to check out////////////////////////
	
	public function billing()
	{
		if ($this->cart->contents())
			{
			$this->load->view('web/billing_form');
			}
			else
			{	
				redirect(site_url());
			}
	}
	//////////////////////function after successful order///////////////
	public function success_order_page()
	{
			if ($this->session->userdata('order_no'))
			{
			$this->load->view('web/success_order');
			}
			else
			{	
				redirect(site_url());
			}
	}
	//////////////////////////////////////////////function for adding order to database////////////////////////////
		public function add_order()
	{
	////////////////
	/*var_dump($this->input->post());
	//exit;
	if(trim($this->input->post('ref_id')) )
	{
		echo "yes.<br/>";
	}
	if(trim($this->input->post('ref_id'))=="" )
	{
		echo "empty";
	}
	exit;*/
		if($this->cart->contents())
		{
				
				$this->form_validation->set_rules('full_name','name','trim|required|min_length[3]',array('required' => 'You must provide a %s.'));
				$this->form_validation->set_rules('address','address','trim|required|min_length[3]',array('required' => 'You must provide a %s.'));
				$this->form_validation->set_rules('phone','phone','trim|required|min_length[5]',array('required' => 'You must provide a %s.'));
				$this->session->set_userdata('check_name',$this->input->post('full_name'));
				$this->session->set_userdata('check_phone',$this->input->post('phone'));
				if($this->input->post('email'))
				{
					$this->session->set_userdata('check_email',$this->input->post('email'));
				}
				if($this->input->post('order_note'))
				{
					$this->session->set_userdata('check_note',$this->input->post('order_note'));
				}
					
				$this->session->set_userdata('check_address',$this->input->post('address'));
				 if($this->form_validation->run()==FALSE)
					{
								//$data['errors']=validation_errors();
								$this->session->set_userdata('errors', validation_errors());
								redirect(site_url('Checkout'));
								//$data['errors']=validation_errors();
					}
				else{
	////////////////////
						$this->load->model('web/Checkout_model');
						$res=$this->Checkout_model->add_order();
						if($res=="success")
						{
							$this->session->set_userdata('order_no','1');
							//////////////////////sending email to admin////////////////////////////////
													$to_admin ="sheikh.wurfel@gmail.com";
													$subjects = '41 Hieghts New Order Placed';
													$from = 'info@41heightspizza.com';
													 
													// To send HTML mail, the Content-type header must be set
													$headers  = 'MIME-Version: 1.0' . "\r\n";
													$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
													// $from="sales@yeswecan.pk";
													// Create email headers
													$headers .= 'From: '.$from."\r\n".
													'Reply-To: '.$from."\r\n" .
														'X-Mailer: PHP/' . phpversion();
													 
													// Compose a simple HTML email message
													////////////////////////////////////////////////////
													$messagen = '<html><body style="">';
															$messagen .= '<div class="row" style="background:#f6f6f6;padding:2%">';
																$messagen .='<h2 style="text-align:center">New Order Placed at 41 Heights ! </h2>';
																$messagen .='<h2 style="text-align:center">Through Website! </h2>';
																$messagen .='<h2 style="text-align:center">Total items: '.$this->cart->total_items().' , Total Bill: '.$this->cart->total().' </h2>';
																$messagen .='<h3 style="text-align:center">For Order detail check portal! </h3>';
																$messagen .='<h2 style="text-align:center">Thank You! </h2>';
																$messagen.= '</div>';
																$messagen.= '</body></html>';
													mail($to_admin, $subjects, $messagen, $headers);
													///////////////////////////////////////////////////////
													$this->session->unset_userdata('check_name');
													$this->session->unset_userdata('check_phone');
													$this->session->unset_userdata('check_email');
													$this->session->unset_userdata('check_address');
													$this->session->unset_userdata('check_note');
													
							redirect(site_url('Checkout/success_order_page'));
								
						}
						else if($res=="invalid_reference")
						{
							$this->session->set_userdata('errors', "Invalid Reference Id");
							redirect(site_url('Checkout'));
						}
						else if($res=="invalid_coupon")
						{
							$this->session->set_userdata('errors', "Invalid Coupon code");
							redirect(site_url('Checkout'));
						}
						else
						{
							$this->session->set_userdata('errors', "Failed To place order!Try again");
							redirect(site_url('Checkout'));
						}
					}
		}//if cart has contects ending 
		else
		{
			redirect(site_url('Menu'));
		}
	}
	////////////////////function for checking header top cart for update//////////////////
	function check_cart_update()
	{
		$total_items="";
		$total_price="";
					if ($this->cart->contents()){
						foreach ($this->cart->contents() as $items)
						{
							$total_items+=$items['qty'];
							$total_price+=$items['subtotal'];
						}
						echo "$$total_price($total_items items)";
				}
				else
				{
					echo "0 Items";
				}
	}
	//////////////////////////////
	public function empty_cart()
	{
		
		$this->cart->destroy();
		
	}
	function load_test()
	{
		$this->load->view('web/external_filter');
	}
	
}