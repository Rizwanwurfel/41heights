<?php
defined('BASEPATH') OR exit('No direct script access allowed');
////////////////for admin portal  product attributes management controller
class Att_p extends CI_Controller {
	/////////////////////////////////////////////<!--===============attribute portion==========================>/////////////////////////////////////
	public function all_attr_cat()
	{
			$this->load->model('admin/Attribute_model');
			$data['all_cat']=$this->Attribute_model->all_attr_cat();
			$this->load->view('admin/all_attr_categories',$data);
	}
		////////////////////////function for adding attribute main category///////////////////////////////////////
	public function add_attr_cat()
	{
			$this->load->model('admin/Attribute_model');
			$res=$this->Attribute_model->add_attr_cat();
			if($res)
				{
				$this->session->set_userdata('success','Successfully added category of attribute!');
				redirect(site_url('Att_p/all_attr_cat'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to add category! Try Again');
				redirect(site_url('Att_p/all_attr_cat'));
			}
	}
		////////////////////function for deleting main cat of attribute///////////////////////
	public function delete_attr_cat($id)
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
			$this->load->model('admin/Attribute_model');
			$res=$this->Attribute_model->delete_attr_cat($id);
			if($res)
				{
				$this->session->set_userdata('success','Successfully deleted category of attribute!');
				redirect(site_url('Att_p/all_attr_cat'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to delete category! Try Again');
				redirect(site_url('Att_p/all_attr_cat'));
			}
	}
	////////////////////////function for attribute values page load////////////////////////
	public function all_att_value()
	{
			$this->load->model('admin/Attribute_model');
			$data['all_att']=$this->Attribute_model->all_att_value();
			$data['all_cat']=$this->Attribute_model->all_attr_cat();
			$this->load->view('admin/all_att_values',$data);
	}
	////////////////////function for displaying full detail of values of attribute on modal///////////////////
	public function full_detail_att_values($id)
	{
			$this->load->model('admin/Attribute_model');
			$res['item_det']=$this->Attribute_model->full_detail_att_values($id);
			$this->load->view('admin/detail_attribute_values',$res);
	}
	////////////////////////////////////
	public function edit_att_cat_display($id)
	{
		$this->load->model('admin/Attribute_model');
		$res['cat_detail']=$this->Attribute_model->edit_att_cat_display($id);
		$this->load->view('admin/edit_attributes',$res);
	}
		////////////////function for update main cat att in db/////////////////////
	public function update_att_cat()
	{
			
			$this->load->model('admin/Attribute_model');
			$res=$this->Attribute_model->update_att_cat();
			if($res)
				{
				$this->session->set_userdata('success','Successfully updated category of attribute!');
				redirect(site_url('Att_p/all_attr_cat'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to update category! Try Again');
				redirect(site_url('Att_p/all_attr_cat'));
			}
	}
	//////////////////////////////funtion for display editing data of attribute //////////////////////////////////////
	public function edit_att_val_display($id)
	{
			$this->load->model('admin/Attribute_model');
			$this->load->model('admin/Attribute_model');
			$res['all_att_cat']=$this->Attribute_model->all_attr_cat();
			$res['item_det']=$this->Attribute_model->full_detail_att_values($id);
			$res['att_val']=$this->Attribute_model->det_att_name($id);
			$this->load->view('admin/edit_attributes',$res);
	}
		//////////////////////////function for adding attribute values///////////////////////
	public function add_attr_value()
	{
			//var_dump($this->input->post());
			//exit;
			$this->load->model('admin/Attribute_model');
			$res=$this->Attribute_model->add_attr_value();
			if($res)
				{
				$this->session->set_userdata('success','Successfully added!');
				redirect(site_url('Att_p/all_att_value'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to add ! Try Again');
				redirect(site_url('Att_p/all_att_value'));
			}
	}
		//////////////////////////function for adding attribute new value///////////////////////
	public function add_attr_new_value()
	{
			
			$this->load->model('admin/Attribute_model');
			$res=$this->Attribute_model->add_attr_new_value();
			if($res)
				{
				$this->session->set_userdata('success','Successfully added!');
				redirect(site_url('Att_p/all_att_value'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to add ! Try Again');
				redirect(site_url('Att_p/all_att_value'));
			}
	}
	///////////////////////////////function for updating attribute items/////////////////////
	public function update_att_items()
	{
		$this->load->model('admin/Attribute_model');
		$res=$this->Attribute_model->update_att_items();
			if($res)
				{
				$this->session->set_userdata('success','Successfully updated!');
				redirect(site_url('Att_p/all_att_value'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to update ! Try Again');
				redirect(site_url('Att_p/all_att_value'));
			}
	}
	///////////////////////////////////////////function for deleting attribute name and values///////////////////////
	public function delete_att($id)
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
		$this->load->model('admin/Attribute_model');
		$res=$this->Attribute_model->delete_att($id);
			if($res)
				{
				$this->session->set_userdata('success','Successfully Deleted!');
				redirect(site_url('Att_p/all_att_value'));
			}
			else
			{
				$this->session->set_userdata('failure','Failed to Delete ! Try Again');
				redirect(site_url('Att_p/all_att_value'));
			}
	}
	

}