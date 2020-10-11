<?php


class User_bidang_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get user_bidang by id
     */
    function get_user_bidang($id)
    {
        return $this->db->get_where('user_bidang', array('id' => $id))->row_array();
    }

    /*
     * Get all user_bidangs
     */
    function get_all_user_bidangs()
    {
        $this->db->select('* ,user_bidang.id as "id"');
        $this->db->from('user_bidang');
        $this->db->join('user', 'user.id = user_bidang.user_id');
        $this->db->join('bidang', 'bidang.id = user_bidang.bidang_id');
        return $this->db->get()->result_array();
    }

    /*
     * function to add new user_bidang
     */
    function add_user_bidang($params)
    {
        $this->db->insert('user_bidang', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update user_bidang
     */
    function update_user_bidang($id, $params)
    {
        $this->db->where('id', $id);
        return $this->db->update('user_bidang', $params);
    }

    /*
     * function to delete user_bidang
     */
    function delete_user_bidang($id)
    {
        return $this->db->delete('user_bidang', array('id' => $id));
    }
}
