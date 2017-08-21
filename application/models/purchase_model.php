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
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
        return $query->result_array();
	}

	public function getPurchaseById($id)
    {
        $this->db->select('purchase_request.*,project.proj_name');
        $this->db->from('purchase_request');
        $this->db->join('project','purchase_request.proj_id = project.proj_id');
        $this->db->where('purq_id',$id);
        $query = $this->db->get();
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
        return $query->result_array();

    }
    public function getPurchaseItem($purchaseID)
    {
        $this->db->select('*');
        $this->db->from('purchase_request_item');
        $this->db->where('purq_id',$purchaseID);
        $query = $this->db->get();
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
        return $query->result_array();
    }


	public function getAllPurchaseRequest($role = null)
    {

        $this->db->select('purchase_request.*,project.proj_name');
        $this->db->from('purchase_request');
        $this->db->join('project','purchase_request.proj_id = project.proj_id');

        if($role == 'MARKETING')
        {
            $this->db->join('bn_user_profile','purchase_request.mkt_account = bn_user_profile.account','left');
            $this->db->where('bn_user_profile.role_id',$role);
        }

        if($role == 'SALE')
        {
            $this->db->join('bn_user_profile','purchase_request.sale_account = bn_user_profile.account','left');
            $this->db->where('bn_user_profile.role_id',$role);
        }

        $this->db->order_by('purchase_request.purq_id','desc');
        $query = $this->db->get();

        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
        return $query->result_array();
    }

    public function getAllPurchaseRequestByStatus($status)
    {
        $this->db->select('purchase_request.*,project.proj_name');
        $this->db->from('purchase_request');
        $this->db->join('project','purchase_request.proj_id = project.proj_id');
        $this->db->where('purchase_request.purq_status',$status);
        $this->db->order_by('purchase_request.purq_id','desc');
        $query = $this->db->get();

        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
        return $query->result_array();
    }

    public function getAllPurchaseRequestAndItem($status)
    {
        $this->db->select('purchase_request.*,project.proj_name,purchase_request_item.item_code,purchase_request_item.qty,item.item_qty,item.item_min,item.item_price');
        $this->db->from('purchase_request');
        $this->db->join('project','purchase_request.proj_id = project.proj_id');
        $this->db->join('purchase_request_item','purchase_request.purq_id = purchase_request_item.purq_id');
        $this->db->join('item','purchase_request_item.item_code = item.item_code');
        $this->db->where('purchase_request.purq_status',$status);
        $this->db->order_by('purchase_request_item.item_code','desc');
        $query = $this->db->get();

        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
        return $query->result_array();
    }

    public function getAllPurchaseRequestForApprove()
    {
        $this->db->select('purchase_request.*,project.proj_name');
        $this->db->from('purchase_request');
        $this->db->join('project','purchase_request.proj_id = project.proj_id');
        $this->db->where('purchase_request.purq_status','request',null, FALSE);
        $this->db->or_where('purchase_request.purq_status','pending',null,FALSE);
        $this->db->or_where('purchase_request.purq_status','unapproved',null,FALSE);
        $this->db->order_by('purchase_request.purq_id','desc');
        $query = $this->db->get();

        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
        return $query->result_array();
    }

	public function createPurchaseRequest($data)
    {
        $this->db->insert('purchase_request', $data);
        $id = $this->db->insert_id();
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());

        return $id;

    }

    public function updatePurchaseRequest($data,$purqId)
    {
        $this->db->where('purq_id',$purqId);
        $this->db->update('purchase_request', $data);
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
    }

    public function updatePurchaseCode($purqId)
    {

        $purq_code = 'P'.str_pad($purqId,5 ,0,STR_PAD_LEFT);
        $data = array('purq_code' => $purq_code);
        $this->db->where('purq_id',$purqId);
        $this->db->update('purchase_request', $data);
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
    }

    public function updatePurchaseRequestItem($data,$purqItemId)
    {
        $this->db->where('purq_item_id',$purqItemId);
        $this->db->update('purchase_request_item', $data);
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
    }

    public function updatePurchaseRequestItemByPurqId($data,$purqId)
    {
        $this->db->where('purq_id',$purqId);
        $this->db->update('purchase_request_item', $data);
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
    }

    public function deletePurchaseRequestItem($purqItemId)
    {
        $this->db->delete('purchase_request_item', array('purq_item_id' => $purqItemId));
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
    }

	public function createPurchaseRequestItem($data)
    {
        $this->db->insert('purchase_request_item', $data);
        $id = $this->db->insert_id();
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
        return $id;
    }

    public function changePurchaseStatus($purqId,$status)
    {
        $this->db->where('purq_id',$purqId);
        $this->db->update('purchase_request', array('purq_status'=>$status));
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
    }

    public function changeStatusLog($purqId,$status)
    {
        $data = array(
            'purq_id' =>$purqId,
            'status' => $status,
            'update_date' => date('Y-m-d H:i:s'),
            'update_by' => $this->session->userdata('adminData')
        );
        $this->db->insert('purchase_update_status', $data);
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
    }

    public function createPurchaseOrder($data)
    {
        $this->db->insert('purchase_order', $data);
        $id = $this->db->insert_id();
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
        $puror_code = 'PO'.str_pad($id,5 ,0,STR_PAD_LEFT);
        $this->updatePurchaseOrder($id,array('puror_code'=>$puror_code));

        return $id;
    }

    public function updatePurchaseOrder($puror_id,$data)
    {
        $this->db->where('puror_id',$puror_id);
        $this->db->update('purchase_order', $data);
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());

    }

    public function createPurchaseOrderItem($data)
    {
        $this->db->insert('purchase_order_item', $data);
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
    }

    public function getPurchaseOrder()
    {
        $this->db->select('*');
        $this->db->from('purchase_order');
        $this->db->order_by('puror_id','desc');
        $query = $this->db->get();
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
        return $query->result_array();
    }

    public function getPurchaseOrderByID($id)
    {
        $this->db->select('*');
        $this->db->from('purchase_order');
        $this->db->where('puror_id',$id);
        $query = $this->db->get();
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
        return $query->result_array();
    }

    public function getPurchaseOrderItemByID($id)
    {
        $this->db->select('purchase_order_item.*,purchase_request.purq_code');
        $this->db->from('purchase_order_item');
        $this->db->join('purchase_request','purchase_order_item.purq_id = purchase_request.purq_id','left');
        $this->db->where('puror_id',$id);
        $query = $this->db->get();
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
        return $query->result_array();
    }

    public function getPurchaseOrderAndDetailItemByID($id)
    {
        $this->db->select('purchase_order_item.*,item.item_size,item.item_thickness,item.item_pfilm,item.item_aica');
        $this->db->from('purchase_order_item');
        $this->db->join('item','purchase_order_item.item_code = item.item_code','left');
        $this->db->where('puror_id',$id);
        $query = $this->db->get();
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
        return $query->result_array();
    }

    public function checkOrdered($item_code)
    {
        $this->db->select('purchase_order_item.puror_qty,puror_code,puror_forecasts_date');
        $this->db->from('purchase_order_item');
        $this->db->join('purchase_order','purchase_order_item.puror_id = purchase_order.puror_id','left');
        $this->db->where('item_code',$item_code);
        $this->db->where('puror_item_status','ordered');
        $query = $this->db->get();
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
        return $query->result_array();
    }





}