<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		
		if($this->session->userdata('isSession') == false){
			echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
		$lang = $this->session->userdata("lang")==null?"thailand":$this->session->userdata("lang");
		$this->lang->load($lang,$lang);
		$this->load->library('resize');
		
	}
	
	
	public function index()
	{
        $this->load->view('template/left');
	}
	

	public function insertaddress()
	{
		$address = $this->input->post('address');
		$this->db->update('address', array('Address' => $address), array('ID' => '1'));
		echo "<script>window.location.assign('".base_url()."dashboard');</script>";
	}

	
}