<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class project extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
//		error_reporting(0);
		if($this->session->userdata('isSession') == false){

            echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
        $this->load->model('project_model');
	}


    public function index()
    {
		echo "pp";

        $data = array(
            'menu'=> 'Project',
            'subMenu'=> 'Project List',
            'q' => $this->project_model->getProjectList()
        );
        $this->load->view('template/left');
        $this->load->view('project/index',$data);

    }

	
}