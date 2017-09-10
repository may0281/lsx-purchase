<?php

class report_model extends ci_model
{
	public function __constuct()
	{
		parent::__construct();
	}

    public function getItemTracking()
    {
        $this->db->select('a.item_code,a.puror_qty as order_qty,b.puror_code,b.puror_order_date,
        b.puror_forecasts_date,c.purq_code,d.qty as request_qty,proj_name,purq_require_end
                         
                            ');
        $this->db->from('purchase_order_item a');
        $this->db->join('purchase_order b','a.puror_id = b.puror_id','left');
        $this->db->join('purchase_request c','c.purq_id = a.purq_id','left');
        $this->db->join('purchase_request_item d','a.purq_id = d.purq_id and a.item_code = d.item_code','left');

        $this->db->join('project e','c.proj_id = e.proj_id','left');
        $this->db->where_in('a.puror_item_status', array('ordered'));
        $this->db->order_by('a.puror_id', 'asc');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getItemTrackingByProject($projectID,$startDate,$endDate)
    {
        $this->db->select('a.item_code,a.qty,c.purq_code,c.purq_create_date,c.purq_require_start,c.purq_require_end,
        f.item_qty,c.proj_owner_name,c.designer_name,c.contractor_name,g.firstname as mkt,g.firstname as sale,
        c.purq_comment,d.puror_qty as order_qty,b.puror_code,b.puror_order_date,b.puror_forecasts_date');
        $this->db->from('purchase_request_item a');
        $this->db->join('purchase_order_item d','a.purq_id = d.purq_id and a.item_code = d.item_code','left');
        $this->db->join('purchase_order b','d.puror_id = b.puror_id','left');
        $this->db->join('purchase_request c','c.purq_id = a.purq_id','left');
        $this->db->join('project e','c.proj_id = e.proj_id','left');
        $this->db->join('item f','a.item_code = f.item_code','left');
        $this->db->join('bn_user_profile g','c.mkt_account = g.account','left');
        $this->db->join('bn_user_profile h','c.sale_account = h.account','left');
        $this->db->where_in('a.purq_item_status', array('ordered','approved'));
        $this->db->where('e.proj_id', $projectID);
        $this->db->where('c.purq_create_date >= ', $startDate.' 00:00:00');
        $this->db->where('c.purq_create_date <= ', $endDate. ' 23:59:39');
        $this->db->order_by('c.purq_code', 'desc');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getProjectList()
    {
        $this->db->select('proj_id,proj_name');
        $this->db->from('project');
        $query = $this->db->get();
        $this->log_model->Logging('purchase_model','success',$this->db->last_query());
        return $query->result_array();
    }







}