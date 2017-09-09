<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class project extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		error_reporting(0);
        if($this->session->userdata('isSession') == false){

            echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
        }
        $this->load->model('hublibrary_model');
        $this->load->model('project_model');
        $this->major="project";
        $this->minor="init-project";
    }


    public function index()
    {
        $this->create();
    }

    public function create()
    {
        $permission = $this->hublibrary_model->permission($this->major,$this->minor,'create');
        if($permission == false)
        {
            echo $this->load->view('template/left','',true);
            echo $this->load->view('template/400','',true);
            die();
        }

        $create_by = $this->project_model->getUserlogin($this->session->userdata('adminData'));
        $data = array(
            'menu'=> 'Project',
            'subMenu'=> 'Create New Project',
            'create_by'=> $create_by,
            'q' => $this->project_model->getProjectList()
        );
        $this->load->view('template/left');
        $this->load->view('project/create',$data);
    }

    public function edit($proj_id)
    {

        $data = array(
            'menu'=> 'Project',
            'subMenu'=> 'Edit',
            'proj_id'=> $proj_id,
            'ProjectData'=> $this->project_model->getProjectby($proj_id)
        );
        $this->load->view('template/left');
        $this->load->view('project/edit',$data);

    }

    public function del()
    {
        $this->project_model->deleteProject($this->uri->segment(3));
        echo "<script>alert('Delete Successful.'); window.location.assign('".base_url()."project/lists'); </script>";
    }

    public function lists()
    {
        $permission = $this->hublibrary_model->permission($this->major,$this->minor,'view');
        if($permission == false)
        {
            echo $this->load->view('template/left','',true);
            echo $this->load->view('template/400','',true);
            die();
        }

        $data = array(
            'menu'=> 'Project',
            'subMenu'=> 'Project List',
            'q' => $this->project_model->getProjectList($this->session->userdata('adminData'))
        );
        $this->load->view('template/left');
        $this->load->view('project/lists',$data);

    }

    public function create_action()
    {
        $proj_name = $this->input->post('name');
        $proj_owner = $this->input->post('create_by');


        $proj_about  = $this->input->post('detail');

        date_default_timezone_set('asia/bangkok');
        $data = array(
            'proj_name'=> $proj_name,
            'proj_owner'=> $this->project_model->getUserlogin($this->session->userdata('adminData')),
            'proj_createdate'=> date('Y-m-d H:i:s'),
            'proj_about'=> $proj_about,
            'status'=> '1'
        );
        $this->project_model->createProject($data);
        echo "<script>alert('Success.'); window.location.assign('".base_url()."project/lists'); </script>";
        exit();
    }

    public function update_action()
    {
        $proj_name = $this->input->post('name');
        $proj_id = $this->input->post('proj_id');
        $proj_about  = $this->input->post('detail');
        date_default_timezone_set('asia/bangkok');
        $data = array(
            'proj_name'=> $proj_name,
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