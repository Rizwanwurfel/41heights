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
class  Deals_model extends CI_Model
{
	//////////////////////all deals//////////////////
	public function all_deals()
	{
		$all_deals=$this->db->query("Select deals.* ,categories.cat_name from deals INNER JOIN categories ON deals.cat_id=categories.cat_id where deals.deal_deleted='0' order by deals.deal_id desc");
		if($all_deals->num_rows()>0)
		{
			return $all_deals;
		}
		else
		{
			return false;
		}
		
	}
		//////////////////////////////////////////////full detail of particular deal///////////////////////
	public function full_deal_detail($id)
	{
		$full=$this->db->query("SELECT deals.* ,categories.cat_name FROM deals INNER JOIN  `categories` ON deals.cat_id=categories.cat_id where deals.deal_id='".$id."'");
			if($full->num_rows()>0)
		{
			return $full;
		}
		else
		{
			return false;
		}
	
	}
	/////////////////////////////////
	public function delete_deal($id)
	{
		$del=$this->db->query("Update deals set deal_deleted='1' where deal_id='".$id."'");
		if($del)
		{
			$del_sub=$this->db->query("Update deals_products set deal_pr_deleted='1' where deal_id='".$id."'");
			if($del_sub)
			{
				return true;
			}
			// return true;
		}
		else
		{
			return false;
		}
	}
	//////adding deal///////////
	public function add_deal()
	{
		$cat_id=$this->input->post('cat_id');
		$deal_name=$this->input->post('deal_name');
		$main_pr_qty=$this->input->post('main_pr_qty');
		$drink_qty=$this->input->post('drink_qty');
		$product_name=$this->input->post('product_name');
		$deal_price=$this->input->post('deal_price');
		$att_id=$this->input->post('att_id');
		$deal_top=$this->input->post('deal_top');
		$deal_for=$this->input->post('deal_for');
		if($deal_top=="1")
		{
			$update_top=$this->db->query("update `deals` set `deal_top`='0' where `cat_id`='".$cat_id."'");
		}
		///////////////////////
				//////////////////////////////////////
		$date_cur=date("ymdhis");
		$path="";
		$up_pic="";
		$db_pic="";
		 if(isset( $_FILES['deal_image']) && $_FILES['deal_image']['size'] > 0 ){
		 
				//$path= "uploads";
                //$temp_path = realpath("uploads");
				$up_pic=str_replace(' ', '_', $deal_name);
				 $path = "public/products/Deals/".$cat_id."/";
				 $up_pic_name=str_replace(' ', '_', $_FILES['deal_image']['name']);
				$db_pic=$path.$date_cur.$up_pic_name;
					if(!is_dir($path)) //create the folder if it's not already exists
					{
					  mkdir($path,0755,TRUE);
					} 
                $config = array(
                  'upload_path' => $path,
                  'file_name' =>$date_cur.$up_pic_name,
                  'allowed_types' => 'png|jpg|jpeg',
                  'max_size' => '500000',
                  'overwrite' => TRUE
                );
				
				
                $this->load->library('upload');
				$this->upload->initialize($config);
					if(!$this->upload->do_upload('deal_image'))
					{
					//echo $path;
					$errors = $this->upload->display_errors();
					echo $errors;
					$db_pic="public/images/general_cat.png";
					//exit;	
					}
					else{
						$db_pic=$path.$date_cur.$up_pic_name;
						
						}
					
        }
		else
		{
			$db_pic="public/images/general_cat.png";
		}
		$insert_array=array(
							"deal_name"=>$deal_name,
							"deal_price"=>$deal_price,
							"deal_image"=>$db_pic,
							"cat_id"=>$cat_id,
							"deal_top"=>$deal_top,
							"deal_for"=>$deal_for,
							"att_cat_id"=>$att_id,
							"main_pr_qty"=>$main_pr_qty,
							"drink_qty"=>$drink_qty,
							);
							$db_insert=$this->db->insert('deals',$insert_array);
							$insert_id=$this->db->insert_id();
							if($db_insert)
							{ //if 99
								$insert_d=0;
									for($p=0;$p<count($product_name);$p++)
									{
										if(trim($product_name[$p])!="")
										{
											$insert_p=array(
												'deal_pr_name'=>$product_name[$p],
												'deal_id'=>$insert_id
											);
											$insert_d=$this->db->insert('deals_products',$insert_p);
										}
									}
									if($insert_d)
									{
										return true;
									}
									else
									{
										return false;
									}
									
										   
										   
							} // if 99 end
							else
							{
								return false;
							}
	}
	//////////////////////////////////////public function for updation of deal///////////////////////
	public function update_deal()
	{
		$cat_id=$this->input->post('cat_id');
		$deal_name=$this->input->post('deal_name');
		$deal_id=$this->input->post('deal_id');
		$main_pr_qty=$this->input->post('main_pr_qty');
		$drink_qty=$this->input->post('drink_qty');
		$product_name=$this->input->post('product_name');
		$product_id=$this->input->post('product_id');
		$deal_price=$this->input->post('deal_price');
		$att_id=$this->input->post('att_cat_id');
		$old_image=$this->input->post('old_image');
		$deal_top=$this->input->post('deal_top');
		$deal_for=$this->input->post('deal_for');
		if($deal_top=="1")
		{
			$update_top=$this->db->query("update `deals` set `deal_top`='0' where `cat_id`='".$cat_id."'");
			
		}
					//////////////////////////////////////
		$date_cur=date("ymdhis");
		$path="";
		$up_pic="";
		$db_pic="";
		 if(isset( $_FILES['deal_image']) && $_FILES['deal_image']['size'] > 0 ){
		 
				//$path= "uploads";
                //$temp_path = realpath("uploads");
				$up_pic=str_replace(' ', '_', $deal_name);
				 $path = "public/products/Deals/".$cat_id."/";
				 $up_pic_name=str_replace(' ', '_', $_FILES['deal_image']['name']);
				$db_pic=$path.$date_cur.$up_pic_name;
					if(!is_dir($path)) //create the folder if it's not already exists
					{
					  mkdir($path,0755,TRUE);
					} 
                $config = array(
                  'upload_path' => $path,
                  'file_name' =>$date_cur.$up_pic_name,
                  'allowed_types' => 'png|jpg|jpeg',
                  'max_size' => '500000',
                  'overwrite' => TRUE
                );
				
				
                $this->load->library('upload');
				$this->upload->initialize($config);
					if(!$this->upload->do_upload('deal_image'))
					{
					//echo $path;
					$errors = $this->upload->display_errors();
					echo $errors;
					$db_pic="public/images/general_cat.png";
					//exit;	
					}
					else{
						
						$db_pic=$path.$date_cur.$up_pic_name;
							if($old_image!="public/images/general_cat.png")
							{
								if(file_exists($old_image))
									{
									unlink($old_image);
									}
							}
						
						}
					
        }
		else
		{
			$db_pic=$old_image;
		}
		/////////////////
		$update=$this->db->query("update `deals` set `deal_name`='".$deal_name."',`deal_price`='".$deal_price."',`deal_image`='".$db_pic."',`cat_id`='".$cat_id."',`deal_top`='".$deal_top."',`deal_for`='".$deal_for."',`att_cat_id`='".$att_id."',`main_pr_qty`='".$main_pr_qty."',`drink_qty`='".$drink_qty."' where `deal_id`='".$deal_id."' ");
		if($update)
		{
			for($g=0;$g<count($product_name);$g++)
			{
				$update_sub=$this->db->query("update `deals_products` set `deal_pr_name`='".$product_name[$g]."' where `deal_id`='".$deal_id."' and `deal_pr_id`='".$product_id[$g]."' ");
				
			}
				return true;
		}
		else
		{
			return true;
		}
	}
}