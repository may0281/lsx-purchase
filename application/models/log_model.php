<?php
class log_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}


	public function Logging($function,$status,$sql)
    {
        $data = array(
            'username' => $this->session->userdata('adminData'),
            'func_name' => $function,
            'sql_command' => $sql,
            'status' => $status,
            'action_date' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('func_log', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

}