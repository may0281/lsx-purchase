<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class param extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		if($this->session->userdata('isSession') == false){

            echo "<script> window.location.assign('".base_url()."login?ReturnUrl=".$_SERVER['REQUEST_URI']."');</script>";
		}
		$this->load->model('hublibrary_model');
        $this->load->model('param_model');
		$this->major="param";
	}

    public function index()
    {

        $list = $this->param_model->getParamAll();
        $data = array(
            'menu'=> 'Parameter Config',
            'item' => $list

        );
        $this->load->view('template/left');
        $this->load->view('param/index',$data);
    }

    public function create()
    {

        $data = $this->input->post();
        $checkDistinct = $this->param_model->checkDistinct($data['param_email'],$data['param_key']);
        if($checkDistinct)
        {
            $data['message'] = $data['param_email']. ' already in system in type '.$data['param_key'];
            echo $this->load->view('error/db',$data,true);
            die();
        }

        try
        {
            $this->param_model->createParam($data);

            if($this->db->_error_message())
            {
                $data['message'] = $this->db->_error_message();
                echo $this->load->view('error/db',$data,true);
                die();
            }

            echo "<script>alert('Success'); window.location.assign('".base_url()."param'); </script>";
            exit();

        }
        catch (\Exception $e)
        {
            echo "<script> history.back(); </script>";
            exit();
        }
    }

    public function update()
    {

        $data = $this->input->post();
        unset($data['param_id']);
        try
        {
            $this->param_model->update($this->input->post('param_id'),$data);

            if($this->db->_error_message())
            {
                $data['message'] = $this->db->_error_message();
                echo $this->load->view('error/db',$data,true);
                die();
            }

            echo "<script>alert('Success'); window.location.assign('".base_url()."param'); </script>";
            exit();

        }
        catch (\Exception $e)
        {
            echo "<script> history.back(); </script>";
            exit();
        }
    }

    public function delete($id)
    {
        try
        {
            $this->param_model->delete($id);

            if($this->db->_error_message())
            {
                $data['message'] = $this->db->_error_message();
                echo $this->load->view('error/db',$data,true);
                die();
            }

            echo "<script>alert('Success'); window.location.assign('".base_url()."param'); </script>";
            exit();

        }
        catch (\Exception $e)
        {
            echo "<script> history.back(); </script>";
            exit();
        }
    }

}