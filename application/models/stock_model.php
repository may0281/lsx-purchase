<?php

class stock_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}
	
	
	public function addStock($data)
	{		 
        $this->db->insert('stock', $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	
	public function addItem($data)
	{		 
        $this->db->insert('item', $data);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
	
	public function updateItemID($stk_id,$item_id)
	{
		    $data = array(
            'stk_id'=> $stk_id
        );
		$this->db->where('item_id', $item_id);
		$this->db->update('stock', $data); 	
	}
	
	public function updateQTY($data)
	{
		$this->db->where('item_id', $this->uri->segment(3));
		$this->db->update('item', $data); 	
	}
	
	public function getItemList()
	{
        $this->db->select('*');
        $this->db->from('item');
		$this->db->where('item_status',1);
        $query = $this->db->get();
        return $query->result_array();
	}
	
	public function getStockitem()
	{
        $this->db->select('*');
        $this->db->from('stock');
		if($this->uri->segment(3) != ''){
			$this->db->where('item_id',$this->uri->segment(3));
		}
        $query = $this->db->get();
        return $query->result_array();
	}
	
	public function getItemby($item_id)
	{
		$this->db->select('*');
        $this->db->from('item');
        $this->db->where('item_id',$item_id);
        $query = $this->db->get();
        return $query->result_array();
	}
	
		public function sumItem($stk_qty,$item_id)
	{
		// count
		
			$this->db->select('SUM(stk_qty) as total');
			$this->db->from('stock');
			$this->db->where('item_id',$item_id);
			$this->db->group_by('item_id');
			$query = $this->db->get();
			$row = $query->row();
			$total = $row->total;
			
		// plus
		
			$total = $stk_qty+$total;
			return $total;
	}
	
	public function getItemcode($item_id)
	{
		$this->db->select('item_code');
        $this->db->from('item');
		$this->db->where('item_id',$item_id);
        $query = $this->db->get();
		$row = $query->row();
			if ($query->num_rows() > 0)
			{
				$item_code = $row->item_code;
			}else{
				$item_code = "-";
			}
		return $item_code;
	}

}