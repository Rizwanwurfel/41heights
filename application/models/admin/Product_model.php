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
class  Product_model extends CI_Model
{
		
	
	/////////////////////////////////////////////<!--===============products==========================>/////////////////////////////////////
	public function latest_products()
	{
		$query=$this->db->query("SELECT *FROM `products` WHERE `pr_deleted`='0' order by `pr_id` desc LIMIT 5");
		if($query->num_rows()>0)
		{
			return $query;
		}
		else
		{
			return false;
		}
	}
	//////////////////////////////add products///////////////////////
	public function add_product()
	{
		$product_cat=trim($this->input->post('cat_id'));
		$product_name=trim($this->input->post('product_name'));
		$product_desc=trim($this->input->post('product_desc'));
		$product_price=trim($this->input->post('product_price'));
		$product_att=trim($this->input->post('product_att'));
		
		$date_cur=date("ymdhis");
		
			//////////////////////////////////////
		$path="";
		$up_pic="";
		$db_pic="";
		 if(isset( $_FILES['product_image']) && $_FILES['product_image']['size'] > 0 ){
		 
				//$path= "uploads";
                //$temp_path = realpath("uploads");
				$up_pic=str_replace(' ', '_', $product_name);
				 $path = "public/products/products/".$product_cat."/";
				 $up_pic_name=str_replace(' ', '_', $_FILES['product_image']['name']);
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
					if(!$this->upload->do_upload('product_image'))
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
							"pr_name"=>$product_name,
							"pr_note"=>$product_desc,
							"pr_image"=>$db_pic,
							"pr_price"=>$product_price,
							"cat_id"=>$product_cat,
							"att_cat_id"=>$product_att,
							);
							$db_insert=$this->db->insert('products',$insert_array);
							if($db_insert)
							{ //if 99
							
									return true;
										   
										   
							} // if 99 end
							else
							{
								return false;
							}
	}
	////////////////////////////////////////////
	//////////////////////////////function for checking of duplicate product during adding product/////////////////////////////////////
	public function check_duplicate_product()
	{
		$key=$this->input->post('keyword');
		$check=$this->db->query("SELECT `pr_name`  from `products` where `pr_name`='".$key."' AND `pr_deleted`='0'");
		if($check->num_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function check_duplicate_sub_cat()
	{
		$key=$this->input->post('keyword');
		$check=$this->db->query("SELECT *FROM `sub_category` where `sub_cat_name`='".$key."' AND `sub_cat_deleted`='0'");
		if($check->num_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	/////////////////////////////////////////////////////////all products//////////////////////////////////////////////////////////////
	public function all_products()
	{
		$all=$this->db->query("SELECT products.* ,categories.cat_name FROM products INNER JOIN `categories` ON products.cat_id=categories.cat_id where products.pr_deleted='0' AND categories.cat_deleted='0' ORDER by products.pr_id desc");
		if($all->num_rows()>0)
		{
			return $all;
		}
		else
		{
			return false;
		}
	}
	
	//////////////////////////////////////////////full detail of particular product///////////////////////
	public function full_product_detail($id)
	{
		$full=$this->db->query("SELECT products.* ,categories.cat_name FROM products INNER JOIN `categories` ON products.cat_id=categories.cat_id  where products.pr_id='".$id."'");
			if($full->num_rows()>0)
		{
			return $full;
		}
		else
		{
			return false;
		}
	
	}
	
	/////////////////////////////////////////////////////////////////////////////
			////////////////////function for deleting product//////////////////////////////////////////////
	public function delete_product($id)
	{
		
		$delete=$this->db->query("UPDATE `products` SET `pr_deleted`='1' WHERE `pr_id`='".$id."'");
		if($delete)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	///////////////////////////////////////////////////////////
	////////////////////////function for edit info dislay of product/////////////////////////////////
		
	public function edit_product_display($id)
	{
		$all_p=$this->db->query("SELECT products.* ,categories.cat_id,categories.cat_name FROM products INNER JOIN `categories` ON products.cat_id=categories.cat_id  where products.pr_id='".$id."'");
		if($all_p->num_rows()>0)
		{
			return $all_p;
		}
		else
		{
			return false;
		}
	}
	////////////////////////function for edit gallery individual image dislay of product/////////////////////////////////
		
	public function edit_gallery_image_display($id)
	{
			$all_p=$this->db->query("SELECT *FROM `product_gallery` where `p_g_id`='".$id."'");
			if($all_p->num_rows()>0)
			{
				return $all_p;
			}
			else
			{
				return false;
			}
	}
			////////////////////function for updating gallery image/////////////////
	public function update_gallery_image()
	{
		
		$old_image=$this->input->post('old_image');
		$p_g_id=$this->input->post('p_g_id');
		$product_id=$this->input->post('product_id');
		//$rest_id=$this->input->post('rest_id');
		//////////////////////////////////////
		$path="";
		$up_pic="";
		$db_pic="";
		 if(isset( $_FILES['product_image']) && $_FILES['product_image']['size'] > 0 ){
		 
				//$path= "uploads";
                //$temp_path = realpath("uploads");
				$up_pic=str_replace(' ', '_', $product_name);
				 $path = "public/products/products/gallery/".$product_id."/";
				 $up_pic_name=str_replace(' ', '_', $_FILES['product_image']['name']);
				$db_pic=$path.$up_pic_name;
					if(!is_dir($path)) //create the folder if it's not already exists
					{
					  mkdir($path,0755,TRUE);
					} 
                $config = array(
                  'upload_path' => $path,
                  'file_name' => $up_pic_name,
                  'allowed_types' => 'png|jpg|jpeg',
                  'max_size' => '500000',
                  'overwrite' => TRUE
                );
				if($old_pic!='public/images/general_cat.png')
					{
							unlink($this->input->post('old_image'));
					}
				
				
                $this->load->library('upload');
				$this->upload->initialize($config);
					if(!$this->upload->do_upload('product_image'))
					{
					//echo $path;
					$errors = $this->upload->display_errors();
					echo $errors;
					$db_pic=$old_pic;
					//exit;	
					}
					else{
						$db_pic=$path.$up_pic_name;
						
						
						}
					
        }
		else
		{
			$db_pic=$old_pic;
		}
		$update=$this->db->query("UPDATE `product_gallery` SET `p_g_name`='".$db_pic."' where `p_g_id`='".$p_g_id."'");
		if($update)
		{
			return $product_id;;
		}
		else
		{
			return false;
		}
	}
	////////////////function for update product in db/////////////////////
	public function update_product()
	{
		$product_cat=trim($this->input->post('cat_id'));
		$product_id=trim($this->input->post('pr_id'));
		$product_att_cat_id=trim($this->input->post('att_cat_id'));
		$product_name=trim($this->input->post('pr_name'));
		$product_desc=trim($this->input->post('pr_desc'));
		$product_price=trim($this->input->post('pr_price'));
		
		$old_image=$this->input->post('old_image');
		$date_cur=date("ymdhis");
			//////////////////////////////////////
			$path="";
		$up_pic="";
		$db_pic="";
		 if(isset( $_FILES['product_image']) && $_FILES['product_image']['size'] > 0 ){
		 
				//$path= "uploads";
                //$temp_path = realpath("uploads");
				$up_pic=str_replace(' ', '_', $product_name);
				 $path = "public/products/products/".$product_cat."/";
				 $up_pic_name=str_replace(' ', '_', $_FILES['product_image']['name']);
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
					if(!$this->upload->do_upload('product_image'))
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
		$up_p=$this->db->query("update `products` set `pr_name`='".$product_name."',`pr_note`='".$product_desc."',`pr_image`='".$db_pic."',`pr_price`='".$product_price."',`cat_id`='".$product_cat."',`att_cat_id`='".$product_att_cat_id."' where `pr_id`='".$product_id."'");
		if($up_p)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	///////////////////////////////display all gallery images of particular product///////////////////////////
	public function all_gallery_images($id)
	{
		$gal=$this->db->query("SELECT *FROM `product_gallery` where `product_id`='".$id."'");
		if($gal->num_rows()>0)
		{
			return $gal;
		}
		else
		{
			return false;
		}
	}
	//////////////////////////////////////////////////function for deleting individual gallery inage ////////////
	public function delete_gallery_image($id)
	{
		
		$del_g=$this->db->query("SELECT `p_g_name`,`product_id` from product_gallery where `p_g_id`='".$id."'")->row();
		$p_id=$del_g->product_id;
		unlink($del_g->p_g_name);
		if($del_g)
		{
			$del_d=$this->db->query("DELETE from product_gallery where p_g_id='".$id."'");
			//$del_d=$this->db->query("update  product_gallery set p_g_id='".$id."'where p_g_id='".$id."'");
			if($del_d){
			
				return $p_id;
			}
			else
			{
				return false;
			}
		}
		
	}
	
	/////////////////////////////////////////////<!--===============Food items attribute portion==========================>/////////////////////////////////////
	
	//////////////////function for showing all main categories of attributes//////////////////////////////////////////////////

	public function all_attr_cat()
	{
		$rest_id=$this->session->userdata('user_rest_uns');
		//$all_cat=$this->db->query("SELECT *from `food_attribute` where `rest_id`='".$rest_id."' AND `f_att_deleted`='0'");
		$all_cat=$this->db->get_where('food_attribute' ,array("rest_id"=>$rest_id ,"f_att_deleted"=>'0'));
		if($all_cat)
		{
			return $all_cat;
		}
		else
		{
			return false;
			
		}
	}
	//////////////////////////////////////////adding main cat of attribute/////////////////////////////
	public function add_attr_cat()
	{
		$rest_id=$this->session->userdata('user_rest_uns');
		$cat_name=$this->input->post('cat_name');
		$query=$this->db->insert("food_attribute",array("f_att_name"=>$cat_name,"rest_id"=>$rest_id));
		
		if($query)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	//////////////////functio for delete attribute cat/////////////////////////////
	public function delete_attr_cat($id)
	{
		$update=$this->db->where(array("f_att_id"=>$id))->update('food_attribute',array("f_att_deleted"=>'1'));
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	//////////////////////function for display data of attribute cat editing/////////////////////////
	
	public function edit_att_cat_display($id)
	{
		$all_cat=$this->db->get_where('food_attribute' ,array("f_att_id"=>$id));
		if($all_cat)
		{
			return $all_cat;
		}
		else
		{
			return false;
			
		}
	}
	
	///////////////////////////function for update cat att in db////////////////////////////////

		public function update_cat_att()
		{
			$id=$this->input->post('cat_id');
			$cat_name=$this->input->post('cat_edit_name');
			$update=$this->db->where("f_att_id",$id)->update('food_attribute',array("f_att_name"=>$cat_name));
			if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
		}
	////////////////////////function for loading all data of attribute values////////////////////
	public function all_att_value()
	{
		$rest_id=$this->session->userdata('user_rest_uns');
		$dbResult = $this->db->query("SELECT * FROM `food_att_value`  WHERE food_att_value.rest_id= ? AND food_att_value.f_att_v_deleted=? ORDER BY food_att_value.f_att_v_id desc", array($rest_id,0));
		if($dbResult->num_rows()>0)
		{
			return $dbResult;
		}
		else
		{
			return false;
		}

	}
	//////////////////////////function for adding attribute values///////////////////////
	public function add_attr_value()
	{
			$rest_id=$this->session->userdata('user_rest_uns');
			$att_name=$this->input->post('att_name');
			$att_value=$this->input->post('att_value');
			$att_price=$this->input->post('att_price');
			$insert_name=$this->db->insert('food_att_value',array("f_att_v_name"=>$att_name,"rest_id"=>$rest_id));
			$insert_pro_id = $this->db->insert_id();
			///////////////////////////////////////
			if($insert_name)
			{
				for($p=0;$p<count($att_value);$p++)
						{
							
							$items=array(
								'f_att_vit_name'=>$att_value[$p],
								'f_att_vit_price'=>$att_price[$p],
								'f_att_v_id'=>$insert_pro_id,
							);
							$in=$this->db->insert('f_att_v_item',$items);
						}
						if($in)
						{
							return true;
						}
						else
						{
							return false;
						}
			}
			else
			{
				return false;
			}
		}	
			///////////////// funtion for view all detail of values of attribute/////////////////////////
			public function full_detail_att_values($id)
			{
				$all_cat=$this->db->get_where('f_att_v_item' ,array("f_att_v_id"=>$id ,"f_att_vit_deleted"=>'0'));
					if($all_cat)
				{
					return $all_cat;
				}
				else
				{
					return false;
				}
			}
			/////////////////////////////function for displaying detail against particular id of attribute/////////////////////////
			public function det_att_value($id)
			{
				//////////////////////////////////////////////////////////////////////
					$this->db->select('*');
					$this->db->from('food_att_value');
					
					$this->db->where('food_att_value.f_att_v_id', $id);

					$all_cat = $this->db->get();
				////////////////////////////////////////////////////////////////////////
				//$all_cat=$this->db->get_where('food_att_value' ,array("f_att_v_id"=>$id ,"f_att_v_deleted"=>'0'));
					if($all_cat)
				{
					//$data=array();
					return $all_cat;
				}
				else
				{
					return false;
				}
			}
			////////////////////////////////delete attribute //////////////////////////////////////////////
			public function delete_attr_val($id)
			{
				$update=$this->db->where(array("f_att_v_id"=>$id))->update('food_att_value',array("f_att_v_deleted"=>'1'));
				if($update)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			//////////////////////////////////////////////////function for update attribute values///////////////////////////////////
			
			public function update_att_items()
			{
				$attr_name=$this->input->post('att_edit_name');
				$attr_id=$this->input->post('att_edit_name_id');
				$attr_value_name=$this->input->post('att_edit_value');
				$attr_value_price=$this->input->post('att_edit_price');
				$attr_value_id=$this->input->post('att_edit_id');
				$dd_done=1;
				$update_att=$this->db->where("f_att_v_id",$attr_id)->update('food_att_value',array("f_att_v_name"=>$attr_name));
				if($update_att)
				{
				
						for($p=0;$p<count($attr_value_name);$p++)
						{
							$up_values=$this->db->where("f_att_vit_id",$attr_value_id[$p])->update('f_att_v_item',array("f_att_vit_name"=>$attr_value_name[$p],"f_att_vit_price"=>$attr_value_price[$p]));
						}
						if(($this->input->post('att_editadd_value')))
						{
							$attr_value_newname=$this->input->post('att_editadd_value');
							$attr_value_newprice=$this->input->post('att_editadd_price');
								for($a=0;$a<count($attr_value_newname);$a++)
								{
									$add_values=$this->db->insert("f_att_v_item",array("f_att_vit_name"=>$attr_value_newname[$a],"f_att_vit_price"=>$attr_value_newprice[$a],"f_att_v_id"=>$attr_id));
									
								}
								if($add_values)
								{
									$dd_done=1;
								}
								else
								{
									$add_done=0;
								}
						}
					
						if($up_values && $dd_done)
						{
							return true;
							exit;
						}
						else
						{
							return false;
							exit;
						}
					
				}
				else
				{
					return false;
				}
			}
			
			////////////////////////////////////////function for display all assigned attributes to particular cat/////////////////////////////////////////
			public function all_assigned_attributes($id)
			{
				$query=$this->db->get_where('food_assign_attribute' ,array("f_att_id"=>$id ,"f_ass_att_del"=>'0'));
				if($query)
				{
					return $query;
				}
				else
				{
					return false;
				}
			}
			
			//////////////////////////////////function assign attribute values to cat////////////////////////////
			public function assign_att_values()
			{
				$att_cat=$this->input->post('main_cat_att');
				$att_val=$this->input->post('check_values');
				$update_first=$this->db->where(array("f_att_id"=>$att_cat))->update('food_assign_attribute',array("f_ass_att_del"=>'1'));
				if(count($att_val)==0)
				{
					return true;
				}
				else{
								for($p=0;$p<count($att_val);$p++)
								{
									$query=$this->db->get_where('food_assign_attribute' ,array("f_att_id"=>$att_cat ,"f_att_v_id"=>$att_val[$p]));
									if($query->num_rows()>0)
									{
										$assign=$this->db->where(array("f_att_id"=>$att_cat,"f_att_v_id"=>$att_val[$p]))->update('food_assign_attribute',array("f_ass_att_del"=>'0'));
									}
									else
									{
										$assign=$this->db->insert('food_assign_attribute',array("f_att_id"=>$att_cat,"f_att_v_id"=>$att_val[$p]));
									}
								
								}
								
								if($assign)
								{
									return true;
								}
								else
								{
									return false;
								}
					}
			}
	
}
	