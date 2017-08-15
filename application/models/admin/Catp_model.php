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
class  Catp_model extends CI_Model
{
		////////////////function for showing all menu categories//////////////////
	public function all_categories()
	{
		$cat=$this->db->query("SELECT *FROM `categories` WHERE `cat_deleted`='0'");
		if($cat->num_rows()>0)
		{
			return $cat;
		}
		else
		{
			return false;
		}
	}
	//////////////
	public function cat_data($id)
	{
		$cat=$this->db->query("SELECT *FROM `categories` WHERE `cat_id`='".$id."' AND `cat_deleted`='0'")->row();
		if($cat)
		{
			return $cat->cat_id;
		}
		else
		{
			return false;
		}
	}
	////////////////////function for adding main category//////////////////////////
	public function add_main_cat()
	{
		$cat_name=$this->input->post('cat_name');
		$cat_desc=$this->input->post('cat_desc');
		$user_id=$this->session->userdata('user_id_emb');
		
		//////////////////////////////////////
		$path="";
		$up_pic="";
		$db_pic="";
		///////////adding main image///////////////
		 if(isset( $_FILES['cat_image']) && $_FILES['cat_image']['size'] > 0 ){
		 
				//$path= "uploads";
                //$temp_path = realpath("uploads");
				$up_pic=str_replace(' ', '_', $cat_name);
				 $path = "public/products/categories/".$up_pic."/";
				 $up_pic_name=str_replace(' ', '_', $_FILES['cat_image']['name']);
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
					if(!$this->upload->do_upload('cat_image'))
					{
					//echo $path;
					$errors = $this->upload->display_errors();
					echo $errors;
					$db_pic="public/images/general_cat.png";
					//exit;	
					}
					else{
						$db_pic=$path.$up_pic_name;
						
						}
					
        }
		else
		{
			$db_pic="public/images/general_cat.png";
		}
		////////////////////adding main icon/////////////////////////
		////////////////////adding main icon/////////////////////////
		////////////////////adding main icon/////////////////////////
			$path_icon="";
			$up_icon="";
			$db_icon="";
		///////////adding main image///////////////
		 if(isset( $_FILES['cat_icon']) && $_FILES['cat_icon']['size'] > 0 ){
		 
				//$path= "uploads";
                //$temp_path = realpath("uploads");
				$up_icon=str_replace(' ', '_', $cat_name);
				 $path_icon= "public/products/categories/".$up_pic."/";
				 $up_pic_name=str_replace(' ', '_', $_FILES['cat_icon']['name']);
				$db_icon=$path_icon.$up_pic_name;
					if(!is_dir($path_icon)) //create the folder if it's not already exists
					{
					  mkdir($path_icon,0755,TRUE);
					} 
                $config = array(
                  'upload_path' => $path_icon,
                  'file_name' => $up_pic_name,
                  'allowed_types' => 'png|jpg|jpeg|svg',
                  'max_size' => '500000',
                  'overwrite' => TRUE
                );
				
				
                $this->load->library('upload');
				$this->upload->initialize($config);
					if(!$this->upload->do_upload('cat_icon'))
					{
					//echo $path;
					$errors = $this->upload->display_errors();
					echo $errors;
					$db_pic="public/images/general_cat.png";
					//exit;	
					}
					else{
						$db_icon=$path_icon.$up_pic_name;
						
						}
					
        }
		else
		{
			$db_icon="public/images/general_cat.png";
		}
		////////////////////////////////////////////////////////////
		$insert_ca=array(
			'cat_name'=>$cat_name,
			'cat_desc'=>$cat_desc,
			'cat_image'=>$db_pic,
			'cat_icon'=>$db_icon,
			
		);
			$insert_cat=$this->db->insert('categories',$insert_ca);
						if($insert_cat)
						{
						
									
									return true;
						
						}
						else
						{
								
								
									return false;
								
						}
		///////////////////////////////////////////
	}
	///////////function for displaying data on page to edit//////////////////////////
	public function edit_cat_display($id)
	{
			 $result=$this->db->query("SELECT *FROM `categories` WHERE `cat_id`='".$id."'");
			 if($result->num_rows()>0)
				{
					return $result;//"SELECT *FROM `food_category` WHERE `f_cat_id`='".$id."'";
					
				}
				else
				{
						return false;;
				}
	}
	////////////////////////////////////
		////////////////////function for updating data of category/////////////////
	public function update_category()
	{
		$cat_id=$this->input->post('cat_id');
		$cat_name=$this->input->post('cat_edit_name');
		$cat_desc=$this->input->post('cat_edit_desc');
		$old_pic=$this->input->post('old_image');
		$old_icon=$this->input->post('old_icon');
		$dat=date("ymis_");
		//////////////////////////////////////
		$path="";
		$up_pic="";
		$db_pic="";
		 if(isset( $_FILES['cat_image']) && $_FILES['cat_image']['size'] > 0 ){
		 
				//$path= "uploads";
                //$temp_path = realpath("uploads");
				$up_pic=str_replace(' ', '_', $cat_name);
				 $path = "public/products/categories/".$up_pic."/";
				 $up_pic_name=str_replace(' ', '_', $_FILES['cat_image']['name']);
				$db_pic=$path.$dat.$up_pic_name;
					if(!is_dir($path)) //create the folder if it's not already exists
					{
					  mkdir($path,0755,TRUE);
					} 
                $config = array(
                  'upload_path' => $path,
                  'file_name' => $dat.$up_pic_name,
                  'allowed_types' => 'png|jpg|jpeg|svg',
                  'max_size' => '500000',
                  'overwrite' => TRUE
                );
				
				
                $this->load->library('upload');
				$this->upload->initialize($config);
					if(!$this->upload->do_upload('cat_image'))
					{
					//echo $path;
					$errors = $this->upload->display_errors();
					echo $errors;
					$db_pic=$old_pic;
					//exit;	
					}
					else{
						$db_pic=$path.$dat.$up_pic_name;
						
							if($old_pic!='public/images/general_cat.png')
							{
							
								if(file_exists($this->input->post('old_image')))
									{
								
										unlink($this->input->post('old_image'));
									
									}
									else
									{
										
									}
							
							}
						}
					
        }
		else
		{
			$db_pic=$old_pic;
		}
			//////////////////////////////////////
		$path_icon="";
		$up_icon="";
		$db_icon="";
		 if(isset( $_FILES['cat_icon']) && $_FILES['cat_icon']['size'] > 0 ){
		 
				//$path= "uploads";
                //$temp_path = realpath("uploads");
				$up_icon=str_replace(' ', '_', $cat_name);
				 $path_icon = "public/products/categories/".$up_icon."/";
				 $up_icon_name=str_replace(' ', '_', $_FILES['cat_icon']['name']);
				$db_icon=$path_icon.$dat.$up_icon_name;
					if(!is_dir($path_icon)) //create the folder if it's not already exists
					{
					  mkdir($path_icon,0755,TRUE);
					} 
                $config = array(
                  'upload_path' => $path_icon,
                  'file_name' => $dat.$up_icon_name,
                  'allowed_types' => 'png|jpg|jpeg|svg',
                  'max_size' => '500000',
                  'overwrite' => TRUE
                );
				
				
                $this->load->library('upload');
				$this->upload->initialize($config);
					if(!$this->upload->do_upload('cat_icon'))
					{
					//echo $path;
					$errors = $this->upload->display_errors();
					echo $errors;
					$db_icon=$old_icon;
					//exit;	
					}
					else{
						$db_icon=$path_icon.$dat.$up_icon_name;
							if($old_icon!='public/images/general_cat.png')
							{
									if(file_exists($this->input->post('old_icon')))
									{
										unlink($this->input->post('old_icon'));
									}
							}
						
						}
					
        }
		else
		{
			$db_icon=$old_icon;
		}
		$update=$this->db->query("UPDATE `categories` SET `cat_name`='".$cat_name."',`cat_desc`='".$cat_desc."',`cat_image`='".$db_pic."',`cat_icon`='".$db_icon."' where `cat_id`='".$cat_id."'");
		if($update)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
		////////////////////function for deleting category//////////////////////////////////////////////
	public function delete_cat($id)
	{
		
		$delete=$this->db->query("UPDATE `categories` SET `cat_deleted`='1' WHERE `cat_id`='".$id."'");
		if($delete)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}