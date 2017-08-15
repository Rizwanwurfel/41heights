<?php
defined('BASEPATH') OR exit('No direct script access allowed');
////////////////for admin portal  product management controller
class Product_p extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 //////////////////////////////view all categories/////////////////////
	public function index()
	{
			$this->load->model('admin/Product_model');
			
			$data['all_cat']=$this->Product_model->all_categories();
			
			$this->load->view('admin/all_main_cat',$data);
	}
	
	
	
	/////////////////////////////////////////////<!--===============Food products add==========================>/////////////////////////////////////
	public function all_products()
	{
			$this->load->model('admin/Product_model');
			$data['all_pr']=$this->Product_model->all_products();
			$this->load->view('admin/all_products',$data);
	}
	public function add_product_page()
	{
			$this->load->model('admin/Catp_model');
			$this->load->model('admin/Attribute_model');
			$data['all_sub_cat']=$this->Catp_model->all_categories();
			$data['all_att_cat']=$this->Attribute_model->all_attr_cat();
			$this->load->view('admin/add_product',$data);
	}
	/////////////////////full detail of product///////////////////////////
	public function full_product_detail($id)
	{
			$this->load->model('admin/Product_model');
			$data['pro_detail']=$this->Product_model->full_product_detail($id);
			$this->load->view('admin/full_product_detail',$data);
	}
	
	//////////////////////////////add products///////////////////////
	public function add_product()
	{
		
			$this->load->model('admin/Product_model');
			$res=$this->Product_model->add_product();
			if($res)
				{
				$this->session->set_userdata('success','Successfully added product!');
				redirect(site_url('Product_p/add_product_page'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to add product! Try Again');
				redirect(site_url('Product_p/add_product_page'));
			}
	}
	public function check_duplicate_product()
	{
		$this->load->model('admin/Product_model');
				$res=$this->Product_model->check_duplicate_product();
				if($res)
				{
					echo "<center><span class='glyphicon glyphicon-remove ' style='color:red'> Product with same name already exist</span></center>";
				}
				else
				{
					echo "<center><span class='glyphicon glyphicon-ok ' style='color:green'></span></center>";
				}
	}
	public function check_duplicate_sub_cat()
	{
		$this->load->model('user/Product_model');
				$res=$this->Product_model->check_duplicate_sub_cat();
				if($res)
				{
					echo "<center><span class='glyphicon glyphicon-remove ' style='color:red'> This category already added</span></center>";
				}
				else
				{
					echo "<center><span class='glyphicon glyphicon-ok ' style='color:green'></span></center>";
				}
	}
	////////////////////////////////////function for deleting product/////////////////////////////////
	/////////////////////////////////////public function for deleting sub category//////////////////////////////
	public function delete_product($id)
	{
		$this->load->view('admin/include/session_check');
			///////////////////////////////
				$id = strtr(
            $id,
            array(
                '.' => '+',
                '-' => '=',
                '~' => '/'
            )
        );
			$id=$this->encrypt->decode($id);
			/////////////////////////////////
			$this->load->model('admin/Product_model');
			$res=$this->Product_model->delete_product($id);
			if($res)
				{
				$this->session->set_userdata('success','Successfully deleted category!');
				redirect(site_url('Product_p/all_products'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to delete category! Try Again');
				redirect(site_url('Product_p/all_products'));
			}
	}
	////////////////////////function for edit info dislay of product/////////////////////////////////
		
	public function edit_product_display($id)
	{
			$this->load->view('admin/include/session_check');
			$this->load->model('admin/Product_model');
			$this->load->model('admin/Catp_model');
			$this->load->model('admin/Attribute_model');
			$res['all_att_cat']=$this->Attribute_model->all_attr_cat();
			$res['all_cat']=$this->Catp_model->all_categories();
			$res['product_d']=$this->Product_model->edit_product_display($id);
		
			$this->load->view('admin/edit_product',$res);
	}
	////////////////////////function for edit gallery individual image dislay of product/////////////////////////////////
		
	public function edit_gallery_image_display($id)
	{
			$this->load->view('include/session_check');
			$this->load->model('user/Product_model');
			$res['g_im']=$this->Product_model->edit_gallery_image_display($id);
			$this->load->view('edit_gallery_image',$res);
	}
	////////////////function for update product in db/////////////////////
	public function update_product()
	{
			$this->load->view('admin/include/session_check');
			$this->load->model('admin/Product_model');
			$res=$this->Product_model->update_product();
			if($res)
				{
				$this->session->set_userdata('success','Successfully updated!');
				redirect(site_url('Product_p/all_products'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to update ! Try Again');
				redirect(site_url('Product_p/all_products'));
			}
	}
		////////////////function for update product gallery image in db/////////////////////
	public function update_gallery_image()
	{
			$this->load->view('include/session_check');
			$this->load->model('user/Product_model');
			$res=$this->Product_model->update_gallery_image();
			if($res)
				{
					$res=$this->encrypt->encode($res);
									 $res = strtr(
									$res,
									array(
										'+' => '.',
										'=' => '-',
										'/' => '~'
									)
								);
						
				$this->session->set_userdata('success','Successfully updated!');
				redirect(site_url("Product/all_gallery_images/$res"));
				
			}
			else
			{
				$this->session->set_userdata('failure','Failed to update ! Try Again');
				redirect(site_url('Product/all_products'));
			}
	}
	///////////////////////////////display all gallery images of particular product///////////////////////////
	public function all_gallery_images($id)
	{
		///////////////////////////////
				$id = strtr(
            $id,
            array(
                '.' => '+',
                '-' => '=',
                '~' => '/'
            )
        );
			$id=$this->encrypt->decode($id);
			/////////////////////////////////
			$this->load->model('user/Product_model');
			$data['gallery']=$this->Product_model->all_gallery_images($id);
			$data['product_name']=$this->db->query("SELECT product_name from product where product_id='".$id."'")->row();
			$this->load->view('all_gallery_images',$data);
		
	}
	//////////////////////////////////////////////////function for deleting individual gallery inage ////////////
	public function delete_gallery_image($id)
	{
		$org=$id;
		$this->load->view('include/session_check');
			///////////////////////////////
				$ids = strtr(
            $id,
            array(
                '.' => '+',
                '-' => '=',
                '~' => '/'
            )
        );
			$ids=$this->encrypt->decode($ids);
			/////////////////////////////////
			$this->load->model('user/Product_model');
			$res=$this->Product_model->delete_gallery_image($ids);
			if($res)
				{
					
					$res=$this->encrypt->encode($res);
									 $res = strtr(
									$res,
									array(
										'+' => '.',
										'=' => '-',
										'/' => '~'
									)
								);
						
				$this->session->set_userdata('success','Successfully deleted category!');
				redirect(site_url("Product/all_gallery_images/$res"));
			}
			else
			{
				
				$this->session->set_userdata('failure','Failed to delete category! Try Again');
				redirect(site_url("Product/all_products"));
			}
	}
	//////////////////////////////////////////////
	public function sub_cat_banners()
	{
		$this->load->model('user/Product_model');
		$data['all_sub_cat']=$this->Product_model->all_sub_categories();
		$this->load->view('user/sub_cat_banners',$data);
	}
	////////////////////////function for adding attribute main category///////////////////////////////////////
	public function a_product_page()
	{
			$this->load->model('user/Menu_model');
			$res=$this->Menu_model->add_attr_cat();
			if($res)
				{
				$this->session->set_userdata('success','Successfully added category of attribute!');
				redirect(site_url('Menu/all_attr_cat'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to add category! Try Again');
				redirect(site_url('Menu/all_attr_cat'));
			}
	}
	
	////////////////////function for deleting main cat of attribute///////////////////////
	public function delete_attr_cat($id)
	{
		$this->load->view('include/session_check');
			///////////////////////////////
				$id = strtr(
            $id,
            array(
                '.' => '+',
                '-' => '=',
                '~' => '/'
            )
        );
			$id=$this->encrypt->decode($id);
			/////////////////////////////////
			$this->load->model('user/Menu_model');
			$res=$this->Menu_model->delete_attr_cat($id);
			if($res)
				{
				$this->session->set_userdata('success','Successfully deleted category of attribute!');
				redirect(site_url('Menu/all_attr_cat'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to delete category! Try Again');
				redirect(site_url('Menu/all_attr_cat'));
			}
	}
	//////////////////////////////function for display edit cat data////////////////////////////
	public function edit_att_cat_display($id)
	{
			$this->load->view('include/session_check');
			$this->load->model('user/Menu_model');
			$res['cat_detail']=$this->Menu_model->edit_att_cat_display($id);
			$this->load->view('user/edit_attributes',$res);
	}
	
	////////////////function for update main cat att in db/////////////////////
	public function update_cat_att()
	{
			$this->load->view('include/session_check');
			$this->load->model('user/Menu_model');
			$res=$this->Menu_model->update_cat_att();
			if($res)
				{
				$this->session->set_userdata('success','Successfully updated category of attribute!');
				redirect(site_url('Menu/all_attr_cat'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to update category! Try Again');
				redirect(site_url('Menu/all_attr_cat'));
			}
	}
	
	////////////////////////function for attribute values page load////////////////////////
	public function all_att_value()
	{
			$this->load->model('user/Menu_model');
			$data['all_att']=$this->Menu_model->all_att_value();
			$this->load->view('user/all_food_att_values',$data);
	}
	
	//////////////////////////function for adding attribute values///////////////////////
	public function add_attr_value()
	{
			$this->load->model('user/Menu_model');
			$res=$this->Menu_model->add_attr_value();
			if($res)
				{
				$this->session->set_userdata('success','Successfully attribute!');
				redirect(site_url('Menu/all_att_value'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to add ! Try Again');
				redirect(site_url('Menu/all_att_value'));
			}
	}
	
	////////////////////function for displaying full detail of values of attribute on modal///////////////////
	public function full_detail_att_values($id)
	{
			$this->load->model('user/Menu_model');
			$res['item_det']=$this->Menu_model->full_detail_att_values($id);
			$this->load->view('user/detail_attribute_values',$res);
	}
	//////////////////////function for deleting values of attributes//////////////////////////////////////
	public function delete_attr_val($id)
	{
		$this->load->view('include/session_check');
			///////////////////////////////
				$id = strtr(
            $id,
            array(
                '.' => '+',
                '-' => '=',
                '~' => '/'
            )
        );
			$id=$this->encrypt->decode($id);
			/////////////////////
				$this->load->model('user/Menu_model');
			$res=$this->Menu_model->delete_attr_val($id);
			if($res)
				{
				$this->session->set_userdata('success','Successfully deleted  attribute!');
				redirect(site_url('Menu/all_att_value'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to delete ! Try Again');
				redirect(site_url('Menu/all_att_value'));
			}
	}
	
	//////////////////////////////funtion for display editing data of attribute //////////////////////////////////////
	public function edit_att_val_display($id)
	{
			$this->load->model('user/Menu_model');
			$res['item_det']=$this->Menu_model->full_detail_att_values($id);
			$res['att_val']=$this->Menu_model->det_att_value($id);
			$this->load->view('user/edit_attributes',$res);
	}
	
	//////////////////function for update attribute values in db//////////////////////////////
	public function update_att_items()
	{
			$this->load->model('user/Menu_model');
			$res=$this->Menu_model->update_att_items();
			if($res)
				{
				$this->session->set_userdata('success','Successfully updated!');
				redirect(site_url('Menu/all_att_value'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to update ! Try Again');
				redirect(site_url('Menu/all_att_value'));
			}
	}
	/////////////////////////////////////////////<!--===============Food items attribute asigning portion==========================>/////////////////////////////////////
	/////////////////////////function for assign attribute values page load///////////////////////////////////////////
	public function att_assign_page()
	{
			$this->load->model('user/Menu_model');
			$data['all_att']=$this->Menu_model->all_attr_cat();
			
			$this->load->view('user/food_att_assign_page',$data);
	}
	
	///////////////////////////////////function for all assigned attributes display///////////////////////////////////
	public function all_assigned_attributes($id)
	{
			
			$this->load->model('user/Menu_model');
			$data['all_asigned']=$this->Menu_model->all_assigned_attributes($id);
			$data['all_att']=$this->Menu_model->all_att_value();
			$data['main_cat']=$id;
			$this->load->view('user/all_assigned_att_modal',$data);
	}
	
	//////////////////////////////////function assign attribute values to cat////////////////////////////
	public function assign_att_values()
	{
			
			$this->load->model('user/Menu_model');
			$res=$this->Menu_model->assign_att_values();
			if($res)
				{
				$this->session->set_userdata('success','Successfully updated!');
				redirect(site_url('Menu/att_assign_page'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to update ! Try Again');
				redirect(site_url('Menu/att_assign_page'));
			}
			
	}
	//////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////all products of web home page portion/////////////////////
	
	
	
}