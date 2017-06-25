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

}