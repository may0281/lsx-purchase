<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH.'controllers/purchase.php');
class purchaseorder extends CI_Controller {
    private $menu;
    private $purchaseRequest;
	public function __construct()
	{
        error_reporting(0);
		parent::__construct();
		if($this->session->userdata('isSession') == false){
            echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
        $this->load->model('purchase_model');
        $this->load->model('project_model');
        $this->load->model('stock_model');
        $this->load->model('user_model');
        $this->menu = 'Purchase Order';
        $this->submenu = 'Report';
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

        $poData = array();
        $filter = array();
        if($this->input->post('submit'))
        {
            $filter = $this->input->post();
            $poData = $this->purchase_model->getPurchaseOrder($filter);
        }

        $allowDelete = $this->hublibrary_model->permission($this->major,$this->minor,'delete');
        $allowChangeStatus = $this->hublibrary_model->permission($this->major,$this->minor,'change-status');

        $data = array(
            'menu'=> $this->menu,
            'subMenu'=> $this->submenu,
            'allowDelete'=> $allowDelete,
            'allowChangeStatus'=> $allowChangeStatus,
            'data' => $poData,
            'filter' => $filter,
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
        $orderItem = $this->purchase_model->getPurchaseOrderAndDetailItemByID($id);
        $data = array(
            'menu'=> $this->menu,
            'subMenu'=> $this->report,
            'data' => $orderDetail[0],
            'item' => $orderItem,
        );

        $this->load->view('template/left');
        $this->load->view('purchase/po-report-detail',$data);

    }

    public function getList($id)
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
            'subMenu'=> $orderDetail[0]['puror_code'],
            'data' => $orderDetail[0],
            'item' => $orderItem,
        );

        $this->load->view('template/left');
        $this->load->view('purchase/po-report-list',$data);

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
        $res = $this->checkOrdered($item);
        $data = array(
            'menu' => $this->menu,
            'subMenu' => $this->create,
            'action' => $this->create,
            'item' =>$res,
            'list' => $this->purchase_model->getAllPurchaseRequestAndItem('approved'),
        );
        $this->load->view('template/left');
        $this->load->view('purchase/pre-order',$data);
    }

    public function createPreOrder()
    {
        $poCode = $this->getLastPurchase();
        $puror_code = 'POA'.date('y').$poCode;
        $purq_id = null;
        $old_purq_id = null;
        $input = $this->input->post();
        $pre_order = array(
            'puror_order_date' => date('Y-m-d H:i:s'),
            'puror_code' => $puror_code,
            'puror_forecasts_date' => date('Y-m-d H:i:s', strtotime('+50 days')),
            'puror_inquiry_by' => $this->session->userdata('adminData'),
            'puror_shipping_method' => $input['puror_shipping_method'],
            'puror_shipping_term' => $input['puror_shipping_term'],
            'puror_shipping_destination' => $input['puror_shipping_destination'],
            'puror_shipping_payment_term' => $input['puror_shipping_payment_term'],
            'puror_note' => $input['puror_note'],
            'puror_description' => $input['puror_description'],
        );

        $puror_id = $this->purchase_model->createPurchaseOrder($pre_order);
        foreach (array_get($input,'item') as $item)
        {
            $exp = explode(',',$item);
            $item_code = $exp[0];
            $purq_id = $exp[1];
            $price = $exp[3];
            $qty = $this->input->post('suggest-'.$exp[2]);

            $data =  array(
                'puror_id' => $puror_id,
                'purq_id' => $purq_id,
                'item_code' => $item_code,
                'puror_qty' => $qty,
                'puror_price' => $price
            );
            $this->purchase_model->createPurchaseOrderItem($data);
        }
        echo "<script>alert('Success.'); window.location.assign('".base_url()."purchase/po-report/detail/".$puror_id."');</script>";

    }

    protected function getLastPurchase()
    {
        $this->db->select('puror_code');
        $this->db->order_by('puror_id','desc');
        $this->db->limit(1);
        $query = $this->db->get('purchase_order');
        $data = $query->result_array();
        $poCode = $data[0]['puror_code'];
        $year = substr($poCode,3,2);
        $poNo = substr($poCode,5);

        $po = $poNo + 1;

        if(date('y') > $year)
        {
            $po = 1;
        }
        return str_pad($po,3 ,0,STR_PAD_LEFT);
    }

    public function getChangeStatus($id, $status)
    {
        require_once(APPPATH.'controllers/purchase.php');
        $purchase = new purchase();
        $purchase->change($id,$status);
        $this->purchase_model->updatePurchaseRequestItemByPurqId(array('purq_item_status'=>$status),$id);
        $data = array(
            'code' => 200,
            'status' => 'Success',
            'act' => $status,
            'id' => $id
        );

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
        $data = array('puror_status'=>$status);

        $this->purchase_model->updatePurchaseOrder($id,$data);
        $this->purchase_model->updatePurchaseOrderItem($id,array('puror_item_status'=>'accrual'));
        $this->purchase_model->createAccrual(array('puror_id'=>$id,'note'=>$puror_note,'update_date'=>date('Y-m-d H:i:s')));
        header('Content-Type: application/json');
        $data = array(
            'code' => 200,
            'status' => 'Success',
            'puror_status' => $status,
            'id' => $id
        );
        echo json_encode($data);

    }

    protected function checkOrdered($item)
    {
        $ordered  = array();
        $unOrdered = array();
        foreach ($item as $i)
        {
            $purchaseOrderCode = $this->purchase_model->checkOrdered($i['item_code']);
            if($purchaseOrderCode)
            {
                $i['purchaseCode'] = $purchaseOrderCode;
                $ordered[] = $i;
            }
            else
            {
                $unOrdered[] = $i;
            }
        }

        $data = array(
            'ordered' => $ordered,
            'unOrdered' => $unOrdered
        );

        return $data;
    }

    public function delete($id)
    {
        $checkPoReceive = $this->purchase_model->checkPoReceive($id);
        $checkPoItemReceive = $this->purchase_model->checkPoItemReceive($id);

        if(!empty($checkPoReceive) or !empty($checkPoItemReceive))
        {
            echo "<script>alert('This PO can not be deleted because the status is received or accrual.'); history.back();</script>";
            exit();

        }
        $this->purchase_model->deletePurchaseOrder($id);
        $this->purchase_model->deletePurchaseOrderItem($id);

        echo "<script>alert('Success.'); window.location.assign('".base_url()."purchase/po-report');</script>";

    }
}