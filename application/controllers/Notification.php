<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller 
{
	  function __construct()
      {
        parent::__construct();        
      }
	  
	  ///////////////////////////pubic function check for new order notfication///////
	  public function check_new()
	  {
		$this->load->model("admin/Notification_model");
		$data=$this->Notification_model->check_new();
		if(empty($data) || !$data)
		{
			echo "nil";
		}
		else
		{
			
			$notification=array();
			foreach($data->result_array() as $row)
			{	
				echo  $row['order_id'];
				break;
			}
		}
		
	  }
	  ///////////////////////function for db update that alert has been given////////////////
	  public function alerted_already()
	  {
		$id=$this->input->post('cit');
		$update=$this->db->query("Update `order` set `alerted`='1' where `order_id`='".$id."'");
		
		if($update)
		{
			echo "done";
		}
		else
		{
			echo "failed";
		}
		
	  }
	  
	  ///////////////////////function if need of new texton bell notification/////////////////
	  public function check_label()
	  {
			$this->load->model("admin/Notification_model");
			$data=$this->Notification_model->check_label();
			if($data)
			{
				foreach($data->result_array() as $row)
				{	
					echo  $row['order_id'];
					break;
				}
			}
			else
			{
				
				echo "noneed";
			}
	  }
	  	//////////////////////////function for load order at particular notification id////////////////////////////////////
	public function load_notification_order($id)
	{
			$this->load->model('admin/Order_model');
			$page_display['order_no']=$id;
			$page_display['pro_details']=$this->Order_model->show_all_pending_orders();
			$this->load->view('admin/all_pending_orders',$page_display);
			//$this->load->view('pages/testing',$page_display);
	}
	/////////////////////////////////////function for send push notifications to android devices  /////page load//////////////////
	public function notification_page()
	{
		$this->load->view('admin/android_notification');
	}
	///////////////////////////////function for sending push notification to android//////////////////////////////
	public function send_android_notification()
	{
		$this->load->model("admin/Notification_model");
		$res=$this->Notification_model->send_android_notification();
		/*if($res)
		{
			$this->session->set_userdata('success','Successfully sent!');
			$url = 'Notification/notification_page';
			echo'
			<script>
			window.location.href = "'.site_url().$url.'";
			</script>
			';
		}
		else
		{
			$this->session->set_userdata('failure','failed!');
			
			$url = 'Notification/notification_page';
			echo'
			<script>
			window.location.href = "'.site_url().$url.'";
			</script>
			';
		}*/
	}
	///////////////////////////////function for sending push notification to android//////////////////////////////
	public function send_android_notification2()
	{
		$this->load->model("admin/Notification_model");
		$res=$this->Notification_model->send_android_notification2();
	}
	///////////////////////////////////function for waiter call checking ///////////////////
	public function check_waitercall()
	{
		$this->load->model("admin/Notification_model");
		$res=$this->Notification_model->check_waitercall();
		if($res)
		{
			echo "ring";
		}
		else
		{
			echo "no_need";
		}
	}
	//////////////////////////////function for update value of waiter call status //////////
	public function update_waitercall()
	{
		$update=$this->db->query("update `waiter_call` set `call_status`='0'");
		redirect(site_url('Welcome/dashboard_load'));
	}
}