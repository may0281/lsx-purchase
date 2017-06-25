<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class role extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
//		error_reporting(0);
		if($this->session->userdata('isSession') == false){

            echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
        $this->load->model('role_model');
	}

	public function index()
	{

        $data = array(
            'menu'=> 'Role',
            'subMenu'=> 'Role List',
            'q' => $this->role_model->getMajor()
        );
        $this->load->view('template/left');
        $this->load->view('role/index',$data);

	}
   
	
}