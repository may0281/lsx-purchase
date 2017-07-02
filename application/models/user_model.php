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
        return $query->result_array();
	}

	public function getRole()
	{
        $this->db->select('*');
        $this->db->from('bn_auth_role');
        $query = $this->db->get();
        return $query->result_array();
	}

	public function createUser($data)
	{
        $this->db->insert('bn_user_profile', $data);
	}

	public function getUserData($account)
    {
        $this->db->select('*');
        $this->db->from('bn_user_profile');
        $this->db->where('account',$account);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function updateUserData($account,$userData)
    {

        $this->db->where('account', $account);
        $this->db->update('bn_user_profile', $userData);

    }

    public function deleteUser($account)
    {
        $this->db->delete('bn_user_profile', array('account' => $account));
    }

    public function getMasterFlag($account)
    {
        $this->db->select('master_flag');
        $this->db->from('bn_user_profile');
        $this->db->where('account',$account);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data[0]['master_flag'];
    }

}