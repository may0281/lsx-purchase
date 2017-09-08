<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'controllers/purchase.php');
class report extends CI_Controller {
    private $menu;
	public function __construct()
	{
        error_reporting(0);
		parent::__construct();
		if($this->session->userdata('isSession') == false){
            echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
        $this->load->model('purchase_model');
        $this->load->model('project_model');
        $this->load->model('stock_model');
        $this->load->model('user_model');
        $this->menu = 'Report';
        $this->submenu = 'List';
        $this->major = 'purchase';
        $this->minor = 'po';
        $this->create = 'create';
        require_once(APPPATH.'controllers/purchase.php');


    }

	public function weekly()
	{
        $permission = $this->hublibrary_model->permission($this->major,$this->minor,'view');
        if($permission == false)
        {
            echo $this->load->view('template/left','',true);
            echo $this->load->view('template/400','',true);
            die();
        }

        $data = array(
            'menu'=> $this->menu,
            'subMenu'=> $this->submenu,
            'data' => $this->purchase_model->getPurchaseOrder(),
        );

        $this->load->view('template/left');
        $this->load->view('purchase/po-report',$data);

	}



}