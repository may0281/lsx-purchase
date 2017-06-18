<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lang extends CI_Controller {

	public function change($type)
	{
	
		$this->session->set_userdata('lang',$type);
		
		echo "<meta http-equiv=\"refresh\" content=\"0;url=".$_SERVER['HTTP_REFERER']."\"/>";
	}
}