<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class stock extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
//		error_reporting(0);
		if($this->session->userdata('isSession') == false){

            echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
        $this->load->model('project_model');
		$this->load->model('stock_model');
	}


	
	public function add_item()
    {
		$data = array(
            'menu'=> 'Stock',
            'subMenu'=> 'Add New Item'
        );

		$this->load->view('template/left');
        $this->load->view('stock/add_item',$data);
    }
	
	public function add_more_item()
    {
		$data = array(
            'menu'=> 'Stock',
            'subMenu'=> 'Add More Item',
			'item_code'=> $this->stock_model->getItemby($this->uri->segment(3))
        );

		$this->load->view('template/left');
        $this->load->view('stock/add_more_item',$data);
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
			'stk_unit_price'=> $this->input->post('stk_unit_price'),
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
			'item_min'=> $this->input->post('item_min'),
			'item_pfilm'=> $this->input->post('item_pfilm'),
			'item_add_date'=> date('Y-m-d H:i:s'),
			'stk_id'=> $stock_id,
			'item_status'=> '1'
		);
		 
		$item_id = $this->stock_model->addItem($data_item);
		
		$this->stock_model->updateItemID($stock_id,$item_id);
		echo "<script>alert('Success.'); window.location.assign('".base_url()."index.php/stock/list_item'); </script>";
		
    }
	
	public function add_more_item_action()
    {
		date_default_timezone_set('asia/bangkok');
		$data_stk = array(
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
		$this->stock_model->updatePriceItem($this->uri->segment(3),$this->input->post('stk_unit_price'));
		echo "<script>alert('Success.'); window.location.assign('".base_url()."index.php/stock/list_item'); </script>";
		exit();
    }
	
	public function list_item()
    {
		$data = array(
            'menu'=> 'Stock',
            'subMenu'=> 'Stock Item',
			 'q' => $this->stock_model->getItemList()
        );

		$this->load->view('template/left');
        $this->load->view('stock/list_item',$data);
    }
	
	public function stock_item()
    {
		$data = array(
            'menu'=> 'Stock List',
            'subMenu'=> 'Stock List',
			 'q' => $this->stock_model->getStockitem()
        );

		$this->load->view('template/left');
        $this->load->view('stock/stock_item',$data);
    }
	
	public function tracking_order()
    {
		$data = array(
            'menu'=> 'Stock',
            'subMenu'=> 'Tracking Order'
        );

		$this->load->view('template/left');
        $this->load->view('stock/tracking_order',$data);
    }
	
		public function import_item()
    {
/* 		if (isset($_FILES["file"]) && !empty($_FILES["file"])) { */
			$filename=$_FILES["file"]["tmp_name"];
			if($this->uri->segment(3) == "1"){
				$this->stock_model->importItem($filename,$this->uri->segment(3));
			}else{
				$this->stock_model->importInstockItem($filename,$this->uri->segment(3));
			}
			
			echo "<script>alert('Import Successfully.'); window.location.assign('".base_url()."index.php/stock/temp_list/".$this->uri->segment(3)."'); </script>";	

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
}