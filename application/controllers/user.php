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
        $this->load->model('role_model');
        $this->load->database();
        $this->menu = 'User Management';
        $this->major = 'authen';
        $this->minor = 'init-user';

	}


    public function index()
    {
        $permission = $this->hublibrary_model->permission($this->major,$this->minor,'view');
        if($permission == false)
        {
            echo $this->load->view('template/left','',true);
            echo $this->load->view('template/400','',true);
            die();
        }
        $data = array(
            'menu'=> $this->menu,
            'q' => $this->user_model->getUser()
        );
        $this->load->view('template/left');
        $this->load->view('user/index',$data);

    }

    public function createUser()
    {
        $permission = $this->hublibrary_model->permission($this->major,$this->minor,'create');
        if($permission == false)
        {
            echo $this->load->view('template/left','',true);
            echo $this->load->view('template/400','',true);
            die();
        }
        $data = array(
            'menu'=> $this->menu,
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

        if (!filter_var($this->input->post('account'), FILTER_VALIDATE_EMAIL)) {

            $data['message'] = $this->input->post('account').' is invalid email format';
            echo $this->load->view('error/db',$data,true);
            die();
        }
        $role = $this->role_model->getRoleByRoleCode($this->input->post('role_id'));
        if(empty($role))
        {
            $data['message'] = 'The role ['.$this->input->post('role_id').'] is empty. <br>  Please select other role.';
            echo $this->load->view('error/db',$data,true);
            die();
        }

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
        $permission = $this->hublibrary_model->permission($this->major,$this->minor,'update');
        if($permission == false)
        {
            echo $this->load->view('template/left','',true);
            echo $this->load->view('template/400','',true);
            die();
        }
        $data = array(
            'menu'=> $this->menu,
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
        if (!filter_var($this->input->post('account'), FILTER_VALIDATE_EMAIL)) {

            $data['message'] = $this->input->post('account').' is invalid email format';
            echo $this->load->view('error/db',$data,true);
            die();
        }
        $role = $this->role_model->getRoleByRoleCode($this->input->post('role_id'));
        if(empty($role))
        {
            $data['message'] = 'The role ['.$this->input->post('role_id').'] is empty. <br>  Please select other role.';
            echo $this->load->view('error/db',$data,true);
            die();
        }

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
        $permission = $this->hublibrary_model->permission($this->major,$this->minor,'delete');
        if($permission == false)
        {
            echo "<script>alert('Method Disallow.'); history.back(); </script>";
            exit();
        }
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

    public function changPassword()
    {
        $user = $this->session->userdata('adminData');
        $oldpass =  md5($this->input->post('oldpass'));

        if($this->input->post('oldpass') == '')
        {
            echo "<script>alert('Input you current password!');history.back();</script>";
            exit();
        }
        if($this->input->post('pass1') == '')
        {
            echo "<script>alert('Input new password!');history.back();</script>";
            exit();
        }
        if($this->input->post('cpass1') == '')
        {
            echo "<script>alert('Input confirm password!');history.back();</script>";
            exit();
        }
        if($this->input->post('pass1') != $this->input->post('cpass1'))
        {
            echo "<script>alert('Confirm Password not match');history.back();</script>";
            exit();
        }

        $q = $this->user_model->checkUserdata($user,$oldpass);


        if($q){
            $data = array('password' => md5($this->input->post('pass1')));
            $this->db->where('account', $user);
            $this->db->update('bn_user_profile', $data);
            echo "<script>alert('Success!!! Your password has been changed');history.back();</script>";
        }
        else
        {
            echo "<script>alert('Username or Password is wrong');window.location.assign('".base_url()."dashboard');</script>";
        }



    }



	
}