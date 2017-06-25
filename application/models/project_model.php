<?php
class project_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}
	

	public function getProjectList()
	{
        $this->db->select('*');
        $this->db->from('project');
        $query = $this->db->get();
        return $query->result_array();
	}

}