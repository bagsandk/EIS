<?php


class User_role_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get user_role by id
     */
    function get_user_role($id)
    {
        return $this->db->get_where('user_role', array('id' => $id))->row_array();
    }

    /*
     * Get all user_roles
     */
    function get_all_user_roles()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('user_role')->result_array();
    }

    /*
     * function to add new user_role
     */
    function add_user_role($params)
    {
        $this->db->insert('user_role', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update user_role
     */
    function update_user_role($id, $params)
    {
        $this->db->where('id', $id);
        return $this->db->update('user_role', $params);
    }

    /*
     * function to delete user_role
     */
    function delete_user_role($id)
    {
        return $this->db->delete('user_role', array('id' => $id));
    }
}
