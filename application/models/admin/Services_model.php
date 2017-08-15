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
class  Services_model extends CI_Model
{
	//////////////////all categories service ///////////////////
	public function show_all_categories()
	{
		// $result=$this->db->query("SELECT *FROM `food_category` where `f_cat_deleted`='0' AND `f_cat_id`!='1' ORDER BY `f_cat_id` desc");
		 $result=$this->db->query("SELECT categories.cat_id,categories.cat_name,categories.cat_image,categories.cat_icon
FROM   `categories`
WHERE   EXISTS (SELECT 	`cat_id` 
                   FROM   products
                   WHERE  products.cat_id = categories.cat_id) AND `cat_deleted`='0'");
				if($result->num_rows()>0)
				{
				
					
					return $result;
					
				}
				else
				{
						return false;
				}
	}
	///////////////////////service for display all products against particular cat id/////////////////
	public function all_products($id)
	{
			
		$result=$this->db->query("SELECT products.* , categories.cat_name FROM `products` INNER JOIN `categories` ON products.cat_id=categories.cat_id where products.cat_id='".$id."' AND products.pr_deleted='0' ORDER BY `pr_id` desc");
				if($result->num_rows()>0)
				{
					return $result;
					
				}
				else
				{
						return false;
				}
	}
	///////////////////////service for display all products against particular cat id/////////////////
	public function all_deals()
	{
		$data=array();
		$data_it=array();	
		$already=array();
		$result=$this->db->query("select distinct(deals.cat_id) ,categories.cat_name  from deals inner join categories on deals.cat_id=categories.cat_id where deal_deleted=0");
				if($result->num_rows()>0)
				{
					
					foreach($result->result_array() as $res)
					{
						//////////fetching all public  deals against categories 
						$select_deal=$this->db->query("select * from deals  where deals.cat_id='".$res['cat_id']."' and deal_deleted='0' AND `deal_for`='0' order by `deal_top` desc");
								if($select_deal->num_rows()>0)
								{
									
													
											foreach($select_deal->result_array() as $deal_i)
											{
												////////////////
														$select_deal_i=$this->db->query("select * from deals_products  where deal_id='".$deal_i['deal_id']."'");
														foreach($select_deal_i->result_array() as $deal_iii)
													{
														$data_it[$deal_i['deal_name']][]=$deal_iii['deal_pr_name'];
													}
												////////////////
												
												$data[$res['cat_name']][]=array(
												
														
														'deal_name'=>$deal_i['deal_name'],
														'deal_id'=>$deal_i['deal_id'],
														'deal_price'=>$deal_i['deal_price'],
														'deal_image'=>$deal_i['deal_image'],
														'main_product_qty'=>$deal_i['main_pr_qty'],
														'drink_qty'=>$deal_i['drink_qty'],
														'deal_item'=>$data_it[$deal_i['deal_name']],
												);
												$data_it[$deal_i['deal_name']]="";
											}
											
								}
						
					}
						return $data;
					
				}
				else
				{
						return false;
				}
	}
	public function all_products_test($id)
	{
			//$id=$this->input->post('cat_id');
		$result=$this->db->query("SELECT products.* , categories.cat_name FROM `products` INNER JOIN `categories` ON products.cat_id=categories.cat_id where products.cat_id='".$id."' AND products.pr_deleted='0' ORDER BY `pr_id` desc");
				if($result->num_rows()>0)
				{
					return $result;
					
				}
				else
				{
						return false;
				}
	}
	public function deal_custom($id)
	{
		//echo "SELECT deals.att_cat_id,att_category.att_cat_id FROM `deals` INNER JOIN `att_category` ON deals.att_cat_id=att_category.att_cat_id where deals.deal_id='".$id."' AND deals.deal_deleted='0'";
		//exit;
		$result=$this->db->query("SELECT deals.att_cat_id,att_category.att_cat_id ,att_name.att_name ,att_name.att_name_id , att_name.att_selection FROM `deals` INNER JOIN `att_category` ON deals.att_cat_id=att_category.att_cat_id INNER JOIN `att_name` ON att_category.att_cat_id=att_name.att_cat_id where deals.deal_id='".$id."' AND deals.deal_deleted='0'");
				if($result->num_rows()>0)
				{
					return $result;
					
				}
				else
				{
						return false;
				}
		
	}
	
	
	/////////////////////////function for showing all sliders///////////////////////////////
	public function all_slides()
	{
		$query=$this->db->query("SELECT *FROM `slider` where `slider_disabled`='0'");
		if($query->num_rows()>0)
		{
			return $query;
		}
		else
		{
			return false;
		}
	}
	/////////////////////////////service for Total discount/////////////
	public function total_discount()
	{
		$cop_discount=0;
		if($this->input->post('coupon_code') && $this->input->post('coupon_code')!="" && $this->input->post('coupon_code')!=NULL)
		{
			$select_code=$this->db->query("select `cop_code`,`cop_discount` from `coupon` where `cop_code`='".$this->input->post('coupon_code') ."' and `cop_valid`='1'")->row();
			if($select_code)
			{
				$cop_discount=$select_code->cop_discount;
			}
			else
			{
				$cop_discount=0;
			}
		}
		$t_d=$this->db->query("select *from discount")->row();
		if($t_d)
		{
			if($cop_discount!=0 && $cop_discount!="")
			{
			}
			else
			{
				$cop_discount=$t_d->discount;
			}
			$locs=array("discount"=>$cop_discount, /// overall normal discount
					"ref_discount"=>$t_d->ref_discount, // discount to customer by ambassador refference
					"ref_deal_discount"=>"0", // discount to customer by ambassador refference on deals 
					"amb_product_points"=>$t_d->ref_points_products, //points to ambassador on products if customer orders through amb refference
					"amb_deal_points"=>$t_d->ref_points_deals); //points to ambassador on deals if customer orders through amb refference
					return $locs;
		}
		else
		{
			return false;
		}
	}
	public function all_locations()
	{
		$query=$this->db->query("SELECT *FROM `delivery_locations`");
		if($query->num_rows()>0)
		{
			return $query;
		}
		else
		{
			return false;
		}
	}
	public function rest_timing()
	{
		$rest=$this->db->query("select *from `rest_timing`");
		if($rest->num_rows()>0)
		{
			return $rest;
		}
		else
		{
			return false;
		}
	}
	////////////////////////function for getting fcm////////////////////////////////////////
	public function get_fcm()
	{
		$token="";
		if($this->input->post('fcm_token'))
		{
			$array=array(
					
						'fcm_token'=>$this->input->post('fcm_token'),
					
					);
		}
		$insert=$this->db->insert('fcm_tokens',$array);
		if($insert)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/////////////////////////function for getting feedback of order from android//////////
	public function order_feedback()
	{
		$insert=array();
		$order_id=0;
		$f_type="dine";
		$cust_name="";
		$cust_phone="";
		//////////////if feedback from dinein customer//////////////
		if($this->input->post('fb_order_id') && $this->input->post('fb_order_id')!="")
		{
			$order_id=$this->input->post('fb_order_id');
			$f_type="order";
		}
		if($this->input->post('fb_name'))
		{
			$cust_name=$this->input->post('fb_name');
		}
		if($this->input->post('fb_phone'))
		{
			$cust_phone=$this->input->post('fb_phone');
		}
		
		//////////////if feedback from android user on order////////////
		
			$insert=array(
					'fb_name'=>$cust_name, //receive by dine in cust 
					'fb_phone'=>$cust_phone, //receive by dine in cust 
					'fb_star'=>$this->input->post('fb_star'), //receive from android 
					'fb_text'=>$this->input->post('fb_text'), // receive from android
					'fb_type'=>$f_type, 
					'order_id'=>$order_id, //receive from android
			);
		
		$fb_ins=$this->db->insert('feedback',$insert);
		if($fb_ins)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	//////////////////////////  updating profile of android user//////////////////////////////////
	public function update_profile()
	{
		$result=array();
		$result['password']="";
		$amb_id=$this->input->post('amb_id');
		$old_image="public/amb/no_profile.png";
		if($this->input->post('old_image')){
		$old_image=$this->input->post('old_image');
		}
		$p_array=array(
		
			'amb_name'=>$this->input->post('amb_name'),
			'amb_phone'=>$this->input->post('amb_phone'),
			'hostelite'=>$this->input->post('hostelite'),
			'amb_address'=>$this->input->post('amb_address'),
			'amb_office'=>$this->input->post('amb_office'),
		);
		$old_pass=$this->input->post('old_pass')?$this->input->post('old_pass'):"";
		$new_pass=$this->input->post('new_pass')?$this->input->post('new_pass'):"";
		if($this->input->post('old_pass') && !empty($old_pass) && $this->input->post('new_pass') && !empty($new_pass))
		{
			$check_pass=$this->db->query("SELECT `amb_password` from `ambassador` where `amb_password`='".md5($this->input->post('old_pass'))."' AND `amb_id`='".$amb_id."'")->row();
			if($check_pass)
			{
				$p_array['amb_password']=md5($this->input->post('new_pass'));
				$result['password']=$p_array['amb_password'];
			}
			else
			{
				$result['status']="old_pass_incorrect";
				//return "old_pass_incorrect";
				return $result;
			}
		}
		///////////////////////////////////////////image updation/////////////////////////
			///////////////////////image profile/////////////////
			if(isset( $_FILES['amb_image']) && $_FILES['amb_image']['size'] > 0 && $_FILES['amb_image']['size'] <= 2098152)
			{
		
				//$up_pic=str_replace(' ', '_', $cat_name);
				 $path = "public/amb/".$amb_id."/";
				 $up_pic_name=str_replace(' ', '_', $_FILES['amb_image']['name']);
				$db_pic=$path.$up_pic_name;
					if(!is_dir($path)) //create the folder if it's not already exists
					{
					  mkdir($path,0755,TRUE);
					} 
                $config = array(
                  'upload_path' => $path,
                  'file_name' => $up_pic_name,
                  'allowed_types' => 'png|jpg|jpeg|svg',
                  'max_size' => '500000',
                  'overwrite' => TRUE
                );
				
				
                $this->load->library('upload');
				$this->upload->initialize($config);
					if(!$this->upload->do_upload('amb_image'))
					{
					//echo $path;
					$errors = $this->upload->display_errors();
					echo $errors;
					$db_pic="public/images/no_profile.png";
					//exit;	
					}
					else
					{
							$uploaded_data = $this->upload->data();
							//$result['image_data']=$uploaded_data;
							
							///////////resize image/////////////
							if($uploaded_data['file_size'] > 800){
							//$result['pathss']=base_url().$path.$uploaded_data['file_name'];
								$this->load->library('image_lib');
								$config['image_library'] = 'gd2';
								$config['source_image'] = $uploaded_data['full_path'];//base_url().$path.$uploaded_data['file_name'];
								$config['create_thumb'] = False;
								$config['maintain_ratio'] = TRUE;
								$config['width']         = 1;
								$config['height']       = 500;
								$config['master_dim'] = 'height';

								//$this->load->library('image_lib', $config);

								//$this->image_lib->resize();
								$this->image_lib->clear();
								$this->image_lib->initialize($config);
								$this->image_lib->resize();
								}
							/////////////////////////////////////
							
							if($old_image!="public/images/no_profile.png" && $old_image!=$path.$up_pic_name)
								{
									
									if(file_exists($old_image)){
										unlink($old_image);
									}else{
										//echo 'file not found';
									}
								
								
								
							}
							
								$db_pic=$path.$uploaded_data['file_name'];
						
					}
			}
		else
		{
			$db_pic=$old_image;
		}
		$p_array['amb_image']=$db_pic;
		////////////////////////////////////////////////////
		/////////////////////////////////////////////////////////////////////////////////////
		
		$update=$this->db->where('amb_id',$amb_id)->update('ambassador',$p_array);
		if($update)
		{
			
			$result['status']="success";
			$result['image_url']=$db_pic;
			return $result;
		}
		else
		{
			return false;
		}
		
	}
	
	
	
	
}

