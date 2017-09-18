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

    public function updateLogin($account)
    {
        $this->db->where('account', $account);
        $this->db->update('bn_user_profile', array('last_login_date'=>date('Y-m-d H:i:s')));
    }

//    public function getMenu()
//    {
//        $this->db->select('*');
//        $this->db->from('bn_func_major');
//        $query = $this->db->get();
//        $i= 0;
//        foreach ($query->result_array() as $q)
//        {
//            $masterId = array_get($q,'func_master_ids');
//            $menu[$i]  = array(
//                'menu' => array_get($q,'func_master_name_en'),
//                'uri' => array_get($q,'uri'),
//                'icon' => array_get($q,'icon'),
//                'isSubMenu' => array_get($q,'sub_menu'),
//                'subMenu' => []
//            );
//            $this->db->select('*');
//            $this->db->from('bn_func_minor');
//            $this->db->where('bn_func_minor.func_master_id',$masterId);
//            $querySubMenu = $this->db->get();
//            foreach ($querySubMenu->result_array() as $subMenu)
//            {
//                $menu[$i]['subMenu'][] = array(
//                    'subMenu' => array_get($subMenu,'func_minor_name_en'),
//                    'subMenuUri' => array_get($subMenu,'uri'),
//                );
//            }
//            $i++;
//        }
//        return $menu;
//    }




}

