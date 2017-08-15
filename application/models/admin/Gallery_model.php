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
class  Gallery_model extends CI_Model
{
	

	public function gallery_web()
	{
		$gallery_web=$this->db->query("Select *FROM `gallery` ");
		if($gallery_web->num_rows()>0)
		{
			return $gallery_web;
		}
		else
		{
			return false;
		}
		
	}
	public function toggle_gallery($id)
	{
		$update=$this->db->query("DELETE FROM gallery WHERE gallery_id='".$id."'");
		if($update)
		{
			$this->session->set_userdata('success', 'successfully done!');
			redirect(site_url('Gallery/gallery_web'));
			return true;
			
		}
		else
		{
			$this->session->set_userdata('failure', 'failed to delete!');
			returnfalse; 
		}
	}
	//////////////////////// update and edit gallery//////////////////////////////
	public function edit_gallery_display($id)
	{
		$data=$this->db->query("SELECT *FROM `gallery` where `gallery_id`='".$id."'");
		if($data->num_rows()>0)
		{
			return $data;
		}
		else
		{
			return false;
		}
	}
	//////////////////////function for update gallery image///////////////////
	public function edit_add_gallery()
	{
		$data=$this->db->query("INSERT INTO `gallery`");
		if($data->num_rows()>0)
		{
			return $data;
		}
		else
		{
			return false;
		}
	}
/////////////////////////////////////////////////////
	public function update_gallery()
	{
		$gallery_text=$this->input->post('gallery_text');
		$old_pic=$this->input->post('old_image');
		$gl_id=$this->input->post('gallery_id');
		//////////////////////////////////////
		$date_cur=date("ymdhis_");
		$path="";
		$up_pic="";
		$db_pic="";
		 if(isset( $_FILES['gallery_image']) && $_FILES['gallery_image']['size'] > 0 ){
		 
				//$path= "uploads";
                //$temp_path = realpath("uploads");
				//$up_pic=str_replace(' ', '_', $cat_name);
				 $path = "public/gallery_images/".$gl_id."/";
				 $up_pic_name=str_replace(' ', '_', $_FILES['gallery_image']['name']);
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
					if(!$this->upload->do_upload('gallery_image'))
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
		$update=$this->db->query("UPDATE `gallery` SET `gallery_image`='".$db_pic."',`gallery_text`='".$gallery_text."' where `gallery_id`='".$gl_id."'");
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

	

	

	//////////////////// gallery add image function/////////////////////////////////////
	public function add_gallery()
	{


		$gallery_text=$this->input->post('gallery_text');
		$gallery_image=$this->input->post('gallery_image');
		$date_cur=date("ymdhis_");
		$path="";
		if(isset( $_FILES['gallery_image']) && $_FILES['gallery_image']['size'] > 0 )
		{
		 
				//$path= "uploads";
                //$temp_path = realpath("uploads");
				//$up_pic=str_replace(' ', '_', $cat_name);
				 $path = "public/gallery_images/";
				 $up_pic_name=str_replace(' ', '_', $_FILES['gallery_image']['name']);
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
					if(!$this->upload->do_upload('gallery_image'))
						{
						//echo $path;
						$errors = $this->upload->display_errors();
						echo $errors;
						}
					else
					{
						$db_pic=$path.$date_cur.$up_pic_name;
							
								
							
						
					}
					
        }
		else
		{
			
		}

	if(isset($db_pic) && isset($gallery_text))
		{

		$update = array
		(
        'gallery_text' =>  $gallery_text,
       'gallery_image' => $db_pic,
        
		);

		$this->db->insert('gallery', $update);
	}
		
		if($update)
		{
			$this->session->set_userdata('success', 'successfully added!');
			return true;
		}
		else
		{
			$this->session->set_userdata('failure', 'failed to add!');
			return false;
		}
	}
}