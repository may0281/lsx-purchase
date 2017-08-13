<?php

class purchase_model extends ci_model
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
        return $query->result_array();
	}

	public function getPurchaseById($id)
    {
        $this->db->select('purchase_request.*,project.proj_name');
        $this->db->from('purchase_request');
        $this->db->join('project','purchase_request.proj_id = project.proj_id');
        $this->db->where('purq_id',$id);
        $query = $this->db->get();
        return $query->result_array();

    }
    public function getPurchaseItem($purchaseID)
    {
        $this->db->select('*');
        $this->db->from('purchase_request_item');
        $this->db->where('purq_id',$purchaseID);
        $query = $this->db->get();
        return $query->result_array();
    }


	public function getAllPurchaseRequest()
    {
        $this->db->select('purchase_request.*,project.proj_name');
        $this->db->from('purchase_request');
        $this->db->join('project','purchase_request.proj_id = project.proj_id');
        $this->db->order_by('purchase_request.purq_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }
	public function createPurchaseRequest($data)
    {
        $this->db->insert('purchase_request', $data);
        return $this->db->insert_id();
    }

    public function updatePurchaseRequest($data,$purqId)
    {
        $this->db->where('purq_id',$purqId);
        $this->db->update('purchase_request', $data);
    }

    public function updatePurchaseRequestItem($data,$purqId)
    {
        $this->db->where('purq_item_id',$purqId);
        $this->db->update('purchase_request_item', $data);
    }

    public function deletePurchaseRequestItem($purqItemId)
    {
        $this->db->delete('purchase_request_item', array('purq_item_id' => $purqItemId));
    }

	public function createPurchaseRequestItem($data)
    {
        $this->db->insert('purchase_request_item', $data);
        return $this->db->insert_id();
    }


}