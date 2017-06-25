<?php
class login_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}
	

	public function checkLogin($username,$password)
    {
        $this->db->select('*');
        $this->db->from('bn_user_profile');
        $this->db->where('account',$username);
        $this->db->where('password',$password);
        $this->db->where('status','A');
        $login = $this->db->get();
        return $login->result_array();

    }

    public function getMenu()
    {
        $this->db->select('*');
        $this->db->from('bn_func_major');
        $query = $this->db->get();
        $i= 0;
        foreach ($query->result_array() as $q)
        {
            $masterId = array_get($q,'func_master_ids');
            $menu[$i]  = array(
                'menu' => array_get($q,'func_master_name_en'),
                'uri' => array_get($q,'uri'),
                'icon' => array_get($q,'icon'),
                'subMenu' => []
            );
            $this->db->select('*');
            $this->db->from('bn_func_minor');
            $this->db->where('bn_func_minor.func_master_id',$masterId);
            $querySubMenu = $this->db->get();
            foreach ($querySubMenu->result_array() as $subMenu)
            {
                $menu[$i]['subMenu'][] = array(
                    'subMenu' => array_get($subMenu,'func_minor_name_en'),
                    'subMenuUri' => array_get($subMenu,'uri'),
                );
            }
            $i++;
        }
        return $menu;
    }

    public function getPermission($role)
    {
        $this->db->select('major.uri as majorUri,minor.uri as minorUri,b.func_minor_sub_name as action');
        $this->db->from('bn_auth_role_func a');
        $this->db->join('bn_func_minor_sub b ' , 'a.func_ref = b.func_minor_sub_ids','left');
        $this->db->join('bn_func_minor minor ' , 'b.func_minor_id = minor.func_minor_ids','left');
        $this->db->join('bn_func_major major ' , 'b.func_master_id = major.func_master_ids','left');
        $this->db->where('a.role_ref',$role);
        $permission = $this->db->get();
        return $permission->result_array();

    }


}

