<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class stock extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		if($this->session->userdata('isSession') == false){

            echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
        $this->load->library('SimpleXLSX');
        $this->load->model('project_model');
		$this->load->model('purchase_model');
		$this->load->model('stock_model');
		$this->load->model('hublibrary_model');
		$this->major="stock";
        $this->minor="stock";
	}


	
	public function add_item()
    {
		$permission = $this->hublibrary_model->permission($this->major,$this->minor,'update');
        if($permission == false)
        {
            echo $this->load->view('template/left','',true);
            echo $this->load->view('template/400','',true);
            die();
        }
		
		$data = array(
            'menu'=> 'Stock',
            'subMenu'=> 'Import Stock'
        );

		$this->load->view('template/left');
        $this->load->view('stock/add_item',$data);
    }
	
		public function add_new_item()
    {
		$permission = $this->hublibrary_model->permission($this->major,$this->minor,'create');
        if($permission == false)
        {
            echo $this->load->view('template/left','',true);
            echo $this->load->view('template/400','',true);
            die();
        }
		
		$data = array(
            'menu'=> 'Stock',
            'subMenu'=> 'Add Item'
        );

		$this->load->view('template/left');
        $this->load->view('stock/add_new_item',$data);
    }
	
	public function edit_item()
    {
        $permission = $this->hublibrary_model->permission($this->major,$this->minor,'update');
        if($permission == false)
        {
            echo $this->load->view('template/left','',true);
            echo $this->load->view('template/400','',true);
            die();
        }
		$data = array(
            'menu'=> 'Stock',
            'subMenu'=> 'Edit Item',
			'item_code'=> $this->stock_model->getItemby($this->uri->segment(3))
        );

		$this->load->view('template/left');
        $this->load->view('stock/edit_item',$data);
    }
	
	public function add_item_action()
    {
		date_default_timezone_set('asia/bangkok');
		
		// Check Is Item New
		$chk_new = $this->stock_model->IsItemNew($this->input->post('item_code'));
		
		if($chk_new == '1'){
			echo "<script>alert('ชออภัย Item ".$this->input->post('item_code')." นีมีอยู่แล้วในระบบ กรุณาเลือก Add More Item ในรายการ Item ที่มีอยู่แล้ว'); window.location.assign('".base_url()."index.php/stock/add_item'); </script>";	
		}
		
		$data_stk = array(
			'stk_qty'=> $this->input->post('stk_qty'),
			'stk_unit_price'=> $this->input->post('item_price'),
			'stk_add_date'=> date('Y-m-d H:i:s'),
			'stk_add_type'=> '1',
			'stk_add_by'=> $this->project_model->getUserlogin($this->session->userdata('adminData')),
			'stk_status'=> '1'
         );
		 
		$stock_id = $this->stock_model->addStock($data_stk);
		
		 $data_item = array(
            'item_code'=> $this->input->post('item_code'),
            'item_size'=> $this->input->post('item_size'),
			'item_thickness'=> $this->input->post('item_thickness'),
			'item_pfilm'=> $this->input->post('item_pfilm'),
			'item_aica'=> $this->input->post('item_aica'),
			'item_qty'=> $this->input->post('stk_qty'),
			'item_price'=> $this->input->post('item_price'),
			'item_min'=> $this->input->post('item_min'),
			'item_add_date'=> date('Y-m-d H:i:s'),
			'stk_id'=> $stock_id,
			'item_status'=> '1'
		);
		 
		$item_id = $this->stock_model->addItem($data_item);
		
		$this->stock_model->updateItemID($stock_id,$item_id);
		echo "<script>alert('Success.'); window.location.assign('".base_url()."index.php/stock/list_item'); </script>";
		
    }
	
	public function edit_item_action()
    {
		date_default_timezone_set('asia/bangkok');
/*		$data_stk = array(
		    'item_id'=> $this->uri->segment(3),
			'stk_qty'=> $this->input->post('stk_qty'),
			'stk_unit_price'=> $this->input->post('stk_unit_price'),
			'stk_add_date'=> date('Y-m-d H:i:s'),
			'stk_add_type'=> '1',
			'stk_add_by'=> $this->project_model->getUserlogin($this->session->userdata('adminData')),
			'stk_status'=> '1'
         );
		 
		$stock_id = $this->stock_model->addStock($data_stk);
		
		 $data_item = array(
			'item_qty'=> $this->stock_model->sumItem($this->input->post('stk_qty'),$this->uri->segment(3)),
			'item_add_date'=> date('Y-m-d H:i:s')
		);
		 
		$this->stock_model->updateQTY($data_item);
		$this->stock_model->updatePriceItem($this->uri->segment(3),$this->input->post('stk_unit_price'));*/

		$data_update = array(
			'item_size'=> $this->input->post('item_size'),
			'item_thickness'=> $this->input->post('item_thickness'),
			'item_pfilm'=> $this->input->post('item_pfilm'),
			'item_aica'=> $this->input->post('item_aica'),
			'item_price'=> $this->input->post('item_price'),
			'item_min'=> $this->input->post('item_min')
		);

		$this->db->where('item_id',$this->uri->segment(3));
		$this->db->update('item', $data_update);

		echo "<script>alert('Success.'); window.location.assign('".base_url()."stock/list_item'); </script>";
		exit();
    }
	
	public function list_item()
    {
	
        $permission = $this->hublibrary_model->permission($this->major,$this->minor,'view');
        if($permission == false)
        {
            echo $this->load->view('template/left','',true);
            echo $this->load->view('template/400','',true);
            die();
        }
		
		$data = array(
            'menu'=> 'Stock',
            'subMenu'=> 'Stock Item List',
			 'q' => $this->stock_model->getItemList()
        );

		$this->load->view('template/left');
        $this->load->view('stock/list_item',$data);
    }
	
	public function stock_item()
    {
        $permission = $this->hublibrary_model->permission($this->major,$this->minor,'view');
        if($permission == false)
        {
            echo $this->load->view('template/left','',true);
            echo $this->load->view('template/400','',true);
            die();
        }
		$data = array(
            'menu'=> 'Stock List',
            'subMenu'=> 'Detail Importing',
			 'q' => $this->stock_model->getStockitem()
        );

		$this->load->view('template/left');
        $this->load->view('stock/stock_item',$data);
    }

    public function import_report()
    {
        $permission = $this->hublibrary_model->permission($this->major,$this->minor,'view');
        if($permission == false)
        {
            echo $this->load->view('template/left','',true);
            echo $this->load->view('template/400','',true);
            die();
        }
        $data = array(
            'menu'=> 'Stock',
            'subMenu'=> 'Import Transaction Report',
            'q' => $this->stock_model->getTransactionImport()
        );

        $this->load->view('template/left');
        $this->load->view('stock/import_report',$data);
    }
	
		public function import_report_item()
    {
        $data = array(
            'menu'=> 'Stock',
            'subMenu'=> 'Import Transaction Report',
            'q' => $this->stock_model->getTransactionImportItem($this->uri->segment(3))
        );

        $this->load->view('template/left');
        $this->load->view('stock/import_report_item',$data);
    }

    public function import_report_po($po,$prefix)
    {
        $permission = $this->hublibrary_model->permission($this->major,$this->minor,'view');
        if($permission == false)
        {
            echo $this->load->view('template/left','',true);
            echo $this->load->view('template/400','',true);
            die();
        }
        $data = array(
            'menu'=> 'Import Transaction Report',
            'subMenu'=> 'Import Transaction Report ',
            'q' => $this->stock_model->getTransactionImportPO($po,$prefix)
        );

        $this->load->view('template/left');
        $this->load->view('stock/import_report_po',$data);
    }

    public function import_report_by_po()
    {
        $permission = $this->hublibrary_model->permission($this->major,$this->minor,'view');
        if($permission == false)
        {
            echo $this->load->view('template/left','',true);
            echo $this->load->view('template/400','',true);
            die();
        }
        $data = array(
            'menu'=> 'Stock',
            'subMenu'=> 'Import Transaction Report by PO',
            'q' => $this->stock_model->getTransactionImportByPO()
        );

        $this->load->view('template/left');
        $this->load->view('stock/import_report_by_po',$data);
    }

    public function import_item()
    {
        $date = date('Y-m-d H:i:s');
        $import_num = strtotime($date);
        $filename=$_FILES["file"]["tmp_name"];
        $xlsx = new SimpleXLSX($filename);
        $i=0;
        $sync = array();
        $async = array();
        $po = array();
        $po_old = null;
        foreach ($xlsx->rows() as $r)
        {
            if($i > 0)
            {

                $po_code = $r[0];
                $item_code = $r[1];
                $qty = $r[2];

                $isTrue = $this->stock_model->getItemOnPO($po_code,$item_code);
                if($isTrue)
                {
                    $stockData = array(
                        'item_code' => $item_code,
                        'stk_qty' => $qty,
                        'puror_code' => $po_code,
                        'stk_add_date' =>$date,
                        'stk_add_type' =>'import',
                        'stk_add_by' =>$this->session->userdata('adminData'),
                        'stk_status' =>1,
                    );
                    $stock_id = $this->stock_model->addStock($stockData);
                    $importItem = array(
                        'impre_import_num'=> $import_num,
                        'impre_ipo'=> $po_code,
                        'impre_item_code'=> $item_code,
                        'impre_qty'=> $qty,
                        'impre_date'=> $date,
                        'impre_by'=> $this->session->userdata('adminData'),
                        'impre_stk_id'=> $stock_id,
                    );

                    $this->stock_model->insertImportItemReport($importItem);
                    $this->stock_model->updateItemQty($item_code,$qty);
                    $this->checkAndChangeStatusPO($po_code,$item_code);
                    $sync[] = $importItem;
                    if($po_code != $po_old)
                    {
                        $po[] = $po_code;
                    }

                    $po_old = $po_code;
                }
                else
                {
                    if(!empty($po_code) and !empty($item_code))
                    {
                        $async[] = array(
                            'item_code' => $item_code,
                            'po_code' => $po_code,
                            'qty' => $qty
                        );
                    }

                }
            }
            $i++;
        }

        $data['sync'] = $sync;
        $data['total_success'] = count($sync);
        $data['async'] = $async;
        $data['menu'] = 'stock';
        $data['subMenu'] = 'import stock';

        $this->load->view('template/left');
        $this->load->view('stock/pre_import',$data);

    }
	
	 public function import_new_item()
    {
		date_default_timezone_set('asia/bangkok');
        $date = date('Y-m-d H:i:s');
        $import_num = strtotime($date);
        $filename=$_FILES["file"]["tmp_name"];
        $xlsx = new SimpleXLSX($filename);
        $i=0;
		
        foreach ($xlsx->rows() as $r)
        {
            if($i > 0)
            {
				$item_code = $r[0];
                $item_size = $r[3];
				$item_thickness = $r[4];
				$item_pfilm = $r[2];
				$item_aica = $r[1];
				$item_price = $r[5];
				$item_add_date = $date;
				$item_status = 1;
				
				$isNew = $this->stock_model->checkDuplicate_item($item_code);
				
				if($isNew == 0){
                    $importItem = array(
                        'item_code'=> $item_code,
                        'item_size'=> $item_size,
                        'item_thickness'=> $item_thickness,
                        'item_pfilm'=> $item_pfilm,
                        'item_aica'=> $item_aica,
                        'item_price'=> $item_price,
                        'item_add_date'=> $date,
						'item_status'=> $item_status
                    );

                    $this->stock_model->insertImportItem($importItem);
				}
            }
            $i++;
        }

      	echo "<script>alert('Import Successfully.'); window.location.assign('".base_url()."index.php/stock/list_item'); </script>";	

    }
	
    public function export_item()
    {
			$filename=$_FILES["file"]["tmp_name"];
			$this->stock_model->exportItem($filename);
    }
	
    public function temp_list()
    {
		$data = array(
            'menu'=> 'Add New Item',
            'subMenu'=> 'Import Temporary',
			'q' => $this->stock_model->getStockitem_temp($this->uri->segment(3)),
			't' => $this->stock_model->getStockitem_temp_dup($this->uri->segment(3))
        );
		$this->load->view('template/left');
		$this->load->view('stock/temp_list',$data);
    }
	
    public function import_stock_action()
    {
		if(isset($_POST['tmp_item_id'])){
		
			$this->stock_model->importItemStock($_POST['tmp_item_id'],$this->uri->segment(3));
		}

	}
	
    public function suggest_order()
    {
				date_default_timezone_set('asia/bangkok');
				$test_sent  = 1;
				$query = $this->db->query("SELECT `item_code`,`item_qty`,`item_min` FROM `item` where `item_qty`<`item_min`");
				
				$topic = "ระบบแจ้งเตือนสินค้าใกล้หมด Stock ณ.วันที่ ".date('d/m/Y')."";
				$message ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>';
				$message .= '<br><br>ระบบแจ้งเตือนสินค้าใกล้หมด Stock ณ.วันที่ '.date('d/m/Y').'';
				
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
					
				$message .= '</table>';
				$message .= '</body></html>';

			
					if($test_sent == "1"){
						$this->sendMail($message,$topic);
					}
				}
	}
	
    public function sendMail($message,$topic)
    {
        $this->email->from('backend.lsx@gmail.com' ,'Purchasing System');
        $this->email->to('pramote.pha@gmail.com');
        $this->email->subject($topic);
        $this->email->message($message);
        $result = $this->email->send();

        return $result;
    }
	
	public function export_by_order()
    {
	
		if($this->uri->segment(3) == 'search'){
		
			$data = array(
              'proj_id'=> $this->input->post('proj_id'),
          	  'proj_owner_name'=> $this->input->post('proj_owner_name'),
			  'purq_id'=> $this->input->post('purq_id')
			);
			
/*			$data["proj_id"] = $this->input->post('proj_id');
			$data["proj_owner_name"] = $this->input->post('proj_owner_name');
			$data["purq_id"] = $this->input->post('purq_id');*/
		
		}else{
/*			$data["proj_id"] = "";
			$data["proj_owner_name"] = "";
			$data["purq_id"] = "";*/
			
			$data = array(
              'proj_id'=> "",
          	  'proj_owner_name'=> "",
			  'purq_id'=> ""
			);
		}
		
		
			
		$data = array(
            'menu'=> 'STOCK ITEM',
            'subMenu'=> 'Export Stock',
			'pj' => $this->stock_model->getPJ(),
			'own' => $this->stock_model->getOwner(),
			'pur' => $this->stock_model->getPurchaseRequest(),
			'q' => $this->stock_model->exportSearch($data),
			'proj_id' => $this->input->post('proj_id'),
			'proj_owner_name' => $this->input->post('proj_owner_name'),
			'purq_id' => $this->input->post('purq_id'),
        );
		$this->load->view('template/left');
		$this->load->view('stock/export_by_order',$data);
    }
	
	
	public function export()
    {
	
		$permission = $this->hublibrary_model->permission($this->major,$this->minor,'update');
        if($permission == false)
        {
            echo $this->load->view('template/left','',true);
            echo $this->load->view('template/400','',true);
            die();
        }
		
		$data = array(
            'menu'=> 'Stock',
            'subMenu'=> 'Export Stock'
        );

		$this->load->view('template/left');
        $this->load->view('stock/export_item',$data);
    }
	
	public function export_by_order_sum()
    {
		$data = array(
            'menu'=> 'Export Stock',
            'subMenu'=> 'ยืนยันเบิกสินค้า',
			'q' => $this->stock_model->getExportItem($this->uri->segment(3))
        );
		$this->load->view('template/left');
		$this->load->view('stock/export_by_order_sum',$data);
    }
	
	public function export_item_action()
    {
		$this->stock_model->UpdateExportItem($this->uri->segment(3));
		echo "<script>alert('Export Successfully.'); window.location.assign('".base_url()."index.php/stock/export_by_order'); </script>";	
	}
	
	
	public function import_by_order()
    {
		$permission = $this->hublibrary_model->permission($this->major,$this->minor,'update');
        if($permission == false)
        {
            echo $this->load->view('template/left','',true);
            echo $this->load->view('template/400','',true);
            die();
        }
		
		if($this->uri->segment(3) == 'search'){
		
			$data["puror_code"] = $this->input->post('puror_code');
		
		}else{
			$data["puror_code"] = "";
		}
			
		$data = array(
            'menu'=> 'STOCK ITEM',
            'subMenu'=> 'Update Stock',
			'po' => $this->stock_model->getPO(),
			'q' => $this->stock_model->importSearch($data),
			'puror_code' => $this->input->post('puror_code'),
        );
		$this->load->view('template/left');
		$this->load->view('stock/import_by_order',$data);
    }
	
		public function import_by_order_sum()
    {
		$data = array(
            'menu'=> 'Import by Order',
            'subMenu'=> 'Confirm Import',
			'q' => $this->stock_model->getImportItem($this->uri->segment(3))
        );
		$this->load->view('template/left');
		$this->load->view('stock/import_by_order_sum',$data);
    }
	
		public function import_item_action()
    {
		$this->stock_model->UpdateImportItem($this->uri->segment(3));
		echo "<script>alert('Import Successfully.'); window.location.assign('".base_url()."index.php/stock/import_by_order'); </script>";	
	}
	
	    public function update_min()
    {
	
			$this->db->select('item_min,item_code');
			$this->db->from('item');
			$this->db->where('item_id',$this->uri->segment(3));
			$query = $this->db->get();

			$row = $query->row();
			
			$data = array(
            'menu'=> 'Item List',
			'subMenu'=> 'Update Min',
			'item_code'=> $row->item_code,
			'item_min'=> $row->item_min
        );
		
        $this->load->view('template/left');
        $this->load->view('stock/update_min',$data);
    }
	
	    public function update_min_action()
    {
	
		$data_update = array(
            'item_min'=> $this->input->post('item_min')
        );
		$this->db->where('item_id', $this->uri->segment(3));
		$this->db->update('item', $data_update); 
		echo "<script>alert('Update Successfully.'); window.location.assign('".base_url()."index.php/stock/list_item'); </script>";		
		
    }

    protected function checkAndChangeStatusPO($po,$item_code)
    {
        $amount = $this->stock_model->summaryImportItemReportByItemAndPO($po,$item_code);
        $order_qty = $this->stock_model->getPurchaseOrderItem($po,$item_code);

        $this->stock_model->changeStatusPurchaseOrder($po,'received');

        if($amount >= $order_qty)
        {
            $this->stock_model->changeStatusPurchaseOrderItem($po,$item_code,'received');
            return true;
        }

        return false;

    }

    public function updateStockAsync()
    {
        $date = date('Y-m-d H:i:s');
        $qty = $this->input->post('qty');
        $items = $this->input->post('item');
        foreach ($this->input->post('row') as $r)
        {
            $this->stock_model->updateItemQty($items[$r],$qty[$r]);
            $stockData = array(
                'item_code' => $items[$r],
                'stk_qty' => $qty[$r],
                'stk_add_date' =>$date,
                'stk_add_type' =>'import',
                'stk_add_by' =>$this->session->userdata('adminData'),
                'stk_status' =>1,
            );
            $this->stock_model->addStock($stockData);
        }

        echo "<script>alert('Update Successfully.');  window.location.assign('".base_url('stock/list_item')."');</script>";
    }

}