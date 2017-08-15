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
class  Attribute_model extends CI_Model
{
		//////////////////function for showing all main categories of attributes//////////////////////////////////////////////////

	public function all_attr_cat()
	{
		
		$all_cat=$this->db->get_where('att_category' ,array("att_cat_deleted"=>'0'));
		if($all_cat->num_rows()>0)
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
		
		$cat_name=$this->input->post('cat_name');
		$query=$this->db->insert("att_category",array("att_cat_name"=>$cat_name));
		
		if($query)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	/////////////////funtcion for display attribute main cat data/////////////
	public function edit_att_cat_display($id)
	{
		$all_cat=$this->db->get_where('att_category' ,array("att_cat_id"=>$id ,"att_cat_deleted"=>'0'));
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

		public function update_att_cat()
		{
			$id=$this->input->post('cat_id');
			$cat_name=$this->input->post('cat_edit_name');
			$update=$this->db->where("att_cat_id",$id)->update('att_category',array("att_cat_name"=>$cat_name));
			if($update)
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
		$update=$this->db->where(array("att_cat_id"=>$id))->update('att_category',array("att_Cat_deleted"=>'1'));
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
		
		$dbResult = $this->db->query("SELECT a.att_name_id ,a.att_name,b.att_cat_name from  att_name a inner join att_category b on a.att_cat_id=b.att_cat_id where a.att_name_deleted='0' AND b.att_cat_deleted='0'");
		if($dbResult->num_rows()>0)
		{
			return $dbResult;
		}
		else
		{
			return false;
		}

	}
	
		///////////////// funtion for view all detail of values of attribute/////////////////////////
			public function full_detail_att_values($id)
			{
				$all_cat=$this->db->get_where('att_values' ,array("att_name_id"=>$id ,"att_value_deleted"=>'0'));
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
			public function det_att_name($id)
			{
				
				////////////////////////////////////////////////////////////////////////
				$all_cat=$this->db->get_where('att_name' ,array("att_name_id"=>$id ,"att_name_deleted"=>'0'));
				//$all_cat=$this->db->query('att_name' ,array("att_name_id"=>$id ,"att_name_deleted"=>'0'));
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
		//////////////////////////function for adding attribute values///////////////////////
	public function add_attr_value()
	{
			
			$att_cat=$this->input->post('att_cat');
			$att_name=$this->input->post('att_name');
			$att_selection=$this->input->post('att_selection');
			$att_value=$this->input->post('att_value');
			$att_price=$this->input->post('att_price');
			$att_desc=$this->input->post('att_desc');
			$att_value_selected=$this->input->post('att_selected');
			$insert_name=$this->db->insert('att_name',array("att_name"=>$att_name,"att_cat_id"=>$att_cat,"att_selection"=>$att_selection));
			$insert_pro_id = $this->db->insert_id();
			$da=date("yHidys");
			$da2=date("yhids");
			$da3=date("yhiYds");
			$path="";
			$up_pic="";
			$db_pic="";
			///////////////////////////////////////
			if($insert_name)
			{
				for($p=0;$p<count($att_value);$p++)
						{
							/////////////////////////image for android/////////////////////
										if(isset( $_FILES['att_image']) && $_FILES['att_image']['size'][$p]> 0 )
												{
												//var_dump($_FILES);
												//exit;
														$att_n=str_replace(' ', '_',$att_name);
														$path = "public/products/attributes/".$att_n."/";
														if(!is_dir($path)) //create the folder if it's not already exists
														{
														  mkdir($path,0755,TRUE);
														}
														$pro_pic_name=str_replace(' ', '_', $_FILES['att_image']['name'][$p]);
														$db_pic=$path.$da.$pro_pic_name;
														////////////////
														$_FILES['att_images']['name']=$_FILES['att_image']['name'][$p];
														$_FILES['att_images']['type']=$_FILES['att_image']['type'][$p];
														$_FILES['att_images']['tmp_name']=$_FILES['att_image']['tmp_name'][$p];
														$_FILES['att_images']['error']=$_FILES['att_image']['error'][$p];
														$_FILES['att_images']['size']=$_FILES['att_image']['size'][$p];
													//////////////////////////////////
														$config = array(
																			  'upload_path' => $path,
																			  'file_name' =>$da.$pro_pic_name,
																			  'allowed_types' => 'png|jpg|jpeg',
																			  'max_size' => '500000',
																			  'overwrite' => TRUE
																	);
																$this->load->library('upload');
																$this->upload->initialize($config);
																
																if(!$this->upload->do_upload('att_images'))
																{
																//echo $path;
																	$errors = $this->upload->display_errors();
																	
																	
																	$db_pic="public/images/general_cat.png";
																	
																}
												}
											else
											{
												$db_pic="public/images/general_cat.png";
												
												
											}
							//////////////////////////////////////////////////
							/////////////////////////image for android after click/////////////////////
										if(isset( $_FILES['att_after_image']) && $_FILES['att_after_image']['size'][$p]> 0 )
												{
												//var_dump($_FILES);
												//exit;
														$att_n2=str_replace(' ', '_',$att_name);
														$path2 = "public/products/attributes/".$att_n2."/";
														if(!is_dir($path2)) //create the folder if it's not already exists
														{
														  mkdir($path2,0755,TRUE);
														}
														$pro_pic_name2=str_replace(' ', '_', $_FILES['att_after_image']['name'][$p]);
														$db_pic2=$path2.$da2.$pro_pic_name2;
														////////////////
														$_FILES['att_a_images']['name']=$_FILES['att_after_image']['name'][$p];
														$_FILES['att_a_images']['type']=$_FILES['att_after_image']['type'][$p];
														$_FILES['att_a_images']['tmp_name']=$_FILES['att_after_image']['tmp_name'][$p];
														$_FILES['att_a_images']['error']=$_FILES['att_after_image']['error'][$p];
														$_FILES['att_a_images']['size']=$_FILES['att_after_image']['size'][$p];
													//////////////////////////////////
														$config = array(
																			  'upload_path' => $path2,
																			  'file_name' =>$da2.$pro_pic_name2,
																			  'allowed_types' => 'png|jpg|jpeg',
																			  'max_size' => '500000',
																			  'overwrite' => False
																	);
																$this->load->library('upload');
																$this->upload->initialize($config);
																
																if(!$this->upload->do_upload('att_a_images'))
																{
																//echo $path;
																	$errors = $this->upload->display_errors();
																	
																	
																	$db_pic2="public/images/general_cat.png";
																	
																}
												}
											else
											{
												$db_pic2="public/images/general_cat.png";
												
												
											}
							//////////////////////////////////////////////////
								/////////////////////////image for web/////////////////////
										if(isset( $_FILES['att_web_image']) && $_FILES['att_web_image']['size'][$p]> 0 )
												{
												//var_dump($_FILES);
												//exit;
														$att_n3=str_replace(' ', '_',$att_name);
														$path3 = "public/products/attributes/".$att_n3."/";
														if(!is_dir($path3)) //create the folder if it's not already exists
														{
														  mkdir($path3,0755,TRUE);
														}
														$pro_pic_name3=str_replace(' ', '_', $_FILES['att_web_image']['name'][$p]);
														$db_pic3=$path3.$da3.$pro_pic_name3;
														////////////////
														$_FILES['att_w_images']['name']=$_FILES['att_web_image']['name'][$p];
														$_FILES['att_w_images']['type']=$_FILES['att_web_image']['type'][$p];
														$_FILES['att_w_images']['tmp_name']=$_FILES['att_web_image']['tmp_name'][$p];
														$_FILES['att_w_images']['error']=$_FILES['att_web_image']['error'][$p];
														$_FILES['att_w_images']['size']=$_FILES['att_web_image']['size'][$p];
													//////////////////////////////////
														$config = array(
																			  'upload_path' => $path3,
																			  'file_name' =>$da3.$pro_pic_name3,
																			  'allowed_types' => 'png|jpg|jpeg',
																			  'max_size' => '500000',
																			  'overwrite' => False
																	);
																$this->load->library('upload');
																$this->upload->initialize($config);
																
																if(!$this->upload->do_upload('att_w_images'))
																{
																//echo $path;
																	$errors = $this->upload->display_errors();
																	
																	
																	$db_pic3="public/images/general_cat.png";
																	
																}
												}
											else
											{
												$db_pic3="public/images/general_cat.png";
												
												
											}
							//////////////////////////////////////////////////
							$items=array(
								'att_value'=>$att_value[$p],
								'att_value_price'=>$att_price[$p],
								'att_value_desc'=>$att_desc[$p],
								'att_value_image'=>$db_pic,
								'att_value_afimage'=>$db_pic2,
								'att_value_webimage'=>$db_pic3,
								'att_value_selected'=>$att_value_selected[$p],
								'att_name_id'=>$insert_pro_id,
							);
							$in=$this->db->insert('att_values',$items);
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
		//////////////////////////////////////////////////////////////////////////////////
				//////////////////////////function for adding attribute new value///////////////////////
	public function add_attr_new_value()
	{
			$att_id=$this->input->post('att_id');
			$att_name=$this->input->post('att_name');
			$att_value=$this->input->post('att_value');
			$att_price=$this->input->post('att_price');
			$att_desc=$this->input->post('att_desc');
			$att_value_selected=$this->input->post('att_selected');
			$da=date("yHidys");
			$da2=date("yhids");
			$da3=date("yhiYds");
			$path="";
			$up_pic="";
			$db_pic="";
			///////////////////////////////////////
			
				for($p=0;$p<count($att_value);$p++)
						{
							/////////////////////////image for android/////////////////////
										if(isset( $_FILES['att_image']) && $_FILES['att_image']['size'][$p]> 0 )
												{
												//var_dump($_FILES);
												//exit;
														$att_n=str_replace(' ', '_',$att_name);
														$path = "public/products/attributes/".$att_n."/";
														if(!is_dir($path)) //create the folder if it's not already exists
														{
														  mkdir($path,0755,TRUE);
														}
														$pro_pic_name=str_replace(' ', '_', $_FILES['att_image']['name'][$p]);
														$db_pic=$path.$da.$pro_pic_name;
														////////////////
														$_FILES['att_images']['name']=$_FILES['att_image']['name'][$p];
														$_FILES['att_images']['type']=$_FILES['att_image']['type'][$p];
														$_FILES['att_images']['tmp_name']=$_FILES['att_image']['tmp_name'][$p];
														$_FILES['att_images']['error']=$_FILES['att_image']['error'][$p];
														$_FILES['att_images']['size']=$_FILES['att_image']['size'][$p];
													//////////////////////////////////
														$config = array(
																			  'upload_path' => $path,
																			  'file_name' =>$da.$pro_pic_name,
																			  'allowed_types' => 'png|jpg|jpeg',
																			  'max_size' => '500000',
																			  'overwrite' => TRUE
																	);
																$this->load->library('upload');
																$this->upload->initialize($config);
																
																if(!$this->upload->do_upload('att_images'))
																{
																//echo $path;
																	$errors = $this->upload->display_errors();
																	
																	
																	$db_pic="public/images/general_cat.png";
																	
																}
												}
											else
											{
												$db_pic="public/images/general_cat.png";
												
												
											}
							//////////////////////////////////////////////////
							/////////////////////////image for android after click/////////////////////
										if(isset( $_FILES['att_after_image']) && $_FILES['att_after_image']['size'][$p]> 0 )
												{
												//var_dump($_FILES);
												//exit;
														$att_n2=str_replace(' ', '_',$att_name);
														$path2 = "public/products/attributes/".$att_n2."/";
														if(!is_dir($path2)) //create the folder if it's not already exists
														{
														  mkdir($path2,0755,TRUE);
														}
														$pro_pic_name2=str_replace(' ', '_', $_FILES['att_after_image']['name'][$p]);
														$db_pic2=$path2.$da2.$pro_pic_name2;
														////////////////
														$_FILES['att_a_images']['name']=$_FILES['att_after_image']['name'][$p];
														$_FILES['att_a_images']['type']=$_FILES['att_after_image']['type'][$p];
														$_FILES['att_a_images']['tmp_name']=$_FILES['att_after_image']['tmp_name'][$p];
														$_FILES['att_a_images']['error']=$_FILES['att_after_image']['error'][$p];
														$_FILES['att_a_images']['size']=$_FILES['att_after_image']['size'][$p];
													//////////////////////////////////
														$config = array(
																			  'upload_path' => $path2,
																			  'file_name' =>$da2.$pro_pic_name2,
																			  'allowed_types' => 'png|jpg|jpeg',
																			  'max_size' => '500000',
																			  'overwrite' => False
																	);
																$this->load->library('upload');
																$this->upload->initialize($config);
																
																if(!$this->upload->do_upload('att_a_images'))
																{
																//echo $path;
																	$errors = $this->upload->display_errors();
																	
																	
																	$db_pic2="public/images/general_cat.png";
																	
																}
												}
											else
											{
												$db_pic2="public/images/general_cat.png";
												
												
											}
							//////////////////////////////////////////////////
								/////////////////////////image for web/////////////////////
										if(isset( $_FILES['att_web_image']) && $_FILES['att_web_image']['size'][$p]> 0 )
												{
												//var_dump($_FILES);
												//exit;
														$att_n3=str_replace(' ', '_',$att_name);
														$path3 = "public/products/attributes/".$att_n3."/";
														if(!is_dir($path3)) //create the folder if it's not already exists
														{
														  mkdir($path3,0755,TRUE);
														}
														$pro_pic_name3=str_replace(' ', '_', $_FILES['att_web_image']['name'][$p]);
														$db_pic3=$path3.$da3.$pro_pic_name3;
														////////////////
														$_FILES['att_w_images']['name']=$_FILES['att_web_image']['name'][$p];
														$_FILES['att_w_images']['type']=$_FILES['att_web_image']['type'][$p];
														$_FILES['att_w_images']['tmp_name']=$_FILES['att_web_image']['tmp_name'][$p];
														$_FILES['att_w_images']['error']=$_FILES['att_web_image']['error'][$p];
														$_FILES['att_w_images']['size']=$_FILES['att_web_image']['size'][$p];
													//////////////////////////////////
														$config = array(
																			  'upload_path' => $path3,
																			  'file_name' =>$da3.$pro_pic_name3,
																			  'allowed_types' => 'png|jpg|jpeg',
																			  'max_size' => '500000',
																			  'overwrite' => False
																	);
																$this->load->library('upload');
																$this->upload->initialize($config);
																
																if(!$this->upload->do_upload('att_w_images'))
																{
																//echo $path;
																	$errors = $this->upload->display_errors();
																	
																	
																	$db_pic3="public/images/general_cat.png";
																	
																}
												}
											else
											{
												$db_pic3="public/images/general_cat.png";
												
												
											}
							//////////////////////////////////////////////////
							$items=array(
								'att_value'=>$att_value[$p],
								'att_value_price'=>$att_price[$p],
								'att_value_desc'=>$att_desc[$p],
								'att_value_image'=>$db_pic,
								'att_value_afimage'=>$db_pic2,
								'att_value_webimage'=>$db_pic3,
								'att_value_selected'=>$att_value_selected[$p],
								'att_name_id'=>$att_id,
							);
							$in=$this->db->insert('att_values',$items);
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
		///////////////////////////////////updating att items////////////////////////////
		public function update_att_items()
		{
				
			$att_cat=$this->input->post('att_cat_id');
			$att_name=$this->input->post('att_name');
			$att_name_id=$this->input->post('att_name_id');
			$att_selection=$this->input->post('att_selection');
			$att_value_selected=$this->input->post('att_selected');
			$update_att=$this->db->query("Update `att_name` set `att_name`='".$att_name."',`att_cat_id`='".$att_cat."',`att_selection`='".$att_selection."' where `att_name_id`='".$att_name_id."'");
			$att_value=$this->input->post('att_value');
			$att_value_id=$this->input->post('att_id');
			$att_old_image=$this->input->post('att_old_image');
			$att_old_aimage=$this->input->post('att_old_aimage');
			$att_old_webimage=$this->input->post('att_old_webimage');
			$att_price=$this->input->post('att_price');
			$att_desc=$this->input->post('att_desc');
			$da=date("yHidys");
			$da2=date("yHids");
			$da3=date("yHYids");
			$path="";
			$up_pic="";
			$db_pic="";
			$db_pic2="";
			$db_pic3="";
			///////////////////////////////////////
			if($update_att)
			{
				for($p=0;$p<count($att_value);$p++)
						{
							/////////////////////////images/////////////////////
										if(isset( $_FILES['att_image']) && $_FILES['att_image']['size'][$p]> 0 )
											{
											//var_dump($_FILES);
											//exit;
													$att_n=str_replace(' ', '_',$att_name);
													$path = "public/products/attributes/".$att_n."/";
													if(!is_dir($path)) //create the folder if it's not already exists
													{
													  mkdir($path,0755,TRUE);
													}
													$pro_pic_name=str_replace(' ', '_', $_FILES['att_image']['name'][$p]);
													$db_pic=$path.$da.$pro_pic_name;
													////////////////
													$_FILES['att_images']['name']=$_FILES['att_image']['name'][$p];
													$_FILES['att_images']['type']=$_FILES['att_image']['type'][$p];
													$_FILES['att_images']['tmp_name']=$_FILES['att_image']['tmp_name'][$p];
													$_FILES['att_images']['error']=$_FILES['att_image']['error'][$p];
													$_FILES['att_images']['size']=$_FILES['att_image']['size'][$p];
												//////////////////////////////////
													$config = array(
																		  'upload_path' => $path,
																		  'file_name' =>$da.$pro_pic_name,
																		  'allowed_types' => 'png|jpg|jpeg',
																		  'max_size' => '500000',
																		  'overwrite' => TRUE
																);
															$this->load->library('upload');
															$this->upload->initialize($config);
															
															if(!$this->upload->do_upload('att_images'))
															{
															//echo $path;
																$errors = $this->upload->display_errors();
																
																
																$db_pic=$att_old_image[$p];
																
															}
															else
															{
																$db_pic=$path.$da.$pro_pic_name;
																if($att_old_image[$p]!='public/images/general_cat.png')
																	{
																		if(file_exists($att_old_image[$p]))
																			{
																				unlink($att_old_image[$p]);
																			}
																	}
															}
											}
											else
											{
												$db_pic=$att_old_image[$p];
												
												
											}
													//////////////////////////////////////////////////
													/////////////////////////images after click/////////////////////
										if(isset( $_FILES['att_afimage']) && $_FILES['att_afimage']['size'][$p]> 0 )
											{
											//var_dump($_FILES);
											//exit;
													$att_n2=str_replace(' ', '_',$att_name);
													$path2 = "public/products/attributes/".$att_n2."/";
													if(!is_dir($path2)) //create the folder if it's not already exists
													{
													  mkdir($path2,0755,TRUE);
													}
													$pro_pic_name2=str_replace(' ', '_', $_FILES['att_afimage']['name'][$p]);
													$db_pic2=$path2.$da2.$pro_pic_name2;
													////////////////
													$_FILES['att_aimages']['name']=$_FILES['att_afimage']['name'][$p];
													$_FILES['att_aimages']['type']=$_FILES['att_afimage']['type'][$p];
													$_FILES['att_aimages']['tmp_name']=$_FILES['att_afimage']['tmp_name'][$p];
													$_FILES['att_aimages']['error']=$_FILES['att_afimage']['error'][$p];
													$_FILES['att_aimages']['size']=$_FILES['att_afimage']['size'][$p];
												//////////////////////////////////
													$config = array(
																		  'upload_path' => $path2,
																		  'file_name' =>$da2.$pro_pic_name2,
																		  'allowed_types' => 'png|jpg|jpeg',
																		  'max_size' => '500000',
																		  'overwrite' => False
																);
															$this->load->library('upload');
															$this->upload->initialize($config);
															
															if(!$this->upload->do_upload('att_aimages'))
															{
															//echo $path;
																$errors = $this->upload->display_errors();
																
																
																$db_pic2=$att_old_aimage[$p];
																
															}
															else
															{
																$db_pic2=$path2.$da2.$pro_pic_name2;
																if($att_old_aimage[$p]!='public/images/general_cat.png' && $att_old_aimage[$p]!=NULL)
																	{
																		if(file_exists($att_old_aimage[$p]))
																			{
																			unlink($att_old_aimage[$p]);
																			}
																	}
															}
											}
											else
											{
												$db_pic2=$att_old_aimage[$p];
												
												
											}
													//////////////////////////////////////////////////
																/////////////////////////images web click/////////////////////
										if(isset( $_FILES['att_webimage']) && $_FILES['att_webimage']['size'][$p]> 0 )
											{
											//var_dump($_FILES);
											//exit;
													$att_n3=str_replace(' ', '_',$att_name);
													$path3 = "public/products/attributes/".$att_n3."/";
													if(!is_dir($path3)) //create the folder if it's not already exists
													{
													  mkdir($path3,0755,TRUE);
													}
													$pro_pic_name3=str_replace(' ', '_', $_FILES['att_webimage']['name'][$p]);
													$db_pic3=$path3.$da3.$pro_pic_name3;
													////////////////
													$_FILES['att_wimages']['name']=$_FILES['att_webimage']['name'][$p];
													$_FILES['att_wimages']['type']=$_FILES['att_webimage']['type'][$p];
													$_FILES['att_wimages']['tmp_name']=$_FILES['att_webimage']['tmp_name'][$p];
													$_FILES['att_wimages']['error']=$_FILES['att_webimage']['error'][$p];
													$_FILES['att_wimages']['size']=$_FILES['att_webimage']['size'][$p];
												//////////////////////////////////
													$config = array(
																		  'upload_path' => $path3,
																		  'file_name' =>$da3.$pro_pic_name3,
																		  'allowed_types' => 'png|jpg|jpeg',
																		  'max_size' => '500000',
																		  'overwrite' => False
																);
															$this->load->library('upload');
															$this->upload->initialize($config);
															
															if(!$this->upload->do_upload('att_wimages'))
															{
															//echo $path;
																$errors = $this->upload->display_errors();
																
																
																$db_pic3=$att_old_webimage[$p];
																
															}
															else
															{
																$db_pic3=$path3.$da3.$pro_pic_name3;
																if($att_old_webimage[$p]!='public/images/general_cat.png' && $att_old_webimage[$p]!=NULL)
																	{
																		if(file_exists($att_old_webimage[$p]))
																			{
																				unlink($att_old_webimage[$p]);
																			}
																	}
															}
											}
											else
											{
												$db_pic3=$att_old_webimage[$p];
												
												
											}
													//////////////////////////////////////////////////
													$update_att_v=$this->db->query("UPDATE `att_values` set `att_value`='".$att_value[$p]."',`att_value_price`='".$att_price[$p]."',`att_value_desc`='".$att_desc[$p]."',`att_value_image`='".$db_pic."',`att_value_afimage`='".$db_pic2."',`att_value_webimage`='".$db_pic3."',`att_value_selected`='".$att_value_selected[$p]."' where `att_value_id`='".$att_value_id[$p]."'");
													
						} // for ending
						if($update_att_v)
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
		///////////////////////////////////////////function for deleting attribute name and values///////////////////////
	public function delete_att($id)
	{
		$del_values=$this->db->query("delete from `att_values` where `att_name_id`='".$id."'");
		//$del_query=;
		if($del_values)
						{
							$del_att=$this->db->query("delete from `att_name` where `att_name_id`='".$id."'");
							return true;
						}
						else
						{
							return false;
						}
		
	}
}