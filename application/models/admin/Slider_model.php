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
class  Slider_model extends CI_Model
{
	
	public function all_slides()
	{
		
		$all_slides=$this->db->query("Select *FROM `slider` where slider_platform='1'");
		if($all_slides->num_rows()>0)
		{
			return $all_slides;
		}
		else
		{
			return false;
		}
	}

	public function slides_web()
	{
		$slides_web=$this->db->query("Select *FROM `slider` where slider_platform='0'");
		if($slides_web->num_rows()>0)
		{
			return $slides_web;
		}
		else
		{
			return false;
		}
		
	}
///////////////
	
	////////////////////////////function for disable/enable slider image////////////////////
	public function slides_web1()
	{
		$slides_web1=$this->db->query("Select *FROM `slider` where slider_platform='0' AND slider_disabled='0'");
		if($slides_web1->num_rows()>0)
		{
			return $slides_web1;
		}
		else
		{
			return false;
		}
		
	}
	public function toggle_slider($id,$status)
	{
		$update=$this->db->query("Update `slider` set `slider_disabled`='".$status."' where slider_id='".$id."'");
		if($update)
		{
			$this->session->set_userdata('success', 'successfully done!');
			return true;
		}
		else
		{
			$this->session->set_userdata('failure', 'failed to update!');
			returnfalse; 
		}
	}
	///////////////////function for display datafor edit of slider image////////////////////
	public function edit_slider_display($id)
	{
		$data=$this->db->query("SELECT *FROM `slider` where `slider_id`='".$id."'");
		if($data->num_rows()>0)
		{
			return $data;
		}
		else
		{
			return false;
		}
	}
	//////////////////////function for update slider image///////////////////
	public function update_slider()
	{
		$slider_text=$this->input->post('slider_text');
		$old_pic=$this->input->post('old_image');
		$sl_id=$this->input->post('slider_id');
		//////////////////////////////////////
		$date_cur=date("ymdhis_");
		$path="";
		$up_pic="";
		$db_pic="";
		 if(isset( $_FILES['slider_image']) && $_FILES['slider_image']['size'] > 0 ){
		 
				//$path= "uploads";
                //$temp_path = realpath("uploads");
				//$up_pic=str_replace(' ', '_', $cat_name);
				 $path = "public/slider/".$sl_id."/";
				 $up_pic_name=str_replace(' ', '_', $_FILES['slider_image']['name']);
				$db_pic=$path.$date_cur.$up_pic_name;
					if(!is_dir($path)) //create the folder if it's not already exists
					{
					  mkdir($path,0755,TRUE);
					} 
                $config = array(
                  'upload_path' => $path,
                  'file_name' => $date_cur.$up_pic_name,
                  'allowed_types' => 'png|jpg|jpeg',
                  'max_size' => '500000',
                  'overwrite' => TRUE
                );
				
				
                $this->load->library('upload');
				$this->upload->initialize($config);
					if(!$this->upload->do_upload('slider_image'))
					{
					//echo $path;
					$errors = $this->upload->display_errors();
					echo $errors;
					$db_pic=$old_pic;
					//exit;	
					}
					else{
						$db_pic=$path.$date_cur.$up_pic_name;
							
								if(file_exists($this->input->post('old_image')))
								{
							
								unlink($this->input->post('old_image'));
								}
							
						
						}
					
        }
		else
		{
			$db_pic=$old_pic;
		}
		$update=$this->db->query("UPDATE `slider` SET `slider_image`='".$db_pic."',`slider_text`='".$slider_text."' where `slider_id`='".$sl_id."'");
		if($update)
		{
			$this->session->set_userdata('success', 'successfully updated!');
			return true;
		}
		else
		{
			$this->session->set_userdata('failure', 'failed to update!');
			return false;
		}
	}
	
}