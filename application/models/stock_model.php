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
		$this->db->join('item', 'item.item_id = stock.item_id','left');
		if($this->uri->segment(3) != ''){
			$this->db->where('item.item_id',$this->uri->segment(3));
		}
		
        $query = $this->db->get();
        return $query->result_array();
	}
	
	public function getStockitem_temp()
	{
        $this->db->select('*');
        $this->db->from('temp_import');		
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
	
	public function importItem($filename)
	{
		$file = fopen($filename, "r");
		$i = 1;
		while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
		{
			if($i <> '1'){
				if (isset($emapData[0])) { $item_1=$emapData[0]; }
				if (isset($emapData[1])) { $item_2=$emapData[1]; }
				if (isset($emapData[2])) { $item_3=$emapData[2]; }
				if (isset($emapData[3])) { $item_4=$emapData[3]; }
				
				$data['tmp_item_code'] = $item_1.'-'.$item_2.'-'.$item_3.'-'.$item_4;
				$data['tmp_item_aica'] = $emapData[4];
				$data['tmp_item_pfilm'] = $emapData[5];
				$data['tmp_item_size'] = $emapData[6];
				$data['tmp_item_thickness'] = $emapData[7];
				$data['tmp_item_price'] = $emapData[8];
				$data['tmp_item_qty'] = $emapData[9];
				
				$this->db->set($data);
				$this->db->insert('temp_import');
			}
			$i++;
		}

		fclose($file);



	}

}