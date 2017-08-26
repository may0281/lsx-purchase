<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class automate extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
	}

		public function suggest_order()
    {
				date_default_timezone_set('asia/bangkok');
				$test_sent  = 1;
				$query = $this->db->query("SELECT `item_code`,`item_qty`,`item_min` FROM `item` where `item_qty`<`item_min`");
				
				$topic = "ระบบแจ้งเตือนสินค้าใกล้หมด Stock ณ.วันที่ ".date('d/m/Y')."";

				$message = '<br><br>ระบบแจ้งเตือนสินค้าใกล้หมด Stock ณ.วันที่ '.date('d/m/Y').'<br><br>';
				
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
					  $i++;
					}
					
					
				$message .= '</table>';*/

			
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
		$this->email->set_mailtype("html");
        $result = $this->email->send();

        return $result;
    }
}