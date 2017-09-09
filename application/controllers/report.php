<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class report extends CI_Controller {
    private $menu;
	public function __construct()
	{
        error_reporting(0);
		parent::__construct();
		if($this->session->userdata('isSession') == false){
            echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
        $this->load->model('report_model');
        $this->menu = 'Report';
        $this->submenu = 'weekly';
        $this->major = 'report';
        $this->minor = 'weekly';
    }

	public function weekly()
	{
        $monday = date( 'Y-m-d', strtotime( 'monday this week' ) );
        $sunday = date( 'Y-m-d', strtotime( 'sunday this week' ) );
        
        $projects = $this->report_model->getProjectList();
        $i = 0;
        $all = array();
        foreach ($projects as $project)
        {
            $proj_id = $project['proj_id'];
            $itemList = $this->report_model->getItemTrackingByProject($proj_id,$monday,$sunday);
            if($itemList)
            {
                $data = array(
                    $i => array(
                        'proj_id' => $proj_id,
                        'proj_name' => $project['proj_name'],
                        'purchase' => $itemList
                    ),
                );
                $i++;
                $all = array_merge($all,$data);
            }

        }

	}






}