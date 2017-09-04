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

}