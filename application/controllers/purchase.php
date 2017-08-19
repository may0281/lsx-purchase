<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class purchase extends CI_Controller {
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
        $this->menu = 'Purchase';
        $this->purchaseRequest = 'Purchase Request';
        $this->report = 'report';
        $this->major = 'purchase';
        $this->minor = 'request';
        $this->create = 'create';
        $this->approve = 'approve';
        $this->update = 'update';
        $this->delete = 'delete';
        $this->change_status = 'change-status';
        $this->marketting = 'MARKETING';
        $this->sale = 'SALE';
        $this->status = [
            'request',
            'approved',
            'unapproved',
            'pending',
            'ordered',
            'received',
            'delivered',
            'reject',
        ];
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
        $role = null;
        if($this->session->userdata('role') == $this->marketting or $this->session->userdata('role') == $this->sale)
        {
            $role = $this->session->userdata('role');
        }

        $data = array(
            'allowUpdate' => $this->hublibrary_model->permission($this->major,$this->minor,$this->update),
            'allowDelete' => $this->hublibrary_model->permission($this->major,$this->minor,$this->delete),
            'allowChangeStatus' => $this->hublibrary_model->permission($this->major,$this->minor,$this->change_status),
            'status'=> $this->status,
            'menu'=> $this->menu,
            'subMenu'=> $this->report,
            'data' => $this->purchase_model->getAllPurchaseRequest($role),
        );
        $this->load->view('template/left');
        $this->load->view('purchase/index',$data);

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
        $purchaseDetail = $this->purchase_model->getPurchaseById($id);
        $data = array(
            'menu'=> $this->menu,
            'subMenu'=> $this->report,
            'data' => $purchaseDetail[0]
        );

        $this->load->view('template/left');
        $this->load->view('purchase/detail',$data);

    }

	public function request()
    {
        $permission = $this->hublibrary_model->permission($this->major,$this->minor,'create');
        if($permission == false)
        {
            echo $this->load->view('template/left','',true);
            echo $this->load->view('template/400','',true);
            die();
        }

        $data = array(
            'menu' => $this->menu,
            'subMenu' => $this->purchaseRequest,
            'action' => $this->create,
            'projects' => $this->project_model->getNameProjectList(),
            'items' => $this->stock_model->getItemList(),
            'users' => $this->user_model->getNameUser()
        );

        $this->load->view('template/left');
        $this->load->view('purchase/manage',$data);
    }

    public function createRequest()
    {
        $purchaseData = $this->input->post();
        $purchaseData['purq_create_by'] = $this->session->userdata('adminData');
        $purchaseData['purq_create_date'] = date('Y-m-d H:i:s');
        $purchaseData['purq_status'] = 'request';
        unset($purchaseData['item_id']);
        unset($purchaseData['qty']);
        $items = $this->input->post('item_id');
        $qty = $this->input->post('qty');
        try
        {
            $purq_id = $this->purchase_model->createPurchaseRequest($purchaseData);
            $this->purchase_model->updatePurchaseCode($purq_id);
            for($i=0; $i < count($items); $i++)
            {
                if($items[$i])
                {
                    $purchaseItem = array(
                        'purq_id' => $purq_id,
                        'item_code' => $items[$i],
                        'qty' => $qty[$i]
                    );
                    $this->purchase_model->createPurchaseRequestItem($purchaseItem);
                }
                else
                {
                    break;
                }
            }


        }
        catch (\Exception $e)
        {
            echo "<script>alert('Opp.!! Something went wrong. Please try again'); history.back(); </script>";
            exit();
        }

        $dataEmail = $this->prepareDataMail($this->input->post(),$this->create);
        $this->sendPurchaseRequest($dataEmail,$this->create);
        echo "<script>alert('Success.'); window.location.assign('".base_url()."purchase'); </script>";
        exit();
    }

    public function getUpdate($id)
    {
        $permission = $this->hublibrary_model->permission($this->major,$this->minor,$this->update);
        if($permission == false)
        {
            echo $this->load->view('template/left','',true);
            echo $this->load->view('template/400','',true);
            die();
        }
        $data = $this->purchase_model->getPurchaseById($id);
        $data = array(
            'menu' => $this->menu,
            'subMenu' => $this->update,
            'action' => $this->update,
            'projects' => $this->project_model->getNameProjectList(),
            'items' => $this->stock_model->getItemList(),
            'users' => $this->user_model->getNameUser(),
            'data' => $data[0]
        );
        $this->load->view('template/left');
        $this->load->view('purchase/manage',$data);
    }

    public function updateRequest()
    {
        $purchaseData = $this->input->post();
        $purchaseData['purq_update_by'] = $this->session->userdata('adminData');
        $purchaseData['purq_update_date'] = date('Y-m-d H:i:s');
        unset($purchaseData['purq_id']);
        unset($purchaseData['purchase_item']);
        unset($purchaseData['purchase_item_list']);
        unset($purchaseData['purchase_item_qty']);
        unset($purchaseData['item_id']);
        unset($purchaseData['qty']);
        unset($purchaseData['delete']);
        $purq_id = $this->input->post('purq_id');
        $purchase_item = $this->input->post('purchase_item');
        $purchase_item_list = $this->input->post('purchase_item_list');
        $purchase_item_qty = $this->input->post('purchase_item_qty');
        $delete = $this->input->post('delete');
        $items = $this->input->post('item_id');
        $qty = $this->input->post('qty');
        try
        {
            $this->purchase_model->updatePurchaseRequest($purchaseData,$purq_id);
            for($j=0; $j<count($purchase_item); $j++)
            {
                $purchaseDataItem = array(
                    'purq_id' => $purq_id,
                    'item_code' => $purchase_item_list[$j],
                    'qty' => $purchase_item_qty[$j],

                );
                $this->purchase_model->updatePurchaseRequestItem($purchaseDataItem,$purchase_item[$j]);

            }

            if($delete)
            {
                for($k=0; $k<count($delete); $k++)
                {
                    $this->purchase_model->deletePurchaseRequestItem($delete[$k]);
                }
            }

            for($i=0; $i < count($items); $i++)
            {
                if($items[$i])
                {
                    $purchaseItem = array(
                        'purq_id' => $purq_id,
                        'item_code' => $items[$i],
                        'qty' => $qty[$i]
                    );
                    $this->purchase_model->createPurchaseRequestItem($purchaseItem);
                }
                else
                {
                    break;
                }
            }
        }
        catch (\Exception $e)
        {
            echo "<script>alert('Opp.!! Something went wrong. Please try again'); history.back(); </script>";
            exit();
        }

        $dataEmail = $this->prepareDataMail($this->input->post(),$this->update);
        $this->sendPurchaseRequest($dataEmail,$this->update);
        echo "<script>alert('Success.'); window.location.assign('".base_url()."purchase'); </script>";
        exit();
    }

    protected function sendPurchaseRequest($message,$action)
    {
        $subject = 'Purchase Request ['.strtoupper($action).']';
        $this->email->from('backend.lsx@gmail.com' ,'Purchasing System');
        $this->email->to('maya.skyt@gmail.com');
        $this->email->subject($subject);
        $this->email->message($message);
        $result = $this->email->send();

        return $result;
    }

    protected function prepareDataMail($data,$action)
    {
        $project = $this->project_model->getProjectby($data['proj_id']);
        $items = $data['item_id'];
        $purchase_item = $data['purchase_item'];
        $qty = $data['qty'];
        $itemMessage = null;
        $purchase_itemMessage = null;
        for($i=0; $i < count($items); $i++)
        {
            if($items[$i])
            {
                $itemMessage .="\n" .$items[$i] .' : ' .$qty[$i];
            }
            else
            {
                break;
            }
        }
        if($action == 'update')
        {
            for($i=0; $i < count($purchase_item); $i++)
            {
                if($purchase_item[$i])
                {
                    $purchase_itemMessage .= "\n" .$data['purchase_item_list'][$i] .' : ' .$data['purchase_item_qty'][$i];
                }
                else
                {
                    break;
                }
            }
        }
        $purq_code = 'P'.str_pad($data['proj_id'],5 ,0,STR_PAD_LEFT);
        $message = '
		Project NO : ' . $purq_code . '
		Project : ' . $project[0]['proj_name'] . '
		'.$action.' by : ' . $this->session->userdata('adminData') . '
		'.$action.' date : ' . date('Y-m-d H:i:s') . '
		Request date : ' . $data['purq_require_start'] . ' - '.  $data['purq_require_end']. '
		Project owner name : ' . $data['proj_owner_name'] . '		
		Project contacts : ' . $data['proj_contacts'] . '		
		Project mobile : ' . $data['proj_mobile'] . '		
		Project email : ' . $data['proj_email'] . '		
		Designer name : ' . $data['designer_name'] . '		
		Designer contacts : ' . $data['designer_contacts'] . '		
		Designer mobile : ' . $data['designer_mobile'] . '		
		Designer email : ' . $data['designer_email'] . '		
		Contractor name : ' . $data['contractor_name'] . '		
		Contractor contacts : ' . $data['contractor_contacts'] . '		
		Contractor mobile : ' . $data['contractor_mobile'] . '		
		Contractor email : ' . $data['contractor_email'] . '		
		Marketing account : ' . $data['mkt_account'] . '		
		Marketing mobile : ' . $data['mkt_mobile'] . '		
		Sale account : ' . $data['sale_account'] . '		
		Sale mobile : ' . $data['sale_mobile'] . "\n".'	
			
		=========================== Purchase ITEM =========================== '

            ."\n" . $purchase_itemMessage . "\n". '
        
        =========================== New ITEM =========================== '
            ."\n" . $itemMessage . "\n". '

		* Note : ' .$data['purq_comment']. '
		** email from purchasing system **';
        return $message;
    }

	public function deletePurchase($id)
    {
        $this->db->delete('purchase_request', array('purq_id' => $id));
        $this->db->delete('purchase_request_item', array('purq_id' => $id));
        header('Content-Type: application/json');
        $data = array(
            'code' => 200,
            'status' => 'Success',
            'id' => $id
        );
        echo json_encode($data);
    }

    public function approvePurchaseRequest()
    {
        $permission = $this->hublibrary_model->permission($this->major,$this->minor,$this->change_status);
        if($permission == false)
        {
            echo $this->load->view('template/left','',true);
            echo $this->load->view('template/400','',true);
            die();
        }


        $data = array(
            'menu'=> $this->menu,
            'subMenu'=> $this->approve,
            'data' => $this->purchase_model->getAllPurchaseRequestForApprove('request'),
        );
        $this->load->view('template/left');
        $this->load->view('purchase/approve',$data);

    }

    public function changeStatus()
    {
        $id = $this->input->post('purq_id');
        $status =$this->input->post('status');
        $purq_comment =$this->input->post('purq_comment');
        $this->change($id,$status,$purq_comment);
        header('Content-Type: application/json');
        $data = array(
            'code' => 200,
            'status' => 'Success',
            'act' => $status,
            'id' => $id
        );
        echo json_encode($data);

    }

    public function getChangeStatus($id, $status)
    {
        $this->change($id,$status);
        header('Content-Type: application/json');
        $data = array(
            'code' => 200,
            'status' => 'Success',
            'act' => $status,
            'id' => $id
        );
        echo json_encode($data);

    }

    public function change($id,$status,$note = null)
    {
        $data = $this->purchase_model->getPurchaseById($id);
        $oldData = $data[0];
        $oldStatus = $oldData['purq_status'];
        $purq_code = $oldData['purq_code'];
        $note = $oldData['purq_comment']."\n" .$note;
        $email = array($oldData['mkt_account'],$oldData['sale_account']);
        $message = 'The status purchase no. '.$purq_code.' has been changed.' . "\n\n";
        $message .= strtoupper($oldStatus). ' TO ' . strtoupper($status) . "\n\n";
        $message .='Approve Date : ' . date('Y-m-d H:i:s')  . "\n";
        $message .='Approve By : ' . $this->session->userdata('adminData')  . "\n\n";
        $message .='Note'  . "\n\n";
        $message .= $note;
        $this->purchase_model->changePurchaseStatus($id,$status);
        $this->purchase_model->changeStatusLog($id,$status);
        $this->sendEmailUpdateStatus($message,'Change Status',$email);
    }

    protected function sendEmailUpdateStatus($message,$action,$email = array())
    {
        $subject = 'Purchase Request ['.strtoupper($action).']';

        for($i=0; $i<count($email) ; $i++)
        {
            $this->email->from('backend.lsx@gmail.com' ,'Purchasing System');
            $this->email->to($email[$i]);
            $this->email->subject($subject);
            $this->email->message($message);
            $result = $this->email->send();
        }


        return $result;
    }

    public function ffg()
    {
        return 20;
    }

}