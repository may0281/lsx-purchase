<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
//		error_reporting(0);
		
		if($this->session->userdata('isSession') == false){

//            echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
		$lang = $this->session->userdata("lang")==null?"thailand":$this->session->userdata("lang");
        $this->load->model('login_model');
	}
	
	
	public function index()
	{

//        return $this->getMenu();
        $data = array(
            'menu'=> 'dashboard'
        );
        $this->load->view('template/left');
        $this->load->view('dashboard',$data);

	}
    protected function getPermission($role = null)
    {
        if($role == null)
        {
            return array();
        }
        $permission = $this->login_model->getPermission($role);

        return $permission;
    }
    protected function prepareMenu($permission,$majorList)
    {

    }
    protected  function getMenu()
    {
        return $this->login_model->getMenu();
    }

	
}