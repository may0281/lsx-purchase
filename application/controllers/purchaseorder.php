<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'controllers/purchase.php');
class purchaseorder extends CI_Controller {
    private $menu;
    private $purchaseRequest;
	public function __construct()
	{
//        error_reporting(0);
		parent::__construct();
		if($this->session->userdata('isSession') == false){
            echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
        $this->load->model('purchase_model');
        $this->load->model('project_model');
        $this->load->model('stock_model');
        $this->load->model('user_model');
        $this->menu = 'Purchase';
        $this->purchaseOrder = 'Purchase Order';
        $this->major = 'purchase';
        $this->minor = 'po';
        $this->create = 'create';
        require_once(APPPATH.'controllers/purchase.php');


    }

	public function index()
	{
        $permission = $this->hublibrary_model->permission($this->major,$this->minor,'view');
        if($permission == false)
        {
            echo $this->load->view('template/left','',true);
            echo $this->load->view('template/400','',true);
            die();
        }


        $data = array(
            'menu'=> $this->menu,
            'subMenu'=> $this->purchaseOrder,
            'data' => $this->purchase_model->getPurchaseOrder(),
        );


        $this->load->view('template/left');
        $this->load->view('purchase/po-report',$data);

	}

	public function getDetail($id)
    {
        $permission = $this->hublibrary_model->permission($this->major,$this->minor,'view');
        if($permission == false)
        {
            echo $this->load->view('template/left','',true);
            echo $this->load->view('template/400','',true);
            die();
        }
        $orderDetail = $this->purchase_model->getPurchaseOrderByID($id);
        $orderItem = $this->purchase_model->getPurchaseOrderItemByID($id);
        $data = array(
            'menu'=> $this->menu,
            'subMenu'=> $this->report,
            'data' => $orderDetail[0],
            'item' => $orderItem,
        );

        $this->load->view('template/left');
        $this->load->view('purchase/po-report-detail',$data);

    }

	public function preOrder()
    {
        $permission = $this->hublibrary_model->permission($this->major,$this->minor,'create');
        if($permission == false)
        {
            echo $this->load->view('template/left','',true);
            echo $this->load->view('template/400','',true);
            die();
        }
        $allItem = $this->stock_model->getItemList();
        $item = $this->prepareQTYLessThanMinimum($allItem);
        $data = array(
            'menu' => $this->menu,
            'subMenu' => $this->purchaseOrder,
            'action' => $this->create,
            'item' =>$item,
            'list' => $this->purchase_model->getAllPurchaseRequestAndItem('approved'),
        );
        $this->load->view('template/left');
        $this->load->view('purchase/pre-order',$data);
    }

    public function createPreOrder()
    {
//        require_once(APPPATH.'controllers/purchase.php');
        $purchase = new purchase();
        $input = $this->input->post();
        $pre_order = array(
            'puror_order_date' => date('Y-m-d H:i:s'),
            'puror_forecasts_date' => date('Y-m-d H:i:s', strtotime('+50 days')),
            'puror_inquiry_by' => $this->session->userdata('adminData'),
        );

//        $puror_id = $this->purchase_model->createPurchaseOrder($pre_order);

        foreach (array_get($input,'item') as $item)
        {
            $exp = explode(',',$item);
            $item_code = $exp[0];
            $purq_id = $exp[1];
            $qty = $this->input->post('suggest-'.$exp[2]);

//            $data =  array(
//                'puror_id' => $puror_id,
//                'purq_id' => $purq_id,
//                'item_code' => $item_code,
//                'puror_qty' => $qty
//            );

//            sd($data);
            sd($purchase->getChangeStatus($purq_id,'ordered'));
//            $this->purchase_model->createPurchaseOrderItem($data);
        }

    }

    protected function prepareQTYLessThanMinimum($data)
    {
        $isLessThan = array();
        foreach ($data as $item) {
            if($item['item_qty'] < $item['item_min'])
            {
                $isLessThan[] = $item;
            }
        }
        return $isLessThan;
    }
    public function changeStatus()
    {
        $id = $this->input->post('puror_id');
        $status =$this->input->post('status');
        $puror_note =$this->input->post('puror_note');
        $data = array('puror_status'=>$status,'puror_note'=>$puror_note);
        if($status = 'approved')
        {
            $data['puror_approve_by'] = $this->session->userdata('adminData');
            $data['puror_approve_date'] = date('Y-m-d H:i:s');
        }
        $this->purchase_model->updatePurchaseOrder($id,$data);
        header('Content-Type: application/json');
        $data = array(
            'code' => 200,
            'status' => 'Success',
            'puror_status' => $status,
            'id' => $id
        );
        echo json_encode($data);

    }


}