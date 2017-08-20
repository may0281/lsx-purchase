<?php
class role_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}
	

	public function getMajor()
	{
        $this->db->select('*');
        $this->db->from('bn_func_major');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function getMinor($masterId)
    {
        $this->db->select('*');
        $this->db->from('bn_func_minor');
        $this->db->where('func_master_id',$masterId);
        $query = $this->db->get();
        return $query->result_array();
    }
	public function getMinorSub($masterId,$minorId = 0)
    {
        s($masterId);
        $this->db->select('*');
        $this->db->from('bn_func_minor_sub');
        $this->db->where('func_master_id',$masterId);
        $this->db->where('func_minor_id',$minorId);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getFunctionAll()
    {
        $sql = 'select b.func_master_name_en,c.func_minor_name_en,a.func_minor_sub_name,a.func_minor_sub_ids as id from bn_func_minor_sub a 
                left join bn_func_major b on a.func_master_id = b.func_master_ids
                left join bn_func_minor c on a.func_minor_id = c.func_minor_ids';

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getRole()
    {
        $this->db->select('*');
        $this->db->from('bn_auth_role');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getRoleByRoleCode($roleCode)
    {
        $this->db->select('*');
        $this->db->from('bn_auth_role');
        $this->db->where('role_code',$roleCode);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function createRole($data)
    {
        $this->db->insert('bn_auth_role', $data);
    }

    public function createAuthRole($data)
    {
        $this->db->insert('bn_auth_role_func', $data);
    }

    public function deleteAuthRole($roleCode)
    {
        $this->db->delete('bn_auth_role_func', array('role_ref' => $roleCode));
    }

    public function checkMasterFlag($roleCode)
    {
        $this->db->select('master_flag');
        $this->db->from('bn_auth_role');
        $this->db->where('role_code',$roleCode);
        $this->db->where('master_flag','Y');
        $query = $this->db->get();
        return $query->result_array();
    }



    public function getPermission($roleCode)
    {
        $this->db->select('func_ref');
        $this->db->from('bn_auth_role_func');
        $this->db->where('role_ref',$roleCode);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function updateRole($roleData, $roleCode)
    {
        $this->db->where('role_code', $roleCode);
        $this->db->update('bn_auth_role', $roleData);
    }

    public function getUserUseRole($roleCode)
    {
        $this->db->select('*');
        $this->db->from('bn_user_profile');
        $this->db->where('role_id',$roleCode);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function deleteRole($roleCode)
    {
        $this->db->delete('bn_auth_role', array('role_code' => $roleCode));
    }

    public function getMinorSubID($masterId,$minorId,$action)
    {
        $id = null;
        $this->db->select('func_minor_sub_ids as id');
        $this->db->from('bn_func_minor_sub');
        $this->db->where('func_master_id',$masterId);
        $this->db->where('func_minor_id',$minorId);
        $this->db->where('func_minor_sub_name',$action);
        $this->db->where('func_minor_sub_status','A');
        $query = $this->db->get();
        $result = $query->result_array();
        if($result)
        {
            $id = $result[0]['id'];
        }
        return $id;
    }




}