<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class role extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
//		error_reporting(0);
		if($this->session->userdata('isSession') == false){

            echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
        $this->load->model('role_model');
	}

	public function index()
	{
        $data = array(
            'menu'=> 'Role',
            'subMenu'=> 'Role List',
            'q' => $this->role_model->getRole()
        );
        $this->load->view('template/left');
        $this->load->view('role/index',$data);

	}

	public function createRole()
    {
        $functions = $this->prepareMenu();
        $data = array(
            'menu' => 'Role',
            'subMenu' => 'Create Role',
            'function' => $functions,
        );

        $this->load->view('template/left');
        $this->load->view('role/create',$data);
    }

    public function prepareMenu()
    {
        $sql = 'select func_master_ids as masterId,func_master_name_en as masterName,IFNULL(func_minor_ids,0) as minorId,IFNULL(func_minor_name_en,"-") as minorName 
                from bn_func_major a left join bn_func_minor c on a.func_master_ids = c.func_master_id ORDER by func_master_ids asc';
        $query = $this->db->query($sql);
        $data = $query->result_array();
        $i=0;
        foreach ($data as $m)
        {
            $this->db->select('func_minor_sub_ids as minorSubId, func_minor_sub_name as minorSubName');
            $this->db->from('bn_func_minor_sub');
            $this->db->where('func_master_id',$m['masterId']);
            $this->db->where('func_minor_id',$m['minorId']);
            $q = $this->db->get();
            $menu[$i] = $m;

            $menu[$i]['view'] = 0;
            $menu[$i]['create'] = 0;
            $menu[$i]['update'] = 0;
            $menu[$i]['delete'] = 0;
            $menu[$i]['change-status'] = 0;
            foreach ($q->result_array() as $mSub)
            {
                $menu[$i][$mSub['minorSubName']] = $mSub['minorSubId'];
            }

            $i++;
        }
        return $menu;
    }

    public function createAction()
    {

        $roleCode = strtoupper(str_replace(" ",'-',$this->input->post('roleCode')));
        $functions = $this->input->post('functions');
        $checkDistinct = $this->role_model->getRoleByRoleCode($roleCode);
        if($checkDistinct)
        {
            echo "<script>alert(' ".$roleCode." already used in system. Please fill again.'); history.back(); </script>";
            exit();
        }

        if($functions == null)
        {
            echo "<script>alert('Please check the allow function.'); history.back(); </script>";
            exit();
        }

        $roleData = array(
            'role_code' => $roleCode,
            'role_desc' => $this->input->post('roleDes'),
            'create_date' => date('Y-m-d H:i:s'),
            'create_by' => $this->session->userdata('adminData'),
        );
        try
        {
            $this->role_model->createRole($roleData);

            foreach ($functions as $function)
            {
                $dataAuthRole = array(
                    'role_ref' => $roleCode,
                    'func_ref' => $function,
                );
                $this->role_model->createAuthRole($dataAuthRole);

            }

            echo "<script>alert('Success.'); window.location.assign('".base_url()."authen/init-role'); </script>";
            exit();

        }
        catch (\Exception $e)
        {
            echo "<script>alert('Opp.!! Something went wrong. Please try again'); history.back(); </script>";
            exit();
        }

    }

    public function updateRole($roleCode)
    {
        $roleData = $this->role_model->getRoleByRoleCode($roleCode);
        if(empty($roleData))
        {
            echo "<script>alert('Opp.!! Something went wrong. Please try again'); history.back(); </script>";
            exit();
        }
        $functions = $this->prepareMenu();
        $permission = $this->preparePermission($roleCode);
        $data = array(
            'menu'=> 'Role',
            'subMenu'=> 'Update Role',
            'data' => $roleData,
            'function' => $functions,
            'permission'=> $permission,
        );

        $this->load->view('template/left');
        $this->load->view('role/update',$data);


    }

    public function updateAction()
    {
        $roleCode = $this->input->post('roleCode');
        $roleData = array(
            'role_desc' => $this->input->post('roleDes'),
            'update_date' => date('Y-m-d H:i:s'),
            'update_by' => $this->session->userdata('adminData'),
        );
        $functions = $this->input->post('functions');
        try
        {
            $this->role_model->updateRole($roleData,$roleCode);
            $this->role_model->deleteAuthRole($roleCode);

            foreach ($functions as $function)
            {
                $dataAuthRole = array(
                    'role_ref' => $roleCode,
                    'func_ref' => $function,
                );
                $this->role_model->createAuthRole($dataAuthRole);

            }

            echo "<script>alert('Success.'); window.location.assign('".base_url()."authen/init-role'); </script>";
            exit();

        }
        catch (\Exception $e)
        {
            echo "<script>alert('Opp.!! Something went wrong. Please try again'); history.back(); </script>";
            exit();
        }
    }

    private function preparePermission($roleCode)
    {
        $data = $this->role_model->getPermission($roleCode);
        foreach ($data as $r)
        {
            $response[] = $r['func_ref'];
        }

        return $response;
    }


    public function deleteRole($roleCode)
    {
        $masterFlag = $this->role_model->checkMasterFlag($roleCode);
        if($masterFlag)
        {
            echo "<script>alert('Can not delete this role!.'); history.back(); </script>";
            exit();
        }

        $userUse = $this->role_model->getUserUseRole($roleCode);
        if($userUse)
        {
            echo "<script>alert('Can not delete!. This Role has user use.'); history.back(); </script>";
            exit();
        }

        try
        {
            $this->role_model->deleteRole($roleCode);
            echo "<script>alert('Success.'); window.location.assign('".base_url()."authen/init-role'); </script>";
            exit();

        }
        catch (\Exception $e)
        {
            echo "<script>alert('Opp.!! Something went wrong. Please try again'); history.back(); </script>";
            exit();
        }


    }
	
}