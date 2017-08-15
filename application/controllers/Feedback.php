<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback extends CI_Controller
{
	////////////////////////////feedbacks against particular order from android//////////////
	public function android_feebacks()
	{
		$this->load->model('admin/Feedback_model');
		$data['and_feed']=$this->Feedback_model->android_feebacks();
		$this->load->view('admin/android_feedbacks',$data);
	}
	///////////////deleting feedback from admin portal//////////
	public function delete_feedback($id)
	{
		$this->load->model('admin/Feedback_model');
		$res=$this->Feedback_model->delete_feedback($id);
		if($res)
		{
			$this->session->set_userdata("success", "feedback deleted successfully");
			redirect(site_url('Feedback/android_feebacks'));
		}
		else
		{
			$this->session->set_userdata("failure", "Failed to  delete!");
			redirect(site_url('Feedback/android_feebacks'));
		}
	}
}