<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('login_model');

    }
	public function index()
	{
        if($this->session->userdata('adminData'))
        {
            echo "<script>window.location.assign('".base_url()."dashboard');</script>";
        }
		$this->load->view("authen/login");
	}

	public function Verify()
	{

        $username = $this->input->post('username');
		if($this->session->userdata('isSession') === true)
		{
			echo "<script>window.location.assign('".base_url()."dashboard');</script>";
            exit();
		}
		$pass = md5($this->input->post('password'));

		$q = $this->login_model->checkLogin($username,$pass);
        if(!empty($q))
        {
            $user =  array_get($q,0);

            $this->session->set_userdata('isSession',true);
            $this->session->set_userdata('adminData',array_get($user,'account'));
            $this->session->set_userdata('role',array_get($user, 'role_id'));

            $menu = $this->getMenu();
            $action = $this->getPermission(array_get($user, 'role_id'));
            $this->session->set_userdata('menu',$menu);
            $this->session->set_userdata('userPermission',$action);

            echo "<script>window.location.assign('".base_url('dashboard')."');</script>";
            exit();

        }
        else
        {

            echo "<script>alert('Username or Password is wrong'); window.location='".base_url('login')."';</script>";
            exit();
        }

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

	protected  function getMenu()
    {
        return $this->login_model->getMenu();
    }

	public function Logout()
	{
        $this->session->sess_destroy();
        $this->session->unset_userdata('admin');
		echo "<script>alert('Success');window.location.assign('".base_url()."login');</script>";
	}
	
}