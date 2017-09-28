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
        $this->db->select('purchase_request_item.*,item_size,item_thickness,item_pfilm,item_aica,item_qty');
        $this->db->from('purchase_request_item');
        $this->db->join('item','purchase_request_item.item_code = item.item_code','left');
        $this->db->where('purq_id',$purchaseID);
        $query = $this->db->get();
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
        return $query->result_array();
    }

    public function getPurchaseItemAndPo($purchaseID)
    {
        $this->db->select('a.*,item_qty,d.puror_code,d.puror_forecasts_date,c.puror_qty');
        $this->db->from('purchase_request_item a');
        $this->db->join('item b','a.item_code = b.item_code','left');
        $this->db->join('purchase_order_item c','a.purq_id = c.purq_id and a.item_code = c.item_code','left');
        $this->db->join('purchase_order d','c.puror_id = d.puror_id','left');
        $this->db->where('a.purq_id',$purchaseID);
        $query = $this->db->get();
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
        return $query->result_array();
    }


	public function getAllPurchaseRequest($role = null,$data)
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

        if($data['purq_status'])
        {
            $this->db->where('purchase_request.purq_status',$data['purq_status']);
        }

        if($data['proj_name'])
        {
            $this->db->like('project.proj_name',$data['proj_name']);
        }

        if($data['purq_code'])
        {
            $this->db->like('purchase_request.purq_code',$data['purq_code']);
        }

        if($data['purq_require_start'] and $data['purq_require_end'])
        {
            $this->db->where('purchase_request.purq_require_start >=',$data['purq_require_start']);
            $this->db->where('purchase_request.purq_require_start <=',$data['purq_require_end']);
        }

         if($data['purq_require_start'] or $data['purq_require_end'])
        {
            if($data['purq_require_start'])
            {
                $this->db->where('purchase_request.purq_require_start',$data['purq_require_start']);
            }

            if($data['purq_require_end'])
            {
                $this->db->where('purchase_request.purq_require_end',$data['purq_require_end']);
            }
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
        $this->db->join('purchase_order_item','purchase_request_item.item_code = purchase_order_item.item_code','left');
        $this->db->where('purchase_request.purq_status',$status);
        $this->db->where('purchase_request_item.item_code NOT IN (SELECT item_code FROM purchase_order_item WHERE purchase_order_item.item_code = purchase_request_item.item_code and purchase_request.purq_id = purchase_order_item.purq_id)', NULL, FALSE);
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

        return $purq_code;
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
    public function changePurchaseItemStatus($purqId,$status)
    {
        $this->db->where('purq_id',$purqId);
        $this->db->update('purchase_request_item', array('purq_item_status'=>$status));
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
        return $id;
    }

    public function updatePurchaseOrder($puror_id,$data)
    {
        $this->db->where('puror_id',$puror_id);
        $this->db->update('purchase_order', $data);
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());

    }

    public function updatePurchaseOrderItem($puror_id,$data)
    {
        $this->db->where('puror_id',$puror_id);
        $this->db->update('purchase_order_item', $data);
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());

    }

    public function createPurchaseOrderItem($data)
    {
        $this->db->insert('purchase_order_item', $data);
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
    }

    public function getPurchaseOrder($data)
    {
        $this->db->select('*');
        $this->db->from('purchase_order');
        if($data['puror_code'])
        {
            $this->db->like('puror_code',$data['puror_code']);
        }
        if($data['puror_order_date_start'])
        {
            $this->db->where('puror_order_date >= ',$data['puror_order_date_start'].' 00:00:00');
        }

        if($data['puror_order_date_end'])
        {
            $this->db->where('puror_order_date <= ',$data['puror_order_date_end'].' 23:59:59');
        }

        if($data['puror_forecasts_date_start'])
        {
            $this->db->where('puror_forecasts_date >= ',$data['puror_forecasts_date_start'].' 00:00:00');
        }
        if($data['puror_forecasts_date_end'])
        {
            $this->db->where('puror_forecasts_date <= ',$data['puror_forecasts_date_end'].' 23:59:59');
        }

        if($data['puror_status'])
        {
            $this->db->where('puror_status',$data['puror_status']);
        }
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
        $this->db->select('purchase_order_item.item_code,sum(purchase_order_item.puror_qty) as puror_qty,purchase_order_item.puror_price ,item.item_size,item.item_thickness,item.item_pfilm,item.item_aica');
        $this->db->from('purchase_order_item');
        $this->db->join('item','purchase_order_item.item_code = item.item_code','left');
        $this->db->where('puror_id',$id);
        $this->db->group_by('purchase_order_item.item_code,purchase_order_item.puror_price');
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

    public function createAccrual($data)
    {
        $this->db->insert('accrual', $data);
        $this->log_model->Logging('accrual','success',$this->db->last_query());
    }

    public function getEmailByKey($key)
    {
        $this->db->select('param_email');
        $this->db->from('param');
        $this->db->where('param_key',$key);
        $query = $this->db->get();
        $all = $query->result_array();
        $email = array();
        for ($i =0; $i< count($all); $i++)
        {
            $email = array($i=>$all[$i]['param_email']);
        }
        return $email;
    }

    public function checkPoReceive($id)
    {
        $this->db->select('*');
        $this->db->from('purchase_order');
        $this->db->where('puror_id',$id);
        $this->db->where_in('puror_status',array('received','accrual'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function checkPoItemReceive($id)
    {
        $this->db->select('*');
        $this->db->from('purchase_order_item');
        $this->db->where('puror_id',$id);
        $this->db->where_in('puror_item_status',array('received','accrual'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function deletePurchaseOrder($id)
    {
        $this->db->delete('purchase_order', array('puror_id' => $id));
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
    }

    public function deletePurchaseOrderItem($id)
    {
        $this->db->delete('purchase_order_item', array('puror_id' => $id));
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
    }

    public function checkStatusPurchaseOrderItem($po_id)
    {
        $this->db->select('*');
        $this->db->from('purchase_order_item');
        $this->db->where('purchase_order_item.puror_id',$po_id);
        $query = $this->db->get();
        foreach ($query->result_array() as $r)
        {
            s($r);
        }
    }

    public function getImportItemReport($item_code,$po)
    {
        $this->db->select_sum('impre_qty');
        $this->db->from('import_item_report');
        $this->db->where('impre_item_code',$item_code);
        $this->db->where('impre_ipo',$po);
        $query = $this->db->get();
        $data =  $query->result_array();
        return $data[0]['impre_qty'];

    }





}