<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class emailto
{

	public function sendPurchaseRequest($project,$creator)
	{

        $this->load->library('email');
        $subject = 'Purchase Request [Create]';
		$data = '
		Project : ' . $project . '
		Create by : ' . $creator . '
		Request date : ' . date('Y-m-d H:i:s') . '		
				
		** email from purchasing system **';
		$this->email->from('backend.lsx@gmail.com' ,'Purchasing System');
		$this->email->to('maya.skyt@gmail.com');
		$this->email->subject($subject);
		$this->email->message($data);
		$result = $this->email->send();

		return $result;
	}

}

