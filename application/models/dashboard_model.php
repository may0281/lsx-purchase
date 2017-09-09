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
	
		public function getGlowup()
	{
	}
	
		public function getRequeststatus()
	{
		$query = $this->db->query("SELECT COUNT(`purq_id`) as total FROM purchase_request;");
		$row = $query->row();

		if (isset($row))
		{
			return $row->total;
		}else{
			return 0;
		}
	}
	
		public function getApprovestatus()
	{
		$query = $this->db->query("SELECT COUNT(`purq_id`) as total FROM purchase_request where `purq_status` ='approved';");
		$row = $query->row();

		if (isset($row))
		{
			return $row->total;
		}else{
			return 0;
		}
	}
	
		public function getRejectstatus()
	{
		$query = $this->db->query("SELECT COUNT(`purq_id`) as total FROM purchase_request where `purq_status` ='reject';");
		$row = $query->row();

		if (isset($row))
		{
			return $row->total;
		}else{
			return 0;
		}
	}
	
		public function getDeliveredstatus()
	{
		$query = $this->db->query("SELECT COUNT(`purq_id`) as total FROM purchase_request where `purq_status` ='delivered';");
		$row = $query->row();

		if (isset($row))
		{
			return $row->total;
		}else{
			return 0;
		}
	}
	
	public function getPurchaseTotal($month)
	{
        $this->db->select('dash_poy_total');
        $this->db->from('dash_poy');
		$this->db->where('dash_poy_month',$month);
        $query = $this->db->get();
		$row = $query->row();

		return $row->dash_poy_total;

	}
	
	public function getPurchaseStamp($month)
	{
        $this->db->select('dash_poy_stamp');
        $this->db->from('dash_poy');
		$this->db->where('dash_poy_month',$month);
        $query = $this->db->get();
		$row = $query->row();

		return $row->dash_poy_stamp;
	}
		
		public function updateChart()
	{
	
		for ($id = 1; $id <= 13; $id++) {
			// get total
			$query = $this->db->query("SELECT COUNT(*) as total FROM purchase_request WHERE MONTH(purq_create_date) = ".$id.";");
			$row = $query->row();
			$total = $row->total;
			
			// update total
			$data = array(
				'dash_poy_total'=> $total
			);
			$this->db->where('dash_poy_id', $id);
			$this->db->update('dash_poy', $data); 
			$tota = $row->total;
		}
	}
	

}