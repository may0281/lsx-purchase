<?php

class param_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}

	public function getParamAll()
	{
        $this->db->select('*');
        $this->db->from('param');
        $query = $this->db->get();
        return $query->result_array();
	}

    public function createParam($data)
    {
        $this->db->insert('param', $data);
        $this->log_model->Logging('param','success',$this->db->last_query());

    }

    public function checkDistinct($email,$key)
    {
        $this->db->select('*');
        $this->db->from('param');
        $this->db->where('param_email',$email);
        $this->db->where('param_key',$key);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function update($id,$data)
    {
        $this->db->where('param_id', $id);
        $this->db->update('param', $data);
        $this->log_model->Logging('param','success',$this->db->last_query());
    }

    public function delete($id)
    {
        $this->db->delete('param', array('param_id' => $id));
    }



}