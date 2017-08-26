<?php

class tracking_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}

	public function getItemTracking()
	{
        $this->db->select('a.item_code,e.proj_name,a.qty as request_qty,a.purq_item_status as status,b.purq_code,d.puror_code,d.puror_order_date,d.puror_forecasts_date,c.puror_qty as order_qty');
        $this->db->from('purchase_request_item a');
        $this->db->join('purchase_request b','a.purq_id = b.purq_id','left');
        $this->db->join('purchase_order_item c','b.purq_id = c.purq_id','left');
        $this->db->join('purchase_order d','c.puror_id = d.puror_id','left');
        $this->db->join('project e','b.proj_id = e.proj_id','left');
        $this->db->where_in('a.purq_item_status', array('approved','ordered'));
        $this->db->order_by('b.purq_id', 'asc');

        $query = $this->db->get();
        return $query->result_array();
	}
	



}