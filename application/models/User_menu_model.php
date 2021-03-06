<?php


class User_menu_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get user_menu by id
     */
    function get_user_menu($id)
    {
        return $this->db->get_where('user_menu', array('id' => $id))->row_array();
    }

    /*
     * Get all user_menus
     */
    function get_all_user_menus()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('user_menu')->result_array();
    }

    /*
     * function to add new user_menu
     */
    function add_user_menu($params)
    {
        $this->db->insert('user_menu', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update user_menu
     */
    function update_user_menu($id, $params)
    {
        $this->db->where('id', $id);
        return $this->db->update('user_menu', $params);
    }

    /*
     * function to delete user_menu
     */
    function delete_user_menu($id)
    {
        return $this->db->delete('user_menu', array('id' => $id));
    }
}
