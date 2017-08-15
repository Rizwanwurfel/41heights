<?php 
	if(!($this->session->userdata('user_logged_in_emb') && $this->session->userdata('user_email_emb')))
	{
		redirect(site_url('Admin'));
	}
?>