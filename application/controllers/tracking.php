<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tracking extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		if($this->session->userdata('isSession') == false){

            echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
		$this->load->model('hublibrary_model');
        $this->load->model('tracking_model');
		$this->major="tracking";
	}

    public function index()
    {
        $permission = $this->hublibrary_model->permission($this->major,0,'view');
        if($permission == false)
        {
            echo $this->load->view('template/left','',true);
            echo $this->load->view('template/400','',true);
            die();
        }
        $item = $this->tracking_model->getItemTracking();
        $data = array(
            'menu'=> 'Stock',
            'subMenu'=> 'Tracking Order',
            'item' => $item

        );
        $this->load->view('template/left');
        $this->load->view('tracking/tracking_order',$data);
    }

}