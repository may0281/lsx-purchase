<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
//		error_reporting(0);
		if($this->session->userdata('isSession') == false){

            echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
		$lang = $this->session->userdata("lang")==null?"thailand":$this->session->userdata("lang");
        $this->load->model('user_model');
        $this->load->database();
	}


    public function index()
    {

        $data = array(
            'menu'=> 'User',
            'subMenu'=> 'User List',
            'q' => $this->user_model->getUser()
        );
        $this->load->view('template/left');
        $this->load->view('user/index',$data);

    }

    public function createUser()
    {
        $data = array(
            'menu'=> 'User',
            'subMenu'=> 'Create User',
            'roles' => $this->user_model->getRole()
        );
        $this->load->view('template/left');
        $this->load->view('user/create',$data);

    }

    public function createAction()
    {
        $bn_user_profile = array(
            'account' => $this->input->post('account'),
            'password' => md5($this->input->post('pass')),
            'role_id' => $this->input->post('role_id'),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'mobile' => $this->input->post('mobile'),
            'create_by' => $this->session->userdata('adminData'),
            'create_date' => date('Y-m-d H:i:s'),
            'status' => $this->input->post('status'),
        );
        try
        {
            $this->user_model->createUser($bn_user_profile);

            if($this->db->_error_message())
            {
                $data['message'] = $this->db->_error_message();
                echo $this->load->view('error/db',$data,true);
                die();
            }

            echo "<script>alert('Success'); window.location.assign('".base_url()."authen/init-user'); </script>";
            exit();

        }
        catch (\Exception $e)
        {
            echo "<script> history.back(); </script>";
            exit();
        }

    }

    public function updateUser($account)
    {
        $data = array(
            'menu'=> 'User',
            'subMenu'=> 'Update User',
            'roles' => $this->user_model->getRole(),
            'userData' => $this->user_model->getUserData($account)
        );
        $this->load->view('template/left');
        $this->load->view('user/update',$data);

    }

    public function updateAction()
    {
        $account = $this->input->post('account');
        $bn_user_profile = array(
            'role_id' => $this->input->post('role_id'),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'mobile' => $this->input->post('mobile'),
            'update_by' => $this->session->userdata('adminData'),
            'update_date' => date('Y-m-d H:i:s'),
            'status' => $this->input->post('status'),
        );
        try
        {
            $this->user_model->updateUserData($account,$bn_user_profile);
            if($this->db->_error_message())
            {
                $data['message'] = $this->db->_error_message();
                echo $this->load->view('error/db',$data,true);
                die();
            }

            echo "<script>alert('Success'); window.location.assign('".base_url()."authen/init-user'); </script>";
            exit();

        }
        catch (\Exception $e)
        {
            echo "<script> history.back(); </script>";
            exit();
        }

    }

    public function deleteUser($account)
    {

        $masterFlag  = $this->user_model->getMasterFlag($account);

        if($masterFlag == 'Y')
        {
            echo "<script>alert('Can not delete this user is master.'); history.back(); </script>";
            exit();
        }

        try
        {
            $this->db->delete('bn_user_profile', array('account' => $account));
            echo "<script> window.location.assign('".base_url()."authen/init-user'); </script>";
            exit();

        }
        catch (\Exception $e)
        {
            echo "<script>alert('Opp!! Something went wrong. Please try again.'); history.back(); </script>";
            exit();
        }
    }

    public function enable($status,$account)
    {

        $data = array(
            'status' => $status
        );
        try
        {
            $this->user_model->updateUserData($account,$data);
            echo "<script> window.location.assign('".base_url()."authen/init-user'); </script>";
            exit();

        }
        catch (\Exception $e)
        {
            echo "<script>alert('Opp!! Something went wrong. Please try again.'); history.back(); </script>";
            exit();
        }
    }




	
}