<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class stock extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
//		error_reporting(0);
		if($this->session->userdata('isSession') == false){

            echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
        $this->load->model('project_model');
	}


	
	public function add_product()
    {
		$data = array(
            'menu'=> 'Stock',
            'subMenu'=> 'Add Product'
        );

		$this->load->view('template/left');
        $this->load->view('stock/add_product',$data);
    }
	
	public function list_product()
    {
		$data = array(
            'menu'=> 'Stock',
            'subMenu'=> 'List Product'
        );

		$this->load->view('template/left');
        $this->load->view('stock/list_product',$data);
    }
	
	public function tracking_order()
    {
		$data = array(
            'menu'=> 'Stock',
            'subMenu'=> 'Tracking Order'
        );

		$this->load->view('template/left');
        $this->load->view('stock/tracking_order',$data);
    }
	
}