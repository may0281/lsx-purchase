<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class purchase extends CI_Controller {
    private $menu;
    private $purchaseRequest;
	public function __construct()
	{

		parent::__construct();
//		error_reporting(0);
		if($this->session->userdata('isSession') == false){

            echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
        $this->load->model('role_model');
        $this->load->model('project_model');

        $this->menu = 'Purchase';
        $this->purchaseRequest = 'Purchase Request';
	}

	public function index()
	{
        $data = array(
            'menu'=> 'Role',
            'subMenu'=> 'Role List',

        );
        $this->load->view('template/left');
        $this->load->view('role/index',$data);

	}

	public function request()
    {
//        sd($this->session->all_userdata());
        $this->load->model('user_model');
        $data = array(
            'menu' => $this->menu,
            'subMenu' => $this->purchaseRequest,
            'projects' => $this->project_model->getNameProjectList(),
            'users' => $this->user_model->getNameUser()
        );

        $this->load->view('template/left');
        $this->load->view('purchase/manage',$data);
    }




	
}