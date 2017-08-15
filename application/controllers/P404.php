<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
///for website checkout and cart controller
class P404 extends CI_Controller
{
	public function index()
	{
		$this->load->view('page_404');
	}
	
}