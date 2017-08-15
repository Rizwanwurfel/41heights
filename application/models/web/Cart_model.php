<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of newPHPClass
 *
 * @author bilal khan
 */
class  Cart_model extends CI_Model
{
		public function add_cart_product()
		{
			$att_loop=array();
			
			if($this->input->post('att_cart'))
			{
				foreach($this->input->post('att_cart') as $key=>$value)
				{
					$att_loop[$key]=$value;
					//echo $key." --".$value;
				}
			}
		
					$data = array(
						'id'      => $this->input->post('item_id'),
						'qty'     =>$this->input->post('item_qty'),
						'price'   => $this->input->post('item_price'),
						'name'    => $this->input->post('item_name'),
						'options' => $att_loop
					);
				$insert=$this->cart->insert($data);
				if($insert)
				{
					return true;
				}
				else
				{
					return false;
				}
				
		}
		///////////////////add pizza deal///////////////////////
		public function add_pizza_deal()
		{
			$sp=$this->session->userdata('pizza_deal');
			$att_loop=array();
			if($sp['option'])
			{
				
					foreach($sp['option'] as $key=>$value)
					{
					//	$att_loop[$key]="---------------------------";
						//echo $key." --".$value;
						foreach($value as $a=>$b)
						{
							//echo $a.$key." --".$b."<br/>";
							$att_loop[$a.$key]=$b;
						}
						
					}
				
			}
			$att_loop['image']=$sp['pimage'];
			$att_loop['type']=$sp['ptype'];
			$att_loop['discounted']=$sp['pdiscounted'];
			//////////if there is pizza atts values//
			$total_att_price=0;
						

							
								if(isset($sp['pattprice']))
							{
								foreach($sp['pattprice'] as $k=>$v)
								{
									
									$total_att_price+=$v;
									//echo $v;
								}
								//echo $total_att_price;
							}
			//////////////////////////////////////
		
					$data = array(
						'id'      => $sp['pid'],
						'qty'     =>$sp['pqty'],
						'price'   => $sp['pprice']+$total_att_price,
						'name'    => $sp['pname'],
						'options' => $att_loop
					);
				$insert=$this->cart->insert($data);
				if($insert)
				{
					$this->session->set_userdata("pizz_d_added",'1');
					$this->session->unset_userdata("pizza_deal");
					return true;
				}
				else
				{
					return false;
				}
		}
}