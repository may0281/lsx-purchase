<?php

class tracking_model extends ci_model
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
        $this->log_model->Logging('tracking_model','success',$this->db->last_query());
        return $query->result_array();
	}
	



}