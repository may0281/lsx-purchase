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
        $this->load->model('login_model');
		$this->load->model('dashboard_model');
	}
	
	
	public function index()
	{
        $data = array(
            'menu'=> 'dashboard',
			'all' => $this->dashboard_model->getCountPurchaseByStatus(),
			'request' =>  $this->dashboard_model->getCountPurchaseByStatus('request'),
			'unapproved' =>  $this->dashboard_model->getCountPurchaseByStatus('unapproved'),
			'approved' =>  $this->dashboard_model->getCountPurchaseByStatus('approved'),
			'reject' =>  $this->dashboard_model->getCountPurchaseByStatus('reject'),
			'pending' =>  $this->dashboard_model->getCountPurchaseByStatus('pending'),
			'completed' =>  $this->dashboard_model->getCountPurchaseByStatus('completed'),
        );
        $this->load->view('template/left');
        $this->load->view('dashboard',$data);

	}

	public function getYear()
    {
        header('Content-Type: application/json');
        $allData = array();
        for($i=1; $i<=12;$i++)
        {
            $date = date('Y').'-'.$i.'-01';
            $timeStamp = strtotime($date);

            $data = array(
                $i => array(str_pad($timeStamp,13 ,0,STR_PAD_RIGHT),$this->dashboard_model->getSumPurchaseByMonth($i))
            );
            $allData = array_merge($allData,$data);
        }

        echo json_encode($allData);

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
	
	public function updatechart()
	{
		$this->dashboard_model->updateChart();
	}
	
}