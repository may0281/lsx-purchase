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
		$this->create();
    }
	
	public function create()
    {
		$create_by = $this->project_model->getUserlogin($this->session->userdata('adminData'));
		$company = $this->project_model->getCompany();
        $data = array(
            'menu'=> 'Project',
            'subMenu'=> 'Create Project',
			'company'=> $company,
			'create_by'=> $create_by,
            'q' => $this->project_model->getProjectList()
        );
        $this->load->view('template/left');
        $this->load->view('project/create',$data);
    }
	
	public function edit()
    {
		$proj_id = $this->uri->segment(3);
        $data = array(
            'menu'=> 'Project',
            'subMenu'=> 'Edit',
			'proj_id'=> $proj_id,
			'companyList'=> $this->project_model->getCompany(),
			'ProjectData'=> $this->project_model->getProjectby($proj_id)
        );
        $this->load->view('template/left');
        $this->load->view('project/edit',$data);

    }
	
	public function del()
    {
		$this->project_model->deleteProject($this->uri->segment(3));
		echo "<script>alert('Delete Successful.'); window.location.assign('".base_url()."index.php/project/lists'); </script>";
    }
	
	public function lists()
    {
        $data = array(
            'menu'=> 'Project',
            'subMenu'=> 'Project List',
            'q' => $this->project_model->getProjectList()
        );
        $this->load->view('template/left');
        $this->load->view('project/lists',$data);

    }
	
	public function create_action()
    {
		 $proj_name = $this->input->post('name');
		 $proj_owner = $this->input->post('create_by');
		 
		 if($this->input->post('new_company') == "" && $this->input->post('company') != ""){
			$compa_id = $this->input->post('company');
			
		 }else if($this->input->post('new_company') != "" && $this->input->post('company') != ""){
			$compa_id = $this->input->post('company');
			
		 }else if($this->input->post('new_company') != "" && $this->input->post('company') == ""){
		 	$compa_id = $this->project_model->updateCompany($this->input->post('new_company'));
		 }else{
			echo "<script>alert('Please select company.'); window.location.assign('".base_url()."index.php/project/create'); </script>";
			exit();
		 }
		
		 $proj_about  = $this->input->post('detail');

		 date_default_timezone_set('asia/bangkok');
		 $data = array(
            'proj_name'=> $proj_name,
            'proj_owner'=> $this->project_model->getUserlogin($this->session->userdata('adminData')),
			'compa_id'=> $compa_id,
			'proj_createdate'=> date('Y-m-d H:i:s'),
			'proj_about'=> $proj_about,
			'status'=> '1'
         );
		$this->project_model->createProject($data);
		echo "<script>alert('Success.'); window.location.assign('".base_url()."index.php/project/lists'); </script>";
		exit();
    }

	public function update_action()
    {
		 $proj_name = $this->input->post('name');
		 $proj_id = $this->input->post('proj_id');
		 if($this->input->post('new_company') == "" && $this->input->post('company') != ""){
			$compa_id = $this->input->post('company');
			
		 }else if($this->input->post('new_company') != "" && $this->input->post('company') != ""){
			$compa_id = $this->input->post('company');
			
		 }else if($this->input->post('new_company') != "" && $this->input->post('company') == ""){
		 	$compa_id = $this->project_model->updateCompany($this->input->post('new_company'));
		 }else{
			echo "<script>alert('Please select company.'); window.location.assign('".base_url()."index.php/project/create'); </script>";
			exit();
		 }
		
		 $proj_about  = $this->input->post('detail');
		 date_default_timezone_set('asia/bangkok');
		 $data = array(
            'proj_name'=> $proj_name,
			'compa_id'=> $compa_id,
			'proj_about'=> $proj_about,
			'status'=> '1'
         );
        try
        {
            $this->project_model->updateProject($proj_id,$data);
            echo "<script> window.location.assign('".base_url()."project/lists'); </script>";
            exit();

        }
        catch (\Exception $e)
        {
            echo "<script> history.back(); </script>";
            exit();
        }
    }
	
}