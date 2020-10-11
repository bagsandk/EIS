<?php


class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get user by id
     */
    function get_user($id)
    {
        return $this->db->get_where('user', array('id' => $id))->row_array();
    }

    /*
     * Get all users
     */
    function get_all_users()
    {
        $this->db->select('*,user.id as "id"');
        $this->db->from('user');
        $this->db->join('user_role', 'user.role_id = user_role.id');
        return $this->db->get()->result_array();
    }
    function get_user_bidang()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_bidang', 'user.id = user_bidang.user_id');
        $this->db->join('bidang', 'user_bidang.bidang_id = bidang.id');
        return $this->db->get()->result_array();
    }

    /*
     * function to add new user
     */
    function add_user($params)
    {
        $this->db->insert('user', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update user
     */
    function update_user($id, $params)
    {
        $this->db->where('id', $id);
        return $this->db->update('user', $params);
    }

    /*
     * function to delete user
     */
    function delete_user($id)
    {
        return $this->db->delete('user', array('id' => $id));
    }
}
