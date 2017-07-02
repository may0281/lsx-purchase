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
	public function getMinorSub()
    {
        $this->db->select('*');
        $this->db->from('bn_func_minor_sub');
        $query = $this->db->get();
        return $query->result_array();
    }

}