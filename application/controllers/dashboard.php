<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
//		error_reporting(0);
		
		if($this->session->userdata('isSession') == false){

           echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
		$lang = $this->session->userdata("lang")==null?"thailand":$this->session->userdata("lang");
        $this->load->model('login_model');
		$this->load->model('dashboard_model');
	}
	
	
	public function index()
	{
		$this->updatechart();
        $data = array(
            'menu'=> 'dashboard',
			'jan_t' => $this->dashboard_model->getPurchaseTotal('jan'),
			'jan_s' => $this->dashboard_model->getPurchaseStamp('jan'),
			'feb_t' => $this->dashboard_model->getPurchaseTotal('feb'),
			'feb_s' => $this->dashboard_model->getPurchaseStamp('feb'),
			'mar_t' => $this->dashboard_model->getPurchaseTotal('mar'),
			'mar_s' => $this->dashboard_model->getPurchaseStamp('mar'),
			'apr_t' => $this->dashboard_model->getPurchaseTotal('apr'),
			'apr_s' => $this->dashboard_model->getPurchaseStamp('apr'),
			'may_t' => $this->dashboard_model->getPurchaseTotal('may'),
			'may_s' => $this->dashboard_model->getPurchaseStamp('may'),
			'jun_t' => $this->dashboard_model->getPurchaseTotal('jun'),
			'jun_s' => $this->dashboard_model->getPurchaseStamp('jun'),
			'jul_t' => $this->dashboard_model->getPurchaseTotal('jul'),
			'jul_s' => $this->dashboard_model->getPurchaseStamp('jul'),
			'aug_t' => $this->dashboard_model->getPurchaseTotal('aug'),
			'aug_s' => $this->dashboard_model->getPurchaseStamp('aug'),
			'sep_t' => $this->dashboard_model->getPurchaseTotal('sep'),
			'sep_s' => $this->dashboard_model->getPurchaseStamp('sep'),
			'oct_t' => $this->dashboard_model->getPurchaseTotal('oct'),
			'oct_s' => $this->dashboard_model->getPurchaseStamp('oct'),
			'nov_t' => $this->dashboard_model->getPurchaseTotal('nov'),
			'nov_s' => $this->dashboard_model->getPurchaseStamp('nov'),
			'dec_t' => $this->dashboard_model->getPurchaseTotal('dec'),
			'dec_s' => $this->dashboard_model->getPurchaseStamp('dec'),
			'c_request' => $this->dashboard_model->getRequeststatus(),
			'c_approve' =>  $this->dashboard_model->getApprovestatus(),
			'c_reject' =>  $this->dashboard_model->getRejectstatus(),
			'c_delivered' =>  $this->dashboard_model->getDeliveredstatus()
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
	
	public function updatechart()
	{
		$this->dashboard_model->updateChart();
	}
	
}