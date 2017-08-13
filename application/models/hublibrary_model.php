<?php
class hublibrary_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}
	
	public function permission($major = null,$minor = null,$action = null)
    {
        $role = $this->session->userdata('role');
        $permission = $this->getPermission($role);
        $status = false;
        foreach ($permission as $p)
        {
            if($p['majorUri'] == $major && $p['minorUri'] == $minor && $p['action'] == $action)
            {
                $status = true;
            }
        }
        return $status;
    }
	
	protected function getPermission($role)
    {
        $this->db->select('a.role_func_id,major.uri as majorUri,minor.uri as minorUri,b.func_minor_sub_name as action');
        $this->db->from('bn_auth_role_func a');
        $this->db->join('bn_func_minor_sub b ' , 'a.func_ref = b.func_minor_sub_ids','left');
        $this->db->join('bn_func_minor minor ' , 'b.func_minor_id = minor.func_minor_ids','left');
        $this->db->join('bn_func_major major ' , 'b.func_master_id = major.func_master_ids','left');
        $this->db->where('a.role_ref',$role);
        $permission = $this->db->get();
        return $permission->result_array();

    }

	
}