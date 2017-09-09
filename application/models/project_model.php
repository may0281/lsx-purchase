<?php

class project_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}
	

	public function getProjectList($proj_owner)
	{
        $this->db->select('*');
        $this->db->from('project');
		$this->db->where('proj_owner',$proj_owner);
		$this->db->where('status',1);
        $query = $this->db->get();
		
        return $query->result_array();
	}

	public function getProjectby($proj_id)
	{
		$this->db->select('*');
        $this->db->from('project');
        $this->db->where('proj_id',$proj_id);
        $query = $this->db->get();
        return $query->result_array();
	}


	public function deleteProject($proj_id)
	{
	    $data = array(
            'status'=> '0'
        );
		$this->db->where('proj_id', $proj_id);
		$this->db->update('project', $data); 
	}
	
	
	public function createProject($data)
	{		 
        $this->db->insert('project', $data);
	}

	
		public function getUserlogin($adminData)
	{
        $this->db->select('*');
        $this->db->from('bn_user_profile');
        $this->db->where('account',$adminData);
        $query = $this->db->get();
		$row = $query->row();
		
		$name = $row->account;
		
		return $name;
	}
	
	public function getUserAccount($adminData)
	{
        $this->db->select('*');
        $this->db->from('bn_user_profile');
        $query = $this->db->get();
		$row = $query->row();
		
		$account = $row->account;
		
		return $account;
	}
	
	public function updateProject($proj_id,$ProjectData)
    {
        $this->db->where('proj_id', $proj_id);
        $this->db->update('project', $ProjectData);
    }

    public function getNameProjectList()
    {
        $this->db->select('proj_id,proj_name');
        $this->db->from('project');
        $this->db->where('status',1);
        $query = $this->db->get();
        return $query->result_array();
    }

}