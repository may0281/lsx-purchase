<?php
class log_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}
	

	public function logging($data)
	{
        $this->db->insert('func_log', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
	}

}