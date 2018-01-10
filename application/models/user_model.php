<?php
class user_model extends ci_model
	{
	public function __constuct()
	{
		parent::__construct();
	}
	

	public function getUser()
	{
        $this->db->select('*');
        $this->db->from('bn_user_profile');
        $query = $this->db->get();
        $this->log_model->Logging('user_model','success',$this->db->last_query());
        return $query->result_array();
	}

	public function getRole()
	{
        $this->db->select('*');
        $this->db->from('bn_auth_role');
        $query = $this->db->get();
        $this->log_model->Logging('user_model','success',$this->db->last_query());
        return $query->result_array();
	}

	public function createUser($data)
	{
        $this->db->insert('bn_user_profile', $data);
        $this->log_model->Logging('user_model','success',$this->db->last_query());
	}

	public function getUserData($account)
    {
        $this->db->select('*');
        $this->db->from('bn_user_profile');
        $this->db->where('account',$account);
        $query = $this->db->get();
        $this->log_model->Logging('user_model','success',$this->db->last_query());
        return $query->result_array();
    }

    public function updateUserData($account,$userData)
    {

        $this->db->where('account', $account);
        $this->db->update('bn_user_profile', $userData);
        $this->log_model->Logging('user_model','success',$this->db->last_query());

    }

    public function deleteUser($account)
    {
        $this->db->delete('bn_user_profile', array('account' => $account));
        $this->log_model->Logging('user_model','success',$this->db->last_query());
    }

    public function getMasterFlag($account)
    {
        $this->db->select('master_flag');
        $this->db->from('bn_user_profile');
        $this->db->where('account',$account);
        $query = $this->db->get();
        $data = $query->result_array();
        $this->log_model->Logging('user_model','success',$this->db->last_query());
        return $data[0]['master_flag'];
    }

    public function getNameUser($role)
    {
        $this->db->select('account,mobile,firstname,lastname');
        $this->db->from('bn_user_profile');
        $this->db->where('role_id',$role);
        $this->db->where('status','A');
        $query = $this->db->get();
        $this->log_model->Logging('user_model','success',$this->db->last_query());
        return $query->result_array();
    }

    public function checkUserdata($username,$password)
    {
        $this->db->select('*');
        $this->db->from('bn_user_profile');
        $this->db->where('account',$username);
        $this->db->where('password',$password);
        $this->db->where('status','A');
        $login = $this->db->get();
        $this->log_model->Logging('user_model','success',$this->db->last_query());
        return $login->result_array();

    }

}