<?php

class dashboard_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}

    public function getChart()
	{

		$query = $this->db->query("SELECT count(purq_id) as total,YEAR(purq_create_date) as year,MONTH(purq_create_date) as month FROM `purchase_request` GROUP BY YEAR(purq_create_date), MONTH(purq_create_date)");
		 return $query->result_array();
	}


    public function getCountPurchaseByStatus($status = null)
    {
        $this->db->select('count(purq_id) as total');
        $this->db->from('purchase_request');
        if($status)
        {
            $this->db->where('purq_status',$status);
        }
        $this->db->where('YEAR(purq_create_date)',date('Y'));
        $query = $this->db->get();
        $row = $query->row();
        $this->log_model->Logging('dashboard_model','success',$this->db->last_query());
        if (isset($row))
        {
            return $row->total;
        }else{
            return 0;
        }
    }

    public function getSumPurchaseByMonth($month)
    {
        $this->db->select('count(purq_id) as total');
        $this->db->from('purchase_request');
        $this->db->where('YEAR(purq_create_date)',date('Y'));
        $this->db->where('MONTH(purq_create_date)',$month);
        $query = $this->db->get();
        $row = $query->row();
        $this->log_model->Logging('dashboard_model','success',$this->db->last_query());
        if (isset($row))
        {
            return $row->total;
        }else{
            return 0;
        }
    }

	

}