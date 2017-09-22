<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class api extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        header('Content-Type: application/json');

	}
	
	
	public function itemList()
	{

        $this->load->model('stock_model');
        $data= array();
        $result = $this->stock_model->getItemList();

        echo json_encode($result);
	}

	public function test()
    {

        for($i=0; $i<=20; $i++)
        {
            $data[] = $i*10;
        }

        sd($data);
    }

}