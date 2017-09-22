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
            'item_id'=> $item_id
        );
		$this->db->where('stk_id', $stk_id);
		$this->db->update('stock', $data); 	
	}
	
	public function updatePriceItem($item_id,$price)
	{
		    $data = array(
            'item_price'=> $price
        );
		$this->db->where('item_id', $item_id);
		$this->db->update('item', $data);
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
		$this->db->order_by('item_id','DESC');
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
	
	public function getStockitem_temp($tmp_type)
	{
        $this->db->select('*');
        $this->db->from('temp_import');
		if($tmp_type == '1'){
			$this->db->where('duplicate',0);
		}else{
			$this->db->where('duplicate',1);
		}
		$this->db->where('tmp_type',$tmp_type);
        $query = $this->db->get();
        return $query->result_array();
	}

	public function getStockitem_temp_dup($tmp_type)
	{
        $this->db->select('*');
        $this->db->from('temp_import');
		$this->db->where('duplicate',1);
		$this->db->where('tmp_type',$tmp_type);
		$this->db->group_by('tmp_item_code');
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
		
			$this->db->select('item_qty');
			$this->db->from('item');
			$this->db->where('item_id',$item_id);
			$query = $this->db->get();

			$row = $query->row();
			$total = $row->item_qty;
			
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
	
		public function getItemid($item_code)
	{
		$this->db->select('item_id');
        $this->db->from('item');
		$this->db->where('item_code',$item_code);
        $query = $this->db->get();
		$row = $query->row();
			if ($query->num_rows() > 0)
			{
				$item_id = $row->item_id;
			}else{
				$item_id = "-";
			}
		return $item_id;
	}
	

	public function exportItem($filename)
	{
		date_default_timezone_set('asia/bangkok');
		$xlsx = new SimpleXLSX($filename);
		$i = 1;
		foreach( $xlsx->rows() as $r ) {
			if($i > 1){

			$chk_eno = $this->checkEnough_item($r[0],$r[1]);
			$chk_have_item = $this->checkHave_item($r[0]);
			//echo $r[0].' '.$r[1].'==>'.$chk_eno.'<br>';
			
			if($chk_eno == 0){ $item_eno[] = $r[0]; } else {
				if($chk_have_item == 1){ $item_no_have[] = $r[0]; } else {
					$this->db->select('item_qty');
					$this->db->from('item');
					$this->db->where('item_code',$r[0]);
					$query = $this->db->get();
					$row = $query->row();
					if ($query->num_rows() > 0)
					{
						$update_total =	$row->item_qty - $r[1];
					}
					$data_update = array(
						'item_qty'=> $update_total
					);

					$item_id = $this->getItemid($r[0]);

					$this->db->where('item_code', $r[0]);
					$this->db->update('item', $data_update);
						}

					}
			}
					
			
			$i++;
		}
		
		if (empty($item_eno)) {
		
			echo "<script>alert('Export Success'); window.location.assign('".base_url()."index.php/stock/list_item'); </script>";	
			
		}else{
		
			$message = "Item ที่ไม่สามารถเบิกสินค้าได้เนื่องจากจำนวนไม่พอที่จะเบิกได้แก่\\n\\n";
			foreach($item_eno as $item) {
				$message .= "".$item."\\n";
			}
			echo "<script>alert('$message'); window.location.assign('".base_url()."index.php/stock/list_item'); </script>";	
		}
		
	}

	public function importInstockItem($filename,$tmp_type)
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

				$chk_temp = $this->checkDuplicate_temp($item_1.'-'.$item_2.'-'.$item_3.'-'.$item_4,$tmp_type);
				$chk_dup = $this->checkDuplicate_item($item_1.'-'.$item_2.'-'.$item_3.'-'.$item_4);

				if($chk_dup == "0"){
					$data['duplicate'] = 0;
				}else{
					$data['duplicate'] = 1;
				}

/*				$data['tmp_item_code'] = $item_1.'-'.$item_2.'-'.$item_3.'-'.$item_4;
				$data['tmp_item_aica'] = $emapData[4];
				$data['tmp_item_pfilm'] = $emapData[5];
				$data['tmp_item_size'] = $emapData[6];
				$data['tmp_item_thickness'] = $emapData[7];
				$data['tmp_item_price'] = $emapData[8];
				$data['tmp_item_qty'] = $emapData[9];
				$data['tmp_item_min'] = $emapData[10];
				$data['tmp_type'] = $tmp_type;*/
				
				$data = array(
				  'tmp_item_code'=> $item_1.'-'.$item_2.'-'.$item_3.'-'.$item_4,
				  'tmp_item_aica'=> $emapData[4],
				  'tmp_item_pfilm'=> $emapData[5],
				  'tmp_item_size'=> $emapData[6],
				  'tmp_item_thickness'=> $emapData[7],
				  'tmp_item_price'=> $emapData[8],
				  'tmp_item_qty'=> $emapData[9],
				  'tmp_item_min'=> $emapData[10],
				  'tmp_type'=> $tmp_type
				 );

				if($chk_temp == "0"){
					$this->db->set($data);
					$this->db->insert('temp_import');
				}
			}
			$i++;
		}
		fclose($file);
	}

		public function checkDuplicate_item($item_code)
	{
			$this->db->select('item_code');
			$this->db->from('item');
			$this->db->where('item_code',$item_code);
			$query = $this->db->get();
			$row = $query->row();
				if ($query->num_rows() > 0)
				{
					return 1;
				}else{
					return 0;
				}

	}
			public function checkEnough_item($item_code,$qty)
	{
			$this->db->select('item_qty');
			$this->db->from('item');
			$this->db->where('item_code',$item_code);
			$query = $this->db->get();
			$row = $query->row();
				if ($query->num_rows() > 0)
				{
					$eno_or_not = $row->item_qty - $qty;
				}
				
				if($eno_or_not < 0){
					return 0;
				}else{
					return 1;
				}
	}
	
		public function checkHave_item($item_code)
	{
			$this->db->select('item_code');
			$this->db->from('item');
			$this->db->where('item_code',$item_code);
			$query = $this->db->get();
			$row = $query->row();
			if ($query->num_rows() > 0)
			{
				return 1;
			}else{
				return 0;
			}
	}
	
	
    public function checkPo_item($puror_code)
	{
			$this->db->select('puror_code');
			$this->db->from('purchase_order');
			$this->db->where('puror_code',$puror_code);
			$query = $this->db->get();

            if ($query->num_rows() > 0)
            {
                return 1;
            }else{
                return 0;
            }
	}

    public function checkDuplicate_temp($item_code,$tmp_type)
	{
			$this->db->select('tmp_item_code');
			$this->db->from('temp_import');
			$this->db->where('tmp_item_code',$item_code);
			//$this->db->where('tmp_type',$item_code);
			$query = $this->db->get();

			$row = $query->row();
				if ($query->num_rows() > 0)
				{
					return 1;
				}else{
					return 0;
				}

	}


		public function IsItemNew($item_code)
	{
			$this->db->select('item_code');
			$this->db->from('item');
			$this->db->where('item_code',$item_code);
			$query = $this->db->get();

			$row = $query->row();
				if ($query->num_rows() > 0)
				{
					return 1;
				}else{
					return 0;
				}

	}

	public function importItemStock($id_array,$tmp_type){

		date_default_timezone_set('asia/bangkok');

		foreach ($id_array as &$tmp_item_id) {

			$this->db->select('*');
			$this->db->from('temp_import');
			$this->db->where('tmp_item_id',$tmp_item_id);
			$this->db->where('tmp_type',$tmp_type);
			$this->db->where('duplicate',0);
			$query = $this->db->get();
			$row = $query->row();

				if ($query->num_rows() > 0)
				{
/*					$data['item_code'] = $row->tmp_item_code;
					$data['item_size'] = $row->tmp_item_size;
					$data['item_thickness']	= $row->tmp_item_thickness;
					$data['item_pfilm'] = $row->tmp_item_pfilm;
					$data['item_aica'] = $row->tmp_item_aica;
					$data['item_qty'] = $row->tmp_item_qty;
					$data['item_price'] = $row->tmp_item_price;
					$data['item_min'] = $row->tmp_item_min;
					$data['item_add_date'] = date('Y-m-d H:i:s');
					$data['item_status'] = 1;*/
					
					$data = array(
           			 'item_code'=> $row->tmp_item_code,
            		 'item_size'=> $row->tmp_item_size,
					 'item_thickness'=> $row->tmp_item_thickness,
					 'item_pfilm'=> $row->tmp_item_pfilm,
					 'item_aica'=> $row->tmp_item_aica,
					 'item_qty'=> $row->tmp_item_qty,
					 'item_price'=> $row->tmp_item_price,
					 'item_min'=> $row->tmp_item_min,
					 'item_add_date'=> date('Y-m-d H:i:s'),
					 'item_status'=> '1'
        			);

					$this->db->trans_start();
					$this->db->set($data);
					$this->db->insert('item');
					$insert_id = $this->db->insert_id();
					$this->db->trans_complete();

				$data_stk = array(
					'item_id'=> $insert_id,
					'stk_qty'=> $row->tmp_item_qty,
					'stk_unit_price'=> $row->tmp_item_price,
					'stk_add_date'=> date('Y-m-d H:i:s'),
					'stk_add_type'=> '2',
					'stk_add_by'=> $this->project_model->getUserlogin($this->session->userdata('adminData')),
					'stk_status'=> '1'
				);

				$stock_id = $this->addStock($data_stk);

				}
			}
					$this->db->where('tmp_type', $tmp_type);
					$this->db->delete('temp_import');

					echo "<script> window.location.assign('".base_url()."stock/list_item');</script>";

	}
	
	public function suggestOrder()
	{
				date_default_timezone_set('asia/bangkok');
				$test_sent  = 1;
				$query = $this->db->query("SELECT `item_code`,`item_qty`,`item_min` FROM `item` where `item_qty`<`item_min`");
				
				$topic = "ระบบแจ้งเตือนสินค้าใกล้หมด Stock ณ.วันที่ ".date('Y-m-d')."";
				$message = '<br><br>ระบบแจ้งเตือนสินค้าใกล้หมด Stock ณ.วันที่ '.date('Y-m-d').'';
				
				$message .= '<table width="500" border="0" cellspacing="2" cellpadding="2">
							  <tr>
								<td>No</td>
								<td>Item Code</td>
								<td>จำนวนที่เหลือ</td>
								<td>จำนวนขั้นต่ำ</td>
							  </tr>';

				if ($query->num_rows() > 0)
				{
					$i = 1;
					foreach ($query->result() as $row)
   					{
						$message .= "<tr>
						<td>".$i."</td>
						<td>".$row->item_code."</td>
						<td>".$row->item_qty."</td>
						<td>".$row->item_min."</td>
					  </tr>";
					}
					$i++;
					
				$message .= "</table>";
			
					if($test_sent == "1"){
						$this->hublibrary_model->sendMail($message,$topic);
					}
				}
		
	}
	
	public function getPJ()
	{
		$this->db->select('pj.proj_id,pj.proj_name');
        $this->db->from('purchase_request pr');
		$this->db->join('project pj', 'pj.proj_id = pr.proj_id', 'left');
        $this->db->where('purq_status','received');
		$this->db->or_where('purq_status','approved');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function getOwner()
	{
		$this->db->select('u.firstname,u.lastname,u.account');
        $this->db->from('purchase_request pr');
		$this->db->join('bn_user_profile u', 'u.account = pr.proj_owner_name', 'left');
        $this->db->where('purq_status','received');
		$this->db->or_where('purq_status','approved');
		$this->db->group_by('proj_owner_name'); 
        $query = $this->db->get();
        return $query->result_array();
	}
	
	public function getPurchaseRequest()
	{
		$this->db->select('purq_id,purq_code');
        $this->db->from('purchase_request');
        $this->db->where('purq_status','received');
		$this->db->or_where('purq_status','approved');
        $query = $this->db->get();
        return $query->result_array();
	}

    public function exportSearch($data)
	{
		$this->db->select('purchase_request.*,project.*');
        $this->db->from('purchase_request');
        $this->db->join('project','purchase_request.proj_id = project.proj_id','left');
		$this->db->join('bn_user_profile', 'bn_user_profile.account = purchase_request.proj_owner_name');
		$this->db->like('purchase_request.proj_id',$data["proj_id"]);
		$this->db->like('purchase_request.proj_owner_name',$data["proj_owner_name"]);
		$this->db->like('purchase_request.purq_id',$data["purq_id"]); 
		$this->db->where_in('purchase_request.purq_status',array("received","approved"));
		$query = $this->db->get();
        return $query->result_array();
	}
	
    public function getExportItem($purq_id)
	{
        $this->db->select('purchase_request_item.item_code,bn_user_profile.firstname,bn_user_profile.lastname,bn_user_profile.lastname,item.*,purchase_request_item.qty,purchase_request_item.purq_item_status');
        $this->db->from('purchase_request_item');
        $this->db->join('purchase_request','purchase_request_item.purq_id = purchase_request.purq_id');
		$this->db->join('bn_user_profile', 'bn_user_profile.account = purchase_request.proj_owner_name');
		$this->db->join('item', 'item.item_code = purchase_request_item.item_code');
		$this->db->where('purchase_request.purq_id',$purq_id);
		$this->db->where('purchase_request_item.purq_item_status',"received");
		$this->db->or_where('purchase_request_item.purq_item_status',"approved");
		$query = $this->db->get();
		
        return $query->result_array();
	}
	
	public function UpdateExportItem($purq_id)
	{
		// Update purchase_request
		$data_purq = array(
            'purq_status'=> 'delivered'
        );
		$this->db->where('purq_id', $purq_id);
		$this->db->update('purchase_request', $data_purq); 	
		
		// Update purchase_request_item
		$data_purq = array(
            'purq_item_status'=> 'delivered'
        );
		$this->db->where('purq_id', $purq_id);
		$this->db->update('purchase_request_item', $data_purq); 	
		
		// Update qty
		
		$this->db->select('purchase_request_item.item_code,purchase_request_item.qty,item.item_qty');
        $this->db->from('purchase_request_item');
		$this->db->join('item', 'item.item_code = purchase_request_item.item_code');
		$this->db->where('purq_id',$purq_id);
		$query = $this->db->get();
		
		foreach ($query->result_array() as $row)
		{
			$update_total =  $row['item_qty'] - $row['qty'];
			$data_purq = array(
				'item_qty'=> $update_total
			);
			
			$this->db->where('item_code', $row['item_code']);
			$this->db->update('item', $data_purq); 
		}
	}
	
	public function UpdateImportItem($puror_id)
	{
		// Update purchase order
		$data_puro = array(
            'puror_status'=> 'received'
        );
		$this->db->where('puror_id', $puror_id);
		$this->db->update('purchase_order', $data_puro); 	
		
		// Update purchase_order_item
		$data_puroi = array(
            'puror_item_status'=> 'received'
        );
		$this->db->where('puror_id', $puror_id);
		$this->db->update('purchase_order_item', $data_puroi); 	
		
		// Update qty

		$this->db->select('purchase_order_item.item_code,purchase_order_item.puror_qty,item.item_qty');
        $this->db->from('purchase_order_item');
		$this->db->join('item', 'item.item_code = purchase_order_item.item_code');
		$this->db->where('puror_id',$puror_id);
		$query = $this->db->get();
		
		foreach ($query->result_array() as $row)
		{
			$update_total =  $row['item_qty'] + $row['puror_qty'];
			$data_item = array(
				'item_qty'=> $update_total
			);
			
			$this->db->where('item_code', $row['item_code']);
			$this->db->update('item', $data_item); 
		}
	}
	
    public function getPO()
	{
		$this->db->select('*');
        $this->db->from('purchase_order');
        $this->db->where('puror_status','ordered');
        $query = $this->db->get();
        return $query->result_array();
	}
	
    public function importSearch($data)
	{
		$this->db->select('*');
        $this->db->from('purchase_order');
		$this->db->like('purchase_order.puror_code',$data["puror_code"]); 
		$this->db->where('purchase_order.puror_status',"ordered");
		$query = $this->db->get();
		
        return $query->result_array();
	}
	
    public function getImportItem($puror_id)
	{
        $this->db->select('purchase_order_item.item_code,purchase_order_item.puror_qty,item.*,');
        $this->db->from('purchase_order_item');
        $this->db->join('item','item.item_code = purchase_order_item.item_code');
		$this->db->where('purchase_order_item.puror_id',$puror_id);
		$this->db->where('purchase_order_item.puror_item_status',"ordered");
		$query = $this->db->get();
        return $query->result_array();
	}
	
    public function getIdPurRequest($purq_code)
    {
        $this->db->select('purq_id');
        $this->db->from('purchase_request');
        $this->db->where('purq_code',$purq_code);
        $query = $this->db->get();
        $row = $query->row();
        return $row->purq_id;
    }

    public function getItemOnPO($po_code,$item_code)
    {
        $this->db->select('*');
        $this->db->from('purchase_order_item a');
        $this->db->join('purchase_order b', 'a.puror_id = b.puror_id');
        $this->db->where('a.item_code',$item_code);
        $this->db->where('b.puror_code',$po_code);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function insertImportItemReport($data)
    {
        $this->db->insert('import_item_report', $data);
    }

    public function updateItemQty($item_code,$qty)
    {
        $this->db->set('item_qty', 'item_qty+'.$qty, FALSE);
        $this->db->where('item_code', $item_code);
        $this->db->update('item');
    }

    public function summaryImportItemReportByItemAndPO($po,$item_code)
    {
        $this->db->select_sum('impre_qty', 'Amount');
        $this->db->where('impre_ipo',$po);
        $this->db->where('impre_item_code',$item_code);
        $query = $this->db->get('import_item_report');
        $result = $query->result();
        return $result[0]->Amount;
    }

    public function getPurchaseOrderItem($po,$item_code)
    {
        $this->db->select('puror_qty');
        $this->db->from('purchase_order_item a');
        $this->db->join('purchase_order b' ,'a.puror_id = b.puror_id');
        $this->db->where('puror_code',$po);
        $this->db->where('item_code',$item_code);
        $query = $this->db->get();
        $result = $query->result();
        return $result[0]->puror_qty;
    }

    public function changeStatusPurchaseOrderItem($po,$item_code,$status)
    {

        $this->db->set('purchase_order_item.puror_item_status',$status);
        $this->db->where('purchase_order_item.item_code',$item_code);
        $this->db->where('purchase_order.puror_code',$po);
        $this->db->update('purchase_order_item JOIN purchase_order ON purchase_order_item.puror_id= purchase_order.puror_id');

    }

    public function changeStatusPurchaseOrder($po,$status)
    {
        $this->db->set('puror_status',$status);
        $this->db->where('puror_code', $po);
        $this->db->update('purchase_order');
    }

}