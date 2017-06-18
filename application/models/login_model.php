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
        $this->db->from('bn_auth_user');
        $this->db->join('bn_user_profile' , 'bn_auth_user.username = bn_user_profile.account','left');
        $this->db->where('bn_auth_user.username',$username);
        $this->db->where('bn_auth_user.password',$password);
        $this->db->where('bn_auth_user.Status','A');
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
        $this->db->select('*');
        $this->db->from('bn_auth_role_func');
        $this->db->where('role_ref',$role);
        $query = $this->db->get();
        return $query->result();
    }


}

