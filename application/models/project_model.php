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
		$this->db->where('status',1);
        $query = $this->db->get();
        $this->log_model->Logging('project_model','success',$this->db->last_query());
        return $query->result_array();
	}

	public function getProjectby($proj_id)
	{
		$this->db->select('*');
        $this->db->from('project');
        $this->db->where('proj_id',$proj_id);
        $query = $this->db->get();
        $this->log_model->Logging('project_model','success',$this->db->last_query());
        return $query->result_array();
	}


	public function deleteProject($proj_id)
	{
	    $data = array(
            'status'=> '0'
        );
		$this->db->where('proj_id', $proj_id);
		$this->db->update('project', $data);
        $this->log_model->Logging('project_model','success',$this->db->last_query());
	}
	
	
	public function createProject($data)
	{		 
        $this->db->insert('project', $data);
        $this->log_model->Logging('project_model','success',$this->db->last_query());
	}

	
		public function getUserlogin($adminData)
	{
        $this->db->select('*');
        $this->db->from('bn_user_profile');
        $this->db->where('account',$adminData);
        $query = $this->db->get();
		$row = $query->row();
		
		$name = $row->firstname.' '.$row->lastname;
        $this->log_model->Logging('project_model','success',$this->db->last_query());
		
		return $name;
	}
	
	public function getUserAccount($adminData)
	{
        $this->db->select('*');
        $this->db->from('bn_user_profile');
        $query = $this->db->get();
		$row = $query->row();
		
		$account = $row->account;
        $this->log_model->Logging('project_model','success',$this->db->last_query());
		
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
        $this->log_model->Logging('project_model','success',$this->db->last_query());
        return $query->result_array();
    }

    public function getPurchaseByProjectId($proj_id)
    {
        $this->db->select('*');
        $this->db->from('purchase_request');
        $this->db->where('proj_id',$proj_id);
        $query = $this->db->get();
        $this->log_model->Logging('project_model','success',$this->db->last_query());
        return $query->result_array();
    }

}